$(document).ready(function(){


    $("#datosParaAltaDeAfiliado").hide();
    $("#datosParaModificacionDeAfiliado").hide();
    $("#datosParaBajaDeAfiliado").hide();

		
	$("#menuGestionesVarias").click(function(){

          /*******OCULTAR RESTO DE PANELES*******/
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

          /********************************************/
    	     $("#gestionesVarias").slideDown(1000);

     
  	});	

       /*****GESTION DE AFILIADOS */

     $("#altaDeAfiliado").click(function(){

        $("#datosParaAltaDeAfiliado").toggle("slow");
        $("#datosParaBajaDeAfiliado").hide("slow");
        $("#datosParaModificacionDeAfiliado").hide("slow");

   });

   $("#enviarDatosAltaAfiliado").click(function(){

        $( "#NIFAfiliadoAlta" ).focus(function() {
             $("#NIFAfiliadoAlta").val("");
             
        });

        var NIFAfiliadoAlta = $("#NIFAfiliadoAlta").val().toUpperCase();

        $.post("../../php/gestiones/quienes.php",{nif: NIFAfiliadoAlta},function(res){

                  var quienes= res;
           
        

                  var r = confirm("Vas a dar de ALTA a: "+quienes+" ¿Estás conforme?");
                       if (r == true) {

                            $.post("../../php/gestiones/preAltaAfiliado.php",{nif: NIFAfiliadoAlta},function(res){
                            
                                 if (res==1){
                                 // alert("EN CONSTRUCCION ALTA");
                                      //alert ("AHORA EN UN RATICO LA DOY DE ALTA");
                                      window.open('../../php/gestiones/altaAfiliado.php?usuario='+NIFAfiliadoAlta);
                                 }
                                 else{
                                      if (res==2){

                                           var s = confirm("ESTA PERSONA FUE AFILIADA EN EL PASADO Y SE DIO DE BAJA. ¿QUIERES RECUPERAR A: "+NIFAfiliadoAlta+" ?");
                                           
                                           if (s == true) {

                                                window.open('../../php/gestiones/recuperarAfiliado.php?usuario='+NIFAfiliadoAlta);

                                           }
                                           else{
                                                alert("CANCELADA LA RECUPERACION de: "+quienes);

                                           }

                                      }
                                      else{

                                           alert(res);
                                      }
                                      
                                 }
                                 
                            
                  
                                 
                            });
                       } else {
                            alert("CANCELADA LA ALTA de: "+quienes);
                       }

        }); 

       

   });





   $("#modificacionDeAfiliado").click(function(){

        $("#datosParaModificacionDeAfiliado").toggle("slow");
        $("#datosParaAltaDeAfiliado").hide("slow");
        $("#datosParaBajaDeAfiliado").hide("slow");

   });

   $("#enviarDatosModificacionAfiliado").click(function(){

          $( "#NIFAfiliadoModificar" ).focus(function() {
               $("#NIFAfiliadoModificar").val("");
          
          });

        var NIFAfiliadoModificar = $("#NIFAfiliadoModificar").val().toUpperCase();

       

          if( NIFAfiliadoModificar == "" ){

          alert("FALTAN CAMPOS OBLIGATORIOS POR RELLENAR");

          }
          else{

               $.post("../../php/gestiones/quienes.php",{nif: NIFAfiliadoModificar},function(res){

               
                    var quienes3= res;
                    var r = confirm("Vas a CONSULTAR/MODIFICAR a: "+quienes3+" ¿Estás conforme?");
                         
                         if (r == true) {
                              
                              $.post("../../php/gestiones/preModificarAfiliado.php",{nif: NIFAfiliadoModificar},function(res){
                              
                         
                                   if (res==1){
                                      
                                             window.open('../../php/gestiones/modificacionAfiliado.php?usuario='+NIFAfiliadoModificar);
                                        }
                                   else{
                                            
                                            alert(res); 
                                        }
                              
                    
                                   
                              });

                              
                         } else {
                              alert("CANCELADA LA MODIFICACION de: "+quienes3);
                         }
              
               
               });

          }

       
        
        
        
   });



   $("#bajaDeAfiliado").click(function(){

        $("#datosParaBajaDeAfiliado").toggle("slow");
        $("#datosParaAltaDeAfiliado").hide("slow");
        $("#datosParaModificacionDeAfiliado").hide("slow");
   });

   $("#enviarDatosBajaAfiliado").click(function(){

        $( "#NIFAfiliadoBaja" ).focus(function() {
             $("#NIFAfiliadoBaja").val("");
            
        });

        var NIFAfiliadoBaja = $("#NIFAfiliadoBaja").val().toUpperCase();
        var fechaBaja = $("#fechaBaja").val();
        var situacionBaja = $("#situacionBaja").val().toUpperCase();
        var observacionesBaja = $("#observacionesBaja").val().toUpperCase();

        //alert("Vas a dar de BAJA a: "+NIFAfiliadoBaja);
        if( NIFAfiliadoBaja == "" || fechaBaja == ""  ){

             alert("FALTAN CAMPOS OBLIGATORIOS POR RELLENAR");

          }
        else{

             $.post("../../php/gestiones/quienes.php",{nif: NIFAfiliadoBaja},function(res){

                  var quienes2= res;
                       var r = confirm("Vas a dar de BAJA a: "+quienes2+" ¿Estás conforme?");

                            if (r == true) {

                                 $.post("../../php/gestiones/preBajaAfiliado.php",{nif: NIFAfiliadoBaja, fecha: fechaBaja, situacion: situacionBaja, observaciones: observacionesBaja},function(res){
                                 
                            
                                      alert(res);
                                 // window.open('../html/bajaAfiliado.php?usuario='+NIFAfiliadoBaja);
                       
                                      
                                 });
                            } else {
                                 alert("CANCELADA LA BAJA de: "+quienes2);
                            }
             });

        }

        

        

   });

   /*****FIN GESTION DE AFILIADOS */

   /****GESION CREDITO HORARIO *****/

   $("#botonFiltroProvinciaCreditoHorario").click(function(){ 

     $(".loader").delay(1000).show(); 
 
     $(".loader").fadeOut("slow");
 
     var sitio= $("#localidadDelegadosCreditoHorario").val().toUpperCase();
 
     
           $.post("../../php/gestiones/creditoHorario.php",{lugar: sitio},function(res){
                   
                $("#creditoHorario").html(res);
 
                $(".modificarHoras").click(function(){
                 var posicion= $(this).attr("id");
                 var cantidad= $(this).prev().val();
 
               if (cantidad){
 
                 var r = confirm("VAS A MODIFICAR LAS HORAS DEL DELEGADO CON NIF: "+posicion+"\n\n¿ESTAS SEGURO/A?");
                 if (r == true) {
                           $.post("../../php/gestiones/modificarHorasDelegado.php", {posi: posicion, canti: cantidad},function(res){
 
                                                       
 
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
 
 
 
 
    
             

   /****FIN GESTION CREDITO HORARIO ****/



  	
});