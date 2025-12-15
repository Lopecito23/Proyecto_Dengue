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
                            <i class="fas fa-swimming-pool me-2"></i>Gestión de Tanques
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Tanques</li>
                        </ul>
                    </div>

                    <!-- Card -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Listado de Tanques</h4>
                                        <a href="<?= getUrl('Tanques', 'Tanques', 'getCreate'); ?>"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus me-1"></i> Nuevo
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Buscador -->
                                    <div class="mb-3 col-md-4">
                                        <input type="text" id="searchTanques" class="form-control"
                                            placeholder="Buscar...">
                                    </div>

                                    <!-- Tabla -->
                                    <div class="table-responsive">
                                        <table id="tanquesTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Zoocriadero (dirección)</th>
                                                    <th>Nombre</th>
                                                    <th>Alto</th>
                                                    <th>Ancho</th>
                                                    <th>Profundo</th>
                                                    <th>Tipo</th>
                                                    <th>Peces</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($tanques) && count($tanques) > 0): ?>
                                                    <?php foreach ($tanques as $t): ?>
                                                        <tr>
                                                            <td><?= $t['id']; ?></td>
                                                            <td><?= htmlspecialchars($t['zoo_direccion']); ?></td>
                                                            <td><?= htmlspecialchars($t['nombre']); ?></td>
                                                            <td><?= htmlspecialchars($t['medidas_alto']); ?></td>
                                                            <td><?= htmlspecialchars($t['medidas_ancho']); ?></td>
                                                            <td><?= htmlspecialchars($t['medidas_profundo']); ?></td>
                                                            <td><?= htmlspecialchars($t['tipo_nombre']); ?></td>
                                                            <td><?= htmlspecialchars($t['cantidad_peces']); ?></td>
                                                            <td>
                                                                <?php if ($t['id_estado'] == 1): ?>
                                                                    <span class="badge bg-success">Activo</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-danger">Inactivo</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group">
                                                                    <a href="<?= getUrl('Tanques', 'Tanques', 'getUpdate', ['id' => $t['id']]); ?>"
                                                                        class="btn btn-sm btn-warning" title="Editar">
                                                                        <i class="fa fa-edit me-1"></i>Editar
                                                                    </a>
                                                                    <a href="<?= getUrl('Tanques', 'Tanques', 'getDelete', ['id' => $t['id']]); ?>"
                                                                        class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('¿Eliminar este tanque?');">
                                                                        <i class="fa fa-trash me-1"></i>Eliminar
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="10" class="text-center">No hay tanques registrados</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div> <!-- card-body -->
                            </div> <!-- card -->
                        </div> <!-- col -->
                    </div> <!-- row -->

                </div> <!-- page-inner -->
            </div> <!-- container -->

            <!-- Footer -->
            <?php include_once '../view/partials/footer.php'; ?>

        </div> <!-- main-panel -->
    </div> <!-- wrapper -->

    <?php include_once '../view/partials/scripts.php'; ?>

    <script>
        $(document).ready(function () {
            <?php if (isset($tanques) && count($tanques) > 0): ?>
                let table = $('#tanquesTable').DataTable({
                    pageLength: 10,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                    }
                });
                $('#searchTanques').on('keyup', function () {
                    table.search(this.value).draw();
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>