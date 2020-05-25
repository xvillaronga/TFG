<?php


//$id = $_POST['usuario'];

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$consultarNE = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarNE);

$numeroEmpleado=$row['numeroEmpleado'];





	//$result = $conexion->query("SELECT coordinadorTerritorial, COUNT(*) as Afiliados,COUNT(IF(sexo='M',sexo,NULL)) as Mujeres,COUNT(IF(sexo='H',sexo,NULL)) as Hombres FROM afiliacion group by coordinadorTerritorial");

	/*
	$result = $conexion->query("select OPD.nombreOficina as nomOfi, TOT.NOf as numOfi, TOT.empleados as empleats, TOT.afiliados as afiliats, TOT.porcentajeAfiliacion as percentatje
from(Select CE.numeroOficina as NOf, count(CE.NIF) as empleados, count(AF.NIF) as afiliados, FORMAT( (count(AF.NIF)/count(CE.NIF))*100,2) as porcentajeAfiliacion
From censo CE left join afiliacion AF on CE.NIF=AF.NIF
GROUP BY CE.numeroOficina
having (FORMAT( (count(AF.NIF)/count(CE.NIF))*100,2))<=25 ORDER BY CE.numeroOficina ASC)TOT inner join oficinaspordelegado OPD on  (TOT.NOf=OPD.numeroOficina) where (OPD.coordinadorTerritorial='".$numeroEmpleado."')
");
*/

$result = $conexion->query("select TOT.Provi as provOfi,TOT.nomOf as nomOfi,TOT.NOf as numOfi, TOT.empleados as empleats, TOT.afiliados as afiliats, TOT.porcentajeAfiliacion as percentatje
from (Select CE.Provincia as Provi, OF.Nombre as nomOf, CE.numeroOficina as NOf, count(CE.NIF) as empleados, count(AF.NIF) as afiliados, FORMAT((count(AF.NIF)/count(CE.NIF))*100,2) as porcentajeAfiliacion
From censo CE left join afiliacion AF on CE.NIF=AF.NIF JOIN oficinas OF on CE.NumeroOficina=OF.NumeroOficina
GROUP BY CE.numeroOficina
having (FORMAT( (count(AF.NIF)/count(CE.NIF))*100,2))<=25 ORDER BY CE.numeroOficina ASC) TOT  left join oficinaspordelegado OPD on  (TOT.Provi=OPD.provincia) 
where (OPD.coordinadorTerritorial='".$numeroEmpleado."') ORDER BY provOfi,numOfi
");
	
	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Provincia</th>
									<th>NºOficina.</th>
									<th>Nombre Of.</th>
									<th>NºEmpleados</th>
									<th>NºAfiliados</th>
									<th>% Afiliacion</th>
									
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									echo "<td >" . $row['provOfi'] . "</td>";
									echo "<td >" . $row['numOfi'] . "</td>";
									echo "<td >" . $row['nomOfi'] . "</td>";
									echo "<td >" . $row['empleats'] . "</td>";
									echo "<td >" . $row['afiliats'] . "</td>";
									echo "<td >" . $row['percentatje'] . "%</td>";
									
								echo "</tr>";
							echo "</tbody>";
							}
				

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);
//}


?>