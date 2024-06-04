<?php
	//1.2. Incluimos nuestro controlador (cusu.php)
	include ("controlador/cusu.php");
?>
<h1><center>REGISTRO Y LISTADO DE USUARIO(S)</center></h1>
<hr width="100%"><!--Linea inferior-->
<br><!--Salto de Linea-->
<!--Lamamdo nuestra funcion de la vista que tiene el form-->
<?php
	form_registro($correo);
?>
<hr width="100%"><!--Linea inferior-->
<br><!--Salto de Linea-->
<?php
	tabla_mostrar($conp, $nreg, $pg, $bo,$filtro, $arc);
?>
