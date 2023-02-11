<?php
     
    include 'funcionesgrafico_provincia.php';
	$id_provincia=(int) $_POST['provincia1'];
    $gravedad= provincia_gravedad($id_provincia);
    $bombeo= provincia_bombeo($id_provincia);
    $mixto= provincia_mixto($id_provincia);

 // echo "Sistemas a gravedad".$bombeo;

$mysqli=Conexion::con();
    unset($sql);
    $sql = "
    SELECT * FROM  `provincias` WHERE cod_provincia = '$id_provincia' ";
    $respuesta = $mysqli->query($sql);
    mysqli_data_seek ($respuesta, 0);
    $extraido= mysqli_fetch_array($respuesta);
    
    mysqli_free_result($respuesta);

    $mysqli->close();




    ?>



    <div id="container"> </div>



<script>   
    	
        // Construyendo el grafico
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
        text: '<b>Reporte Sistemas de Agua: </b><?php 
                echo $extraido['nom_provincia'];
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
  
  
   
    
    



