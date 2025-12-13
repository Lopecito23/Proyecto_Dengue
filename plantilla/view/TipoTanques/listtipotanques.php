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
                            <i class="fas fa-layer-group me-2"></i>Tipos de Tanques
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control Biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Tipos de Tanques</li>
                        </ul>
                    </div>

                    <!-- Card -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Listado de Tipos de Tanques</h4>
                                        <a href="<?= getUrl("TipoTanques", "TipoTanques", "getCreate") ?>"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus me-1"></i> Nuevo Tipo
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <!-- Buscador -->
                                    <div class="mb-3 col-md-4">
                                        <input type="text" id="searchBox" class="form-control"
                                            placeholder="Buscar tipo de tanque...">
                                    </div>

                                    <!-- Tabla -->
                                    <div class="table-responsive">
                                        <table id="tipoTanquesTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre del Tipo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($tipoTanques) && count($tipoTanques) > 0): ?>
                                                    <?php foreach ($tipoTanques as $tipo): ?>
                                                        <tr>
                                                            <td><?= $tipo['id_TipoT'] ?></td>
                                                            <td>
                                                                <span class="badge badge-info"
                                                                    style="font-size: 13px; padding: 6px 12px;">
                                                                    <i class="fas fa-cube me-1"></i><?= $tipo['nombre'] ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="<?= getUrl("TipoTanques", "TipoTanques", "getUpdate", array("id" => $tipo['id_TipoT'])) ?>"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fa fa-edit"></i> Editar
                                                                </a>
                                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal<?= $tipo['id_TipoT'] ?>">
                                                                    <i class="fa fa-times"></i> Eliminar
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal Eliminar -->
                                                        <div class="modal fade" id="deleteModal<?= $tipo['id_TipoT'] ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Eliminar Tipo de Tanque</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>¿Está seguro de eliminar el tipo de tanque
                                                                            <strong><?= $tipo['nombre'] ?></strong>?</p>
                                                                        <div class="alert alert-warning">
                                                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                                                            Esta acción no se puede deshacer.
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <a href="<?= getUrl("TipoTanques", "TipoTanques", "postDelete", array("id" => $tipo['id_TipoT'])) ?>"
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
                                                        <td colspan="3" class="text-center">No hay tipos de tanques
                                                            registrados</td>
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
            <?php include_once '../partials/footer.php'; ?>

        </div>
    </div>

    <!-- Scripts -->
    <?php include_once '../partials/scripts.php'; ?>

    <script>
        $(document).ready(function () {
            <?php if (isset($tipoTanques) && count($tipoTanques) > 0): ?>
                var table = $("#tipoTanquesTable").DataTable({
                    pageLength: 10,
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
                    }
                });

                $('#searchBox').on('keyup', function () {
                    table.search(this.value).draw();
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>