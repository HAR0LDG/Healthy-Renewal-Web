<?php
    require_once('controlador/cficha.php');
?>

<form action="home.php?pg=104" method="POST"  id="general1" class="cont-ficha">
    <h1 id='tituloGeneral1'>Ficha Antropométrica</h1>
    <div id="sup">
        <div class='div-foto'>
            <img id='fotoPerfil' src="<?php echo $rutaFoto; ?>" title='fotoPerfil' alt='fotoPerfil'/>
        </div>
        <div class='div-ficha'> 
            <div class='input-ficha'>
                <label id='lblMasa' htmlFor='txtMasa'>Índice masa corporal</label>
                <input type='text' id='txtMasa' name='indiceMasa' value='<?php echo $dato1 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblPeso3' htmlFor='txtPeso3'>Peso (kilos)</label>
                <input type='text' id='txtPeso3' name='pesoficha' value='<?php echo $dato2 ?>' readOnly/>
            </div>
        </div>   
        <div class='div-ficha'>    
            <div class='input-ficha'>
                <label id='lblFCA' htmlFor='txtFCA'>Frecuencia cardiaca activa</label>
                <input type='text' id='txtFCA' name='frecuenciaAactiva' value='<?php echo $dato3 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblEnvergadura3' htmlFor='txtEnvergadura3'>Envergadura (metros)</label>
                <input type='text' id='txtEnvergadura3' name='envergaduraficha' value='<?php echo $dato4 ?>' readOnly/>
            </div>
        </div>
        <div class='div-ficha'>
            <div class='input-ficha'>
                <label id='lblFCP' htmlFor='txtFCP'>Frecuencia cardiaca pasiva</label>
                <input type='text' id='txtFCP' name='frecuenciaPasiva' value='<?php echo $dato5 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblFuerBra' htmlFor='txtFuerBra'>Fuerza en brazos</label>
                <input type='text' id='txtFuerBra' name='fuerzaBrazos' value='<?php echo $dato6 ?>' readOnly/>
            </div>
        </div>
    </div> 
    <div id='inf' class='diseño'>
        <div class='div-ficha'>
            <div class='input-ficha'>
                <label id='lblFuePie' htmlFor='txtFuePie'>Fuerza en piernas (centímetros)</label>
                <input type='text' id='txtFuePie' name='fuerzaPiernas' value='<?php echo $dato7 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblBurpeT' htmlFor='txtBurpeT'>Burpe Test</label>
                <input type='text' id='txtBurpeT' name='burpeTest' value='<?php echo $dato8 ?>' readOnly/>
            </div>
        </div>
        <div class='div-ficha'>
            <div class='input-ficha'>
                <label id='lblFueAb3' htmlFor='txtFueAb3'>Fuerza en abdomen </label>
                <input type='text' id='txtFueAb3' name='fuerzaAbdomen' value='<?php echo $dato9 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblCooperT' htmlFor='txtCooperT'>Cooper Test</label>
                <input type='text' id='txtCooperT' name='cooperTest' value='<?php echo $dato10 ?>' readOnly/>
            </div>
        </div>
        <div class='div-ficha'>
            <div class='input-ficha'>
                <label id='lblAlt' htmlFor='txtAlt'>Estatura(centímetros) </label>
                <input type='text' id='txtAlt' name='alturaficha' value='<?php echo $dato11 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblCalIde' htmlFor='txtCalIde'>Calorías ideales (día)</label>
                <input type='text' id='txtCalIde' name='caloriasIdealesficha' value='<?php echo $dato12 ?>' readOnly/>
            </div>
        </div>
        <div class='div-ficha'>
            <div class='input-ficha'>
                <label id='lblFueLum' htmlFor='txtFueLum'>Fuerza lumbar </label>
                <input type='text' id='txtFueLum' name='fuerzalumbarficha' value='<?php echo $dato13 ?>' readOnly/>
            </div>
            <div class='input-ficha'>
                <label id='lblPeId' htmlFor='txtPeId'>Peso ideal (kilos)</label>
                <input type='text' id='txtPeId' name='pesoIdealficha' value='<?php echo $dato14 ?>' readOnly/>
            </div>
        </div>               
    </div>
    <div class='divBoton actual-button'>
        <input type='submit' id='btnAceptarNewFicha' value="Actualizar Ficha"/>
    </div>
</form>