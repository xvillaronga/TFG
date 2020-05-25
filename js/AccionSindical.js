$(document).ready(function(){

     $("#datosParaAltaDeAfiliado").hide();
     $("#datosParaModificacionDeAfiliado").hide();
     $("#datosParaBajaDeAfiliado").hide();

		
	$("#AccionSindical").click(function(){
  /*******OCULTAR RESTO DE PANELES*******/
	     $("#buscarEmpleado").hide();
          $("#buscarOficina").hide(); 
          $("#resultadoEmpleado").hide();
          $("#resultadoOficina").hide();
          $("#notaGastos").hide();
          $("#gestionesVarias").hide();
          $("#resultadoCMTerritorio").hide();
          $("#resultadoOrganizacion").hide();
          $("#resultadoComunicacion").hide();
          $("#tablaAfiliacion").hide();
          $("#resultadoCuadrosAnaliticos").hide();
  /********************************************/
          $("#resultadoAccionSindical").slideDown(1000);

         //$("#resorteTablaAfiliacion").slideDown(1000);

         
    	
     });	

   

     $.post("../../php/accion_sindical/tablaAfiliacion.php",function(res){
                    
               $("#tablaAfiliacion").html(res);

               
     });

    


     /*******************AFILAICION INTERANUAL******* */

     $("#botonFiltroFechaInforme").click(function(){

          $(".loader").delay(1000).show(); 

          $(".loader").fadeOut("slow");
          
          var fecha= $("#fechaInforme").val();

          $.post("../../php/accion_sindical/evolucionAfiliacion2.php",{data: fecha},function(res){
                    
               $("#evolucionAfiliacion2").html(res);

               
          });

     });

     


      /***************FIN  AFILIACION INTERANUAL******* */

      
     /**************RANKING AFILIACION********* */

     $.post("../../php/accion_sindical/rankingAnual.php",function(res){
                    
          $("#rankingAnual").html(res);

          
     });

 /************** FIN RANKING AFILIACION********* */

      
          /**********LISTADO AFILIADOS FUERA CENSO*****/

     $("#botonFiltroAFC").click(function(){ 

          $(".loader").delay(1000).show(); 

          $(".loader").fadeOut("slow");

          var sitio= $("#localidadAfiliadosFueraCenso").val().toUpperCase();

          
               $.post("../../php/accion_sindical/afiliadosFueraCenso.php",{lugar: sitio},function(res){
                    
                    $("#afiliadosFueraCenso").html(res);

               });
          
        // alert(sitio);
          
     }); 

     /********** FIN LISTADO AFILIADOS FUERA CENSO*****/

      /**********LISTADO PERSONAL EXTERNALIZADO*****/

      $("#botonFiltroPE").click(function(){ 

          $(".loader").delay(1000).show(); 

          $(".loader").fadeOut("slow");

          var sitio= $("#localidadPersonalExternalizado").val().toUpperCase();

          
               $.post("../../php/accion_sindical/personalExternalizado.php",{lugar: sitio},function(res){
                    
                    $("#empleadosExternalizados").html(res);

               });
          
        // alert(sitio);
          
     }); 

     /********** FIN LISTADO PERSONAL EXTERNALIZADO*****/


  	
});