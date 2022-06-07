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


if(!empty($_POST['Enviarinsertar'])){
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