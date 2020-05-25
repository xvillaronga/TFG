<?php

include("../conexion.php");



//$id = $_POST['usuario'];



	


/*	

	$result = $conexion->query("SELECT afiliacion.gestorAfiliacion as gestor, censo.Nombre as nom ,censo.Apellidos as cognom, COUNT(*) as cantidad,   COUNT(IF(MONTH(fechaAfiliacion)='01',1,NULL)) AS Enero,
COUNT(IF(MONTH(fechaAfiliacion)='02',1,NULL)) AS Febrero, 
COUNT(IF(MONTH(fechaAfiliacion)='03',1,NULL)) AS Marzo,
COUNT(IF(MONTH(fechaAfiliacion)='04',1,NULL)) AS Abril, 
COUNT(IF(MONTH(fechaAfiliacion)='05',1,NULL)) AS Mayo,
COUNT(IF(MONTH(fechaAfiliacion)='06',1,NULL)) AS Junio, 
COUNT(IF(MONTH(fechaAfiliacion)='07',1,NULL)) AS Julio, 
COUNT(IF(MONTH(fechaAfiliacion)='08',1,NULL)) AS Agosto,
COUNT(IF(MONTH(fechaAfiliacion)='09',1,NULL)) AS Septiembre,
COUNT(IF(MONTH(fechaAfiliacion)='10',1,NULL)) AS Octubre, 
COUNT(IF(MONTH(fechaAfiliacion)='11',1,NULL)) AS Noviembre, 
COUNT(IF(MONTH(fechaAfiliacion)='12',1,NULL)) AS Diciembre 
FROM afiliacion left join censo on afiliacion.gestorAfiliacion=censo.NumeroEmpleado where YEAR(fechaAfiliacion)=YEAR(CURDATE()) group by gestorAfiliacion ORDER BY cantidad DESC");

*/


	
	$result = $conexion->query("select TOT.gestorAfiliacion as gestor, CE.nombre as nom, CE.apellidos as cognom, count(*)/2 as cantidad, 
COUNT(IF(FE='01',1,NULL))/2 AS Enero,
COUNT(IF(FE='02',1,NULL))/2 AS Febrero,
COUNT(IF(FE='03',1,NULL))/2 AS Marzo,
COUNT(IF(FE='04',1,NULL))/2 AS Abril, 
COUNT(IF(FE='05',1,NULL))/2 AS Mayo,
COUNT(IF(FE='06',1,NULL))/2 AS Junio, 
COUNT(IF(FE='07',1,NULL))/2 AS Julio, 
COUNT(IF(FE='08',1,NULL))/2 AS Agosto,
COUNT(IF(FE='09',1,NULL))/2 AS Septiembre,
COUNT(IF(FE='10',1,NULL))/2 AS Octubre, 
COUNT(IF(FE='11',1,NULL))/2 AS Noviembre, 
COUNT(IF(FE='12',1,NULL))/2 AS Diciembre 
from 
(SELECT gestorAfiliacion,MONTH(fechaAfiliacion) as FE FROM afiliacion WHERE YEAR(fechaAfiliacion)='2020'
UNION ALL
select gestorParAfiliacion,MONTH(fechaAfiliacion) as FE from afiliacion WHERE YEAR(fechaAfiliacion)='2020') TOT left join censo CE on TOT.gestorAfiliacion=CE.NumeroEmpleado
group by GESTOR order by cantidad DESC
");
	
	
	

	echo "
	
			<!-- <H3> RANKING ANUAL DE AFILIACION </H3> -->
			<table class='table table-bordered'>

							<!--
							<thead class='thead-light '>
								<tr>
									
									<th>#</th>
									<th >Nombre </th>
									<th >Apellidos</th>
									<th>#</th>

									<th>E</th>
									<th>F</th>
									<th>M</th>
									<th>A</th>
									<th>My</th>
									<th>J</th>
									<th>Jl</th>
									<th>Ag</th>
									<th>S</th>
									<th>O</th>
									<th>N</th>
									<th>D</th>
									
									
								</tr>
							</thead>
							
							-->
							
							";

							$result3 = $conexion->query("select numeroEmpleado as NE from delegados where situacion='PERMANENTE SINDICAL'");	
									
							$i=0;
							$carrete=array();
							while($row3 = $result3->fetch_array())
							{
								$carrete[$i]=$row3['NE'];
								$i++;
							}

							$n=0;
								
							while($row2 = $result->fetch_array())
							{
								$n++;
							echo "<tbody style='font-size: 12px'>";
								echo "<tr >";
									//echo "<td >" . $row2['gestor'] . "</td>";
									echo "<td style='width: 50px;'>" . $n . "</td>";

												
									

										
								
										if (in_array($row2['gestor'], $carrete)) {
										
											echo "<td style='width: 175px; color: #003399; font-weight: bold;'>" . $row2['nom'] . "</td>";
											echo "<td style='width: 185px; color: #003399; font-weight: bold;'>" . $row2['cognom'] . "</td>";
											
										}
										else{
											echo "<td style='width: 175px; color: #ff751a; font-weight: bold;'>" . $row2['nom'] . "</td>";
											echo "<td style='width: 185px; color: #ff751a; font-weight: bold;'>" . $row2['cognom'] . "</td>";
										}
									
											
											
									//echo "<td style='background-color: #ccffff; font-weight: bold;'>" . $row2['cantidad'] . "</td>";

									echo "<td style='width: 60px; background-color: #ccffff; font-weight: bold;'>" . number_format($row2['cantidad'] , 2, '.', ''). "</td>";

									
									/*
									echo "<td >" . number_format($row2['Enero'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Febrero'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Marzo'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Abril'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Mayo'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Junio'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Julio'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Agosto'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Septiembre'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Octubre'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Noviembre'] , 2, '.', '') . "</td>";
									echo "<td >" . number_format($row2['Diciembre'] , 2, '.', '') . "</td>";
									*/
									if (number_format($row2['Enero'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Enero'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Febrero'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Febrero'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Marzo'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Marzo'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Abril'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Abril'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Mayo'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Mayo'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Junio'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Junio'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Julio'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Julio'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Agosto'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Agosto'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Septiembre'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Septiembre'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Octubre'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Octubre'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Noviembre'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Noviembre'] , 2, '.', '') . "</td>";
									};
									if (number_format($row2['Diciembre'] , 2, '.', '')==0.00){

										echo "<td style='width: 60px;'>--</td>";

									}else{
										echo "<td style='width: 60px;'>" . number_format($row2['Diciembre'] , 2, '.', '') . "</td>";
									};
									
									
								echo "</tr>";
								
							echo "</tbody>";
							}
				
							

			echo "</table>";
		
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);



?>