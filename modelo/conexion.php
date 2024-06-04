<?php
class Conexion {
    public function get_conexion(){
        include('configuracion.php');
        try {
            $conexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            // Puedes registrar el error de alguna manera o manejarlo según tus necesidades.
            return null;
        }
    }
}
?>