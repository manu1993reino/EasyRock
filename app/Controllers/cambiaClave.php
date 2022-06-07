<?php

$correo=$_GET['correo'];
echo $correo;
?>
<?php
include '../Models/conexion.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Formulario registro Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="../Resources/js/validarNuevaClave.js"></script>
    <link rel="stylesheet" href="../Resources/css/login.css">
  </head>
  <body>
    <script src="../Resources/js/validarNuevaClave.js"></script>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <form id="formulario" action="" method="post" onsubmit='return validarNueva();'>
            <div class="login">
                <h2 style="width:500px"><?php echo "Bienvenido ".$correo?></h2>
                <h2>Introduce tu nueva contraseña</h2>
                <form action="" method="post">
                    <input type="password" id="clave1" name="clave1" class="input" placeholder="Contraseña"><br>
                    <input type="password" id="clave2" name="clave2" class="input" placeholder="Confirmar Contraseña"><br>
                    <input id="Registrar" type="submit" value="Registrar" name="Registrar" class="btn-enviar">
                    <h1 style="width:500px; color:red;" id="posicion"></h1>
            </div>            
        </form>
    </div>
</body>
</html>
<?php
if(!empty($_POST['Registrar'])){
    $clave=$_POST['clave2'];
    $contrasenaCif = password_hash($clave, PASSWORD_DEFAULT);
    $sql="use easyrock;";
    $conn->exec($sql);
    $resultado = "UPDATE usuarios SET contrasenia='$contrasenaCif' WHERE correo= '$correo'";
    $resBuscar= $conn->prepare($resultado);
    $resBuscar->execute();
    $buscar= $resBuscar->fetchAll(PDO::FETCH_ASSOC);
    header('Location: ../Views/login.php');
}
?>