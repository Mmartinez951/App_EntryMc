<?php
include("./Conexion/Conexion.php");
include("./Controlador/OrdenesTrabajoControlador.php");
$obj = new Ordenes_Trabajo();
$cone = new Conexion();
$c = $cone->conectando();


if ($_POST) {

    $obj->Id_Orden_Trabajo = $_POST['Id_Orden_Trabajo'];
    $obj->Id_Vehiculo = $_POST['Id_Vehiculo'];
    $obj->Codigo = $_POST['Codigo'];
    $obj->Placa = $_POST['Placa'];
    $obj->Marca = $_POST['Marca'];
    $obj->Modelo = $_POST['Modelo'];
    $obj->LLantas = $_POST['LLantas'];
    $obj->Ventanas = $_POST['Ventanas'];
    $obj->Asignar = $_POST['Asignar'];
    $obj->Luces = $_POST['Luces'];
    $obj->Retrovisores = $_POST['Retrovisores'];
    $obj->Rayones = $_POST['Rayones'];
    $obj->Tipo_Mantemiento = $_POST['Tipo_Mantemiento'];
    $obj->Observaciones = $_POST['Observaciones'];
    $obj->Fecha_Orden_Trabajo = $_POST['Fecha_Orden_Trabajo'];
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
                    <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ORDEN DE TRABAJO
                </h3>
                <p class="text-justify">
                    Agregar orden de Trabajo.
                </p>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="Registro-Entrada-New.php"><i class="fas fa-plus fa-fw"></i> &nbsp;
                            AGREGAR REGISTRO DE ENTRADA</a>
                    </li>
                    <li>
                        <a class="" href="Ordenes-List.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
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
                <h4>CONSULTA EXPRESA</h4>
                <form action="Buscador-Vehiculo-Orden.php" method="GET">
                    <input type="text" name="buscar" placeholder="Ingrese PLACA">
                    <button type="submit">Buscar</button>
                </form>
                <form action="" class="form-neon" autocomplete="off" method="POST">
                    <fieldset>
                        <legend><i class="fas fa-book"></i> &nbsp; Información básica</legend>
                        <div class="container-fluid">
                        </div>
                        <div class="row">
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Id_Orden_Trabajo" class="bmd-label-floating"></label>
                                    <input class="form-control form-control-sm" type="text" name="Id_Orden_Trabajo"
                                        id="Id_Orden_Trabajo" placeholder="El Codigo es Asignado por el Sistema"
                                        autofocus required aria-label=".form-control-sm example" readOnly
                                        maxlength="27">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Id_Vehiculo" class="bmd-label-floating">Vehículo</label>
                                    <input type="text" required class="form-control" name="Id_Vehiculo" id="Id_Vehiculo"
                                        maxlength="40">

                                </div>
                            </div>
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Codigo_Vehiculo" class="bmd-label-floating">Codigo</label>
                                    <input type="text" required class="form-control" name="Codigo_Vehiculo"
                                        id="Codigo_Vehiculo" maxlength="40">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Placa" class="bmd-label-floating">Placa</label>
                                    <input type="text" required class="form-control" name="Placa" id="Placa"
                                        maxlength="40">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Marca" class="bmd-label-floating">Marca</label>
                                    <input type="text" required class="form-control" name="Marca" id="Marca"
                                        maxlength="40">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Modelo" class="bmd-label-floating">Modelo</label>
                                    <input type="text" required class="form-control" name="Modelo" id="Modelo"
                                        maxlength="40">
                                </div>
                            </div>
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Llantas" class="bmd-label-floating">Llantas</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control"
                                        name="Llantas" id="Llantas" maxlength="150">
                                </div>
                            </div>
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Ventanas" class="bmd-label-floating">Ventanas</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control"
                                        name="Ventanas" id="Ventanas" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Asignar" class="bmd-label-floating">Asignar</label>
                                    <select class="form-control" name="Asignar" id="Asignar">
                                        <?php
                                        $query = "SELECT * FROM Usuarios where Id_rol in (2,3)";
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
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Luces" class="bmd-label-floating">Luces</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control"
                                        name="Luces" id="Luces" maxlength="150">
                                </div>
                            </div>
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Retrovisores" class="bmd-label-floating">Retrovisores</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control"
                                        name="Retrovisores" id="Retrovisores" maxlength="150">
                                </div>
                            </div>
                            <div class="col-10 col-md-7">
                                <div class="form-group">
                                    <label for="Rayones" class="bmd-label-floating">Rayones</label>
                                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control"
                                        name="Rayones" id="Rayones" maxlength="150">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Tipo_Mantenimiento" class="bmd-label-floating">Tipo
                                        Mantenimiento</label>
                                    <select class="form-control" name="Tipo_Mantenimiento" id="Tipo_Mantenimiento">
                                        <?php
                                        $query = "SELECT * FROM Tipos_Mantenimiento";
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
                                    <label for="Fecha_Orden_Trabajo" class="bmd-label-floating">Fecha Orden</label>
                                    <input type="datetime-local" id="Fecha_Orden_Trabajo" name="Fecha_Orden_Trabajo"
                                        min="2022-01-01" max="2050-12-31">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <label for="Nombre_Estado_Orden" class="bmd-label-floating">Estado
                                        Orden Trabajo</label>
                                    <select class="form-control" name="Nombre_Estado_Orden" id="Nombre_Estado_Orden">
                                        <?php
                                        $query = "SELECT * FROM Estado_ordenestrabajo";
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
                        </div>
                    </fieldset>
                    <br><br><br>
                    <p class="text-center" style="margin-top: 40px;">
                        &nbsp;
                        <button type="submit" class="btn btn-raised btn-info btn-sm" name="Guardar"><i
                                class="far fa-save"></i> &nbsp; GUARDAR </button>
                    </p>
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