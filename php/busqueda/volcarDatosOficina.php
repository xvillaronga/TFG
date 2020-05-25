<?php

include("../conexion.php");



$id = $_POST['ofi'];




	


	$result = $conexion->query("select *  FROM oficinas WHERE id='".$id."'");


	
	echo "
	<div class='container'>


		<div class='row'>
			<div class='col'>
				<table class='table'>
								<thead class='thead-light'>
									<tr>
										<th>Nº Oficina</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Telefono</th>
										
										<th>Municipio</th>
										<th>Provincia</th>
									</tr>
								</thead>";
					

					
								while($row = $result->fetch_array())
								{

									$numero= $row['NumeroOficina'];
									
								echo "<tbody>";
									echo "<tr >";
										echo "<td >" . $row['NumeroOficina'] . "</td>";
										echo "<td >" . $row['Nombre'] . "</td>";
										echo "<td >" . $row['Direccion'] . "</td>";
										echo "<td >" . $row['Telefono'] . "</td>";
										
										echo "<td >" . $row['Municipio'] . "</td>";
										echo "<td >" . $row['Provincia'] . "</td>";
									echo "</tr>";
								echo "</tbody>";
								}
					

				echo "</table>";
			echo "</div>";  

		echo "</div>";
	 

	
/*************************************************/
	

	$result = $conexion->query("select *  FROM oficinas WHERE id='".$id."'");

	echo "
		<div class='row'>
			<div class='col'>
				<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>Apertura</th>
									<th>Zona</th>
									<th>DT</th>
									<th>T.Centro</th>
									<th>Coord.Territorial</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";
									echo "<td >" . $row['FechaApertura'] . "</td>";
									echo "<td >" . $row['Zona'] . "</td>";
									echo "<td >" . $row['NombreDT'] . "</td>";
									echo "<td >" . $row['TipoCentro'] . "</td>";
									echo "<td >" . $row['CoordinadorTerritorial'] . "</td>";			
								echo "</tr>";
							echo "</tbody>";
							}
				

				echo "</table>";
			echo "</div>"; 
		echo "</div>";


/****************************************************/

	
/*************************************************/
	

$resultCT = $conexion->query("select CT.asistencia as asi, CT.ocupacion as ocupi, CT.mediaOAS as oas, CT.mediaODS as ods, CT.mediaZona as mz, CT.mediaDT as mdt  FROM oficinas OF left join cargasdetrabajo CT on OF.NumeroOficina=CT.numeroOficina WHERE OF.id='".$id."'");

echo "
	<div class='row'>
		<div class='col'>
			<table class='table'>
						<thead class='thead-light'>
							<tr>
								<th>Asistencia</th>
								<th>Ocupación</th>
								<th>Media OAS</th>
								<th>Media ODS</th>
								<th>Media Zona</th>
								<th>Media DT</th>
							</tr>
						</thead>";
			

			
						while($row = $resultCT->fetch_array())
						{
							
						echo "<tbody>";
							echo "<tr >";
								echo "<td >" . $row['asi'] . "</td>";
								echo "<td style='font-weight: bold'>" . $row['ocupi'] . "</td>";
								echo "<td >" . $row['oas'] . "</td>";
								echo "<td >" . $row['ods'] . "</td>";
								echo "<td >" . $row['mz'] . "</td>";	
								echo "<td >" . $row['mdt'] . "</td>";		
							echo "</tr>";
						echo "</tbody>";
						}
			

			echo "</table>";
		echo "</div>"; 
	echo "</div>";


/***************************************************/

/*****************EMPLEADOS ******************************/

	
	//$result2 = $conexion->query("select Ce.NumeroEmpleado as NE, Ce.Nombre as Nom, Ce.Apellidos as Cognoms, Ce.Puesto as Lloc, Ce.CategoriaProfesional as CP from censo Ce inner join oficinas Of on Ce.NumeroOficina = Of.NumeroOficina where Of.id ='".$id."' ORDER BY CP ASC");
