<?php

include("../conexion.php");



//$id = $_POST['usuario'];



	


	//$result = $conexion->query("SELECT C.Provincia, COUNT(C.Provincia) as N_empleados ,COUNT(A.provincia) as N_afiliados ,COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Mujeres, COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Hombres, FORMAT(((COUNT(A.provincia)/ COUNT(C.Provincia))*100),2) as PorcentajeCenso FROM censo C LEFT JOIN afiliacion A ON C.NIF=A.NIF GROUP BY C.Provincia");

	$result = $conexion->query("SELECT DE.provincia as Provincia, DE.entidad as Entidad, COUNT(DE.provincia) as N_delegados ,COUNT(IF(DE.sexo='M',DE.sexo,NULL)) as Mujeres,FORMAT(((COUNT(IF(DE.sexo='M',DE.sexo,NULL))/ COUNT(DE.provincia))*100),2) as PorcentajeMujeres ,COUNT(IF(DE.sexo='H',DE.sexo,NULL)) as Hombres,FORMAT(((COUNT(IF(DE.sexo='H' ,DE.sexo,NULL))/ COUNT(DE.provincia))*100),2) as PorcentajeHombres  FROM delegados DE GROUP BY DE.provincia,DE.entidad");

	$result2 = $conexion->query("SELECT count(*) as TotalDelegados,COUNT(IF(DE.Sexo='M',DE.Sexo,NULL)) as Num_Mujeres,FORMAT(((COUNT(IF(DE.Sexo='M' ,DE.Sexo,NULL))/ count(*))*100),2) as PorcentajeTotalMujeres ,COUNT(IF(DE.Sexo='H',DE.Sexo,NULL)) as Num_Hombres,FORMAT(((COUNT(IF(DE.Sexo='H',DE.Sexo,NULL))/ count(*))*100),2) as PorcentajeTotalHombres FROM delegados DE");
	
	
	echo "
	
	<div class='container'>

	<div class='row'>
		<div class='col' >

			<H3> DATOS TOTALES ENTIDAD </H3>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Total Delegados/as CC.OO.</th>
									<!--<th>%/s Representacion Sindical GCC</th>-->
									<th>Mujeres</th>
									<th>% Mujeres</th>
									<th>Hombres</th>
									<th>% Hombres</th>
									
								</tr>
							</thead>";
				

				
							while($row2 = $result2->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";
									echo "<td >" . $row2['TotalDelegados'] . "</td>";
									
									//echo "<td >" . $row2['PorcentajeTotalCenso'] . "%</td>";
			

									echo "<td >" . $row2['Num_Mujeres'] . "</td>";
									echo "<td >" . $row2['PorcentajeTotalMujeres'] . "%</td>";
									echo "<td >" . $row2['Num_Hombres'] . "</td>";
									echo "<td >" . $row2['PorcentajeTotalHombres']. "%</td>";
									
									
									
								echo "</tr>";
							echo "</tbody>";
							}

			echo "</table>";

	echo "
	<div class='row'>
		<div class='col'>
			<H3 > DESGLOSE POR PROVINCIAS </H3>
			<table class='table table-hover'>
						<thead class='thead-light ' >
								<tr >
									<th>Provincia</th>
									<th>Entidad</th>
									<th>Nº Deleg.</th>
									<!--<th>%/s Rep. Sindical</th>-->
									<th>Mujeres</th>
									<th>% Mujeres</th>
									<th>Hombres</th>
									<th>% Hombres</th>
									
								</tr>
							</thead>
							";
				

				
							while($row = $result->fetch_array())
							{
								
						

							echo "<tbody>";


								echo "<tr >";

									echo "<td >" . $row['Provincia'] . "</td>";
									echo "<td >" . $row['Entidad'] . "</td>";
									echo "<td >" . $row['N_delegados'] . "</td>";

									/*
									echo "<td >" . $row['N_afiliados'] . "</td>";

									if($row['PorcentajeCenso'] < 25 ){  

										echo "<td style='background-color:#FFE4C4'>" . $row['PorcentajeCenso'] . "%</td>";

									}
									else {

										if ($row['PorcentajeCenso'] > 60 ){

										echo "<td style='background-color:#e6ffcc'>" . $row['PorcentajeCenso'] . "%</td>";
										}
										else{

										echo "<td >" . $row['PorcentajeCenso'] . "%</td>";
										}
									}
									*/
									//echo "<td >" . $row['PorcentajeCenso'] . "%</td>";
									echo "<td >" . $row['Mujeres']. "</td>";
									echo "<td >" . $row['PorcentajeMujeres']. "%</td>";
									echo "<td >" . $row['Hombres'] . "</td>";
									echo "<td >" . $row['PorcentajeHombres']. "%</td>";
									
									
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