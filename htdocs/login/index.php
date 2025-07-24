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

    <form>
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

