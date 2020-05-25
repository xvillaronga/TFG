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

            #container {
			    height: 500px; 
			    min-width: 310px; 
			    max-width: 800px; 
			    margin: 0 auto; 
			}
			.loading {
			    margin-top: 10em;
			    text-align: center;
			    color: gray;
			}
        </style>
       

        <script type="text/javascript" src="../../js/jquery/jquery-3.3.1.min.js"></script>
         <script type="text/javascript" src="../../js/highcharts/highmaps.js"></script>
         <script type="text/javascript" src="../../js/highcharts/es-all.js"></script>
<!--
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
		
	<script src="https://code.highcharts.com/mapdata/countries/es/es-all.js"></script>
--> 
    </head>
    <body>
 
    	<div id="container" style="min-width: 610px; height: 600px; margin: 0 auto"></div>



<?php

       

            include("../conexion.php");


                
           


            /***************TOTAL******************/
                //$result = $conexion->query("select * from provinciasporcentajecenso");

                $result = $conexion->query("select CE.provincia, FORMAT(count(AF.NIF)/count(CE.NIF)*100,2) as PorcentajeCenso from censo CE left join afiliacion AF  on CE.NIF=AF.NIF group by CE.provincia");



               // $afBaleares = array();

                $n=0;

                foreach ($result as $row) { 

                    $valorProvincia[$n] = $row['PorcentajeCenso']; 
                    $n++;

                };

            /*********************************/

          


?>




        <script>

            var afCoruña=<?php echo ($valorProvincia[0]);?>;
            var afAlbacete=<?php echo ($valorProvincia[1]);?>;
            var afAlicante=<?php echo ($valorProvincia[2]);?>;
            var afAlmeria=<?php echo ($valorProvincia[3]);?>;
            var afAsturias=<?php echo ($valorProvincia[4]);?>;
            var afAvila=<?php echo ($valorProvincia[5]);?>;
            var afBadajoz=<?php echo ($valorProvincia[6]);?>;
            var afBaleares=<?php echo ($valorProvincia[7]);?>;
            var afBarcelona=<?php echo ($valorProvincia[8]);?>;
            var afBurgos=<?php echo ($valorProvincia[9]);?>;
            var afCadiz=<?php echo ($valorProvincia[10]);?>;
            var afCantabria=<?php echo ($valorProvincia[11]);?>;
            var afCastellon=<?php echo ($valorProvincia[12]);?>;
            var afCeuta=<?php echo ($valorProvincia[13]);?>;
            var afCiudadreal=<?php echo ($valorProvincia[14]);?>;
            var afCordoba=<?php echo ($valorProvincia[15]);?>;
            var afCuenca=<?php echo ($valorProvincia[16]);?>;
            var afGirona=<?php echo ($valorProvincia[17]);?>;
            var afGranada=<?php echo ($valorProvincia[18]);?>;
            var afGuadalajara=<?php echo ($valorProvincia[19]);?>;
            var afHuelva=<?php echo ($valorProvincia[20]);?>;
            var afHuesca=<?php echo ($valorProvincia[21]);?>;
            var afJaen=<?php echo ($valorProvincia[22]);?>;
            var afRioja=<?php echo ($valorProvincia[23]);?>;
            var afLaspalmas=<?php echo ($valorProvincia[24]);?>;
            var afLeon=<?php echo ($valorProvincia[25]);?>;
            var afLleida=<?php echo ($valorProvincia[26]);?>;
            var afMadrid=<?php echo ($valorProvincia[27]);?>;
            var afMalaga=<?php echo ($valorProvincia[28]);?>;
            var afMelilla=<?php echo ($valorProvincia[29]);?>;
            var afMurcia=<?php echo ($valorProvincia[30]);?>;
            var afNavarra=<?php echo ($valorProvincia[31]);?>;
            var afOurense=<?php echo ($valorProvincia[32]);?>;
            var afPalencia=<?php echo ($valorProvincia[33]);?>;
            var afSalamanca=<?php echo ($valorProvincia[34]);?>;
            var afSantacruz=<?php echo ($valorProvincia[35]);?>;
            var afSegovia=<?php echo ($valorProvincia[36]);?>;
            var afSevilla=<?php echo ($valorProvincia[37]);?>;
            var afSoria=<?php echo ($valorProvincia[38]);?>;
            var afTarragona=<?php echo ($valorProvincia[39]);?>;            
            var afToledo=<?php echo ($valorProvincia[40]);?>;
            var afValencia=<?php echo ($valorProvincia[41]);?>;
            var afValladolid=<?php echo ($valorProvincia[42]);?>;
            var afZamora=<?php echo ($valorProvincia[43]);?>;
            var afZaragoza=<?php echo ($valorProvincia[44]);?>;




//var afAlava=<?php //echo ($valorProvincia[8]);?>;  
//var afGuipuzcoa=<?php //echo ($valorProvincia[9]);?>;


