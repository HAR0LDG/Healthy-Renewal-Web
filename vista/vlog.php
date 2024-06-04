
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