<?php

include("../conexion.php");

  
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];

$NIF = $_POST['NIF'];


$numeroEmpleado = $_POST['numeroEmpleado'];

$fechaNacimiento = $_POST['fechaNacimiento'];

$direccion = $_POST['direccion'];
$poblacion = $_POST['poblacion'];
$provincia = $_POST['provincia'];
$codigoPostal= $_POST['codigoPostal'];


$entidad = $_POST['entidad'];
$numeroOficina = $_POST['numeroOficina'];
$clasificacionProfesional = $_POST['clasificacionProfesional'];

$afi = $_POST['afi'];
$fechaAfiliacion = $_POST['fechaAfiliacion'];
//$fechaBaja = $_POST['fechaBaja'];
$gestorAfiliacion = $_POST['gestorAfiliacion'];
$gestorParAfiliacion = $_POST['gestorParAfiliacion'];

$formaDePago = $_POST['formaDePago'];
$CCAfiliacion = $_POST['CCAfiliacion'];

$telefono = $_POST['telefono'];
$correoExternoCajamar = $_POST['correoExternoCajamar'];
$correoExternoPropio = $_POST['correoExternoPropio'];

$situacion = $_POST['situacion'];

$observaciones = $_POST['observaciones'];





	

	

		
		$conexion->query("insert into afiliacion (nombre, apellidos, sexo, NIF, numeroEmpleado, fechaNacimiento, direccion, poblacion, provincia, codigoPostal, entidad, numeroOficina, clasificacionProfesional, afi, fechaAfiliacion, gestorAfiliacion, gestorParAfiliacion, formaDePago, CCAfiliacion, telefono, correoExternoCajamar, correoExternoPropio,situacion, observaciones) values ('$nombre', '$apellidos', '$sexo', '$NIF', '$numeroEmpleado', '$fechaNacimiento', '$direccion', '$poblacion', '$provincia', '$codigoPostal', '$entidad', '$numeroOficina', '$clasificacionProfesional', '$afi', '$fechaAfiliacion', '$gestorAfiliacion', '$gestorParAfiliacion', '$formaDePago', '$CCAfiliacion', '$telefono', '$correoExternoCajamar', '$correoExternoPropio','$situacion', '$observaciones')");

		

	

		$salida= "AFILIACION GRABADA CORRECTAMENTE";

		
	

	echo $salida;


?>