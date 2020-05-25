$(document).ready(function(){	

		var idEmpleado;

		

		
			

			

			/*******OCULTAR RESTO DE PANELES*******/	
			
			

        	$("#altaDatosVisitaEmpleado").hide();
        	$("#formularioAltaVisita").hide();
			$("#consultaDatosVisitaEmpleado").hide();
			

			

    		/********************************************/


     

         /************* BUSQUEDA EMPLEADO **************/

         $("#busquedaEmpleado").click(function(){

         	/********efecto procesando******************/
         	$(".loader").delay(1000).show(); 

         	$(".loader").fadeOut("slow");
         	/*********fin efecto procesando*****************/

         	if ($('#service').val()!=""){

         		$("#resultadoEmpleado").slideDown(1000);

         		

				if (idEmpleado!=null){

					$.post("../php/volcarDatosEmpleado.php",{usuario: idEmpleado},function(res){
		              
		           
				               $("#resultadoEmpleado").html(res); 

				               /************IMPRIMIR BOLETIN AFILIACION**********/

							$("#imprimirBA").click(function(){
										
				               			
									
		           
								window.open("../php/boletinAfiliacionRelleno.php?var="+idEmpleado, '_blank');			
										

						  

						  	});

				               	/************ FIN IMPRIMIR BOLETIN AFILIACION**********/

				               	/************ALTA VISITA EMPLEADO**********/

				               	$("#altaDatosVisitaEmpleado").hide();

				               	$("#altaVisitaEmpleado").click(function(){

				               		$("#altaDatosVisitaEmpleado").toggle();
				               		

				               	});	

				               	$("#grabarVisitaEmpleado").click(function(){

				               		var numEmp= $("#numeroEmpleadoVisita").html();
				               		var fech= $("#fechaVisita").val();
				               		var ges1=$("#gestor1").val();
				               		var ges2=$("#gestor2").val();
				               		var coment=$("#comentariosVisita").val();
				               		
				               		if((fech=='')||(ges1=='')){

				               			//alert("FALTAN CAMPOS POR RELLENAR");

				               			swal({
				                                 title: 'FALTAN CAMPOS POR RELLENAR',
				                                                         
				                                  type: 'warning',
				                                                          
				                                  confirmButtonColor: '#3085d6',
				                                                          
				                                  position: 'top',

				                        }); 
				               		}
				               		else{
				               			$.post("../php/grabarVisitaEmpleado.php",{numeroEmpleadoVisita: numEmp, fecha: fech, gestor1: ges1, gestor2: ges2, comentarios: coment},function(res){

				               				//alert(res);

				               				swal({
				                                 title: res,
				                                                         
				                                  type: 'success',
				                                                          
				                                  confirmButtonColor: '#3085d6',
				                                                          
				                                  position: 'top',

				                        	});

				                        	$("#altaDatosVisitaEmpleado").toggle();
				               			});

				               		};
				               		
				               		
									
				               	});	


				               	/************FIN ALTA VISITA EMEPLADO**********/

				               		/************CONSULTA VISITA EMPLEADO**********/

				               	$("#consultaDatosVisitaEmpleado").hide();

				               	$("#consultaVisitaEmpleado").click(function(){

				               		
				               		$("#consultaDatosVisitaEmpleado").toggle();

				               	});	

				               	$(".botonEliminarVisita").click(function(){
               							var posicion= $(this).attr("id");
               							
               							//var r = confirm("VAS A ELIMINAR LA VISITA Nº "+posicion+".\n\n¿ESTAS SEGURO/A?");


               							const swalWithBootstrapButtons = swal.mixin({
			                                    confirmButtonClass: 'btn btn-success btn-lg',
			                                    cancelButtonClass: 'btn btn-danger btn-lg',
			                                    buttonsStyling: false,
			                                  })

			                                  swalWithBootstrapButtons({
			                                    title: 'VAS A ELIMINAR LA VISITA Nº '+posicion,
			                                    text: "¿ESTAS SEGURO/A?",
			                                    type: 'question',
			                                    position: 'top',
			                                    showCancelButton: true,
			                                    confirmButtonText: '  Si  ',
			                                    cancelButtonText: '  No  ',
			                                    reverseButtons: false
			                                  }).then((result) => {
			                                    if (result.value) {

				                                      var numTd=$("td").length;

													for(var n=0;n<numTd;n++){
											
														if (($("td").eq(n).text())==posicion){

															$("td").eq(n).parent().empty();			

															break;
														}

												}
													
												$.post("../php/eliminarVisitaEmpleado.php", {posi: posicion},function(res){
													//alert(res);

													swal({
						                                 title: res,
						                                                         
						                                  type: 'success',
						                                                          
						                                  confirmButtonColor: '#3085d6',
						                                                          
						                                  position: 'top',

						                        	});
												});	    





			                                      
			                                    } else if (
			                                      // Read more about handling dismissals
			                                      result.dismiss === swal.DismissReason.cancel
			                                    ) {

					                                     	 swal({
						                                 title: 'ELIMINACION CANCELADA',
						                                                         
						                                  type: 'error',
						                                                          
						                                  confirmButtonColor: '#3085d6',
						                                                          
						                                  position: 'top',

						                        		});

			                                    }
			                            })



               					});	
				               	/************FIN CONSULTA VISITA EMEPLADO**********/
				               
				   
		            });




		         

					

				}
         	}



			
		});

        /******** FIN BUSQUEDA EMPLEADO*********************/

/**************************************************************************************************************************/


		/******CLICK BUSCAR OFICINA***********/

		$("#menuBuscarOficina").click(function(){

			$("#service2").val("");
			$("#suggestionsOficina").html("");

			

			/*******OCULTAR RESTO DE PANELES*******/	
			
			$("#resultadoCMTerritorio").hide();
			$("#resultadoAccionSindical").hide();
			$("#resultadoOrganizacion").hide();
			$("#resultadoCuadrosAnaliticos").hide();
         	$("#buscarEmpleado").hide(); 
         	$("#resultadoEmpleado").hide();
        	$("#resultadoOficina").hide();
        	$("#notaGastos").hide();
    		/********************************************/

			

			$("#buscarOficina").slideDown(1000);

			
		});

		$( "#service2" ).focus(function() {
  			$("#service2").val("");

  			$("#suggestionsOficina").html("");
		});

		
		/*****FIN CLICK BUSCAR OFICINA******/

/*****************AUTOCOMPLETA OFICINA**************************************/

		$('#service2').on('input',function(){

		

			var service2 = $(this).val();		

			var dataString = 'service2='+service2;

				
			$.ajax({

	            type: "POST",

	            url: "../php/autocompletaOficina.php",

	            data: dataString,

	            success: function(data) {

					//Escribimos las sugerencias que nos manda la consulta

					$('#suggestionsOficina').fadeIn(1000).html(data);

					//Al hacer click en alguna de las sugerencias

					$('.suggest-element').on('click', function(){

						
						idOficina = $(this).attr('id');

						var NumeroOficinaNombre = $(this).children('a').attr('id');

						$('#service2').val(NumeroOficinaNombre);

						//Hacemos desaparecer el resto de sugerencias

						$('#suggestionsOficina').fadeOut(1000);
						
						
						return false;

					});              

	            }

	        });

         });     

         /******** FIN AUTOCOMPLETA OFICINA*********************/ 

         /************* BUSQUEDA OFICINA **************/

         $("#busquedaOficina").click(function(){

         	/********efecto procesando******************/
         	$(".loader").delay(1000).show(); 

         	$(".loader").fadeOut("slow");
         	/********* fin efecto procesando*****************/

         	if ($('#service2').val()!=""){

         		$("#resultadoOficina").slideDown(1000);

				if (idOficina!=null){

					$.post("../php/volcarDatosOficina.php",{ofi: idOficina},function(res){
		               
		               $("#resultadoOficina").html(res); 

		               $(".empleadoClicable").click(function(){

		               		var identificacioEmpleat=$(this).attr('id');

		               		//alert(identificacioEmpleat);

		               		//window.open('../php/volcarDatosEmpleado.php?id='+identificacioEmpleat);

		               		$.post("../php/volcarDatosEmpleadoExtra.php",{usuario: identificacioEmpleat}, function (data) {
							    var w = window.open("_blank");
							    //w.document.open();
							    w.document.write(data);
							    //w.document.getElementById('paginaExtraEmpleado').innerHTML="<p>MANOLO</p>";
							    //w.document.close();

							    //$("#paginaExtraEmpleado").html(data); 
							});

		               		
		               });	

		               			/************ALTA VISITA OFICINA**********/

				               	$("#altaDatosVisitaOficina").hide();

				               	$("#altaVisitaOficina").click(function(){

				               		$("#altaDatosVisitaOficina").toggle();
				               		

				               	});	

				               	$("#grabarVisitaOficina").click(function(){

				               		var numOf= $("#numeroOficinaVisita").text();
				               		var fech= $("#fechaVisitaOficina").val();
				               		var ges1Of=$("#gestor1Of").val();
				               		var ges2Of=$("#gestor2Of").val();

				               		var pueAc= $("#puertaAcceso").val();
				               		var extin=$("#extintores").val();
				               		var estante=$("#estanteriasArchivo").val();

				               		var fluore= $("#fluorescentes").val();
				               		var aireAcon=$("#aireAcondicionado").val();
				               		var barra=$("#barraAntideslizante").val();


				               		var armarioLim=$("#armarioLimpieza").val();
				               		var altres=$("#otros").val();


				               		var coment=$("#comentariosVisitaOficina").val();
				               		
				               		if((fech=='')||(ges1Of=='')){

				               			//alert("FALTAN CAMPOS POR RELLENAR");

				               			swal({
				                                 title: 'FALTAN CAMPOS POR RELLENAR',
				                                                         
				                                  type: 'warning',
				                                                          
				                                  confirmButtonColor: '#3085d6',
				                                                          
				                                  position: 'top',

				                        });
				               		}
				               		else{
				               			$.post("../php/grabarVisitaOficina.php",{numeroOficinaVisita: numOf, fecha: fech, gestor1Of: ges1Of, gestor2Of: ges2Of, puertaAcceso: pueAc, extintores: extin, estanteriasArchivo: estante, fluorescentes: fluore, aireAcondicionado: aireAcon, barraAntideslizante: barra, armarioLimpieza: armarioLim, otros: altres, comentarios: coment},function(res){

				               				//alert(res);
				               				
				               				swal({
				                                 title: res,
				                                                         
				                                  type: 'success',
				                                                          
				                                  confirmButtonColor: '#3085d6',
				                                                          
				                                  position: 'top',

				                       		});
											
											$("#altaDatosVisitaOficina").toggle();

				               			});

				               		};
				               		
				               		
									
				               	});


				               	/************FIN ALTA VISITA OFICINA**********/

				               	/************CONSULTA VISITA OFICINA**********/

				               	$("#consultaDatosVisitaOficina").hide();

				               	$("#consultaVisitaOficina").click(function(){

				               		
				               		$("#consultaDatosVisitaOficina").toggle();

				               	});	

				               	$(".botonEliminarVisitaOficina").click(function(){
               							var posicion= $(this).attr("id");

               							const swalWithBootstrapButtons = swal.mixin({
			                                    confirmButtonClass: 'btn btn-success btn-lg',
			                                    cancelButtonClass: 'btn btn-danger btn-lg',
			                                    buttonsStyling: false,
			                                  })

			                                  swalWithBootstrapButtons({
			                                    title: 'VAS A ELIMINAR LA VISITA Nº '+posicion,
			                                    text: "¿ESTAS SEGURO/A?",
			                                    type: 'question',
			                                    position: 'top',
			                                    showCancelButton: true,
			                                    confirmButtonText: '  Si  ',
			                                    cancelButtonText: '  No  ',
			                                    reverseButtons: false
			                                  }).then((result) => {
			                                    if (result.value) {

					                                var numTd=$("td").length;

													for(var n=0;n<numTd;n++){
											
														if (($("td").eq(n).text())==posicion){

															$("td").eq(n).parent().empty();			

															break;
														}

													}
														
													$.post("../php/eliminarVisitaOficina.php", {posi: posicion},function(res){
														//alert(res);

														swal({
								                                 title: res,
								                                                         
								                                  type: 'success',
								                                                          
								                                  confirmButtonColor: '#3085d6',
								                                                          
								                                  position: 'top',

								                        });
													});	 

			                                      
			                                    } else if (
			                                      // Read more about handling dismissals
			                                      result.dismiss === swal.DismissReason.cancel
			                                    ) {

					                                     	 swal({
						                                 title: 'ELIMINACION CANCELADA',
						                                                         
						                                  type: 'error',
						                                                          
						                                  confirmButtonColor: '#3085d6',
						                                                          
						                                  position: 'top',

						                        		});

			                                    }
			                            })












               							/*
               							
               							var r = confirm("VAS A ELIMINAR LA VISITA Nº "+posicion+".\n\n¿ESTAS SEGURO/A?");
											if (r == true) {
											    var numTd=$("td").length;

												for(var n=0;n<numTd;n++){
										
													if (($("td").eq(n).text())==posicion){

														$("td").eq(n).parent().empty();			

														break;
													}

												}
													
												$.post("../php/eliminarVisitaOficina.php", {posi: posicion},function(res){
													//alert(res);

													swal({
							                                 title: res,
							                                                         
							                                  type: 'warning',
							                                                          
							                                  confirmButtonColor: '#3085d6',
							                                                          
							                                  position: 'top',

							                        });
												});	
											} else {
											    //alert("ELIMINACION CANCELADA");

											    swal({
				                                 title: 'ELIMINACION CANCELADA',
				                                                         
				                                  type: 'warning',
				                                                          
				                                  confirmButtonColor: '#3085d6',
				                                                          
				                                  position: 'top',

				                        		});
											} 
               							
										*/

               					});	


				               	/************FIN CONSULTA VISITA OFICINA**********/
		            });
				}
         	}
			
			
		});

        /******** FIN BUSQUEDA OFICINA*********************/

});