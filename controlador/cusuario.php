<?php

//Variables Registro usuario
$corrusu = '';
$nomusu = '';
$apeusu = '';
$fecusu = '';
$consusu = '';
$confusu = '';
$paisusu = '';
$sexusu = '';
$termusu = 0;
//Variables Actualizar datos
$nomusu2 = '';
$apeusu2 = '';
$correoAct = '';
$correoAct2 = '';
$consusu2 = '';
$confusu2 = '';
$paisusu2 = '';
$fotoPerfilAct = ''; // Ruta del archivo en la base de datos
$rutaImagenBD = '';
//Variables Eliminar Usuario
$contra1 = '';
$contra2 = '';
//Variable CRUD
$opera = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('modelo/conexion.php');
    require_once('modelo/musuario.php');   

    $musuario = new musuario();
    //----------------------------------
    //Captura variables Registro
    //----------------------------------
    $corrusu = isset($_POST['correo']) ? $_POST['correo'] : NULL;
    if (!$corrusu) {
        $corrusu = isset($_GET['correo']) ? $_GET['correo'] : NULL;
    }
    $nomusu = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
    $apeusu = isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL;
    $fecusu = isset($_POST['fechanac']) ? $_POST['fechanac'] : NULL;
    $consusu = isset($_POST['contrasena']) ? $_POST['contrasena'] : NULL;
    $confusu = isset($_POST['contrasena2']) ? $_POST['contrasena2'] : NULL;
    $paisusu = isset($_POST['pais']) ? $_POST['pais'] : NULL;
    $sexusu = isset($_POST['genero']) ? $_POST['genero'] : NULL;
    $termusu = isset($_POST['acepto']) ? 1 : 0;
    //------------------------------------
    //Captura variables Actualizar Datos
    //------------------------------------
    $nomusu2 = isset($_POST['nombreAct']) ? $_POST['nombreAct'] : NULL;
    $apeusu2 = isset($_POST['apellidosAct']) ? $_POST['apellidosAct'] :  NULL;
    $correoAct = isset($_POST['correoAct']) ? $_POST['correoAct'] : NULL;
    $correoAct2 = isset($_POST['correo2Act']) ? $_POST['correo2Act'] : NULL;
    $consusu2 = isset($_POST['contrasenaAct']) ? $_POST['contrasenaAct'] : NULL;
    $confusu2 = isset($_POST['contrasena2Act']) ? $_POST['contrasena2Act'] : NULL;
    $paisusu2 = isset($_POST['paisAct']) ? $_POST['paisAct'] : NULL;
    $fotoPerfilAct = isset($_FILES['fotoPerfilAct']) ? $_FILES['fotoPerfilAct'] : null;
    //--------------------------------------
   //Captura variables Eliminar usuario
   //---------------------------------------
   $contra1 = isset($_POST['txtContrasenaElim'])? $_POST['txtContrasenaElim']:NULL;
   $contra2 = isset($_POST['txtcontrasena2elim'])? $_POST['txtcontrasena2elim']:NULL;
    //------------------------------------------------------
   //1.3.2. Capturamos la acción (C-U-D) metodo - POST(Form)
   //-------------------------------------------------------
   $opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;	
    //---------------------------------------------------------
    // Inicializa un array para almacenar los errores
    //---------------------------------------------------------
    $errors = array();   //Array para Registro
    $errors2 = array();  //Array para Actualizar Datos
    $errors3 = array(); //Array para Eliminar Usuario
    //------------------------------------------------------
    // Errores Registro
    //------------------------------------------------------
    if(empty($corrusu)){
        $errors['correo'] = "Por favor ingresa tu email";
    }    
    if (empty($nomusu)) {
        $errors['nombre'] = "Por favor ingresa tu(s) nombre(s)";
    }
    if(empty($apeusu)){
        $errors['apellidos'] = "Por favor ingresa tu(s) apellido(s)";
    }
    if(empty($fecusu)){
        $errors['fechanac'] = "Por favor ingresa tu fecha de nacimiento";       
    }
    if(empty($consusu)){
        $errors['contrasena'] = "Por favor ingresa una contraseña";        
    }
    // Validar contraseñas
    if ($consusu !== $confusu) {
        $errors['contrasena2'] = "Las contraseñas no coinciden.";
    }
    if($sexusu === "selecciona una opcion"){
        $errors['genero'] = "Por favor elige tu sexo biológico";
    }
    if(empty($paisusu)){
        $errors['pais'] = "Por favor ingresa tu país de residencia";
    }
    if(empty($termusu)){
        $errors['acepto'] = "Por favor acepta los términos y condiciones";
    }
    //-------------------------------------------
    //Errores Actualizar
    //-------------------------------------------
    if($consusu2 !== $confusu2){
        $errors2["contrasena2"] = "Por favor verifica la contraseña";
    }
    if($correoAct !== $correoAct2){
        $errors2['correo2'] = "Por favor verifica tu correo";
    }
    

    if ($fotoPerfilAct && $fotoPerfilAct['size'] > 0) {
        // Obtener la información de la imagen
        $imageInfo = getimagesize($fotoPerfilAct['tmp_name']);
    
        // Verificar si el tipo de imagen es válido 
        $allowedImageTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF];
        if (!in_array($imageInfo[2], $allowedImageTypes)) {
            $errors2['fotoPerfilAct'] = "El formato de archivo no es compatible. Por favor, sube una imagen en formato JPEG, PNG o GIF.";
        }
    
        // Resto de la verificación del tamaño y resolución...
        $maxFileSize = 10 * 1024 * 1024; // 10 MB
        if ($fotoPerfilAct['size'] > $maxFileSize) {
            $errors2['fotoPerfilAct'] = "El tamaño del archivo excede el límite permitido.";
        }
    
        $desiredWidth = 3023; // Ancho deseado para una imagen 3023p
        $desiredHeight = 3023; // Altura deseada para una imagen 3023p
    
        $actualWidth = $imageInfo[0];
        $actualHeight = $imageInfo[1];
    
        if ($actualWidth > $desiredWidth || $actualHeight > $desiredHeight) {
            $errors2['fotoPerfilAct'] = "La resolución de la imagen no debe exceder las dimensiones (3023x3023).";
        }
    }
    //-------------------------------------
    //Errores Eliminar Usuario
    //-------------------------------------
    if(empty($contra1)){
        $errors3['contra1']= "Por favor ingresa tu contraseña";
    }
    if($contra1!==$contra2 || empty($contra2)){
        $errors3['contra2']= "Por favor verifica tus contraseñas";
    }
    //--------------------------------------
    //Registrar usuario
    //--------------------------------------
    if ($opera==='registrarse' && empty($errors)) {
        // Realizar el registro si todas las validaciones pasan
        $contra = sha1(md5($consusu));
        $musuario->resgistrarUsuario($corrusu, $nomusu, $apeusu, $fecusu, $contra, $paisusu, $sexusu, $termusu);
        
        }
        else {
            $errors[] = "Error en la base de datos";
        }
     //----------------------------------------------
     //Actualizar usuario
     //----------------------------------------------
     if ($opera === 'actualizarDatos' && empty($errors2)) {
        $uploadDirectory = '../hr/img/Fotoperfil/'; // Ajusta esta ruta según tu configuración
        $correoUsuario = $_SESSION['correo']; 
        $nombrearchivo = '';
    
        // Verifica si se ha cargado una nueva foto
        if ($fotoPerfilAct && $fotoPerfilAct['size'] > 0) {
            $nombrearchivo = $correoUsuario . '_' . basename($fotoPerfilAct['name']);
            $destinationPath = $uploadDirectory . $nombrearchivo;
    
            if (move_uploaded_file($fotoPerfilAct['tmp_name'], $destinationPath)) {
                $rutaImagenBD = '../hr/img/Fotoperfil/'. $nombrearchivo;
            } else {
                $errors2['fotoPerfilAct'] = "Error al subir la imagen.";
            }
        }
    
        // Verifica si al menos uno de los campos de datos está lleno
        if (!empty($nomusu2) || !empty($apeusu2) || !empty($consusu2) || !empty($paisusu2) || !empty($rutaImagenBD)) {
            $musuario->actualizarUsuario($nomusu2, $apeusu2, $correoAct, $consusu2, $rutaImagenBD, $paisusu2);
        } else {
            echo "No hay datos que actualizar.";
        }
    }
    //------------------------------------------
    //Eliminar Usuario
    //------------------------------------------
    if(empty($errors3) && $opera==='eliminarUsuario'){
        $musuario->eliminarCuenta($contra1);        
    }
 }   
?>