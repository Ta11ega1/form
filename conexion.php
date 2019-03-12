<?php
	$cadena = "host=localhost port=5432 dbname=formulario user=postgres password=admin";
	$conexion = pg_connect($cadena) or die("Error de conexion. ".pg_last_error());

	/*$result = pg_query($sql) or die("Error query.".pg_last_error());
	while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){

		echo '<td class=\"table-primary text-center\" width=20%>'.$row['id_medio'].'</td>';

	}*/

?>