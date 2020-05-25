<?php

include("../conexion.php");

$id = $_POST['lugar'];

	

$result = $conexion->query("select count(*) as N_af_NO_Censo, FORMAT(((COUNT(*)/ (SELECT count(*) FROM afiliacion))*100),2) as PorcentajeSobreAfiliacion 
,COUNT(IF(Sexo='M',Sexo,NULL)) as Num_Mujeres, COUNT(IF(Sexo='H',Sexo,NULL)) as Num_Hombres from afiliacion where NIF not in (select A.NIF FROM afiliacion A inner join censo C ON C.NIF=A.NIF)");

echo "
	
	<div class='container'>

		<div class='row'>
			<div class='col' >

				<H3> DATOS TOTALES ENTIDAD </H3>
				<table class='table'>
								<thead class='thead-light'>
									<tr>
										<th>Total Afiliados Fuera de Censo</th>
										<th>%/s Afiliacion</th>
										<th>Mujeres</th>										
										<th>Hombres</th>
										
										
									</tr>
								</thead>";
					

					
								while($row = $result->fetch_array())
								{
									
								echo "<tbody>";
									echo "<tr >";
										echo "<td >" . $row['N_af_NO_Censo'] . "</td>";
										
										echo "<td >" . $row['PorcentajeSobreAfiliacion'] . "%</td>";

															

										echo "<td >" . $row['Num_Mujeres'] . "</td>";
										;
										echo "<td >" . $row['Num_Hombres'] . "</td>";
										
										
										
										
									echo "</tr>";
								echo "</tbody>";
								}

				echo "</table>";

			echo "</div>";  

		echo "</div>";

	
	
/**************************************************/

switch ($id) {
  
    case "TODAS":

		$result2 = $conexion->query("select  provincia, NIF, nombre, apellidos, fechaNacimiento, telefono, correoExternoPropio
		from afiliacion where NIF not in (select A.NIF FROM afiliacion A inner join censo C ON C.NIF=A.NIF) order by provincia, fechaNacimiento ASC ");

		echo "
			
			

				<div class='row'>
					<div class='col' >

						<H3> DETALLE AFILIADOS FUERA DE CENSO </H3>
						<table class='table'>
										<thead class='thead-light'>
											<tr>
												<th>Provincia</th>
												<th>NIF</th>
												<th>Nombre</th>										
												<th>Apellidos</th>
												<th>F.Nacimiento</th>
												<!--<th>Telefono</th>-->
												<th>Mail</th>
												
												
											</tr>
										</thead>";
							

							
										while($row2 = $result2->fetch_array())
										{
											
										echo "<tbody>";
											echo "<tr >";
												echo "<td >" . $row2['provincia'] . "</td>";
												
												echo "<td >" . $row2['NIF'] . "</td>";

																	

												echo "<td >" . $row2['nombre'] . "</td>";
												;
												echo "<td >" . $row2['apellidos'] . "</td>";

												echo "<td >" . $row2['fechaNacimiento'] . "</td>";

												//echo "<td >" . $row2['telefono'] . "</td>";

												echo "<td >" . $row2['correoExternoPropio'] . "</td>";
												
												
												
												
											echo "</tr>";
										echo "</tbody>";
										}

						echo "</table>";

					echo "</div>";  

				echo "</div>";

			echo "</div>";
		break;
	default:

		$result2 = $conexion->query("select  provincia, NIF, nombre, apellidos, fechaNacimiento, telefono, correoExternoPropio
		from afiliacion where NIF not in (select A.NIF FROM afiliacion A inner join censo C ON C.NIF=A.NIF) and provincia='".$id."'  order by provincia, fechaNacimiento ASC ");

		echo "
			
			

				<div class='row'>
					<div class='col' >

						<H3> DETALLE AFILIADOS FUERA DE CENSO </H3>
						<table class='table'>
										<thead class='thead-light'>
											<tr>
												<th>Provincia</th>
												<th>NIF</th>
												<th>Nombre</th>										
												<th>Apellidos</th>
												<th>F.Nacimiento</th>
												<!--<th>Telefono</th>-->
												<th>Mail</th>
												
												
											</tr>
										</thead>";
							

							
										while($row2 = $result2->fetch_array())
										{
											
										echo "<tbody>";
											echo "<tr >";
												echo "<td >" . $row2['provincia'] . "</td>";
												
												echo "<td >" . $row2['NIF'] . "</td>";

																	

												echo "<td >" . $row2['nombre'] . "</td>";
												;
												echo "<td >" . $row2['apellidos'] . "</td>";

												echo "<td >" . $row2['fechaNacimiento'] . "</td>";

												//echo "<td >" . $row2['telefono'] . "</td>";

												echo "<td >" . $row2['correoExternoPropio'] . "</td>";
												
												
												
												
											echo "</tr>";
										echo "</tbody>";
										}

						echo "</table>";

					echo "</div>";  

				echo "</div>";

			echo "</div>";
	break;
};

/***************************************************/
	mysqli_close($conexion);



?>