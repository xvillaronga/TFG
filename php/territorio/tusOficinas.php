<?php


//$id = $_POST['usuario'];

include("../conexion.php");

session_start();

$usu= $_SESSION['usuario'];

$consultarNE = $conexion->query("SELECT * FROM usuarios where usuario='".$usu."'");

$row = mysqli_fetch_array($consultarNE);

$numeroEmpleado=$row['numeroEmpleado'];




	//$result = $conexion->query("select numeroOficina, nombreOficina , provincia, sociedad from oficinaspordelegado where coordinadorTerritorial ='".$numeroEmpleado."' ORDER BY numeroOficina ASC");

	//$result = $conexion->query("SELECT OPD.numeroOficina, OPD.nombreOficina, OPD.provincia, OPD.sociedad, MAX(VO.fechaVisita) as ultimavisita FROM oficinaspordelegado OPD left join visitasoficinas VO on OPD.numeroOficina=VO.numeroOficina WHERE OPD.coordinadorTerritorial ='".$numeroEmpleado."' GROUP BY OPD.numeroOficina ORDER BY OPD.numeroOficina ASC");

	$result = $conexion->query("SELECT TOTALES.name as numeroOficina, TOTALES.number as nombreOficina, TOTALES.prov as provincia, TOTALES.entity as sociedad, MAX(VO.fechaVisita) as ultimavisita
	FROM (SELECT OF.Nombre as name, OF.NumeroOficina as number, OF.Provincia as prov, OF.Entidad as entity FROM oficinas OF inner join oficinaspordelegado OPD on OF.Provincia=OPD.provincia
	where OPD.coordinadorTerritorial ='".$numeroEmpleado."' and OF.Estado='ALTA'  
	ORDER BY `OF`.`Provincia` ASC) TOTALES  left join visitasoficinas VO on TOTALES.number=VO.numeroOficina group by TOTALES.number order by TOTALES.prov,TOTALES.number");
	






	echo "
	<div class='container'>


	<div class='row'>
		<div class='col'>
			<table class='table'>
							<thead class='thead-light'>
								<tr>
									<th>#</th>
									<th>NºOficina</th>
									<th>Nombre Oficina</th>
									<th>Provincia</th>
									<th>Sociedad</th>
									<th>Ult.Visita</th>
									
								</tr>
							</thead>";
				
							$fecha = date('Y-m-j');
							$fechaMenos6 = strtotime ( '-6 month' , strtotime ( $fecha ) ) ;
							$fechaMenos6 = date ( 'Y-m-j' , $fechaMenos6 );
							$n=1;
							echo "<tbody>";
							while($row = $result->fetch_array())
							{
								
							
								echo "<tr >";
									echo "<td >" . $n . "</td>";
									$n++;
									echo "<td >" . $row['numeroOficina'] . "</td>";
									echo "<td >" . $row['nombreOficina'] . "</td>";
									echo "<td >" . $row['provincia'] . "</td>";
									echo "<td >" . $row['sociedad'] . "</td>";

									
									$ultimaVisita=$row['ultimavisita'];

									if ($ultimaVisita>$fechaMenos6 || $ultimaVisita==''){

										echo "<td >" . $ultimaVisita . "</td>";

									}
									else{
										echo "<td class='parpadea text' style='color:white;background-color:red;width:115px;'>" . $ultimaVisita . "</td>";

									}
									
																		
								echo "</tr>";
							
							}
							echo "</tbody>";

			echo "</table>";
		echo "</div>";  

		echo "</div>";
	 
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);
//}


?>