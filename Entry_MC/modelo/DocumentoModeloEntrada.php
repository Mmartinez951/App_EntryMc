<?php
class Registro_Entrada
{
    public $Id_Registro_Entrada;
    public $Id_Vehiculo;
    public $Codigo;
    public $Placa;
    public $Marca;
    public $Modelo;
    public $Nombre_Estado_Registro;
    public $Observaciones;
    public $Fecha_Registro_Entrada;


    function Agregar()
    {
        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from registro_entrada where Placa = ('$this->Placa')";
        $ejecuta = mysqli_query($c, $query);
        if (mysqli_fetch_array($ejecuta)) {
            echo "<script> alert ('Ya existe un registro con esa placa. Recuerde ingresar a editar la información')</script>";
        } else {
            $insert = "insert into Registro_Entrada values( '$this->Id_Registro_Entrada',
                                                                                        '$this->Id_Vehiculo',
                                                                                        '$this->Codigo',
                                                                                        '$this->Placa',
                                                                                        '$this->Marca',
                                                                                        '$this->Modelo',
                                                                                        '$this->Nombre_Estado_Registro',
                                                                                        '$this->Observaciones',
                                                                                        '$this->Fecha_Registro_Entrada'
                                                                                        )";
            //echo ($insert);
            mysqli_query($c, $insert);
            echo "<script> alert('Se creo el registro correctamente')
                location.href='Registro-Entrada-list.php';</script>";
        }
    }
    function Modificar()
    {

        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from registro_entrada where Id_Registro_Entrada = '$this->Id_Registro_Entrada'";
        $ejecuta = mysqli_query($c, $query);
        $update = "update registro_entrada set 
                                                                        Estado_Vehiculo='$this->Nombre_Estado_Registro',
                                                                        Observaciones='$this->Observaciones',
                                                                        Fecha_Registro_Entrada='$this->Fecha_Registro_Entrada'
                                                                        WHERE Id_Registro_Entrada='$this->Id_Registro_Entrada'";
        //echo $update;
        mysqli_query($c, $update);
        echo "<script>
                                                    alert('Los datos fueron actualizados correctamente');
                                                    location.href='Registro-Entrada-list.php';
                                                </script>";

    }
    function ModificarSalida()
    {

        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from registro_entrada where Id_Registro_Entrada = '$this->Id_Registro_Entrada'";
        $ejecuta = mysqli_query($c, $query);
        $update = "update registro_entrada set 
                                                                        Estado_Vehiculo='$this->Nombre_Estado_Registro',
                                                                        Observaciones='$this->Observaciones',
                                                                        Fecha_Registro_Entrada='$this->Fecha_Registro_Entrada'
                                                                        WHERE Id_Registro_Entrada='$this->Id_Registro_Entrada'";
        //echo $update;
        mysqli_query($c, $update);
        echo "<script>
                                                    alert('Los datos fueron actualizados correctamente');
                                                    location.href='Registro-Salida-list.php';
                                                </script>";

    }
    function ModificarVehiculoMantenimiento()
    {

        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from registro_entrada where Id_Registro_Entrada = '$this->Id_Registro_Entrada'";
        $ejecuta = mysqli_query($c, $query);
        $update = "update registro_entrada set 
                                                                        Estado_Vehiculo='$this->Nombre_Estado_Registro',
                                                                        Observaciones='$this->Observaciones',
                                                                        Fecha_Registro_Entrada='$this->Fecha_Registro_Entrada'
                                                                        WHERE Id_Registro_Entrada='$this->Id_Registro_Entrada'";
        //echo $update;
        mysqli_query($c, $update);
        echo "<script>
                                                    alert('Los datos fueron actualizados correctamente');
                                                    location.href='Ordenes-Trabajo-list.php';
                                                </script>";

    }
}