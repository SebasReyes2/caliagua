<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Gráfica por parámetro';
$this->breadcrumbs=array(
	'Gráfica por parámetro',
);
?>
<h3>Gráfica de parámetros</h3>
<?php if (Yii::app()->user->hasFlash('mensaje'))  { ?>
<div class="alert alert-info"><?php echo Yii::app()->user->getFlash('mensaje') ?></div>
<?php } ?>
<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs')); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',
        array('name'=>'tab1','title'=>'Datos de consulta')) ?>
<?php echo CHtml::beginForm('','post',array("name"=>"muestras","id"=>"muestras")); ?>
<div class="row-fluid">
    
    <div class="alert alert-success span4 text-center">
            <?php 
            echo CHtml::activeDropDownList($model,'codcanton', 
                    CHtml::listData(Cantones::model()->findAll(), 'codcanton', 'nombrecanton'),
                    array('ajax'=>array(
                    'type'=>'POST',
                    'url'=>  CController::createUrl('parametro/ListaParroquias'),
                    'update'=>'#'.CHtml::activeId($model,'codparroquia'),
                    'beforeSend' => 'function(){
                                          $("#Muestras_codparroquia").find("option").remove();
                                          $("#Muestras_codbarrio").find("option").remove();
                                          $("#Muestras_codsistema").find("option").remove();
                                          }'
                    ),"prompt"=>"--Seleccionar cantón--","class"=>"input-xlarge"));
            ?>
            <?php echo CHtml::error($model,'codcanton'); ?>
            <br>
            <?php
            $lista_dos = array();
            if(isset($model->codparroquia)){
            $id_uno = (int)($model->codcanton); 
            $lista_dos = CHtml::listData(Parroquias::model()->findAll("codcanton = '$id_uno'"),'codparroquia','nombreparroquia');
            } 
            echo CHtml::activeDropDownList($model,'codparroquia',
                    $lista_dos,
                    array(
                        'ajax'=>array(
                    'type'=>'POST',
                    'url'=>  CController::createUrl('parametro/ListaBarrios'),
                    'update'=>'#'.CHtml::activeId($model,'codbarrio'),
                    'beforeSend' => 'function(){
                                        $("#Muestras_codbarrio").find("option").remove();
                                        $("#Muestras_codsistema").find("option").remove();
                                    }'
                    ),
                        "prompt"=>"--Seleccionar parroquia--",
                        "class"=>"input-xlarge"
                   ));
            echo CHtml::error($model, 'codparroquia');
            ?>
            <br>
            <?php
            $lista_tres = array();
            if(isset($model->codbarrio)){
            $id_dos = (int)($model->codparroquia); 
            $lista_tres = CHtml::listData(Barrios::model()->findAll("codparroquia = '$id_dos'"),'codbarrio','nombrebarrio');
            } 
            echo CHtml::activeDropDownList($model,'codbarrio',$lista_tres,
                    array(
                        'ajax'=>array(
                            'type'=>'POST',
                            'url'=> CController::createUrl('parametro/ListaSistemas'),
                            'update'=>'#'.CHtml::activeId($model,'codsistema'),
                            'beforeSend'=>'function(){
                                        $("#Muestras_codsistema").find("option").remove();
                                    }'
                        ),
                        "prompt"=>"--Seleccionar barrio--",
                        "class"=>"input-xlarge"
                   ));
            echo CHtml::error($model, 'codbarrio');
            ?>
            <br>
            <?php
            $lista_cuatro = array();
            if(isset($model->codsistema)){
                $id_tres=(int)($model->codbarrio);
                $lista_cuatro=  CHtml::listBox(Sistemas::model()->findAll("codbarrio = '$id_tres'"),'codsistema','nombresistema');
            }
            echo CHtml::activeDropDownList($model,'codsistema', $lista_cuatro,
                    array(
                        "prompt"=>"--Seleccionar sistema--",
                        "class"=>"input-xlarge"
                    )
                    );
            echo CHtml::error($model, 'codsistema');
            ?>
            
        </div>
    <div class="alert alert-info span4 text-center">
    <?php echo CHtml::activeDropDownList($model,'parametro', 
            array(
                'Características físicas'=>array(
                    'ph'=>'pH',
                    'color'=>'Color',
                    'turbiedad'=>'Turbiedad',
                    'temperatura'=>'Temperatura',
                    'solidos_totales'=>'Sólidos totales disueltos',
                    'conductividad'=>'Conductividad'
                ),
                'Características químicas'=>array(
                    'dureza'=>'Dureza',
                    'cloro_libre'=>'Cloro Libre residual',
                    'hierro'=>"Hierro",
                    'nitratos'=>'Nitratos',
                    'nitritos'=>'Nitritos',
                    'sulfatos'=>'Sulfatos',
                    'fosfatos'=>'Fosfatos',
                    'manganeso'=>'Manganeso',
                    'fluoruros'=>'Fluoruros',
                    'amoniaco'=>'Amoniaco'
                ),
                'Requisitos microbiológicos'=>array(
                    'coliformes_fecales'=>'Coliformes fecales',
                    'coliformes_totales'=>'Coliformes totales'
                )
            ),
            array("prompt"=>"Seleccione un parámetro","class"=>"input-xlarge")) 
    ?>

</div>
    <div class="alert alert-info span4 text-center">
    <?php echo CHtml::activeTelField($model,'fecha',array("placeholder"=>"Fecha inicial","readonly"=>"readonly"));
     echo CHtml::error($model,'fecha');
     ?><br>
     <?php echo CHtml::activeTelField($model,'fecha2',array("placeholder"=>"Fecha final","readonly"=>"readonly"));
     echo CHtml::error($model,'fecha2');
    ?>
    
     <script type="text/javascript">
	$(function() {
		$( "#Muestras_fecha,#Muestras_fecha2" ).datepicker({
                    showOn: "button",
                    buttonImage: "<?php echo Yii::app()->request->baseUrl ?>/images/calendar.gif",
                    buttonImageOnly: true,
                    autoSize:true,
                    //monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    //monthNamesMin:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
                    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                    dayNamesMin:["Dom","Lun","Mar","Miér","Jue","Vie","Sáb"],
                    dateFormat:"yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                 }); 
	});
	</script>
</div>

</div>
<div class="container text-center">
<!--        <p>POR FAVOR PARA GENERAR LA GRAFICA SELECCIONE LA UBICACIÓN, 
            PARÁMETRO QUE QUIERE GRAFICAR Y SI DESEA LOS INTERVALOS DE FECHAS</p>-->
        <?php
         echo CHtml::submitButton("submit",array("value"=>"Generar gráfica","title"=>"Generar gráfica","class"=>"btn btn-success"));
        ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#muestras").validate({
               rules:{
                    'Muestras[codcanton]':'required',
                    'Muestras[codbarrio]':'required',
                    'Muestras[codparroquia]':'required',
                    'Muestras[codsistema]':'required',
                    'Muestras[parametro]':'required'
                } 
            });
        });
        </script>
    </div>
<?php echo CHtml::endForm(); ?>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>

<?php $this->endWidget('application.extensions.jui.ETabs'); ?>