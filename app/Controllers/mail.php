<?php
include '../Models/conexion.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Formulario recuperacion de clave de Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/css/mail.css">
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <div class="login">
        <h1>Recuperar Contraseña</h1>
        <br>
        <br>
        <br>
            <form action="../Controllers/mailConf.php" method="POST">
                <input type="text" placeholder="Su Correo de usuario" name="correo" required><br>
                <input type="submit" id='btnRecuperar' name='btnRecuperar' value='Enviar formulario'>
            </form>
            <form action="../Views/login.php" method="POST">
                <input type="submit" id='Volver' name='Volver' value='Volver al Login'>
            </form>
        </div>
    </div>
</body>
</html>

