<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once '../clases/Sistema.php';
include_once '../conexion/Conexion.php';
include_once '../clases/nombre_provincia.php';
include_once '../clases/nombre_canton.php';
include_once 'funciones/funciones_grafica1.php';
$id_provincia = $_POST["provincia"];
$id_canton = $_POST["canton"];
$id_sistema=$_POST["sistema"];
$indicador = $_POST["parametro"];
$fecha_inicial = $_POST["fecha_inicial"];
$fecha_final = $_POST["fecha_final"];
/*OBTENER EL NOMBRE DEL SISTEMA*/
$sistema = new Sistema();
$dato_sistema = $sistema->nombre_by_id($id_sistema);
$nombre_sistema = $dato_sistema[0]["nombresistema"];
/*CARGAR LOS DATOS CON UNA CONSULTA*/
unset($sql,$muestra_canton);
$muestra_canton = canton($id_canton);
$sql = "select $indicador,fecha,hora,fuente from $muestra_canton 
		where codsistema='$id_sistema' and $indicador!='' order by fecha ASC;";
$mysqli=Conexion::con();
$resp = $mysqli->query($sql);
$total = $resp->num_rows;
$datos = array();
while ($reg = $resp->fetch_assoc()) {
    $datos[] = $reg;
}
$mysqli->close();
/*titulo del eje y*/
$titulox = titulo_ejey($indicador);
//titulo del parametro
$titulo = titulo_grafica($indicador);
$limites = getLimitePermisible($indicador);
$lim1 = $limites[0];
$lim2 = $limites[1];
?>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
   

<script>
    $(document).ready(function(){
        $("#pestania").tabs({
           collapsible: false
       });

        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafico de niveles de <?php echo $titulo ?>'
            },
            subtitle: {
                text: 'Fuente: SENAGUA'
            },
            xAxis: {
                categories: [
                    <?php for ($i=0;$i<$total;$i++) {
                        echo "'".$datos[$i]["fecha"]."/".$datos[$i]["hora"]."'"; 
                        if ($i<$total-1){
                          echo ',';  
                        }
                    } 
                    ?>
                ]
            },
            yAxis: {
                title: {
                    text: '<?php echo $titulox ?>'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true,
                    'colors':['#0099ff','#ff0033','#ff0033']
                }
            },
                
            series: [
            {
                name: '<?php echo $titulo ?>',
                marker: {
                    symbol: 'square'
                },
                data: [
                    <?php for ($i=0;$i<$total;$i++) {
                        echo $datos[$i]["$indicador"]; 
                        if ($i<$total-1){
                          echo ',';  
                        }
                    } 
                    ?>
                ]
            },
            {
            name:'limite inferior',
            marker: {
                    enabled:false
                },
                dataLabels:{enabled:false},
            data: [
                <?php for ($i=0;$i<$total;$i++) {
                        echo $lim1; 
                        if ($i<$total-1){
                          echo ',';  
                        }
                    } 
                    ?>
            ],
            dashStyle:'shortdot',
            color:'#ff0033'
            },
            {
            name:'limite superior',
            marker: {
                    enabled:false
                },
                dataLabels:{enabled:false},
            data: [
                <?php for ($i=0;$i<$total;$i++) {
                        echo $lim2; 
                        if ($i<$total-1){
                          echo ',';  
                        }
                    } 
                    ?>
            ],
            dashStyle:'shortdot',
            color:'#ff0033'
            }
        ]
        });
        
    });
</script>


<body>
    <?php if (count($datos)>0) { ?>
<!--    <div class="container">-->
        <div id="pestania">
            <ul>
                <li><a href="#tab1">Gráfico</a></li>
            <li><a href="#tab2">Datos</a></li>
            </ul>
            <div id="tab1">
                <h3><?php echo $nombre_sistema ?> <br> </h3>
                <div id="container">
                </div>
            </div>
            <div id="tab2">
                <h3><?php echo $nombre_sistema ?> <br> </h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sitio de toma de muestra</th>
                            <th>Fecha/hora de recoleccion</th>
                            <th><?php echo $titulo ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0;$i<$total;$i++) { ?>
                         <tr>
                             <td><?php echo $datos[$i]["fuente"] ?></td>
                             <td><?php echo $datos[$i]["fecha"]." / ".$datos[$i]["hora"] ?></td>
                             <td><?php echo $datos[$i]["$indicador"] ?></td>
                         </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        
<!--    </div>-->
    <?php } else{ ?>
    <div class="container text-center alert alert-info">
        <h3>NO SE HAN ENCONTRADO DATOS</h3>
    </div>
    <?php } ?>
</body>


