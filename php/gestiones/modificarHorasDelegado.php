<?php

include("../conexion.php");



$NIF=$_POST['posi'];
$cantidad=$_POST['canti'];

$result = $conexion->query("select * from delegados WHERE NIF='".$NIF."'");

	while($row = $result->fetch_array()){	

		$creditoHorario=$row['creditoHorario'];
		$horasCedidas=$row['horasCedidas'];
		$totalHoras=$row['totalHoras'];
	};

	if ($cantidad<0){

		$retorno="LA CANTIDAD DE HORAS MINIMAS ES DE 0";
	}
	else {

		$totalHoras=$cantidad;
		$horasCedidas=$creditoHorario-$totalHoras;

		$result2 = $conexion->query("UPDATE delegados SET horasCedidas='".$horasCedidas."', totalHoras='".$totalHoras."' WHERE NIF='".$NIF."'");

		$retorno="MODIFICACION DE HORAS REALIZADA";

	}


echo($retorno);


?>