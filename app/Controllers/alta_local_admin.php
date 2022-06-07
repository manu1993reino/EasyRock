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
    <link rel="stylesheet" href="../Resources/css/altaLocal.css">
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <div class="login">
        <h1>Dar de alta nuevo local</h1>
            <form action="" method="post">
                <input type='number' name='cod_local' text-align='center' placeholder="Código de Local"/><br>
                <input type='text' name='nombre_local' placeholder="Nombre Local"/><br>
                <input type='text' name='ciudad' placeholder="Ciudad"/><br>
                <input type='text' name='localidad' placeholder="Localidad"/><br>
                <input type='text' name='direccion' placeholder="Dirección"/><br>
                <input type='text' name='cp' placeholder="Código Postal"/><br>
                <input type="submit" name='Enviarinsertar' value='Insertar Local'> 
            </form>
            <form action="../Views/app_admin.php" method="POST">
                <input type="submit" id='btnRecuperar' name='btnRecuperar' value='Volver'>
            </form>
    </div>

<?php
    //Insertar local al ser administrador
    


    if(isset($_POST['Enviarinsertar'])){
        $sql="use easyrock;";
        $conn->exec($sql);

        $codigo= $_POST['cod_local'];
        $nombre= $_POST['nombre_local'];
        $ciudad= $_POST['ciudad'];
        $localidad= $_POST['localidad'];
        $direccion= $_POST['direccion'];
        $cp= $_POST['cp'];
        
        $sql="USE easyrock;";
        $conn->exec($sql);
        
        $insertar = "INSERT INTO locales (id_local, nombre_local, ciudad, localidad, direccion, cp) 
        VALUES ($codigo, '$nombre', '$ciudad', '$localidad', '$direccion', $cp)";
        $resultado = $conn -> prepare($insertar);
        $resultado->execute();
        header("Location: ../Views/app_locales_admin.php");
    }
?>

</body>
</html>