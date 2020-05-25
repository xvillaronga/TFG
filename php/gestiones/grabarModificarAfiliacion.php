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
$fechaBaja = $_POST['fechaBaja'];
$gestorAfiliacion = $_POST['gestorAfiliacion'];
$gestorParAfiliacion = $_POST['gestorParAfiliacion'];

$formaDePago = $_POST['formaDePago'];
$CCAfiliacion = $_POST['CCAfiliacion'];

$telefono = $_POST['telefono'];
$correoExternoCajamar = $_POST['correoExternoCajamar'];
$correoExternoPropio = $_POST['correoExternoPropio'];

$situacion = $_POST['situacion'];

$observaciones = $_POST['observaciones'];


	
        
        $conexion->query("update afiliacion
                        SET nombre = '$nombre', 
                        apellidos = '$apellidos',
                        sexo = '$sexo',
                        numeroEmpleado = '$numeroEmpleado',
                        fechaNacimiento = '$fechaNacimiento',
                        direccion = '$direccion',
                        poblacion = '$poblacion',
                        provincia = '$provincia',
                        codigoPostal = '$codigoPostal',
                        entidad = '$entidad',
                        numeroOficina = '$numeroOficina',
                        clasificacionProfesional = '$clasificacionProfesional',
                        afi = '$afi',
                        fechaAfiliacion = '$fechaAfiliacion',
                        fechaBaja = '$fechaBaja',
                        gestorAfiliacion = '$gestorAfiliacion',
                        gestorParAfiliacion = '$gestorParAfiliacion',
                        formaDePago = '$formaDePago ',
                        CCAfiliacion = '$CCAfiliacion',
                        telefono = '$telefono',
                        correoExternoCajamar = '$correoExternoCajamar',
                        correoExternoPropio = '$correoExternoPropio',
                        situacion = '$situacion',
                        observaciones = '$observaciones'

                        WHERE NIF = '$NIF'");
	

		$salida= "MODIFICACION GRABADA CORRECTAMENTE";

		
	

	echo $salida;


?>