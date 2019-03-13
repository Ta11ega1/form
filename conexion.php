<?php
	$cadena = "host=localhost port=5432 dbname=formulario user=postgres password=admin";
	$conexion = pg_connect($cadena) or die("Error de conexion. ".pg_last_error());
	$query = "select id_region, nombre_region from region";
	$result = pg_query($query);
	echo '<option value="0">Seleccionar</option>';
	while(($fila = pg_fetch_array($result))!= NULL){
		echo '<option value="'.$fila["id_region"].'">'.$fila["nombre_region"].'</option>';
	}
	pg_free_result($result);
	pg_close();

?>