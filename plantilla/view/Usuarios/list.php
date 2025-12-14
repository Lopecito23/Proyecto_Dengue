<?php
// NOTA: Asume que header.php abre <html>, <head>, <body>, y <div class="wrapper">
include '../view/partials/header.php'; 
?>

<div class="wrapper">

    <?php include '../view/partials/sidebar.php'; ?>

    <div class="main-panel">

        <?php include '../view/partials/navbar.php'; ?>

        <div class="container">
            <div class="page-inner">

                <div class="page-header">
                    <h3 class="fw-bold mb-3">
                        <i class="fas fa-users me-2"></i>Gestión de Usuarios
                    </h3>
                    <ul class="breadcrumbs mb-3">
                        <li class="nav-home">
                            <a href="../../web/index.php"><i class="icon-home"></i></a>
                        </li>
                        <li class="separator"><i class="icon-arrow-right"></i></li>
                        <li class="nav-item">Administración</li>
                        <li class="separator"><i class="icon-arrow-right"></i></li>
                        <li class="nav-item active">Usuarios</li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title mb-0 fw-bold">
                                        <i class="fas fa-list me-2"></i>Listado de Usuarios
                                    </h4>
                                    <a href="<?= getUrl("Usuarios", "Usuarios", "getCreate") ?>"
                                        class="btn btn-primary btn-round ms-auto">
                                        <i class="fa fa-plus me-1"></i> Nuevo Usuario
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body"> <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text bg-white">
                                                <i class="fas fa-search"></i>
                                            </span>
                                            <input type="text" id="searchUsuarios" class="form-control"
                                                placeholder="Buscar usuarios...">
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="usuariosTable" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                                <th><i class="fas fa-user me-1"></i>Nombre</th>
                                                <th><i class="fas fa-user me-1"></i>Apellido</th>
                                                <th><i class="fas fa-envelope me-1"></i>Correo</th>
                                                <th><i class="fas fa-user-shield me-1"></i>Rol</th>
                                                <th><i class="fas fa-toggle-on me-1"></i>Estado</th>
                                                <th class="text-center"><i class="fas fa-cogs me-1"></i>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($usuario_data) && count($usuario_data) > 0): ?>
                                            <?php foreach ($usuario_data as $usuario): ?>
                                            <tr>
                                                <td class="fw-bold"><?= $usuario['id'] ?></td>
                                                <td><?= $usuario['nombre'] ?></td>
                                                <td><?= $usuario['apellido'] ?></td>
                                                <td>
                                                    <i class="fas fa-envelope text-muted me-1"></i>
                                                    <?= $usuario['correo'] ?>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">
                                                        <i class="fas fa-user-tag me-1"></i><?= $usuario['rol'] ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if ($usuario['id_estado'] == 1): ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check-circle me-1"></i>Activo
                                                    </span>
                                                    <?php else: ?>
                                                    <span class="badge badge-danger">
                                                        <i class="fas fa-times-circle me-1"></i>Inactivo
                                                    </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="form-button-action text-center">
                                                        <a href="<?= getUrl("Usuarios", "Usuarios", "getUpdate", array("id" => $usuario['id'])) ?>"
                                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                            title="Editar Usuario">
                                                            <i class="fa fa-edit">Editar</i>
                                                        </a>
                                                        <?php if ($usuario['id_estado'] == 1): ?>
                                                        <button type="button" class="btn btn-link btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal<?= $usuario['id'] ?>"
                                                            title="Eliminar Usuario">
                                                            <i class="fa fa-times">Eliminar</i>
                                                        </button>
                                                        <?php else: ?>
                                                        <button type="button" class="btn btn-link btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#restoreModal<?= $usuario['id'] ?>"
                                                            title="Restaurar Usuario">
                                                            <i class="fa fa-undo">Restaurar</i>
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade"
                                                id="<?= $usuario['id_estado'] == 1 ? 'deleteModal' : 'restoreModal' ?><?= $usuario['id'] ?>"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div
                                                            class="modal-header bg-<?= $usuario['id_estado'] == 1 ? 'danger' : 'success' ?>">
                                                            <h5 class="modal-title text-white">
                                                                <i
                                                                    class="fas fa-<?= $usuario['id_estado'] == 1 ? 'exclamation-triangle' : 'undo' ?> me-2"></i>
                                                                <?= $usuario['id_estado'] == 1 ? 'Eliminar Usuario' : 'Restaurar Usuario' ?>
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <div class="mb-3">
                                                                <i
                                                                    class="fas fa-<?= $usuario['id_estado'] == 1 ? 'user-times' : 'user-check' ?> fa-3x text-<?= $usuario['id_estado'] == 1 ? 'danger' : 'success' ?>"></i>
                                                            </div>
                                                            <h5>¿Estás seguro?</h5>
                                                            <p class="text-muted">
                                                                <?php if ($usuario['id_estado'] == 1): ?>
                                                                Se eliminará el usuario <strong><?= $usuario['nombre'] ?>
                                                                    <?= $usuario['apellido'] ?></strong>
                                                                <?php else: ?>
                                                                Se restaurará el usuario <strong><?= $usuario['nombre'] ?>
                                                                    <?= $usuario['apellido'] ?></strong>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="fas fa-times me-1"></i>Cancelar
                                                            </button>
                                                            <?php if ($usuario['id_estado'] == 1): ?>
                                                            <a href="<?= getUrl("Usuarios", "Usuarios", "postDelete", array("id" => $usuario['id'])) ?>"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash me-1"></i>Eliminar
                                                            </a>
                                                            <?php else: ?>
                                                            <a href="<?= getUrl("Usuarios", "Usuarios", "updateStatus", array("id" => $usuario['id'])) ?>"
                                                                class="btn btn-success">
                                                                <i class="fas fa-check me-1"></i>Restaurar
                                                            </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center py-4">
                                                    <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                                    <p class="text-muted">No hay usuarios registrados</p>
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
        <?php include '../view/partials/footer.php'; ?>

    </div>
    </div>
<?php include '../view/partials/scripts.php'; ?>

<script>
    $(document).ready(function () {
        // Solo inicializar DataTable si hay datos (usando $usuario_data, no $usuarios)
        <?php if (isset($usuario_data) && count($usuario_data) > 0): ?>
            var table = $("#usuariosTable").DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json",
                },
                pageLength: 10,
                responsive: true,
                dom: 'rtip' // Sin botones de longitud ni buscador por defecto
            });

            // Buscador personalizado
            $('#searchUsuarios').on('keyup', function () {
                table.search(this.value).draw();
            });
        <?php endif; ?>

        // Tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>