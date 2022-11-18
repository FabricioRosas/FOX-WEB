<?php
session_start();
if (isset($_SESSION['idadministrador'])) {
    header('Location: ./ventas.php');
}
require './conexion.php';
if (!empty($_POST['uname'] && !empty($_POST['password']))) {
    $correo = $_POST['uname'];
    $contraseña = $_POST['password'];
    $records = $conn->prepare('SELECT idadministrador, correo_admin, contrasenia FROM administrador where correo_admin=:correo');
    $records->bindParam(':correo', $_POST['uname']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (!empty($results) && (strcmp($_POST['password'], $results['contrasenia'])) == 0) {
        $_SESSION['idadministrador'] = $results['idadministrador'];
        header("Location: ./plataformas.php");
    } else {
        $message = 'Lo sentimos, esas credenciales no son validas';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilos/estiloslogin.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/7a1aacdaf8.js" crossorigin="anonymous"></script>
    <title>FOX Streaming - Staff</title>
</head>

<body>
    <header>
        <div class="imagen-logo">
            <img src="./src/images/logofox.png" alt="logo" class="logo">
        </div>
    </header>
    <div class="titulo">
        <h2>Bienvenido a FOX STREAMING</h2>
    </div>
    <div class="formulario">
        <?php
        if (!empty($message)) : ?>
        <p><?= $message ?></p>
        <?php endif;
        ?>
        <form action="login.php" method="post">
            <div class="imagen-usuario">
                <img src="./src/images/user.png" alt="usuario" class="usuario">
            </div>
            <div class="contenido">
                <label for="uname"><b>Nombre de usuario</b></label>
                <input type="text" placeholder="Ingresa el usuario" name="uname" id="uname" required>
                <label for="password"><b>Contraseña</b></label>
                <input type="password" placeholder="Ingresa tu contraseña" name="password" required>

                <button type="submit">Ingresar</button>
                <label>
                    <input type="checkbox" checked="checked" name="recordar">Recordarme
                </label>
            </div>
            <div class="contenido">
                <!-- <button type="button" class="cancelbtn">Cancelar</button> -->
                <span class="password">Olvidaste tu <a href="./pendientes.php">contraseña?</a></span>
            </div>
        </form>
    </div>
    <footer>
        <i>Derechos reservados</i>
    </footer>
</body>

</html>