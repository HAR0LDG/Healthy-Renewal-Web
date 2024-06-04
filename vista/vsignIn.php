<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="icon" type="image/x-icon" href="../img/login.png">
    <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Suez+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/aa17e7849d.js" crossorigin="anonymous"></script>
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <title>Iniciar sesión</title>
</head>
<body>
	<header>
		<div class="header-index">
			<a href="../index.php" class="one-nav idx-in-show"><img src="../img/logo.png"></img></a>
			<div class="nav-group">		
				<a href="../index.php" class="one-nav idx-in"><img src="../img/logo.png"></img></a>
				<label for="clic-menu" class="three-nav" href="meni" ><i class="fa-solid fa-bars"></i></label>
				<input type="checkbox" id="clic-menu"></input>
				<div class="items" >
					<div class='seven-nav item search-home'>
						<input  type='text' placeholder='__' name='buscar' id='buscar'></input>
						<button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
					</div>
					<a href="vmeanficha.php"  class="five-nav item">¿Qué es una ficha antropométrica?</a>
					<a href="vinfoplanes.php" class="six-nav item">Información planes</a>
					<a href="/hr-home" class="four-nav item" >Healthy Renewal</a>
					<div class='seven-nav item search-home search-hidden'>
						<input  type='text' placeholder='__' name='buscar' id='buscar'></input>
						<button for='buscar'><FontAwesomeIcon icon={faMagnifyingGlass}/></button>
					</div>
				</div>
			</div>
		</div>
		<div class='items-tablet'>
			<div class="inside-tablet" >
				<a href="vmeanficha.php"  class=" item-tablet position-one">¿Qué es una ficha antropométrica?</a>
				<a href="vinfoplanes.php" class=" item-tablet position-two">Información planes</a>
				<div class='item search-hidden'>
					<input  type='text' placeholder='__' name='buscar' id='buscar'></input>
					<button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
				</div>
			</div>
		</div>		
	</header>
		<div class='mauricionomecuenta'>
			<form action="../modelo/valida.php" method="POST" class='login-form'>
        		<div class='login-up'>
            		<h1 class='t-form'>Iniciar Sesión</h1>
           			<img src="../img/login.png" alt=""></img>
        		</div>
		  		<label class='labelemail' for="fname" >Correo:</label>
		  		<input class='input-email' type="email" id="user" name="user" placeholder="Ingrese correo electrónico">
		  		<label for="lname" class='labelemail'>Contraseña:</label>
		  		<input class="input-email" type="password" id="contra" name="pass" placeholder="Ingrese contraseña">
		 		<label for="recordar" class="form-check-label">Olvide contraseña</label><br>
		  		<?php 
					//Capturamos la variable php(URL-GET) – errorusuario que viene de nuestro archivo [valida.php]
					$erroru = isset($_GET["errorusuario"]) ? $_GET["errorusuario"]:NULL;
					if($erroru=="si"){ 
					?>
						<label for="recordar" class="">Usuario y/o contraseña incorrectos...</label>
					<?php } ?>
				<?php
					$errlog = isset($_GET["errlog"]) ? $_GET["errlog"]:NULL;
					if($errlog=="si"){
				?>
					<label for="recordar" class=""> Por favor ingrese un usuario y/o una contraseña</label>
				<?php } ?>
				<div class='button-login'>
		  			<input type="submit" value="Ingresar" class='buttonLog'>
		  			<input type="reset" class="buttonLog" value="Limpiar">
       			</div>
			</form>
		</div>
</body>
<footer>
<div class='container-footer'>
    <div class='company-section-footer'>          
        <a href="/hr-home" class="footer-logo"><img src="../img/logo.png" alt=""></img></Link>
        <div class='list-company-footer'>
            <a href='mailto:correo@correo.com'><i><FontAwesomeIcon icon={faEnvelope}/> </i>correo@correo.com</a>
            <p>601-1234567</p>
            <p>Elaborado 2023 ©</p>
        </div>
    </div>
    <div class='information-footer'>
        <h2 id="informacion">Información</h2>
        <ul class='list-information-footer'>
            <li><a href=''>Nosotros</a></li>
            <li><a href=''>Contáctanos</a></li>
            <li><a href=''>Terminos y condiciones</a></li>
            <li><a href=''>Soporte</a></li>
        </ul>
    </div>
    <div class='social-networking-footer'>
        <h1 id="tituloSiguenos">Síguenos</h1>
        <div id="siguenosdiv">
            <img class="imgredes" src="../img/insta.png" title="@Healthy.Renewal" />                   
            <img class="imgredes" src="../img/face.png" title="@Healthy.Renewal"/>                    
            <img class="imgredes" src="../img/twit.png" title="#HealthyRenewal"/>                    
            <img class="imgredes" src="../img/whats.png" title="HRWhatsapp"/>                    
        </div>
    </div>
</div>
</footer>
</html>