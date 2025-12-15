<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Listado de Movimientos de Organismos</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#"><i class="flaticon-home"></i></a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item">
                <a href="#">Movimientos</a>
            </li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item">
                <a href="#">Lista</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Movimientos Registrados</h4>
                        <a href="<?php echo getUrl("Movimientos", "Movimientos", "getCreate"); ?>" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Registrar Nuevo Movimiento
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Origen (Zoocriadero)</th>
                                    <th>Destino (Zoocriadero)</th>
                                    <th>Cantidad</th>
                                    <th>Responsable</th>
                                    <th>Observaciones</th>
                                    <th style="width: 10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Aseguramos que la variable exista y sea un array
                                if (isset($movimientos_data) && is_array($movimientos_data)):
                                    foreach ($movimientos_data as $movimiento): 
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($movimiento['id']); ?></td>
                                    
                                    <td><?php echo date('Y-m-d', strtotime($movimiento['fecha'])); ?></td>
                                    
                                    <td><?php echo htmlspecialchars($movimiento['tipo_mov_nombre']); ?></td>

                                    <td><?php echo htmlspecialchars($movimiento['origen_direccion']); ?></td>

                                    <td><?php echo htmlspecialchars($movimiento['destino_direccion']); ?></td>

                                    <td><?php echo htmlspecialchars($movimiento['cantidad_peces']); ?></td>
                                    
                                    <td><?php echo htmlspecialchars($movimiento['responsable_nombre']); ?></td>

                                    <td title="<?php echo htmlspecialchars($movimiento['observaciones']); ?>">
                                        <?php echo substr(htmlspecialchars($movimiento['observaciones']), 0, 30) . (strlen($movimiento['observaciones']) > 30 ? '...' : ''); ?>
                                    </td>

                                    <td>
                                        <div class="form-button-action">
                                            <a href="<?php echo getUrl("Movimientos", "Movimientos", "getUpdate", array("id" => $movimiento['id'])); ?>"
                                                data-toggle="tooltip" title="Editar Movimiento" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo getUrl("Movimientos", "Movimientos", "postDelete", array("id" => $movimiento['id'])); ?>"
                                                data-toggle="tooltip" title="Eliminar Movimiento" class="btn btn-link btn-danger"
                                                onclick="return confirm('¿Está seguro de que desea eliminar este movimiento?');">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    endforeach;
                                else: 
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center">No hay movimientos registrados.</td>
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