<?php

include("../conexion.php");


$id = $_POST['usuario'];





	$result = $conexion->query("select *  FROM censo WHERE id='".$id."'");
	
	echo "
	<div class='container'>


		<div class='row'>
			<div class='col'>
				<table class='table'>
								<thead class='thead-light'>
									<tr>
										<th>Nº Empleado</th>
										<th>NIF</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Fecha Nacimiento</th>
									</tr>
								</thead>";
					

					
								while($row = $result->fetch_array())
								{
									
								echo "<tbody>";
									echo "<tr >";

										echo "<td >" . $row['NumeroEmpleado'] . "</td>";
										echo "<td >" . $row['NIF'] . "</td>";
										echo "<td >" . $row['Nombre'] . "</td>";
										echo "<td >" . $row['Apellidos'] . "</td>";
										echo "<td >" . $row['FechaNacimiento'] . "</td>";
									echo "</tr>";
								echo "</tbody>";
								}
					

				echo "</table>";
			echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	

	$result = $conexion->query("select * FROM censo WHERE id='".$id."'");

	echo "
		<div class='row'>
			<div class='col'>
				<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Sociedad</th>
									<th>Nº Oficina</th>
									<th>Nombre Oficina</th>
									<th>Contrato</th>
									<th>Antiguedad</th>
									
									<th>Provincia</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";
									echo "<td >" . $row['Sociedad'] . "</td>";
									echo "<td >" . $row['NumeroOficina'] . "</td>";
									echo "<td >" . $row['NombreOficina'] . "</td>";
									echo "<td >" . $row['ModalidadContrato'] . "</td>";
									echo "<td >" . $row['PrimeraAlta'] . "</td>";
									
									echo "<td >" . $row['Provincia'] . "</td>";			
								echo "</tr>";
							echo "</tbody>";
							}
				

				echo "</table>";
			echo "</div>"; 
		echo "</div>";
	
/*************************************************/
	

//$result = $conexion->query("select * FROM censo WHERE id='".$id."'");
$result = $conexion->query("SELECT CE.CategoriaProfesional as catprof, CE.AntiguedadCategoria as antcat, CE.Puesto as pue, CE.FechaPuesto as fechapue, CF.catfun as catf FROM censo CE left join clasificacionfuncional CF on CE.NumeroEmpleado=CF.numeroempleado WHERE CE.id='".$id."'");

//SELECT * FROM censo CE left join clasificacionfuncional CF on CE.NumeroEmpleado=CF.numeroempleado  WHERE CE.numeroEmpleado='102'

echo "
	<div class='row'>
		<div class='col'>
			<table class='table'>
						<thead class='thead-light'>
							<tr>
								
								<th>Categoria Prof.</th>
								<th>Antiguedad Categoria</th>
								<th>Puesto</th>
								<th>Categ. Func.</th>
								<th>Antiguedad Puesto</th>
								
							</tr>
						</thead>";
			

			
						while($row = $result->fetch_array())
						{
							
						echo "<tbody>";
							echo "<tr >";
								
								echo "<td >" . $row['catprof'] . "</td>";
								echo "<td >" . $row['antcat'] . "</td>";
								echo "<td >" . $row['pue'] . "</td>";
								echo "<td >" . $row['catf'] . "</td>";
								echo "<td >" . $row['fechapue'] . "</td>";	
										
							echo "</tr>";
						echo "</tbody>";
						}
			

			echo "</table>";
		echo "</div>"; 
	echo "</div>";

	 
/*****************DATOS AFILIATIVOS******************************/

	$resultAFI = $conexion->query("select * from censo inner join afiliacion on censo.NIF = afiliacion.NIF and censo.id='".$id."'");

	$resultNOAFI = $conexion->query("select * from censo inner join bajasafiliacion on censo.NIF = bajasafiliacion.NIF and censo.id='".$id."'");
echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading1'>
							<h5 class='mb-0'>
								<a href='#collapse1' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse1'>
									Datos Afiliativos
								</a>
							</h5>
						</div>

						<div id='collapse1' class='collapse' role='tabpanel' aria-labelledby='heading1'>
							<div class='card-body'>
								<div class='row' >
											";
										echo "

												<table class='table'>
														
															<thead class='thead-light'>
																<tr>
																	<th>Afiliado/a</th>
																	<th>Fecha Afiliación</th>
																	<th>Fecha Baja Af.</th>
																	<th>Gestor Afiliación</th>
																	<th>CCC Afiliación</th>
																	<!--<th>Coordinador Territorial</th>-->
																	<th>Correo Externo</th>
																
																</tr>
															</thead>";
												

															echo "<tbody>";
																echo "<tr >";
																	if($row = $resultAFI->fetch_array())
																	{
																		
																				echo "<td >" ."<img class='img-fluid' src='../img/verde.png' alt='SI'>" . "</td>";
																				echo "<td >" . $row['fechaAfiliacion'] . "</td>";
																				echo "<td >" . $row['fechaBaja'] . "</td>";		
																				echo "<td >" . $row['gestorAfiliacion'] . "</td>";
																				echo "<td >" . $row['CCAfiliacion'] . "</td>";
																				//echo "<td >" . $row['coordinadorTerritorial'] . "</td>";
																				echo "<td >" . $row['correoExternoPropio'] . "</td>";		
																						
																	}
																	else{
																		if($rowNOAFI = $resultNOAFI->fetch_array())
																		{
																			echo "<td >" ."<img class='img-fluid' src='../img/naranja.png' alt='SI_ANTES'>" . "</td>";
																			echo "<td >" . $rowNOAFI['fechaAfiliacion'] . "</td>";
																			echo "<td >" . $rowNOAFI['fechaBaja'] . "</td>";		
																			echo "<td >" . $rowNOAFI['gestorAfiliacion'] . "</td>";
																			echo "<td >" . $rowNOAFI['CCAfiliacion'] . "</td>";
																			//echo "<td >" . $row['coordinadorTerritorial'] . "</td>";
																			echo "<td >" . $rowNOAFI['correoExternoPropio'] . "</td>";
																		}
																		else{
																			echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='NO'>" . "</td>";
																		}
																			
																	
																	}


																echo "</tr>";
															echo "</tbody>";
												echo "</table>";	

	$resultAFI2 = $conexion->query("select * from censo inner join afiliacion on censo.NIF = afiliacion.NIF and censo.id='".$id."'");
	$resultNOAFI2 = $conexion->query("select * from censo inner join bajasafiliacion on censo.NIF = bajasafiliacion.NIF and censo.id='".$id."'");
														echo "	
													<table class='table'>	
														<thead class='thead-light'>
																<tr>
																	<th>Dirección</th>
																	<th>Población</th>
																	<th>Provincia</th>
																	<th>Teléfono</th>
																	<th>Forma de Pago</th>
																
																</tr>
															</thead>";
												

															echo "<tbody>";
																echo "<tr >";
																	if($row = $resultAFI2->fetch_array())
																	{
																		
																				echo "<td >" . $row['direccion'] . "</td>";
																				echo "<td >" . $row['poblacion'] . "</td>";	
																				echo "<td >" . $row['provincia'] . "</td>";
																				echo "<td >" . $row['telefono'] . "</td>";
																				if ($row['formaDePago']=='1'){

																					echo "<td >RECIBO</td>";
																				}
																				else if($row['formaDePago']=='2'){

																					echo "<td >DESC. NOMINA</td>";
																				}
																				else{
																					echo "<td >" . $row['formaDePago'] . "</td>";
																				}
																						
																						
																	}
																	else{
																		if($rowNOAFI2 = $resultNOAFI2->fetch_array())
																		{
																			echo "<td >" . $rowNOAFI2['direccion'] . "</td>";
																			echo "<td >" . $rowNOAFI2['poblacion'] . "</td>";	
																			echo "<td >" . $rowNOAFI2['provincia'] . "</td>";
																			echo "<td >" . $rowNOAFI2['telefono'] . "</td>";
																			if ($rowNOAFI2['formaDePago']=='1'){

																				echo "<td >RECIBO</td>";
																			}
																			else if($rowNOAFI2['formaDePago']=='2'){

																				echo "<td >DESC. NOMINA</td>";
																			}
																			else{
																				echo "<td >" . $rowNOAFI2['formaDePago'] . "</td>";
																			}
																		}
																		else{
																			//echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='NO'>" . "</td>";
																		}
																			
																	
																	}


																echo "</tr>";
															echo "</tbody>";
															
													echo "</table>";

		$resultAFI3 = $conexion->query("select * from censo inner join afiliacion on censo.NIF = afiliacion.NIF and censo.id='".$id."'");
		$resultNOAFI3 = $conexion->query("select * from censo inner join bajasafiliacion on censo.NIF = bajasafiliacion.NIF and censo.id='".$id."'");

															echo "	
														<table class='table'>	
																<thead class='thead-light'>
																	<tr>
																		<th>Situación</th>
																		<th>Observaciones</th>
																		
																	
																	</tr>
																</thead>";
													
	
																echo "<tbody>";
																	echo "<tr >";
																		if($row = $resultAFI3->fetch_array())
																		{
																			
																					echo "<td >" . $row['situacion'] . "</td>";
																					echo "<td >" . $row['observaciones'] . "</td>";	
																					
																							
																							
																		}
																		else{
																			if($rowNOAFI3 = $resultNOAFI3->fetch_array())
																			{
																				echo "<td >" . $rowNOAFI3['situacion'] . "</td>";
																				echo "<td >" . $rowNOAFI3['observaciones'] . "</td>";	
																			}
																			else{
																				//echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='NO'>" . "</td>";
																			}
																				
																		
																		}
	
	
																	echo "</tr>";
																echo "</tbody>";
												
														echo "</table>";
											
								echo "</div>"; 
		
							echo"</div>
								
							</div>
						</div>
					</div>
		
				</div>
	
		</div>";



