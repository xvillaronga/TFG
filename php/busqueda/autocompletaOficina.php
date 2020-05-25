<?php

include("../conexion.php");

$search = $_POST['service2'];



	$result = $conexion->query("SELECT id, NumeroOficina, Nombre FROM oficinas WHERE (NumeroOficina like '%" . $search . "%') or (Nombre like '%" . $search . "%') ");
		
		
				while($row = $result->fetch_array())
					{
						
						echo '<div class="suggest-element" id="'.$row['id'].'"><a id="'.$row['NumeroOficina'].', '.$row['Nombre'].'">'.$row['NumeroOficina'].', '.$row['Nombre'].'</a></div>';
						
					}

	
	
?>