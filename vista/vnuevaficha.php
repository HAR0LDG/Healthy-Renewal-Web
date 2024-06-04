<?php
 include("controlador/cficha.php");
?>

<form method="POST"  class='cont-newf'>     
    <h1>Nueva Ficha Antropométrica</h1>  
    <div class="cont-sup-newf">  
        <div class="cont-izq-newf">
            <div class="cont-intern-newf">
                <div class="label-newf">
                    <label id="lblIndice" htmlFor='imc'>Índice de masa corporal</label>
                    <input type="text" id="imc" name="imc" value="<?php echo $imc;?>"/>
                        <?php if (isset($errorficha['imc'])) {?>
                            <div class="error"><?php echo $errorficha['imc']; ?></div>
                        <?php } ?>
                </div>
                <div class="label-newf">
                    <label id="lblEnvergadura" htmlFor='envergadura'>Envergadura (centímetros)</label>
                    <input type="text" id="envergadura" name="envergadura" value="<?php echo $envergadura;?>"/>
                    <?php if (isset($errorficha['envergadura'])) {?>
                        <div class="error"><?php echo $errorficha['envergadura']; ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="cont-intern-newf">
                <div class="label-newf">
                    <label id="lblFrecuenciaAct" htmlFor='frca'>Frecuencia cardiaca activa</label>
                    <input type="text" id="frca" name="frca" value="<?php echo $frca;?>"/>
                    <?php if (isset($errorficha['frca'])) {?>
                        <div class="error"><?php echo $errorficha['frca']; ?></div>
                    <?php } ?>
                </div>
                <div class="label-newf">
                    <label id="lblFuerzaBra" htmlFor='fuebra'>Fuerza en brazos</label>
                    <input type="text" id="fuebra" name="fuebra" value="<?php echo $fuebra;?>"/>
                    <?php if (isset($errorficha['fuebra'])) {?>
                        <div class="error"><?php echo $errorficha['fuebra']; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div> 
        <div class="cont-der-newf">
            <div class="cont-intern-newf">
                <div class="label-newf">
                    <label id="lblFrecuenciaPas" htmlFor='frcp'>Frecuencia cardiaca pasiva</label>
                    <input type="text" id="frcp" name="frcp" value="<?php echo $frcp;?>"/>
                    <?php if (isset($errorficha['frcp'])) {?>
                        <div class="error"><?php echo $errorficha['frcp']; ?></div>
                    <?php } ?>
                </div>
                <div class="label-newf">
                    <label id="lblPeso" htmlFor='peso'>Peso (kilos)</label>
                    <input type="text" id="peso" name="peso" value="<?php echo $peso;?>"/> 
                    <?php if (isset($errorficha['peso'])) {?>
                        <div class="error"><?php echo $errorficha['peso']; ?></div>
                    <?php } ?>
                 </div>
            </div>
            <div class="cont-intern-newf">
                <div class="label-newf">
                    <label id="lblFuerzaPiernas" htmlFor='fuepier'>Fuerza en piernas (centímetros)</label>
                    <input type='text' id="fuepier" name="fuepier" value="<?php echo $fuepier;?>"/>
                    <?php if (isset($errorficha['fuepier'])) {?>
                        <div class="error"><?php echo $errorficha['fuepier']; ?></div>
                    <?php } ?>
                 </div>
                <div class="label-newf">
                    <label id="lblFuerzaAb" htmlFor='fueab'>Fuerza en abdomen</label>
                    <input type="text" id="fueab" name="fueab" value="<?php echo $fueab;?>"/>
                    <?php if (isset($errorficha['fueab'])) {?>
                        <div class="error"><?php echo $errorficha['fueab']; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cont-inf-newf">
        <div class="cont-intern-newf">
            <div class="label-inf-newf">
                <label id='lblAltura' htmlFor='altura'>Estatura (centímetros)</label>
                <input type='text' id='altura' name='altura' value="<?php echo $altura;?>"/>
                <?php if (isset($errorficha['altura'])) {?>
                    <div class="error"><?php echo $errorficha['altura']; ?></div>
                <?php } ?>
            </div>
            <div class="label-inf-newf">
                <label id='lblFuerzaLumb' htmlFor='fuelumb'>Fuerza lumbar</label>
                <input type='text' id='fuelumb' name="fuelumb" value="<?php echo $fuelumb;?>"/>
                <?php if (isset($errorficha['fuelumb'])) {?>
                    <div class="error"><?php echo $errorficha['fuelumb']; ?></div>
                <?php } ?>
            </div>
            <div class="label-inf-newf">
                <label id='lblBurpeTest' htmlFor='burpe'>Burpe test</label>
                <input type='text' id='burpe' name='burpe' value="<?php echo $burpe;?>"/> 
                <?php if (isset($errorficha['burpe'])) {?>
                    <div class="error"><?php echo $errorficha['burpe']; ?></div>
                <?php } ?>                 
            </div>
        </div>
        <div class="cont-intern-newf">
            <div class="label-inf-newf">
                <label id='lblCooperTest' htmlFor='cooper'>Cooper test</label>
                <input type='text' id='cooper' name='cooper' value="<?php echo $cooper;?>"/>
                <?php if (isset($errorficha['cooper'])) {?>
                    <div class="error"><?php echo $errorficha['cooper']; ?></div>
                <?php } ?>
            </div>
            <div class="label-inf-newf">
                <label id='lblActfisica' htmlFor='actfisica'>Actividad física  <i class="fa-solid fa-question" id="activar">
                <p class="fisAct-text">Se refiere a la cantidad de ejercicio que haces en tu día a día, si no haces ejercicio por favor selecciona sedentario</p>
                </i></label>
                <select  name="actfisica">
                    <option value="selecciona una opcion" <?php if ($actfisica === 'selecciona una opcion') echo 'selected'; ?>>Selecciona una opción</option>
                    <option value=1.2 <?php if ($actfisica === '1.2') echo 'selected'; ?>>Sedentario</option>
                    <option value=1.375 <?php if ($actfisica === '1.375') echo 'selected'; ?>>Una vez por semana</option>
                    <option value=1.55 <?php if ($actfisica === '1.55') echo 'selected'; ?>> 3 a 4 veces por semana</option>
                    <option value=1.725 <?php if ($actfisica === '1.725') echo 'selected'; ?>> 5 veces por semana</option>
                    <option value=1.90 <?php if ($actfisica === '1.90') echo 'selected'; ?>> Alto rendimiento</option>
                </select>
                <?php if (isset($errorficha['actfisica'])) {?>
                    <div class="error"><?php echo $errorficha['actfisica']; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <input type="hidden" name="operacion" value="nuevaficha" />  
    <?php
        if (isset($_SESSION['error_ficha'])) {
            echo '<div class="error">' . $_SESSION['error_ficha'] . '</div>';
            // Limpiar la variable de sesión de error después de mostrar el mensaje
            unset($_SESSION['error_ficha']);
        }
    ?>    
    <div class="buttons-newf">                          
        <a id="btnCancelarDatos" href="home.php"> Cancelar </a>
        <input type='submit' id="btn-confirm" value="Aceptar"/>
    </div>
</form >          