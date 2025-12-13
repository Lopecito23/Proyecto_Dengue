<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include_once '../partials/header.php'; ?>
</head>
<body>
    <div class="wrapper">
        
        <!-- Sidebar -->
        <?php include_once '../partials/sidebar.php'; ?>
        
        <div class="main-panel">
            
            <!-- Navbar -->
            <?php include_once '../partials/navbar.php'; ?>
            
            <!-- Contenido Principal -->
            <div class="container">
                <div class="page-inner">
                    
                    <!-- Título -->
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-user-edit me-2"></i>Editar Usuario
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Administración</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">
                                <a href="<?= getUrl("Usuarios", "Usuarios", "getAll") ?>">Usuarios</a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Editar</li>
                        </ul>
                    </div>

                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Actualizar Datos del Usuario
                                    </h4>
                                </div>
                                <div class="card-body">
                                    
                                    <?php if(isset($usuario)): ?>
                                    <form action="<?= getUrl("Usuarios", "Usuarios", "postUpdate") ?>" method="POST" id="formUsuario">
                                        
                                        <!-- ID oculto -->
                                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                        
                                        <div class="row">
                                            
                                            <!-- Documento -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-id-card me-1"></i>Documento <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" 
                                                       class="form-control" 
                                                       name="documento" 
                                                       value="<?= $usuario['documento'] ?>"
                                                       placeholder="Ingrese el documento"
                                                       required>
                                            </div>

                                            <!-- Rol -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user-tag me-1"></i>Rol <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select" name="rol" required>
                                                    <option value="">Seleccione un rol</option>
                                                    <?php if(isset($roles) && count($roles) > 0): ?>
                                                        <?php foreach($roles as $rol): ?>
                                                            <option value="<?= $rol['id'] ?>" 
                                                                <?= ($rol['id'] == $usuario['rol']) ? 'selected' : '' ?>>
                                                                <?= $rol['nombre'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                            <!-- Nombres -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user me-1"></i>Nombres <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="nombres" 
                                                       value="<?= $usuario['nombres'] ?>"
                                                       placeholder="Ingrese los nombres"
                                                       required>
                                            </div>

                                            <!-- Apellidos -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user me-1"></i>Apellidos <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="apellidos" 
                                                       value="<?= $usuario['apellidos'] ?>"
                                                       placeholder="Ingrese los apellidos"
                                                       required>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-envelope me-1"></i>Correo Electrónico <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" 
                                                       class="form-control" 
                                                       name="email" 
                                                       value="<?= $usuario['email'] ?>"
                                                       placeholder="ejemplo@correo.com"
                                                       required>
                                            </div>

                                        </div>

                                        <!-- Botones -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="<?= getUrl("Usuarios", "Usuarios", "getAll") ?>" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i>Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i>Actualizar Usuario
                                            </button>
                                        </div>

                                    </form>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            No se encontró el usuario
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <?php include_once '../partials/footer.php'; ?>
            
        </div>
    </div>

    <!-- Scripts -->
    <?php include_once '../partials/scripts.php'; ?>
    
    <!-- Validación -->
    <script>
        document.getElementById('formUsuario')?.addEventListener('submit', function(e) {
            const documento = document.querySelector('input[name="documento"]').value;
            const email = document.querySelector('input[name="email"]').value;
            
            if(isNaN(documento) || documento.length < 7) {
                e.preventDefault();
                alert('El documento debe tener mínimo 7 dígitos numéricos');
                return false;
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email)) {
                e.preventDefault();
                alert('Ingrese un correo electrónico válido');
                return false;
            }
        });
    </script>
    
</body>
</html>
