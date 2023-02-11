<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Tipo de sistema';
$this->breadcrumbs=array(
	'Tipo de sistema',
);
?>
<h3>Grafica de parametros</h3>
<?php
$this->beginWidget('application.extensions.jui.ETabs',
        array('name'=>'tabpanel1'));
?>
<?php $this->beginWidget('application.extensions.jui.ETab',
        array('name'=>'tab1','title'=>'Gráfico')) ?>
<!--<div class="container">-->
    <?php 
    $this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
        'modules/exporting', // adds Exporting button/menu to chart
        //'themes/dark-blue'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      //'colors'=>array('#FFD148', '#0563FE'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => true),
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        //'plotBorderWidth' => null,
        //'plotShadow' => true,
        'height' => 400,
      ),
      'title' => array('text' => "Porcentaje de sistemas del cantón $nombrecanton, parroquia de $parroquia"),
      'subtitle' => array('text' => 'Fuente: SENAGUA'),
      'tooltip' => array(
        'pointFormat' => '{series.name}: <b>{point.percentage:.2f}%</b>',
       'percentageDecimals' => 2,
        'formatter'=> 'js:function() { return this.point.name+":  <b>"+(this.point.percentage)+"</b>%"; }',
      ),
      'plotOptions' => array(
        'pie' => array(
          'allowPointSelect' => true,
          'cursor' => 'pointer',
          'dataLabels' => array(
            'enabled' => true,
            'color' => '#AAAAAA',
            'connectorColor' => '#AAAAAA',
              'showInLegend'=>true,
             'format'=>'{point.name}: <b>{point.percentage:.2f}%</b>',
          ),
          'showInLegend'=>true,
        )
      ),
      'series' => array(
        array(
          'type' => 'pie',
          'name' => 'Porcentaje',
          'data' => array(
            array('A gravedad', $gravedad),
            array('Bombeo', $bombeo)
          ),
        ),
      ),
    )
  ));
    ?>
<!--</div>-->
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',
        array('name'=>'tab2','title'=>'Resultados')) ?>
<h4>Cantón <?php echo $nombrecanton ?>
        <br>
        Parroquia <?php echo $parroquia ?>
    </h4>
<div class="alert alert-success">
    <p><strong>Sistemas a bombeo: </strong> <?php echo $bombeo; ?></p>
    <p><strong>Sistemas a gravedad:</strong> <?php echo $gravedad; ?></p> 
</div>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabs'); ?>
<br>
<?php echo CHtml::link("Atras", Yii::app()->request->baseUrl."/tipos/index",array("class"=>"label label-success")); ?>
