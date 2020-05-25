<?php

include("../conexion.php");



//$id = $_POST['usuario'];


	$result = $conexion->query("SELECT * FROM totalsindicatos");

	
	
	
	echo "
	
	<div class='container'>";

	
	

	echo "
	<div class='row'>
		<div class='col'>
			<H3 > DESGLOSE POR PROVINCIAS </H3>
			<table class='table table-hover'style='font-size: 12px;'>
						<thead class='thead-light ' >
								<tr >
									<th>Provincia</th>
									<th>Entidad</th>
									<th>Total C.E.</th>
									<th>CC.OO.</th>
									<th>U.G.T.</th>
									<th>C.G.T.</th>
									<th>U.S.O.C.</th>
									<th>C.S.I.F.</th>
									<th>S.I.</th>
									
								</tr>
							</thead>
							";
				

				
							while($row = $result->fetch_array())
							{
								
						

							echo "<tbody>";


								echo "<tr >";

									echo "<td >" . $row['provincia'] . "</td>";
									echo "<td >" . $row['entidad'] . "</td>";
									echo "<td style='font-weight:bold'>" . $row['numeroComponentesCE'] . "</td>";
									echo "<td style='color:red'>" . $row['numeroCCOO']. "</td>";
									echo "<td >" . $row['numeroUGT']. "</td>";
									echo "<td >" . $row['numeroCGT'] . "</td>";
									echo "<td >" . $row['numeroUSOC']. "</td>";
									echo "<td >" . $row['numeroCSIF'] . "</td>";
									echo "<td >" . $row['numeroSI']. "</td>";
									
									
								echo "</tr>";
							echo "</tbody>";
							}

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);



?>