<?php
// =======================================================
// INCLUSIÓN DE PARTIALS (Layout Principal)
// NOTA: Estas rutas asumen que estás en 'view/reportes/' y los partials en 'view/partials/'
// Si la estructura de carpetas es diferente, ajusta las rutas de los 'include'.
// =======================================================

// 1. INCLUIR EL ENCABEZADO Y EL INICIO DE BODY/HTML

?>

<div id="wrapper">

  
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">



            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Módulo de Reportes de Control Biológico</h1>

                <div class="row">

                    <div class="col-lg-9">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Estadísticas de Casos y Liberación (Mensual)
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-right">
                                    <button class="btn btn-sm btn-outline-success">Exportar</button>
                                    <button class="btn btn-sm btn-outline-primary">Imprimir</button>
                                </p>

                                <div class="chart-area" style="height: 350px;">
                                    <p class="text-center text-muted">Contenido de la Gráfica de Casos...</p>
                                </div>
                                <hr>
                                <div class="text-center mt-4">
                                    <span class="mr-2"><i class="fas fa-circle text-danger"></i> Casos Confirmados</span>
                                    <span class="mr-2"><i class="fas fa-circle text-warning"></i> Liberación de Peces</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Resumen de Focos
                                </h6>
                            </div>
                            <div class="card-body text-center">
                                <p class="text-right">
                                    <button class="btn btn-sm btn-outline-success">Exportar</button>
                                </p>
                                <h1 class="display-4 text-success font-weight-bold">
                                    <?php echo rand(10, 50); // Valor de ejemplo ?>
                                </h1>
                                <p class="lead text-gray-800">
                                    Nuevos Focos Detectados
                                </p>
                                <p class="text-muted small">
                                    Últimos 7 días
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
                
                <hr class="sidebar-divider my-5">


                <h3 class="h4 mb-3 text-gray-800">🎣 Reportes de Peces (Liberación)</h3>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de Monitoreo de Peces Controladores</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTablePeces" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Reporte</th>
                                        <th>Zoocriadero Origen</th>
                                        <th>Tipo de Pez</th>
                                        <th>Cantidad Liberada</th>
                                        <th>Ubicación (Coordenadas)</th>
                                        <th>Fecha de Liberación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>PZ001</td><td>El Manantial</td><td>Gambusia Affinis</td><td>500</td><td>10.456, -74.123</td><td>12/11/2025</td><td><button class="btn btn-sm btn-info">Ver</button></td></tr>
                                    <tr><td>PZ002</td><td>La Laguna</td><td>Poecilia Reticulata</td><td>800</td><td>10.789, -74.456</td><td>01/12/2025</td><td><button class="btn btn-sm btn-info">Ver</button></td></tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h3 class="h4 mb-3 text-gray-800">🏡 Reportes de Zoocriaderos</h3>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de Inspecciones y Producción</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableZoocriaderos" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Zoocriadero</th>
                                        <th>Nombre</th>
                                        <th>Responsable</th>
                                        <th>Última Inspección</th>
                                        <th>Estado</th>
                                        <th>Producción (último mes)</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>ZOO001</td><td>El Manantial</td><td>Juan Pérez</td><td>05/12/2025</td><td>Activo</td><td>5,000 larvas</td><td><button class="btn btn-sm btn-info">Detalles</button></td></tr>
                                    <tr><td>ZOO002</td><td>Río Calmo</td><td>María Gómez</td><td>20/11/2025</td><td>Activo</td><td>7,500 larvas</td><td><button class="btn btn-sm btn-info">Detalles</button></td></tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

      
            </div> <?php 
        
        include '../view/partials/footer.php'; 
        ?>

    </div> </div> <?php 
// 6. INCLUIR SCRIPTS Y CIERRE FINAL
include '../view/partials/scripts.php'; 
?>