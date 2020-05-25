<?php

include("../conexion.php");



$id=$_POST['posi'];

$result = $conexion->query("delete from visitasempleados WHERE id =" . $id);

echo("VISITA ELIMINADA CORRECTAMENTE");


?>