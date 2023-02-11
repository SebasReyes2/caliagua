<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Calidad agua Pallatanga';
$this->breadcrumbs=array('Calidad del agua del cantón Pallatanga',
);
?>
<h3>Calidad del agua del cantón Pallatanga</h3>
<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs','options'=>array('collapsible'=>true,'selected'=>1))); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab2','title'=>'Sistemas de agua')) ?>
<div class="content">
    <script language="javascript" >
        $(document).ready(function(){
                        $("#tb_resultados").dataTable({
                            "sPaginationType":"full_numbers",
                            "bJQueryUI":true,
                            "bProcessing": true,
                            "oLanguage":{
                                "sLengthMenu": "Ver _MENU_ sistemas",
                                "sInfo": "Resultados _START_ - _END_ de _TOTAL_ sistemas",
                                "sSearch":"Buscar: ",
                                "sInfoFiltered":"(Filtrado de _MAX_ sistemas)",
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
    <table class="table" id="tb_resultados">
        <thead>
            <tr>
                <th>N&deg;</th>
                <th>Parroquia</th>
                <th>Barrio</th>
                <th>Sistema</th>
                <th>Cumple norma</th>
            </tr>
        </thead>
        <tbody>
            <?php
            unset($s,$n,$sindatos);
            $s = 0;
            $n = 0;
            $sindatos = 0;
            for ($i = 0; $i < count($reg); $i++):
            ?>
            <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo $reg[$i]["nombreparroquia"] ?></td>
                <td><?php echo $reg[$i]["nombrebarrio"] ?></td>
                <td><?php echo $reg[$i]["nombresistema"] ?></td>
                <td>
                    <?php 
                    //unset($id2);
                    $id2 = $reg[$i]["codsistema"];
                    $datos = numreg_muestras_pallatanga($id2);
                    if($datos>0){
                        $regis = getCalidadPallatanga($id2);
                        if(count($regis)==1){
                            echo "<span class='btn btn-mini btn-success'>Si</span>";
                            $s=$s+1;
                        }else{ 
                            $codsistema = $reg[$i]["codsistema"];
                            $url = Yii::app()->request->baseUrl."/calidadAgua/detallesCalidad/$codsistema/$id"; 
                            echo '<a title="Ver detalles" class="btn btn-mini btn-danger" href="'.$url.'" target="new">No</a>';
                            $n=$n+1;
                      }
                    }else{
                        $sindatos=$sindatos+1;
                        echo "<span class='btn btn-mini btn-inverse'>Sin datos</span>";
                    }
                    ?>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab1','title'=>'Gráfica')) ?>

    <?php 
    $this->Widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'highcharts-more',   
        'modules/exporting',         
    ),
    'options' => array(
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => true),
      'chart' => array(
        'plotShadow' => true,
        'height' => 400
      ),
      'title' => array('text' => "Calidad del agua del cantón Pallatanga"),
      'subtitle' => array('text' => 'Fuente: aguapotable.unach.edu.ec'),
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
        'colors' =>array('#5bb75b','#da4f49','#363636'),
      'series' => array(
        array(
          'type' => 'pie',
          'name' => 'Porcentaje',
          'data' => array(
            array('Si cumplen', $s,),
            array('No cumplen', $n),
            array('Sin datos',$sindatos),
          ),
        ),
      ),
    )
  ));
    ?>

<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabS'); ?>
<br>
<?php echo CHtml::link("Atras", Yii::app()->request->baseUrl."/calidadAgua/index",array("class"=>"label label-success")); ?>








