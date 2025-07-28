<?php
require "../php/crud.php";
$cls = new database();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Portuelho - Cadastro</title>
  <link rel="shortcut icon" href="/src/logo.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/src/style_form.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <main class="login-container">

    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = addslashes($_POST['username'] ?? '');
        $pwd = addslashes($_POST['password'] ?? '');

        try {
            $mysqli = $cls->GetLinkMySQLI();
            $mysqli->set_charset("utf8mb4");

            if ($mysqli->connect_error) {
                echo '<div class="alert alert-danger">Erro de conexão: ' . $mysqli->connect_error . '</div>';
                exit();
            }

            // Buscar usuário por email ou username
            $sql = "SELECT * FROM ALUNO WHERE EMAIL_ALUNO = ? OR ARROBA_ALUNO = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $user, $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($pwd, $row['SENHA_ALUNO'])) {
                    // Login OK
                    echo('<div class="alert alert-success alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Portuelho 🐰🥕: </strong> Bem-vindo, ' . $row['NOME_ALUNO'] . '!</div>');
                    // Aqui você pode iniciar sessão, redirecionar, etc.

                    // Configuração do domínio do cookie da sessão
                    ini_set('session.cookie_domain', 'portuelho.free.nf');
                    //Configurando tempo de limite da sessão
                    ini_set('session.gc_maxlifetime', 3600);
                    // Configurando cookie como seguro (apenas em conexões HTTPS)
                    ini_set('session.cookie_secure', 1);
                    session_start();
                    $_SESSION['ID_USER'] = $row['ID_USER'];

                    $stmt->close();
                    $mysqli->close();

                    header("Location: /profile.php");
                } else {
                    echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Portuelho 🐰: </strong> Senha incorreta! </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Portuelho 🐰: </strong> Usuário ou email não encontrado!</div>';
            }

            $stmt->close();
            $mysqli->close();

        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Erro: ' . $e->getMessage() . '</div>';
        }
    }
    ?>

    <h1 class="login-title text-center">Portuelho</h1>

    <form method="POST">
      <div class="mb-3 position-relative">        
      <div class="mb-3 position-relative">
        <label for="username" class="form-label">Usuário ou Email</label>
        <div class="input-group">
          <span class="input-group-text" id="username-addon">
            👤
          </span>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            placeholder="User123 ou email@exemplo.com"
            aria-describedby="username-addon"
            required
          />
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Senha</label>
        <div class="input-group">
          <span class="input-group-text" id="password-addon">
            🔒
          </span>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="●●●●●●●●●●●●●●●"
            aria-describedby="password-addon"
            required
          />
        </div>
      </div>

      <p>Ainda não tem conta? <a href="/singup" style="color: wheat"><b>Cadastre-se</b></a></p>

      <button type="submit" class="btn btn-login">LOGIN</button>
    </form>    
  </main>
</body>
</html>

