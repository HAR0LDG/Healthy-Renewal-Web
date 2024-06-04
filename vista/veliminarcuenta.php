<?php
   include("controlador/cusuario.php");
?>
<div id="body">
    <div id="eliminar">
   <div id='section-registro'>
    <form name= "formEliminarCuenta" method="POST" class='formDel'>
        <div class="contenedorExterior">
            <div class="contenedorInterno">
                <h1 id="tituloEliminarCuenta">¿Estás seguro que deseas eliminar tu cuenta?</h1>
                <div class="campoElim">
                    <h3><label id="lblcontrasenaElim" htmlFor="txtContrasenaElim">Contraseña</label></h3>
                    <input type="password" id="txtContrasenaElim" name="txtContrasenaElim"/>
                    <?php if (isset($errors3['contra1'])) { ?>
                      <div class="error"><?php echo $errors3['contra1']; ?></div>
                   <?php } ?>
                    <h3><label id="lblcontrasena2Elim" htmlFor="txtcontrasena2elim" >Confirmación contraseña</label></h3>
                    <input type="password" id="txtcontrasena2elim" name="txtcontrasena2elim"/>            
                    <?php if (isset($errors3['contra2'])) { ?>
                      <div class="error"><?php echo $errors3['contra2']; ?></div>
                   <?php } ?>
                </div>
                <input type="hidden" name="operacion" value="eliminarUsuario" />
                <div id="divBotonesElim">                    
                 <input type="submit" id="btnAceptarDatos" value="Aceptar"/>
                 <a id="btnCancelarDatos" href="home.php?pg=105"> Cancelar </a>
                </div>
            </div>
        </div>
    </form>
   </div>
  </div>
</div>