<?php
include("./Conexion/Conexion.php");
include("./Controlador/RegistroEntradaControlador.php");
$cone = new Conexion();
$c = $cone->conectando();


if ($_POST) {

    $obj->Id_Registro_Entrada = $_POST['Id_Registro_Entrada'];
    $obj->Id_Vehiculo = $_POST['Id_Vehiculo'];
    $obj->Codigo = $_POST['Codigo'];
    $obj->Placa = $_POST['Placa'];
    $obj->Marca = $_POST['Marca'];
    $obj->Modelo = $_POST['Modelo'];
    $obj->Nombre_Estado_Registro = $_POST['Nombre_Estado_Registro'];
    $obj->Observaciones = $_POST['Observaciones'];
    $obj->Fecha_Registro_Entrada = $_POST['Fecha_Registro_Entrada'];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Agregar Registro</title>

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
                        <small class="roboto-condensed-light">Bienvenido EntryMc
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
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="user-update.html">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>

            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR REGISTRO
                </h3>
                <p class="text-justify">
                    Agregar registro de entrada.
                </p>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="Registro-Entrada-New.php"><i class="fas fa-plus fa-fw"></i> &nbsp;
                            AGREGAR REGISTRO DE ENTRADA</a>
                    </li>
                    <li>
                        <a href="Registro-Entrada-List.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                            REGISTROS DE ENTRADA</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
            </div>
            <!-- Content here-->
            <div class="container-fluid">
                <h4>CONSULTA EXPRESA</h4>
                <form action="BuscarVehiculoEntrada.php" method="GET">
                    <input type="text" name="buscar" placeholder="Ingrese PLACA">
                    <button type="submit">Buscar</button>
                </form>
                <form action="" class="form-neon" autocomplete="off" method="POST">
                    <fieldset>
                        <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
                        <div class="container-fluid">
                        </div>
                        <?php
                        $conexion = new mysqli("localhost", "root", "", "entry_mc",3307);
                        if ($conexion ->connect_error) {
                            die("Error de conexión:".$conexion->connect_error);
                        }
                        if (isset($_GET['buscar'])) {
                            $termino = $_GET['buscar'];

                            $query = "SELECT Id_Vehiculo , Codigo, Placa, Marca, Modelo, Estado_Vehiculo FROM vehiculos WHERE Placa LIKE '%$termino%'";
                            $resultado = $c->query($query);

                            $datos = array();

                            if ($resultado->num_rows > 0) {
                                while ($fila = $resultado->fetch_assoc()) {
                                    $datos[] = $fila;
                                }
                            } else {
                                echo "No hay Registros";
                            }
                        }
                        ?>
                        <?php
                        $conexion ->close();
                        ?>
                        <form>
                            <?php foreach ($datos as $fila) { ?>
                                <div class="row">
                                    <div class="col-10 col-md-7">
                                        <div class="form-group">
                                            <label for="Id_Registro_Entrada" class="bmd-label-floating"></label>
                                            <input class="form-control form-control-sm" type="text"
                                                name="Id_Registro_Entrada" id="Id_Registro_Entrada"
                                                placeholder="El Codigo es Asignado por el Sistema" autofocus required
                                                aria-label=".form-control-sm example" readOnly maxlength="27">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Id_Vehiculo" class="bmd-label-floating">Vehículo</label>
                                            <input type="text" value=<?php echo $fila['Id_Vehiculo'] ?> required
                                                class="form-control" name="Id_Vehiculo" id="Id_Vehiculo" maxlength="40">

                                        </div>
                                    </div>
                                    <div class="col-10 col-md-7">
                                        <div class="form-group">
                                            <label for="Codigo" class="bmd-label-floating">Codigo</label>
                                            <input type="text" value=<?php echo $fila['Codigo'] ?> required
                                                class="form-control" name="Codigo" id="Codigo" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Placa" class="bmd-label-floating">Placa</label>
                                            <input type="text" value=<?php echo $fila['Placa'] ?> required
                                                class="form-control" name="Placa" id="Placa" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Marca" class="bmd-label-floating">Marca</label>
                                            <input type="text" value=<?php echo $fila['Marca'] ?> required
                                                class="form-control" name="Marca" id="Marca" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Modelo" class="bmd-label-floating">Modelo</label>
                                            <input type="text" value=<?php echo $fila['Modelo'] ?> required
                                                class="form-control" name="Modelo" id="Modelo" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Nombre_Estado_Registro" class="bmd-label-floating">Estado</label>
                                            <select class="form-control" value=<?php echo $fila['Estado_Vehiculo'] ?>
                                                name="Nombre_Estado_Registro" id="Nombre_Estado_Registro">
                                                <?php
                                                $query = "SELECT * FROM Estados_registros";
                                                $NombreDocumentos = mysqli_query($c, $query);

                                                while ($NombreDocumento = mysqli_fetch_array($NombreDocumentos)) {
                                                    ?>
                                                    <option value="<?php echo $NombreDocumento[0] ?>">
                                                        <?php echo $NombreDocumento[1] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="text" class="bmd-label-floating">Observaciones</label>
                                            <input type="text" class="form-control" name="Observaciones" id="Observaciones">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="Fecha_Registro_Entrada" class="bmd-label-floating">Fecha
                                                Salida</label>
                                            <input type="datetime-local" id="Fecha_Registro_Entrada"
                                                name="Fecha_Registro_Entrada" min="2022-01-01" max="2050-12-31">
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <p class="text-center" style="margin-top: 40px;">
                                &nbsp;
                                <button type="submit" class="btn btn-raised btn-info btn-sm" name="Guardar"><i
                                        class="far fa-save"></i> &nbsp; GUARDAR </button>
                            </p>
                        </form>

                    </fieldset>
                    <br><br><br>
                </form>
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