<?php
session_start();
require_once('conexion.php');
$user = isset($_POST["user"]) ? $_POST["user"] : NULL;
$pass = isset($_POST["pass"]) ? $_POST["pass"] : NULL;

if (empty($user) || empty($pass)) {
    // Manejar el caso en el que los campos estén vacíos
    echo "<script type='text/javascript'>window.location='../vista/vsignIn.php?errlog=si';</script>";
} else {
    // Llamar al procedimiento almacenado para autenticar
    $resultado = autenticarUsuario($user, $pass);
    $perfil = getPerfilUsu($user);
    if ($resultado && $perfil==3) {
        // Autenticación exitosa, realizar acciones necesarias
        $_SESSION["correo"] = $resultado['correo'];
        $_SESSION["nomusu"] = $resultado['nombre_usuario'];
        $_SESSION["idperf"] = $resultado['perfil_idperfil'];
        $_SESSION["apeusu"] = $resultado['apellido_usuario'];
        $_SESSION["autentificado"] = '#--%*_!@-¡';
        echo "<script type='text/javascript'>window.location='../home.php';</script>";
    } elseif($resultado && $perfil==1){
        // Autenticación exitosa, realizar acciones necesarias
        $_SESSION["correo"] = $resultado['correo'];
        $_SESSION["nomusu"] = $resultado['nombre_usuario'];
        $_SESSION["idperf"] = $resultado['perfil_idperfil'];
        $_SESSION["apeusu"] = $resultado['apellido_usuario'];
        $_SESSION["autentificado"] = '#--%*_!@-¡';
        echo "<script type='text/javascript'>window.location='../home.php?pg=110';</script>";
    }else {
        // No se autorizará el ingreso a home.php, redireccionar a la página de inicio de sesión con un mensaje de error
        session_destroy();
        echo "<script type='text/javascript'>window.location='../vista/vsignIn.php?errorusuario=si';</script>";
    }
}

function autenticarUsuario($user, $pass) {
	
	$pp = sha1(md5($pass));
    // Llamamos al procedimiento almacenado para autenticar
    $sql = "   SELECT u.correo, u.nombre_usuario, u.apellido_usuario, u.perfil_idperfil
    FROM usuario u INNER JOIN perfil p ON
u.perfil_idperfil = p.idperfil
    WHERE u.correo = :user AND u.contraseña_usuario = :pass;";

    // Esta línea crea una instancia de la clase conexión
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);

    // Enviamos los parámetros de nuestra consulta
    $result->bindParam(':user', $user);
    $result->bindParam(':pass', $pp);

    if ($result) {
        // Ejecutamos la consulta (esto realiza la llamada al procedimiento almacenado)
        $result->execute();
    }

    $res = array();
    while ($f = $result->fetch()) {
        $res[] = $f;
    }

    return isset($res[0]) ? $res[0] : null;
}
    
function getPerfilUsu($correo){
        $sql = "SELECT perfil_idperfil FROM usuario WHERE correo=:correo";
        
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result-> bindParam(':correo', $correo);
        $result-> execute();
        $resultado = $result->fetch(PDO::FETCH_ASSOC);
        

        return isset($resultado['perfil_idperfil']) ? $resultado['perfil_idperfil'] : null;
}
?>