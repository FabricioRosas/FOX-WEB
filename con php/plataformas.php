<?php
session_start();
if (!isset($_SESSION['idadministrador'])) {
    header('Location: ./login.php');
}
require 'conexion.php';
$query = $conn->prepare("SELECT * FROM plataforma");
$query->execute();
$data = $query->fetchAll();
$id = $_SESSION['idadministrador'];
//agregando plataformas
if (!empty($_POST["agregarp"])) {
    $sql = "INSERT INTO plataforma(nombre, perfiles, precio, descripcion, administradorid)values(:nombre, :perfiles, :precio, :descripcion, :administradorid)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':perfiles', $_POST['perfiles']);
    $stmt->bindParam(':precio', $_POST['precio']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);
    $stmt->bindParam(':administradorid', $id);
    if ($stmt->execute()) {
        // echo '<div class="alert alert-danger">REGISTRO EXITOSO</div>';
    } else {
        // echo '<div class="alert alert-danger">REGISTRO  no EXITOSO</div>';
    }
}
if (!empty($_POST["agregarc"])) {
    $fecha = '2000-12-15';
    $records = $conn->prepare('SELECT idplataforma from plataforma where nombre=:nombrep');
    $records->bindParam(':nombrep', $_POST['plataformac']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);
    $idplataforma = $result;
    $sql = "INSERT INTO cuenta(correo_cuenta, contrasenia, fecha_venc, adminid, plataformaid)values(:correo, :contrasenia, :fecha_venc, :administradorid, :plataformaid)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':contrasenia', $_POST['contrasenia']);
    $stmt->bindParam(':fecha_venc', $fecha);
    $stmt->bindParam(':administradorid', $id);
    $stmt->bindParam(':plataformaid', $idplataforma);
    if ($stmt->execute()) {
        echo '<div class="alert alert-danger">REGISTRO EXITOSO</div>';
    } else {
        echo '<div class="alert alert-danger">REGISTRO  no EXITOSO</div>';
    }
}
function identificarplataforma()
{
    require 'conexion.php';

    if (count($result) > 0) {
        $id = $result;
        return $id;
    }
}





?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilos/estilosplataformas.css">
    <title>FOX Streaming - Plataformas</title>
</head>
<script src="https://kit.fontawesome.com/7a1aacdaf8.js" crossorigin="anonymous"></script>

<body>
    <main>

        <div class="wrapper">
            <div class="sidebar">
                <h2>FOX STREAMING</h2>
                <ul>
                    <li><a href="./plataformas.php"><i class="fa-solid fa-house fa-pull-left"></i>Plataformas</a></li>
                    <li><a href="./ventas.php"><i class="fa-solid fa-cart-shopping fa-pull-left"></i>Ventas</a></li>
                    <li><a href="./pendientes.php"><i class="fas fa-address-card"></i>Pendientes</a></li>
                </ul>
            </div>
            <div class="main_content">
                <div class="header">
                    <h2>PLATAFORMAS</h2>
                </div>
                <div class="info">
                    <div class="plataformas-boton">
                        <div class="btn_pl">
                            <a href="" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                            <a href="#" title=" "><img src="./src/images/logo.png" alt="" class="pl"></a>
                        </div>

                    </div>
                    <div class="informacion-plataforma">
                        <div class="formulario">
                            <form>
                                <label>Plataforma</label>
                                <select name='plataforma' id='plataforma'>
                                    <?php
                                    foreach ($data as $valores) : echo '<option value="' . $valores["idplataforma"] . '">' . $valores["nombre"] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                                <!-- <input id=" plataforma" type="text" class="input" name="plataforma" title=""
                                        placeholder="Plataforma"> -->
                                <br>
                                <label>Disponiblidad</label>
                                <input id="disponibilidad" type="text" class="input" name="disponibilidad"
                                    placeholder="Perfiles disponibles">
                                <br>
                                <label>Correo</label>
                                <input id="correo" type="text" class="input" name="correo"
                                    placeholder="Correo de la cuenta">
                                <br>
                                <label>Contraseña</label>
                                <input id="contraseña" type="text" class="input" name="contraseña"
                                    placeholder="Contraseña de la cuenta">
                                <br>
                                <label>Perfiles libres</label>
                                <input id="perfiles_libres" type="text" class="input" name="perfiles_libres"
                                    placeholder="Perfiles disponibles">
                                <br>
                                <input id="generar" type="submit" class="sub" name="generar-venta"
                                    placeholder="Generar Venta">
                            </form>
                        </div>
                        <div class="agregar-plataforma">
                            <br>
                            <form action="plataformas.php" method="post">
                                <label>Nombre Plataforma</label>
                                <input id="nombre" type="text" class="input" name="nombre">
                                <br>
                                <label>Perfiles</label>
                                <input id="perfiles" type="text" class="input" name="perfiles">
                                <br>
                                <label>Precio</label>
                                <input id="precio" type="text" class="input" name="precio">
                                <br>
                                <label>Descripcion</label>
                                <input id="descripcion" type="text" class="input" name="descripcion">
                                <br>
                                <input class="sub" id="agregarp" type="submit" name="agregarp">
                            </form>
                        </div>
                        <div class="agregar-cuenta">
                            <br>
                            <form action="plataformas.php" method="post">
                                <label>Plataforma</label>
                                <select name='plataformac' id='plataformac'>
                                    <?php
                                    foreach ($data as $valores) : echo '<option value="' . $valores["idplataforma"] . '">' . $valores["nombre"] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                                <br>
                                <label>Correo cuenta</label>
                                <input id="correo" type="text" class="input" name="correo">
                                <br>
                                <label>Contraseña</label>
                                <input id="contrasenia" type="text" class="input" name="contrasenia">
                                <br>
                                <label>Fecha Vencimiento</label>
                                <input id="fecha_venc" type="date" class="input" name="fecha_venc">
                                <br>
                                <input class="sub" id="agregarc" type="submit" name="agregarc">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>