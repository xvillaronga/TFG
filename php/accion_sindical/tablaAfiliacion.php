<?php

include("../conexion.php");



//$id = $_POST['usuario'];



	


	//$result = $conexion->query("SELECT C.Provincia, COUNT(C.Provincia) as N_empleados ,COUNT(A.provincia) as N_afiliados ,COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Mujeres, COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Hombres, FORMAT(((COUNT(A.provincia)/ COUNT(C.Provincia))*100),2) as PorcentajeCenso FROM censo C LEFT JOIN afiliacion A ON C.NIF=A.NIF GROUP BY C.Provincia");

	$result = $conexion->query("SELECT C.Provincia, C.Sociedad, COUNT(C.Provincia) as N_empleados ,COUNT(A.provincia) as N_afiliados ,FORMAT(((COUNT(A.provincia)/ COUNT(C.Provincia))*100),2) as PorcentajeCenso ,COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Mujeres,FORMAT(((COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL))/ COUNT(A.provincia))*100),2) as PorcentajeMujeres ,COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Hombres,FORMAT(((COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL))/ COUNT(A.provincia))*100),2) as PorcentajeHombres  FROM censo C LEFT JOIN afiliacion A ON C.NIF=A.NIF GROUP BY C.Provincia,C.Sociedad");

	$result2 = $conexion->query("SELECT COUNT(A.idAfiliacion) as Num_afiliados,FORMAT(((COUNT(A.idAfiliacion)/ (SELECT count(id) FROM censo))*100),2) as PorcentajeTotalCenso  ,COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Num_Mujeres,FORMAT(((COUNT(IF(C.Sexo='M' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL))/ COUNT(A.idAfiliacion))*100),2) as PorcentajeTotalMujeres ,COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL)) as Num_Hombres,FORMAT(((COUNT(IF(C.Sexo='H' and A.idAfiliacion IS NOT NULL,C.Sexo,NULL))/ COUNT(A.idAfiliacion))*100),2) as PorcentajeTotalHombres  FROM censo C INNER JOIN afiliacion A ON C.NIF=A.NIF");
	
	
	echo "
	
	<div class='container'>

		<div class='row'> 
			<div class='col' >


				<H3> DATOS TOTALES ENTIDAD </H3>
				<table class='table'>
								<thead class='thead-light'>
									<tr>
										<th>Total Afiliados</th>
										<th>%/s Censo</th>
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
										echo "<td >" . $row2['Num_afiliados'] . "</td>";
										
										echo "<td >" . $row2['PorcentajeTotalCenso'] . "%</td>";

															

										echo "<td >" . $row2['Num_Mujeres'] . "</td>";
										echo "<td >" . $row2['PorcentajeTotalMujeres'] . "%</td>";
										echo "<td >" . $row2['Num_Hombres'] . "</td>";
										echo "<td >" . $row2['PorcentajeTotalHombres']. "%</td>";
										
										
										
									echo "</tr>";
								echo "</tbody>";
								}

				echo "</table>";
		echo "</div>";  

		echo "</div>";

		echo "
		<div class='row'>
			<div class='col'>
				
				<H3 > DESGLOSE POR PROVINCIAS </H3>
				<table class='table table-hover'>
								<thead class='thead-light ' >
									<tr >
										<th>Provincia</th>
										<th>Sociedad</th>
										<th>Nº Emp.</th>
										<th>Nº Afili.</th>
										<th>%/s Censo</th>
										<!--<th>Muje.</th>-->
										<th>% Muj.</th>
										<!--<th>Homb.</th>-->
										<th>% Hom.</th>
										<th>Neutro</th>
										
									</tr>
								</thead>";
					

					
								while($row = $result->fetch_array())
								{
									
								echo "<tbody>";
									echo "<tr >";
										echo "<td >" . $row['Provincia'] . "</td>";
										echo "<td >" . $row['Sociedad'] . "</td>";
										echo "<td >" . $row['N_empleados'] . "</td>";
										echo "<td >" . $row['N_afiliados'] . "</td>";

										if($row['PorcentajeCenso'] < 25 ){  

											echo "<td style='background-color:#FFE4C4;font-weight: bold;'>" . $row['PorcentajeCenso'] . "%</td>";

										}
										else {

											if ($row['PorcentajeCenso'] > 60 ){

											echo "<td style='background-color:#e6ffcc;font-weight: bold;'>" . $row['PorcentajeCenso'] . "%</td>";
											}
											else{

											echo "<td style='font-weight: bold;'>" . $row['PorcentajeCenso'] . "%</td>";
											}
										}

										//echo "<td >" . $row['PorcentajeCenso'] . "%</td>";
										//echo "<td >" . $row['Mujeres']. "</td>";
										echo "<td >" . $row['PorcentajeMujeres']. "%</td>";
										//echo "<td >" . $row['Hombres'] . "</td>";
										echo "<td >" . $row['PorcentajeHombres']. "%</td>";

										if($row['PorcentajeCenso'] < 25 ){  

											$a=($row['N_empleados']*0.25);
											$b=$row['N_afiliados'];
											$aneutro=$a-$b;


											echo "<td >+" . ceil($aneutro) . "</td>";

										}
										else {

											

											echo "<td > -- </td>";
											
										}
										
										
									echo "</tr>";
								echo "</tbody>";
								}

				echo "</table>";
			echo "</div>";  
		echo "</div>";

	echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);



?>