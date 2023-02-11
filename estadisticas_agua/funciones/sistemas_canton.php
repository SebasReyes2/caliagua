<?php
if (isset($_POST["s_canton"])) {
require_once 'funciones/nombres_canton.php';

function bombeo_canton($id_canton){
    require_once '../conexion/Conexion.php';
    //$sql = array();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton 
			
            where cantones.codcanton='$id_canton' and tiposistema='Bombeo';";
    $resp = mysql_query($sql,Conexion::con());
    $num = mysql_num_rows($resp);
    mysql_free_result($resp);
    mysql_close();
    return $num;
}

function gravedad_canton($id_canton){
    require_once '../conexion/Conexion.php';
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton 
            where cantones.codcanton='$id_canton' and tiposistema='A gravedad';";
    $resp2 = mysql_query($sql,Conexion::con());
    $num = mysql_num_rows($resp2);
    mysql_free_result($resp2);
    mysql_close();
    return $num;
}
function mixto_canton($id_canton){
    require_once '../conexion/Conexion.php';
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton 
            where cantones.codcanton='$id_canton' and tiposistema='Mixto';";
    $resp2 = mysql_query($sql,Conexion::con());
    $num = mysql_num_rows($resp2);
    mysql_free_result($resp2);
    mysql_close();
    return $num;
}
unset($id);
$id = (int)$_POST["s_canton"];
$nombreprovincia = nombre_provincia($id);
$nombrecanton = nombre_canton($id);
$bombeo = bombeo_canton($id);
$gravedad = gravedad_canton($id);
$mixto = mixto_canton($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sistemas por canton</title>
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
		// construccion de la grafica
        $('#grafica').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Tipos de sistemas del canton: <?php echo $nombrecanton; ?>'
            },
            subtitle: {
                    text: 'Fuente: Secretaria del agua.'
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
                    {
                        name: 'Bombeo',
                        y: <?php echo $bombeo ?>,
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
    <?php if (($bombeo>0) or ($gravedad>0) or ($mixto>0)) { ?>
    <div id="grafica" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;">
  
    </div>
    <?php 
    }else{ ?>
    <div class="container text-center">
        <div class="alert alert-error">
            <h2>NO EXISTEN DATOS... <?php echo $nombrecanton ?></h2>
        </div>
    </div>
    <?php
    }
    ?>
    
</body>
</html>
<?php 
}else{
    header("Location: tipo_sistema.php");
}
?>

