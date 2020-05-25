<?php

include("../conexion.php");

  
$quienes = $_POST['nif'];


		
    $result = $conexion->query("SELECT * FROM censo where NIF='$quienes'");
    
    $row_cnt = $result->num_rows;
 	

 	if( $row_cnt == 0){

    $salida= $quienes;
   }
   else{

          while($row = $result->fetch_array())
          {

            $nombre= $row['Nombre'] ;

            $apellidos= $row['Apellidos'];

                }

        $salida= $nombre." ".$apellidos;


   }

        
	
            
		
	

    echo $salida;
    
    


?>