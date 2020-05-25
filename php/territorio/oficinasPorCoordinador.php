<?php


include("../conexion.php");	


	//$result = $conexion->query("select OD.CT as CT, CE.Nombre as Nom, CE.Apellidos as Cognom, OD.cantidad as Cantitat from (select coordinadorTerritorial as CT, count(DISTINCT numeroOficina) as cantidad  from oficinaspordelegado group by coordinadorTerritorial) OD left join censo CE on OD.CT=CE.NumeroEmpleado order by Cantitat DESC");

	$result = $conexion->query("select OD.CT as CT, CE.Nombre as Nom, CE.Apellidos as Cognom, OD.cantidad as Cantitat from (select coordinadorTerritorial as CT, count(*) as cantidad  from oficinaspordelegado group by coordinadorTerritorial) OD left join censo CE on OD.CT=CE.NumeroEmpleado order by Cantitat DESC
");
	
	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Coordinador Territorial</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Nº Oficinas</th>
									
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									echo "<td >" . $row['CT'] . "</td>";
									echo "<td >" . $row['Nom'] . "</td>";
									echo "<td >" . $row['Cognom'] . "</td>";
									echo "<td >" . $row['Cantitat'] . "</td>";
									
									
								echo "</tr>";
							echo "</tbody>";
							}
				

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
//	mysqli_close($conexion);
//}


?>