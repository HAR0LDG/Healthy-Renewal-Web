<?php 
class mpag{
	public function inspag($pagid,$pagnom, $pagarc, $pagmos, $pagord, $pagmen, $pagmod){
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
//SELECT pagid, pagnom, pagarc, pagmos, pagord FROM pagina
		$sql="INSERT INTO pagina (pagid, pagnom, pagarc, pagmos, pagord, pagmen, pagmod) VALUES (:pagid, :pagnom, :pagarc, :pagmos, :pagord, :pagmen, :pagmod)";
		//echo $sql;
		$result=$conexion->prepare($sql);

		$result->bindParam(':pagid', $pagid);
		$result->bindParam(':pagnom', $pagnom);
		$result->bindParam(':pagarc', $pagarc);
		$result->bindParam(':pagmos', $pagmos);
		$result->bindParam(':pagord', $pagord);
		$result->bindParam(':pagmen', $pagmen);
		$result->bindParam(':pagmod', $pagmod);

		if(!$result)
			echo "<script>alert('ERROR AL REGISTRAR')</script>";
		else
			$result->execute();
	}

	public function selpag($filtro,$rvalini,$rvalfin){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = 'SELECT * FROM pagina';
		if ($filtro){
			$filtro = '%'.$filtro.'%';
			$sql .= ' WHERE pagnom LIKE :filtro OR pagarc LIKE :filtro';
		}
		$sql .= ' ORDER BY pagid LIMIT '.$rvalini.', '.$rvalfin.';';
		//echo $sql;
		$result=$conexion->prepare($sql);
		if($filtro){
			$result->bindParam(':filtro',$filtro);
		}
		$result->execute();

		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}

	public function sqlcount($filtro){
		$resultado=null;
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT count(pagid) AS Npe FROM pagina";
		if ($filtro) 
			$sql .= " WHERE pagnom='%$filtro%' OR pagarc LIKE '%$filtro%';";

		return $sql;
	}

	public function selpag1($pagid){
		$resultado=null;
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM pagina WHERE pagid= :pagid";
		$result=$conexion->prepare($sql);

		$result->bindParam(':pagid', $pagid);
		$result->execute();

		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}

	public function updpag($campo, $valor, $pagid){
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE pagina SET $campo= :valor WHERE pagid= :pagid";
		$result=$conexion->prepare($sql);
		$result->bindParam(':valor', $valor);
		$result->bindParam(':pagid', $pagid);

		if(!$result)
			echo "<script>alert('ERROR AL MODIFICAR')</script>";
		else
			$result->execute();
	}

	public function elipag($pagid){
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
		$sql="DELETE FROM pagina WHERE pagid= :pagid";
		$result=$conexion->prepare($sql);
		$result->bindParam(':pagid', $pagid);

		if (!$result)
			echo "<script>alert('ERROR AL ELIMINAR')</script>";
		else
			$result->execute();
	}

	public function buspag($arg_pagnom){
		$resultado=null;
		$modelo=new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM pagina WHERE pagnom like :pagnom";
		$result=$conexion->prepare($sql);
		$pagnom="%".$arg_pagnom."%";
		$result->bindParam(':pagnom', $pagnom);
		$result->execute();

		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
}
?>