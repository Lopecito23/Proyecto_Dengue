<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include_once '../view/partials/header.php'; ?>
</head>

<body>
    <div class="wrapper">

        <?php include_once '../view/partials/sidebar.php'; ?>

        <div class="main-panel">

            <?php include_once '../view/partials/navbar.php'; ?>

            <div class="container-fluid"> 
                <div class="page-inner">

                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-user-shield me-2"></i>Gestión de Roles
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Listado de Roles</h4>
                                        <a href="<?= getUrl("Roles", "Roles", "getCreate") ?>"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus me-1"></i> Nuevo
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="mb-3 col-md-4 mx-auto"> 
                                        <input type="text" id="searchBox" class="form-control" placeholder="Buscar...">
                                    </div>

                                    <div class="table-responsive">
                                        <table id="rolesTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre del Rol</th>
                                                    <th>Descripción</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($roles_data) && count($roles_data) > 0): ?>
                                                    <?php foreach ($roles_data as $rol): ?>
                                                        <tr>
                                                            <td><?= $rol['id_rol'] ?></td>
                                                            <td>
                                                                <span class="badge badge-primary"
                                                                    style="font-size: 13px; padding: 6px 12px;">
                                                                    <?= $rol['rol_nombre'] ?>
                                                                </span>
                                                            </td>
                                                            <td><?= $rol['rol_descripcion'] ?></td>
                                                            <td>
                                                                <a href="<?= getUrl("Roles", "Roles", "getUpdate", array("id" => $rol['id_rol'])) ?>"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="fa fa-edit">Editar</i>
                                                                </a>
                                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal<?= $rol['id_rol'] ?>">
                                                                    <i class="fa fa-times">Eliminar</i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="deleteModal<?= $rol['id_rol'] ?>">
                                                             </div>

                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No hay roles</td>
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

            <?php include_once '../view/partials/footer.php'; ?>

        </div>
    </div>

    <?php include_once '../view/partials/scripts.php'; ?>

    <script>
        $(document).ready(function () {
            <?php if (isset($roles_data) && count($roles_data) > 0): ?>
                var table = $("#rolesTable").DataTable({
                    pageLength: 10,
                    dom: '<"top"i>rt<"bottom"lp><"clear">',
                    searching: false, 
                    lengthChange: false, 
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