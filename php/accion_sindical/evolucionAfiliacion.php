<!DOCTYPE html>
<html>
	<head>
		<title>ChartJS - BarGraph</title>
		 <meta charset="UTF-8">
		<style type="text/css">
			#chart-container {
				width: 640px;
				height: auto;
			}
		</style>
       


	</head>
	<body>
		<div id="chart-container">
			

			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		</div>

        <script type="text/javascript" src="../../js/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../../js/highcharts/highcharts.js"></script>
        <!--
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        -->


        <?php

          include("../conexion.php");
                
                $result = $conexion->query("SELECT YEAR(fechaAfiliacion) as años, COUNT(*) as totalAfiliados, COUNT(IF(sexo='M',sexo,NULL)) as mujeres, COUNT(IF(sexo='H',sexo,NULL)) as hombres FROM afiliacion WHERE YEAR(fechaAfiliacion)>2012 group by YEAR(fechaAfiliacion) order by YEAR(fechaAfiliacion)");
                
             $años = array();
             $totalAfiliados = array();
             $mujeres = array();
             $hombres = array();

                foreach ($result as $row) {
                    
                    $años[] = $row['años'];
                    $totalAfiliados[] = $row['totalAfiliados'];
                    $mujeres[] = $row['mujeres'];
                    $hombres[] = $row['hombres'];
                };

                
    /*
               return ($años);
               return ($totalAfiliados);
               return ($mujeres);
               return ($hombres);
   */          
            
 
        ?>
        <script>
            
              var años=<?php echo json_encode($años);?>;

              var totalAfiliados = <?php echo json_encode($totalAfiliados)?>;
              
              var mujeres=<?php echo json_encode($mujeres);?>;

              var hombres=<?php echo json_encode($hombres);?>;
             
                
       /*
                var años = [];
                años.push(2001);
                años.push(2002);
                años.push(2003); 
                años.push(2004);
       
        */
                /*********************************/
                var tf = [];
                for (var n=0;n<totalAfiliados.length;n++){

                     tf.push(parseInt(totalAfiliados[n]));
                };
                
                /********************************/
                var mu = [];
                for (var n=0;n<mujeres.length;n++){

                     mu.push(parseInt(mujeres[n]));
                };

               
                /**************************/

                var ho = [];
                for (var n=0;n<hombres.length;n++){

                     ho.push(parseInt(hombres[n]));
                };
                
                /***************************/

            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Evolución Afiliación'
                },
                subtitle: {
                    text: 'Ultimos años'
                },
                xAxis: {
                    
                    categories: años,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Afiliados/as'
                    }
                },
                tooltip: {
                    //headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    //pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    //    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Total_Afiliados/as',
                    color: '#1E90FF',
                    data: tf             
                }, {
                    name: 'Mujeres',
                    color:'#FF8C00',
                    //color: 'red',
                    data: mu
                }, {
                    name: 'Hombres',
                    color: '#32CD32',
                    //color: 'blue',
                    data: ho
                }
                ]
            });

        </script>
		
		


	</body>
</html>