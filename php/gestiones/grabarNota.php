<?php

include("../conexion.php");
    
$nombre = $_POST['nombre'];
$NIF = $_POST['NIF'];
$domicilio = $_POST['domicilio'];
$localidad = $_POST['localidad'];
$calidad = $_POST['calidad'];

$fechaNota = $_POST['fechaNota'];
$dias = $_POST['dias'];
$motivo = $_POST['motivo'];
$destino = $_POST['destino'];


$numeroKm = $_POST['numeroKm'];
$costeKm = $_POST['costeKm'];
$matricula = $_POST['matricula'];
$parking = $_POST['parking'];
$peajes = $_POST['peajes'];

$transporteInterurbano = $_POST['transporteInterurbano'];
$transporteUrbano = $_POST['transporteUrbano'];
$hospedaje = $_POST['hospedaje'];
$comida = $_POST['comida'];
$cena = $_POST['cena'];
$otrosGastos = $_POST['otrosGastos'];

$importeTotal = $_POST['importeTotal'];

$cuentaBancaria = $_POST['cuentaBancaria'];
$banco = $_POST['banco'];

$fechaVB = $_POST['fechaVB'];
$fechaPago = $_POST['fechaPago'];
$fechaRemesa = $_POST['fechaRemesa'];
$fechaCobro = $_POST['fechaCobro'];

$estado = $_POST['estado'];
$asumido = $_POST['asumido'];
$observaciones = $_POST['observaciones'];




	$conexion->query("insert into gastos (nombre, NIF, domicilio, localidad, calidad, fechaNota, dias, motivo, destino, numeroKm, costeKm, matricula, parking, peajes, transporteInterurbano, transporteUrbano, hospedaje, comida, cena, otrosGastos, importeTotal, cuentaBancaria, banco, fechaVB, fechaPago, fechaRemesa, fechaCobro, estado,asumido, observaciones) values ('$nombre', '$NIF', '$domicilio', '$localidad', '$calidad', '$fechaNota', '$dias', '$motivo', '$destino', '$numeroKm', '$costeKm', '$matricula', '$parking', '$peajes', '$transporteInterurbano', '$transporteUrbano', '$hospedaje', '$comida', '$cena', '$otrosGastos', '$importeTotal', '$cuentaBancaria', '$banco', '$fechaVB', '$fechaPago', '$fechaRemesa', '$fechaCobro', '$estado','$asumido', '$observaciones')");



	

echo "OK";

?>