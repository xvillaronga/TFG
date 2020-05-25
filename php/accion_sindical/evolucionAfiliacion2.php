<?php

include("../conexion.php");



$fechaEntrada = $_POST['data'];
//echo $fecha;
//$año_array = str_split($fecha, 4);
$porciones = explode("-", $fechaEntrada);
$año= $porciones[0];
$mes= $porciones[1];
$dia= $porciones[2];



$fecha = $año . "-" .$mes. "-".$dia;




/**********************2018***************************/

$result1 = $conexion->query("select YEAR('".$fecha."') as añoActual, COUNT(IF((afi='COMFIA') and fechaAfiliacion >=(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)),afi,NULL)) as altas12 from afiliacion");

while($row = $result1->fetch_array()){	$añoActual=$row['añoActual'];$altas12=$row['altas12'];	};

$result2 = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and fechaBaja>=(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)),afi,NULL)) as bajas12 from bajasafiliacion");

while($row = $result2->fetch_array()){	$bajas12=$row['bajas12'];	};

$neto12=$altas12-$bajas12;

$result3 = $conexion->query("select COUNT(IF((afi='COMFIA') and (YEAR(fechaAfiliacion)=YEAR('".$fecha."')),afi,NULL)) as altasAño  from afiliacion");

while($row = $result3->fetch_array()){	$altasAño=$row['altasAño'];	};

$result4 = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and (YEAR(fechaBaja)=YEAR('".$fecha."')),afi,NULL)) as bajasAño from bajasafiliacion");
while($row = $result4->fetch_array()){	$bajasAño=$row['bajasAño'];	};

$netoAño=$altasAño-$bajasAño;

$result5 = $conexion->query("select COUNT(IF((afi='COMFIA') and fechaAfiliacion >=(DATE_SUB('".$fecha."', INTERVAL 1 MONTH)),afi,NULL)) as altasMes from afiliacion");

while($row = $result5->fetch_array()){	$altasMes=$row['altasMes'];	};

$result6 = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and fechaBaja>=(DATE_SUB('".$fecha."', INTERVAL 1 MONTH)),afi,NULL)) as bajasMes from bajasafiliacion");

while($row = $result6->fetch_array()){	$bajasMes=$row['bajasMes'];	};

$netoMes=$altasMes-$bajasMes;

/****************fin 2018**************/

/*****************2017******************************************************/

$result1AA = $conexion->query("select YEAR(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)) as añoActualAA, COUNT(IF((afi='COMFIA') and fechaAfiliacion<(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)) and fechaAfiliacion >=(DATE_SUB('".$fecha."', INTERVAL 2 YEAR)),afi,NULL)) as altas12AA from afiliacion");

while($row = $result1AA->fetch_array()){	$añoActualAA=$row['añoActualAA'];$altas12AA=$row['altas12AA'];	};

$result2AA = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and fechaBaja<(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)) and fechaBaja>=(DATE_SUB('".$fecha."', INTERVAL 2 YEAR)),afi,NULL)) as bajas12AA from bajasafiliacion");

while($row = $result2AA->fetch_array()){	$bajas12AA=$row['bajas12AA'];	};

$neto12AA=$altas12AA-$bajas12AA;

$result3AA = $conexion->query("select COUNT(IF((afi='COMFIA') and DAY(fechaAfiliacion)<=DAY('".$fecha."') and MONTH(fechaAfiliacion)<=MONTH('".$fecha."') and (YEAR(fechaAfiliacion)=YEAR(DATE_SUB('".$fecha."', INTERVAL 1 YEAR))),afi,NULL)) as altasAñoAA  from afiliacion");

while($row = $result3AA->fetch_array()){	$altasAñoAA=$row['altasAñoAA'];	};

$result4AA = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and DAY(fechaBaja)<=DAY('".$fecha."') and MONTH(fechaBaja)<=MONTH('".$fecha."')  and (YEAR(fechaBaja)=YEAR(DATE_SUB('".$fecha."', INTERVAL 1 YEAR))),afi,NULL)) as bajasAñoAA from bajasafiliacion");

while($row = $result4AA->fetch_array()){	$bajasAñoAA=$row['bajasAñoAA'];	};

$netoAñoAA=$altasAñoAA-$bajasAñoAA;

$result5AA = $conexion->query("select COUNT(IF((afi='COMFIA') and DAY(fechaAfiliacion)<=DAY('".$fecha."')   and MONTH(fechaAfiliacion)=MONTH('".$fecha."') and YEAR(fechaAfiliacion)=YEAR(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)),afi,NULL)) as altasMesAA from afiliacion");

while($row = $result5AA->fetch_array()){	$altasMesAA=$row['altasMesAA'];	};

$result6AA = $conexion->query("select COUNT(IF((afi='BAJA COMFIA') and DAY(fechaBaja)<=DAY('".$fecha."')  and MONTH(fechaBaja)=MONTH('".$fecha."') and YEAR(fechaBaja)=YEAR(DATE_SUB('".$fecha."', INTERVAL 1 YEAR)),afi,NULL)) as bajasMesAA from bajasafiliacion");

