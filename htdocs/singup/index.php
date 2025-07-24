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
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text" id="email-addon">
            ✉️
          </span>
          <input
            type="email"
            class="form-control"
            id="email"
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
            placeholder="●●●●●●●●●●●●●●●"
            aria-describedby="confirm-password-addon"
            required
          />
        </div>
      </div>
      
      <p>Já é cadastrado? <a href="/login" style="color: wheat"><b>Login</b></a></p>

      <button type="submit" class="btn btn-login">CADASTRO</button>
    </form>
  </main>
</body>
</html>

