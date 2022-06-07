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
<?php
if(isset($_GET['id_reserva'])){
    $idRes=$_GET['id_reserva'];
    $sql="use easyrock";
	$conn->exec($sql);
    $idLocal = "SELECT * from reservas_locales WHERE id_reserva = $idRes";
    $res= $conn->prepare($idLocal);
    $res->execute();
    $resultID= $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultID as $dato =>$resultIDLocal){
        $resultIDLocal['id_local'];
    }

    
    $resultadoDelete = "DELETE from reservas_locales WHERE id_reserva = $idRes";
    $resBorrarReserva2= $conn->prepare($resultadoDelete);
    $resBorrarReserva2->execute();
    $borrarReserva2= $resBorrarReserva2->fetchAll(PDO::FETCH_ASSOC);
    echo "
    <!doctype html>
        <html lang='es>
        <head>
            <title>Formulario confirmación de reserva</title>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <link rel=stylesheet' href='../Resources/css/login.css'>
            <script src='../Resources/js/jquery.js'></script>
            <script>    
                window.onload=function(){
                     document.forms['regresar'].submit();
                  }
            </script>
        </head>
        <body>
            <form action='../Views/app_filtro.php?id_local=$resultIDLocal[id_local]' name='regresar' method='POST' value='$resultIDLocal[id_local]'>
                <input type='hidden' name='local1' value='$resultIDLocal[id_local]'>
                <input type='submit' name='volver' value=''>
            </form>
        </body>";
    
    
}

?>