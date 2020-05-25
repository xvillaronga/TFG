

		function fentra(usuario, password){

			var u=usuario.toLowerCase();;

			var p=password.toUpperCase();;

			$.post("php/paseEntrada.php",{usuario: u, password: p},function(res){
                   
                if (res==1){

                	localStorage.setItem('usuarioTFG',u);

					window.location.href = "html/panelControl.html";


				}
				else{
					//alert("No existe usuario o contraseña incorrecta");

										swal({
                                                          title: 'No existe usuario o contraseña incorrecta',
                                                         
                                                          type: 'error',
                                                          
                                                          confirmButtonColor: '#3085d6',
                                                          
                                                          position: 'center',

                                                          background: 'null',
                                                        }).then((result) => {
                                                          if (result.value) {
                                                            
                                                            location.reload();
                                                          }
                                        })
				}


                return res;
            });

                     

		}



		$(document).ready(function(){

			
			$(window).bind('keydown', function(e) {            
  				if (e.charCode == 13 || e.keyCode == 13) {//ENTER
   					 fentra($("#usuario").val(), $("#password").val());
  				}    
			});





			$("#entrar").click(function(){

				fentra($("#usuario").val(), $("#password").val());
							
			});

			


			
			
		});
	