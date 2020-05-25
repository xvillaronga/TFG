<?php

include("../conexion.php");

$id = $_POST['lugar'];

	switch ($id) {
    case "EJEST":
        
    	 //$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt<>'0' ORDER BY provincia ASC");

		 //$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt <>'' ORDER BY provincia ASC");
	
		 $result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt like 'ES%' ORDER BY provincia ASC");
			echo " 
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover'>
								<thead class='thead-light ' >
										<tr >
											<th style='text-align:center;'>#</th>
											<th style='text-align:center;'>Provincia</th>
											<th style='text-align:center;'>Entidad</th>
											<th style='text-align:center;'>Nombre</th>
											<th style='text-align:center;'>Apellidos</th>
											<th style='text-align:center;'>Cargo Ejecutiva</th>
											
											
											
										</tr>
									</thead>
									";
						

									$i=1;
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												
													echo "<td style='text-align:center;'>" . $i . "</td>";
													echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['cargoEjecutiva']. "</td>";
													
												

											echo "</tr>";

										echo "</div>";

									echo "</tbody>";

									$i++;
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";


		break;
	
	case "CONS":
        
			//$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt<>'0' ORDER BY provincia ASC");
   
			$result = $conexion->query("(SELECT ejeEnt, cargoEjecutiva, provincia, entidad, Consejo, nombre, apellidos,NIF, numeroOficina, correoExternoPropio FROM delegados where Consejo = 'SI') UNION (SELECT ejeEnt, cargoEjecutiva, provincia, entidad, Consejo, nombre, apellidos,NIF, numeroOficina, correoExternoPropio FROM consejeroLaboral where Consejo = 'SI')");
	   
	   
			   echo " 
			   
			   <div class='container'>
   
			   ";
   
			   echo "
			   <div class='row '>
				   <div class='col'>
					   
					   <table class='table table-hover'>
								   <thead class='thead-light ' >
										   <tr >
										   <th style='text-align:center;'>#</th>
										   <th style='text-align:center;'>Provincia</th>
										   <th style='text-align:center;'>Entidad</th>
										   <th style='text-align:center;'>Nombre</th>
										   <th style='text-align:center;'>Apellidos</th>
										   <th style='text-align:center;'>NºOficina</th>
										   <th style='text-align:center;'>Correo Externo</th>
											   
											   
											   
										   </tr>
									   </thead>
									   ";
						   
   
						   				$i=1;
									   while($row = $result->fetch_array())
									   {
										   
								   
   
									   echo "<tbody >";
   
										   
   
											   echo "<tr >";
   
												   
   
													   echo "<td style='text-align:center;'>" . $i . "</td>";
													   echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													   echo "<td style='text-align:center;'>" . $row['numeroOficina']. "</td>";
													   echo "<td style='text-align:center;'>" . $row['correoExternoPropio']. "</td>";
													   
												   
   
											   echo "</tr>";
   
										   echo "</div>";
   
									   echo "</tbody>";

									   $i++;
									   }
   
					   echo "</table>";
				   echo "</div>";  
   
				   echo "</div>";
   
   
		   break;

	 case "PERSI":
        
			//$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt<>'0' ORDER BY provincia ASC");
   
			$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where totalHoras='130' ORDER BY provincia ASC");
	   
	   
			   echo " 
			   
			   <div class='container'>
   
			   ";
   
			   echo "
			   <div class='row '>
				   <div class='col'>
					   
					   <table class='table table-hover'>
								   <thead class='thead-light ' >
										   <tr >
											   <th style='text-align:center;'>#</th>
											   <th style='text-align:center;'>Provincia</th>
											   <th style='text-align:center;'>Entidad</th>
											   <th style='text-align:center;'>Nombre</th>
											   <th style='text-align:center;'>Apellidos</th>
											   <th style='text-align:center;'>Cargo Ejecutiva</th>
											   
											   
											   
										   </tr>
									   </thead>
									   ";
						   
   
						   				$i=1;
									   while($row = $result->fetch_array())
									   {
										   
								   
   
									   echo "<tbody >";
   
										   
   
											   echo "<tr >";
   
												   
											   		   echo "<td style='text-align:center;'>" . $i. "</td>";
													   echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													   echo "<td style='text-align:center;'>" . $row['cargoEjecutiva']. "</td>";
													   
												   
   
											   echo "</tr>";
   
										   echo "</div>";
   
									   echo "</tbody>";
									   $i++;
									   }
   
					   echo "</table>";
				   echo "</div>";  
   
				   echo "</div>";
   
   
		   break;
	
	case "LOLS":
        
			//$result = $conexion->query("SELECT ejeEnt, cargoEjecutiva, provincia, entidad, nombre, apellidos,NIF, totalHoras FROM delegados where ejeEnt<>'0' ORDER BY provincia ASC");
   
			$result = $conexion->query("SELECT ejeEnt, numeroOficina, correoExternoPropio,provincia, entidad, nombre, apellidos,NIF, totalHoras, delSind FROM delegados where delSind ='LOLS' ORDER BY provincia ASC");
	   
	   
			   echo " 
			   
			   <div class='container'>
   
			   ";
   
			   echo "
			   <div class='row '>
				   <div class='col'>
					   
					   <table class='table table-hover'>
								   <thead class='thead-light ' >
										   <tr >
											   <th style='text-align:center;'>#</th>
											   <th style='text-align:center;'>Provincia</th>
											   <th style='text-align:center;'>Entidad</th>
											   <th style='text-align:center;'>Nombre</th>
											   <th style='text-align:center;'>Apellidos</th>
											   <th style='text-align:center;'>NºOficina</th>
											   <th style='text-align:center;'>Correo Externo</th>
											   
											   
											   
										   </tr>
									   </thead>
									   ";
						   
   
						   				$i=1;
									   while($row = $result->fetch_array())
									   {
										   
								   
   
									   echo "<tbody >";
   
										   
   
											   echo "<tr >";
   
												   
   
													   echo "<td style='text-align:center;'>" . $i. "</td>";
													   echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													   echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													   echo "<td style='text-align:center;'>" . $row['numeroOficina']. "</td>";
													   echo "<td style='text-align:center;'>" . $row['correoExternoPropio']. "</td>";
													   
												   
   
											   echo "</tr>";
   
										   echo "</div>";
   
									   echo "</tbody>";

									   $i++;
									   }
   
					   echo "</table>";
				   echo "</div>";  
   
				   echo "</div>";
   
   
		   break;

    case "DPRL":
        
    	 $result = $conexion->query("SELECT comiteSS, provincia, entidad, nombre, apellidos,NIF, creditoHorario, horasCedidas, totalHoras FROM delegados where comiteSS<>'' ORDER BY provincia ASC");

	
	
	
			echo "
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover'>
								<thead class='thead-light ' >
										<tr >
											<th>#</th>
											<th>Provincia</th>
											<th>Entidad</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>NIF</th>
											<th>Credito Horario</th>
											<th>Horas Cedidas</th>
											<th>Total Horas</th>
											
											
										</tr>
									</thead>
									";
						
									$i=1;
						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												

													echo "<td style='text-align:center;'>" . $i . "</td>";
													echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['NIF']. "</td>";
													echo "<td style='text-align:center;'>" . $row['creditoHorario']. "</td>";
													echo "<td style='text-align:center;'>" . $row['horasCedidas'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['totalHoras'] . "</td>";
												

											echo "</tr>";

										echo "</div>";

									echo "</tbody>";

									$i++;
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";


        break;
    case "TODAS":

        	$result = $conexion->query("SELECT provincia, entidad, nombre, apellidos,NIF, creditoHorario, horasCedidas, totalHoras FROM delegados  
			ORDER BY provincia ASC");

	
	
	
			echo "
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover'>
								<thead class='thead-light ' >
										<tr >
											<th>Provincia</th>
											<th>Entidad</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>NIF</th>
											<th>Credito Horario</th>
											<th>Horas Cedidas</th>
											<th>Total Horas</th>
											
											
										</tr>
									</thead>
									";
						

						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												

													echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['NIF']. "</td>";
													echo "<td style='text-align:center;'>" . $row['creditoHorario']. "</td>";
													echo "<td style='text-align:center;'>" . $row['horasCedidas'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['totalHoras'] . "</td>";
												

											echo "</tr>";

										echo "</div>";

									echo "</tbody>";
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";
        break;
    default:
       
       $result = $conexion->query("SELECT provincia, entidad, nombre, apellidos,NIF, creditoHorario, horasCedidas, totalHoras FROM delegados where provincia='".$id."' 
			ORDER BY provincia ASC");

	
	
	
			echo "
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover'>
								<thead class='thead-light ' >
										<tr >
											<th>Provincia</th>
											<th>Entidad</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>NIF</th>
											<th>Credito Horario</th>
											<th>Horas Cedidas</th>
											<th>Total Horas</th>
											
											
										</tr>
									</thead>
									";
						

						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												

													echo "<td style='text-align:center;'>" . $row['provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['entidad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['NIF']. "</td>";
													echo "<td style='text-align:center;'>" . $row['creditoHorario']. "</td>";
													echo "<td style='text-align:center;'>" . $row['horasCedidas'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['totalHoras'] . "</td>";
												

											echo "</tr>";

										echo "</div>";

									echo "</tbody>";
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";
	};
	
	
	/***************FIN filtros delegados**********************************/	

	/**************************************************/
	mysqli_close($conexion);

?>