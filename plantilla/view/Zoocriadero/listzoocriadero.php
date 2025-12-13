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
                            <i class="fas fa-building me-2"></i>Gestión de Zoocriaderos
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control Biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Zoocriaderos</li>
                        </ul>
                    </div>

                    <!-- Card -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Listado de Zoocriaderos</h4>
                                        <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "getCreate") ?>"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus me-1"></i> Nuevo Zoocriadero
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <!-- Buscador -->
                                    <div class="mb-3 col-md-4">
                                        <input type="text" id="searchBox" class="form-control"
                                            placeholder="Buscar zoocriadero...">
                                    </div>

                                    <!-- Tabla -->
                                    <div class="table-responsive">
                                        <table id="zoocriaderoTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                                    <th><i class="fas fa-map-marker-alt me-1"></i>Dirección</th>
                                                    <th><i class="fas fa-user me-1"></i>Responsable</th>
                                                    <th><i class="fas fa-globe me-1"></i>Coordenadas</th>
                                                    <th class="text-center"><i class="fas fa-cogs me-1"></i>Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($zoo_datos) && count($zoo_datos) > 0): ?>
                                                    <?php foreach ($zoo_datos as $zoo): ?>
                                                        <tr>
                                                            <td class="fw-bold"><?= $zoo['id_zoocriadero'] ?></td>
                                                            <td>
                                                                <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                                <?= $zoo['dirrecion'] ?>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-info">
                                                                    <i class="fas fa-user me-1"></i>
                                                                    <?= $zoo['usuario_nombre'] ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <small class="text-muted">
                                                                    <i class="fas fa-map-pin me-1"></i>
                                                                    <?= $zoo['coordenadas'] ?>
                                                                </small>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "getUpdate", array("id" => $zoo['id_zoocriadero'])) ?>"
                                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                    title="Editar">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal<?= $zoo['id_zoocriadero'] ?>"
                                                                    title="Eliminar">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                                <a href="#" class="btn btn-sm btn-info"
                                                                    onclick="verMapa(<?= $zoo['coordenadas'] ?>)"
                                                                    data-bs-toggle="tooltip" title="Ver en mapa">
                                                                    <i class="fa fa-map"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal Eliminar -->
                                                        <div class="modal fade" id="deleteModal<?= $zoo['id_zoocriadero'] ?>">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <h5 class="modal-title text-white">
                                                                            <i
                                                                                class="fas fa-exclamation-triangle me-2"></i>Eliminar
                                                                            Zoocriadero
                                                                        </h5>
                                                                        <button type="button" class="btn-close btn-close-white"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body text-center py-4">
                                                                        <div class="mb-3">
                                                                            <i class="fas fa-building fa-3x text-danger"></i>
                                                                        </div>
                                                                        <h5>¿Está seguro?</h5>
                                                                        <p class="text-muted">
                                                                            Se eliminará el zoocriadero ubicado en:<br>
                                                                            <strong><?= $zoo['dirrecion'] ?></strong>
                                                                        </p>
                                                                        <div class="alert alert-warning text-start">
                                                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                                                            <strong>Advertencia:</strong> Esta acción eliminará
                                                                            todos los registros asociados (seguimientos,
                                                                            tanques, etc.)
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="fas fa-times me-1"></i>Cancelar
                                                                        </button>
                                                                        <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "postDelete", array("id" => $zoo['id_zoocriadero'])) ?>"
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
                                                        <td colspan="5" class="text-center py-4">
                                                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                                            <p class="text-muted">No hay zoocriaderos registrados</p>
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
            <?php if (isset($zoocriaderos) && count($zoocriaderos) > 0): ?>
                var table = $("#zoocriaderoTable").DataTable({
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

        // Función para ver en Google Maps
        function verMapa(coordenadas) {
            const url = `https://www.google.com/maps?q=${coordenadas}`;
            window.open(url, '_blank');
        }
    </script>

</body>

</html>