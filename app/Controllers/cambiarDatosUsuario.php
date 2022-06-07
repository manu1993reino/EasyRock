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
    <title>Formulario modificación datos de usuario Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/css/actualizar.css">
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <form id="formulario" action="" method="post">
            <div class="login">
                <h1 style="position:relative; left:-28px;">Actualizar datos de usuario</h1>
                <form action="" method="post">
                    <input type="text" id="nombre_usuario" name="nombre_usuario" class="input" placeholder="Nombre" required><br>
                    <input type="text" id="apellido1" name="apellido1" class="input" placeholder="Primer apellido" required><br>
                    <input type="text" id="apellido2" name="apellido2" class="input" placeholder="Segundo apellido" required><br>
                    <input type="text" id="telefono" maxlength="9" name="telefono" class="input" placeholder="Teléfono" required><br>
                    <!--<input type="text" id="correo" name="correo" class="input" placeholder="E-mail" required><br>-->
                    <input type="text" id="instrumento" name="instrumento" class="input" placeholder="Instrumento" required><br>
                    <input type="text" id="descripcion" name="descripcion" class="input" placeholder="Descripcion" required><br>
                    <input id="Modificar" type="submit" value="Modificar" name="Modificar">
                       
        </form>
        <form action="../Views/app_data.php" method="POST">
                <input type="submit" id='atras' name='atras' value='Volver a tu perfil'>
            </form>
        </div> 
    </div>

<?php
if(!empty($_POST['Modificar'])){
    $nombre=$_POST['nombre_usuario'];
    $ape1=$_POST['apellido1'];
    $ape2=$_POST['apellido2'];
    $tel=$_POST['telefono'];
    //$correo=$_POST['correo'];
    $instrumento=$_POST['instrumento'];
    $desc=$_POST['descripcion'];
    $sql="use easyrock;";
    $conn->exec($sql);
    $resultadoMod = "UPDATE usuarios SET nombre_usuario='$nombre', apellido1='$ape1',
    apellido2='$ape2', telefono='$tel', instrumento='$instrumento', 
    descripcion='$desc' WHERE id_usuario= '$id'";
    $resMod= $conn->prepare($resultadoMod);
    $resMod->execute();
    $Mod= $resMod->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 style='color:green; z-index:101';>Cambios realizados correctamente</h3>";
    header('Location: ../Views/app_data.php');
}
?>
</body>
</html>