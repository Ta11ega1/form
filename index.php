<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de Votación</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
        function cargar(){
            var url="formulario.php"
            $.ajax({
                type: "POST",
                url:url,
                data:{},
                success: function(datos){
                    $('#demo').html(datos);
                }
            });
        }
     </script>
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<p>Bienvenido porfavor participa de nuestra encuesta en el siguiente link >>> <button class="btn btn-primary" onclick="cargar()">Pinchame!</button></p>

		</div>
		<div id="demo"></div>

	</div>
</body>
</html>