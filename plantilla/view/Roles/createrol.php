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
                            <i class="fas fa-plus-circle me-2"></i>Crear Rol
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Administración</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">
                                <a href="<?= getUrl("Roles", "Roles", "getAll") ?>">Roles</a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Crear</li>
                        </ul>
                    </div>

                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Formulario de Rol
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form action="<?= getUrl("Roles", "Roles", "postCreate") ?>" method="POST"
                                        id="formRol">

                                        <!-- Nombre del Rol -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-tag me-1"></i>Nombre del Rol <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="rol_nombre"
                                                placeholder="Ej: Super Administrador, Coordinador, etc." required>
                                            <small class="text-muted">Ingrese un nombre descriptivo para el rol</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-tag me-1"></i>Descripcion del Rol <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="rol_descripcion"
                                                placeholder="Ej: El rol Administrador se encarga de:" required>
                                            <small class="text-muted">Una descriptivo Breve del Rol</small>
                                        </div>

                                        <!-- Botones -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="<?= getUrl("Roles", "Roles", "getAll") ?>"
                                                class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i>Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i>Guardar Rol
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

</body>

</html>