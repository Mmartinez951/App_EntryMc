<?php
include("./modelo/DocumentoOrdenesTrabajo.php");
$obj = new Ordenes_Trabajo();
if ($_POST){

    $obj->Id_Orden_Trabajo  = $_POST['Id_Orden_Trabajo'];
    $obj->Id_Vehiculo = $_POST['Id_Vehiculo'];
    $obj->Codigo = $_POST['Codigo_Vehiculo'];
    $obj->Placa = $_POST['Placa'];
    $obj->Marca = $_POST['Marca'];
    $obj->Modelo = $_POST['Modelo'];
    $obj->LLantas = $_POST['Llantas'];
    $obj->Ventanas = $_POST['Ventanas'];
    $obj->Asignar  = $_POST['Asignar'];
    $obj->Luces  = $_POST['Luces'];
    $obj->Retrovisores  = $_POST['Retrovisores'];
    $obj->Rayones  = $_POST['Rayones'];
    $obj->Tipo_Mantemiento   = $_POST['Tipo_Mantenimiento'];
    $obj->Observaciones  = $_POST['Observaciones'];
    $obj->Fecha_Orden_Trabajo  = $_POST['Fecha_Orden_Trabajo'];
    $obj->Estado_Orden_Trabajo = $_POST['Nombre_Estado_Orden'];
}

if(isset($_POST['Guardar'])){
    $obj->Agregar(); 
}

if(isset($_POST['Modificar'])){
    $obj->Modificar();
}

/* if(isset($_POST['Eliminar'])){
    $obj->Eliminar();
}
if(isset($_POST['limpia'])){
    $obj->limpiar();
} */


?>