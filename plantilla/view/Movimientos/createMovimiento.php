<?php
// Manejo de variables de sesión
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $id_responsable = $_SESSION['id_responsable'] ?? ''; 
} else {
    $nombre = "Usuario Desconocido";
    $id_responsable = ""; 
}
// Asumimos que el controlador inyecta:
// $zoos (para Origen y Destino)
// $tipos_movimiento (para id_tipo_mov) 
?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Registrar Nuevo Movimiento de Organismos</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item">
                <a href="#">Movimientos</a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registro de Traslado/Cambio de Stock</h4>
                </div>

                <form action="<?php echo getUrl("Movimientos", "Movimientos", "postCreate"); ?>" method="POST">
                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha del Movimiento <span class="required-label">*</span></label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre_responsable_display">Responsable <span class="required-label">*</span></label>
                                    <input type="text" class="form-control" disabled placeholder="Nombre Responsable"
                                        value="<?php echo htmlspecialchars($nombre); ?>" id="nombre_responsable_display">
                                    <input type="hidden" name="id_usuario_responsable" value="<?php echo $id_responsable; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_tipo_mov">Tipo de Movimiento <span class="required-label">*</span></label>
                                    <select class="form-control" id="id_tipo_mov" name="id_tipo_mov" required>
                                        <option value="">Seleccione el tipo...</option>
                                        <?php 
                                        // Asume que $tipos_movimiento contiene id y nombre del tipo
                                        if (isset($tipos_movimiento) && is_array($tipos_movimiento)):
                                            foreach ($tipos_movimiento as $tipo): ?>
                                                <option value="<?= $tipo['id_tipo_mov']; ?>">
                                                    <?= htmlspecialchars($tipo['nombre']); ?>
                                                </option>
                                            <?php endforeach; 
                                        endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12"><h5 class="mt-3">Ubicación y Conteo</h5></div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="origen" class="form-label fw-bold">
                                        Origen (Zoocriadero/Tanque) <span class="text-danger">*</span>
                                    </label>
                                    <select name="origen" id="origen" class="form-select" required>
                                        <option value="">Seleccione Zoocriadero/Tanque de Origen</option>
                                        <?php 
                                        // Si $zoos solo tiene Zoocriaderos, necesitas cargar los tanques aquí
                                        if (isset($zoos) && is_array($zoos)):
                                            foreach ($zoos as $z): ?>
                                                <option value="<?= $z['id_zoocriadero']; ?>">
                                                    [Z] <?= htmlspecialchars($z['direccion']); ?>
                                                </option>
                                            <?php endforeach; 
                                        endif; ?>
                                        </select>
                                    <small class="form-text text-muted">ID de la ubicación de donde salen los organismos.</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destino">Destino (Zoocriadero/Tanque) <span class="required-label">*</span></label>
                                    <select name="destino" id="destino" class="form-select" required>
                                        <option value="">Seleccione Zoocriadero/Tanque de Destino</option>
                                        <?php 
                                        // Mismo listado, si la estructura de origen/destino es la misma
                                        if (isset($zoos) && is_array($zoos)):
                                            foreach ($zoos as $z): ?>
                                                <option value="<?= $z['id_zoocriadero']; ?>">
                                                    [Z] <?= htmlspecialchars($z['direccion']); ?>
                                                </option>
                                            <?php endforeach; 
                                        endif; ?>
                                    </select>
                                    <small class="form-text text-muted">ID de la ubicación a donde llegan los organismos.</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad_peces">Cantidad de Organismos <span class="required-label">*</span></label>
                                    <input type="number" class="form-control" id="cantidad_peces" name="cantidad_peces" placeholder="Número total de peces movidos" min="1" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"
                                        placeholder="Motivo del movimiento, estado de los peces, detalles adicionales..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-share mx-1"></i> Registrar Movimiento
                        </button>
                        <a href="<?php echo getUrl("Movimientos", "Movimientos", "getList") ?>" class="btn btn-danger">
                            <i class="fa fa-times mx-1"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>