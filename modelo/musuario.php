<?php
    require_once 'configuracion.php';

    class musuario{
        private $con;

        public function __construct(){
            $con = new Conexion();
            $this->con = $con->get_conexion();
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    

        public function resgistrarUsuario($corrusu, $nomusu, $apeusu, $fecusu, $consusu, $paisusu, $sexusu, $termusu) {
            try {
            // Llamar al procedimiento almacenado para verificar el correo
            $sql_verificar = " SELECT COUNT(*) INTO @usuario_existente
    FROM usuario
    WHERE correo = :correo;";
            $stmt_verificar = $this->con->prepare($sql_verificar);
            $stmt_verificar->bindParam(':correo', $corrusu);
            $stmt_verificar->execute();
    
            // Obtener el resultado de la verificación
            $sql_resultado = "SELECT @usuario_existente AS usuario_existente";
            $stmt_resultado = $this->con->prepare($sql_resultado);
            $stmt_resultado->execute();
            $resultado = $stmt_resultado->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado['usuario_existente'] > 0) {
                // El correo ya está registrado, muestra un error
                echo "El correo ya está registrado. Por favor, elija otro correo.";
            } else {
                // El correo no está registrado, procede con la inserción
                $sql = "    INSERT INTO usuario (correo, nombre_usuario, apellido_usuario, fechanac_usuario, contraseña_usuario, pais_usuario, subscripcion_usuario, sexo,
                        foto_usuario, experiencia, certificacion, ficha_antropometrica, plan_nutricional, prog_actfisica, perfil_idperfil, acepto)
    VALUES (:correo, :nombre, :apellido, :fechanac, :contrasena, :pais, 'free', :sexo, NULL, NULL, NULL, NULL, NULL, NULL, '3', :acepto);";
        
                $stmt = $this->con->prepare($sql);
    
                $stmt->bindParam(':correo', $corrusu);
                $stmt->bindParam(':nombre', $nomusu);
                $stmt->bindParam(':apellido', $apeusu);
                $stmt->bindParam(':fechanac', $fecusu);
                $stmt->bindParam(':contrasena', $consusu);
                $stmt->bindParam(':pais', $paisusu);
                $stmt->bindParam(':sexo', $sexusu);
                $stmt->bindParam(':acepto', $termusu);
    
                $stmt->execute();
                echo "<script>alert('Te has registrado con éxito');</script>";
                echo "<script type='text/javascript'>window.location='index.php';</script>";
            }
    
            } catch (PDOException $e) {    
            echo "Error en la base de datos: " . $e->getMessage();
            }
        }

        public function actualizarUsuario($nomusu, $apeusu, $corrusu, $conusu, $fotusu, $paisusu) {
            try {
                $sql = "UPDATE usuario SET ";
                $actualizaciones = array();
        
                if (!empty($nomusu)) {
                    $actualizaciones[] = "nombre_usuario=:nombre";
                }
        
                if (!empty($apeusu)) {
                    $actualizaciones[] = "apellido_usuario=:apellido";
                }
        
                if (!empty($conusu)) {
                    $actualizaciones[] = "contraseña_usuario=:contrasena";
                }
        
                if (!empty($fotusu)) {
                    $actualizaciones[] = "foto_usuario=:fotoPerfil";
                }
        
                if (!empty($paisusu)) {
                    $actualizaciones[] = "pais_usuario=:pais";
                }
        
                if (!empty($actualizaciones)) {
                    $sql .= implode(", ", $actualizaciones);
                    $sql .= " WHERE correo=:correo";
                } else {
                    // Si no hay actualizaciones, no se ejecuta la consulta
                    echo "No hay campos para actualizar";
                    return;
                }

                $stmt = $this->con->prepare($sql);
        
                // Obtener el correo del usuario con la sesión iniciada desde la variable de sesión
                $correoSesion = $_SESSION["correo"];
        
                // Enlazar parámetros
                if (!empty($nomusu)) {
                    $stmt->bindParam(':nombre', $nomusu);
                }
        
                if (!empty($apeusu)) {
                    $stmt->bindParam(':apellido', $apeusu);
                }
        
                if (!empty($conusu)) {
                    $contrasena = sha1(md5($conusu));
                    $stmt->bindParam(':contrasena', $contrasena);
                }
        
                if (!empty($fotusu)) {
                    $stmt->bindParam(':fotoPerfil', $fotusu);
                }
        
                if (!empty($paisusu)) {
                    $stmt->bindParam(':pais', $paisusu);
                }
        
                $stmt->bindParam(':correo', $correoSesion);
        
                // Ejecutar la consulta
                $resultado = $stmt->execute();
        
                if ($resultado) {
                    echo "<script>alert('Datos Actualizados');</script>";
                    echo "<script type='text/javascript'>window.location='home.php';</script>";
                } else {
                    echo "No se pudieron actualizar los datos";
                }
        
            } catch (PDOException $e) {
                echo "Error en la base de datos: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Error general: " . $e->getMessage();
            
                // Manejar el tamaño del archivo
                if (strpos($e->getMessage(), 'exceeds the maximum allowed size') !== false) {
                    // Mensaje de error específico para tamaño de archivo excedido
                    echo "Error: El tamaño del archivo excede el límite permitido. Por favor, selecciona un archivo más pequeño.";
                }
            }
            
        }   

        public function obtenerFoto(){
            $correo = $_SESSION["correo"];
            $sql = " SELECT foto_usuario FROM usuario WHERE correo=:correo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            $rutaFoto = $stmt->fetchColumn();

             return $rutaFoto;
          }

          public function eliminarCuenta($con) {
            $correo = $_SESSION["correo"];
        
            // Obtener la contraseña almacenada en la base de datos
            $verificacion = "SELECT contraseña_usuario FROM usuario WHERE correo=:correo";
            $stmt2 = $this->con->prepare($verificacion);
            $stmt2->bindParam(":correo", $correo);
            $stmt2->execute();
            $contrasenaAlmacenada = $stmt2->fetchColumn();
        
            // Encriptar la contraseña ingresada para compararla con la almacenada
            $conEncriptada = sha1(md5($con));
        
            // Verificar la contraseña ingresada
            if ($conEncriptada !== $contrasenaAlmacenada) {
                echo "La contraseña ingresada no es la correcta";
            } else {
                
                         $sql = "SELECT ficha_antropometrica INTO @idficha FROM usuario WHERE correo=:correo";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam(":correo", $correo);
                        $resultado = $stmt->execute();

                // Eliminar la cuenta si la contraseña es correcta
                $sql = "DELETE FROM usuario WHERE correo=:correo";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(":correo", $correo);
                $resultado = $stmt->execute();

                $sql = "DELETE FROM ficha_antropometrica WHERE idficha_antropometrica=@idficha";
                $stmt = $this->con->prepare($sql);
                $resultado = $stmt->execute();
        
                // Verificar el resultado de la eliminación
                if ($resultado) {
                    session_destroy();
                    echo "<script>alert('Cuenta eliminada con éxito');</script>";
                    echo "<script type='text/javascript'>window.location='index.php';</script>";
                   
                } else {
                    echo "No fue posible eliminar la cuenta";
                }
            }
        }
    }
?>