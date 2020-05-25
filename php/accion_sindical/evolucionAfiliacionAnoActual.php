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
                
               

                $result = $conexion->query("SELECT MONTH(fechaAfiliacion) as mesesA, COUNT(*) as totalAfiliados FROM afiliacion WHERE YEAR(fechaAfiliacion)= YEAR(CURDATE()) group by MONTH(fechaAfiliacion) order by MONTH(fechaAfiliacion)");

               //$result = $conexion->query("SELECT MONTH(fechaAfiliacion) as mesesA, COUNT(*) as totalAfiliados FROM afiliacion WHERE YEAR(fechaAfiliacion)= '2018' group by MONTH(fechaAfiliacion) order by MONTH(fechaAfiliacion)");


             $resultBajas = $conexion->query("SELECT MONTH(fechaBaja) as mesesB, COUNT(*) as totalBajas FROM bajasafiliacion WHERE YEAR(fechaBaja)= YEAR(CURDATE()) group by MONTH(fechaBaja) order by MONTH(fechaBaja)");

               //  $resultBajas = $conexion->query("SELECT MONTH(fechaBaja) as mesesB, COUNT(*) as totalBajas FROM bajasafiliacion WHERE YEAR(fechaBaja)= '2018' group by MONTH(fechaBaja) order by MONTH(fechaBaja)");
                
             $mesesA = array();
             $totalAfiliados = array();
             $mesesB = array();
             $totalBajas = array();

                foreach ($result as $row) {
                    
                    $mesesA[] = $row['mesesA'];
                    $totalAfiliados[] = $row['totalAfiliados'];
                   
                    
                };

                foreach ($resultBajas as $row) {
                    
                   
                    $mesesB[] = $row['mesesB'];
                    $totalBajas[] = $row['totalBajas'];
                    
                };
    /*
               return ($años);
               return ($totalAfiliados);
               return ($mujeres);
               return ($hombres);
   */          
            
 
        ?>
        <script>
            
              var mesesA=<?php echo json_encode($mesesA);?>;

              var totalAfiliados = <?php echo json_encode($totalAfiliados)?>;
              
              var mesesB=<?php echo json_encode($mesesB);?>;

              var totalBajas = <?php echo json_encode($totalBajas)?>;
              
             
                
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
                var tb = [];
                for (var n=0;n<totalBajas.length;n++){

                     tb.push(parseInt(totalBajas[n]));
                };
                 /********************************/
                 if (totalAfiliados.length<=totalBajas.length){
                    totalDeMeses=totalAfiliados.length;
                 }
                 else{

                    totalDeMeses=totalBajas.length;

                 };

                 var tn = [];
                for (var n=0;n<totalDeMeses;n++){

                     tn.push(tf[n]-tb[n]);
                };
               
                
                /***************************/

            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Evolución Afiliación Año Actual'
                },
                subtitle: {
                    text: 'Últimos Meses'
                },
                xAxis: {
                    text: 'Meses',
                    //categories: meses,
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    crosshair: true
                },
                yAxis: {
                    //min: 0,
                    title: {
                        text: 'Altas/Bajas'
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
                    name: 'Altas',
                    //color: '#006400',
                    color: 'blue',
                    data: tf             
                }, {
                    name: 'Bajas',
                    //color: '#ADFF2F',
                    color: 'red',
                    data: tb
                }, {
                    name: 'Neto',
                    //color: '#ADFF2F',
                    color: '#cccccc',
                    data: tn
                }
                ]
            });

        </script>
		
		


	</body>
</html>