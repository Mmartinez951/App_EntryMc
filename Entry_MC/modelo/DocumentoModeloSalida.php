<?php
class Registro_Salida
{
    public $Id_Registro_Salida;
    public $Id_Vehiculo;
    public $Codigo;
    public $Placa;
    public $Marca;
    public $Modelo;
    public $Nombre_Estado_Registro;
    public $Observaciones;
    public $Fecha_Registro_Salida;


    function Agregar()
    {
        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from registro_entrada where Placa = ('$this->Placa')";
        $ejecuta = mysqli_query($c, $query);
        if (mysqli_fetch_array($ejecuta)) {
            echo "<script> alert ('Ya existe un registro con esa placa. Recuerde ingresar a editar la información')</script>";
        } else {
            $insert = "insert into Registro_Entrada values( '$this->Id_Registro_Salida',
                                                                                                    '$this->Id_Vehiculo',
                                                                                                    '$this->Codigo',
                                                                                                    '$this->Placa',
                                                                                                    '$this->Marca',
                                                                                                    '$this->Modelo',
                                                                                                    '$this->Nombre_Estado_Registro',
                                                                                                    '$this->Observaciones',
                                                                                                    '$this->Fecha_Registro_Salida'
                                                                                                    )";
            //echo ($insert);
            mysqli_query($c, $insert);
            echo "<script> alert('Se creo el registro correctamente')
                            location.href='Registro-Salida-list.php';</script>";
        }
    }
}