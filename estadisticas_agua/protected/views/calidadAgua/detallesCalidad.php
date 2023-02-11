<?php
$this->widget('application.extensions.jui.EJqueryUiInclude',
                            array('theme'=>'ui-lightness'));
$this->pageTitle=Yii::app()->name . ' - Detalles sistema';
$this->breadcrumbs=array(
	'Resultados de la última ficha',
);
?>
<h3><?php echo $sistema[0]["nombrecanton"]." / ".$sistema[0]["nombreparroquia"]." / ".$sistema[0]["nombrebarrio"]." / ".$sistema[0]["nombresistema"]?></h3>
<!--<h3>Última ficha registrada</h3>-->
<span class="label label-success" style="font-size: 14px;">Parámetros que no cumplen los limites permisibles según la última ficha registrada</span>
<?php $this->beginWidget('application.extensions.jui.ETabs',array('name'=>'tabs','options'=>array('collapsible'=>true))); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab1','title'=>'Datos de la muestra')) ?>
<table class="table table-bordered table-striped table-hover table-condensed">
    <tbody>
        <tr>
            <th>Número de muestra: </th>
            <td><?php echo $datos[0]["numero"] ?></td>
        </tr>
        <tr>
            <th>Fuente de recolecci&oacute;n de la muestra: </th>
            <td><?php echo chao_tilde($datos[0]["fuente"]) ?></td>
        </tr>
        <tr>
            <th>Fecha/hora de recolección:</th>
            <td><?php echo $datos[0]["fecha"]." / ".$datos[0]["hora"] ?></td>
        </tr>
        <tr>
            <th>Fecha/hora de análisis:</th>
            <td><?php echo $datos[0]["fecha_analisis"]." / ".$datos[0]["hora_analisis"] ?></td>
        </tr>
        <tr>
            <th>Departamento:</th>
            <td><?php echo chao_tilde($datos[0]["departamento"]) ?></td>
        </tr>
        <tr>
            <th>Recolectada por:</th>
            <td><?php echo chao_tilde($datos[0]["recolector"]) ?></td>
        </tr>
    </tbody>
</table>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab2','title'=>'Características físicas')) ?>
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
    <tr>
        <th style="text-align:center;">Parámetro</th>
        <th style="text-align:center;">Unidad</th>
        <th style="text-align:center;">Límite </th>
        <th style="text-align:center;">Resultados</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th>pH</th>
        <td style="text-align:center;">Unidades</td>
        <td style="text-align:center;">6 - 9 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_ph($datos[0]["ph"]) ?></td>
    </tr>

    <tr>
        <th>Color</th>
        <td style="text-align:center;">Color real</td>
        <td style="text-align:center;">15</td>
        <td style="text-align:center;"><?php getMsj_color($datos[0]["color"]) ?></td>
    </tr>

    <tr>
        <th>Olor</th>
        <td style="text-align:center;">--</td>
        <td style="text-align:center;">No objetable</td>
        <td style="text-align:center;"><?php getMsj_olor($datos[0]["olor"]) ?></td>
    </tr>

    <tr>
        <th>Turbiedad</th>
        <td style="text-align:center;">NTU</td>
        <td style="text-align:center;">5</td>
        <td style="text-align:center;"><?php getMsj_turbiedad($datos[0]["turbiedad"]) ?></td>
    </tr>

    <tr>
        <th>Temperatura</th>
        <td style="text-align:center;">&deg;C</td>
        <td style="text-align:center;">Condici&oacute;n natural+/-3 &deg;C <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_temperatura($datos[0]["temperatura"]) ?></td>
    </tr>
    
    <tr>
        <th>S&oacute;lidos totales disueltos</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">500 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_solidos_totales($datos[0]["solidos_totales"]) ?></td>
    </tr>
    
    <tr>
        <th>Conductividad</th>
        <td style="text-align:center;">&mu;S/cm</td>
        <td style="text-align:center;">- <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_conductividad($datos[0]["conductividad"]) ?></td>
    </tr>
