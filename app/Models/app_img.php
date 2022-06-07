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

if(!empty($_POST['foto'])){

    $nombreImg = $_FILES['imagen']['name'];
    $archivo = $_FILES['imagen']['tmp_name'];
    $ruta = "../Resources/pictures";
    $ruta2= $ruta."/".$nombreImg;
    move_uploaded_file($archivo,$ruta2);

    $sql="use easyrock";
    $conn->exec($sql);

	$resultado = "UPDATE `usuarios` SET `image`='$ruta2' WHERE id_usuario=$id;";
	$res= $conn->prepare($resultado);
	$res->execute();
	$todo= $res->fetchAll(PDO::FETCH_ASSOC);
    header('Location: ../Views/app_data.php');
    

}

?>