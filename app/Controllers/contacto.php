<?php
include '../Models/conexion.php';
session_start();

if(empty($_SESSION['usuario'])&& empty($_COOKIE["correoCoo"])){
	header('Location: ../Views/app_cierre.php');
}elseif(!empty($_COOKIE["correoCoo"])){
	$_SESSION["usuario"]=$_COOKIE["idCoo"];
	$_SESSION["nombreUsuario"]=$_COOKIE["nombreUsuarioCoo"];
	$_SESSION["correo"]=$_COOKIE["correoCoo"];
}
$id = $_SESSION["usuario"];
$nombreUsuario = $_SESSION["nombreUsuario"];
$correo = $_SESSION["correo"];

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Formulario registro Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/css/contacto.css">
    <script src="../Resources/js/jquery.js"></script>
    <script src="../Resources/js/contacto.js"></script>
    
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <div class="login">
            <h1>Contacta con nosotros</h1>
            <form id="formulario" action="https://formsubmit.co/ajax/victorlopez.daw@ciudadescolarfp.es" method="POST">
                
                <input type="text" value="<?php echo $correo; ?>" name="correo" readonly><br>
                <input type="hidden" name="Id Usuario" value="<?php echo $id ?>">
                <input type="text" placeholder="Nombre" name="Nombre_usuario" required><br>
                <textarea style="width:255px;" name="Comentarios" rows="10" cols="40" required>Escribe aquí tus comentarios</textarea><br>
                
                <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar formulario">
            </form>
            <form action="../Views/app3.php"><input type="submit" name="Volver" value="Volver a la página principal"></form>
            <p class="respuesta" style="font-size:20px"></p>
            <script src="../Resources/js/jquery.js"></script>
            <script src="../Resources/js/contacto.js"></script>
    </div>
</body>
</html>