</tbody>
</table>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab3','title'=>'Características quimícas')) ?>
<table class="table table-bordered table-striped table-hover table-condensed" >
<thead>
    <tr>
        <th style="text-align:center;">Parámetro</th>
        <th style="text-align:center;">Unidad</th>
        <th style="text-align:center;">L&iacute;mite </th>
        <th style="text-align:center;" class="info">Resultados</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th>Dureza, CaCO3</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">500 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_dureza($datos[0]["dureza"])?></td>
    </tr>

    <tr>
        <th>Cloro libre residual </th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">0,3 a 1,5</td>
        <td style="text-align:center;"><?php getMsj_cloro_libre($datos[0]["cloro_libre"])?></td>
    </tr>

    <tr>
        <th>Hierro total, Fe&sup3;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">0,3 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_hierro($datos[0]["hierro"])?></td>
    </tr>

    <tr>
        <th>Nitratos, NO3&macr;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">50</td>
        <td style="text-align:center;"><?php getMsj_nitratos($datos[0]["nitratos"])?></td>
    </tr>

    <tr>
        <th>Nitritos, NO2&macr;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">3.0</td>
        <td style="text-align:center;"><?php getMsj_nitritos($datos[0]["nitritos"])?></td>
    </tr>

    <tr>
        <th>Sulfatos, SO4&macr;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">250 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_sulfatos($datos[0]["sulfatos"])?></td>
    </tr>

    <tr>
        <th>Fosfatos, PO4&macr;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">0,3 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_fosfatos($datos[0]["fosfatos"])?></td>
    </tr>

    <tr>
        <th>Manganeso, Mn</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">0,1 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_manganeso($datos[0]["manganeso"])?></td>
    </tr>

    <tr>
        <th>Fluoruros (Fl&uacute;or), F</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;"align="center">1.5 </td>
        <td style="text-align:center;"><?php getMsj_fluoruros($datos[0]["fluoruros"])?></td>
    </tr>

    <tr>
        <th>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</th>
        <td style="text-align:center;">mg/l</td>
        <td style="text-align:center;">1,0 <strong>*</strong></td>
        <td style="text-align:center;"><?php getMsj_amoniaco($datos[0]["amoniaco"])?></td>
    </tr>
</tbody>
</table>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->beginWidget('application.extensions.jui.ETab',array('name'=>'tab4','title'=>'Requisitos microbiológicos')) ?>
<table class="table table-bordered table-striped table-hover table-condensed">
  <thead>
      <tr class="success">
        <th style="text-align:center;">Par&aacute;metro</th>
        <th style="text-align:center;">Unidad</th>
        <th style="text-align:center;">L&iacute;mite</th>
        <th style="text-align:center;">Resultados</th>  
    </tr>
</thead>
<tbody>
    <tr>
        <th>Coliformes totales</th>
        <td style="text-align:center;">NMP/100 ml</td>
        <td style="text-align:center;">3000<strong>&nbsp;*</strong></td>
        <td style="text-align:center;"><?php getMsj_coliformes_totales($datos[0]["coliformes_totales"]) ?></td>
    </tr>

    <tr>
        <th>Coliformes fecales</th>
        <td style="text-align:center;">NMP/100ml</td>
        <td style="text-align:center;">50 <strong>&nbsp;*</strong></td>
        <td style="text-align:center;"><?php getMsj_coliformes_fecales($datos[0]["coliformes_fecales"]) ?></td>
    </tr>
</tbody>
</table>
<?php $this->endWidget('application.extensions.jui.ETab'); ?>
<?php $this->endWidget('application.extensions.jui.ETabs'); ?>
<p><strong>Límite permisible: </strong>NORMA
  TÉCNICA ECUATORIANA(NTE) INEN 1108 QUINTA REVISIÓN 2014-01</p>
<p>(*) Límites permisibles para aguas de consumo humano y uso doméstico, que únicamente requieren tratamiento convenciona basados en la norma TULAS Libro VI, Anexo I, Tablas 1 y 2.</p>
