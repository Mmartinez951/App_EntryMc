<?php

    class Conexion{
                    private $servidor = "appentrymc.mysql.database.azure.com";
                    private $usuario = "AdmonEntryMc";
                    private $password = "super123*.";
                    private $db = "appentrymc";



                    public function conectando(){
                        $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->db) or die ("Error al conectar con el servidor");
                        return $con;
                    }

    }

    $obj = new Conexion();
        if($obj->conectando()){
                //echo "Conectado al servidor"; 
        }
?>

