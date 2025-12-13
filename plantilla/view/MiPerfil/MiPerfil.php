<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include '../view/partials/header.php'; ?>
</head>

<body>
    <div class="wrapper">

        <?php include '../view/partials/sidebar.php'; ?>

        <div class="main-panel">

            <?php include '../view/partials/navbar.php'; ?>

            <div class="container">
                <div class="page-inner">

                    <div class="page-header">
                        <h3 class="fw-bold mb-3">
                            <i class="fas fa-user-circle me-2"></i>Mi Perfil
                        </h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">...</li>
                            <li class="separator"><i class="icon-arrow-right"></i></li>
                            <li class="nav-item active">Perfil</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="card-title mb-0 fw-bold">
                                        <i class="fas fa-address-card me-2"></i>Información Personal
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($usuario) && $usuario_data): ?>

                                        <div class="row">

                                            <div class="col-md-8">

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 fw-bold">ID:</label>
                                                    <div class="col-sm-8">
                                                        <span
                                                            class="form-control-plaintext"><?= $usuario_data['id'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 fw-bold">Nombre Completo:</label>
                                                    <div class="col-sm-8">
                                                        <span class="form-control-plaintext">
                                                            <?= $usuario_data['nombre'] ?>     <?= $usuario_data['apellido'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-4 fw-bold">Rol en el Sistema:</label>
                                                    <div class="col-sm-8">
                                                        <span class="badge badge-info fs-6">
                                                            <i class="fas fa-user-tag me-1"></i><?= $usuario_data['rol'] ?>
                                                        </span>
                                                    </div>
                                                </div>

                                                <?php if (isset($usuario_data['fecha_registro'])): ?>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 fw-bold">Miembro Desde:</label>
                                                        <div class="col-sm-8">
                                                            <span class="form-control-plaintext">
                                                                <i
                                                                    class="fas fa-calendar-alt me-1 text-muted"></i><?= date("d/m/Y", strtotime($usuario_data['fecha_registro'])) ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-danger text-center">
                                            <i class="fas fa-exclamation-triangle me-2"></i>No se pudieron cargar los datos
                                            de tu perfil.
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>



                
            </div>

            <?php include '../view/partials/footer.php'; ?>

        </div>

    </div>

    <?php include '../view/partials/scripts.php'; ?>

</body>

</html>