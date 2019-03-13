<?php
	$cadena = "host=localhost port=5432 dbname=formulario user=postgres password=admin";
	$conexion = pg_connect($cadena) or die("Error de conexion. ".pg_last_error());
	echo "<p>".$_REQUEST['pais']." esto es lo que tiene</p>";
	$query = "SELECT id_comuna, nombre_region from comuna where id_region=".$_REQUEST['pais']." ORDER BY nombre_region";

	$result = pg_query($query);
	pg_close();

	while(($fila = pg_fetch_array($result))!= NULL){
		echo '<option value="'.$fila["id_comuna"].'">'.$fila["nombre_region"].'</option>';
	}
	pg_free_result($result);
	pg_close($cadena);
?>