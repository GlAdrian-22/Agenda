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
						<div class="row">
							<div class="col-sm-4">
								<img src="public/img/personal.jpg" class="img-thumbnail">
							</div>
						<div class="col-sm-8">
							<div class="card">
								
								<div id="accordion">
									
									<div class="card">
									    <div class="card-header">
								    		<a class="card-link" data-toggle="collapse" href="#collapseOne">
									    		Agenda Personal
									    	</a>
									    </div>
									    <div id="collapseOne" class="collapse show" data-parent="#accordion">
									    	<div class="card-body">
									        	<p class="text-dark">Sistema de agenda realizada con elementos de Datatable y PHP</p>
								      		</div>
									    </div>
									  </div>


									<div class="card">
									    <div class="card-header">
									      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									    		Instituto
									    	</a>
									    </div>
									    <div id="collapseTwo" class="collapse" data-parent="#accordion">
									    	<div class="card-body">
									        	<a href="https://www.tecnm.mx" target="black"><p class="text-info">Tecnologico Nacional de México</p></a>
												<a href="https://tlahuac.tecnm.mx" target="blank"><p class="text-info">Campus Tlahuac</p></a>
								      		</div>
									    </div>
									  </div>

									  <div class="card">
									    <div class="card-header">
									      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
									        Alumno
									      </a>
									    </div>
									    <div id="collapseThree" class="collapse" data-parent="#accordion">
										    <div class="card-body">
									    	    <p class="text-primary">Adrián Grande López</p>
												<a href="https://github.com/GlAdrian-22?tab=repositories" target="blank"><p class="text-secondary">GitHub repositories</p></a>
										    </div>
									    </div>
									  </div>

									  <div class="card">
									    <div class="card-header">
									      <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
									        Materia
									      </a>
									    </div>
									    <div id="collapseFour" class="collapse" data-parent="#accordion">
									      <div class="card-body">
									        <p class="text-info">Tópicos de Programación MVC</p>
									      </div>
									    </div>
									  </div>
								</div>
							</div>
						</div>
						</div>
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
</body>
</html>