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
      height: 100vh;
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
      margin-top: 100vh;
      margin-bottom: 100vh;
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
      margin-top: 2rem;
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
    <h1 class="login-title">Portuelho</h1>

    <form>
      <div class="mb-3 position-relative">
        <label for="email" class="form-label">Insira o seu Email</label>
        <div class="input-group">
          <span class="input-group-text" id="email-addon">
            <!-- Bootstrap person-circle icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M13.468 12.37C12.758 11.226 11.52 10.5 10 10.5c-1.52 0-2.758.726-3.468 1.87A6.987 6.987 0 0 1 2 8a7 7 0 1 1 11.468 4.37z"/>
              <path fill-rule="evenodd" d="M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            </svg>
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
        <label for="username" class="form-label">Nome de usuário</label>
        <div class="input-group">
          <span class="input-group-text" id="username-addon">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M463 448.2C440.9 409.8 399.4 384 352 384L288 384C240.6 384 199.1 409.8 177 448.2C212.2 487.4 263.2 512 320 512C376.8 512 427.8 487.3 463 448.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320zM320 336C359.8 336 392 303.8 392 264C392 224.2 359.8 192 320 192C280.2 192 248 224.2 248 264C248 303.8 280.2 336 320 336z"/></svg>
          </span>
          <input
            type="text"
            class="form-control"
            id="username"
            placeholder="Seu nome de usuário"
            aria-describedby="username-addon"
            required
          />
        </div>
      </div>

      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Senha</label>
        <div class="input-group">
          <span class="input-group-text" id="password-addon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-lock" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M8 1a3 3 0 0 0-3 3v3h6V4a3 3 0 0 0-3-3z"/>
              <path d="M5 8h6v5a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8z"/>
            </svg>
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
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M8 1a3 3 0 0 0-3 3v3h6V4a3 3 0 0 0-3-3z"/>
              <path d="M5 8h6v5a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8z"/>
            </svg>
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

      <button type="submit" class="btn btn-login">LOGIN</button>
    </form>
  </main>
</body>
</html>

