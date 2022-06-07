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

<html>
<style>

    .body{
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: auto;
        height: auto;
        background-image: url(../Resources/pictures/fonfo_filtro.jpg);
        background-size: cover;
        -webkit-filter-filter: blur(5px);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        z-index: 0;
    }

    .grad{
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: auto;
        height: auto;
        background: black;
        z-index: 0;
        opacity: 0.5;
    }

    div.localSeleccionado {
    display: block;
    margin: auto;
    max-width: 700px;
    padding:5px;
    width: 100%;
    }

    .localSeleccionado h3 {
    color: #fafafa;
    font-size: 15px;
    font-weight: 200;
    font-style:normal;
    font-family: "Roboto", helvetica, arial, sans-serif;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    text-transform:uppercase;
    }


    .table-fill {
    background: white;
    border-radius:3px;
    border-collapse: collapse;
    margin: auto;
    padding:5px;
    width: 60%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
    }
    
    th {
    color:#D5DDE5;;
    background:#1b1e24;
    border-bottom:4px solid #9ea7af;
    border-right: 1px solid #343a45;
    font-size:15px;
    font-weight: 100;
    padding:24px;
    text-align:left;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    vertical-align:middle;
    }

    th:first-child {
    border-top-left-radius:3px;
    }
    
    th:last-child {
    border-top-right-radius:3px;
    border-right:none;
    }
    
    tr {
    border-top: 1px solid #C1C3D1;
    border-bottom-: 1px solid #C1C3D1;
    color:#666B85;
    font-size:16px;
    font-weight:normal;
    text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }
    
    
    tr:first-child {
    border-top:none;
    }

    tr:last-child {
    border-bottom:none;
    }
    
    tr:nth-child(odd) td {
    background:#EBEBEB;
    }

    tr:last-child td:first-child {
    border-bottom-left-radius:3px;
    }
    
    tr:last-child td:last-child {
    border-bottom-right-radius:3px;
    }
    
    td {
    background:#FFFFFF;
    padding:20px;
    text-align:left;
    vertical-align:middle;
    font-weight:150;
    font-size:15px;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #C1C3D1;
    }

    td:last-child {
    border-right: 0px;
    }

    th.text-left {
    text-align: left;
    }

    th.text-center {
    text-align: center;
    }

    th.text-right {
    text-align: right;
    }

    td.text-left {
    text-align: left;
    }

    td.text-center {
    text-align: center;
    }

    td.text-right {
    text-align: right;
    }





    .localSeleccionado{
        position: absolute;
        left: 525px;
        top:200px;    
    }
    .tituloLocalSeleccionado{
        position: absolute;
        left: 700px;
        top:130px;  
        color: white;  
    }

    .elegirFecha{
        position: absolute;
        left: 525px;
        top: 340px;
    }

    .solicitudReserva{
        position:absolute;
        left: 360px;
        top: 610px;
    }


    .verReservas{
        position: absolute;
        left:390px;
        top: 0px;
    }

    .eligeHora{
        color: white;
    }

    .cierreSesion{
        position: absolute;
        left:520px;
        top: 0px;
    }

    .limiteDosReservas{
        position: absolute;
        left:280px;
        top: 500px;
    }
    
    .reservaConfirmada{
        color: white;
    }


</style>

<div class="body"></div>
<div class="grad"></div>

