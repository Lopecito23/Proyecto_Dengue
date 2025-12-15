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
                            <i class="fas fa-swimming-pool me-2"></i>Crear Tanque
                        </h3>
                    </div>

                    <!-- Formulario -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Formulario de Tanque
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="<?= getUrl('Tanques', 'Tanques', 'postCreate'); ?>" method="POST">

                                        <div class="row">
                                            <!-- Zoocriadero -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    Zoocriadero (dirección) <span class="text-danger">*</span>
                                                </label>
                                                <select name="id_zoo" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($zoos as $z): ?>
                                                        <option value="<?= $z['id_zoocriadero']; ?>">
                                                            <?= htmlspecialchars($z['direccion']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Nombre -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    Nombre del tanque <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="nombre" class="form-control" required>
                                            </div>

                                            <!-- Alto -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-bold">Alto (m)</label>
                                                <input type="number" step="0.01" name="medidas_alto"
                                                    class="form-control" required>
                                            </div>

                                            <!-- Ancho -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-bold">Ancho (m)</label>
                                                <input type="number" step="0.01" name="medidas_ancho"
                                                    class="form-control" required>
                                            </div>

                                            <!-- Profundo -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-bold">Profundo (m)</label>
                                                <input type="number" step="0.01" name="medidas_profundo"
                                                    class="form-control" required>
                                            </div>

                                            <!-- Tipo de tanque -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    Tipo de tanque <span class="text-danger">*</span>
                                                </label>
                                                <select name="id_tipo_tanque" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($tipos as $t): ?>
                                                        <option value="<?= $t['id']; ?>">
                                                            <?= htmlspecialchars($t['nombre']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Cantidad peces -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label fw-bold">Cantidad de peces</label>
                                                <input type="number" name="cantidad_peces" class="form-control"
                                                    value="0" min="0">
                                            </div>

                                            <!-- Estado -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label fw-bold">Estado</label>
                                                <select name="id_estado" class="form-select" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($estados as $e): ?>
                                                        <option value="<?= $e['id_estado']; ?>">
                                                            <?= htmlspecialchars($e['nombre_estado']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Botones -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="<?= getUrl('Tanques', 'Tanques', 'getAll'); ?>"
                                                class="btn btn-secondary">
                                                Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                Guardar Tanque
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

</body>

</html>