/*
	$result2 = $conexion->query("select Ce.NumeroEmpleado as NE, Ce.Nombre as Nom, Ce.Apellidos as Cognoms, Ce.Puesto as Lloc, Ce.CategoriaProfesional as CP
from afiliacion AF inner join censo Ce on AF.NIF=Ce.NIF
where AF.numeroEmpleado IN (select Ce.NumeroEmpleado as NE from censo Ce inner join oficinas Of on Ce.NumeroOficina = Of.NumeroOficina where Of.id ='".$id."' ORDER BY CP ASC) ORDER BY CP ASC
");
*/	
	$result2 = $conexion->query("SELECT CE.id as ID, CE.NumeroEmpleado as NE, CE.Nombre as Nom, CE.Apellidos as Cognoms, CE.Puesto as Lloc, CE.CategoriaProfesional as CP FROM censo CE inner join afiliacion AF on CE.NIF=AF.NIF where CE.NumeroOficina ='".$numero."'");

	/*

	$result3= $conexion->query("select Ce.NumeroEmpleado as NE, Ce.Nombre as Nom, Ce.Apellidos as Cognoms, Ce.Puesto as Lloc, Ce.CategoriaProfesional as CP from censo Ce inner join oficinas Of on Ce.NumeroOficina = Of.NumeroOficina where Of.id ='".$id."'  and Ce.NumeroEmpleado not in (select AF.numeroEmpleado from afiliacion AF
where AF.numeroEmpleado IN (select Ce.NumeroEmpleado as NE from censo Ce inner join oficinas Of on Ce.NumeroOficina = Of.NumeroOficina where Of.id ='".$id."' ORDER BY CP ASC)) ORDER BY CP ASC

");

	*/

	$result3= $conexion->query("select CC.id as IDC, CC.NumeroEmpleado as NEC, CC.Nombre as NomC, CC.Apellidos as CognomsC, CC.Puesto as LlocC, CC.CategoriaProfesional as CPC FROM censo CC where CC.NumeroOficina ='".$numero."' and CC.NumeroEmpleado
not in(SELECT CE.NumeroEmpleado as NE FROM censo CE inner join afiliacion AF on CE.NIF=AF.NIF where CE.NumeroOficina ='".$numero."')
");

	

echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading20'>
							<h5 class='mb-0'>
								<a href='#collapse20' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse20'>
									Empleados/as
								</a>
							</h5>
						</div>

						<div id='collapse20' class='collapse' role='tabpanel' aria-labelledby='heading20'>
							<div class='card-body'>
								<div class='row' >";
										echo "
												<!--<H6 style='color:FireBrick ;''> AFILIADOS/AS </H6>-->
												<table class='table'>
															<thead class='thead-light'>
																<tr>
																	<th></th>
																	
																	<th>NºEmpleado</th>
																	<th>Nombre</th>
																	<th>Apellidos</th>
																	<th>Puesto</th>
																	<th>Categoria Profesional</th>
																	
																
																</tr>
															</thead>";
												
															/*
															while($row = $result2->fetch_array())
																	{
																		
																	echo "<tbody>";
																		echo "<tr >";

																			
																			echo "<td class='empleadoClicable' id='". $row['ID'] ."'>" ."<a href='#'><img class='img-fluid' src='../img/verde.png' alt='verde'></a>" . "</td>";
																			
																			echo "<td >" . $row['NE'] . "</td>";
																			echo "<td >" . $row['Nom'] . "</td>";
																			echo "<td >" . $row['Cognoms'] . "</td>";
																			echo "<td >" . $row['Lloc'] . "</td>";
																			echo "<td >" . $row['CP'] . "</td>";			
																		echo "</tr>";
																		
																	echo "</tbody>";


																	}
															*/

															while($row = $result2->fetch_array())
																	{
																		
																	echo "<tbody>";
																		echo "<tr class='empleadoClicable' id='". $row['ID'] ."'>" ."<a href='#'>";

																			
																			echo "<td ><img class='img-fluid' src='../img/verde.png' alt='verde'>" . "</td>";
																			
																			echo "<td >" . $row['NE'] . "</td>";
																			echo "<td >" . $row['Nom'] . "</td>";
																			echo "<td >" . $row['Cognoms'] . "</td>";
																			echo "<td >" . $row['Lloc'] . "</td>";
																			echo "<td >" . $row['CP'] . "</td>";			
																		echo " </a></tr>";
																		
																	echo "</tbody>";


																	}

												echo "</table>";
								echo "</div>"; 

								echo "
								<div class='row' >";
										echo "
												<!--<H6 style='color:FireBrick ;''> NO AFILIADOS/AS </H6>-->
												<table class='table'>
															<thead class='thead-light'>
																<tr>
																	<th></th>
																	
																	<th>NºEmpleado</th>
																	<th>Nombre</th>
																	<th>Apellidos</th>
																	<th>Puesto</th>
																	<th>Categoria Profesional</th>
																	
																
																</tr>
															</thead>";
												

															while($row = $result3->fetch_array())
																	{
																		
																	echo "<tbody>";
																		echo "<tr class='empleadoClicable' id='". $row['IDC'] ."'>" ."<a href='#'>";
																			
																		$resultNOAFI= $conexion->query("select * from bajasafiliacion where numeroEmpleado = ".$row['NEC'] ."");

																		if($rowNOAFI = $resultNOAFI->fetch_array())
																		{
																			
																			echo "<td ><img class='img-fluid' src='../img/naranja.png' alt='rojo'>" . "</td>";	
																							
																		}
																		else{
	
																			echo "<td ><img class='img-fluid' src='../img/rojo.png' alt='rojo'>" . "</td>";
																		
																		}
																			
																			
																			echo "<td >" . $row['NEC'] . "</td>";
																			echo "<td >" . $row['NomC'] . "</td>";
																			echo "<td >" . $row['CognomsC'] . "</td>";
																			echo "<td >" . $row['LlocC'] . "</td>";
																			echo "<td >" . $row['CPC'] . "</td>";			
																		echo "</a></tr>";

																		
																	echo "</tbody>";

																	
																	}

												echo "</table>";
								echo "</div>"; 


		
							echo"</div>
								
							</div>
						</div>
					</div>
		
				</div>
	
		</div>";

/*************************************************/

/******************* GESTION DE VISITAS *********************************/



echo "
	
		
		
		<div class='row mt-3'>
			<div class='col'>
				<div id='acordion' role='tablist' aria-multiselectable='true'>
					<div class='card'>
						<div class='card-header' role='tab' id='heading224'>
							<h5 class='mb-0'>
								<a href='#collapse24' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse24'>
									Gestion de Visitas
								</a>
							</h5>
						</div>

					
						<div id='collapse24' class='collapse' role='tabpanel' aria-labelledby='heading24'>
							<div class='card-body'>
								<div class='row' >";
										echo "
											
											<div class='col' ><button class='btn btn-primary btn-lg btn-block' id='altaVisitaOficina'>Alta Visita</button></div>
											<div class='col' ><button class='btn btn-primary btn-lg btn-block' id='consultaVisitaOficina'>Consulta Visitas</button></div>";



								echo "</div>"; 

								$resultConsultaDelegados = $conexion->query("select * from delegados ORDER BY apellidos ASC");
								$resultConsultaDelegados2 = $conexion->query("select * from delegados ORDER BY apellidos ASC");
								$resultNumeroOficina = $conexion->query("select * FROM oficinas WHERE id='".$id."'");

								echo"<div id='altaDatosVisitaOficina' class='container' >";

										

									
										echo"<div id='formularioAltaVisitaOficina'>

						                    <div class='row '>

						                    	<div class='col'>
						                            <label>Numero Oficina</label>";
						                            while($row = $resultNumeroOficina->fetch_array())
															{
						                       
						                        	echo" <label name='numeroOficinaVisita' id='numeroOficinaVisita' class='form-control'>".$row['NumeroOficina']."</label>";
						                        			}
						                        echo"</div>

						                        <div class='col'>
								                            <label>Fecha Visita</label>
								                            <input type='date' class='form-control' placeholder='Fecha Visita' name='fechaVisitaOficina' id='fechaVisitaOficina'>
								                </div>

											
						                      
						                        <div class='col'>";

							                        /*
							                        echo"    <label>Gestor-1</label>
							                            
							                            <select name='gestor1Of' id='gestor1Of' class='form-control'>";

							                            		echo"<option value=''>Selecciona gestor</option>";
									                            while($row = $resultConsultaDelegados->fetch_array())
																{
																						//echo "<td >" . $row['fv'] . "</td>";
									                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ".$row['apellidos'].", ".$row['nombre']."</option>";

									                        	}
			  											echo "</select>	";	
													*/
												 
		  											
		  											
			  										echo"	<label>Gestor-1</label>

							                            <input id ='gestor1Of' list='gestores1' name='gestor1Of' placeholder='Selecciona gestor' class='form-control'>

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
							                        echo"    <label>Gestor-2</label>
							                            <select name='gestor2Of' id='gestor2Of' class='form-control'>";

							                            		echo"<option value=''>Selecciona gestor</option>";
									                            while($row = $resultConsultaDelegados2->fetch_array())
																{
																						//echo "<td >" . $row['fv'] . "</td>";
									                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ".$row['apellidos'].", ".$row['nombre']."</option>";

									                        	}
			  											echo "</select>";	
													*/
			  										

			  										
			  										
			  										echo"	<label>Gestor-2</label>

							                            <input id ='gestor2Of' list='gestores2' name='gestor2Of' placeholder='Selecciona gestor' class='form-control'>

							                            <datalist id='gestores2' title='Escoge sugerencia...''>   ";

							                                  	echo"<option value=''>Selecciona gestor</option>";
							                                   while($row = $resultConsultaDelegados2->fetch_array())
																{
																						
									                        echo"<option value='".$row['nombre']." ".$row['apellidos']."'> ";

									                        	}

							                        echo" </datalist> ";

							                        

						                        echo"</div>

											</div> 
											  

						                     
						                    

						                     <div class=' row '>

						                     		

						                     		<div class='col'>
							                            <label>Puerta Acceso</label>
							                            <input type='text' name='puertaAcceso' id='puertaAcceso' class='form-control'></input>
						                        	</div>

						                     		<div class='col'>
							                            <label>Extintores</label>
							                            <input type='text' name='extintores' id='extintores' class='form-control'></input>
						                        	</div>

						                        	<div class='col'>
							                            <label>Estanterias Archivo</label>
							                            <input type='text' name='estanteriasArchivo' id='estanteriasArchivo' class='form-control'></input>
						                        	</div>
						                     </div>

						                     <div class=' row '>

						                     		<div class='col'>
							                            <label>Fluorescentes</label>
							                            <input type='text' name='fluorescentes' id='fluorescentes' class='form-control'></input>
						                        	</div>

						                     		<div class='col'>
							                            <label>Aire Acondicionado</label>
							                            <input type='text' name='aireAcondicionado' id='aireAcondicionado' class='form-control'></input>
						                        	</div>

						                        	<div class='col'>
							                            <label>Barra Antideslizante</label>
							                            <input type='text' name='barraAntideslizante' id='barraAntideslizante' class='form-control'></input>
						                        	</div>
						                     </div>

						                     <div class=' row '>

						                     		<div class='col-4'>
							                            <label>Armario Limpieza</label>
							                            <input type='text' name='armarioLimpieza' id='armarioLimpieza' class='form-control'></input>
						                        	</div>

						                     		<div class='col'>
							                            <label>Otros</label>
							                            <input type='text' name='otros' id='otros' class='form-control'></input>
						                        	</div>

						                    </div>

						                     <div class=' row '>

						                     		<div class='col-10'>
							                            <label>Comentarios</label>
							                            <textarea name='comentariosVisitaOficina' id='comentariosVisitaOficina' class='form-control'></textarea>
						                        	</div>

						                     		<div class='col' >
						                     			<button class='btn btn-outline-success' id='grabarVisitaOficina'>Grabar</button>
						                     		</div>
						                     </div>

						                 </div>
						            

						           

						            

								</div>";

								$resultVisitaOficina = $conexion->query("select VO.id as idi, VO.fechaVisita as fv, VO.gestor1 as g1, VO.gestor2 as g2, VO.comentarios as comen from oficinas OF inner join visitasoficinas VO on OF.NumeroOficina=VO.numeroOficina where OF.id='".$id."'ORDER BY VO.fechaVisita DESC");

								echo"<div id='consultaDatosVisitaOficina' class='row' >";
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
														
																	while($row = $resultVisitaOficina->fetch_array())
																		{
																	echo "<tbody>";
																		echo "<tr >";
																																					
																						echo "<td >" . $row['idi'] . "</td>";
																						echo "<td >" . $row['fv'] . "</td>";	
																						echo "<td >" . $row['g1'] . "</td>";
																						echo "<td >" . $row['g2'] . "</td>";
																						echo "<td >" . $row['comen'] . "</td>";
																									
																						echo "<td style='text-align:center;''>				        
										       													 <button type='button' id='". $row['idi'] ."' class='btn btn-alert botonEliminarVisitaOficina'>Elim.</button>
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



/****************************************************/
	mysqli_close($conexion);



?>