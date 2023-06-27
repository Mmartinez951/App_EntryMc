<?php
include("./Conexion/Conexion.php");
// Nombre, apellido y rol en pantalla
session_start(); // Iniciar sesión o reanudar una sesión existente

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['Usuario_Id'])) {
	// El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
	header("Location: index.php");
	exit();
}

// Conexión a la base de datos
/* $conexion = new mysqli($servidor = "localhost", $usuario = "root", $password = "", $db = "entry_mc"); */
$c = new Conexion();
$cone = $c->conectando();

// Verificar si la conexión fue exitosa
/* if ($cone->connect_errno) {
	echo 'Error al conectar a la base de datos: ' . $cone->connect_error;
	exit();
} */

// Obtener el ID del usuario autenticado desde la sesión
$usuario_id = $_SESSION['Usuario_Id'];

// Consulta para obtener el nombre de usuario, apellido de usuario y el nombre de rol del usuario autenticado
$sql = "SELECT u.Nombre_Usuario, u.Apellido_Usuario, r.Nombre_Rol FROM Usuarios u JOIN Roles r ON u.Id_Rol = r.Id_Rol WHERE u.Id_Usuario = $usuario_id";
$resultado = $cone->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
	$fila = $resultado->fetch_assoc();
	$nombre_usuario = $fila["Nombre_Usuario"];
	$apellido_usuario = $fila["Apellido_Usuario"];
	$nombre_rol = $fila["Nombre_Rol"];
} else {
	$nombre_usuario = "";
	$apellido_usuario = "";
	$nombre_rol = "";
}

// Cerrar la conexión a la base de datos
$cone->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>


	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="./css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="./css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="./js/sweetalert2.min.js"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">


</head>

<body>

	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="./assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<small class="roboto-condensed-light">Bienvenido,
						<?php echo $nombre_usuario; ?>
							<?php echo $apellido_usuario; ?>
							<p>Rol:
								<?php echo $nombre_rol; ?>
							</p>
							<br>
						</small>
					</figcaption>
				</figure>

				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-sliders-h"></i> &nbsp; Administracion
								<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="client-list.php"><i class="fas fa-user fa-fw"></i> &nbsp; Usuarios</a>
								</li>
								<li>
									<a href="Vehiculo-list.php"><i class="fas fa-bus-alt"></i> &nbsp; Vehículos</a>
								</li>
								<li>
									<a href="roles.php"><i class="fas fa-briefcase"></i> &nbsp; Roles</a>
								</li>
								<li>
									<a href="client-search.html"><i class="fas fa-key"></i> &nbsp; Permisos</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-keyboard"></i> &nbsp; Registros Patios
								<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="Registro-Entrada-List.php"><i class="fas fa-bus"></i> &nbsp; Entrada
										Vehiculos</a>
								</li>
								<li>
									<a href="Registro-Salida-list.php"><i class="fas fa-bus"></i> &nbsp; Salida
										Vehiculos</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-search"></i> &nbsp; Consultas <i
									class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="Ordenes-Trabajo-List.php"><i class="fas fa-ticket-alt"></i> &nbsp; Ordenes
										de
										Trabajo</a>
								</li>
						</li>
					</ul>
					</li>
					</ul>
				</nav>
			</div>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="client-update.php" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
					<a href="index.php" class="btn-exit-system">
						<i class="fas fa-power-off"></i>
					</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; DASHBOARD
				</h3>
				<p class="text-justify">
					Hola, Bienvenido a la Plataforma de Gestión de Vehículos
				</p>
			</div>

			<!-- Content -->
			<div class="full-box tile-container">

				<a href="client-list.php" class="tile">
					<div class="tile-tittle">Usuarios</div>
					<div class="tile-icon">
						<i class="fas fa-users fa-fw"></i>
						<p></p>
					</div>
				</a>

				<a href="Registro-Entrada-List.php" class="tile">
					<div class="tile-tittle">Registros Patios</div>
					<div class="tile-icon">
						<i class="fas fa-pallet fa-fw"></i>
						<p></p>
					</div>
				</a>

				<a href="Vehiculo-list.php" class="tile">
					<div class="tile-tittle">Vehículos</div>
					<div class="tile-icon">
						<i class="fas fa-bus"></i>
						<p></p>
					</div>
				</a>
			</div>


		</section>
	</main>


	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./js/jquery-3.4.1.min.js"></script>

	<!-- popper -->
	<script src="./js/popper.min.js"></script>

	<!-- Bootstrap V4.3 -->
	<script src="./js/bootstrap.min.js"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./js/bootstrap-material-design.min.js"></script>
	<script>$(document).ready(function () { $('body').bootstrapMaterialDesign(); });</script>

	<script src="./js/main.js"></script>
</body>

</html>