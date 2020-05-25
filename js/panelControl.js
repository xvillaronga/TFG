$(document).ready(function(){

    $(".loader").hide();



	/*******INICIALIZACION PANELES OCULTOS*******/	

		 $("#buscarEmpleado").hide();
         $("#buscarOficina").hide(); 
         $("#resultadoEmpleado").hide();
         
         $("#resultadoOficina").hide();
         $("#resultadoCMTerritorio").hide();
         $("#resultadoAccionSindical").hide();
         $("#resultadoOrganizacion").hide();
         $("#resultadoComunicacion").hide();
         $("#resultadoCuadrosAnaliticos").hide();
         $("#notaGastos").hide();
         $("#gestionesVarias").hide();

    /********************************************/

    /********************SALUDO USUARIO*************/
			
		var valor = localStorage.getItem('usuarioTFG');

		
		$.post("../php/buscarNombreUsuario.php",{usuario: valor},function(res){
                   
          	$("#saludoUsuario").text("Hola "+res+". Bienvenido/a.");

             

            

            /********efecto procesando******************
            $(".loader").delay(3000).show(); 

            $(".loader").fadeOut("slow");
            *********fin efecto procesando*****************/

          	
		});	

        /*******************************************/

                    let timerInterval
                            swal({
                              title: 'Cargando configuración.',
                              //html: 'Tiempo restante: <strong></strong> segundos.',
                              html: 'Estamos configurando tu perfil de usuario.',
                              timer: 12500,
                              onOpen: () => {
                                swal.showLoading()
                                timerInterval = setInterval(() => {
                                  swal.getContent().querySelector('strong')
                                    .textContent = swal.getTimerLeft()
                                }, 10)
                              },
                              onClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.timer
                              ) {
                                //console.log('I was closed by the timer')
                              }
                            });





            /*******************************************/

	/***********************************************/

   

	

	
});	