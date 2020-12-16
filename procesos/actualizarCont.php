<?php 
	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['paternoU'],
		$_POST['maternoU'],
		$_POST['telU'],
		$_POST['emailU']
	);

	echo $obj->actualizarContacto($datos);

 ?>