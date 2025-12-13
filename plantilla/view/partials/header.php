<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Sistema ETV - Control de Dengue</title>
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
<link rel="icon" href="/plantilla/web/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

<!-- Fonts and icons -->
<script src="/ProyectC/plantilla/web/assets/js/plugin/webfont/webfont.min.js"></script>
<script>
	WebFont.load({
		google: { families: ["Public Sans:300,400,500,600,700"] },
		custom: {
			families: [
				"Font Awesome 5 Solid",
				"Font Awesome 5 Regular",
				"Font Awesome 5 Brands",
				"simple-line-icons",
			],
			urls: ["/ProyectC/ProyectC/plantilla/web/assets/css/fonts.min.css"],
		},
		active: function () {
			sessionStorage.fonts = true;
		},
	});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="/ProyectC/plantilla/web/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="/ProyectC/plantilla/web/assets/css/plugins.min.css" />
<link rel="stylesheet" href="/ProyectC/plantilla/web/assets/css/kaiadmin.min.css" />

<!-- Estilos personalizados -->
<style>
	:root {
		--turquesa-claro: #4DD0E1;
		--turquesa-oscuro: #26C6DA;
		--turquesa-hover: #00BCD4;
		--blanco: #ffffff;
		--gris-claro: #f8f9fa;
		--texto-oscuro: #2c3e50;
	}

	.sidebar[data-background-color="white"] {
		background: var(--blanco) !important;
		box-shadow: 2px 0 10px rgba(0, 0, 0, 0.08);
	}

	.sidebar[data-background-color="white"] .nav-secondary>.nav-item.active>a,
	.sidebar[data-background-color="white"] .nav-secondary>.nav-item>a:hover {
		background: linear-gradient(90deg, var(--turquesa-claro), var(--turquesa-oscuro)) !important;
		color: var(--blanco) !important;
	}

	.sidebar[data-background-color="white"] .nav-secondary .nav-item a {
		color: var(--texto-oscuro);
	}

	.sidebar[data-background-color="white"] .nav-section h4 {
		color: var(--turquesa-oscuro);
		font-weight: 600;
	}

	.logo-header[data-background-color="white"] {
		background: var(--blanco) !important;
		border-bottom: 2px solid var(--turquesa-claro);
	}

	.navbar-header {
		background: var(--blanco) !important;
		border-bottom: 2px solid var(--turquesa-claro);
	}

	.navbar-header .nav-link,
	.navbar-header .nav-link i {
		color: var(--texto-oscuro) !important;
	}

	.btn-primary {
		background: linear-gradient(135deg, var(--turquesa-claro), var(--turquesa-oscuro)) !important;
		border: none !important;
		color: var(--blanco) !important;
	}

	.card {
		border-top: 4px solid var(--turquesa-claro);
	}

	.card-header {
		background: linear-gradient(135deg, var(--turquesa-claro), var(--turquesa-oscuro));
		color: var(--blanco);
	}

	.table thead th {
		background: var(--turquesa-claro);
		color: var(--blanco);
	}

	.badge-info {
		background: var(--turquesa-claro) !important;
	}
</style>