/******************* RLT *********************************/


$resultRLT = $conexion->query("select DE.cargoComiteEmpresa as CCE,DE.comiteSS as CSS ,DE.creditoHorario as CH, DE.horasCedidas as HC, DE.totalHoras as TH, DE.situacion as SIT from censo CE inner join delegados DE on CE.NIF = DE.NIF and CE.id='".$id."'");

echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading2'>
							<h5 class='mb-0'>
								<a href='#collapse2' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse2'>
									Representación legal de los/las trabajadores/as
								</a>
							</h5>
						</div>

						<div id='collapse2' class='collapse' role='tabpanel' aria-labelledby='heading2'>
							<div class='card-body'>
								<div class='row' >";
										echo "
			
												<table class='table'>
															<thead class='thead-light'>
																<tr>
																	<th>Delegado/a</th>
																	<th>Cargo Com. Emp.</th>
																	<th>Comite S.S.</th>
																	<th>Credito Horar.</th>
																	<th>Horas Cedidas</th>
																	<th>Total Horas</th>
																	<th>Situacion</th>
																
																</tr>
															</thead>";
												

															echo "<tbody>";
																echo "<tr >";
																	if($row = $resultRLT->fetch_array())
																	{
																		
																				echo "<td >" ."<img class='img-fluid' src='../img/verde.png' alt='vede'>" . "</td>";
																				echo "<td >" . $row['CCE'] . "</td>";	
																				echo "<td >" . $row['CSS'] . "</td>";
																				echo "<td >" . $row['CH'] . "</td>";
																				echo "<td >" . $row['HC'] . "</td>";
																				echo "<td >" . $row['TH'] . "</td>";
																				echo "<td >" . $row['SIT'] . "</td>";			
																						
																	}
																	else{

																			echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='rojo'>" . "</td>";
																	
																	}


																echo "</tr>";
															echo "</tbody>";
												echo "</table>";
								echo "</div>"; 
		
							echo"</div>
								
							</div>
						</div>
					</div>
		
				</div>
	
		</div>";



/****************************************************/

/******************* BOTON BOLETIN AFILIACION *********************************/



echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading3'>
							<h5 class='mb-0'>
								<a href='#collapse3' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse3'>
									Boletín Afiliación
								</a>
							</h5>
						</div>

						<div id='collapse3' class='collapse' role='tabpanel' aria-labelledby='heading3'>
							<div class='card-body'>
								<div class='row' >";
										echo "
			
											<button class='btn btn-warning btn-lg btn-block' id='imprimirBA'>Ver/Compartir Boletín de Afiliación</button>
											
												";
								echo "</div>"; 
		
							echo"</div>
								
							</div>
						</div>
					</div>
		
				</div>
	
		</div>";



/****************************************************/

/******************* GESTION DE VISITAS *********************************/



echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading4'>
							<h5 class='mb-0'>
								<a href='#collapse4' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse4'>
									Gestion de Visitas
								</a>
							</h5>
						</div>

					
						<div id='collapse4' class='collapse' role='tabpanel' aria-labelledby='heading4'>
							<div class='card-body'>
								<div class='row' >";
										echo "
											
											<div class='col' ><button class='btn btn-primary btn-lg btn-block' id='altaVisitaEmpleado'>Alta Visita</button></div>
											<div class='col' ><button class='btn btn-primary btn-lg btn-block' id='consultaVisitaEmpleado'>Consulta Visitas</button></div>";



								echo "</div>"; 

								$resultConsultaDelegados = $conexion->query("select * from delegados ORDER BY apellidos ASC");
								$resultConsultaDelegados2 = $conexion->query("select * from delegados ORDER BY apellidos ASC");
								$resultNumeroEmpleado = $conexion->query("select * FROM censo WHERE id='".$id."'");

								echo"<div id='altaDatosVisitaEmpleado' class='container' >";

										

									
										echo"<div id='formularioAltaVisita'>
						                    <div class='row'>

						                    	<div class='col'>
						                            <label>Num.Empleado</label>";
						                            while($row = $resultNumeroEmpleado->fetch_array())
															{
						                       
						                        	echo" <label name='numeroEmpleadoVisita' id='numeroEmpleadoVisita' class='form-control'>".$row['NumeroEmpleado']."</label>";
						                        			}
						                        echo"</div>



						                        <div class='col'>
						                            <label>Fecha Visita</label>
						                            <input type='date' class='form-control' placeholder='Fecha Visita' name='fechaVisita' id='fechaVisita'>
						                        </div>

						                        
												<div class='col'>";
												
													/*
						                        	echo"<label>Gestor-1</label>
						                            
						                            <select name='gestor1' id='gestor1' class='form-control'>";

						                            		echo"<option value=''>Selecciona gestor</option>";
								                            while($row = $resultConsultaDelegados->fetch_array())
															{
																					//echo "<td >" . $row['fv'] . "</td>";
								                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ".$row['apellidos'].", ".$row['nombre']."</option>";

								                        	}
													  echo "</select>";	
													  
													*/

													

													echo"	<label>Gestor-1</label>

							                            <input id ='gestor1' list='gestores1' name='gestor1' placeholder='Selecciona gestor' class='form-control'>

							                            <datalist id='gestores1' title='Escoge sugerencia...''>  ";

							                                  	echo"<option value=''>Selecciona gestor</option>";
							                                   while($row = $resultConsultaDelegados->fetch_array())
																{
																						
									                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ";

									                        	}

							                        echo" </datalist> ";


												echo "</div>
												   


												<div class='col'>";
												
													/*
						                            echo" <label>Gestor-2</label>
						                            <select name='gestor2' id='gestor2' class='form-control'>";

						                            		echo"<option value=''>Selecciona gestor</option>";
								                            while($row = $resultConsultaDelegados2->fetch_array())
															{
																					//echo "<td >" . $row['fv'] . "</td>";
								                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ".$row['apellidos'].", ".$row['nombre']."</option>";

								                        	}
													  echo "</select>";	
													 */ 

													echo"	<label>Gestor-2</label>

							                            <input id ='gestor2' list='gestores2' name='gestor2' placeholder='Selecciona gestor' class='form-control'>

							                            <datalist id='gestores2' title='Escoge sugerencia...''>   ";

							                                  	echo"<option value=''>Selecciona gestor</option>";
							                                   while($row = $resultConsultaDelegados2->fetch_array())
																{
																						
									                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ";

									                        	}

							                        echo" </datalist> ";



						                        echo"</div>

						                        
						                     </div>

						                     <div class=' row align-items-end'>

						                     		<div class='col-10'>
							                            <label>Comentarios</label>
							                            <textarea name='comentariosVisita' id='comentariosVisita' class='form-control'></textarea>
						                        	</div>

						                     		<div class='col' >
						                     			<button class='btn btn-outline-success' id='grabarVisitaEmpleado'>Grabar</button>
						                     		</div>
						                     </div>
						                 </div>
						            

						           

						            

								</div>";

								$resultVisitaEmpleado = $conexion->query("select VE.id as idi, VE.fechaVisita as fv, VE.gestor1 as g1, VE.gestor2 as g2, VE.comentarios as comen from censo CE inner join visitasempleados VE on CE.NumeroEmpleado=VE.numeroEmpleado where CE.id='".$id."'ORDER BY VE.fechaVisita DESC");

								echo"<div id='consultaDatosVisitaEmpleado' class='row' >";
												echo "<table class='table'>
																	<thead class='thead-light'>
																		<tr>
																			<th>Nº</th>
																			<th>Fecha</th>
																			<th>Gest-1</th>
																			<th>Gest-2</th>
																			<th>Comentarios</th>
																			<th></th>
																		
																		</tr>
																	</thead>";
														
																	while($row = $resultVisitaEmpleado->fetch_array())
																		{
																	echo "<tbody>";
																		echo "<tr >";
																																					
																						echo "<td >" . $row['idi'] . "</td>";
																						echo "<td >" . $row['fv'] . "</td>";	
																						echo "<td >" . $row['g1'] . "</td>";
																						echo "<td >" . $row['g2'] . "</td>";
																						echo "<td >" . $row['comen'] . "</td>";
																									
																						echo "<td style='text-align:center;''>				        
										       													 <button type='button' id='". $row['idi'] ."' class='btn btn-alert botonEliminarVisita'>Elim.</button>
										   													 </td>";
																			


																		echo "</tr>";
																	echo "</tbody>";

																	}
												echo "</table>";
								echo "</div>"; 

		
							echo"</div>
								
							</div>
						</div>";



						
						




					echo"</div>
		
				</div>
	
		</div>";



/****************************************************/







	mysqli_close($conexion);



?>