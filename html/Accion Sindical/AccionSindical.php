	<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/jquery/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap/popper.min.js"></script>
	<script src="../../js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/ChartJS/Chart.min.js"></script>
		
	
	<link rel="stylesheet" type="text/css" media="screen" href="../../css/styles.css">
	<!---<script src="http://code.jquery.com/jquery-3.1.1.js"></script> -->
	<script type="text/javascript" src="../../js/panelControl.js"></script>
	<script type="text/javascript" src="../../js/busqueda.js"></script>
	<script type="text/javascript" src="../../js/AccionSindical.js"></script>
	<script type="text/javascript" src="../../js/Organizacion.js"></script>
	<!--<script type="text/javascript" src="../js/evolucionAfiliacion.js"></script>-->

	<script src="../../js/polyfill/datalist-polyfill.min.js"></script>


	<style>
		/*
		.row > div {
			
			background: white;
			margin:10px 0;
		}
		*/
		#chart-container {
				width: 640px;
				height: auto;
				
			}
		
		
		
		.loader {
			    position: fixed;
			    left: 0px;
			    top: 0px;
			    width: 100%;
			    height: 100%;
			    z-index: 9999;
			    background: url('../../img/pageLoader.gif') 50% 10% no-repeat rgb(249,249,249);
			    opacity: .5;
			}


		
	</style>

	

	
	<title>Base de Datos</title>

<!--FORZAR A NO GUARDAR CACHHE--->
		<meta http-equiv="Expires" content="0">
	
		<meta http-equiv="Last-Modified" content="0">
		
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		
		<meta http-equiv="Pragma" content="no-cache">
