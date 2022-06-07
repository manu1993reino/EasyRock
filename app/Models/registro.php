<?php
include '../Models/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="../Resources/js/validar.js"></script>
    <link rel="stylesheet" href="../Resources/css/registro.css">
  </head>
  <body>
    <script src="../Resources/js/validar.js"></script>
    <div class="body"></div>
        <div class="grad"></div>
            <div class="header">
                <div>Easy<span> Rock </span>App <br><br>
                <span>Nuevo Usuario</span></div>
            </div>
            <br>
     <form id="formulario" action="" method="post" onsubmit='return validarlo();'>    
      <div class="login">           
            <br><input type="text" id="nombre_usuario" name="nombre_usuario" class="input" placeholder="Nombre"><br>
            <br><input type="text" id="apellido1" name="apellido1" class="input" placeholder="Primer Apellido"><br>
            <br><input type="text" id="apellido2" name="apellido2" class="input" placeholder="Segundo Apellido"><br>
            <br><input type="text" id="telefono" maxlength="9" name="telefono" class="input" placeholder="Teléfono"><br>
            <br><input type="text" id="correo" name="correo" class="input" placeholder="E-mail"><br>
            <br><input type="text" id="instrumento" name="instrumento" class="input" placeholder="Instrumento"><br>
            <br><input type="text" id="descripcion" name="descripcion" class="input" placeholder="Descripcion"><br>
            <br><input type="password" id="clave1" name="clave1" class="input" placeholder="Contraseña"><br>
            <br><input type="password" id="clave2" name="clave2" class="input" placeholder="Confirmar Contraseña"><br><br>   
            <input id="Registrar" type="submit" value="Registrar" name="Registrar" class="btn-enviar">    
      </form>
      <form action="../Views/login.php" method="post">
        <input id="Volver" type="submit" value="Volver al Login" name="Volver" class="btn-enviar"> 
      </form>
      <h1 id="posicion" style="width:600px;"></h1> 
      </div>
    
   
    </div>
  </body>
</html>

<?php
//Si se pulsa el botón de Registrar se recogen los post y se realiza el registro con la función anterior
//Si es correcto el registro te envía al login

if(isset($_REQUEST['Registrar'])){
  try{
    $sql= "USE easyrock";
    $conn->exec($sql);
    $correo= $_POST['correo'];
    $pass= $_REQUEST['clave2'];
    $contrasenaCif = password_hash($pass, PASSWORD_DEFAULT);
    
    $sql2 = $conn->prepare("SELECT * FROM usuarios WHERE correo=:correo");
    $sql2 -> bindParam(":correo", $correo);
    $sql2->execute();
    $count = $sql2->rowCount();
    
    if($count>=1){
      echo "<span style='color:red; font-size:20px; position:absolute; left:750px; top:800px; z-index:10'>EMAIL EXISTENTE</span><br>";
    }else{
        $sql="INSERT IGNORE usuarios (nombre_usuario, apellido1, apellido2, telefono, correo, instrumento, descripcion, contrasenia) VALUES('$_POST[nombre_usuario]', '$_POST[apellido1]','$_POST[apellido2]', '$_POST[telefono]','$_POST[correo]', '$_POST[instrumento]', '$_POST[descripcion]','$contrasenaCif')";
        $execute = $conn->prepare($sql);
        $execute->execute();
        $request= $execute->fetchAll(PDO::FETCH_ASSOC);
        header('Location: ../Views/login.php');
    }
}catch(PDOException $ex){
    echo $ex->getMessage();
    
}

}else{
  
}

?>