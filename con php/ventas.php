<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilos/estilosventas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>FOX Streaming - Ventas</title>
</head>
<script src="https://kit.fontawesome.com/7a1aacdaf8.js" crossorigin="anonymous"></script>

<body>
    <main>

        <div class="wrapper">
            <div class="sidebar">
                <h2>FOX STREAMING</h2>
                <ul>
                    <li><a href="./plataformas.php"><i class="fas fa-home"></i>Plataformas</a></li>
                    <li><a href="./ventas.php"><i class="fa-solid fa-cart-shopping fa-pull-left"></i>Ventas</a></li>
                    <li><a href="./pendientes.php"><i class="fas fa-address-card"></i>Pendientes</a></li>
                </ul>
            </div>
            <div class="main_content">
                <div class="header">
                    <h2>NUEVA VENTA</h2>
                </div>
                <div class="info">
                    <div class="informacion-plataforma">
                        <div class="formulario">
                            <form action="ventas.php" method="post">
                                <label>Plataforma:</label>
                                <input id="plataforma" type="text" class="input" name="plataforma" placeholder=".">
                                <br>
                                <label>Correo:</label>
                                <input id="correo" type="text" class="input" name="correo" placeholder=".">
                                <br>
                                <label>Contraseña:</label>
                                <input id="contraseña" type="text" class="input" name="correo" placeholder=".">
                                <br>
                                <label>Número:</label>
                                <input id="numero" type="text" class="input" name="numero" placeholder="." required>
                                <br>
                                <label>Nombre:</label>
                                <input id="nombre" type="text" class="input" name="nombre" placeholder="." required>
                                <br>
                                <label>Perfil:</label>
                                <input id="perfil" type="text" class="input" name="perfil" placeholder="." required>
                                <br>
                                <label>PIN:</label>
                                <input id="pin" type="text" class="input" name="pin" placeholder=".">
                                <br>
                                <label>Fin de servicio:</label>
                                <input id="fin" type="date" class="input" name="fin" placeholder="." required>
                                <br>
                                <label>Modo de pago:</label>
                                <input id="pago" type="text" class="input" name="pago" placeholder=".">
                                <br>
                                <label>Monto:</label>
                                <input id="monto" type="text" class="input" name="monto" placeholder="." required>
                                <br>
                                <!-- <input id="generar" type="submit" class="btn" name="generar-venta" placeholder="."> -->
                            </form>
                        </div>
                        <div class="botones-accion">
                            <br>
                            <h2>Datos de Venta</h2>
                            <br>
                            <textarea class="plantilla"></textarea>
                            <br>
                            <button type="submit">Registrar venta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>


</html>