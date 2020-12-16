<?php

class crud{
		
		#Categoria

		public function agregarCategoria($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into categoria (nombre,descripcion)
									values ('$datos[0]',
											'$datos[1]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenCategoria($idcat){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT cat_id,
							nombre,
							descripcion
					from categoria 
					where cat_id='$idcat'";

			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'cat_id' => $ver[0],
				'nombre' => $ver[1],
				'descripcion' => $ver[2],
				);

			return $datos;
		}

		public function actualizarCategoria($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE categoria set nombre='$datos[0]',
										descripcion='$datos[1]'
									where cat_id='$datos[2]'";

			return mysqli_query($conexion,$sql);
		}
		
		public function eliminarCategoria($idcat){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from categoria where cat_id='$idcat'";
			return mysqli_query($conexion,$sql);
		}



		#Contacto
		public function agregarContacto($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into contacto(nombre,paterno,materno,tel,email)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]',
											'$datos[4]')";

			$result = mysqli_query($conexion,$sql);
			return $result;
		}

		public function obtenContacto($idcat){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT cont_id,
							nombre,
							paterno,
							materno,
							tel,
							email
					from contacto 
					where cont_id='$idcont'";

			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'cont_id' => $ver[0],
				'nombre' => $ver[1],
				'paterno' => $ver[2],
				'materno' => $ver[3],
				'tel' => $ver[4],
				'email' => $ver[5]
				);

			return $datos;
		}

		public function actualizarContacto($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE contacto set nombre='$datos[0]',
									paterno='$datos[1]',
									materno='$datos[2]',
									tel='$datos[3]'
									email='$datos[4]'
								where cat_id='$datos[5]'";

			return mysqli_query($conexion,$sql);
		}
		
		public function eliminarContacto($idcat){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from contacto where cont_id='$idcont'";
			return mysqli_query($conexion,$sql);
		}
	}

?>