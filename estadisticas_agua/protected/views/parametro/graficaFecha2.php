<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Gráfica del parámetro y fechas';
$this->breadcrumbs=array('Gráfica del parámetro con rango de fechas',
);
$titulo = "Gráfico de niveles de $parametro de $nombresistema";
$titulo = strtoupper($titulo);
$lim_inferior = array();
if($parametro == "ph" or $parametro=="PH"){
for ($i=0;$i<count($reg);$i++):
    $lim_inferior[]=6;
endfor;
}else{
for ($i=0;$i<count($reg);$i++):
    $lim_inferior[]=0.3;
endfor;
}
?>

<h3>Gráfica de niveles de <?php echo strtolower($parametro) ?></h3>

<p>Desde: <?php echo $fecha1 ?> al <?php echo $fecha2 ?></p>

<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs')); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab1','title'=>'Gráfico')) ?>
<?php if (count($reg)>0) { ?>
<!--<div class="container">-->
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'highcharts-more',   
        'modules/exporting', 
        'themes/sand'        
    ),
   'options'=>array(
      'chart' => array(
        'plotBackgroundColor' => '#cccccc',
      ),
      'title' => array('text' =>$titulo ),
      'subtitle' => array('text' => 'Fuente: aguapotable.unach.edu.ec'),
      'xAxis' => array(
         'categories' => $mes
      ),
      'yAxis' => array(
         'title' => array('text' => "NIVELES DE ".$parametro." ($unidad)")
      ),
       'plotOptions'=>array(
           'line'=>array(
               'enableMouseTracking'=>true,
               'dataLabels'=>array(
                   'enabled'=>true,
               ),
           ),
          
       ),
      'colors'=>array("#0099ff","#ff0033","#ff0033"),
      'series' => array(
         array('name' => $parametro, 'data' => $reg,'marker'=>array('symbol'=>'diamond')),
         array('name'=>'Limite permisible','data'=>$lim,'dashStyle'=>'shortdot',
             'marker'=>array('enabled'=>false),'dataLabels'=>array('enabled'=>false)),
         array('name'=>'Limite permisible','data'=>$lim_inferior,'dashStyle'=>'shortdot',
             'marker'=>array('enabled'=>false),'dataLabels'=>array('enabled'=>false)),
      )
   )
));
?>
<!--</div>-->
<p class="text-right"><small>L&iacute;mite permisible para <?php echo strtolower($parametro) ?> es <strong><?php echo $lim_inferior[0]." a ".$lim[0]." ".$unidad; ?></strong></small></p>
<?php 
$n = count($reg);
if(($reg[$n-1]<$lim_inferior[0]) or ($reg[$n-1]>$lim[0]))
{
    $indicador = strtolower($parametro);
    echo "<div class='alert alert-error'>Según el último resultado, el parámetro <strong>$indicador</strong> no está dentro de los límite permisible <strong>$lim_inferior[0] a $lim[0]</strong></div>";
}
?>
<?php }else{
    echo "<h3>NO SE HAN ENCONTRADO REGISTROS</h3>";
} 
?>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab2','title'=>'Datos')) ?>
<?php if (count($reg)>0) { ?>
<div class="container">
    <script language="javascript" >
        $(document).ready(function(){
                        $("#tb_resultados").dataTable({
                            "sPaginationType":"full_numbers",
                            "bJQueryUI":true,
                            "bProcessing": true,
                            "oLanguage":{
                                "sLengthMenu": "Ver _MENU_ fichas",
                                "sInfo": "Resultados _START_ - _END_ de _TOTAL_ fichas",
                                "sSearch":"Buscar: ",
                                "sInfoFiltered":"(Filtrado de _MAX_ fichas)",
                                "oPaginate":{
                                "sFirst": "Primero",
                                "sLast":"Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            }
                            }
                        });
                    });
        </script>
    <h4><?php echo $nombresistema ?></h4>
    <p><strong>Se han encontrado:</strong> <?php echo count($reg) ?> registros</p>
    <table class="table table-striped table-bordered" id="tb_resultados">
        <thead>
            <tr>
                <th>Sitio de toma de muestra</th>
                <th>Fecha y hora de recolecci&oacute;n</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($reg);$i++) { ?>
            <tr>
                <td><?php echo $fuente[$i] ?></td>
                <td><?php echo $mes[$i] ?></td>
                <td><?php echo $reg[$i] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php }else{
    echo "<h3>NO SE HAN ENCONTRADO REGISTROS</h3>";
}
?>
<?php $this->endWidget('application.extensions.jui.ETab') ?>
<?php $this->endWidget('ap[lication.extensions.jui.ETabs'); ?>
<br>
<?php echo CHtml::link("Atras", Yii::app()->request->baseUrl."/parametro/index",array("class"=>"label label-success")); ?>