<?php
if(isset($_GET['id_local'])){
    $codigo = $_GET['id_local'];
    $sql="use easyrock";
    $conn->exec($sql);

    $resultado = "SELECT * from locales WHERE id_local=$codigo";
    $res= $conn->prepare($resultado);
    $res->execute();
    $res -> bindParam(':id_local', $_GET['id_local']);
    $res -> execute(array());
    echo "
    <h3 class='tituloLocalSeleccionado'>Información del local seleccionado</h3>    
    <table class='localSeleccionado'>
            	<thead>
                    <tr>
						<th>Cod</th>
						<th>Nombre</th>
						<th>Ciudad</th>
						<th>Localidad</th>
                        <th>Dirección</th>
						<th>C.P</th>";
							foreach ($res as $dato =>$result){
			echo "	</tr>
				</thead>
				<tbody>
					<tr>
						<td> " . $result['id_local'] . "</td>
						<td> " . ucfirst(strtolower($result['nombre_local'])) . " </td>
						<td> " . ucfirst(strtolower($result['ciudad'])) . " </td>
						<td> " . ucfirst(strtolower($result['localidad'])) . " </td>
                        <td> " . ucfirst(strtolower($result['direccion'])) . " </td>
						<td> " . $result['cp'] . " </td>
					</tr>
					<tr>";
					
						}
            echo "</table>";

//
//
//
//
//
//
//
//Prueba por hora en bbdd
$codigo = $_GET['id_local'];
$sql="use easyrock";
$conn->exec($sql);

$horaEspa= ini_set('date.timezone','Europe/Madrid');
$horahoy=date("G");
?>
<?php
$sql4 = $conn->prepare("SELECT id_reserva FROM reservas_locales WHERE id_usuario=$id;");
$sql4->execute();
//$count3= $sql4->fetchAll(PDO::FETCH_ASSOC);
$count3 = $sql4->rowCount();

if($count3<2){
?>    
<!--Formulario de solicitud de reserva eligiendo fecha y hora. Se trae del foreach anterior en modo hidden el 
id del local para que lo siga mapeando desde la bbdd-->
<div class="elegirFecha">
    <form id="formulario" action="" method="post" value=<?php $result['id_local']?>>
        <input type=hidden value=<?php echo $result['id_local']?>>
        <h3 style="color:white;">Elige una Fecha</h3> 
        
        <input type="date" name="fecha" id="fecha" class="input" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
        <input type="submit" name="valFecha" value="Confirmar Fecha">
    </form>   
<?php 
}else{
    ?>
     <span class="limiteDosReservas" style='background-color: black; color:red; font-size:30px; position:absolute; 
     z-index:10'>Has alcanzado el límite de dos reservas, si quieres seguir reservando por favor anula alguna reserva</span><br>";
    <div class="elegirFecha"> 
    <?php
}      
        //Primero validamos la fecha
        if(!empty($_POST["valFecha"])){
            $local=$result['id_local'];
            $fecha = $_POST['fecha'];
            //Si hay coincidencias en fecha y hora
            $sql="use easyrock;";
            $conn->exec($sql);
            //
            /* 
            $resul="SELECT hora_inicio FROM reservas_locales WHERE fecha='$fecha' AND id_local=$local";
            $res1= $conn->prepare($resul);
            $res1->execute();
            $fechaReserva= $res1->fetchAll(PDO::FETCH_COLUMN);
            */    

                if(!empty($fecha)){
                    //Hacemos una Select para imprimir una tabla con las horas reservadas en esa fecha para que el
                    // usuario vea que no puede elegirlas
                    $local=$result['id_local'];
                    $fecha = $_POST['fecha'];
                    $sql="use easyrock;";
                    $conn->exec($sql);

                    $resulHorasReservadas="SELECT * FROM reservas_locales WHERE fecha='$fecha' AND id_local=$local ORDER BY hour(hora_inicio) ASC";
                    
                                
                    $resHorasRes= $conn->prepare($resulHorasReservadas);
                    $resHorasRes->execute();
                    $horasNo= $resHorasRes->fetchAll(PDO::FETCH_ASSOC);
                    if($horasNo){
                    echo "<table>
                    <thead>
                        <tr>
                            <th style='color:red;'>Horas ocupadas para el dia ".substr($fecha, 8, 2)."/".substr($fecha, 5, 2)."/".substr($fecha, 0, 4)."</th>";
                                foreach ($horasNo as $dato =>$result){
                    echo "	</tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> " . $result['hora_inicio'] . "</td>
                        </tr>
                        </table>";
                        
                            }
                        }else{
                            echo "<table>
                            <thead>
                                <tr>
                                    <th style='color:green; background-color:white'>Todas las horas están disponibles para el dia ".substr($fecha, 8, 2)."/".substr($fecha, 5, 2)."/".substr($fecha, 0, 4)."</th>";
                                        
                            echo "	</tr></thead></table>";
                         
                        }        
                        

                    //print_r($fechaReserva);
                    if($fecha==$hoy){
                    echo "<h3><span class='eligeHora'>Elige la hora deseada</span></h3>"; 
                    echo "<form id='formulario' action='' method='post' value='".$result['id_local']."'>";
                    echo "<input type='time' name='hora_inicio1' class='input' list='listalimitestiempo' min='' max='' step='3600' required><br>";
                    echo "<input type='hidden' value='".$fecha."' name='fecha1'>";
                    echo "<datalist id='listalimitestiempo'>";
                        for($i=$horahoy+1; $i<=21; $i++){

                                echo "<option value='".$i.":00'>";

                            

                        }
                    echo "</datalist>";
                    echo "<input id='Solicitar' type='submit' value='Solicitar' name='Solicitar1' class='btn-enviar'>";
                    echo "</form>";
                    }
                    else{
                        echo "<h3><span class='eligeHora'>Elige la hora deseada</span></h3>"; 
                        echo "<form id='formulario' action='' method='post' value='".$result['id_local']."'>";
                        echo "<input type='time' name='hora_inicio2' class='input' list='listalimitestiempo' min='' max='' step='3600' required><br>";
                        echo "<input type='hidden' value='".$fecha."' name='fecha2'>";
                        echo "<datalist id='listalimitestiempo'>";
                            for($i=9; $i<=21; $i++){
    
                                    echo "<option value='".$i.":00'>";
    
                                
    
                            }
                        echo "</datalist>";
                        echo "<input id='Solicitar' type='submit' value='Solicitar' name='Solicitar2' class='btn-enviar'>";
                        echo "</form>";
                        }
                }
                
            }
        }
        ?>
    <form class="verReservas" action="../Views/app_reserva_admin.php"><input type="submit" name="Reservas" value="Ver tus reservas"></form>
    <form class="cierreSesion" action="../Views/app_cierre.php"><input type="submit" name="cierreSesion" value="Cierre de sesión"></form>
