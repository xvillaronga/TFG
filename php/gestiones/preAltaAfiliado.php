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

    //echo "SI ESTAS AUTORIZADO/A.";


    $result = $conexion->query("SELECT * FROM afiliacion WHERE NIF = '$nifAlta'");

 	$row_cnt = $result->num_rows;
 	

 	if( $row_cnt == 0){
     
        $result2 = $conexion->query("SELECT * FROM bajasafiliacion WHERE NIF = '$nifAlta'");

        $row_cnt2 = $result2->num_rows;
    
        if( $row_cnt2 == 0){


            $result3 = $conexion->query("SELECT * FROM censo WHERE NIF = '$nifAlta'");

            $row_cnt3 = $result3->num_rows;

            if( $row_cnt3 == 0){

                echo "ESTE NIF NO SE ENCUENTRA EN EL CENSO";
            }
            else{

                echo 1;
            }
            
            
        }
        else{

           //echo "ESTA PERSONA FUE AFILIADA EN EL PASADO Y SE DIO DE BAJA. CONTACTA CON EL ADMINISTRADOR PARA RECUPERAR SUS DATOS.";
           echo 2;
        }

	}
	else{
        echo "ESTA PERSONA YA ESTA AFILIADO/A. NO TIENE SENTIDO AFILIARLO/A OTRA VEZ.";
    }

}


?>