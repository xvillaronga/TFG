<?php
include("../../php/conexion.php");

header("Content-type: application/vnd.ms-excel");
//header("Content-type: application/x-msdownload");
//header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
//header("Content-type: application/vnd.oasis.opendocument.spreadsheet");

header("Content-Disposition: attachment; filename=Credito_Horario.xls");

//header("Pragma: no-cache");
//header("Expires: 0");
//header('Cache-Control: must-revalidate, post-check=0, pre-check=0');



$result = $conexion->query("SELECT provincia, entidad, nombre, apellidos,numeroEmpleado, NIF, creditoHorario, horasCedidas, totalHoras FROM delegados ORDER BY provincia ASC");

$result2 = $conexion->query("SELECT sum(creditoHorario) as CreditoHorario, sum(horasCedidas) as HorasCedidas, sum(totalHoras) as TotalHoras FROM `delegados`");
				
$result3 = $conexion->query("SELECT provincia as PPVV, SUM(totalHOras) as TTHH from delegados group by provincia ORDER BY provincia ASC");

				echo "
				
				<div class='container'>

				<div class='row'>
					<div class='col' >
						<div class='row'>
							<div class='col' >
								<H3> TOTAL CREDITO HORARIO </H3>
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

													echo "<td style='color:red;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";
												}

												else{

													echo "<td style='color:green;font-weight: bold;'>" . $row2['HorasCedidas'] . "</td>";		
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
												<th>Numero Empleado</th>
												<th>NIF</th>
												<th>Credito Horario</th>
												<th>Horas Cedidas</th>
												<th>Total Horas</th>
												
												
											</tr>
										</thead>
										";
										echo "<tbody >";
							
								//while($row3 = $result3->fetch_array())
								//{
							
										while($row = $result->fetch_array())
										{
											
											//if($row['provincia']===$row3['PPVV'])
											//{

													

														
														
															echo "<tr >";

																


																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['provincia'] . "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['entidad'] . "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['nombre'] . "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['apellidos']. "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['numeroEmpleado']. "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['NIF']. "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['creditoHorario']. "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['horasCedidas'] . "</td>";
																	echo "<td style='text-align:center;display: table-cell;vertical-align: middle;'>" . $row['totalHoras'] . "</td>";
																	//echo "<td ><input type='text' style='width:40px;text-align:center;display: table-cell;vertical-align: middle;' placeholder=' ".$row['totalHoras']."'/></td>";
																	//echo"<td ><button type='button' class='btn btn-success' style='text-align:center;display: table-cell;vertical-align: middle;'>Mod.</button></td>";

																	echo "														
																		
																	</td>";
																	
																	

															echo "</tr>";

														

													
											//}

											
										}

									//echo "<tr>TOTAL HORAS". $row3['PPVV'] .":" . $row3['TTHH'] . "</tr>";	
								//}

									echo "</tbody>";
						echo "</table>";
					echo "</div>";  

					echo "</div>";




?>