<?php
include("Conexion/Conexion.php");
session_start();
?>

<?php
if (isset($_POST['login'])) {

	$nombreUsuario = $_POST['Usuario_Login'];
	$claveUsuario = $_POST['Usuario_Password'];
	$_SESSION['Usuario_Password'] = $nombreUsuario;


	$c = new Conexion();
	$cone = $c->conectando();
	$query = "SELECT * from usuarios WHERE Login='$nombreUsuario' and Password='$claveUsuario' ";


	$rs = mysqli_query($cone, $query);


	$filas = mysqli_num_rows($rs); //si los datos coinciden sera 1 (true) o 0 (false)

	if ($filas > 0) {

		header("location:home.html");

	} else {
		echo '<script type="text/javascript">
    alert("Usuario y clave no existen");
    window.location.href="index.html";
    </script>';

	}
	mysqli_free_result($rs);
	mysqli_close($conexion);

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

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

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="./js/sweetalert2.min.js"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>

	<div class="login-container" method="POST">
		<div class="login-content">

			<p class="text-center">
				<img src="./assets/avatar/logoc.png" alt="avatar">
			</p>
			<p class="text-center">

				Inicia sesión con tu cuenta
			</p>
			<form action="login.php" method="post">
				<div class="form-group">
					<label for="Usuario_Login" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp;
						Usuario</label>
					<input type="text" class="form-control" id="Usuario_Login" name="Usuario_Login">
				</div>
				<div class="form-group">
					<label for="Usuario_Password" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp;
						Contraseña</label>
					<input type="password" class="form-control" id="Usuario_Password" name="Usuario_Password"
						maxlength="20">
				</div>

				<center>
					<input type="submit" value="Iniciar Sesión">
				</center>
				<br>
				<a href="recuperar.php" type="submit">¿Olvidaste tu contraseña?</button>
			</form>
		</div>
	</div>


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