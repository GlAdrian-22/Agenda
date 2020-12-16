<?php 
	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre'],
		$_POST['paterno'],
		$_POST['materno'],
		$_POST['tel'],
		$_POST['email']
				);

	echo $obj->agregarContacto($datos);

 ?>