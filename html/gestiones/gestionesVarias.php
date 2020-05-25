<html>

		<head>
				 	<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<link rel="stylesheet" href="../../css/bootstrap.min.css">
					<script src="../../js/jquery/jquery-3.3.1.min.js"></script>
					<script src="../../js/bootstrap/popper.min.js"></script>
					<script src="../../js/bootstrap/bootstrap.min.js"></script>
					<script type="text/javascript" src="../../js/ChartJS/Chart.min.js"></script>
						
                    <script type="text/javascript" src="../../js/gestionesVarias.js"></script>
                    
					<link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
		</head>



		<body>

				<?php

						include("../../php/conexion.php");

					

						

				?>

			<div class="container">
		
				<div class="row justify-content-center" id="finger">
						<h1 style="color: #DC143C">Gestiones Varias </h1>
				</div>

				

				<div class="row mt-3">
					<div class="col">
						<div id="acordion" role="tablist" aria-multiselectable="true">

                        <div class="card">
						<div class="card-header" role="tab" id="heading5">
							<h5 class="mb-0">
								<a href="#collapse5" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse5">
									Gestión de Afiliados/as
								</a>
							</h5>
						</div>

						<div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5">
							<div class="card-body">
								
							
								

								<button type="button" id="altaDeAfiliado" class="btn btn-info" />Alta Afiliación</button> 
								
								<button type="button" id="modificacionDeAfiliado" class="btn btn-info" />Consulta/Modificación Afiliación</button> 

								<button type="button" id="bajaDeAfiliado" class="btn btn-info" onclick="" />Baja Afiliación</button>
								 
								<div id="datosParaAltaDeAfiliado"  > 
									<div class="row">	
										<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoAlta">
										<button type="button" class="btn btn-success" id="enviarDatosAltaAfiliado" >Alta Afiliado/a</button>
									</div>
								</div>

								<div id="datosParaModificacionDeAfiliado"  > 
									<div class="row">	
										<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoModificar">
										<button type="button" class="btn btn-warning" id="enviarDatosModificacionAfiliado" >Consultar/Modificar Afiliado/a</button>
									</div>
								</div>
								

								<div id="datosParaBajaDeAfiliado"  > 
										
										<div class="row">
												<input type="text" class="form-control col-3" placeholder="Introduce NIF" id="NIFAfiliadoBaja">
												<input type="date" class="form-control col-3" placeholder="Introduce fecha de baja" id ='fechaBaja'>
												<!-- <input type="text" class="form-control col-3" placeholder="Introduce situación"> -->
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
										
												<button type="button" class="btn btn-danger col-2" id="enviarDatosBajaAfiliado" >Baja Afiliado/a</button>
										</div>
									
								</div>

							</div>

							
						</div>
					</div>
                       
                    <div class="card">
						<div class="card-header" role="tab" id="heading2">
							<h5 class="mb-0">
								<a href="#collapse2" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse2">
									Gestión del Crédito Horario
								</a>
							</h5>
						</div>

						<div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
							<div class="card-body">

									<div class="container">


											
	
										<div class='row align-items-center'>
											<div class='col'>
								
	
										
	
													  <select name="localidad" id="localidadDelegadosCreditoHorario" class="form-control">
														<option value='selecciona' disabled selected>Selecciona que provincia quieres</option>
														
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
														<option value='Baleares'>Baleares</option>
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
														<option value='Lleida' >Lleida</option>
														<option value='Lugo' >Lugo</option>
														<option value='Madrid' >Madrid</option>
														<option value='Malaga' >Málaga</option>
														<option value='Melilla' >Melilla</option>
														<option value='Murcia' >Murcia</option>
														<option value='Navarra' >Navarra</option>
														<option value='Orense' >Orense</option>
														<option value='Palencia' >Palencia</option>
														<option value='Pontevedra'>Pontevedra</option>
														<option value='Salamanca'>Salamanca</option>
														<option value='Segovia' >Segovia</option>
														<option value='Sevilla' >Sevilla</option>
														<option value='Soria' >Soria</option>
														<option value='Tarragona' >Tarragona</option>
														<option value='Santa Cruz de Tenerife' >Tenerife</option>
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
	
														 <button type='button' id='botonFiltroProvinciaCreditoHorario' class='btn btn-primary'/>Filtrar</button>
	
														 
													
											</div>
										</div>
									</div>



								<div class="row " id="creditoHorario">

								</div>
								
							</div>
                        </div>
						
						<div class="card">
                            <div class="card-header" role="tab" id="heading6">
                                <h5 class="mb-0">
                                    <a href="#collapse6" data-toggle="collapse" data-parent="#acordion" aria-expanded="true" aria-controls="collapse6">
                                        Nota de Gastos
                                    </a>
                                </h5>
                            </div>

							<div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6">
                                <div class="card-body">
                                    
                                  

                                </div>
                            </div>
                          
                        </div>

                   

	
					</div>
					</div>

							

				</div>





			</div>	
			


		</body>




</html>