</div>
<?php

//Si no está vacío el botón de solicitar reserva entraría en el if
if((!empty($_POST['Solicitar1'])) || (!empty($_POST['Solicitar2']))){
    try{
        $codigo = $_GET['id_local'];
        $sql="use easyrock";
        $conn->exec($sql);

        
        if(!empty($_POST['hora_inicio1'])){
            $hora= $_POST['hora_inicio1'];
            $fecha= $_POST['fecha1'];
        }
        if(!empty($_POST['hora_inicio2'])){
            $hora= $_POST['hora_inicio2'];
            $fecha= $_POST['fecha2'];
        }
        
        
        //Si hay coincidencias en fecha y hora salta un span con Horario no disponible
        $sql2 = $conn->prepare("SELECT id_local, fecha, hora_inicio FROM solicitud_reserva WHERE id_local=:id_local AND fecha=:fecha AND hora_inicio=:hora_inicio");
        $sql2 -> bindParam(":id_local", $codigo);
        $sql2 -> bindParam(":fecha", $fecha);
        $sql2 -> bindParam(":hora_inicio", $hora);
        $sql2->execute();
        $count = $sql2->rowCount();

        $sql3 = $conn->prepare("SELECT id_local, fecha, hora_inicio FROM reservas_locales WHERE id_local=:id_local AND fecha=:fecha AND hora_inicio=:hora_inicio");
        $sql3 -> bindParam(":id_local", $codigo);
        $sql3 -> bindParam(":fecha", $fecha);
        $sql3 -> bindParam(":hora_inicio", $hora);
        $sql3->execute();
        $count2 = $sql3->rowCount();


        $sql5 = $conn->prepare("SELECT id_solicitud FROM solicitud_reserva WHERE id_usuario=$id AND id_local=$codigo;");
        $sql5->execute();
        $count4 = $sql5->rowCount();
        
        if($count4<1){   
            if($count>=1 | $count2>=1){
                echo "<span style='background-color:black; color:red; font-size:30px; position:absolute; left:700px; top:500px; z-index:10'>Horario no disponible</span><br>";

            }else{
                //Hay que meter un if aquí para ver si ya hay hecho una solicitud de reserva por un usuario, 
                // si la hay no tiene que dejar hacer una solicitud nueva hasta que no cierre la que tenga abierta
                $sql="INSERT IGNORE solicitud_reserva (id_local, fecha, hora_inicio, importe, id_usuario) VALUES('$_GET[id_local]', '$fecha','$hora', 10, $id)";
                

                $execute = $conn->prepare($sql);
                $execute->execute();
                $request= $execute->fetchAll(PDO::FETCH_ASSOC);

            }
        }else{
            echo "<span style='background-color: black; color:red; font-size:30px; position:absolute; left:620px; top:500px; z-index:10'>Tienes una solicitud de reserva pendiente</span><br>"; 
        }
 

    }catch(PDOException $ex){
        echo $ex->getMessage();
        
        }
}


            $resultado = "SELECT * from solicitud_reserva";
            $res= $conn->prepare($resultado);
            $res->execute();
            $todo= $res->fetchAll(PDO::FETCH_ASSOC);
            //Si no está vacía la tabla de solicitud de reserva imprime la tabla con los datos existentes
            if(!empty($todo)){
                $sql="use easyrock;";
                $conn->exec($sql);

                        echo "
                            <table class='solicitudReserva'>
                            <thead>
                                <tr>
                                <th style='background-color: transparent; text-align: center; color:white' colspan='8'><h2>Esta es tu solicitud de reserva</h2></th>
                                </tr>
                                <tr>
                                    <th>SOLICITUD RESERVA</th>
                                    <th>ID LOCAL</th>
                                    <th>FECHA</th>
                                    <th>HORA</th>
                                    <th>IMPORTE</th>
                                    <th>TU ID</th>
                                    <th>ACEPTAR</th>
                                    <th>ANULAR</th>";
                                        foreach ($todo as $dato =>$solicitud){
                        echo "	</tr>
                            </thead>
                            <tbody><form action='' method='post'> 
                                <tr>
                                    <td> " . $solicitud['id_solicitud'] . "</td>
                                    <td> " . $solicitud['id_local'] . " </td>
                                    <td> " . $solicitud['fecha'] . " </td>
                                    <td> " . $solicitud['hora_inicio'] . " </td>
                                    <td> " . $solicitud['importe'] . '€'." </td>
                                    <td> " . $id ." </td>
                                    <td><input type='submit' value='Reservar' name='Reservar'></form></td>
                                    <form method='post' action='' value=".$solicitud['id_solicitud'].">
                                    <input type='hidden' name='valor' value=".$solicitud['id_solicitud'].">
                                    <td><input type='submit' value='Anular Solicitud' name='AnularSolicitud'></form></td><br>
                                </tr>";
                                
                                        }
                                    
                        echo "</table>";
                                           
            }