//var afTeruel=<?php //echo ($valorProvincia[21]);?>;

//var afVizcaya=<?php //echo ($valorProvincia[23]);?>;

//var afCaceres=<?php //echo ($valorProvincia[31]);?>;

//var afPontevedra=<?php //echo ($valorProvincia[38]);?>;

//var afLugo=<?php //echo ($valorProvincia[48]);?>;


  
var data = [
   
   ['es-va', parseFloat(afValladolid)],//valladolid 1
   
   ['es-le', parseFloat(afLeon)],//leon 2
    ['es-me', parseFloat(afMelilla)],//melilla 3
    ['es-p', parseFloat(afPalencia)],//palencia 4
    ['es-s', parseFloat(afCantabria)],//cantabria 5
    ['es-na', parseFloat(afNavarra)],//navarra 6
    ['es-ce', parseFloat(afCeuta)],//ceuta 7
    ['es-cu', parseFloat(afCuenca)],//cuenca 8
   
/*

    ['es-vi', parseFloat(afAlava)],//alava 9 
    ['es-ss', parseFloat(afGuipuzcoa)],//guipuzcoua 10
    
*/
    
    ['es-gr', parseFloat(afGranada)],//granada 11 
    ['es-mu', parseFloat(afMurcia)],//murcia 12
    ['es-bu', parseFloat(afBurgos)],//burgos 13 
    ['es-sa', parseFloat(afSalamanca)],//salamanca 14
    ['es-za', parseFloat(afZamora)],//zamora 15
    ['es-hu', parseFloat(afHuesca)],//huesca 16
    ['es-m', parseFloat(afMadrid)],//madrid 17
    ['es-gu', parseFloat(afGuadalajara)],//guadalajara 18
    ['es-sg', parseFloat(afSegovia)],//segovia 19
    ['es-se', parseFloat(afSevilla)],//sevilla 20
    ['es-t', parseFloat(afTarragona)],//tarragona 21
/*
    ['es-te', 22],//teruel 22
*/
    ['es-v', parseFloat(afValencia)],//valencia 23
/*
    ['es-bi', 24],//bizcaya 24
*/    
    ['es-or',  parseFloat(afOurense)],//orense 25

    ['es-l', parseFloat(afLleida)],//lleida 26
    ['es-z', parseFloat(afZaragoza)],//zaragoza 27
    ['es-gi', parseFloat(afGirona)],//girona 28
    ['es-ab', parseFloat(afAlbacete)],//Albacete 29
    ['es-a', parseFloat(afAlicante)],//alicante 30

    ['es-av', parseFloat(afAvila)],//avila 31
/*
    ['es-cc', parseFloat(afCaceres)],//caceres 32
*/
    ['es-to', parseFloat(afToledo)],//toledo 33
    ['es-ba', parseFloat(afBadajoz)],//badajoz 34
    ['es-co', parseFloat(afCordoba)],//Cordoba 35
    ['es-h', parseFloat(afHuelva)],//huelva 36
    ['es-c', parseFloat(afCoruña)],//Coruña 37
    ['es-ma', parseFloat(afMalaga)],//malaga 38
/*
    ['es-po', 39],//pontevedra 39
*/
    ['es-lo', parseFloat(afRioja)],//la rioja 40

    ['es-so', parseFloat(afSoria)],//soria 41
    ['es-al', parseFloat(afAlmeria)],//Almeria 42
    ['es-b', parseFloat(afBarcelona)],//barcelona 43
    ['es-ca', parseFloat(afCadiz)],// cadiz 44
    ['es-o', parseFloat(afAsturias)],//asturias 45
    ['es-cs', parseFloat(afCastellon)],//castellon 46
    ['es-cr', parseFloat(afCiudadreal)],// ciudad real 47
    ['es-j', parseFloat(afJaen)],// jaen 48
/*
    ['es-lu', 49],//lugo 49
*/
    ['es-tf', parseFloat(afSantacruz)],// santa cruz de tenerife 50
    ['es-gc', parseFloat(afLaspalmas)],// las palms 21
    ['es-pm', parseFloat(afBaleares)],//baleares 52
    //['undefined', 52]
   



];

// Create the chart
Highcharts.mapChart('container', {
    chart: {
        map: 'countries/es/es-all'
    },

    title: {
        text: 'Afiliación por provincias'
    },

    subtitle: {
        text: 'Mapa interactivo'
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: '% Afiliación',
        states: {
            hover: {
                color: '#BADA55'

            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }, {
        name: 'Separators',
        type: 'mapline',
        data: Highcharts.geojson(Highcharts.maps['countries/es/es-all'], 'mapline'),
        color: 'silver',
        showInLegend: false,
        enableMouseTracking: false
    }]
});



        </script>
        
        


    </body>
</html>