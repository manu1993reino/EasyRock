<?php
include '../Models/conexion.php';

if(isset($_COOKIE["correoCoo"])){
    header("Location: ../Views/app3.php");
}

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Formulario registro Easyrock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/css/login.css">
  </head>
  <body>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App</div>
            </div>
            <br>
        <div class="login">
            <form action="" method="post">
                <input type="text" placeholder="Su Correo de usuario" name="correo"><br>
                <input type="password" placeholder="Contraseña" name="contrasenia"><br><br>
                <input type="checkbox" value="recuerdame" name="recuerdame"> <span class="recuerdame">Recuérdame</span><br>
                <input class="btn" type="submit" name="btnEnviar" value="Acceder">
                <a href="../Models/registro.php"><input class="registrate" type="button" name="registrate" value="No estoy registrado"></a><br>
                <a href="../Controllers/mail.php"><input  type="button" name="mail" value="Olvidé mi contraseña"></a>            
            </form>
    </div>


<?php
    if (!empty(($_POST["btnEnviar"]))){
        //Recogemos en estas dos variables el usuario y la contraseña
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        $sql="USE easyrock;";
        $conn->exec($sql);
        $sql = "SELECT * FROM usuarios WHERE correo='$correo'"; 
        $query = $conn -> prepare($sql);
        $query -> execute(); 
        $result = $query->fetch(PDO::FETCH_ASSOC);
 
        if(!empty($result)){
            $verificacionHash = password_verify($contrasenia, $result['contrasenia']);
                if($verificacionHash == 1){
                    session_start();                   
                    $_SESSION["usuario"] = $result['id_usuario'];
                    $_SESSION["nombreUsuario"] = $result['nombre_usuario'];
                    $_SESSION["correo"] = $result['correo'];                  
                    $id = $_SESSION["usuario"];
                    $nombreUsuario= $_SESSION["nombreUsuario"];
                    if($result['id_usuario']==22){
                    //Cokkies
                        if($_POST['recuerdame']=="recuerdame"){
                            setcookie("correoCoo", $correo, time() +3600);
                            setcookie("idCoo", $id, time() +600);
                            setcookie("nombreUsuarioCoo", $nombreUsuario, time() +3600);
                        }
                        header ("location: ../Views/app_admin.php");
                    }else{
                        if($_POST['recuerdame']=="recuerdame"){
                            setcookie("correoCoo", $correo, time() +3600);
                            setcookie("idCoo", $id, time() +600);
                            setcookie("nombreUsuarioCoo", $nombreUsuario, time() +3600);
                        }  
                        header ("location: ../Views/app3.php"); 
                    }
                        
                }else{
                    echo "<div class='mensaje'> La contraseña que has introducido es incorrecta ";                   
                    echo "</div>";
                }
        }else{
            echo "<div class='mensaje'> El correo introducido no pertenece a ningún usuario";
        }
        
    }else{
        echo "<div class='mensaje' style='color:white;'> Introduce tus credenciales de inicio de sesión </div>";     
    }
?>

</body>
</html>


    