<?php

include("../conexion.php");
    
$numeroEmpleado= $_POST['numeroEmpleadoVisita'];
$fecha= $_POST['fecha'];
$gestor1 = $_POST['gestor1'];
$gestor2 = $_POST['gestor2'];
$comentarios = $_POST['comentarios'];





	$conexion->query("insert into visitasempleados (numeroEmpleado, fechaVisita, gestor1, gestor2, comentarios) values ('$numeroEmpleado', '$fecha','$gestor1', '$gestor2', '$comentarios')");

	

	

echo "VISITA GRABADA CORRECTAMENTE";

?>