while($row = $result6AA->fetch_array()){	$bajasMesAA=$row['bajasMesAA'];	};

$netoMesAA=$altasMesAA-$bajasMesAA;


/**************************fin 2017****************************************/

/****************provincias***************************************************/
$resultPPP = $conexion->query("select codigoProvinciaCCC, provincia, COUNT(IF((afi='COMFIA') and (YEAR(fechaAfiliacion)=YEAR('".$fecha."')),afi,NULL)) as altas, COUNT(IF((afi='BAJA COMFIA') and (YEAR(fechaBaja)=YEAR('".$fecha."')),afi,NULL)) as bajas, ((COUNT(IF((afi='COMFIA') and (YEAR(fechaAfiliacion)=YEAR('".$fecha."')),afi,NULL)))- (COUNT(IF((afi='BAJA COMFIA') and (YEAR(fechaBaja)=YEAR('".$fecha."')),afi,NULL)))) as neto from(select * from afiliacion UNION select * from bajasafiliacion)as AT group by provincia");

/************************fin provincias**************************************/	


	
	echo "
	
	<div class='container'>

		<div class='row'>

			
			<H4>&nbsp;&nbsp;&nbsp;Variación neta de la Afiliación a ".$dia . "-" .$mes. "-".$año."</H4>
		</div>

		<div class='row '>

				<div class=' col-4' style='text-align: center; color: Brown ' >
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					12 MESES
				</div>

				<div class='col-4' style='text-align: center; color: Brown ' >
					DESDE 1 DE ENERO
				</div>

				<div class='col-4' style='text-align: center; color: Brown '>
					ULTIMO MES
				</div>
		</div>

		<div class='row'>

			<div class='col' >

				

				<table class='table'>


								<thead class='thead-light'>


									<tr>
										
										<th>Año</th>
										<th>Altas</th>
										<th>Bajas</th>
										<th>Neto</th>
										
										<th>Altas</th>
										<th>Bajas</th>
										<th>Neto</th>
										
										<th>Altas</th>
										<th>Bajas</th>
										<th>Neto</th>
																			
									</tr>
								</thead>";
					

					
								
									
								echo "<tbody>";
									echo "<tr >";

										echo "<td >" . $añoActual . "</td>";

										echo "<td style='color:blue'>" . $altas12 . "</td>";
										
										echo "<td style='color:red'>" . $bajas12 . "</td>";

										echo "<td >" . $neto12 . "</td>";
										
										echo "<td style='color:blue'>" . $altasAño . "</td>";
										
										echo "<td style='color:red'>" . $bajasAño . "</td>";

										echo "<td >" . $netoAño . "</td>";

										echo "<td style='color:blue'>" . $altasMes . "</td>";
										
										echo "<td style='color:red'>" . $bajasMes . "</td>";

										echo "<td >" . $netoMes . "</td>";
										
									echo "</tr>";

									echo "<tr >";

										echo "<td >" . $añoActualAA . "</td>";

										echo "<td style='color:blue'>" . $altas12AA . "</td>";
										
										echo "<td style='color:red'>" . $bajas12AA . "</td>";

										echo "<td >" . $neto12AA . "</td>";
										
										echo "<td style='color:blue'>" . $altasAñoAA . "</td>";
										
										echo "<td style='color:red'>" . $bajasAñoAA . "</td>";

										echo "<td >" . $netoAñoAA . "</td>";

										echo "<td style='color:blue'>" . $altasMesAA . "</td>";
										
										echo "<td style='color:red'>" . $bajasMesAA . "</td>";

										echo "<td >" . $netoMesAA . "</td>";
										
									echo "</tr>";
								echo "</tbody>";
								

				echo "</table>

			</div>

			
			



		</div>

		<div class='row'>
			<div class='col' >";

				//echo "<H4>Variación por Provincias entre 01/01/". date("Y")." y  " . date("d") . "/" . date("m")."/" . date("Y")."</H4>" ;
				echo "<H4>Variación por Provincias.</H4>" ;
				echo"<table class='table'>
								<thead class='thead-light'>
									<tr>
										<th>Cod. Prov.</th>
										<th>Provincia</th>
										<th>Altas</th>
										<th>Bajas</th>
										<th>Neto</th>
																			
									</tr>
								</thead>";
					

					
								while($row = $resultPPP->fetch_array())
								{
									
								echo "<tbody>";
									echo "<tr >";

										echo "<td >" . $row['codigoProvinciaCCC'] . "</td>";

										echo "<td >" . $row['provincia'] . "</td>";
										
										echo "<td style='color:blue'>" . $row['altas'] . "</td>";
				
										echo "<td style='color:red'>" . $row['bajas'] . "</td>";

										echo "<td >" . $row['neto'] . "</td>";
										
										
									echo "</tr>";
								echo "</tbody>";
								}

				echo "</table>";

		 	echo "</div>";

		echo "</div>";
	echo "</div>";
/*************************************************/
	





	
/**************************************************/
	mysqli_close($conexion);



?>