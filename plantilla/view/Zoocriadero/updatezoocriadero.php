<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include_once '../partials/header.php'; ?>
</head>
<body>
    <div class="wrapper">
        
        <?php include_once '../partials/sidebar.php'; ?>
        
        <div class="main-panel">
            
            <?php include_once '../partials/navbar.php'; ?>
            
            <div class="container">
                <div class="page-inner">
                    
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-edit me-2"></i>Editar Zoocriadero
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
                            <li class="nav-item active">Editar</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-edit me-2"></i>Actualizar Datos del Zoocriadero
                                    </h4>
                                </div>
                                <div class="card-body">
                                    
                                    <?php if(isset($zoocriadero)): ?>
                                    <form action="<?= getUrl("Zoocriadero", "Zoocriadero", "postUpdate") ?>" method="POST" id="formZoocriadero">
                                        
                                        <input type="hidden" name="id_zoocriadero" value="<?= $zoocriadero['id_zoocriadero'] ?>">
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-map-marker-alt me-1"></i>Dirección <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="dirrecion" 
                                                       value="<?= $zoocriadero['dirrecion'] ?>"
                                                       required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-user-tie me-1"></i>Responsable <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select" name="id_usuario" required>
                                                    <option value="">Seleccione un usuario</option>
                                                    <?php if(isset($usuarios) && count($usuarios) > 0): ?>
                                                        <?php foreach($usuarios as $usuario): ?>
                                                            <option value="<?= $usuario['id'] ?>"
                                                                <?= ($usuario['id'] == $zoocriadero['id_usuario']) ? 'selected' : '' ?>>
                                                                <?= $usuario['nombres'] ?> <?= $usuario['apellidos'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">
                                                    <i class="fas fa-map-pin me-1"></i>Coordenadas <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" 
                                                       class="form-control" 
                                                       name="coordenadas" 
                                                       value="<?= $zoocriadero['coordenadas'] ?>"
                                                       step="0.00001"
                                                       required>
                                            </div>

                                        </div>

                                       <!-- <div class="alert alert-success">
                                            <i class="fas fa-map me-2"></i>
                                            <strong>Ubicación actual:</strong>
                                            <a href="https://www.google.com/maps?q=<?= $zoocriadero['coordenadas'] ?>" 
                                               target="_blank" 
                                               class="alert-link">
                                                Ver en Google Maps
                                            </a>
                                        </div> -->
`
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="<?= getUrl("Zoocriadero", "Zoocriadero", "getAll") ?>" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-1"></i>Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i>Actualizar Zoocriadero
                                            </button>
                                        </div>

                                    </form>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            No se encontró el zoocriadero
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
            <?php include_once '../partials/footer.php'; ?>
            
        </div>
    </div>

 
    <?php include_once '../partials/scripts.php'; ?>
    
</body>
</html>
