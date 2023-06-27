<?php
include("./Conexion/Conexion.php");
include("./Controlador/OrdenesTrabajoControlador.php");
if ($_POST) {
    $obj->Placa = $_POST['Placa'];
}
$cone = new Conexion();
$c = $cone->conectando();
$queryCantUsuarios = "SELECT COUNT(*) AS TotalRegistros FROM Registro_Entrada";
$ejecuta = mysqli_query($c, $queryCantUsuarios);
$TotalRegistros = mysqli_fetch_array($ejecuta)['TotalRegistros'];

$maximoRegistros = 10;
if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}
$desde = ($pagina - 1) * $maximoRegistros;
$totalRegistros = ceil($TotalRegistros / $maximoRegistros);

$query = "SELECT RT.Id_Orden_Trabajo, RT.Id_Vehiculo, RT.Codigo_Vehiculo, 
RT.Placa, RT.Marca, RT.Modelo, U.Nombre_Usuario, TM.Nombre_Mantenimiento, RT.Fecha_Orden_Trabajo, 
EO.Nombre_EstadoOrden FROM orden_trabajo RT 
INNER JOIN estado_ordenestrabajo EO ON RT.Estado_Orden_Trabajo = EO.Id_Estado_Orden 
INNER JOIN usuarios U ON RT.Asignar = U.Id_Usuario 
INNER JOIN tipos_mantenimiento TM ON RT.Tipo_Mantemiento = TM.Id_Tipo_Mantenimiento 
ORDER BY RT.Id_Orden_Trabajo limit $desde,$maximoRegistros";

$ejecuta = mysqli_query($c, $query);
$RegistroEntrada = mysqli_fetch_array($ejecuta);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registro de Entrada</title>

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
                <a href="Registro-Salida-New.php">
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>

            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ORDENES DE TRABAJO
                </h3>
                <p class="text-justify">
                    GESTIÓN DE ORDENES DE TRABAJO
                </p>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="Ordenes-Trabajo-New.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ORDEN DE
                            TRABAJO</a>
                    </li>
                    <li>
                        <a class="active" href="Ordenes-List.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                            LISTA DE ORDENES DE TRABAJO</a>
                    </li>
                    <li>
                        <a class="" href="Ordenes-Trabajo-List.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                            LISTA DE VEHÍCULOS EN MANTENIMIENTO</a>
                    </li>
                </ul>
            </div>

            <!-- Content here-->
            <div class="container-fluid">
                <h4>BUSCAR VEHICULO</h4>
                <form method="GET" action="BusquedaOrdenTrabajo.php">
                    <input type="text" name="buscar" placeholder="Buscar PLACA">
                    <input type="submit" value="Buscar">
                </form>
                <?php
                $conexion = new mysqli("localhost", "root", "", "entry_mc",3307);
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                if (isset($_GET['buscar'])) {
                    $termino = $_GET['buscar'];

                    // Realizar la consulta en la base de datos según el término de búsqueda
                    // y almacenar los resultados en un array de datos ($datos)
                    // ...
                
                    // Ejemplo de consulta utilizando MySQLi
                    $query = "SELECT RT.Id_Orden_Trabajo, RT.Id_Vehiculo, RT.Codigo_Vehiculo, 
                    RT.Placa, RT.Marca, RT.Modelo, U.Nombre_Usuario, TM.Nombre_Mantenimiento, RT.Fecha_Orden_Trabajo, 
                    EO.Nombre_EstadoOrden FROM orden_trabajo RT 
                    INNER JOIN estado_ordenestrabajo EO ON RT.Estado_Orden_Trabajo = EO.Id_Estado_Orden 
                    INNER JOIN usuarios U ON RT.Asignar = U.Id_Usuario 
                    INNER JOIN tipos_mantenimiento TM ON RT.Tipo_Mantemiento = TM.Id_Tipo_Mantenimiento
                    INNER JOIN vehiculos v on rt.Id_Vehiculo = v.Id_Vehiculo WHERE V.placa LIKE '%$termino%'";
                    $resultado = $conexion->query($query);

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
                <table>
                    <thead>
                        <div class="table-responsive">
                            <table class="table table-dark table-sm">
                                <thead>
                                    <tr class="text-center roboto-medium">
                                    <!--    <th>#</th> -->
                                        <th>Vehículo</th>
                                        <th>Codigo</th>
                                        <th>Placa</th>
                                        <th>Marca </th>
                                        <th>Modelo</th>
                                        <th>Asignado</th>
                                        <th>Tipo Mantemiento </th>
                                        <th>Fecha Orden Trabajo</th>
                                        <th>Estado Orden Trabajo</th>
                                        <th>ACTUALIZAR</th>
                                    </tr>
                                </thead>
                                <?php foreach ($datos as $fila) { ?>
                                    <style>
                                        td {
                                            text-align: center;
                                        }
                                    </style>
                                    <tr>
                                        <td>
                                            <?php echo $fila['Id_Vehiculo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Codigo_Vehiculo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Placa']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Marca']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Modelo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Nombre_Usuario']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Nombre_Mantenimiento']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Fecha_Orden_Trabajo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fila['Nombre_EstadoOrden']; ?>
                                        </td>
                                        <td>
                                            <a href=" <?php if ($RegistroEntrada[0] <> '') {
                                                echo "Ordenes-Trabajo-Update.php?key=" . urlencode($RegistroEntrada[0]);
                                            } ?>" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                        </li>
                        </ul>
                        </nav>
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