<?php
    include 'funcionesgrafico_canton.php';
	$id_canton = (int) $_POST['canton1'];
	$gravedad= canton_gravedad($id_canton);
    $bombeo=  canton_bombeo($id_canton);
    $mixto= canton_mixto($id_canton);
   


$mysqli=Conexion::con();
    unset($sql);
    $sql = "
    SELECT cantones.nombrecanton, provincias.nom_provincia FROM `cantones` INNER JOIN `provincias` WHERE cantones.codcanton = '$id_canton' AND cantones.cod_provincia = provincias.cod_provincia";
    $respuesta = $mysqli->query($sql);
    mysqli_data_seek ($respuesta, 0);
    $extraido= mysqli_fetch_array($respuesta);
    
    mysqli_free_result($respuesta);

    $mysqli->close();
    ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    

 <div id="container"> </div>

<script>
  
              
    	Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
        text: '<b>Reporte Sistemas de Agua: </b><?php  
                echo $extraido['nom_provincia'];
                echo " - ";
                echo $extraido['nombrecanton']; ?>'
                
    },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Porcentaje',
                data: [
                    ['A gravedad', <?php echo $gravedad ?>],
                    ['Mixto', <?php echo $mixto ?>],
                    {
                        name: 'Bombeo',
                        y: <?php echo $bombeo?>,
                        sliced: true,
                        selected: true
                    }
                ]
            }]
  });
    </script>

    
    <div id="grafica">
         
        
         </div>
