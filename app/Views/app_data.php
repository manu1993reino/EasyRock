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


			/*PERFIL USUARIO*/
			
			@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
			.snip1336 {
				font-family: 'Roboto', Arial, sans-serif;
				position: relative;
				overflow: hidden;
				margin-left: auto;
				margin-right: auto;
				width: 800px;
				color: #ffffff;
				text-align: left;
				line-height: 1.4em;
				background-color: #141414;
			}
			.snip1336 * {
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				-webkit-transition: all 0.25s ease;
				transition: all 0.25s ease;
			}
			.snip1336 img {
				max-width: 100%;
				vertical-align: top;
				opacity: 0.85;
				margin-bottom: 20px;
			}
			.snip1336 figcaption {
				width: 100%;
				background-color: #141414;
				padding: 25px;
				position: relative;
			}
			.snip1336 figcaption:before {
				position: absolute;
				content: '';
				bottom: 100%;
				left: 0;
				width: 0;
				height: 0;
				border-style: solid;
				border-width: 55px 0 0 400px;
				border-color: transparent transparent transparent #141414;
			}
			.snip1336 figcaption a {
				padding: 5px;
				border: 1px solid #ffffff;
				color: #ffffff;
				font-size: 0.7em;
				text-transform: uppercase;
				margin: 10px 0;
				display: inline-block;
				opacity: 0.65;
				width: 47%;
				text-align: center;
				text-decoration: none;
				font-weight: 600;
				letter-spacing: 1px;
			}
			.snip1336 figcaption a:hover {
				opacity: 1;
			}
			.snip1336 .profile {
				border-radius: 50%;
				position: absolute;
				bottom: 75%;
				left: 25px;
				z-index: 1;
				width: 200px;
				opacity: 1;
				box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
			}
			.snip1336 .cerrarSesion {
				margin-right: 4%;
				border-color: #2980b9;
				color: #2980b9;
			}
			.snip1336 h2 {
				margin: 0 0 5px;
				font-weight: 300;
			}
			.datosPerfil {
				display: block;
				font-size: 0.5em;
				color: #2980b9;
			}
			.snip1336 p {
				margin: 0 0 10px;
				font-size: 0.8em;
				letter-spacing: 1px;
				opacity: 0.8;
			}

			.file-select {
				position: relative;
				display: inline-block;
				}

			.file-select::before {
				background-color: #141414;
				color: white;
				display: flex;
				justify-content: center;
				align-items: center;
				border-color: #2980b9;
				color: #2980b9;
				border-width: 1px;
				border-style: solid;
				content: 'Seleccionar Imagen'; /* testo por defecto */
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
			}

			.file-select input[type="file"] {
				opacity: 0;
				width: 200px;
				height: 32px;
				display: inline-block;
			}

			.file-select2{
				background-color:#141414; 
				border-color: #2980b9;
				color: #2980b9;
				border-width: 1px;
				border-style: solid;
				height: 20px;
			}

			.file-select:hover, .file-select2:hover{
				cursor: pointer;
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
		<?php
		$sql="use easyrock;";
		$conn->exec($sql);

		$resultado = "SELECT * from usuarios WHERE id_usuario = $id";
		$res= $conn->prepare($resultado);
		$res->execute();
		$todo= $res->fetchAll(PDO::FETCH_ASSOC);
		?>
        <div class="divprincipal">
		<img class="imagenCabecera" src="../Resources/pictures/fig1_perfil_b.jpg">
		<br>
		<br>
		<h1>DATOS PERSONALES</h1>
		<br>
		<br>
		<h2>Bienvenid@ <?php echo $nombreUsuario;?></h2> 
		<br>
		<h2>Este es tu perfil de Easy Rocker!</h2>
		<hr>
		<br>
		<?php
	//Pintar datos del usuario
		foreach ($todo as $dato =>$result){
		
		?>
		<figure class="snip1336">
  			<img src="../Resources/pictures/portadaPerfil.jpg" alt="sample87" />
  			<figcaption>
				<img src="<?php if($result['image']){echo $result['image'];}else{echo '../Resources/pictures/avatar.jpg';}?>" alt="profile-sample4" class="profile" />
				<br>
				<br>
				<br>
				<br>
				<h2><?php echo $result['nombre_usuario']. " " .$result['apellido1']. " " .$result['apellido2'];?></h2>
				<h2><span class="datosPerfil"><?php echo $result['instrumento'];?></span></h2>
				<h2><span class="datosPerfil"><?php echo $result['telefono'];?></span></h2>
				<h2><span class="datosPerfil"><?php echo $result['correo'];?></span></h2>
				<p><?php echo $result['descripcion'];?></p>
				<a href="../Controllers/cambiarDatosUsuario.php"><p>Cambiar datos</p></a>
				<?php } ?>
				<br>
				<hr class="hrPerfil">
				<br>
				<p>Cambiar imagen de perfil</p>
				<form action="../Models/app_img.php" method="post" enctype="multipart/form-data">
					<input class="file-select" accept="image/png,image/jpeg" type="file" name="imagen">
					<input class="file-select2" type="submit" value="Aceptar" name="foto"> 
				</form>
				<a href="../Views/app_cierre.php" class="cerrarSesion">Cerrar Sesión</a>
				<a href="../Views/app_reserva.php" class="reservas">Ver Tus Reservas</a>
				
  			</figcaption>
		</figure>
		
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