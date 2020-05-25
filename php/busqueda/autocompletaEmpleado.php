<?php

include("../conexion.php");

$search = $_POST['service'];



		$result = $conexion->query("SELECT id, nombre, apellidos, NIF, numeroEmpleado FROM censo WHERE (apellidos like '" . $search . "%') or (NIF like '" . $search . "%') or (numeroEmpleado like '" . $search . "')");
		
		
				while($row = $result->fetch_array())
					{
						
						echo '<div class="suggest-element" id="'.$row['id'].'"><a id="'.$row['apellidos'].', '.$row['nombre'].'">'.$row['numeroEmpleado'].'-'.$row['apellidos'].', '.$row['nombre'].' ('.$row['NIF'].')</a></div>';
						
					}

	
	
?>