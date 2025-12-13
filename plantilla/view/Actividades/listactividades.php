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
                            <i class="fas fa-tasks me-2"></i>Actividades del Zoocriadero
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control Biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Actividades</li>
                        </ul>
                    </div>

                    <!-- Card -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Listado de Actividades</h4>
                                        <a href="<?= getUrl("Actividades", "Actividades", "getCreate") ?>"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus me-1"></i> Nueva Actividad
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <!-- Buscador -->
                                    <div class="mb-3 col-md-4">
                                        <input type="text" id="searchBox" class="form-control"
                                            placeholder="Buscar actividad...">
                                    </div>

                                    <!-- Tabla -->
                                    <div class="table-responsive">
                                        <table id="actividadesTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                                    <th><i class="fas fa-clipboard-list me-1"></i>Nombre de la Actividad
                                                    </th>
                                                    <th class="text-center"><i class="fas fa-cogs me-1"></i>Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($actividades_data) && count($actividades_data) > 0): ?>
                                                    <?php foreach ($actividades_data as $actividad): ?>
                                                        <tr>
                                                            <td class="fw-bold"><?= $actividad['id_actividad'] ?></td>
                                                            <td>
                                                                <span class="badge badge-primary"
                                                                    style="font-size: 14px; padding: 8px 15px;">
                                                                    <i
                                                                        class="fas fa-check-circle me-1"></i><?= $actividad['nombre'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="<?= getUrl("Actividades", "Actividades", "getUpdate", array("id" => $actividad['id_actividad'])) ?>"
                                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                    title="Editar">
                                                                    <i class="fa fa-edit"></i> Editar
                                                                </a>
                                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal<?= $actividad['id_actividad'] ?>"
                                                                    title="Eliminar">
                                                                    <i class="fa fa-times"></i> Eliminar
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal Eliminar -->
                                                        <div class="modal fade"
                                                            id="deleteModal<?= $actividad['id_actividad'] ?>">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <h5 class="modal-title text-white">
                                                                            <i
                                                                                class="fas fa-exclamation-triangle me-2"></i>Eliminar
                                                                            Actividad
                                                                        </h5>
                                                                        <button type="button" class="btn-close btn-close-white"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center py-4">
                                                                        <div class="mb-3">
                                                                            <i class="fas fa-tasks fa-3x text-danger"></i>
                                                                        </div>
                                                                        <h5>¿Está seguro?</h5>
                                                                        <p class="text-muted">
                                                                            Se eliminará la actividad
                                                                            <strong><?= $actividad['nombre'] ?></strong>
                                                                        </p>
                                                                        <div class="alert alert-warning text-start">
                                                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                                                            <strong>Advertencia:</strong> Esta acción no se
                                                                            puede deshacer.
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="fas fa-times me-1"></i>Cancelar
                                                                        </button>
                                                                        <a href="<?= getUrl("Actividades", "Actividades", "postDelete", array("id" => $actividad['id_actividad'])) ?>"
                                                                            class="btn btn-danger">
                                                                            <i class="fas fa-trash me-1"></i>Eliminar
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center py-4">
                                                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                                            <p class="text-muted">No hay actividades registradas</p>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

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

    <script>
        $(document).ready(function () {
            <?php if (isset($actividades) && count($actividades) > 0): ?>
                var table = $("#actividadesTable").DataTable({
                    pageLength: 10,
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
                    }
                });

                $('#searchBox').on('keyup', function () {
                    table.search(this.value).draw();
                });
            <?php endif; ?>

            // Tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>