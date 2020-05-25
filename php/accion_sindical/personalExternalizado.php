<?php

include("../conexion.php");

$id = $_POST['lugar'];

	switch ($id) {
  
    case "TODAS":

        	$result = $conexion->query("SELECT Provincia, NuevaSociedad, Nombre, Apellidos,NIF, NombreOficina, Puesto, CategoriaProfesional, Afi FROM personalexternalizado  
			ORDER BY Provincia, NuevaSociedad ASC");

	
	
	
			echo "
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover' style='font-size: 12px'>
								<thead class='thead-light ' >
										<tr >
											<th>Provincia</th>
											<th>Entidad</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>NIF</th>
                                            <th>Oficina</th>
                                            <th>Puesto</th>
                                            <th>Categoria</th>
											<th>Af.</th>
											
											
											
										</tr>
									</thead>
									";
						

						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												

													echo "<td style='text-align:center;'>" . $row['Provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['NuevaSociedad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['Nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['Apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['NIF']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['NombreOficina']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['Puesto']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['CategoriaProfesional']. "</td>";
                                                    //echo "<td style='text-align:center;'>" . $row['Afi'] . "</td>";
                                                   
                                                    if ($row['Afi'] == 'COMFIA'){

                                                       
                                                        echo "<td >" ."<img class='img-fluid' src='../img/verde.png' alt='SI'>" . "</td>";
                                                    }
                                                    else{
                                                        echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='NO'>" . "</td>";
                                                    }
													
													
												

											echo "</tr>";

										echo "</div>";

									echo "</tbody>";
									}

					echo "</table>";
				echo "</div>";  

				echo "</div>";
        break;
    default:
       
       $result = $conexion->query("SELECT Provincia, NuevaSociedad, Nombre, Apellidos,NIF, NombreOficina, Puesto, CategoriaProfesional, Afi FROM personalexternalizado where Provincia='".$id."' 
			ORDER BY NuevaSociedad ASC");


	
	
	
			echo "
			
			<div class='container'>

			";

			echo "
			<div class='row '>
				<div class='col'>
					
					<table class='table table-hover' style='font-size: 12px'>
								<thead class='thead-light ' >
										<tr >
                                        <th>Provincia</th>
                                        <th>Entidad</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>NIF</th>
                                        <th>Oficina</th>
                                        <th>Puesto</th>
                                        <th>Categoria</th>
                                        <th>Af.</th>
											
											
										</tr>
									</thead>
									";
						

						
									while($row = $result->fetch_array())
									{
										
								

									echo "<tbody >";

										

											echo "<tr >";

												

													echo "<td style='text-align:center;'>" . $row['Provincia'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['NuevaSociedad'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['Nombre'] . "</td>";
													echo "<td style='text-align:center;'>" . $row['Apellidos']. "</td>";
													echo "<td style='text-align:center;'>" . $row['NIF']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['NombreOficina']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['Puesto']. "</td>";
                                                    echo "<td style='text-align:center;'>" . $row['CategoriaProfesional']. "</td>";
                                                    // echo "<td style='text-align:center;'>" . $row['Afi'] . "</td>";

                                                    if ($row['Afi'] == 'COMFIA'){

                                                        
                                                         echo "<td >" ."<img class='img-fluid' src='../img/verde.png' alt='SI'>" . "</td>";
                                                     }
                                                     else{
                                                         echo "<td >" ."<img class='img-fluid' src='../img/rojo.png' alt='NO'>" . "</td>";
                                                     }
													
												

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