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
                            <i class="fas fa-edit me-2"></i>Editar Actividad
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control Biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">
                                <a href="<?= getUrl("Actividades", "Actividades", "getAll") ?>">Actividades</a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Editar</li>
                        </ul>
                    </div>

                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Actualizar Actividad
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <?php if (isset($actividad)): ?>
                                        <form action="<?= getUrl("Actividades", "Actividades", "postUpdate") ?>"
                                            method="POST">

                                            <!-- ID oculto -->
                                            <input type="hidden" name="id_actividad"
                                                value="<?= $actividad['id_actividad'] ?>">

                                            <!-- Nombre de la Actividad -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-clipboard-list me-1"></i>Nombre de la Actividad <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="nombre"
                                                    value="<?= $actividad['nombre'] ?>"
                                                    placeholder="Ej: Alimentación, Limpieza, Monitoreo, etc." required>
                                            </div>

                                            <!-- Botones -->
                                            <div class="d-flex justify-content-between mt-4">
                                                <a href="<?= getUrl("Actividades", "Actividades", "getAll") ?>"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-arrow-left me-1"></i>Cancelar
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-1"></i>Actualizar Actividad
                                                </button>
                                            </div>

                                        </form>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            No se encontró la actividad
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

</body>

</html>