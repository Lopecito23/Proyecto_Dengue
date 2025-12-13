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
            <div class="container">
                <div class="page-inner">

                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-plus-circle me-2"></i>Crear Zoocriadero
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="../../web/index.php"><i class="icon-home"></i></a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">Control Biológico</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item">
                                <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "getAll") ?>">Zoocriaderos</a>
                            </li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Crear</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Formulario de Zoocriadero
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form action="<?= getUrl("Zoocriadero", "Zoocriadero", "postCreate") ?>"
                                        method="POST" id="formZoocriadero">

                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-map-marker-alt me-1"></i>Dirección <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="dirrecion"
                                                    placeholder="Ej: Calle 10 # 20-30, Barrio Centro" required>
                                                <small class="text-muted">Ingrese la dirección completa del
                                                    zoocriadero</small>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user-tie me-1"></i>Responsable <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-select" name="documento" required>
                                                    <option value="">Seleccione un usuario</option>
                                                    <?php if (isset($usuarios_data) && count($usuarios_data) > 0): ?>
                                                        <?php foreach ($usuarios_data as $usuario): ?>
                                                            <option value="<?= $usuario['documento'] ?>">
                                                                <?= $usuario['nombre'] ?>         <?= $usuario['apellido'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <small class="text-muted">Usuario responsable del zoocriadero</small>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-map-pin me-1"></i>Coordenadas <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="number" class="form-control" name="coordenadas"
                                                    step="0.00001" placeholder="Ej: 3.43722" required>
                                                <small class="text-muted">Coordenadas geográficas del lugar</small>
                                            </div>

                                        </div>

                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Nota:</strong> Las coordenadas pueden obtenerse desde Google Maps.
                                            Haga clic derecho en el mapa y seleccione "¿Qué hay aquí?" para ver las
                                            coordenadas.
                                        </div>

                                        <!-- Mapa de ejemplo (opcional) -->
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <h6 class="fw-bold mb-2">
                                                    <i class="fas fa-question-circle me-1"></i>¿Cómo obtener
                                                    coordenadas?
                                                </h6>
                                                <ol class="mb-0 small">
                                                    <li>Abre <a href="https://maps.google.com" target="_blank">Google
                                                            Maps</a></li>
                                                    <li>Busca la ubicación del zoocriadero</li>
                                                    <li>Haz clic derecho en el punto exacto</li>
                                                    <li>Copia las coordenadas que aparecen en la parte superior</li>
                                                </ol>
                                            </div>
                                        </div>

                                        <!-- Botones -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "getAll") ?>"
                                                class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i>Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i>Guardar Zoocriadero
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


    <?php include_once '../view/partials/scripts.php'; ?>

    <!-- <script>
        document.getElementById('formZoocriadero').addEventListener('submit', function (e) {
            const coordenadas = document.querySelector('input[name="coordenadas"]').value;

            
            if (coordenadas < -90 || coordenadas > 90) {
                e.preventDefault();
                alert('Las coordenadas deben estar entre -90 y 90');
                return false;
            }
        });
    </script> -->

</body>

</html>