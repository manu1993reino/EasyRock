<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$db = "easyrock";

try{
    $conn = new PDO("mysql:host=$servername; dbname=$db; charset=utf8" , $username , $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<span style='color:green'>Conectado con exito</span><br>";

}
catch(PDOException $e){
    echo "Conexion fallida" . $e->getMessage();
}
 ?>