<?php
    include 'funcionesgrafico.php';
    $id_parroquia=(int) $_POST['parroquia'];
    $gravedad= parroquia_gravedad($id_parroquia);
    $bombeo=  parroquia_bombeo($id_parroquia);
    $mixto= parroquia_mixto($id_parroquia);



    $mysqli=Conexion::con();
    unset($sql);
    $sql = "
    SELECT cantones.nombrecanton, parroquias.nombreparroquia FROM `parroquias` INNER JOIN `cantones` WHERE parroquias.codparroquia = '$id_parroquia' AND cantones.codcanton = parroquias.codcanton";
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
               echo $extraido['nombrecanton'];  
               echo " - ";
               echo $extraido['nombreparroquia'];
               ?>'
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

   
<div id="grafica"></div>   

