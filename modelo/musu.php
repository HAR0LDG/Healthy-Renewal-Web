<?php 
		//1.2. Crea Clase(POO) que se llamara tal cual el archivo
class musu{
		//1.3. métodos/Funciones
		public function ins_usu($correo,$nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $perfil_idperfil){
		//Instanciar la clase/(objeto) conexion en variable $modelo 
	 	
			$modelo = new conexion();

	 	//variable $modelo le heredo la funcion de mi clase 
	 	$conexion = $modelo->get_conexion();
		

	 	//Llamado de mi PROCEDURE almacenado y envio parametros
	 	$sql = "INSERT INTO usuario (correo, nombre_usuario, apellido_usuario, fechanac_usuario, contraseña_usuario, pais_usuario, subscripcion_usuario, sexo, foto_usuario, experiencia, certificacion, ficha_antropometrica, plan_nutricional, prog_actfisica, perfil_idperfil, acepto)
VALUES (:emailnew, :nameusernew, :lastnameusernew, :datenacnew, :passnew, :countrynew, 'suscrito', 'femenino', NULL, NULL, NULL, NULL, NULL, NULL, :perfidnew, 1)
ON DUPLICATE KEY UPDATE
correo = :emailnew,
nombre_usuario = :nameusernew,
apellido_usuario = :lastnameusernew,
fechanac_usuario = :datenacnew,
contraseña_usuario = :passnew,
pais_usuario = :countrynew,
perfil_idperfil = :perfidnew";


	 	//Creo variable $result para alistar la consulta con parametros
	 	$result =$conexion->prepare($sql);
		

	 	//Reemplazo los parámetros (PRECEDURE) por los recibidos desde el Controlador(función)
	 	$result->bindParam(':emailnew',$correo);
	 	$result->bindParam(':nameusernew',$nombre_usuario);
	 	$result->bindParam(':lastnameusernew',$apellido_usuario);
	 	$result->bindParam(':datenacnew',$fechanac_usuario);
	 	$result->bindParam(':passnew',$contraseña_usuario);
	 	$result->bindParam(':countrynew',$pais_usuario);
		$result->bindParam(':perfidnew',$perfil_idperfil);
		
	 	//Valido si la variable $result(Esta Vacia)
	 	if(!$result)
	  		echo "<script>alert('ERROR al insertar Usuario');</script>";
	 	else
	  	$result->execute();
	  		echo "<script>alert('Usuario registrado correctamente...');</script>";
		}

	
	//1.3.2. Crear función CONSULTA ()
	public function sel_usu($filtro,$rvini,$rvfin){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "SELECT * FROM usuario";
		if($filtro){
			$filtro = '%' .$filtro. '%';
			$sql .= ' WHERE nombre_usuario LIKE :filtro';
		}
		$sql .= ' LIMIT '.$rvini.', '.$rvfin.';';
		$result = $conexion->prepare($sql);
		if($filtro){
			$result->bindParam(':filtro', $filtro);
		}
		$result->execute();
		
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
//1.3.3. Crear Funciona ACTUALIZAR()
	public function upd_usu($correo, $nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $perfil_idperfil){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "UPDATE usuario SET correo=:emailnew,nombre_usuario=:nameusernew, apellido_usuario=:lastnameusernew, fechanac_usuario=:datenacnew, contraseña_usuario=:passnew,
		pais_usuario=:countrynew, perfil_idperfil=:perfidnew WHERE correo=:emailnew;";
		$result = $conexion->prepare($sql);
 
		$result->bindParam(':emailnew',$correo);
		$result->bindParam(':nameusernew',$nombre_usuario);
		$result->bindParam(':lastnameusernew',$apellido_usuario);
		$result->bindParam(':datenacnew',$fechanac_usuario);
		$result->bindParam(':passnew',$contraseña_usuario);
		$result->bindParam(':countrynew',$pais_usuario);
	   $result->bindParam(':perfidnew',$perfil_idperfil);
	   

		if(!$result)
			echo "<script>alert('Error al actualizar');</script>";
		else
			$result->execute();
			echo "<script>alert('Usuario Actualizado');</script>";
	}
	//1.3.4. Crear Funciona ELIMINAR()
	public function del_usu($correo){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "DELETE FROM usuario WHERE correo=:emailnew;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':emailnew',$correo);

		if(!$result)
			echo "<script>alert('Error al ELIMINAR');</script>";
		else
			$result->execute();
			echo "<script>alert('Usuario Eliminado');</script>";
	}
//1.3.5. Crear Funciones Adicioanles (Ej: Carga de datos en campo del formulario (Tb_perfiles))
	//1.3.5.1. Crear función CARGA_DATOS [COMBOBOX]
	public function list_Perfil(){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT idperfil, nomperf FROM perfil;";
		$result = $conexion->prepare($sql);
		$result->execute();
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
	//1.3.5.2. Crear Funcion Cargar datos de un usuario al formulario para (Actualizar)
	public function sel_usu_act($correo){
		$resultado1 = NULL;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT correo, nombre_usuario, apellido_usuario, fechanac_usuario, contraseña_usuario, pais_usuario, perfil_idperfil FROM usuario WHERE correo=:emailnew;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':emailnew', $correo);
		$result->execute();
		while ($f1=$result->fetch()){
			$resultado1[]=$f1;
		}
		return $resultado1;
	}
	
	//... Crear función para conocer total_registro de la tabla
	public function selcount($filtro){
		$sql = 'SELECT COUNT(correo) AS Npe FROM usuario';
		if($filtro){
			$filtro = '%'.$filtro.'%';
			$sql .= ' WHERE nombre_usuario LIKE "'.$filtro.'";';
		}
		//Echo sql;
		return $sql;
	}

}
?>