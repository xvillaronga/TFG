<?php

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$nifAlta = $_POST['nif'];


$consultarPrivilegios = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarPrivilegios);

$privilegios=$row['privilegios'];


if ($privilegios!="1"){

	
    echo "NO ESTAS AUTORIZADO/A.";

	
}

else{ 

    
    $result = $conexion->query("SELECT * FROM afiliacion WHERE NIF = '$nifAlta'");

 	$row_cnt = $result->num_rows;
 	

 	if( $row_cnt == 0){

        echo "ESTA PERSONA NO ES AFILIADA";
     
        

	}
	else{
        echo 1;
    }

}


?>