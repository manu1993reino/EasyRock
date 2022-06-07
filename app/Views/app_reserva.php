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
<!DOCTYPE html>
<html>
	<head>
		<title>app 3</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Ejemplos de clase" /> 
		<meta name="author" content="Iván Jiménez" />
		<link rel="stylesheet" type="text/css" href="estilos.css" />
		<style type ="text/css">
			@import url('https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap');
			a, a:visited {
				color: white;
			}

			a:hover{
				color: lime;
			}

			#panel_menu {
				position: fixed;
				top: 0px;
				bottom: 0px;
				left: -200px;
				width: 250px;
				text-align: left;
				padding-left: 30px;
				background-color: black;
				overflow: hidden;
				color: white;
				cursor: pointer;
				z-index: 20;
				transition: left 0.5s;
			}
			
			#btn_expandir , #btn_contraer {
				position: absolute;
				background-color: black;
				right: 5px;
				top:5px;
			}

			#btn_contraer {
				z-index: 1;
			}	
			#btn_expandir {
				z-index: 2;
			}

			.spanMenu {
				margin-top:40px;
				display: block;
                
			}
            .imgMenu{
                width: 60px;
                height: 60px;
            }
/*
			.body{
				position: absolute;
				top: 0px;
				left: 0px;
				right: 0px;
				bottom: 0px;
				width: auto;
				height: auto;
				background-image: url(../Resources/pictures/casita.jpg);
				background-size: cover;
				-webkit-filter-filter: blur(5px);
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				z-index: -20;
			}
*/
            .divprincipal{
                width: 95.2%;
                height: 1080px;
				text-align: center;
				/*background-color: white;*/
				position: absolute;
				left:80px;
				top: -8px;	
				font-family: Myriad Pro;	

            }

            a{
                text-decoration: none;
			}


			.todo{
				width: 100%; 
			}

			.imagenCabecera{
				width:100%;
			}

			table{
				margin-left: auto;
				margin-right: auto;
			}

			td{
				padding-left: 20px;
			}
			.iconitos{
				padding-left:150px;
				padding-right:150px;
			}

			.imagenTabla{
				height: 250px;
				border-radius: 20px;
				box-shadow: 5px 8px 12px black;
			}
			.imagenTablaLogo{
				height: 150px;
			}

			.imagenTabla:hover {
				transition: 2s;
				filter: opacity(0.5);
			}

			.container{
				
			}

			h1{
				font-size:50px;
			}
			h2{
				font-size:30px;
			}

			hr{
				width: 300px;
			}

			.textoCentrado{
				margin-left: auto;
				margin-right: auto;
				width: 1250px;
			}

			.imagenDosColumnas{
				height:500px;
			}

			section {
				width: 100%;
				display: inline-block;
				background: #333;
				height: 50vh;
				text-align: center;
				font-size: 22px;
				font-weight: 700;
				text-decoration: underline;
			}

			.footer-distributed{
				background: black;
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
				box-sizing: border-box;
				width: 100%;
				text-align: left;
				font: bold 16px sans-serif;
				padding: 40px;
			}


			.footer-distributed .footer-left,
			.footer-distributed .footer-center,
			.footer-distributed .footer-right{
				display: inline-block;
				vertical-align: top;
			}

			/* Footer left */

			.footer-distributed .footer-left{
				width: 40%;
			}

			/* The company logo */

			.footer-distributed h3{
				color:  #ffffff;
				margin: 0;
			}

			/* Footer links */

			.footer-distributed .footer-links{
				color:  #ffffff;
				margin: 20px 0 12px;
				padding: 0;
			}

			.footer-distributed .footer-links a{
				display:inline-block;
				line-height: 1.8;
				font-weight:400;
				text-decoration: none;
				color:  inherit;
			}

			.footer-distributed .footer-company-name{
				color:  #222;
				font-size: 14px;
				font-weight: normal;
				margin: 0;
			}

			/* Footer Center */

			.footer-distributed .footer-center{
				width: 35%;
			}

			.footer-distributed .footer-center i{
				background-color:  #33383b;
				color: #ffffff;
				font-size: 25px;
				width: 38px;
				height: 38px;
				border-radius: 50%;
				text-align: center;
				line-height: 42px;
				margin: 10px 15px;
				vertical-align: middle;
			}

			.footer-distributed .footer-center i.fa-envelope{
				font-size: 17px;
				line-height: 38px;
			}

			.footer-distributed .footer-center p{
				display: inline-block;
				color: #ffffff;
				font-weight:400;
				vertical-align: middle;
				margin:0;
			}

			.footer-distributed .footer-center p span{
				display:block;
				font-weight: normal;
				font-size:14px;
				line-height:2;
			}

			.footer-distributed .footer-center p a{
				color:  lightseagreen;
				text-decoration: none;;
			}

			.footer-distributed .footer-links a:before {
				content: "|";
				font-weight:300;
				font-size: 20px;
				left: 0;
				color: #fff;
				display: inline-block;
				padding-right: 5px;
			}

			.footer-distributed .footer-links .link-1:before {
				content: none;
			}

			/* Footer Right */

			.footer-distributed .footer-right{
				width: 20%;
			}

			.footer-distributed .footer-company-about{
				line-height: 20px;
				color:  #92999f;
				font-size: 13px;
				font-weight: normal;
				margin: 0;
			}

			.footer-distributed .footer-company-about span{
				display: block;
				color:  #ffffff;
				font-size: 14px;
				font-weight: bold;
				margin-bottom: 20px;
			}

			.footer-distributed .footer-icons{
				margin-top: 25px;
			}

			.footer-distributed .footer-icons a{
				display: inline-block;
				width: 35px;
				height: 35px;
				cursor: pointer;
				background-color:  #33383b;
				border-radius: 2px;

				font-size: 20px;
				color: #ffffff;
				text-align: center;
				line-height: 35px;

				margin-right: 3px;
				margin-bottom: 5px;
			}


			.spanLogo{
				color: #5379fa !important;
			}

			.textoTd{
				margin-left:40px;
			}




			div.table-title {
			display: block;
			margin: auto;
			max-width: 700px;
			padding:5px;
			width: 100%;
			}

			.table-title h3 {
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
			
			tr:hover td {
			background:#4E5066;
			color:#FFFFFF;

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
			
			tr:nth-child(odd):hover td {
			background:#4E5066;
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






.footer-distributed{
				background: black;
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
				box-sizing: border-box;
				width: 100%;
				text-align: left;
				font: bold 16px sans-serif;
				padding: 40px;
			}


			.footer-distributed .footer-left,
			.footer-distributed .footer-center,
			.footer-distributed .footer-right{
				display: inline-block;
				vertical-align: top;
			}

			/* Footer left */

			.footer-distributed .footer-left{
				width: 40%;
			}

			/* The company logo */

			.footer-distributed h3{
				color:  #ffffff;
				margin: 0;
			}

			/* Footer links */

			.footer-distributed .footer-links{
				color:  #ffffff;
				margin: 20px 0 12px;
				padding: 0;
			}

			.footer-distributed .footer-links a{
				display:inline-block;
				line-height: 1.8;
				font-weight:400;
				text-decoration: none;
				color:  inherit;
			}

			.footer-distributed .footer-company-name{
				color:  #222;
				font-size: 14px;
				font-weight: normal;
				margin: 0;
			}

			/* Footer Center */

			.footer-distributed .footer-center{
				width: 35%;
			}

			.footer-distributed .footer-center i{
				background-color:  #33383b;
				color: #ffffff;
				font-size: 25px;
				width: 38px;
				height: 38px;
				border-radius: 50%;
				text-align: center;
				line-height: 42px;
				margin: 10px 15px;
				vertical-align: middle;
			}

			.footer-distributed .footer-center i.fa-envelope{
				font-size: 17px;
				line-height: 38px;
			}

			.footer-distributed .footer-center p{
				display: inline-block;
				color: #ffffff;
				font-weight:400;
				vertical-align: middle;
				margin:0;
			}

			.footer-distributed .footer-center p span{
				display:block;
				font-weight: normal;
				font-size:14px;
				line-height:2;
			}

			.footer-distributed .footer-center p a{
				color:  lightseagreen;
				text-decoration: none;;
			}

			.footer-distributed .footer-links a:before {
				content: "|";
				font-weight:300;
				font-size: 20px;
				left: 0;
				color: #fff;
				display: inline-block;
				padding-right: 5px;
			}

			.footer-distributed .footer-links .link-1:before {
				content: none;
			}

			/* Footer Right */

			.footer-distributed .footer-right{
				width: 20%;
			}

			.footer-distributed .footer-company-about{
				line-height: 20px;
				color:  #92999f;
				font-size: 13px;
				font-weight: normal;
				margin: 0;
			}

			.footer-distributed .footer-company-about span{
				display: block;
				color:  #ffffff;
				font-size: 14px;
				font-weight: bold;
				margin-bottom: 20px;
			}

			.footer-distributed .footer-icons{
				margin-top: 25px;
			}

			.footer-distributed .footer-icons a{
				display: inline-block;
				width: 35px;
				height: 35px;
				cursor: pointer;
				background-color:  #33383b;
				border-radius: 2px;

				font-size: 20px;
				color: #ffffff;
				text-align: center;
				line-height: 35px;

				margin-right: 3px;
				margin-bottom: 5px;
			}


			.spanLogo{
				color: #5379fa !important;
			}
			
		</style>
		<script>
			function cambia_estado(elemento) {
				// Obtenemos el valor de z-index del botón expandir
				if ( document.getElementById("btn_expandir").style.zIndex == 1) {
					// Pasamos a primer plano el botón expandir ">"
					document.getElementById("btn_expandir").style.zIndex = 2;
					document.getElementById("btn_contraer").style.zIndex = 1;
					// Desplazamos hacia la izquierda el panel
					document.getElementById("panel_menu").style.left = "-200px";

				} else {
					// Pasamos a primer plano el botón contraer "<"
					document.getElementById("btn_expandir").style.zIndex = 1;
					document.getElementById("btn_contraer").style.zIndex = 2;
					// Desplazamos hacia la derecha el panel
					document.getElementById("panel_menu").style.left = "0px";					
				}
				var nuevo_color = window.getComputedStyle(elemento).backgroundColor;
				document.getElementById("interior").style.backgroundColor = nuevo_color;			
			}

		</script>
	</head>
	<body class="todo" style="font-family: Mochiy Pop P One">
		<div id="panel_menu">
			<div id="btn_contraer" onclick="cambia_estado()"><img class="imgMenu" src="../Resources/pictures/icon-menu-desplegable.png"></div>			
			<div id="btn_expandir" onclick="cambia_estado()"><img class="imgMenu" src="../Resources/pictures/icon-menu-desplegable.png"></div>
            <span class="spanMenu">EASYROCK</span>
			<a href="../Views/app3.php"><span class="spanMenu">Página de inicio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-pagina-de-inicio.png"></a></span>
            <a href="../Views/app_data.php"><span class="spanMenu">Datos personales&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-perfil-personal.png"></span></a>
			<a href="../Views/app_reserva.php"><span class="spanMenu">Tus reservas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-reserva.png"></span></a>
			<a href="../Views/app_locales.php"><span class="spanMenu">Lista de locales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-locales.png"></span></a>
            <a href="../Views/app_nosotros.php"><span class="spanMenu">Sobre nosotros &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-nosotros.png"></span></a>
			<a href="../Controllers/contacto.php"><span class="spanMenu">Contacto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-sobre.png"></span></a>
			<a href="../Views/app_cierre.php"><span class="spanMenu">Cierre de sesión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-cerrar-sesion-rojo.png"></span></a>		
		</div>
		
        <div class="divprincipal">
		<img class="imagenCabecera" src="../Resources/pictures/fig1_reservas.jpg">
		<br>
		<br>
		<h1>TUS RESERVAS</h1>
		<br>
		<br>
		<h2>Aqui puedes ver tus reservar</h2>
		<hr>
		<br>
		<h2>Si quieres ver disponibilidad de locales para realizar reserva pulsa <a href="../Views/app_locales.php" style='color:blue';>aqui</a></h2>		

<?php
    $sql="use easyrock";
    $conn->exec($sql);
	$resultado = "SELECT * from reservas_locales WHERE id_usuario = $id";
	$res= $conn->prepare($resultado);
	$res->execute();
	$todo= $res->fetchAll(PDO::FETCH_ASSOC);

	if(!empty($todo)){
		echo "<h3 style='z-index:100';>Haz click dos veces para anular</h3>";
		echo "<table class='table-fill'>
				<thead>
					<tr>
						<th class='text-left'>ID RESERVA</th>
						<th class='text-left'>ID LOCAL</th>
						<th class='text-left'>ID SOLICITUD</th>
						<th class='text-left'>FECHA</th>
						<th class='text-left'>HORA</th>
						<th class='text-left'>ID USUARIO</th>
						<th class='text-left'></th>";
							foreach ($todo as $data =>$result){
			 
							 
			echo "	</tr>
				</thead>
				<tbody class='table-hover'>
					<tr>
						<td class='text-left'> " . $result['id_reserva'] . "</td>
						<td class='text-left'> " . $result['id_local'] . "</td>
						<td class='text-left'> " . $result['id_solicitud'] . " </td>
						<td class='text-left'> " . $result['fecha'] . " </td>
						<td class='text-left'> " . $result['hora_inicio'] ." </td>
						<td class='text-left'> " . $result['id_usuario'] ." </td>
						<td class='text-left'><form method='post' action='' value=".$result['id_reserva'].">
						<input type='hidden' name='valor' value=".$result['id_reserva'].">
						<input type='submit' name='Anular' value='ANULAR'></form></td><br>
					</tr>
					<tr>";
						} 					 
			?>
					</tr>
				</tbody>
			  </table><?php 
			}
			else{
				echo "<h3 style='color:green; z-index:101';>No tienes ninguna reserva realizada</h3>"; 
			} 
			?>

<?php
	
if(isset($_POST['Anular'])){
	$sql="use easyrock";
	$conn->exec($sql);
	$resultado = "DELETE from reservas_locales WHERE id_reserva = '".$_POST['valor']."';";
	$resBorrarReserva= $conn->prepare($resultado);
	$resBorrarReserva->execute();
	$borrarReserva= $resBorrarReserva->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($_POST['Anular'])){

		@header("Refresh:0");

	}
}

    
?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer class="footer-distributed">
			<div class="footer-left">
				<h3>Easy<span class="spanLogo">Rock</span>App</h3>
				<p class="footer-links">
					<a href="../Views/app3.php" class="link-1">Página de Inicio</a>
					<a href="../Views/app_data.php">Datos Personales</a>
					<a href="../Views/app_reserva.php">Tus Reservas</a>
					<a href="../Views/app_locales.php">Lista de Locales</a>
					<a href="../Views/app_nosotros.php">Sobre Nosotros</a>
					<a href="../Views/app_cierre.php">Cierre de sesión</a>
				</p>
				<p class="footer-company-name">Easy Rock S.L. 2022</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>C/ Fermin Caballero 41</span> Madrid, España</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>+34 608210200</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">soporte@easyrockapp.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Sobre nosotros</span>
					Easy Rock App es un proyecto de fin de FP realizado por los alumnos Manuel Antonio Reino Diez y Victor López Morales.
				</p>
				</div>
		</footer>
    </div>
	</body>
</html>