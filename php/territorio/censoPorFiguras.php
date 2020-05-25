<?php

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$consultarNE = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarNE);

$numeroEmpleado=$row['numeroEmpleado'];

//$id = $_POST['usuario'];


	$result = $conexion->query("select Puesto, count(*) as cantidad, COUNT(IF(Sexo='M',Sexo,NULL)) as Mujeres,FORMAT(((COUNT(IF(Sexo='M',Sexo,NULL)))/(count(*))*100),2) as PorcentajeMujeres, COUNT(IF(Sexo='H',Sexo,NULL)) as Hombres, FORMAT(((COUNT(IF(Sexo='H',Sexo,NULL)))/(count(*))*100),2) as PorcentajeHombres from censo group by Puesto");
	
	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Puesto</th>
									<th>Cantidad</th>
									<th>Mujeres</th>
									<th>%Mujeres</th>
									<th>Hombres</th>
									<th>%Hombres</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";
									echo "<td >" . $row['Puesto'] . "</td>";
									echo "<td >" . $row['cantidad'] . "</td>";
									echo "<td >" . $row['Mujeres'] . "</td>";
									//echo "<td >" . $row['PorcentajeMujeres'] . "%</td>";

									if($row['PorcentajeMujeres'] < 30 ){  

										echo "<td style='background-color:#FFE4C4'>" . $row['PorcentajeMujeres'] . "%</td>";

									}
									else {

										if ($row['PorcentajeMujeres'] > 60 ){

										echo "<td style='background-color:#e6ffcc'>" . $row['PorcentajeMujeres'] . "%</td>";
										}
										else{

										echo "<td >" . $row['PorcentajeMujeres'] . "%</td>";
										}
									}



									echo "<td >" . $row['Hombres'] . "</td>";
									echo "<td >" . $row['PorcentajeHombres'] . "%</td>";
									
								echo "</tr>";
							echo "</tbody>";
							}
				

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/



?>