<?php 
	require_once('controlador/cpag.php');
?>
<center>
<h1>PAGINA(S)</h1>
<hr width="100%">
<?php seleccionar($pagid, $pg); ?>
<br>
<?php cargar($conp,$nreg,$pg,$bo,$filtro,$arc); ?>
</center>