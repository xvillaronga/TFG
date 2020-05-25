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

	//$result = $conexion->query("SELECT AF.NIF as NIFI, AF.numeroEmpleado as numemp, AF.nombre as nom, AF.apellidos as cognom, AF.numeroOficina as numof, AF.provincia as provi FROM afiliacion AF inner join oficinaspordelegado OPD on (AF.numeroOficina=OPD.numeroOficina) and (AF.provincia=OPD.provincia) where OPD.coordinadorTerritorial ='".$numeroEmpleado."'  ORDER BY `AF`.`numeroOficina` ASC");
	
	//$result = $conexion->query("SELECT CE.NIF as NIFI, CE.NumeroEmpleado as numemp, CE.Nombre as nom, CE.Apellidos as cognom, CE.NumeroOficina as numof, CE.Provincia as provi, CE.Sociedad as soci FROM censo CE inner join oficinaspordelegado OPD on (CE.numeroOficina=OPD.numeroOficina) and (CE.provincia=OPD.provincia) where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY `CE`.`NumeroOficina` ASC");
	
	//$result = $conexion->query("SELECT CE.NumeroEmpleado as numemp, CE.Nombre as nom, CE.Apellidos as cognom, CE.NumeroOficina as numof,CE.CategoriaProfesional as cate, CF.funcion as funci, CF.CatFun as catfun, CE.FechaNacimiento as naci, CE.Provincia as provi, CE.Sociedad as soci FROM censo CE inner join oficinaspordelegado OPD on CE.provincia=OPD.provincia JOIN clasificacionFuncional CF on CE.NumeroEmpleado=CF.numeroEmpleado where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY `CE`.`".$id."` ");

	$result = $conexion->query("SELECT CE.NumeroEmpleado as numemp, CE.Nombre as nom, CE.Apellidos as cognom, CE.NumeroOficina as numof,CE.CategoriaProfesional as cate, CE.FechaNacimiento as naci, CE.Provincia as provi, CE.Sociedad as soci FROM censo CE inner join oficinaspordelegado OPD on CE.provincia=OPD.provincia where OPD.coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY `CE`.`".$id."` ");

	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table' style='font-size: 12px'>
							<thead class='thead-light'>
								<tr>
									
									<th>NºEmp.</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>NºOfic.</th>
									<th>Cat._Prof.</th>
									<th>Fecha_Nac.</th>
									<th>Provincia</th>
									<th>Sociedad</th>
								</tr>
							</thead>";
				

				
							while($row = $result->fetch_array())
							{
								
							echo "<tbody>";
								echo "<tr >";

									
									echo "<td >" . $row['numemp'] . "</td>";
									echo "<td >" . $row['nom'] . "</td>";
									echo "<td >" . $row['cognom'] . "</td>";
									echo "<td >" . $row['numof'] . "</td>";
									echo "<td >" . $row['cate'] . "</td>";
									echo "<td >" . $row['naci'] . "</td>";
									echo "<td >" . $row['provi'] . "</td>";
									echo "<td >" . $row['soci'] . "</td>";
									
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