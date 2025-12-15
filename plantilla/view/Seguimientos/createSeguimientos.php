<?php
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    // Obtener la ID del responsable si está en la sesión (NECESARIA para la tabla seguimiento)
    $id_responsable = $_SESSION['id_responsable'] ?? ''; 
} else {
    $nombre = "";
    $id_responsable = ""; 
}
// Asumimos que $zoos y $actividades_data han sido inyectados por el controlador
?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Nuevo Seguimiento</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item">
                <a href="<?php echo getUrl("Seguimientos", "Seguimientos", "getList") ?>">Lista de Seguimiento</a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registro de Seguimiento</h4>
                </div>

                <form action="<?php echo getUrl("Seguimientos", "Seguimientos", "save"); ?>" method="POST">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">Fecha del Seguimiento <span
                                            class="required-label">*</span></label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_responsable_display">Responsable <span
                                            class="required-label">*</span></label>
                                    <input type="text" class="form-control" disabled placeholder="Nombre Responsable"
                                        value="<?php echo htmlspecialchars($nombre); ?>" id="nombre_responsable_display">
                                    <input type="hidden" name="id_responsable" value="<?php echo $id_responsable; ?>">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="id_zoocriadero" class="form-label fw-bold">
                                        Zoocriadero (dirección) <span class="text-danger">*</span>
                                    </label>
                                    <select name="id_zoo" id="id_zoocriadero" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <?php 
                                        // Usando la variable $zoos que tu controlador inyectó
                                        if (isset($zoos) && is_array($zoos)):
                                            foreach ($zoos as $z): ?>
                                                <option value="<?= $z['id_zoocriadero']; ?>">
                                                    <?= htmlspecialchars($z['direccion']); ?>
                                                </option>
                                            <?php endforeach; 
                                        endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_tanque">Tanque Asociado <span class="required-label">*</span></label>
                                    <select class="form-control" id="id_tanque" name="id_tanque" required disabled>
                                        <option value="">Seleccione primero un Zoocriadero</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_actividad">Actividad Realizada <span
                                            class="required-label">*</span></label>
                                    <select class="form-control" id="id_actividad" name="id_actividad" required>
                                        <option value="">Seleccione una actividad</option>
                                        <?php if (isset($actividades_data) && count($actividades_data) > 0): ?>
                                            <?php foreach ($actividades_data as $actividades): ?>
                                                <option value="<?php echo $actividades['id_actividad']; ?>">
                                                    <?php echo $actividades['nombre']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12"><h5 class="mt-3">Parámetros del Agua</h5></div>
                            <div class="col-md-4"><div class="form-group"><label for="temperatura">Temperatura (°C)</label><input type="number" step="0.01" class="form-control" id="temperatura" name="temperatura" placeholder="Ej: 25.5"></div></div>
                            <div class="col-md-4"><div class="form-group"><label for="ph">pH</label><input type="number" step="0.1" class="form-control" id="ph" name="ph" placeholder="Ej: 7.2"></div></div>
                            <div class="col-md-4"><div class="form-group"><label for="cloro">Cloro (mg/L)</label><input type="number" step="0.01" class="form-control" id="cloro" name="cloro" placeholder="Ej: 0.5"></div></div>
                            
                            <div class="col-md-12"><h5 class="mt-3">Conteo y Novedades</h5></div>
                            <div class="col-md-3"><div class="form-group"><label for="num_alevines">N° Alevines</label><input type="number" class="form-control" id="num_alevines" name="num_alevines" placeholder="0" min="0"></div></div>
                            <div class="col-md-3"><div class="form-group"><label for="num_machos">N° Machos</label><input type="number" class="form-control" id="num_machos" name="num_machos" placeholder="0" min="0"></div></div>
                            <div class="col-md-3"><div class="form-group"><label for="num_hembras">N° Hembras</label><input type="number" class="form-control" id="num_hembras" name="num_hembras" placeholder="0" min="0"></div></div>
                            <div class="col-md-3"><div class="form-group"><label for="num_muertes">N° Muertes</label><input type="number" class="form-control" id="num_muertes" name="num_muertes" placeholder="0" min="0"></div></div>

                            <div class="col-md-12"><div class="form-group"><label for="total">Total de Organismos (Opcional)</label><input type="number" class="form-control" id="total" name="total" placeholder="Suma de Machos, Hembras y Alevines"></div></div>

                            <div class="col-md-12"><div class="form-group"><label for="observaciones">Observaciones</label><textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Detalles relevantes del seguimiento..."></textarea></div></div>
                        </div>

                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save mx-1"></i> Guardar Seguimiento
                        </button>
                        <a href="<?php echo getUrl("Seguimiento", "Seguimiento", "getList") ?>" class="btn btn-danger">
                            <i class="fa fa-times mx-1"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Definir la URL de AJAX. (Asegúrate que esta ruta funcione después de corregir el error 404)
    const URL_TANQUES_AJAX = '<?php echo getUrl("Seguimientos", "Seguimientos", "getTanquesByZoocriadero"); ?>';
</script>
<script src="../view/Seguimientos/js/Script.js"></script>