<!DOCTYPE html>
<html lang"pt-br">
<head>
  <title>Portuelho - Cadastro</title>
  <link rel="shortcut icon" href="/src/logo.webp">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
   body, html {      
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(180deg, #0044cc, #001155);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
      color: white;
    }
    
    .login-container {
      background-color: #002299; 
      padding: 30px;
      border-radius: 0.5rem;
      width: 100%;
      max-width: 360px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }
    .btn-login {
      background-color: white;
      color: #888;
      font-weight: 600;
      font-size: 1.1rem;
      border-radius: 1.5rem;
      padding: 0.5rem 0;
      width: 100%;
      border: none;
      margin-top: 1rem;
      transition: background-color 0.3s ease, color 0.3s ease;
      user-select: none;
    }
    .btn-login:hover,
    .btn-login:focus {
      background-color: #e0e0e0;
      color: #555;
      outline: none;
    }
  </style>
  
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
            placeholder="********"
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
            placeholder="********"
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

