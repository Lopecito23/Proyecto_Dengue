<?php


if (isset($_SESSION['nombre'])) {

	$nombre = $_SESSION['nombre'];
	// $apellido = $_SESSION['apellido'];
	// $rol = $_SESSION['rol'];

} else {
	// Definición de variables de respaldo para que no falle el HTML
	$nombre = "juannollego";
	$apellido = "";
	$rol = "Invitado";
}
// 
// unction getRoles()
// {
// 	$obj = new MasterModel();
// 	$sql = "SELECT * FROM rol";
// 	$roles = $obj->select($sql);

// 	if ($roles) {
// 		$roles_data = pg_fetch_all($roles);
// 	} else {
// 		$roles_data = [];
// 	}
// 	return $roles_data;
// }
// function usuarioAcutual()
// {

//   $obj = new MasterModel();
//   $sql = "SELECT * FROM usuario WHERE id = '{$_SESSION['id']}' AND correo = '{$_SESSION['correo']}'";
//   $usuario = $obj->select($sql);
//   if ($usuario) {
// 	  $usuario_data = pg_fetch_assoc($usuario);
//   } else {
// 	  $usuario_data = [];
//   }
// }
// $usuario_data = usuarioAcutual();
?>


<div class="main-header">
	<div class="main-header-logo">
		<!-- Logo Header -->
		<div class="logo-header" data-background-color="white">
			<a href="index.php" class="logo">
				<span class="navbar-brand" style="color: #2c3e50 !important; font-weight: 600;">
					Sistema ETV - Control Dengue
				</span>
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

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
		<div class="container-fluid">

			<!-- Botón menú móvil -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"
					style="background-image: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3e%3cpath stroke=%27rgba(44, 62, 80, 1)%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 stroke-width=%272%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3e%3c/svg%3e');"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto align-items-center">

					<!-- Notificaciones -->
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown" style="color: #2c3e50 !important;">
							<i class="fas fa-bell" style="color: #2c3e50;"></i>
							<span class="badge badge-danger badge-count"
								style="position: absolute; top: 8px; right: 8px;">3</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="#">Nueva actividad registrada</a></li>
							<li><a class="dropdown-item" href="#">Reporte pendiente</a></li>
						</ul>
					</li>

					<!-- Usuario -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
							style="color: #2c3e50 !important;">
							<img src="https://ui-avatars.com/api/?name=Usuario+Admin&background=4DD0E1&color=fff"
								class="rounded-circle" width="35" height="35" alt="Usuario">
							<span class="ms-2" style="color: #2c3e50 !important;"><?php echo $nombre ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item"
									href="<?php echo getUrl("Perfil", "MiPerfil", "Mostrarperfil", false, "ajax"); ?>"><i
										class="fas fa-user me-2"></i>Mi Perfil</a></li>
							<li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item text-danger"
									href="<?php echo getUrl("Acceso", "Acceso", "logout", false, "ajax"); ?>"><i
										class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
</div>