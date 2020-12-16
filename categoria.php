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
						<h2>Categoría</h2>
						<div class="card-body">
							<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
								Agregar nuevo <span class="fa fa-plus"></span>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo categoría</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" required="">
						<label>Descripción</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion" required="">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nueva</button>
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
					<h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idcat" name="idcat">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Descripción</label>
						<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
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
				url:"procesos/agregarCat.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla_cat.php');
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
				url:"procesos/actualizarCat.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla_cat.php');
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
		$('#tablaDatatable').load('tabla_cat.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idcat){
		$.ajax({
			type:"POST",
			data:"idcat=" + idcat,
			url:"procesos/obtenCat.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idcat').val(datos['cat_id']);
				$('#nombreU').val(datos['nombre']);
				$('#descripcionU').val(datos['descripcion']);
			}
		});
	}

	function eliminarDatos(idcat){
		alertify.confirm('Esta a punto de elimar una categoría ¿Desea continuar?', function(){ 

			$.ajax({
				type:"POST",
				data:"idcat=" + idcat,
				url:"procesos/eliminarCat.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla_cat.php');
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