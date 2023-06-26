<?php
include("Conexion/Conexion.php");
include("index.php");
session_start();

if($_SESSION['Rol'] !== 'mecanico') {
    // Redirigir a una página de acceso denegado o mostrar un mensaje de error
    header('Location: acceso_denegado.php');
    exit();
}
?>