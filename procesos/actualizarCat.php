<?php 
	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['descripcionU']
				);

	echo $obj->actualizarCategoria($datos);

 ?>