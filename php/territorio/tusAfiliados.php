<?php


//$id = $_POST['usuario'];

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

if (isset($_POST['lugar'])) {
    $id = $_POST['lugar'];;
}
else{
	$id = 'NUMEROOFICINA';
}

$consultarNE = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarNE);

$numeroEmpleado=$row['numeroEmpleado'];





	//$result = $conexion->query("SELECT coordinadorTerritorial, COUNT(*) as Afiliados,COUNT(IF(sexo='M',sexo,NULL)) as Mujeres,COUNT(IF(sexo='H',sexo,NULL)) as Hombres FROM afiliacion group by coordinadorTerritorial");

	//$result = $conexion->query("SELECT AF.NIF as NIFI, AF.numeroEmpleado as numemp, AF.nombre as nom, AF.apellidos as cognom, AF.numeroOficina as numof, AF.provincia as provi FROM afiliacion AF inner join oficinaspordelegado OPD on (AF.numeroOficina=OPD.numeroOficina) and (AF.provincia=OPD.provincia) where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY `AF`.`numeroOficina` ASC");
	
	//$result = $conexion->query("SELECT AF.NIF as NIFI, AF.numeroEmpleado as numemp, AF.nombre as nom, AF.apellidos as cognom, AF.fechaAfiliacion as fechaf,AF.numeroOficina as numof, AF.provincia as provi, AF.entidad as enti FROM afiliacion AF left join oficinaspordelegado OPD on AF.provincia=OPD.provincia where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY AF.provincia,AF.entidad,`AF`.`numeroOficina` ASC");

	if ($id== 'FECHAAFILIACION'){

		$result = $conexion->query("SELECT AF.NIF as NIFI, AF.numeroEmpleado as numemp, AF.nombre as nom, AF.apellidos as cognom, AF.fechaAfiliacion as fechaf,AF.numeroOficina as numof, AF.provincia as provi, AF.entidad as enti FROM afiliacion AF left join oficinaspordelegado OPD on AF.provincia=OPD.provincia where OPD.coordinadorTerritorial ='".$numeroEmpleado."'  
		ORDER BY AF.`".$id."` DESC");
	}
	else{

		$result = $conexion->query("SELECT AF.NIF as NIFI, AF.numeroEmpleado as numemp, AF.nombre as nom, AF.apellidos as cognom, AF.fechaAfiliacion as fechaf,AF.numeroOficina as numof, AF.provincia as provi, AF.entidad as enti FROM afiliacion AF left join oficinaspordelegado OPD on AF.provincia=OPD.provincia where OPD.coordinadorTerritorial ='".$numeroEmpleado."'  
	ORDER BY AF.`".$id."` ASC");
	}
	

	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>NIF</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>F.Afiliación</th>
									<th>NºOficina</th>
									<th>Provincia</th>
									<th>Entidad</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									echo "<td >" . $row['NIFI'] . "</td>";
									echo "<td >" . $row['nom'] . "</td>";
									echo "<td >" . $row['cognom'] . "</td>";
									echo "<td >" . $row['fechaf'] . "</td>";
									echo "<td >" . $row['numof'] . "</td>";
									echo "<td >" . $row['provi'] . "</td>";
									echo "<td >" . $row['enti'] . "</td>";
									
								echo "</tr>";
							echo "</tbody>";
							}
				

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);
//}


?>