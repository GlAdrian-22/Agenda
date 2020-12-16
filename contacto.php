<!DOCTYPE html>
<html>
<head>
	<title>Agenda</title>
	<?php require_once "dependencias.php" ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						<?php require_once "menu.php" ?>
					</div>
					<div class="card-body">
						<h2>Contacto</h2>
						<div class="card-body">
							<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
								Agregar nuevo <span class="fa fa-user-plus"></span>
							</span>
						</div>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<hr>
					<div class="card-footer text-muted">
						by Grande López Adrián
						<hr>
						Tecnologico Nacional de México
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Categoría</label>
						<select class="form-control input-sm" name="categoria" id="categoria">
							<option selected value="0"> Elige una opción </option>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="paterno" name="paterno">
						<label>Apellido materno</label>
						<input type="text" class="form-control input-sm" id="materno" name="materno">
						<label>Telefono</label>
						<input type="tel" class="form-control input-sm" id="tel" name="tel">
						<label>Email</label>
						<input type="emai" class="form-control input-sm" id="email" name="email">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<label>Categoría</label>
						<select class="form-control input-sm" name="categoriaU" id="categoriaU">
							<option selected value="0"> Elige una opción </option>
						</select>
						<input type="text" hidden="" id="idcont" name="idcont">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Apellido paterno</label>
						<input type="text" class="form-control input-sm" id="paternoU" name="paternoU">
						<label>Apellido materno</label>
						<input type="text" class="form-control input-sm" id="maternoU" name="maternoU">
						<label>Telefono</label>
						<input type="tel" class="form-control input-sm" id="telU" name="telU">
						<label>Email</label>
						<input type="emai" class="form-control input-sm" id="emailU" name="emailU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<!--Scripts-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarCont.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla_cont.php');
						alertify.success("Agregado con exito");
					}else{
						alertify.error("Fallo al agregar");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizarCont.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla_cont.php');
						alertify.success("Actualizado con exito");
					}else{
						alertify.error("Fallo al actualizar");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla_cont.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idcont){
		$.ajax({
			type:"POST",
			data:"idcont=" + idcont,
			url:"procesos/obtenCont.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idcont').val(datos['cont_id']);
				$('#nombreU').val(datos['nombre']);
				$('#paternoU').val(datos['paterno']);
				$('#telU').val(datos['tel']);
				$('#emailU').val(datos['email']);
			}
		});
	}

	function eliminarCont(idcont){
		alertify.confirm('Eliminar el contacto', '¿Desea continuar?', function(){ 

			$.ajax({
				type:"POST",
				data:"idcont=" + idcont,
				url:"procesos/eliminarCont.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla_cont.php');
						alertify.success("Eliminado con exito!");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});
		}
		, function(){
		});
	}
</script>