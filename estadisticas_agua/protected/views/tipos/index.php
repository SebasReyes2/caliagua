<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Tipo de sistema';
$this->breadcrumbs=array(
	'Tipo de sistema',
);
?>

<h3>Pocentaje de tipo de sistemas de agua por: </h3>
<?php if (Yii::app()->user->hasFlash('mensaje'))  { ?>
<div class="alert alert-info" id="mensaje"><?php echo Yii::app()->user->getFlash('mensaje') ?></div>
<?php } ?>
<?php
$this->beginWidget('application.extensions.jui.ETabs',
        array('name'=>'tabpanel1'));
?>
<?php $this->beginWidget('application.extensions.jui.ETab',
        array('name'=>'tab1','title'=>'Cantón')) ?>
<div class="row-fluid">
<div class="alert alert-info span4">
    <?php echo CHtml::beginForm('','post',array("name"=>"sistemas","id"=>"sistemas")); ?>

    <?php
    echo CHtml::activeDropDownList($model,'codcanton',
     CHtml::listData(Cantones::model()->findAll(), 'codcanton', 'nombrecanton'),
     array('ajax'=>array(
         'type'=>'POST',
         'url'=>  CController::createUrl('tipos/ListaParroquias'),
         'update'=>'#'.CHtml::activeId($model,'codparroquia'),
         'beforeSend' => 'function(){
                               $("#Sistemas_codparroquia").find("option").remove();
                               }'
     ),"prompt"=>"--Seleccionar cantón--"));
    echo CHtml::error($model,'codcanton');
    ?>
    <br>
    <?php
    $lista_dos = array();
    if(isset($model->codparroquia)){
    $id_uno = (int)($model->codcanton); 
    $lista_dos = CHtml::listData(Parroquias::model()->findAll("codcanton = '$id_uno'"),'codparroquia','nombreparroquia');
    } 
    echo CHtml::activeDropDownList($model,'codparroquia',$lista_dos,array("prompt"=>"--Seleccionar parroquia--"));
    echo CHtml::error($model, 'codparroquia');
    ?>
    <br>
    <?php
        echo CHtml::submitButton("submit",array("value"=>"Generar gráfica","title"=>"Generar gráfica","class"=>"btn btn-success"));
    ?>

<?php echo CHtml::endForm(); ?>
</div>
</div>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabs'); ?>
<p class="text-center">Los resultados se muestran con la información que al momento está en la base de datos</p>
<script type="text/javascript">
    $(document).ready(function(){
        $("#mensaje").fadeIn(500);
        $("#mensaje").fadeOut(4000, function() { $(this).remove(); });
        $("#sistemas").validate({
            rules:{
                    'Sistemas[codcanton]':'required'
                } 
        });
    });
</script>