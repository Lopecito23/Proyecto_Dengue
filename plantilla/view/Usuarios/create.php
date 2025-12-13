<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include_once '../view/partials/header.php'; ?>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <?php include_once '../view/partials/sidebar.php'; ?>

        <div class="main-panel">

            <!-- Navbar -->
            <?php include_once '../view/partials/navbar.php'; ?>

            <!-- Contenido Principal -->
            <div class="container">
                <div class="page-inner">

                    <!-- Título -->
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-user-plus me-2"></i>Crear Usuario
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
                            <li class="nav-item active">Crear</li>
                        </ul>
                    </div>

                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Formulario de Usuario
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form action="<?= getUrl("Usuarios", "Usuarios", "postCreate") ?>" method="POST"
                                        id="formUsuario">

                                        <div class="row">

                                            <!-- Documento -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-id-card me-1"></i>Documento <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="documento"
                                                    placeholder="Ingrese el documento" required>
                                                <small class="text-muted">Sin puntos ni comas</small>
                                            </div>

                                            <!-- Rol -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user-tag me-1"></i>Rol <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-select" name="rol" required>
                                                    <option value="">Seleccione un rol</option>
                                                    <?php if (isset($roles_data) && count($roles_data) > 0): ?>
                                                        <?php foreach ($roles_data as $rol): ?>
                                                            <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol_nombre'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                            <!-- Nombres -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user me-1"></i>Nombres <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="nombre"
                                                    placeholder="Ingrese los nombres" required>
                                            </div>

                                            <!-- Apellidos -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user me-1"></i>Apellidos <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="apellido"
                                                    placeholder="Ingrese los apellidos" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-envelope me-1"></i>Telefono<span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="number" class="form-control" name="telefono"
                                                    placeholder="000000000" required>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-envelope me-1"></i>Correo Electrónico <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="ejemplo@correo.com" required>
                                        </div>

                                        <!--Contraseña-->

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-envelope me-1"></i>Contraseña<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="password" class="form-control" name="contrasenia"
                                                placeholder="ejemplo@correo.com" required>
                                        </div>

                                </div>

                                <!-- Botones -->
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="<?= getUrl("Usuarios", "Usuarios", "getAll") ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-1"></i>Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i>Guardar Usuario
                                    </button>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include_once '../view/partials/footer.php'; ?>

    </div>
    </div>

    <!-- Scripts -->
    <?php include_once '../view/partials/scripts.php'; ?>

    <!-- Validación -->
    <script>
        document.getElementById('formUsuario').addEventListener('submit', function (e) {
            const documento = document.querySelector('input[name="documento"]').value;
            const email = document.querySelector('input[name="email"]').value;

            // Validar documento (debe ser numérico)
            if (isNaN(documento) || documento.length < 7) {
                e.preventDefault();
                alert('El documento debe tener mínimo 7 dígitos numéricos');
                return false;
            }

            // Validar email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Ingrese un correo electrónico válido');
                return false;
            }
        });
    </script>

</body>

</html>