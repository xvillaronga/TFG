<?php

include("conexion.php");

$usuario=$_POST['usuario'];

$_SESSION['usuario']=$_POST['usuario'];



	
$result = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

$row = mysqli_fetch_array($result);

$retorno=$row['nombre'];

 	echo($retorno);
 	

 
?>