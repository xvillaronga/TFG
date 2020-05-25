$(document).ready(function(){

	/*******OCULTAR RESTO DE PANELES*******/	
	$("#cmTerritorio").click(function(){
		 $("#buscarEmpleado").hide();
         $("#buscarOficina").hide(); 
         $("#resultadoEmpleado").hide();
         $("#resultadoOficina").hide();
         $("#resultadoAccionSindical").hide();
         $("#resultadoOrganizacion").hide();
         $("#resultadoComunicacion").hide();
         $("#resultadoCuadrosAnaliticos").hide();
         $("#notaGastos").hide();
         $("#gestionesVarias").hide();
         
    /********************************************/
    	$("#resultadoCMTerritorio").slideDown(1000);
      });	


    $.post("../../php/territorio/afiliadosPorCoordinador.php",function(res){
                   
            $("#afiliadosPorCoordinador").html(res);

            
    });

    $.post("../php/territorio/oficinasPorCoordinador.php",function(res){
                   
            $("#oficinasPorCoordinador").html(res);

            
    });

     $.post("../../php/territorio/censoPorFiguras.php",function(res){
                   
            $("#censoPorFiguras").html(res);

            
    });

    /**********ORDENACION DEL CENSO*****/

  $("#botonOrdenaCenso").click(function(){ 

        $(".loader").delay(1000).show(); 

        $(".loader").fadeOut("slow");

        var sitio= $("#ordenaCenso").val().toUpperCase();

        
               $.post("../../php/territorio/tuCenso.php",{lugar: sitio},function(res){
                      
                   $("#tuCenso").html(res);

               });

          
 }); 

 /********** FIN ORDENACION DEL CENSO*****/

    $.post("../../php/territorio/tuCenso.php",function(res){
                   
            $("#tuCenso").html(res);

            
    });


 /**********ORDENACION AFILAIDOS*****/
        $("#botonOrdenaAfiliados").click(function(){ 

                $(".loader").delay(1000).show(); 

                $(".loader").fadeOut("slow");

                var sitio= $("#ordenaAfiliados").val().toUpperCase();

                
                $.post("../../php/territorio/tusAfiliados.php",{lugar: sitio},function(res){
                        
                        $("#tusAfiliados").html(res);

                });

                
        }); 


         /********** FIN ORDENACION AFILIADOS*****/

    $.post("../../php/territorio/tusAfiliados.php",function(res){
                   
            $("#tusAfiliados").html(res);

            
    });



    $.post("../../php/territorio/tusOficinas.php",function(res){
                   
            $("#tusOficinas").html(res);

            
    });

    $.post("../../php/territorio/tusBajas.php",function(res){
                   
            $("#tusBajas").html(res);

            
    });

     $.post("../../php/territorio/tusZonasSombras.php",function(res){
                   
            $("#tusZonasSombras").html(res);

            
    });

   

  	
});