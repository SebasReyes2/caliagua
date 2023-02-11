<?php
if (isset($_POST["canton"]) and isset($_POST["parroquia"])) {
include_once 'funciones/nombres_provincia.php';
include_once 'funciones/nombres_canton.php';
include_once 'funciones/nombre_paroquia.php';
include_once '../funciones/tildes.php';
function parroquia_gravedad($id_parroquia){
    include_once '../conexion/Conexion.php';
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='A gravedad';";
    $respuesta = mysql_query($sql,  Conexion::con());
    $n_reg = mysql_num_rows($respuesta);
    mysql_free_result($respuesta);
    mysql_close();
    return $n_reg;
}
function parroquia_bombeo($id_parroquia){
    include_once '../conexion/Conexion.php';
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='Bombeo';";
    $respuesta = mysql_query($sql,  Conexion::con());
    $n_reg = mysql_num_rows($respuesta);
    mysql_free_result($respuesta);
    mysql_close();
    return $n_reg;
}
$idprovincia = (int)$_POST['provincia'];
$idcanton = (int)$_POST['canton'];
$idparroquia = (int)$_POST['parroquia'];
$datos = new Parroquia();
$dat = $datos->nombreparroquia($idparroquia);
$parroquia = chao_tilde($dat[0]['nombreparroquia']);
$canton = nombre_canton($idcanton);
$n_gravedad = parroquia_gravedad($idparroquia);
$n_bombeo = parroquia_bombeo($idparroquia);
$n_mixto = parroquia_mixto($idparroquia);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="../js/highcharts.js"></script>
    <script type="text/javascript" src="../js/modules/exporting.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
    	// Radialize the colors
        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
            return {
                radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });
        // Construyendo el grafico
        $('#grafica').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: { 
		    text: '<b>Reporte Sistemas de Agua: </b><?php 
                echo ;
                
                ?>' 
		},
	     subtitle:{
		     text: 'Fuente: Secretaria del agua'
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
                    ['A gravedad', <?php echo $n_gravedad ?>],
                    {
                        name: 'Bombeo',
                        y: <?php echo $n_bombeo ?>,
                        sliced: true,
                        selected: true
                    }
                ]
            }]
        });
    });
    </script>
</head>
<body>
    <?php if (($n_bombeo>0) or ($n_gravedad>0) or ($n_mixto>0)) { ?>
    <div class="container text-center">
        <div id="grafica" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;">
           
        </div>
    </div>
    <?php }else { ?>
    <div class="container text-center">
        <div class="alert alert-error">
            <h2>NO EXISTEN DATOS DE LA PARROQUIA <span style="font-style: oblique; "><?php echo $parroquia ?></span></h2>
        </div>
    </div>
    <?php } ?>
</body>
</html>
<?php 
}else{
    header("Location: tipo_sistema.php");
}
