<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">📋 Listado de Seguimientos Realizados</h3>
    </div>
    <div class="card-body">
        
        <div class="d-flex justify-content-between mb-4">
            <input type="text" class="form-control w-25" placeholder="Buscar por Responsable o Tanque...">
            
            <a href="<?php echo getUrl("Seguimientos","Seguimientos","getCreate") ?>" class="btn btn-success">
                <i class="fa fa-plus"></i> Nuevo Seguimiento
            </a>
        </div>

        <div class="accordion" id="accordionSeguimientos">
            
            <?php 
            // 1. Verificar si hay datos inyectados por el controlador en la variable $seguimientos_data
            if (isset($seguimientos_data) && is_array($seguimientos_data) && count($seguimientos_data) > 0): 
                
                foreach ($seguimientos_data as $index => $seguimiento):
                    // Generación de IDs únicas basadas en el ID del seguimiento para el collapse de Bootstrap
                    $collapse_id = 'collapse-' . $seguimiento['id']; 
                    $heading_id = 'heading-' . $seguimiento['id'];
            ?>
            
            <div class="card mb-2 shadow-sm">
                
                <div class="card-header p-0" id="<?php echo $heading_id; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left p-3 collapsed" 
                                style="background-color: #f8f9fa; border: none; font-weight: 500;"
                                type="button" 
                                data-toggle="collapse" 
                                data-target="#<?php echo $collapse_id; ?>" 
                                aria-expanded="false" 
                                aria-controls="<?php echo $collapse_id; ?>">
                            
                            <div class="row align-items-center">
                                <div class="col-md-4 text-dark font-weight-bold">
                                    Seguimiento #<?php echo $seguimiento['id']; ?> 
                                    <span class="badge badge-primary ml-2"><?php echo $seguimiento['nombre_tanque']; ?></span>
                                </div>
                                <div class="col-md-4 text-secondary">
                                    <i class="fas fa-user-circle mr-1"></i> Responsable: <strong><?php echo $seguimiento['nombre_responsable']; ?></strong>
                                </div>
                                <div class="col-md-4 text-right">
                                    <i class="fas fa-calendar-alt mr-1"></i> Fecha: <?php echo date('d/m/Y', strtotime($seguimiento['fecha'])); ?>
                                    <i class="fas fa-chevron-down ml-3"></i>
                                </div>
                            </div>
                        </button>
                    </h2>
                </div>
                
                <div id="<?php echo $collapse_id; ?>" 
                     class="collapse" 
                     aria-labelledby="<?php echo $heading_id; ?>" 
                     data-parent="#accordionSeguimientos">
                    
                    <div class="card-body">
                        <h5>Detalle Completo del Seguimiento</h5>
                        <hr class="mt-1 mb-3">
                        <div class="row">
                            
                            <div class="col-md-4 border-right">
                                <h6>Información del Zoocriadero</h6>
                                <ul>
                                    <li><strong>ID:</strong> <?php echo $seguimiento['id_zoo']; ?></li>
                                    <li><strong>Ubicación:</strong> <?php echo $seguimiento['direccion_zoocriadero']; ?></li>
                                    <li><strong>Realizado por:</strong> <?php echo $seguimiento['nombre_responsable']; ?></li>
                                </ul>
                            </div>
                            
                            <div class="col-md-8">
                                <h6>Registros de Actividades y Parámetros</h6>
                                <?php 
                                // Iterar sobre los detalles de seguimiento_detalle
                                if (count($seguimiento['detalles']) > 0): 
                                    foreach ($seguimiento['detalles'] as $detalle): 
                                ?>
                                    <div class="alert alert-light p-2 mb-2 border">
                                        <p class="mb-1"><strong>Actividad:</strong> <?php echo $detalle['nombre_actividad']; ?></p>
                                        <p class="mb-1 small">
                                            Temp: <?php echo $detalle['temperatura']; ?> °C | 
                                            pH: <?php echo $detalle['ph']; ?> | 
                                            Cloro: <?php echo $detalle['cloro']; ?> mg/L
                                        </p>
                                        <p class="mb-0 small">Obs: <?php echo $detalle['observaciones']; ?></p>
                                    </div>
                                <?php 
                                    endforeach; 
                                else: ?>
                                    <div class="alert alert-warning">No se registraron actividades detalladas.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <?php 
                endforeach; 
            else: 
            ?>
                <div class="alert alert-info mt-3">No se encontraron seguimientos para listar.</div>
            <?php endif; ?>

        </div>
    </div>
</div>