<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="es"/>
<title>..::<?php echo CHtml::encode($this->pageTitle) ?>::..</title>
<meta name="keywords" content="calidad del agua, agua potable" />
<meta name="description" content="Genera estadisticas de caliad del agua para consumo doméstico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/demo_table_jui.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/messages_es.js" ></script>
</head>
    <body onload="history.forward();">
        <div id="wrapper">
	<div id="header">
		<div id="logo">
                    <p> <a href="../"><span>Estadisticas de calidad del agua <br /> para consumo humano - Chimborazo</span></a></p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		
                    <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                                array('label'=>'Tipo de sistema','url'=>  array('/tipos/index')),
                                array('label'=>'Gráfico por parametro','url'=>array('/parametro/index')),
                                array('label'=>'Calidad del agua','url'=>array('/calidadAgua/index')),
                                array('label'=>'Contactos', 'url'=>array('/site/contact')),
			),
                        'firstItemCssClass'=>'current_page_item',
                        'activeCssClass'=>'activo'
                        )); 
                    
                    ?>

	</div>

	<div id="three-columns">
            <div class="content">
                    <?php if(isset($this->breadcrumbs)):?>
                
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                    <?php endif?>
         
            <?php echo $content ?>
            </div>
        </div>
        
        <div id="footer">
        <p style="letter-spacing: 0.25em;">Copyright &copy; 2013  -   UNACH  -  FACULTAD DE INGENIER&Iacute;A.   |   Desarrollado por: Juan C. Moyota    |    Con el apoyo de:</p>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer_final.jpg" width="1000" height="90" alt="footer" usemap="#foot" />
            <map name="foot">
          <area shape="rect" coords="30,11,145,74" href="http://www.habitatyvivienda.gob.ec/" target="_blank" />
          <area shape="rect" coords="205,11,321,79" href="http://subcuencachambo.wordpress.com/" target="_blank" />  
          <area shape="rect" coords="383,11,468.9,74" href="#top" />
          <area shape="rect" coords="524.9,11,639.9,74" href="http://www.avsf.org/" target="_blank"/>
          <area shape="rect" coords="692.9,11,803.9,74" href="http://www.eau-seine-normandie.fr/" target="_blank" />
          <area shape="rect" coords="868.9,11,967.9,74" href="http://www.afd.fr/" target="_blank" />
            </map>
        </div>
</div>
    </body>
</html>
