<?php
    require_once("modelo/mficha.php");
    require_once('modelo/musuario.php');
    
    //Variables ficha antropometrica
    $imc='';
    $envergadura='';
    $frca='';
    $fuebra='';
    $frcp='';
    $peso='';
    $fuepier='';
    $fueab='';
    $altura='';
    $fuelumb='';
    $burpe='';
    $cooper='';
    $actfisica='';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     require_once("modelo/conexion.php");
     require_once("modelo/mficha.php");
     
     $ficha = new mficha();

     //-----------------------------------------------------
     //Capturar variables ficha antropométrica
     //-----------------------------------------------------     
     $imc = isset($_POST['imc'])?$_POST['imc']: NULL;
     $envergadura = isset($_POST['envergadura'])?$_POST['envergadura']:NULL;
     $frca = isset($_POST['frca'])?$_POST['frca']:NULL;
     $fuebra = isset($_POST['fuebra'])?$_POST['fuebra']:NULL;
     $frcp = isset($_POST['frcp'])?$_POST['frcp']:NULL;
     $peso = isset($_POST['peso'])?$_POST['peso']: NULL;
     $fuepier = isset($_POST['fuepier'])?$_POST['fuepier']:NULL;
     $fueab = isset($_POST['fueab'])?$_POST['fueab']:NULL;
     $altura = isset($_POST['altura'])?$_POST['altura']:NULL;
     $fuelumb = isset($_POST['fuelumb'])?$_POST['fuelumb']:NULL;
     $burpe = isset($_POST['burpe'])?$_POST['burpe']:NULL;
     $cooper = isset($_POST['cooper'])?$_POST['cooper']:NULL;
     $actfisica= isset($_POST['actfisica'])?$_POST['actfisica']:NULL;
    //-------------------------------------------------------
    //Captura variables actualizar ficha
    //-------------------------------------------------------
     $imc2 = isset($_POST['imc2'])?$_POST['imc2']: NULL;
     $frca2 = isset($_POST['frca2'])?$_POST['frca2']:NULL;
     $fuebra2 = isset($_POST['fuebra2'])?$_POST['fuebra2']:NULL;
     $frcp2 = isset($_POST['frcp2'])?$_POST['frcp2']:NULL;
     $peso2 = isset($_POST['peso2'])?$_POST['peso2']: NULL;
     $fuepier2 = isset($_POST['fuepier2'])?$_POST['fuepier2']:NULL;
     $fueab2 = isset($_POST['fueab2'])?$_POST['fueab2']:NULL;
     $fuelumb2 = isset($_POST['fuelumb2'])?$_POST['fuelumb2']:NULL;
     $burpe2 = isset($_POST['burpe2'])?$_POST['burpe2']:NULL;
     $cooper2 = isset($_POST['cooper2'])?$_POST['cooper2']:NULL;
     $actfisica2= isset($_POST['actfisica2'])?$_POST['actfisica2']:NULL;
    //------------------------------------------------------
    //1.3.2. Capturamos la acción (C-U-D) metodo - POST(Form)
    //-------------------------------------------------------
    $opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;	
     //---------------------------------------------------------
    // Inicializa un array para almacenar los errores
    //---------------------------------------------------------
    $errorficha = array();   //Array para Registro
    $errorActfi = array();   //Array para Actualizar    
    //------------------------------------------------------
    // Errores registro datos ficha
    //------------------------------------------------------
    if(empty($imc)){
        $errorficha['imc'] = "Por favor ingresa tu IMC";
    }
    elseif (!is_float($imc) && !is_numeric($imc)) {
        $errorficha['imc'] = "Tu IMC debe ser un número decimal.";
    }   
    if (empty($envergadura)) {
        $errorficha['envergadura'] = "Por favor ingresa el valor de tu envergadura";
    }
    elseif (!is_float($envergadura) && !is_numeric($envergadura)) {
        $errorficha['envergadura'] = "El valor de tu envergadura debe ser un número decimal.";
    }   
    if(empty($frca)){
        $errorficha['frca'] = "Por favor ingresa tu FRCA";
    }
    elseif (!is_int($frca) && !is_numeric($frca)) {
        $errorficha['frca'] = "Tu FRCA debe ser un número entero.";
    }   
    if(empty($fuebra)){
        $errorficha['fuebra'] = "Por favor ingresa tu fuerza en brazos";       
    }
    elseif (!is_int($fuebra) && !is_numeric($fuebra)) {
        $errorficha['fuebra'] = "El valor de tu fuerza en brazos debe ser un número entero.";
    }   
    if(empty($frcp)){
        $errorficha['frcp'] = "Por favor ingresa tu FRCP";        
    }
    elseif (!is_int($frcp) && !is_numeric($frcp)) {
        $errorficha['frcp'] = "Tu FRCP debe ser un número entero.";
    }   
    if(empty($peso)){
        $errorficha['peso'] = "Por favor ingresa tu peso";
    }
    elseif (!is_float($peso) && !is_numeric($peso)) {
        $errorficha['peso'] = "Tu peso debe ser un número decimal.";
    }
    if(empty($fuepier)){
        $errorficha['fuepier'] = "Por favor ingresa tu fuerza en piernas";       
    }
    elseif (!is_int($fuepier) && !is_numeric($fuepier)) {
        $errorficha['fuepier'] = "El valor de tu fuerza en piernas debe ser un número entero.";
    }
    if(empty($fueab)){
        $errorficha['fueab'] = "Por favor ingresa tu fuerza en abdomen";       
    }
    elseif (!is_int($fueab) && !is_numeric($fueab)) {
        $errorficha['fueab'] = "El valor de tu fuerza en abdomen debe ser un número entero.";
    }
    if(empty($altura)){
        $errorficha['altura'] = "Por favor ingresa tu estatura";
    }
    elseif (!is_int($altura) && !is_numeric($altura)) {
        $errorficha['altura'] = "Tu estatura debe ser un número entero.";
    }
    if(empty($fuelumb)){
        $errorficha['fuelumb'] = "Por favor ingresa tu fuerza lumbar";       
    }
    elseif (!is_int($fuelumb) && !is_numeric($fuelumb)) {
        $errorficha['fuelumb'] = "El valor de tu fuerza lumbar debe ser un número entero.";
    }
    if(empty($burpe)){
        $errorficha['burpe'] = "Por favor ingresa el valor de tu Burpe test";       
    }
    elseif (!is_int($burpe) && !is_numeric($burpe)) {
        $errorficha['burpe'] = "El valor de tu Burpe test debe ser un número entero.";
    } 
    if(empty($cooper)){
        $errorficha['cooper'] = "Por favor ingresa el valor de tu Cooper test";       
    }
    elseif (!is_int($cooper) && !is_numeric($cooper)) {
        $errorficha['cooper'] = "El valor de tu Cooper test debe ser un número entero.";
    }
    if($actfisica === "selecciona una opcion"){
        $errorficha['actfisica'] = "Por favor selecciona una opción";
    } 
    //---------------------------------------------------
    //Errores Actualizar Ficha
    //---------------------------------------------------
    if (!is_float($imc2) && !is_numeric($imc2)&&!empty($imc2)) {
        $errorActfi['imc2'] = "Tu IMC debe ser un número decimal.";
    } 
    if (!is_int($frca2) && !is_numeric($frca2) &&!empty($frca2)) {
        $errorActfi['frca2'] = "Tu FRCA debe ser un número entero.";
    } 
    if (!is_int($fuebra2) && !is_numeric($fuebra2) && !empty($fuebra2)) {
        $errorActfi['fuebra2'] = "El valor de tu fuerza en brazos debe ser un número entero.";
    }      
    if (!is_int($frcp2) && !is_numeric($frcp2) && !empty($frcp2)) {
        $errorActfi['frcp2'] = "Tu FRCP debe ser un número entero.";
    }   
    if (!is_float($peso2) && !is_numeric($peso2) && !empty($peso2)) {
        $errorActfi['peso2'] = "Tu peso debe ser un número decimal.";
    }
    if (!is_int($fuepier2) && !is_numeric($fuepier2) && !empty($fuepie2)) {
        $errorActfi['fuepier2'] = "El valor de tu fuerza en piernas debe ser un número entero.";
    }
    if (!is_int($fueab2) && !is_numeric($fueab2) && !empty($fueab2)) {
        $errorActfi['fueab2'] = "El valor de tu fuerza en abdomen debe ser un número entero.";
    }
    if (!is_int($fuelumb2) && !is_numeric($fuelumb2) && !empty($fuelumb2)) {
        $errorActfi['fuelumb2'] = "El valor de tu fuerza lumbar debe ser un número entero.";
    }
    if (!is_int($burpe2) && !is_numeric($burpe2) && !empty($burpe2)) {
        $errorActfi['burpe2'] = "El valor de tu Burpe test debe ser un número entero.";
    } 
    if (!is_int($cooper2) && !is_numeric($cooper2) && !empty($cooper2)) {
        $errorActfi['cooper2'] = "El valor de tu Cooper test debe ser un número entero.";
    }
    if($actfisica2==="selecciona una opcion"){
        $errorActfi['actfisica2'] = "Por favor selecciona una opción";
    }    
    //----------------------------------------------------
    //Registro nueva ficha
    //----------------------------------------------------

    if($opera==='nuevaficha' && empty($errorficha)){
        $ficha->nuevaficha($imc, $frca, $frcp, $peso, $altura, $envergadura, $fuepier, $fuebra, $fueab, $fuelumb, $burpe, $cooper, $actfisica);
        echo "<script type='text/javascript'>window.location='home.php?pg=101';</script>";        
    }
    //----------------------------------------------------
    //Actualizar Ficha
    //----------------------------------------------------
    if($opera==='actualizarficha'&&empty($errorActfi)){
        // Verifica si al menos uno de los campos de datos está lleno
        if (!empty($imc2) || !empty($frca2) || !empty($fuebra2) || !empty($frcp2) || !empty($peso2) || !empty($fuepie2) || !empty($fueab2) || !empty($fuelumb2) || !empty($burpe2) || !empty($cooper2)) {
            $ficha->actualizarFicha($imc2, $frca2, $fuebra2, $frcp2, $peso2, $fuepier2, $fueab2, $fuelumb2, $burpe2, $cooper2, $actfisica2 );
        } else {
            echo "No hay datos que actualizar.";
        }
    }
    }
    //Obtener foto usuario
    $musuario = new musuario();
    $rutaFoto = $musuario->obtenerFoto();
    //Obtener datos ficha
    $mficha = new mficha();
    $datos = $mficha->getFicha();

    $dato1 = isset($datos['imc']) ? htmlspecialchars($datos['imc']) : '';
    $dato2 = isset($datos['peso']) ? htmlspecialchars($datos['peso']) : '';
    $dato3 = isset($datos['frc_activa']) ? htmlspecialchars($datos['frc_activa']) : '';
    $dato4 = isset($datos['envergadura']) ? htmlspecialchars($datos['envergadura']) : '';
    $dato5 = isset($datos['frc_pasiva']) ? htmlspecialchars($datos['frc_pasiva']) : '';
    $dato6 = isset($datos['fuerza_brazos']) ? htmlspecialchars($datos['fuerza_brazos']) : '';
    $dato7 = isset($datos['fuerza_piernas']) ? htmlspecialchars($datos['fuerza_piernas']) : '';
    $dato8 = isset($datos['burpe_test']) ? htmlspecialchars($datos['burpe_test']) : '';
    $dato9 = isset($datos['fuerza_abdomen']) ? htmlspecialchars($datos['fuerza_abdomen']) : '';
    $dato10 = isset($datos['cooper_test']) ? htmlspecialchars($datos['cooper_test']) : '';
    $dato11 = isset($datos['altura']) ? htmlspecialchars($datos['altura']) : '';
    $dato12 = isset($datos['calorias_ideales']) ? htmlspecialchars($datos['calorias_ideales']) : '';
    $dato13 = isset($datos['fuerza_lumbar']) ? htmlspecialchars($datos['fuerza_lumbar']) : '';
    $dato14 = isset($datos['peso_ideal']) ? htmlspecialchars($datos['peso_ideal']) : ''; 
?>