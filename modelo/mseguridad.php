<?php
// Activamos la variable de sesión
session_start();
// Capturamos el valor de la var_sesion (autenticado)
$autenti = isset($_SESSION["autentificado"]) ? $_SESSION["autentificado"] : NULL;
// Capturamos el valor del perfil del usuario
$perfil = isset($_SESSION["idperf"]) ? $_SESSION["idperf"] : NULL;

// Validamos si corresponde a los datos de valida.php
if ($autenti != '#--%*_!@-¡') {
    // No autorizado, redirigir a index.php
    echo "<script type='text/javascript'>window.location='index.php';</script>";
} 
?>