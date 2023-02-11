<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Gráfica del parámetro';
$this->breadcrumbs=array('Gráfica del parámetro',
);
$titulo = "Gráfico de niveles de $parametro de $nombre_sistema";
$titulo = strtoupper($titulo);
$lim_inferior = array();
if($parametro == "ph" or $parametro=="PH"){
for ($i=0;$i<count($regi);$i++):
    $lim_inferior[]=6;
endfor;
}else{
for ($i=0;$i<count($regi);$i++):
    $lim_inferior[]=0.3;
endfor;
}
?>
<br>
<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs')); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab1','title'=>'Gráfico')) ?>
<?php if (count($regi)>0){ ?>
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
          'type'=>'line'
      ),
      'title' => array('text' => $titulo),
      'subtitle' => array('text' => "Fuente: <strong>SENAGUA</strong> "),
      'xAxis' => array(
         'categories' => $mes
      ),
      'yAxis' => array(
         'title' => array('text' =>"NIVELES DE ".$parametro." ($unidad)")
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
         array('name' => $parametro, 'data' => $regi,'marker'=>array('symbol'=>'diamond','radius'=>4)),
         array('name'=>'Limite superior','data'=>$lim,'dashStyle'=>'shortdot','marker'=>array('enabled'=>false),
                 'dataLabels'=>array('enabled'=>false)),
         array('name'=>'Limite inferior','data'=>$lim_inferior,'dashStyle'=>'shortdot',
             'marker'=>array('enabled'=>false),
                 'dataLabels'=>array('enabled'=>false))
      )
   )
));
?>
<p class="text-right"><small>L&iacute;mites permisibles para <?php echo strtolower($parametro) ?> es de <?php echo $lim_inferior[0] ?> a <?php echo $lim[0]." ".$unidad ?>. </small></p>
<?php 
$n = count($regi);
//echo $n." ".$regi[$n-1]." ".$lim[0]." ".$lim_inferior[0]," ".$parametro;
if(($regi[$n-1]<$lim_inferior[0]) or ($regi[$n-1]>$lim[0]))
{
    $indicador = strtolower($parametro);
    echo "<div class='alert alert-error'>Según el último resultado, el parámetro <strong>$indicador</strong> no está dentro de los límites permisibles <strong>$lim_inferior[0] a $lim[0]</strong></div>";
}
?>
<?php
}else{
      echo "<h3>NO SE HAN ENCONTRADO REGISTROS</h3>";
  }
?> 
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab2','title'=>'Datos')) ?>
<?php if (count($regi)>0) { ?>
<div class="">
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
    <h4><?php echo $nombre_sistema ?></h4>
    <p>Se han encontrado: <?php echo count($regi) ?> registros</p>
    <table class="table table-striped table-bordered" id="tb_resultados">
        <thead>
            <tr>
                <th>Sitio de toma de muestra</th>
                <th>Fecha y hora de recolecci&oacute;n</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($regi);$i++) { ?>
            <tr>
                <td><?php echo $fuente[$i] ?></td>
                <td><?php echo $mes[$i] ?></td>
                <td><?php echo $regi[$i] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
}else{
    echo "<h3>NO SE HAN ENCONTRADO REGISTROS</h3>";
}
?>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabs'); ?>
<br>
<?php echo CHtml::link("Atras", Yii::app()->request->baseUrl."/parametro/index",array("class"=>"label label-success")); ?>

