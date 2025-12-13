<?php
include_once '../lib/helpers.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #f0f4ff 0%, #e3ecff 50%, #d6e6ff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 74, 157, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.1);
            max-width: 420px;
            margin: auto;
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .login-logo {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            font-weight: bold;
            color: white;
            margin: 0 auto 1.5rem;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            color: #3b82f6;
        }

        .form-floating > .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
        }

        .btn-login {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
            color: white !important;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            z-index: 10;
        }

        .divider {
            position: relative;
            text-align: center;
            color: #9ca3af;
            font-size: 0.875rem;
            margin: 2rem 0;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 1rem;
        }

        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
                height: auto;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-3">
    <main class="login-container p-4 p-md-5 flex-column">
        
        
        <div class="text-center mb-4">
            <div class="login-logo mb-3">
                <i class="bi bi-person-circle"></i>
            </div>
            <h1 class="h3 mb-2 fw-bold text-dark">Bienvenido</h1>
            <p class="text-muted mb-0">Inicia sesión en tu cuenta</p>
        </div>

     <form class="w-100" method="POST" action="<?php echo getUrl("Acceso", "Acceso", "login", false, "ajax"); ?>">
  <div class="form-floating mb-4 position-relative">
    <input 
      type="email" 
      class="form-control form-control-lg" 
      id="email" 
      name="email"
      placeholder="name@example.com"
      required
    >
    <label for="email">
      <i class="bi bi-envelope me-2"></i>Correo Electrónico
    </label>
  </div>

  <div class="form-floating mb-4 position-relative">
    <input 
      type="password" 
      class="form-control form-control-lg" 
      id="password" 
      name="password"
      placeholder="Password"
      required
    >
    <label for="password">
      <i class="bi bi-lock me-2"></i>Contraseña
    </label>
    <button type="button" class="password-toggle" onclick="togglePassword()" title="Mostrar/Ocultar contraseña">
      <i class="bi bi-eye" id="toggleIcon"></i>
    </button>
  </div>


  <?php

    if(isset($_SESSION['error'])){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              ' . $_SESSION['error'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['error']);
    }

    ?>

  <div class="d-grid mb-4">
    <button type="submit" class="btn btn-primary btn-login btn-lg">
      <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
    </button>
  </div>
</form>

    </main>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>

























