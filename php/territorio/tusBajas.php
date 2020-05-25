<?php


//$id = $_POST['usuario'];

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$consultarNE = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarNE);

$numeroEmpleado=$row['numeroEmpleado'];





	

	$result = $conexion->query("SELECT BF.NIF as NIFI, BF.numeroEmpleado as numemp, BF.nombre as nom, BF.apellidos as cognom, BF.numeroOficina as numof, BF.provincia as provi, BF.fechaBaja as baixa FROM bajasafiliacion BF inner join oficinaspordelegado OPD on BF.provincia=OPD.provincia where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY baixa DESC");
	
	echo "
	<div class='container'>


		<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>NIF</th>
									<!--<th>NºEmp.</th>-->
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>NºOficina</th>
									<th>Provincia</th>
									<th>Fecha_Baja</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									echo "<td >" . $row['NIFI'] . "</td>";
									//echo "<td >" . $row['numemp'] . "</td>";
									echo "<td >" . $row['nom'] . "</td>";
									echo "<td >" . $row['cognom'] . "</td>";
									echo "<td >" . $row['numof'] . "</td>";
									echo "<td >" . $row['provi'] . "</td>";
									echo "<td >" . $row['baixa'] . "</td>";

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
//}


?>