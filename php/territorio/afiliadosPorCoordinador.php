<?php


//$id = $_POST['usuario'];

include("../conexion.php");	


	//$result = $conexion->query("SELECT coordinadorTerritorial, COUNT(*) as Afiliados,COUNT(IF(sexo='M',sexo,NULL)) as Mujeres,COUNT(IF(sexo='H',sexo,NULL)) as Hombres FROM afiliacion group by coordinadorTerritorial");

	$result = $conexion->query("SELECT OPD.coordinadorTerritorial as NumeroDelegado, OPD.delegado as NombreDelegado, count(*) as TotalAfiliados, count(IF(AF.sexo='M',AF.sexo,NULL)) as Mujeres, count(IF(AF.sexo='H',AF.sexo,NULL)) as Hombres FROM afiliacion AF inner join oficinaspordelegado OPD on (AF.numeroOficina=OPD.numeroOficina) and (AF.provincia=OPD.provincia) group by OPD.coordinadorTerritorial ORDER BY TotalAfiliados  DESC");
	
	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Coordinador Territorial</th>
									<th>Nombre Coordinador</th>
									<th>Nº Afiliados</th>
									<th>Mujeres</th>
									<th>Hombres</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									echo "<td >" . $row['NumeroDelegado'] . "</td>";
									echo "<td >" . $row['NombreDelegado'] . "</td>";
									echo "<td >" . $row['TotalAfiliados'] . "</td>";
									echo "<td >" . $row['Mujeres'] . "</td>";
									echo "<td >" . $row['Hombres'] . "</td>";
									
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