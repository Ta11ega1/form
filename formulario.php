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
			<form method="POST">
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
						<input type="text" id="nombre_apellido" placeholder="Ej: Jose Perez">
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Rut
					</div>
					<div class="col-6">
						<input type="text" id="rut" name="rut" required oninput="checkRut(this)" placeholder="Ingrese RUT">
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
						<select id="region" placeholder="--Seleccione--"></select>
						<script>
							$(document).ready(function(){
								$.ajax({
									type: "POST",
									url: "conexion.php",
									success: function(response)
									{
										$('#region').html(response).fadeIn();
									}
								});
							});
						</script>
					</div>
				</div>
				<div class="row m-1">
					<div class="col-6">
						Comuna
					</div>
					<div class="col-6">
						<select id="comuna" placeholder="--Seleccione--"></select>
						<script>
							$(document).ready(function() {
							    $("#region").change(function() {
							 		var form_data = {
							 			is_ajax: 1,
							 			pais: +$("#region").val()
							 		};
							 		$.ajax({
							 			type: "POST",
							 			url: "getComunas.php",
							 			data: form_data,
							 			success: function(response)
							 			{
							 				$('#comuna').html(response).fadeIn();
							 			}
							 		});
							 	});
							 });
						</script>

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
					<Button type="submit" class="btn btn-primary" id="votar">Votar</Button>
				</div>
			</form>
		</div>
	</div>
	<script src="validarRUT.js"></script>
</body>
</html>