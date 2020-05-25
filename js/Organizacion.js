$(document).ready(function(){

 

  //$(".loader").hide();

		
	$("#Organizacion").click(function(){
  /*******OCULTAR RESTO DE PANELES*******/
		     $("#buscarEmpleado").hide();
         $("#buscarOficina").hide(); 
         $("#resultadoEmpleado").hide();
         $("#resultadoOficina").hide();
         $("#notaGastos").hide();
         $("#gestionesVarias").hide();
         $("#resultadoCMTerritorio").hide();
         $("#resultadoAccionSindical").hide();
         $("#tablaAfiliacion").hide();
         $("#resultadoComunicacion").hide();
         $("#resultadoCuadrosAnaliticos").hide();
  /********************************************/
         $("#resultadoOrganizacion").slideDown(1000);

         //$("#resorteTablaAfiliacion").slideDown(1000);

  
    	
  });	

    $.post("../../php/organizacion/estructuraSindicalProvincias.php",function(res){
                     
              $("#estructuraSindicalProvincias").html(res);

              
    }); 



  $.post("../../php/organizacion/delegadosProvincias.php",function(res){
                   
            $("#delegadosProvincias").html(res);

            
  }); 

  /*

  $("#botonFiltroProvinciaCreditoHorario").click(function(){ 

    $(".loader").delay(1000).show(); 

    $(".loader").fadeOut("slow");

    var sitio= $("#localidadDelegadosCreditoHorario").val().toUpperCase();

    
          $.post("../php/creditoHorario.php",{lugar: sitio},function(res){
                  
               $("#creditoHorario").html(res);

               $(".modificarHoras").click(function(){
                var posicion= $(this).attr("id");
                var cantidad= $(this).prev().val();

              if (cantidad){

                var r = confirm("VAS A MODIFICAR LAS HORAS DEL DELEGADO CON NIF: "+posicion+"\n\n¿ESTAS SEGURO/A?");
                if (r == true) {
                          $.post("../php/modificarHorasDelegado.php", {posi: posicion, canti: cantidad},function(res){

                                                      

                                    var a= res;

                                    alert (a);
                                    location.reload();
                                  

                          });
                } else {
                                       alert ("MODIFICACION CANCELADA") ;  
                                       location.reload();                 
                }

              
         
                
              }

              else{
            
                alert ( "NO ESTAS MNODIFICANDO NADA");

            
                }     

            }); 

          });

      
    });   




  */ 
            
 

/**********LISTADO DELEGADOS FILTRO*****/

  $("#botonFiltroDelegados").click(function(){ 

         $(".loader").delay(1000).show(); 

         $(".loader").fadeOut("slow");

         var sitio= $("#localidadDelegados").val().toUpperCase();

         
                $.post("../../php/organizacion/delegadosFiltrados.php",{lugar: sitio},function(res){
                       
                    $("#listadoDelegados").html(res);

                });

           
  }); 

  /********** FIN LISTADO DELEGADOS FILTRO*****/



  	
});