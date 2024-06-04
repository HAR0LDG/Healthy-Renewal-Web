<?php
   include("controlador/cusuario.php");
?>

<div id='section-registro'>
  <form name='formActualizarDatos' method='POST' enctype="multipart/form-data" class='formUpd'>
    <h1 id="tituloActualizarDatos">Actualizar Datos</h1>
    <div class="contenedorDatos">
      <div class="campoDatos">
        <label id="lblNombresDatos" htmlFor="nombreAct">Nombres</label>
        <input type="text" id="nombreAct" name="nombreAct" value="<?php echo $nomusu2;?>"/>
      </div>
      <div class="campoDatos">
        <label id="lblApellidosDatos" htmlFor="apellidosAct">Apellidos</label>
        <input type="text" id="apellidosAct" name="apellidosAct" value="<?php echo $apeusu2;?>"/>
      </div>
      <div class="campoDatos">
        <label id="lblCorreoDatos" htmlFor="correoAct">Correo</label>
        <input type="text" id="correoAct" name="correoAct" value="<?php echo $correoAct;?>"/>
      </div>
      <div class="campoDatos">
        <label id="lblCorreo2Datos" htmlFor="correo2Act">Confirmación Correo</label>
        <input type="text" id="correo2Act" name="correo2Act" />
        <?php if (isset($errors2['correo2'])) { ?>
          <div class="error"><?php echo $errors2['correo2']; ?></div>
        <?php } ?>
      </div>
      <div class="campoDatos">
        <label id="lblContrasenaDatos" htmlFor="contrasenaAct">Contraseña</label>
        <input type="password" id="contrasenaAct" name="contrasenaAct"/>
      </div>
      <div class="campoDatos">
        <label id="lblContrasena2Datos" htmlFor="contrasena2Act">Confirmación contraseña</label>
        <input type="password" id="contrasena2Act" name="contrasena2Act" />
        <?php if (isset($errors2['contrasena2'])) {  ?>
          <div class="error"><?php echo $errors2['contrasena2']; ?></div>
        <?php }?>
      </div>
      <div class="campoDatos">
        <label class="label-file-upload" id="lblFotoPerfilDatos" htmlFor="fotoPerfilAct">Foto de Perfil</label>
        <input type="file" id="fotoPerfilAct" name="fotoPerfilAct" accept="image/*" />
        <?php if (isset($errors2['fotoPerfilAct'])) {  ?>
          <div class="error"><?php echo $errors2['fotoPerfilAct']; ?></div>
        <?php }?>
      </div>
      <div class="campoDatos">
        <label id="lblPaisDatos" htmlFor="paisAct">País</label>
        <input type="text" id="paisAct" name="paisAct" value="<?php echo $paisusu2;?>" />
      </div>
    </div>
      <input type="hidden" name="operacion" value="actualizarDatos" />
      <div id="divBotonesDatos">             
        <a id="btnEliminarDatos" href="home.php?pg=109">Eliminar cuenta </a>
        <a id="btnCancelarDatos" href="home.php"> Cancelar </a>
        <input id="btnAceptarDatos" type="submit"  value="Actualizar Datos" />     
      </div>
  </form>
</div>