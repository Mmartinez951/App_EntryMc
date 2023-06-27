<?php
session_start(); // Iniciar sesión o reanudar una sesión existente
include("Conexion/Conexion.php");
$c = new Conexion();
$cone = $c->conectando();

// Verificar las credenciales del usuario
$Usuario_Login = $_POST['Usuario_Login'];
$Usuario_Password = $_POST['Usuario_Password'];

// Consulta SQL para obtener los datos del usuario
$consulta = "SELECT * FROM usuarios WHERE login = '$Usuario_Login' AND password = '$Usuario_Password'";
$resultado = $cone->query($consulta);

// Comprobar si se encontró un resultado válido
if ($resultado && $resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    $fila = $resultado->fetch_assoc();
    
    // Guardar los datos del usuario en la sesión
    $_SESSION['Usuario_Id'] = $fila['Id_Usuario'];
    $_SESSION['Usuario_Nombre'] = $fila['Nombre_Usuario'];
    $_SESSION['Apellido_Usuario'] = $fila['Apellido_Usuario'];
    $_SESSION['Usuario_Rol'] = $fila['Nombre_Rol'];
    
    // Redirigir a la página de inicio
    header("Location: home.php");
    exit();
} else {
    // Credenciales incorrectas
    echo "<script>
        alert('Usuario o contraseña incorrectos');
        location.href='index.php';
    </script>";
}
?>




