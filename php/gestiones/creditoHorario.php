<?php

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$id = $_POST['lugar'];

$consultarPrivilegios = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarPrivilegios);

$privilegios=$row['privilegios'];


if ($privilegios!="1"){

	//echo "<h7 style='color:red;text-align:center;'>NO TIENES AUTORIZACION PARA REALIZAR ESTA OPERACION.CONTACTA CON EL/LA ADMINISTRADOR/A DE LA BASE DE DATOS.</h7>";
	
	echo "<div class='alert alert-warning' role='alert'>
	<h7 class='alert-heading' role='alert'>NO ESTAS AUTORIZADO/A.  CONTACTA CON EL/LA ADMINISTRADOR/A DE LA BASE DE DATOS.</h7>
	</div>

	
	";
	

	
	
}

else{

	switch ($id) {
		case "TODAS":


				

				$result = $conexion->query("SELECT provincia, entidad, nombre, apellidos,NIF, creditoHorario, horasCedidas, totalHoras FROM delegados ORDER BY provincia ASC");

				$result2 = $conexion->query("SELECT sum(creditoHorario) as CreditoHorario, sum(horasCedidas) as HorasCedidas, sum(totalHoras) as TotalHoras FROM `delegados`");
				
				
				echo "
				
				<div class='container'>

				<div class='row'>
					<div class='col' >
						<div class='row'>
							<div class='col' >
								<H3> TOTAL CREDITO HORARIO </H3>
							</div>
							<div class='col-auto ml-auto' >
								
								
									<a href='CH_excel.php' target='_blank'><img class='img-fluid' src='../../img/iconoExcel.png' title='Exportar a Excel' alt='exportarExcel'></a>
									
									
							</div>
						</div>
						<table class='table'>
										<thead class='thead-light'>
											<tr>
												<th></th>
												
												<th>CREDITO HORARIO</th>
												<th>HORAS REALES</th>
												<th>DESCUADRE HORAS</th>
												
											</tr>
										</thead>";
							

							
										while($row2 = $result2->fetch_array())
										{
											
										echo "<tbody>";
											echo "<tr >";
												echo "<td >CREDITO HORARIO CC.OO. en G.C.C.</td>";
												
												//echo "<td >" . $row2['PorcentajeTotalCenso'] . "%</td>";
						

												echo "<td >" . $row2['CreditoHorario']. "</td>";
												
												echo "<td >" . $row2['TotalHoras'] . "</td>";

												if ($row2['HorasCedidas']>0){

													echo "<td style='color:green;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";
												}

												else{

													echo "<td style='color:red;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";		
												}

												
												
												
												
											echo "</tr>";
										echo "</tbody>";
										}

						echo "</table>";

				echo "
				<div class='row '>
					<div class='col'>
						<H3 > DELEGADOS/AS Y CREDITO HORARIO </H3>
						<table class='table table-hover' >
									<thead class='thead-light ' >
											<tr >
												<th>Provincia</th>
												<th>Entidad</th>
												<th>Nombre</th>
												<th>Apellidos</th>
												<!--<th>NIF</th>-->
												<th>Credito Horario</th>
												<th>Horas Cedidas</th>
												<th>Total Horas</th>
												<th>Modificar</th>
												
											</tr>
										</thead>
										";
							

							
										while($row = $result->fetch_array())
										{
											
									

										echo "<tbody >";

											
											
												echo "<tr >";

													


														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['provincia'] . "</td>";
														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['entidad'] . "</td>";
														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['nombre'] . "</td>";
														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['apellidos']. "</td>";
														//echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['NIF']. "</td>";
														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['creditoHorario']. "</td>";
														echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['horasCedidas'] . "</td>";
														//echo "<td ><input type='text' style='width:40px;text-align:center;display: table-cell;vertical-align: middle;' placeholder=' ".$row['totalHoras']."'/></td>";
														//echo"<td ><button type='button' class='btn btn-success' style='text-align:center;display: table-cell;vertical-align: middle;'>Mod.</button></td>";

														echo "<td colspan='2' style='text-align:center;''>
															<input type='text' style='width:60px;' placeholder=' ".$row['totalHoras']."'/>
															
															<button type='button' id='". $row['NIF'] ."' class='btn btn-success modificarHoras'>Mod.</button>
														</td>";
														
														

												echo "</tr>";

											

										echo "</tbody>";
										}

						echo "</table>";
					echo "</div>";  

					echo "</div>";

	    break;
		default:
		
			$result = $conexion->query("SELECT provincia, entidad, nombre, apellidos,NIF, creditoHorario, horasCedidas, totalHoras FROM delegados where provincia='".$id."'  
			ORDER BY provincia ASC");

			$result2 = $conexion->query("SELECT sum(creditoHorario) as CreditoHorario, sum(horasCedidas) as HorasCedidas, sum(totalHoras) as TotalHoras FROM `delegados`");
			
			
			echo "
			
			<div class='container'>

			<div class='row'>
				<div class='col' >

					<H3> TOTAL CREDITO HORARIO </H3>
					<table class='table'>
									<thead class='thead-light'>
										<tr>
											<th></th>
											
											<th>CREDITO HORARIO</th>
											<th>HORAS REALES</th>
											<th>DESCUADRE HORAS</th>
											
										</tr>
									</thead>";
						

						
									while($row2 = $result2->fetch_array())
									{
										
									echo "<tbody>";
										echo "<tr >";
											echo "<td >CREDITO HORARIO CC.OO. en G.C.C.</td>";
											
											//echo "<td >" . $row2['PorcentajeTotalCenso'] . "%</td>";
					

											echo "<td >" . $row2['CreditoHorario']. "</td>";
											
											echo "<td >" . $row2['TotalHoras'] . "</td>";

											if ($row2['HorasCedidas']>0){

												echo "<td style='color:green;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";
											}

											else{

												echo "<td style='color:red;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";		
											}

											
											
											
											
										echo "</tr>";
									echo "</tbody>";
									}

					echo "</table>";

					$result3 = $conexion->query("SELECT sum(creditoHorario) as CreditoHorarioProv, sum(horasCedidas) as HorasCedidasProv, sum(totalHoras) as TotalHorasProv FROM `delegados` where provincia='".$id."'");
					echo "
					
					<H4> CREDITO HORARIO PROVINCIAL</H4>
					<table class='table'>
										<thead class='thead-light'>
											<tr>
												<th></th>	
												<th></th>											
												<th>Credito Horario</th>
												<th>Horas Reales</th>
												<th>Horas Cedidas</th>
												
											</tr>
										</thead>";
							
	
							
										while($row3 = $result3->fetch_array())
										{
											
										echo "<tbody>";
											echo "<tr >";
												
											
												echo "<td >TOTAL</td>";
												echo "<td >".$id." </td>";
	
												echo "<td >" . $row3['CreditoHorarioProv']. "</td>";
												
												echo "<td >" . $row3['TotalHorasProv'] . "</td>";
	
												echo "<td >" . $row3['HorasCedidasProv'] . "</td>";
												
												
											echo "</tr>";
										echo "</tbody>";
										}
	
						echo "</table>";

			echo "
			<div class='row '>
				<div class='col'>
					<H4 > DELEGADOS/AS Y CREDITO HORARIO ".$id." </H4>
					<table class='table table-hover' >
								<thead class='thead-light ' >
										<tr >
											<th>Provincia</th>
											<th>Entidad</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<!--<th>NIF</th>-->
											<th>Credito Horario</th>
											<th>Horas Cedidas</th>
											<th>Total Horas</th>
											<th>Modificar</th>
											
										</tr>
									</thead>
									";
						

						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										
										
											echo "<tr >";

												


													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['provincia'] . "</td>";
													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['entidad'] . "</td>";
													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['nombre'] . "</td>";
													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['apellidos']. "</td>";
													//echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['NIF']. "</td>";
													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['creditoHorario']. "</td>";
													echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['horasCedidas'] . "</td>";
													//echo "<td ><input type='text' style='width:40px;text-align:center;display: table-cell;vertical-align: middle;' placeholder=' ".$row['totalHoras']."'/></td>";
													//echo"<td ><button type='button' class='btn btn-success' style='text-align:center;display: table-cell;vertical-align: middle;'>Mod.</button></td>";

													echo "<td colspan='2' style='text-align:center;''>
														<input type='text' style='width:50px;' placeholder=' ".$row['totalHoras']."'/>
														
														<button type='button' id='". $row['NIF'] ."' class='btn btn-success modificarHoras'>Mod.</button>
													</td>";
													
													

											echo "</tr>";

										

									echo "</tbody>";
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";

				

	}; 
/*************************************************/
	

}



	
/**************************************************/
	mysqli_close($conexion);



?>