<!--FIN FORZAR A NO GUARDAR CACHHE--->	

    </head>
    <body>
		<div class="loader"></div>

	<div class="container" >
		
		<div class="row justify-content-center" id="finger">
				<h1 style="color: #DC143C">Cuadro de Mando ACCION SINDICAL </h1>
		</div>

		<div class="row mt-3">
			<div class="col">
				<div id="acordion" role="tablist" aria-multiselectable="true">
					<div class="card">
						<div class="card-header" role="tab" id="heading1">
							<h5 class="mb-0">
								<a href="#collapse1" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse1">
									Tabla de afiliación Activos
								</a>
							</h5>
						</div>

						<div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1">
							<div class="card-body">
								
								<div class="row " id="tablaAfiliacion">

								</div>
								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading2b">
							<h5 class="mb-0">
								<a href="#collapse2b" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse2b">
									Informe Afiliación Interanual
								</a>
							</h5>
						</div>

						<div id="collapse2b" class="collapse" role="tabpanel" aria-labelledby="heading2b">
							<div class="card-body">

								<div class='row align-items-center'>

									<div class='col'>

										<!--<label for="fechaInforme">Fecha del informe:</label>-->

										<input type="date" id="fechaInforme" name="fechaInforme" value="<?php echo date("Y-m-d");?>" min="2015-01-01" >
										<button type='button' id='botonFiltroFechaInforme' class='btn btn-primary'/>Filtrar por fecha</button>
										<!--<p style='font-size:12px'> Nota: Los informes siempre serán a final de mes anterior a la fecha indicada.</p>-->	
									</div>

					
								
								</div>

    							<div class="row" id="evolucionAfiliacion2">

										

								</div>

									

								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading6">
							<h5 class="mb-0">
								<a href="#collapse6" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse6">
									Ranking anual de Afiliación
								</a>
							</h5>
						</div>

						<div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6">
							<div class="card-body">
								
								<div style="width: 1000px;overflow-y: scroll;">
									
												<H3> RANKING ANUAL DE AFILIACION </H3>
												<table class='table table-bordered'>
														<thead class='thead-light '>
															<tr>
																
																<th style="width: 50px;">#</th>
																<th style="width: 295px;">Nombre</th>
																<th style="width: 195px;">Apellidos</th>
																<th style="width: 80px; text-align:center;">#</th>
							
																<th style="width: 60px;text-align:center;">En</th>
																<th style="width: 60px;text-align:center;">Fe</th>
																<th style="width: 60px;text-align:center;">Ma</th>
																<th style="width: 60px;text-align:center;">Ab</th>
																<th style="width: 60px;text-align:center;">My</th>
																<th style="width: 60px;text-align:center;">Ju</th>
																<th style="width: 60px;text-align:center;">Jl</th>
																<th style="width: 60px;text-align:center;">Ag</th>
																<th style="width: 60px;text-align:center;">Se</th>
																<th style="width: 60px;text-align:center;">Oc</th>
																<th style="width: 60px;text-align:center;">No</th>
																<th style="width: 60px;text-align:center;">Di</th>
																
																
															</tr>
														</thead>
												</table>
										
								</div>

								<div  id="rankingAnual" style="width: 1000px;height: 500px;overflow-y: scroll;">
									
								</div>
							</div>
						</div>
					</div>


					
				
					<div class="card">
						<div class="card-header" role="tab" id="heading2">
							<h5 class="mb-0">
								<a href="#collapse2" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse2">
									Evolucion Afiliación Ultimos Años
								</a>
							</h5>
						</div>

						<div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
							<div class="card-body">

								
    								<div class="row" id="evolucionAfiliacion">

										<iframe src="../../php/accion_sindical/evolucionAfiliacion.php" width="100%" height="420px" frameborder="0" scrolling="yes" class="row"></iframe>


									</div>

									

									

								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading2a1">
							<h5 class="mb-0">
								<a href="#collapse2a1" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse2a1">
									Evolucion Afiliación Año Actual
								</a>
							</h5>
						</div>

						<div id="collapse2a1" class="collapse" role="tabpanel" aria-labelledby="heading2a1">
							<div class="card-body">

								
    								

									<div class="row" id="evolucionAfiliacionAnoActual">

										<iframe src="../../php/accion_sindical/evolucionAfiliacionAnoActual.php" width="100%" height="420px" frameborder="0" scrolling="yes" class="row"></iframe>


									</div>

									

								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading2a2">
							<h5 class="mb-0">
								<a href="#collapse2a2" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse2a2">
									Evolucion Afiliación Año Anterior
								</a>
							</h5>
						</div>

						<div id="collapse2a2" class="collapse" role="tabpanel" aria-labelledby="heading2a2">
							<div class="card-body">

								
									<div class="row" id="evolucionAfiliacionAnoAnterior">

										<iframe src="../../php/accion_sindical/evolucionAfiliacionAnoAnterior.php" width="100%" height="420px" frameborder="0" scrolling="yes" class="row"></iframe>


									</div>

								
							</div>
						</div>
					</div>

		

					<div class="card">
						<div class="card-header" role="tab" id="heading3">
							<h5 class="mb-0">
								<a href="#collapse3" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse3">
									Afiliación por Edad y Genero
								</a>
							</h5>
						</div>

						<div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3">
							<div class="card-body">
								
									<div class="row" id="afiliacionEdadGenero">

										<iframe src="../../php/accion_sindical/afiliacionEdadGenero.php" width="100%" height="450px" frameborder="0" scrolling="yes" class="row"></iframe>

									</div>

							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading4">
							<h5 class="mb-0">
								<a href="#collapse4" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse4">
									Afiliación por Provincias
								</a>
							</h5>
						</div>

						<div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4">
							<div class="card-body">
								
									<div class="row" id="afiliacionProvincias">

										<iframe src="../../php/accion_sindical/afiliacionProvincias.php" width="100%" height="700px" frameborder="0" scrolling="yes" class="row"></iframe>

									</div>

							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" role="tab" id="heading1b">
							<h5 class="mb-0">
								<a href="#collapse1b" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse1b">
									Afiliados fuera de Censo
								</a>
							</h5>
						</div>

						<div id="collapse1b" class="collapse" role="tabpanel" aria-labelledby="heading1b">
							<div class="card-body">

								


								    <div class='row justify-content-center' id='finger'>
											<h3 style='color: #DC143C'>Afiliados fuera de Censo </h3>
									</div>

									<div class='row align-items-center'>

											<div class='col'>
							

						 						<!--<input type='text' name='filtroProvincia' id='filtroProvincia' placeholder='Provincia'/>-->

									 			<select name="localidadAfiliadosFueraCenso" id="localidadAfiliadosFueraCenso" class="form-control">
				                                    <option value='selecciona' disabled selected>Selecciona criterio de filtro</option>
				                                    
				                                    <option value='Todas' >Todos/as</option>
				                                    <option value='A Coruña' >A Coruña</option>
				                                    <option value='Álava'>Álava</option>
				                                    <option value='Albacete' >Albacete</option>
				                                    <option value='Alicante'>Alicante</option>
				                                    <option value='Almería' >Almería</option>
				                                    <option value='Asturias' >Asturias</option>
				                                    <option value='Avila' >Ávila</option>
				                                    <option value='Badajoz' >Badajoz</option>
				                                    <option value='Barcelona'>Barcelona</option>
				                                    <option value='Burgos' >Burgos</option>
				                                    <option value='Cáceres' >Cáceres</option>
				                                    <option value='Cádiz' >Cádiz</option>
				                                    <option value='Cantabria' >Cantabria</option>
				                                    <option value='Castellón' >Castellón</option>
				                                    <option value='Ceuta' >Ceuta</option>
				                                    <option value='Ciudad Real' >Ciudad Real</option>
				                                    <option value='Córdoba' >Córdoba</option>
				                                    <option value='Cuenca' >Cuenca</option>
				                                    <option value='Gerona' >Gerona</option>
				                                    <option value='Las Palmas' >Las Palmas</option>
				                                    <option value='Granada' >Granada</option>
				                                    <option value='Guadalajara' >Guadalajara</option>
				                                    <option value='Guipúzcoa' >Guipúzcoa</option>
				                                    <option value='Huelva' >Huelva</option>
				                                    <option value='Huesca' >Huesca</option>
				                                    <option value='Jaén' >Jaén</option>
				                                    <option value='La Rioja' >La Rioja</option>
				                                    <option value='León' >León</option>
				                                    <option value='Lerida' >Lerida</option>
				                                    <option value='Lugo' >Lugo</option>
				                                    <option value='Madrid' >Madrid</option>
				                                    <option value='Malaga' >Málaga</option>
				                                    <option value='Mallorca' >Mallorca</option>
				                                    <option value='Melilla' >Melilla</option>
				                                    <option value='Murcia' >Murcia</option>
				                                    <option value='Navarra' >Navarra</option>
				                                    <option value='Orense' >Orense</option>
				                                    <option value='Palencia' >Palencia</option>
				                                    <option value='Pontevedra'>Pontevedra</option>
													<option value='Salamanca'>Salamanca</option>
													<option value='Santa Cruz' >Santa Cruz Tenerife</option>
				                                    <option value='Segovia' >Segovia</option>
				                                    <option value='Sevilla' >Sevilla</option>
				                                    <option value='Soria' >Soria</option>
				                                    <option value='Tarragona' >Tarragona</option>
				                                    <option value='Teruel' >Teruel</option>
				                                    <option value='Toledo' >Toledo</option>
				                                    <option value='Valencia' >Valencia</option>
				                                    <option value='Valladolid' >Valladolid</option>
				                                    <option value='Vizcaya' >Vizcaya</option>
				                                    <option value='Zamora' >Zamora</option>
				                                    <option value='Zaragoza'>Zaragoza</option>
			                    				</select>
											</div>

											<div class='col'> 

															<button type='button' id='botonFiltroAFC' class='btn btn-primary'/>Filtrar</button>
														
														
											</div>
									</div>
									
								
								
								<div class="row " id="afiliadosFueraCenso">

								</div>
								
							</div>
						</div>
					</div>


					<div class="card">
						<div class="card-header" role="tab" id="heading1c">
							<h5 class="mb-0">
								<a href="#collapse1c" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse1c">
										Personal Externalizado
								</a>
							</h5>
						</div>

						<div id="collapse1c" class="collapse" role="tabpanel" aria-labelledby="heading1c">
							<div class="card-body">

									<div class="container">


								    <div class='row justify-content-center' id='finger'>
																		<h3 style='color: #DC143C'>Personal Externalizado </h3>
										</div>

										<div class='row align-items-center'>

											<div class='col'>
							

						 					<!--<input type='text' name='filtroProvincia' id='filtroProvincia' placeholder='Provincia'/>-->

									 				<select name="localidad" id="localidadPersonalExternalizado" class="form-control">
				                                    <option value='selecciona' disabled selected>Selecciona criterio de filtro</option>
				                                    
				                                    <option value='Todas' >Todos/as</option>
				                                    <option value='A Coruña' >A Coruña</option>
				                                    <option value='Álava'>Álava</option>
				                                    <option value='Albacete' >Albacete</option>
				                                    <option value='Alicante'>Alicante</option>
				                                    <option value='Almería' >Almería</option>
				                                    <option value='Asturias' >Asturias</option>
				                                    <option value='Avila' >Ávila</option>
				                                    <option value='Badajoz' >Badajoz</option>
				                                    <option value='Barcelona'>Barcelona</option>
				                                    <option value='Burgos' >Burgos</option>
				                                    <option value='Cáceres' >Cáceres</option>
				                                    <option value='Cádiz' >Cádiz</option>
				                                    <option value='Cantabria' >Cantabria</option>
				                                    <option value='Castellón' >Castellón</option>
				                                    <option value='Ceuta' >Ceuta</option>
				                                    <option value='Ciudad Real' >Ciudad Real</option>
				                                    <option value='Córdoba' >Córdoba</option>
				                                    <option value='Cuenca' >Cuenca</option>
				                                    <option value='Gerona' >Gerona</option>
				                                    <option value='Las Palmas' >Las Palmas</option>
				                                    <option value='Granada' >Granada</option>
				                                    <option value='Guadalajara' >Guadalajara</option>
				                                    <option value='Guipúzcoa' >Guipúzcoa</option>
				                                    <option value='Huelva' >Huelva</option>
				                                    <option value='Huesca' >Huesca</option>
				                                    <option value='Jaén' >Jaén</option>
				                                    <option value='La Rioja' >La Rioja</option>
				                                    <option value='León' >León</option>
				                                    <option value='Lerida' >Lerida</option>
				                                    <option value='Lugo' >Lugo</option>
				                                    <option value='Madrid' >Madrid</option>
				                                    <option value='Malaga' >Málaga</option>
				                                    <option value='Mallorca' >Mallorca</option>
				                                    <option value='Melilla' >Melilla</option>
				                                    <option value='Murcia' >Murcia</option>
				                                    <option value='Navarra' >Navarra</option>
				                                    <option value='Orense' >Orense</option>
				                                    <option value='Palencia' >Palencia</option>
				                                    <option value='Pontevedra'>Pontevedra</option>
													<option value='Salamanca'>Salamanca</option>
													<option value='Santa Cruz' >Santa Cruz Tenerife</option>
				                                    <option value='Segovia' >Segovia</option>
				                                    <option value='Sevilla' >Sevilla</option>
				                                    <option value='Soria' >Soria</option>
				                                    <option value='Tarragona' >Tarragona</option>
				                                    <option value='Teruel' >Teruel</option>
				                                    <option value='Toledo' >Toledo</option>
				                                    <option value='Valencia' >Valencia</option>
				                                    <option value='Valladolid' >Valladolid</option>
				                                    <option value='Vizcaya' >Vizcaya</option>
				                                    <option value='Zamora' >Zamora</option>
				                                    <option value='Zaragoza'>Zaragoza</option>
			                    </select>
											</div>

											<div class='col'> 

															<button type='button' id='botonFiltroPE' class='btn btn-primary'/>Filtrar</button>
														
														
											</div>
										</div>
									</div>
								</div>

							

								<div class="row " id="empleadosExternalizados">

								</div>
								
							</div>
						</div>
					</div>

	<!--
					<div class="card">
						<div class="card-header" role="tab" id="heading5">
							<h5 class="mb-0">
								<a href="#collapse5" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse5">
									Gestión de afiliados
								</a>
							</h5>
						</div>

						<div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5">
							<div class="card-body">
								
							
								

								<button type="button" id="altaDeAfiliado" class="btn btn-info" />Alta Afiliado/a</button> 
								
								
								<button type="button" id="bajaDeAfiliado" class="btn btn-info" onclick="" />Baja Afiliado/a</button>
								 
								<div id="datosParaAltaDeAfiliado"  > 
									<div class="row">	
										<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoAlta">
										<button type="button" class="btn btn-success" id="enviarDatosAltaAfiliado" >Alta</button>
									</div>
								</div>

								<div id="datosParaModificacionDeAfiliado"  > 
									<div class="row">	
										<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoModifica">
										<button type="button" class="btn btn-warning" id="enviarDatosModificacionAfiliado" >Consultar/Modificar</button>
									</div>
								</div>
								

								<div id="datosParaBajaDeAfiliado"  > 
										
										<div class="row">
												<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoBaja">
												<input type="date" class="form-control col-3" placeholder="Introduce fecha de baja" id ='fechaBaja'>
												
												<input id ="situacionBaja" list="situaciones" name="situacionBaja" placeholder="Situación" class="form-control col-6">

													<datalist id="situaciones" title="Escoge sugerencia...">

														<option value="ERE 2012">
														<option value="ERE 2015">
														<option value="Excedencia Voluntaria Anual Compensada">
														<option value="Agente Financiero">
														<option value="Otro tipo de Excedencias">
														<option value="Otros">
														<option value="Otros" disabled>

													</datalist>
										
										</div>

										<div class="row">
												

													<input type="text" class="form-control col-9" placeholder="Observaciones" id="observacionesBaja">
										
												<button type="button" class="btn btn-danger col-2" id="enviarDatosBajaAfiliado" >Baja Afiliación</button>
										</div>
									
								</div>

							</div>

							
						</div>
					</div>

					
		-->

				</div>
			</div>
		</div>
	</div>

	</body>
	
	<script src="../js/polyfill/datalist-polyfill.min.js"></script>
</html>