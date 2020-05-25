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
                
            /************** VEINTEAÑEROS/AS*******************/
                $resultVeinteañerOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as veinteañeros from afiliacion where fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 30 YEAR)");

                $veinteañerOs = array();

                foreach ($resultVeinteañerOs as $row2) {
                        $veinteañerOs[] = $row2['veinteañeros'];

                };


                $resultVeinteañerAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as veinteañeras from afiliacion where fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 30 YEAR)");
     
                $veinteañerAs = array();

                foreach ($resultVeinteañerAs as $row3) {
                        $veinteañerAs[] = $row3['veinteañeras'];

                };
            
              /************** TREINTAÑEROS/AS*******************/
                $resultTreintañerOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as treintañerOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 30 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 40 YEAR)");

                $treintañerOs = array();

                foreach ($resultTreintañerOs as $row2) {
                        $treintañerOs[] = $row2['treintañerOs'];

                };


                $resultTreintañerAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as treintañerAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 30 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 40 YEAR)");
     
                $treintañerAs = array();

                foreach ($resultTreintañerAs as $row3) {
                        $treintañerAs[] = $row3['treintañerAs'];

                }; 
             
              /************** CUARENTA Y POCOS/AS*******************/
                $resultCuarentaypocOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as cuarentaypocOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 40 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 45 YEAR)");

                $cuarentaypocOs = array();

                foreach ($resultCuarentaypocOs as $row2) {
                        $cuarentaypocOs[] = $row2['cuarentaypocOs'];

                };


                $resultCuarentaypocAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as cuarentaypocAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 40 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 45 YEAR)");

                $cuarentaypocAs = array();

                foreach ($resultCuarentaypocAs as $row3) {
                        $cuarentaypocAs[] = $row3['cuarentaypocAs'];

                };

                /************** CUARENTA Y LARGOS/AS*******************/
                $resultCuarentaylargOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as cuarentaylargOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 45 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 50 YEAR)");

                $cuarentaylargOs = array();

                foreach ($resultCuarentaylargOs as $row2) {
                        $cuarentaylargOs[] = $row2['cuarentaylargOs'];

                };


                 $resultCuarentaylargAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as cuarentaylargAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 45 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 50 YEAR)");

                $cuarentaylargAs = array();

                foreach ($resultCuarentaylargAs as $row3) {
                        $cuarentaylargAs[] = $row3['cuarentaylargAs'];

                };

                /************** CINCUENTA Y POCOS/AS*******************/
                $resultCincuentaypocOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as cincuentaypocOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 50 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 55 YEAR)");

                $cincuentaypocOs = array();

                foreach ($resultCincuentaypocOs as $row2) {
                        $cincuentaypocOs[] = $row2['cincuentaypocOs'];

                };


                $resultCincuentaypocAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as cincuentaypocAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 50 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 55 YEAR)");

                $cincuentaypocAs = array();

                foreach ($resultCincuentaypocAs as $row3) {
                        $cincuentaypocAs[] = $row3['cincuentaypocAs'];

                };

                /************** CINCUENTA Y LARGOS/AS*******************/
                $resultCincuentaylargOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as cincuentaylargOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 55 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 60 YEAR)");

                $cincuentaylargOs = array();

                foreach ($resultCincuentaylargOs as $row2) {
                        $cincuentaylargOs[] = $row2['cincuentaylargOs'];

                };


                 $resultCincuentaylargAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as cincuentaylargAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 55 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 60 YEAR)");

                $cincuentaylargAs = array();

                foreach ($resultCincuentaylargAs as $row3) {
                        $cincuentaylargAs[] = $row3['cincuentaylargAs'];

                };

                /************** SESENTEROS/AS*******************/
                $resultSesenterOs = $conexion->query("select COUNT(IF(sexo='H',sexo,NULL)) as sesenterOs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 60 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 100 YEAR)");

                $sesenterOs = array();

                foreach ($resultSesenterOs as $row2) {
                        $sesenterOs[] = $row2['sesenterOs'];

                };


                $resultSesenterAs = $conexion->query("select COUNT(IF(sexo='M',sexo,NULL)) as sesenterAs from afiliacion where fechaNacimiento < DATE_SUB(CURDATE(), INTERVAL 60 YEAR) and fechaNacimiento > DATE_SUB(CURDATE(), INTERVAL 100 YEAR)");

                $sesenterAs = array();

                foreach ($resultSesenterAs as $row3) {
                        $sesenterAs[] = $row3['sesenterAs'];

                };

            
 
        ?>
        <script>
            
              var veinteañerOs=<?php echo json_encode($veinteañerOs);?>;

              
              var veinteañerAs=<?php echo json_encode($veinteañerAs);?>;

              var treintañerOs=<?php echo json_encode($treintañerOs);?>;

              var treintañerAs=<?php echo json_encode($treintañerAs);?>;

              var cuarentaypocOs=<?php echo json_encode($cuarentaypocOs);?>;

              var cuarentaypocAs=<?php echo json_encode($cuarentaypocAs);?>;

              var cuarentaylargOs=<?php echo json_encode($cuarentaylargOs);?>;

              var cuarentaylargAs=<?php echo json_encode($cuarentaylargAs);?>;

              var cincuentaypocOs=<?php echo json_encode($cincuentaypocOs);?>;

              var cincuentaypocAs=<?php echo json_encode($cincuentaypocAs);?>;

              var cincuentaylargOs=<?php echo json_encode($cincuentaylargOs);?>;

              var cincuentaylargAs=<?php echo json_encode($cincuentaylargAs);?>;
             
              var sesenterOs=<?php echo json_encode($sesenterOs);?>;

              var sesenterAs=<?php echo json_encode($sesenterAs);?>;

             
              
       
var categories = [
    'hasta 30 años', 'de 31 a 40 años', 'de 41 a 45 años', 'de 46 a 50 años',
    'de 51 a 55 años', 'de 56 a 60 años', 'mas de 61 años'
];

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Afiliación por Edad y Genero'
    },
    subtitle: {
        //text: 
    },
    xAxis: [{
        categories: categories,
        reversed: false,
        labels: {
            step: 1
        }
    }, { 
        opposite: true,
        reversed: false,
        categories: categories,
        linkedTo: 0,
        labels: {
            step: 1
        }
    }],
    yAxis: {
        title: {
            text: null
        },
        labels: {
           
           formatter: function () { return Math.abs(this.value);
            }
        }
    },

    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + ', edad ' + this.point.category + '</b><br/>' +
                'cantidad: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
        }
    },

    series: [{
        name: 'Hombres',
        color: 'blue',
        data: [
            -parseInt(veinteañerOs), -parseInt(treintañerOs), -parseInt(cuarentaypocOs), -parseInt(cuarentaylargOs), -parseInt(cincuentaypocOs), -parseInt(cincuentaylargOs), -parseInt(sesenterOs)
        ]
    }, {
        name: 'Mujeres',
        color: '#DC143C',
        data: [
            parseInt(veinteañerAs), parseInt(treintañerAs), parseInt(cuarentaypocAs), parseInt(cuarentaylargAs), parseInt(cincuentaypocAs), parseInt(cincuentaylargAs), parseInt(sesenterAs)
        ]
    }]
});


        </script>
        
        


    </body>
</html>