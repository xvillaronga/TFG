<?php

include("conexion.php");

session_start();

$usuario=$_POST['usuario'];
$password=$_POST['password'];
$_SESSION['usuario']=$usuario;

date_default_timezone_set('Europe/Madrid');

$timezone = date("Y-m-d H:i:s");

//$timezone = date_default_timezone_get();


	
 	$result = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

 	$row_cnt = $result->num_rows;
 	

 	if( $row_cnt == 0){
	 
	echo false;

	}
	else{

		
	
 		$result2 = $conexion->query("SELECT password FROM usuarios WHERE usuario = '$usuario'");

 		$row = mysqli_fetch_array($result2);
 		
 		
 		if ($password==$row['password']){

 			$conexion->query("insert into log (usuario, fecha) values ('$usuario', '$timezone')");

 			echo true;
 		}
 		else{

 			echo false;
 		}

 			
	}

	



 
?>