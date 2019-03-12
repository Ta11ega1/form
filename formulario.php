<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de Votación</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
	<div class="container">
		<div class="bg-light m-4 p-2 border shadow">
			<form action="index.html" method="POST">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center">FORMULARIO DE VOTACIÓN</h2>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Nombre y Apellido
					</div>
					<div class="col-6">
						<input type="text" id="txtNombreApellido" required placeholder="Ej: Jose Perez">
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Rut
					</div>
					<div class="col-6">
						<input type="text" id="txtRut" required placeholder="Ej: 11111111-1">
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Alias
					</div>
					<div class="col-6">
						<input type="text" id="alias" placeholder="Ej: Pepito" required>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Email
					</div>
					<div class="col-6">
						<input type="email" id="email" placeholder="Ej: J.perez@ejemplo.com"required>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Región
					</div>
					<div class="col-6">
						<input list="regiones" id="region" placeholder="--Seleccione--">
						<datalist id="regiones">
							<?php
								$cadena = "host=localhost port=5432 dbname=formulario user=postgres password=admin";
								$conexion = pg_connect($cadena) or die("Error de conexion. ".pg_last_error());
								$query = "select nombre_region from region";
								$result = pg_query($query) or die("Error en query. ".pg_last_error());
								while($arrow=pg_fetch_array($result)){
									echo '<option data-ejemplo="'.$arrow['nombre_region'].'" value="'.$arrow['nombre_region'].'">';
								}
							?>
							<script>
								$("#region").on('input', function () {
								   var val=$('#region').val();
								   var ejemplo = $('#regiones').find('option[value="'+val+'"]').data('ejemplo');
								   alert(ejemplo);
								});
							</script>
						</datalist>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Comuna
					</div>
					<div class="col-6">
						<input list="comunas" id="comunas" placeholder="--Seleccione--">
						<datalist id="comunas">
							<?php
								$query = "";
								$result = pg_query($query) or die("Error en query. ".pg_last_error());
								while($arrow=pg_fetch_array($result)){
									echo '<option value="'.$arrow['nombre_region'].'">';
								}
							?>
						</datalist>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Candidato
					</div>
					<div class="col-6">
						<input list="candidatos" id="candidatos" placeholder="--Seleccione--">
						<datalist id="candidatos">
						</datalist>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Como se Enteró de Nosotros
					</div>
					<div class="col-6">
						<input type="radio" id="rdbComoSeEntero" value="Web"> Web
						<input type="radio" id="rdbComoSeEntero" value="TV"> TV
						<input type="radio" id="rdbComoSeEntero" value="Redes Sociales"> Redes Sociales
						<input type="radio" id="rdbComoSeEntero" value="Amigo"> Amigo
					</div>
				</div>
				<div class="row m-5">
					<input type="submit" value="Votar" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</body>
</html>