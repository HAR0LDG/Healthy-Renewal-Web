<?php
 include("controlador/cficha.php");
?>

<form action="" method="POST" class="cont-ficha">
    <div id='cuadroExteriorActFicha'>
        <h1 id='tituloActFicha'>Ingresa los datos a actualizar en la Ficha Antropométrica</h1>
        <div id='divGeneral'>
            <div class='campoBlanco'>
                <div class='update-one-div izq'>
                    <div class='campito label-two-version'>
                        <label id='label-actualizar' htmlFor='imc2'> Índice de masa corporal</label>
                        <input type='text' id='imc2' name='imc2' value="<?php echo $imc2;?>"/>
                        <?php if (isset($errorActfi['imc2'])) {?>
                            <div class="error"><?php echo $errorActfi['imc2']; ?></div>
                        <?php } ?>
                    </div>
                    <div class='campito label-two-version'>
                        <label id='label-actualizar' htmlFor='frca2'> Frecuencia cardiaca activa</label>
                        <input type='text' id='frca2' name='frca2' value="<?php echo $frca2;?>"/>
                        <?php if (isset($errorActfi['frca2'])) {?>
                            <div class="error"><?php echo $errorActfi['frca2']; ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class='update-one-div der'>
                    <div class='campito label-two-version '>
                        <label id="label-actualizar" htmlFor='frcp2'>Frecuencia cardiaca pasiva</label>
                        <input type="text" id="frcp2" name="frcp2" value="<?php echo $frcp2;?>"/>
                        <?php if (isset($errorActfi['frcp2'])) {?>
                            <div class="error"><?php echo $errorActfi['frcp2']; ?></div>
                        <?php } ?>
                    </div>
                    <div class='campito label-two-version'>
                        <label id="label-actualizar" htmlFor='peso2'>Peso (kilos)</label>
                        <input type="text" id="peso2" name="peso2" value="<?php echo $peso2;?>"/> 
                        <?php if (isset($errorActfi['peso2'])) {?>
                            <div class="error"><?php echo $errorActfi['peso2']; ?></div>
                        <?php } ?>
                    </div>        
                </div>
            </div>
            <div class='campoBlanco'>
                <div class='update-one-div  izq-two'>
                    <div class='campito label-different'>
                        <label id='label-actualizar ' htmlFor='fuebra2'>Fuerza en brazos</label>
                        <input type='text' id='fuebra2 ' name='fuebra2' value="<?php echo $fuebra2;?>"/>
                        <?php if (isset($errorActfi['fuebra2'])) {?>
                            <div class="error"><?php echo $errorActfi['fuebra2']; ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class='update-one-div der-two'>
                    <div class='campito label-two-version'>                            
                        <label id="label-actualizar" htmlFor='fuepier2'>Fuerza en Piernas</label>
                        <input type='text' id="fuepier2" name="fuepier2" value="<?php echo $fuepier2;?>"/>
                        <?php if (isset($errorActfi['fuepier2'])) {?>
                            <div class="error"><?php echo $errorActfi['fuepier2']; ?></div>
                        <?php } ?>
                    </div>
                    <div class='campito label-two-version'>
                        <label id="label-actualizar" htmlFor='fueab2'>Fuerza en abdomen</label>
                        <input type="text" id="fueab2" name="fueab2" value="<?php echo $fueab2;?>"/>
                        <?php if (isset($errorActfi['fueab2'])) {?>
                            <div class="error"><?php echo $errorActfi['fueab2']; ?></div>
                        <?php } ?>
                    </div>                        
                </div> 
            </div>
            <div class='campoBlanco'>
                <div class='update-one-div center-div-update corners-up'>
                    <div class='campito label-two-version'>
                        <label id='label-actualizar ' htmlFor='fuelumb2'>Fuerza lumbar</label>
                        <input type='text' id='fuelumb2' name="fuelumb2" value="<?php echo $fuelumb2;?>"/>
                        <?php if (isset($errorActfi['fuelumb2'])) {?>
                            <div class="error"><?php echo $errorActfi['fuelumb2']; ?></div>
                        <?php } ?>
                    </div>
                    <div class='campito label-two-version'>                            
                        <label id='label-actualizar' htmlFor='burpe2'>Burpe Test</label>
                        <input type='text' id='burpe2' name='burpe2' value="<?php echo $burpe2;?>"/> 
                        <?php if (isset($errorActfi['burpe2'])) {?>
                            <div class="error"><?php echo $errorActfi['burpe2']; ?></div>
                        <?php } ?>                 
                    </div>
                </div>
            </div>                     
            <div class='campoBlanco'>
                <div class='update-one-div center-div-update corners-down'>
                    <div class="campito label-two-version">
                        <label id='label-actualizar' htmlFor='cooper2'>Cooper Test</label>
                        <input type='text' id='cooper2' name='cooper2' value="<?php echo $cooper2;?>"/>
                        <?php if (isset($errorActfi['cooper2'])) {?>
                            <div class="error"><?php echo $errorActfi['cooper2']; ?></div>
                        <?php } ?>  
                    </div>
                    <div class="campito label-two-version">
                        <label id='label-actualizar' htmlFor='actfisica2'>Actividad fisica</label>
                        <div id='divFuncion'> <Funcion_tooltip/> </div>
                        <div id='campoListaAct'>
                            <select id='actfisica2' name="actfisica2">
                                <option value="selecciona una opcion" <?php if ($actfisica2 === 'selecciona una opcion') echo 'selected'; ?>>Selecciona una opción</option>
                                <option value=1.2 <?php if ($actfisica2 === '1.2') echo 'selected'; ?>>Sedentario</option>
                                <option value=1.375 <?php if ($actfisica2 === '1.375') echo 'selected'; ?>>Una vez por semana</option>
                                <option value=1.55 <?php if ($actfisica2 === '1.55') echo 'selected'; ?>> 3 a 4 veces por semana</option>
                                <option value=1.725 <?php if ($actfisica2 === '1.725') echo 'selected'; ?>> 5 veces por semana</option>
                                <option value=1.90 <?php if ($actfisica2 === '1.90') echo 'selected'; ?>> Alto rendimiento</option>
                            </select>
                            <?php if (isset($errorActfi['actfisica2'])) {?>
                                <div class="error"><?php echo $errorActfi['actfisica2']; ?></div>
                            <?php } ?>  
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div> 
    <input type="hidden" name="operacion" value="actualizarficha" />
    <div class="divBoton buttons-update">
        <a id="btnCancelarDatos" href="home.php?pg=101"> Cancelar </a>
        <input type='submit' id='okButton' value="Aceptar"/></a>
    </div>
</form>