<?php
class vehiculos
{
    public $Id_Vehiculo;
    public $Vehiculo_Codigo;
    public $Vehiculo_Placa;
    public $Vehiculo_Marca;
    public $Vehiculo_Modelo;
    public $Vehiculo_Color;
    public $Vehiculo_Tipo;
    public $Vehiculo_Velocidad;
    public $Vehiculo_Estado;


    function Agregar()
    {
        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from vehiculos where Placa = ('$this->Vehiculo_Placa')";
        $ejecuta = mysqli_query($c, $query);
        if (mysqli_fetch_array($ejecuta)) {
            echo "<script> alert ('El vehículo ya existe en el sistema')</script>";
        } else {
            $insert = "insert into vehiculos values( '$this->Id_Vehiculo',
                                                                                        '$this->Vehiculo_Codigo',
                                                                                        '$this->Vehiculo_Placa',
                                                                                        '$this->Vehiculo_Marca',
                                                                                        '$this->Vehiculo_Modelo',
                                                                                        '$this->Vehiculo_Color',
                                                                                        '$this->Vehiculo_Tipo',
                                                                                        '$this->Vehiculo_Velocidad',
                                                                                        '$this->Vehiculo_Estado'
                                                                                        )";
            //echo ($insert);
            mysqli_query($c, $insert);
            echo "<script> alert('El vehículo fue creado correctamente')</script>";
        }
    }
    function Modificar()
    {

        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "select * from Vehiculos where Codigo = '$this->Vehiculo_Codigo'";
        mysqli_query($c, $query);
        $update = "update vehiculos set 
                                                                        
                                                                        codigo='$this->Vehiculo_Codigo',
                                                                        Placa='$this->Vehiculo_Placa',
                                                                        Marca='$this->Vehiculo_Marca',
                                                                        Modelo='$this->Vehiculo_Modelo',
                                                                        Color='$this->Vehiculo_Color',
                                                                        Tipo_Vehiculo='$this->Vehiculo_Tipo',
                                                                        Velocidad_MAX='$this->Vehiculo_Velocidad',
                                                                        Estado_Vehiculo='$this->Vehiculo_Estado'
                                                                        WHERE Id_Vehiculo='$this->Id_Vehiculo'";
        echo $update;
        mysqli_query($c, $update);
        echo "<script>
                                                    alert('Los datos fueron actualizados correctamente');
                                                    location.href='Vehiculo-list.php';
                                                </script>";

    }


    function Eliminar()
    {
        $conect = new Conexion();
        $c = $conect->conectando();
        $query = "delete from usuarios where Id_Vehiculo='$this->Id_Vehiculo' and Placa='$this->Vehiculo_Placa'";

        if (mysqli_query($c, $query)) {
            echo "<script>
                                                       alert('El usuario fue eliminado correctamente');
                                                       location.href='client-list.php';
                                                     </script>";
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($c);
        }
    }
}

?>