//Si se pulsa Anular Solicitud
if(isset($_POST['AnularSolicitud'])){

	$sql="use easyrock";
	$conn->exec($sql);
	$resultado = "DELETE from solicitud_reserva WHERE id_solicitud = '".$_POST['valor']."';";
	$resBorrarSolicitud= $conn->prepare($resultado);
	$resBorrarSolicitud->execute();
	$borrarReserva= $resBorrarSolicitud->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($_POST['AnularSolicitud'])){

		@header("Refresh:0");

	}
}







//Si se pulsa en reserva entraría en este if
if(!empty($_POST['Reservar'])){
    $sql="use easyrock;";
    $conn->exec($sql);
    //Inner para buscar coincidencias de solicitudes que ya sean reservas confirmadas
    $inner= "SELECT * FROM solicitud_reserva
                LEFT OUTER JOIN reservas_locales
                    ON reservas_locales.id_local = reservas_locales.id_local WHERE solicitud_reserva.fecha = reservas_locales.fecha
                        GROUP BY solicitud_reserva.id_solicitud;";
    $resInner= $conn->prepare($inner);
    $resInner->execute();
    $todoInner= $resInner->fetchAll(PDO::FETCH_ASSOC);
    
    //Con este borrado haciendo un inner conseguimos eliminar las solicitudes que no pueden realizarse porque ya son
    // reservas confirmadas. Con esto evitamos trazas y limpiamos la bbdd.
    if($todoInner){
        
        $sqlBorrarInner="DELETE solicitud_reserva.* FROM solicitud_reserva
                            LEFT OUTER JOIN reservas_locales
                                ON reservas_locales.id_local = reservas_locales.id_local 
                                WHERE solicitud_reserva.fecha = reservas_locales.fecha;";
                
        
        $executeBorrarInner = $conn->prepare($sqlBorrarInner);
        $executeBorrarInner->execute();
        $requestBorrarInner= $executeBorrarInner->fetchAll(PDO::FETCH_ASSOC);
        //Con este header refrescamos la página para que desaparezcan las solicitudes inválidas
        header("Refresh:10");
    }
    $local= $solicitud['id_local'];
    $fecha= $solicitud['fecha'];
    $hora= $solicitud['hora_inicio'];

        //Con esto hacemos un filtro por fecha y hora y si encuentra coincidencias salta un span con horario no disponible
    $sql2 = $conn->prepare("SELECT id_local, fecha, hora_inicio FROM reservas_locales WHERE id_local=:id_local AND fecha=:fecha AND hora_inicio=:hora_inicio");
    $sql2 -> bindParam(":id_local", $local);
    $sql2 -> bindParam(":fecha", $fecha);
    $sql2 -> bindParam(":hora_inicio", $hora);
    $sql2->execute();
    $count = $sql2->rowCount();

if($count>=1){
    echo "<span style='background-color:black; color:red; font-size:30px; position:absolute; left:700px; top:500px; z-index:10'>Horario no disponible</span><br>";
    }else{
        //Si no hay coincidencias insertar la solicitud reserva en reservas locales
        
        //Si ya tiene 2 reservas no debe dejar hacer más hasta que no anule o se venza
        $sql="INSERT IGNORE reservas_locales (id_local, id_solicitud, fecha, hora_inicio, id_saldo, id_usuario) VALUES('$solicitud[id_local]', 
        '$solicitud[id_solicitud]','$solicitud[fecha]','$solicitud[hora_inicio]', 100, $id)";

        $execute = $conn->prepare($sql);
        $execute->execute();
        $requestConfirmarReserva= $execute->fetchAll(PDO::FETCH_ASSOC);

        //Si se confirma la reserva borra automaticamente la solicitud que la ha llevado a cabo
        $sqlBorrar="DELETE FROM solicitud_reserva WHERE id_solicitud = $solicitud[id_solicitud]";
        $executeBorrar = $conn->prepare($sqlBorrar);
        $executeBorrar->execute();
        $requestBorrar= $executeBorrar->fetchAll(PDO::FETCH_ASSOC);




        //Hacemos una primera select para sacar la id_reserva para la siguiente select
        $sqlIdReserva="SELECT id_reserva FROM reservas_locales WHERE id_solicitud = $solicitud[id_solicitud]";
        $executeIdReserva = $conn->prepare($sqlIdReserva);
        $executeIdReserva->execute();
        $requestIdReserva= $executeIdReserva->fetchAll(PDO::FETCH_ASSOC);
        foreach ($requestIdReserva as $dato =>$solicitudId){
            $solicitudId['id_reserva'];
        }

        //Hacemos un doble inner para filtrar los datos que se van a enviar al usuario por email
        $sqlEmail="SELECT id_reserva, $codigo, nombre_local, direccion, fecha, hora_inicio, correo
         FROM reservas_locales
        LEFT OUTER JOIN usuarios
            ON reservas_locales.id_usuario = usuarios.id_usuario
            LEFT OUTER JOIN locales
                ON locales.id_local = reservas_locales.id_local
        WHERE reservas_locales.id_reserva = $solicitudId[id_reserva]";

        $executeIdReservaCorreo = $conn->prepare($sqlEmail);
        $executeIdReservaCorreo->execute();
        $RequestdatosEmail= $executeIdReservaCorreo->fetchAll(PDO::FETCH_ASSOC);
        foreach ($RequestdatosEmail as $dato =>$emailEnviar){
            $IdReservaEmail = $emailEnviar['id_reserva'];
            //$IdLocalEmail = $emailEnviar['id_local'];
            $NombreLocalReservaEmail = $emailEnviar['nombre_local'];
            $DireccionReservaEmail = $emailEnviar['direccion'];
            $FechaReservaEmail = $emailEnviar['fecha'];
            $HoraReservaEmail = $emailEnviar['hora_inicio'];
            $CorreoReservaEmail = $emailEnviar['correo'];
        }
        //Si se a pulsado Reservar, envia automaticamente un correo de confirmación con formulario
        //sin que el usuario tenga que pulsar a enviar.
        //echo $IdReservaEmail;
        echo "
        <!doctype html>
        <html lang='es>
        <head>
            <title>Formulario confirmación de reserva</title>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <link rel=stylesheet' href='../Resources/css/login.css'>
            <script src='../Resources/js/jquery.js'></script>
            <script src='../Resources/js/confirmarReservaAdmin.js'></script>
        </head>
        <body>
                <div style='position:absolute; top:800px'>
                    <form style='position:absolute; left:350px; top: 50px;' id='formularioReserva' action='https://formsubmit.co/ajax/$CorreoReservaEmail' method='POST'>
                        <input type='hidden' name='Correo Usuario' value='$CorreoReservaEmail'>
                        <input type='hidden' name='Id reserva' value='$IdReservaEmail'>
                        <input type='hidden' name='Nombre del local' value='$NombreLocalReservaEmail'>
                        <input type='hidden' name='Direccion' value='$DireccionReservaEmail'>
                        <input type='hidden' name='Fecha' value='$FechaReservaEmail'>
                        <input type='hidden' name='Hora' value='$HoraReservaEmail'>
                        <input type='submit' name='btnEnviarReserva' value='Confirmar reserva'>
                    </form>
                    <p class='respuesta' style='font-size:30px; color:green; background-color:black; position: absolute; left:600px; top: -350px; width: 450px; text-align:center;'>
                    <p class='respuesta2'></p>
                    <script src='../Resources/js/jquery.js'></script>
                    <script src='../Resources/js/confirmarReserva.js'></script>

                    <form style='position:absolute; left:500px; top: 50px;' action='../Controllers/confirmar_O_Anular.php?id_reserva=$emailEnviar[id_reserva]' method='POST' value='$emailEnviar[id_reserva]'>
                        <input type='hidden' name='valor' value='$emailEnviar[id_reserva]'>
                        <input type='hidden' name='local' value='$codigo'>
                        <input type='submit' name='AnularRes' value='Rechazar reserva'>
                    </form> 
                </div>
            </div>
        </body>
        </html>";
        //Al realizarse la confirmación nos lleva a la página de reservas y ahi podrá verse la reserva realizada
    }
}



?>
</html>
  