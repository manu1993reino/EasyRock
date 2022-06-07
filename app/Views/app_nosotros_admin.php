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

.imagenesInicio{
	max-width: 500px;
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

.imagenDosColumnas{
	height: 400px;
	width: 400px;
	border-radius: 20px;
	box-shadow: 5px 8px 12px black;
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
			<a href="../Views/app_admin.php"><span class="spanMenu">Página de inicio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-pagina-de-inicio.png"></a></span>
            <a href="../Views/app_data_admin.php"><span class="spanMenu">Datos personales&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-perfil-personal.png"></span></a>
			<a href="../Views/app_reserva_admin.php"><span class="spanMenu">Tus reservas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-reserva.png"></span></a>
			<a href="../Controllers/alta_local_admin.php"><span class="spanMenu">Dar de alta local &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/plus.png"></span></a>
			<a href="../Views/app_locales_admin.php"><span class="spanMenu">Lista de locales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-locales.png"></span></a>
            <a href="../Views/app_nosotros_admin.php"><span class="spanMenu">Sobre nosotros &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-nosotros.png"></span></a>
			<a href="../Models/login.php"><span class="spanMenu">Cierre de sesión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="imgMenu" src="../Resources/pictures/icon-cerrar-sesion-rojo.png"></span>	</a>		
		</div>
		
        <div class="divprincipal">
		<img class="imagenCabecera" src="../Resources/pictures/nosotros_fig2.jpg">
		<br>
		<br>
		<h1>NOSOTROS</h1>
		<br>
		<br>
		<h2>Conoce toda la información sobre Easy Rock</h2>
		<hr>
		<br>
		<div class="textoCentrado">Te damos las gracias por confiar en Easy Rock,
			Dejanos contarte un poco quienes somos y de donde venimos.
			
			<p>Easy Rock nace de la idea de dos alumnos de FP de Grado superior en 
				Desarrollo de aplicaciones Web en el instituto IES Ciudad escolar. En
				principio es un proyecto de fin de FP pero la idea principal es llegar 
				a monetizar la aplicación y poder sacarla al mercado, para que asi todo
				el mundo pueda disfrutar de todas las ventajas que ofrece tanto a músicos
				como a salas de ensayo.
		
		</div>
		<br>
		<hr>
		<br>
		<div class="textoCentrado">
			<h2>Nuestro Equipo</h2>
			<table class="equipo">
				<tr>
					<td><img style="width:400px; height:400px;" class="imagenDosColumnas" src="../Resources/pictures/lex.jpg"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><img style="width:400px; height:400px;" class="imagenDosColumnas" src="../Resources/pictures/manu.jpg"></td>
				</tr>
				<tr>
					<td><h3>Victor López Morales</h3></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><h3>Manuel A. Reino Diez</h3></td>
				</tr>
				<tr>
					<td>Dessarrollador de Aplicaciones Web, amante de los gatos egipcios.</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Dessarrollador de Aplicaciones Web, músico y padre de Marea.</td>
				</tr>
			</table>
		</div>
		<br>
		<br>

		<footer class="footer-distributed">
			<div class="footer-left">
				<h3>Easy<span class="spanLogo">Rock</span>App</h3>
				<p class="footer-links">
					<a href="../Views/app_admin.php" class="link-1">Página de Inicio</a>
					<a href="../Views/app_data_admin.php">Datos Personales</a>
					<a href="../Views/app_reserva_admin.php">Tus Reservas</a>
					<a href="../Views/app_locales_admin.php">Lista de Locales</a>
					<a href="../Views/app_nosotros_admin.php">Sobre Nosotros</a>
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