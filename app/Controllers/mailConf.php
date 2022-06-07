<?php
include '../Models/conexion.php';
?>
<?php
if(!empty($_POST['btnRecuperar'])){
    $correo = $_POST['correo'];
    $link = "C:\xampp\htdocs\Proyecto_fin_de_grado\app\Controllers\cambiaClave.php";
   
}

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Formulario confirmación de recuperación de clave de Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/css/login.css">
    <script src="../Resources/js/jquery.js"></script>
    <script src="../Resources/js/nuevaClave.js"></script>
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
            <div class='login'>
                <form id='formulario' action='https://formsubmit.co/ajax/<?php echo $correo?>' method='POST'>
                    <h2>¿Seguro que este es tu correo?</h2>
                    <h3><?php echo $correo?></h3>
                    <input type='hidden' name='Correo Usuario' value='<?php echo $correo ?>'>
                    <input type='hidden' name='URL' value="<?php echo 'http://localhost/Proyecto_fin_de_grado/app/Controllers/cambiaClave.php?correo='.$correo.''?>">
                    <input type="submit" id='btnEnviar' name='btnEnviar' value='Confirmar correo'>
                </form> 
                <form action="../Controllers/mail.php" method="POST"><input type="submit" name='Enviar' value='Volver a introducir correo'></form>       
                <a href="../Views/login.php"><input type="submit" name='Enviar' value='Volver a login'></a>       
                <p class='respuesta' style='font-size:20px'></p>
                <script src='../Resources/js/jquery.js'></script>
                <script src='../Resources/js/nuevaClave.js'></script>
            </div>
    </div>
</body>
</html>
