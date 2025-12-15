<!-- Sidebar -->
<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="index.php" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="Sistema ETV" class="navbar-brand" height="20">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <!-- Dashboard -->
                <li class="nav-item active">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- SECCIÓN ADMINISTRACIÓN -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Administración</h4>
                </li>


                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#usuarios">
                        <i class="fas fa-users"></i>
                        <p>Usuarios</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="usuarios">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Usuarios", "Usuarios", "list"); ?>">
                                    <span class="sub-item">Listar Usuarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Usuarios", "Usuarios", "create"); ?>">
                                    <span class="sub-item">Nuevo Usuario</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="listrol.php#roles">
                        <i class="fas fa-user-shield"></i>
                        <p>Roles</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="roles">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Roles", "Roles", "list"); ?>">
                                    <span class="sub-item">Listar Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Roles", "Roles", "create"); ?>">
                                    <span class="sub-item">Nuevo Rol</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Módulos del Sistema</h4>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="listzoocriadero.php#zoocriadero">
                        <i class="fas fa-user-shield"></i>
                        <p>Zoocriadero</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="zoocriadero">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Zoocriadero", "Zoocriadero", "getAll"); ?>">
                                    <span class="sub-item">Listar Zoocriadero</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Zoocriadero", "Zoocriadero", "getCreate"); ?>">
                                    <span class="sub-item">Nuevo Zoocriadero</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="listactividades.php#actividades">
                        <i class="fas fa-user-shield"></i>
                        <p>Actividades</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="actividades">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Actividades", "Actividades", "getAll"); ?>">
                                    <span class="sub-item">Listar Actividades</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Actividades", "Actividades", "getCreate"); ?>">
                                    <span class="sub-item">Nueva Actividad</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="listTanques.php#tanques">
                        <i class="fas fa-user-shield"></i>
                        <p>Tanques</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tanques">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Tanques", "Tanques", "getAll"); ?>">
                                    <span class="sub-item">Listar Tanques</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Tanques", "Tanques", "getCreate"); ?>">
                                    <span class="sub-item">Nuevo Tanque</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="listSeguimientos.php#seguimientos">
                        <i class="fas fa-user-shield"></i>
                        <p>Seguimientos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="seguimientos">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo getUrl("Seguimientos", "Seguimientos", "getCreate"); ?>"
                                    class="disabled-link">
                                    <span class="sub-item">Crear Seguimientos</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo getUrl("Seguimientos", "Seguimientos", "getList"); ?>">
                                    <span class="sub-item">Listar Seguimientos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a href="#" class="disabled-link">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>Mapas SIG</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo getUrl("Reportes", "Reportes", "getAll"); ?>" class="disabled-link">
                        <i class="far fa-chart-bar"></i>
                        <p>Reportes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo getUrl("Movimientos", "Movimientos", "getAll"); ?>" class="disabled-link">
                        <i class="far fa-chart-bar"></i>
                        <p>Movimientos</p>
                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>