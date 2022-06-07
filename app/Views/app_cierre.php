<?php
session_start();                   
$_SESSION["usuario"];
$id = $_SESSION["usuario"];
$correo = $_SESSION["correo"];
setcookie("correoCoo", $correo, time() -600);
setcookie("idCoo", $id, time() -600);
setcookie("nombreUsuarioCoo", $nombreUsuario, time() -600);
session_destroy();
header('Location: ../Views/login.php');
?>