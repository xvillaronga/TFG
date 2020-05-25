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
                
                $result = $conexion->query("SELECT sum(numeroComponentesCE) as TotalDelegados, FORMAT((sum(numeroCCOO)/sum(numeroComponentesCE))*100,2) as CCOO, FORMAT((sum(numeroUGT)/sum(numeroComponentesCE))*100,2) as UGT, FORMAT((sum(numeroCGT)/sum(numeroComponentesCE))*100,2) as CGT, FORMAT((sum(numeroUSOC)/sum(numeroComponentesCE))*100,2) as USOC, FORMAT((sum(numeroCSIF)/sum(numeroComponentesCE))*100,2) as CSIF, FORMAT((sum(numeroSI)/sum(numeroComponentesCE))*100,2) as SI FROM totalsindicatos");
               
            
             $CCOO = array();
             $UGT = array();
             $CGT = array();
             $USOC = array();
             $CSIF = array();
             $SI = array();

                foreach ($result as $row) {
                    
                   
                    $CCOO[] = $row['CCOO'];
                    $UGT[] = $row['UGT'];
                    $CGT[] = $row['CGT'];
                    $USOC[] = $row['USOC'];
                    $CSIF[] = $row['CSIF'];
                    $SI[] = $row['SI'];
                };

                
         
            
 
        ?>
        <script>
           
              var CCOO=<?php echo json_encode($CCOO);?>;

              var UGT = <?php echo json_encode($UGT)?>;
              
              var CGT=<?php echo json_encode($CGT);?>;

              var USOC=<?php echo json_encode($USOC);?>;

              var CSIF=<?php echo json_encode($CSIF);?>;

              var SI=<?php echo json_encode($SI);?>;
            
               
     
              
                
                /********************************
                var mu = [];
                for (var n=0;n<mujeres.length;n++){

                     mu.push(parseInt(mujeres[n]));
                };

               
                /**************************

                var ho = [];
                for (var n=0;n<hombres.length;n++){

                     ho.push(parseInt(hombres[n]));
                };
                
                /***************************/

            Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                colors: [
                  '#ED561B', '#50B432', '#DDDF00','#64E572', '#24CBE5', '#FF9655'
                    ],
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Representatividad',
            colorByPoint: true,
            data: [{
                name: 'CC.OO.',
                y: parseFloat(CCOO),
                sliced: true,
                selected: true
            }, {
                name: 'UGT',
                y: parseFloat(UGT)
            }, {
                name: 'CGT',
                y: parseFloat(CGT)
            }, {
                name: 'USOC',
                y: parseFloat(USOC)
            }, {
                name: 'CSIF',
                y: parseFloat(CSIF)
            }, {
                name: 'SI',
                y: parseFloat(SI)
            }]
        }]
    });

        </script>
		
		


	</body>
</html>