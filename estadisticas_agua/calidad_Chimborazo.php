<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Lista de cantones';
$this->breadcrumbs=array(
	'Calidad del agua',
);
?>
<?php if (Yii::app()->user->hasFlash('mensaje'))  { ?>
<div class="alert alert-info"><?php echo Yii::app()->user->getFlash('mensaje') ?></div>
<?php } ?>
<h1>Seleccione el cantón para revisar la calidad del agua</h1>
<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs')); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab1','title'=>'Cantones')) ?>
<table class="text-center table">
    <tr>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[0]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[1]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[2]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[3]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[4]["foto"] ?>" height="150" width="100" /></td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <?php $id_uno = $datos[0]['codcanton'] ?>
            <?php echo CHtml::link($datos[0]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadAlausi/$id_uno" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_dos = $datos[1]['codcanton'] ?>
            <?php echo CHtml::link($datos[1]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadChambo/$id_dos" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_tres = $datos[2]['codcanton'] ?>
            <?php echo CHtml::link($datos[2]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadChunchi/$id_tres" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_cuatro = $datos[3]['codcanton'] ?>
            <?php echo CHtml::link($datos[3]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadColta/$id_cuatro" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_cinco = $datos[4]['codcanton'] ?>
            <?php echo CHtml::link($datos[4]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadCumanda/$id_cinco" ); ?>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[5]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[6]["foto"] ?>" height="150" width="100"/></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[7]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../..//imagen/cantones/<?php echo $datos[8]["foto"] ?>" height="150" width="100" /></td>
        <td style="text-align: center;"><img src="../../imagen/cantones/<?php echo $datos[9]["foto"] ?>" height="150" width="100" /></td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <?php $id_seis = $datos[5]['codcanton'] ?>
            <?php echo CHtml::link($datos[5]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadGuamote/$id_seis" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_siete = $datos[6]['codcanton'] ?>
            <?php echo CHtml::link($datos[6]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadGuano/$id_siete" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_ocho = $datos[7]['codcanton'] ?>
            <?php echo CHtml::link($datos[7]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadPallatanga/$id_ocho" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id_nueve = $datos[8]['codcanton'] ?>
            <?php echo CHtml::link($datos[8]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadPenipe/$id_nueve" ); ?>
        </td>
        <td style="text-align: center;">
            <?php $id = $datos[9]['codcanton'] ?>
            <?php echo CHtml::link($datos[9]["nombrecanton"],Yii::app()->request->baseUrl."/calidadAgua/calidadRiobamba/$id" ); ?>
        </td>
    </tr>
    
</table>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabS'); ?>
