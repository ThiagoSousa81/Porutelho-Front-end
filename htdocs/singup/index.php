<?php
require "../php/crud.php";
$cls = new database();
?>

<!DOCTYPE html>
<html lang"pt-br">
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
    <h1 class="login-title text-center">Portuelho</h1>

    <form method="POST">
      <div class="mb-3 position-relative">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text" id="email-addon">
            ✉️
          </span>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="email@exemplo.com"
            aria-describedby="email-addon"
            required
          />
        </div>
      </div>
      
      <div class="mb-3 position-relative">
        <label for="name" class="form-label">Nome</label>
        <div class="input-group">
          <span class="input-group-text" id="name-addon">
          	😊
          </span>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder=""
            aria-describedby="name-addon"
            required
          />
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label for="username" class="form-label">Usuário</label>
        <div class="input-group">
          <span class="input-group-text" id="username-addon">
          	👤
          </span>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            placeholder="User123"
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

      <div class="mb-3 position-relative">
        <label for="confirm-password" class="form-label">Confirme a Senha</label>
        <div class="input-group">
          <span class="input-group-text" id="confirm-password-addon">
            🔒
          </span>
          <input
            type="password"
            class="form-control"
            id="confirm-password"
            name="confirm-password"
            placeholder="●●●●●●●●●●●●●●●"
            aria-describedby="confirm-password-addon"
            required
          />
        </div>
      </div>
      
      <p>Já é cadastrado? <a href="/login" style="color: wheat"><b>Login</b></a></p>

      <button type="submit" class="btn btn-login">CADASTRO</button>
    </form>

    <?php
      // Debug: Mostrar se os dados estão chegando via POST
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          echo "<!-- DEBUG: Dados POST recebidos -->";
          echo "<!-- Email: " . ($_POST['email'] ?? 'não definido') . " -->";
          echo "<!-- Nome: " . ($_POST['name'] ?? 'não definido') . " -->";
          echo "<!-- Username: " . ($_POST['username'] ?? 'não definido') . " -->";
      }
      
      if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
          $nome = addslashes($_POST['name']);
          $email = strtolower(addslashes($_POST['email']));
          $username = str_replace('@', '', addslashes($_POST['username']));
          $pwd = addslashes($_POST['password']);
          $cpwd = addslashes($_POST['confirm-password']);                    

          try {
              $mysqli = $cls->GetLinkMySQLI();

              // Verificar conexão
              if ($mysqli->connect_error) {
                  ?>
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Portuelho 🐰: </strong> Erro de conexão: <?php echo $mysqli->connect_error; ?>
                  </div>
                  <?php
                  exit();
              }

              // Verificar se a tabela existe
              $result = $mysqli->query("SHOW TABLES LIKE 'ALUNO'");
              if ($result->num_rows == 0) {
                  ?>
                  <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Portuelho 🐰: </strong> Tabela ALUNO não existe. Criando automaticamente...
                  </div>
                  <?php
                  
                  $sql = "CREATE TABLE ALUNO (
                      ID_ALUNO INT PRIMARY KEY AUTO_INCREMENT,
                      NOME_ALUNO VARCHAR(100),
                      EMAIL_ALUNO VARCHAR(100),
                      ARROBA_ALUNO VARCHAR(100),
                      SENHA_ALUNO VARCHAR(255),
                      DATA_CADASTRO DATE,
                      NIVEL INT DEFAULT 1,
                      NIVEL_ESCRITA INT DEFAULT 1,
                      OFENSIVA INT DEFAULT 0,
                      QI INT DEFAULT 100,
                      VOCABULARIO INT DEFAULT 1
                  )";
                  
                  if (!$mysqli->query($sql)) {
                      ?>
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Portuelho 🐰: </strong> Erro ao criar tabela: <?php echo $mysqli->error; ?>
                      </div>
                      <?php
                      exit();
                  }
              }

          $sql = "SELECT EMAIL_ALUNO FROM ALUNO WHERE EMAIL_ALUNO = '" . base64_encode($email) . "'";
          $result = $mysqli->query($sql);

          if (!$result) {
              ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>Portuelho 🐰: </strong> Erro na consulta de email: <?php echo $mysqli->error; ?>
              </div>
              <?php
              exit();
          }

          if ($result->num_rows > 0) {
              ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>Portuelho 🐰: </strong> Endereço de E-mail já cadastrado no sistema!
              </div>
              <?php
              exit();
          }
          
          $sql = "SELECT ARROBA_ALUNO FROM ALUNO WHERE ARROBA_ALUNO = '" . base64_encode($username) . "'";
          $result = $mysqli->query($sql);
          
          if (!$result) {
              ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>Portuelho 🐰: </strong> Erro na consulta de usuário: <?php echo $mysqli->error; ?>
              </div>
              <?php
              exit();
          }
          if ($result->num_rows > 0) {
              ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>Portuelho 🐰: </strong> Este @ de usuário já existe no sistema!
              </div>
              <?php
          } else {
              if (!empty($nome) && !empty($email) && !empty($username) && !empty($pwd) && !empty($cpwd)) {
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      ?>
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Portuelho 🐰: </strong> Endereço de E-mail inválido!
                      </div>
                      <?php
                  } else {
                      if ($pwd == $cpwd) {

                      //Definindo data de cadastro
                      $timezone = new DateTimeZone('America/Sao_Paulo');
                      $now = new DateTime('now', $timezone);
                      $data_cadastro = $now->format('Y-m-d');

                      // Valores padrão para campos opcionais
                      $nivel = 1;
                      $nivel_escrita = 1;
                      $ofensiva = 0;
                      $qi = 100;
                      $vocabulario = 1;

                      // Hash da senha
                      $hash = password_hash($pwd, PASSWORD_ARGON2ID, [
                          'memory_cost' => 1 << 17, // 128 MB
                          'time_cost'   => 4,       // 4 iterações
                          'threads'     => 2,       // 2 threads paralelas
                      ]);
                      

                      $stmt = $mysqli->prepare("INSERT INTO `ALUNO` (`NOME_ALUNO`, `EMAIL_ALUNO`, `ARROBA_ALUNO`, `SENHA_ALUNO`, `DATA_CADASTRO`, `NIVEL`, `NIVEL_ESCRITA`, `OFENSIVA`, `QI`, `VOCABULARIO`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                      
                      if (!$stmt) {
                          ?>
                          <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              <strong>Portuelho 🐰: </strong> Erro ao preparar query: <?php echo $mysqli->error; ?>
                          </div>
                          <?php
                          exit();
                      }
                      
                      $stmt->bind_param("sssssiiii", base64_encode($nome), base64_encode($email), base64_encode($username), $hash, $data_cadastro, $nivel, $nivel_escrita, $ofensiva, $qi, $vocabulario);
                      
                      if (!$stmt->execute()) {
                          ?>
                          <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              <strong>Portuelho 🐰: </strong> Erro ao executar inserção: <?php echo $stmt->error; ?>
                          </div>
                          <?php
                          exit();
                      }
                      
                      $stmt->close();
                      $mysqli->close();


                      ?>
                      <!-- Mensagem de Sucesso -->
                      <div class="alert alert-success alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Portuelho 🐰🥕: </strong> Usuário cadastrado com sucesso!
                      </div>
                      <?php


                  } else {
                      ?>
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Portuelho 🐰: </strong> As senhas não conferem!
                      </div>
                      <?php
                  }
                  }
              } else {
                  ?>
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Portuelho 🐰: </strong> Preencha todos os campos!
                  </div>
                  <?php
              }
          }

      }
    ?>
  </main>
</body>
</html>

