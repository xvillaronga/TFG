<?php

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$nifBaja = $_POST['nif'];
$fecha = $_POST['fecha'];
$situacion = $_POST['situacion'];
$observaciones = $_POST['observaciones'];

$consultarPrivilegios = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarPrivilegios);

$privilegios=$row['privilegios'];


if ($privilegios!="1"){

	
    echo "NO ESTAS AUTORIZADO/A.";

	
}

else{ 

    //echo "SI ESTAS AUTORIZADO/A.";
    $result = $conexion->query("SELECT * FROM bajasafiliacion WHERE NIF = '$nifBaja'");

 	$row_cnt = $result->num_rows;
 	

 	if( $row_cnt == 0){
     
        $result2 = $conexion->query("SELECT * FROM afiliacion WHERE NIF = '$nifBaja'");

        $row_cnt2 = $result2->num_rows;
    
        if( $row_cnt2 == 0){
            
            echo "ESTA PERSONA NO ES AFILIADA, POR TANTO NO LA PUEDES DAR DE BAJA.";
        }
        else{

            /*Primero pongo en tabla Afiliacion los campos necesarios con sus valores oportunos para la baja*/
            $conexion->query("UPDATE afiliacion set AFI='BAJA COMFIA', fechaBaja='$fecha', situacion='$situacion', observaciones='$observaciones', idAfiliacion=NULL where NIF = '$nifBaja'");
           
            /*Segundo copio ( inserto) esa linea de Afiliacion a BajasAfiliacion...ya se pondra el ID que toque por ser autoincrementable*/
            $conexion->query("INSERT INTO bajasafiliacion (select * from afiliacion where NIF = '$nifBaja')");

            /*Tecero borro esa linea de Afiliacion*/
            $conexion->query("DELETE FROM afiliacion where NIF = '$nifBaja'");

            
            /*Notifico que ya esta hecha la baja*/
             echo "AFILIADO DADO DE BAJA CORRECTAMENTE";

        }

	}
	else{
        echo "ESTA PERSONA YA ESTA EN NUESTRO LISTADO DE BAJAS. NO TIENE SENTIDO DARLA DE BAJA OTRA VEZ.";
        }

}


?>