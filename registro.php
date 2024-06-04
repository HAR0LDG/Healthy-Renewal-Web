<?php
 include("controlador/cusuario.php");
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Suez+One&display=swap" rel="stylesheet">
	  <link rel="icon" type="image/x-icon" href="img/login.png">
    <script src="https://kit.fontawesome.com/aa17e7849d.js" crossorigin="anonymous"></script>
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <title>Registrate</title>
</head>
<header>
	<div class="header-index">
		<a href="index.php" class="one-nav idx-in-show "><img src="img/logo.png"></img></a>						
		<div class="nav-group">							
			<a href="index.php" class="one-nav idx-in"><img src="img/logo.png"></img></a>
			<label for="clic-menu" class="three-nav" href="meni" ><i class="fa-solid fa-bars"></i></label>
			<input type="checkbox" id="clic-menu"></input>
			<div class="items" >								
				<div class='seven-nav item search-home'>
					<input  type='text' placeholder=' ' name='buscar' id='buscar'></input>
					<button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
				</div>
				<a href="vista/vmeanficha.php"  class="five-nav item">¿Qué es una ficha antropométrica?</a>
				<a href="vista/vinfoplanes.php" class="six-nav item">Información planes</a>
				<a href="/hr-home" class="four-nav item" >Healthy Renewal</a>
				<div class='seven-nav item search-home search-hidden'>
					<input  type='text' placeholder=' ' name='buscar' id='buscar'></input>
					<button for='buscar'><FontAwesomeIcon icon={faMagnifyingGlass}/></button>
				</div>
			</div>
		</div>
	</div>
	<div class='items-tablet'>
		<div class="inside-tablet" >								
			<a href="vista/vmeanficha.php"  class=" item-tablet position-one">¿Qué es una ficha antropométrica?</a>
			<a href="vista/vinfoplanes.php" class=" item-tablet position-two">Información planes</a>
			<div class='item search-hidden'>
				<input  type='text' placeholder=' ' name='buscar' id='buscar'></input>
				<button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
		</div>
	</div>
</header>
<body>
	<div id='section-registro'>
    <h1 id="tituloRegistro">Registro</h1>
    <form name='FormularioRegistro' method="POST" class="formReg">
      <div class="contenedorCuenta">
        <div class="campoCuenta">
          <label id="lblNombreCuenta" htmlFor='nombre'>Nombres</label>
          <input type="text" id="nombre" name="nombre" value="<?php echo $nomusu;?>"/>
              <?php if (isset($errors['nombre'])) { // Verifica si hay errores para el campo 'nombre' ?>
                <div class="error"><?php echo $errors['nombre']; ?></div>
              <?php } ?>
        </div>
        <div class="campoCuenta">
          <label id="lblApellidosCuenta" htmlFor='apellidos'>Apellidos</label>
          <input type="text" id="tapellidos" name="apellidos" value="<?php echo $apeusu;?>"/>
              <?php if (isset($errors['apellidos'])) { // Verifica si hay errores para el campo 'nombre' ?>
                <div class="error"><?php echo $errors['apellidos']; ?></div>
              <?php } ?>
        </div>
        <div class="campoCuenta">                    
          <label id="lblFechaNacCuenta" htmlFor='fechanac'>Fecha de nacimiento</label>
              <?php
              // Verifica si se envió un valor de 'fechanac' en $_POST y lo establece como valor del campo
                $fechanac = (isset($_POST['fechanac'])) ? $_POST['fechanac'] : '';
              ?>
          <input type="date" id="fechanac" name="fechanac" value="<?php echo $fechanac; ?>"/>
              <?php if (isset($errors['fechanac'])) { // Verifica si hay errores para el campo 'nombre' ?>
                <div class="error"><?php echo $errors['fechanac']; ?></div>
              <?php } ?>
        </div>
        <div class="campoCuenta">                   
          <label id="lblCorreoCuenta" htmlFor='correo'>Correo</label>
          <input type="text" id="correo" name="correo" value="<?php echo $corrusu;?>"/>
            <?php if (isset($errors['correo'])) { // Verifica si hay errores para el campo 'nombre' ?>
              <div class="error"><?php echo $errors['correo']; ?></div>
            <?php } ?>
        </div>
        <div class="campoCuenta">                   
          <label id="lblContrasenaCuenta" htmlFor='contrasena'>Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" value="<?php echo $consusu;?>"/>
            <?php if (isset($errors['contrasena'])) { // Verifica si hay errores para el campo 'nombre' ?>
              <div class="error"><?php echo $errors['contrasena']; ?></div>
            <?php } ?>
        </div>
        <div class="campoCuenta">                    
          <label id="lblContrasena2Cuenta" htmlFor='contrasena2'>Confirmación contraseña</label>
          <input type="password" id="contrasena2" name="contrasena2" value="<?php echo $confusu;?>"/>
            <?php if (isset($errors['contrasena2'])) { // Verifica si hay errores para el campo 'nombre' ?>
              <div class="error"><?php echo $errors['contrasena2']; ?></div>
            <?php } ?>
        </div>
        <div class="campoCuenta">
          <label id="lblGeneroCuenta" htmlFor='genero'>¿Cuál es tu sexo biológico?</label>
          <select id="genero" name="genero">
            <option value="selecciona una opcion" <?php if ($sexusu === 'selecciona una opcion') echo 'selected'; ?>>Selecciona una opción</option>
            <option value="femenino" <?php if ($sexusu === 'femenino') echo 'selected'; ?>>Femenino</option>
            <option value="masculino" <?php if ($sexusu === 'masculino') echo 'selected'; ?>>Masculino</option>
          </select>
          <?php if (isset($errors['genero'])) { // Verifica si hay errores para el campo 'nombre' ?>
            <div class="error"><?php echo $errors['genero']; ?></div>
          <?php } ?>
        </div>
        <div class="campoCuenta">
          <label id="lblPaisCuenta" htmlFor='pais'>País</label>
          <input type="text" id="pais" name="pais" value="<?php echo $paisusu;?>" />
            <?php if (isset($errors['pais'])) { // Verifica si hay errores para el campo 'nombre' ?>
              <div class="error"><?php echo $errors['pais']; ?></div>
            <?php } ?>
        </div>
      </div>
      <br />
      <div class='ultRegistro'>
        <label id="lblTerminosCuenta" htmlfor='acepto'>
          <input type="checkbox" id="acepto" name="acepto" value="<?php echo $termusu;?>" />
            Aceptar términos y condiciones
        </label>
        <?php if (isset($errors['acepto'])) { // Verifica si hay errores para el campo 'nombre' ?>
          <div class="error"><?php echo $errors['acepto']; ?></div>
        <?php } ?>
        <br />
        <br />
        <input type="hidden" name="operacion" value="registrarse" />
        <input id="btnAceptarCuenta" type="submit" value="Registrarse"/></Link>
      </div>
    </form>
	</div>
</body>
<footer>
	<div class='container-footer'>
	  <div class='company-section-footer'>
		  <a href="home.php" class="footer-logo"><img src="img/logo.png" alt=""></img></Link>			
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
				  <img class="imgredes" src="img/insta.png" title="@Healthy.Renewal" />                   
				  <img class="imgredes" src="img/face.png" title="@Healthy.Renewal"/>                    
				  <img class="imgredes" src="img/twit.png" title="#HealthyRenewal"/>                    
				  <img class="imgredes" src="img/whats.png"title="HRWhatsapp"/>                    
			  </div>
	  </div>
  </div>
</footer>
</html>