<?php
include("Conexion/Conexion.php");
session_start();

if (isset($_POST['recuperar'])) {
    $correo = $_POST['correo'];

    // Verificar si el correo existe en la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conectando();

    $consulta = "SELECT * FROM usuarios WHERE Correo_Electronico = '$correo'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Generar una nueva contraseña aleatoria
        $nuevaContraseña = generarContraseñaAleatoria();

        // Actualizar la contraseña en la base de datos
        $fila = mysqli_fetch_assoc($resultado);
        $idUsuario = $fila['Id_Usuario'];

        $consulta = "UPDATE usuarios SET password = '$nuevaContraseña' WHERE Id_Usuario = $idUsuario";
        mysqli_query($conn, $consulta);

        // Enviar la nueva contraseña por correo electrónico
        enviarCorreo($correo, $nuevaContraseña);

        // Mostrar mensaje de éxito
        echo '<script>
            alert("Se ha enviado una nueva contraseña a tu correo electrónico.");
            window.location.href = "index.php";
        </script>';
        exit();
    } else {
        // Mostrar mensaje de error
        echo '<script>
            alert("El correo electrónico no está registrado en nuestra base de datos.");
            window.location.href = "recuperar.php";
        </script>';
        exit();
    }

    mysqli_free_result($resultado);
    mysqli_close($conn);
}

// Función para generar una contraseña aleatoria
function generarContraseñaAleatoria()
{
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $longitud = 8;
    $contraseña = '';

    for ($i = 0; $i < $longitud; $i++) {
        $index = rand(0, strlen($caracteres) - 1);
        $contraseña .= $caracteres[$index];
    }

    return $contraseña;
}

// enviar el correo electrónico con la nueva contraseña en pantalla
function enviarCorreo($correo, $contraseña)
{
    echo '<script>
    alert("Tu nueva contraseña es: ' . $contraseña . '");
    window.location.href = "index.php";
</script>';
    exit();
}

/* // Función para enviar el correo electrónico con la nueva contraseña
function enviarCorreo($correo, $contraseña) {
  $asunto = 'Recuperación de contraseña';
  $mensaje = 'Tu nueva contraseña es: ' . $contraseña;
  $cabeceras = 'From: tu_correo@example.com' . "\r\n" .
      'Reply-To: tu_correo@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  if (mail($correo, $asunto, $mensaje, $cabeceras)) {
      echo '<script>
          alert("Se ha enviado un correo electrónico con la nueva contraseña.");
          window.location.href = "index.php";
      </script>';
      exit();
  } else {
      echo '<script>
          alert("Ha ocurrido un error al enviar el correo electrónico.");
          window.location.href = "recuperar.php";
      </script>';
      exit();
  }
} */

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Recuperar Contraseña</title>
</head>

<body>
    <h1>Recuperar Contraseña</h1>
    <form action="recuperar.php" method="post">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <button type="submit" name="recuperar">Recuperar</button>
    </form>
</body>


</html>