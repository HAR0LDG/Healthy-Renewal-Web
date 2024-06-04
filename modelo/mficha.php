<?php
    require_once 'configuracion.php';
   
    class mficha{
        private $con;

        public function __construct(){
            $con = new Conexion();
            $this->con = $con->get_conexion();
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        }
        
        public function calcularEdad(){
            $usuario = $_SESSION["correo"];
            $sql_fecha = "SELECT fechanac_usuario FROM usuario WHERE correo=:correo";
            $fecha= $this->con->prepare ($sql_fecha);
            $fecha-> bindParam('correo', $usuario);
            $fecha-> execute();
            $resultado = $fecha->fetch(PDO::FETCH_ASSOC);
            if ($resultado) {
                // Obtener la fecha de nacimiento del resultado
                $fechaNacimiento = new DateTime($resultado['fechanac_usuario']);
        
                // Obtener la fecha actual
                $fechaActual = new DateTime();
        
                // Calcular la diferencia en años
                $edad = $fechaActual->diff($fechaNacimiento)->y;
                return $edad;
            }
        }

        public function obtener_caloriasideales($peso, $actfisica){
                $calide= 0;
                $edad = $this->calcularEdad();
                $usuario = $_SESSION["correo"];  

                $sql = "SELECT sexo, altura FROM usuario JOIN ficha_antropometrica ON usuario.ficha_antropometrica=ficha_antropometrica.idficha_antropometrica WHERE usuario.correo=:correo";
                $verificar = $this->con->prepare($sql);
                $verificar->bindParam('correo', $usuario);
                $verificar->execute();
                $datos = $verificar->fetch(PDO::FETCH_ASSOC);
                $altura = $datos['altura'];

                // Calcular peso ideal y calorías según género
                  if ($datos['sexo'] === "masculino") {
                   $calide = (int) round((66 + (13.7 * $peso)) + ((5 * $altura) - (6.5 * $edad)) * $actfisica); // Convierte el resultado a entero
                   
                } elseif ($datos['sexo'] === "femenino") {
                    $calide = (int) round(655 + (9.6 * $peso) + ((1.8 * $altura) - (4.7 * $edad)) * $actfisica); // Convierte el resultado a entero
                }
                return $calide;
        }

        public function obtener_actfisicaActual(){
            $usuario = $_SESSION["correo"];  
            $sql = "SELECT actfisica FROM usuario JOIN ficha_antropometrica ON usuario.ficha_antropometrica=ficha_antropometrica.idficha_antropometrica WHERE usuario.correo=:correo";
            $verificar = $this->con->prepare($sql);
            $verificar = $this->con->prepare($sql);
            $verificar->bindParam(':correo', $usuario);
            $verificar->execute();
            $actifisica = $verificar->fetch(PDO::FETCH_ASSOC);
            $actifisicaActual = $actifisica['actfisica'];


            return $actifisicaActual;
        }

        public function obtener_pesoActual(){
            $usuario = $_SESSION["correo"];  
            $sql = "SELECT peso FROM usuario JOIN ficha_antropometrica ON usuario.ficha_antropometrica=ficha_antropometrica.idficha_antropometrica WHERE usuario.correo=:correo";
            $verificar = $this->con->prepare($sql);
            $verificar = $this->con->prepare($sql);
            $verificar->bindParam(':correo', $usuario);
            $verificar->execute();
            $peso = $verificar->fetch(PDO::FETCH_ASSOC);
            $pesoActual = $peso['peso'];

            return $pesoActual;
        }

        public function nuevaficha($imc, $frca, $frcp, $peso, $altura, $envergadura, $fuepier, $fuebra, $fueab, $fuelumb, $burpe, $cooper, $actfisica) {
            try {
                $pesoideal = 0.001;
                $calide = 0;
                $edad = $this->calcularEdad();
                $usuario = $_SESSION["correo"];  
                
            // Verificar si el usuario ya tiene una ficha
            $sql_verificar_ficha = "SELECT ficha_antropometrica FROM usuario WHERE correo = :correo";
            $stmt_verificar_ficha = $this->con->prepare($sql_verificar_ficha);
            $stmt_verificar_ficha->bindParam(':correo', $usuario);
            $stmt_verificar_ficha->execute();
            $result_verificar_ficha = $stmt_verificar_ficha->fetch(PDO::FETCH_ASSOC);

            if (!empty($result_verificar_ficha['ficha_antropometrica'])) {
                // El usuario ya tiene una ficha, establecer una variable de sesión para indicar el error
                $_SESSION['error_ficha'] = "El usuario ya tiene una ficha antropométrica.";
                // Redirigir o mostrar el mensaje según tu lógica
                header("Location: home.php?pg=102");
                exit();
            }
        
                // Obtener el género del usuario
                $sql_genero = "SELECT sexo FROM usuario WHERE correo=:correo";
                $verificar_genero = $this->con->prepare($sql_genero);
                $verificar_genero->bindParam('correo', $usuario);
                $verificar_genero->execute();
                $genero = $verificar_genero->fetch(PDO::FETCH_ASSOC);

                // Calcular peso ideal y calorías según género
                  if ($genero['sexo'] === "masculino") {
                    $pesoideal = ((($altura/100) * ($altura/100)) * 24); // Redondea el resultado a un decimal
                    $calide = (int) round((66 + (13.7 * $peso)) + ((5 * $altura) - (6.5 * $edad)) * $actfisica); // Convierte el resultado a entero
                   
                } elseif ($genero['sexo'] === "femenino") {
                    $pesoideal = ((($altura/100) * ($altura/100)) * 22); // Redondea el resultado a un decimal
                    $calide = (int) round(655 + (9.6 * $peso) + ((1.8 * $altura) - (4.7 * $edad)) * $actfisica); // Convierte el resultado a entero
                   
                }
        
                
                // Llamada a procedimiento almacenado
                $sql = "INSERT INTO ficha_antropometrica(imc, frc_activa, frc_pasiva, peso, altura, envergadura, peso_ideal, fuerza_piernas, fuerza_brazos, fuerza_abdomen, fuerza_lumbar, burpe_test, cooper_test, calorias_ideales, actfisica) VALUES (:imc, :frca, :frcp, :peso, :altura, :envergadura , $pesoideal, :fuepier, :fuebra, :fueab, :fuelumb, :burpe, :cooper, $calide, :actfisica);
                SET @newidficha = LAST_INSERT_ID();";
                
                $stmt = $this->con->prepare($sql);
              
                // Bind de parámetros
                $stmt->bindParam(':imc', $imc);
                $stmt->bindParam(':frca', $frca);
                $stmt->bindParam(':frcp', $frcp);
                $stmt->bindParam(':peso', $peso);
                $stmt->bindParam(':altura', $altura);
                $stmt->bindParam(':envergadura', $envergadura);
                $stmt->bindParam(':fuepier', $fuepier);
                $stmt->bindParam(':fuebra', $fuebra);
                $stmt->bindParam(':fueab', $fueab);
                $stmt->bindParam(':fuelumb', $fuelumb);
                $stmt->bindParam(':burpe', $burpe);
                $stmt->bindParam(':cooper', $cooper);
                $stmt->bindParam(':actfisica', $actfisica);
        
                // Ejecutar la consulta
                $stmt->execute();
        $stmt->closeCursor();
        
        // Obtener el ID de la ficha recién creada
        $sql_get_id = "SELECT @newidficha AS nuevo_id";
        $stmt_get_id = $this->con->prepare($sql_get_id);
        $stmt_get_id->execute();
        $result = $stmt_get_id->fetch(PDO::FETCH_ASSOC);
        $idFicha = $result['nuevo_id'];
        
        $stmt_get_id->closeCursor();
      
        // Actualizar el usuario con la clave externa del ID de la ficha
        $sql_update_usuario = "UPDATE usuario SET ficha_antropometrica = :id_ficha WHERE correo = :correo";
        $stmt_update_usuario = $this->con->prepare($sql_update_usuario);
        $stmt_update_usuario->bindParam(':id_ficha', $idFicha);
        $stmt_update_usuario->bindParam(':correo', $usuario);
        $stmt_update_usuario->execute();

                
            } catch (PDOException $e) {
                // Manejar la excepción según los requisitos de tu aplicación
                throw new Exception("Error en la base de datos: " . $e->getMessage());
            }
        }
        
        public function getFicha(){
            $usuario = $_SESSION["correo"];
            $sql_fecha = "SELECT ficha_antropometrica.*
    FROM usuario
    JOIN ficha_antropometrica ON usuario.ficha_antropometrica = ficha_antropometrica.idficha_antropometrica
    WHERE usuario.correo = :idusu;";
            $datosFicha= $this->con->prepare ($sql_fecha);
            $datosFicha-> bindParam(':idusu', $usuario);
            $datosFicha-> execute();
            $resultado = $datosFicha->fetch(PDO::FETCH_ASSOC);
            $datosFicha ->closeCursor();

            return $resultado;

        }

        public  function actualizarFicha($imc, $frca, $fuebra, $frcp, $peso, $fuepier, $fueab, $fuelumb, $burpe, $cooper, $actfisica ){
            
            $calide = $this->obtener_caloriasideales($peso,$actfisica);            
            
            try{
            $sql= "UPDATE ficha_antropometrica JOIN usuario ON ficha_antropometrica.idficha_antropometrica=usuario.ficha_antropometrica
                    SET ";
            $updates= array();

            if(!empty ($imc)){
                $updates[] = "imc=:imcnew";
            }

            if(!empty($frca)){
                $updates[] = "frc_activa=:frca";
            }

            if(!empty($fuebra)){
                $updates[] = "fuerza_brazos=:fuebra";
            }

            if(!empty($frcp)){
                $updates[] = "frc_pasiva=:frcp";
            }

            
            if(!empty($peso)){
                $updates[] = "peso=:pesonew";
               
            }
         
            if(!empty($fuepier)){
                $updates[] = "fuerza_piernas=:fuepier";
            }

            if(!empty($fueab)){
                $updates[] = "fuerza_abdomen=:fueab";
            }

            if(!empty($fuelumb)){
                $updates[] = "fuerza_lumbar=:fuelumb";
            }

            if(!empty($burpe)){
                $updates[] = "burpe_test=:burpe";
            }
            
            if(!empty($cooper)){
                $updates[] = "cooper_test=:cooper";
            }

            if($actfisica != "selecciona una opcion" ){
                $updates[] = "actfisica=:actfisicanew";
                $updates[] = "calorias_ideales= $calide";
            }
            
            

            if(!empty($updates)){
                $sql .= implode(", ", $updates);
                $sql .= " WHERE usuario.correo=:correo";
            }else{
                echo "No hay campos para actualizar";
                return;
            }

            $stmt = $this->con->prepare($sql);
            
            $usuario = $_SESSION["correo"];

            if(!empty ($imc)){
                $stmt->bindParam(':imcnew', $imc);
            }

            if(!empty($frca)){
                $stmt->bindParam(':frca', $frca);
            }

            if(!empty($fuebra)){
                $stmt->bindParam(':fuebra', $fuebra);
            }

            if(!empty($frcp)){
                $stmt->bindParam(':frcp', $frcp);
            }

            if(!empty($peso)){
                $stmt->bindParam(':pesonew', $peso);
            }

            if(!empty($fuepier)){
                $stmt->bindParam(':fuepier', $fuepier);
            }

            if(!empty($fueab)){
                $stmt->bindParam(':fueab', $fueab);
            }

            if(!empty($fuelumb)){
                $stmt->bindParam(':fuelumb', $fuelumb);
            }

            if(!empty($burpe)){
                $stmt->bindParam(':burpe', $burpe);
            }
            
            if(!empty($cooper)){
                $stmt->bindParam(':cooper', $cooper);
            }

            if($actfisica != "selecciona una opcion"){
                $stmt->bindParam(':actfisicanew', $actfisica);
            }

            $stmt->bindParam(':correo', $usuario);
           

            $resultado = $stmt->execute();

            if($resultado){
                	echo "<script>alert('Datos Actualizados');</script>";
                	echo "<script type='text/javascript'>window.location='home.php?pg=101';</script>";
            }else{
                echo "No se pudieron actualizar los datos";
            }
        }catch (PDOException $e){
            echo "Error en la base de datos: ". $e->getMessage();
        }
    }
}
?>