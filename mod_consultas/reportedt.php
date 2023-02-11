<?php 
error_reporting(E_ALL ^ E_NOTICE);
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include("../clases/Sistema.php");
$reg[] = array();

$id = (int)$_GET["codigo"];
$sistema = new Sistema();
$reg = $sistema->get_datostecnicos($id);
$sistema2 = new Sistema();
$reg2= $sistema2->get_datosgenerales($id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::REPORTE DE FICHA::...</title>
<meta name="keywords" content="fichas, agua potable" />
<meta name="description" content="" />
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script language="javascript" src="../js/jquery.validate.js"></script>
<link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link type="text/css" href="../css/bootstrap.css" rel="stylesheet" />
</head>
<body>
<?php include('header.php'); ?>
<div id="wrapper">
	<div id="page" class="container">
    <table width="100%">
    <tr>
    <td><img src="../imagen/cantones/<?php echo $reg2[0]["foto"]; ?>" width="84" height="60" /></td>
    <td style="color:#000; text-align:center">
        <h3>SECRETAR&Iacute;A DEL AGUA<br /></h3>
        <h4>CONTROL DE CALIDAD DEL AGUA PARA CONSUMO HUMANO<br />Reporte de los Datos Técnicos</h4>
        <p>Informe N&ordm;:&nbsp;<?php echo $reg[0]["codigo"] ?></p>
    </td>
      <td> <img src="../imagen/senagua.PNG" width="120" height="60" /></td>
    </tr>
</table>
<table width="100%" border="1">
  <thead>
  <tr>
    <th colspan="4">1) DATOS DE LA INSTITUCI&Oacute;N</th>   
  </tr>
  </thead>  
  <tr>
  <th width="26%">Instituci&oacute;n:</th>
  <td colspan="3"><?php echo $reg2[0]["municipio"]; ?></td>
  </tr>
 
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2">2) DATOS DEL SISTEMA</th>
  
    </tr> 
</thead>   
   
  <tr>
  <th>Provincia: </th>
  <td width="48%"><?php echo $reg2[0]["nom_provincia"] ?></td>
  <td width="17%"><strong>Cant&oacute;n:</strong></td>
  <td width="21%"><?php echo $reg2[0]["nombrecanton"] ?></td>
  </tr>
  
  <tr>
  <th>Parroquia: </th>
  <td width="48%"><?php echo $reg2[0]["nombreparroquia"] ?></td>
  <td width="17%"><strong>Barrio:</strong></td>
  <td width="21%"><?php echo $reg2[0]["nombrebarrio"] ?></td>
  </tr>
  
  <tr>
  <th width="14%">Sistema: </th>
  <td width="48%"><?php echo $reg2[0]["nombresistema"] ?></td>
  
  <td width="17%"><strong>Tipo:</strong></td>
  <td width="21%"><?php echo $reg2[0]["tiposistema"] ?></td>
  </tr>
  
   <tr>
    <th colspan="2">Fecha de ingreso de datos técnicos:</th>
    <td colspan="21"><?php echo $reg[0]["faforo"]; ?>&nbsp;
    </td>
  	</tr>
    

</table>
<br />
<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">DATOS T&Eacute;CNICOS:</th>
</tr>
<br />
<tr>
  <th colspan="4">1. DATOS DE CAPTACI&Oacute;N </th></tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
<tr>
<th>Fuente </th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $capt = $reg[0]["captacion"];
    echo $capt;
    ?>
</td>
</tr>


<tr>
<th>Latitud </th>
<td>º</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $lat = $reg[0]["latitud"];
    echo $lat;
    ?>
</td>
</tr>
<tr>
<th>Longitud </th>
<td>º</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $long = $reg[0]["longitud"];
    echo $long;
    ?>
</td>
</tr>
<tr>
<th>Altitud </th>
<td>msnm</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $alt = $reg[0]["altitud"];
    echo $alt;
    ?>
</td>
</tr>


<tr>
<th>Caudal aforado</th>
<td>Litros/segundo</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $cafo = $reg[0]["caforado"];
    echo $cafo;
    ?>
</td>
</tr>

<tr>
<th>Fecha de aforo</th>
<td>Año/Mes/Día</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $fafo = $reg[0]["faforo"];
    echo $fafo;
    ?>
</td>
</tr>

<tr>
<th>Epoca de aforo</th>
<td>Estación</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $eafo = $reg[0]["eaforo"];
    echo $eafo;
    ?>
</td>
</tr>

<tr>
<th>Caudal autorizado</th>
<td>Litros/segundo</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $caut = $reg[0]["cautorizado"];
    echo $caut;
    ?>
</td>
</tr>
</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">2. ORGANIZACI&Oacute;N:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>


<tr>
<th>Fecha de Construcci&oacute;n</th>
<td>Año/Mes/Día</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $fcon = $reg[0]["fconstruccion"];
    echo $fcon;
    ?>
</td>
</tr>

<tr>
<th>Junta Legalizada</th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $jleg = $reg[0]["jlegalizada"];
    echo $jleg;
    ?>
</td>
</tr>
<tr>
<th>Junta Fiscalizada</th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $jfi = $reg[0]["jfiscalizada"];
    echo $jfi;
    ?>
</td>
</tr>

<tr>
<th>Tarifa Real</th>
<td>Dolares</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $tre = $reg[0]["tarifareal"];
    echo $tre;
    ?>
</td>
</tr>

<tr>
<th>Tarifa de Construcci&oacute;n </th>
<td>Dolares</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $tco = $reg[0]["tarifareal"];
    echo $tco;
    ?>
</td>
</tr>

</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">3. CALIDAD DEL AGUA:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>Desinfecci&oacute;n </th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $sde = $reg[0]["sdesinfeccion"];
    echo $sde;
    ?>
</td>
</tr>
<tr>
<th>Productos químicos utlizados </th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $pqu = $reg[0]["pqutilizados"];
    echo $pqu;
    ?>
</td>
</tr>

<tr>
<th>Proveedores </th>
<td>--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $pro = $reg[0]["proveedores"];
    echo $pro;
    ?>
</td>
</tr>

</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">4. DATOS DE CONDUCCI&Oacute;N:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>Díametro de tuber&iacute;a</th>
<td align="center"> <?php echo $reg[0]["magnitud_tuberia"]?></td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
<?php echo $reg[0]["tuberia1"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["tuberia2"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["tuberia3"]; ?>
</td>
</tr>

<tr>
<th>Distancia de conducci&oacute;n en base a di&aacute;metro </th>
<td align="center"> <?php echo $reg[0]["mag_distancia"]?></td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $dis = $reg[0]["distancia"];
    echo $dis;
    ?>
</td>
</tr>

<tr>
<th>Tanque rompe presiones </th>
<td align="center"> Unidades </td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php
    $ro = $reg[0]["rompepresion"];
    echo $ro;
    ?>
</td>
</tr>
<tr>
<th>V&aacute;lvulas </th>
<td align="center"> Aire/Purga </td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td style="text-align: center;">
    <?php echo $reg[0]["valvulas_aire"]; ?>&nbsp;/&nbsp; <?php echo $reg[0]["valvulas_purga"];?>
</td>
</tr>
</table>


<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">5. DATOS DEL TANQUE PRINCIPAL:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>N&uacute;mero de tanques</th>
<td align="center">Unidades</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $nta = $reg[0]["numtanques"];
    echo $nta;
    ?>
</td>
</tr>

<tr>
<th>Estado</th>
<td align="center">--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $nta = $reg[0]["estado"];
    echo $nta;
    ?>
</td>
</tr>

<tr>
<th>Uso </th>
<td align="center">--</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $us = $reg[0]["uso"];
    echo $us;
    ?>
</td>
</tr>

<tr>
<th>Capacidad del tanque</th>
<td align="center">m&sup3;</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $cap = $reg[0]["capacidad"];
    echo $cap;
    ?>
</td>
</tr>
</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">6. RED DE DISTRIBUCI&Oacute;N:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>Longitud de red de distribuci&oacute;n</th>
<td align="center">Metros;</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $lor = $reg[0]["longitudred"];
    echo $lor;
    ?>
</td>
</tr>

<tr>
<th>Díametro de tuber&iacute;a</th>
<td align="center"> <?php echo $reg[0]["magnitud_diametro"]?></td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
<?php echo $reg[0]["diametro1"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["diametro2"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["diametro3"]; ?>
</td>
</tr>

<tr>
<th>Rompe presiones</th>
<td align="center">Unidades</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p></td>
<td>
     <?php
    $rpr = $reg[0]["re_rompepresion"];
    echo $rpr;
    ?>
</td>
</tr>



<tr>
<th>Con medidor</th>
<td align="center">Unidades</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p>
</td> 
<td>
<?php
    $cmed = $reg[0]["conmedidor"];
    echo $cmed;
    ?>
</td>
</tr>
<tr>
<th>Sin medidor</th>
<td align="center">Unidades</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p>
</td> 
<td>
<?php
    $smed = $reg[0]["sinmedidor"];
    echo $smed;
    ?>
</td>
</tr>
<tr>
<th>Número de conexiones</th>
<td align="center">Unidades</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p>
</td> 
<td>
<?php
    $nuc = $reg[0]["numconex"];
    echo $nuc;
    ?>
</td>
</tr>

<th>Población aproximada</th>
<td align="center">Habitantes</td>
<td align="center"><p style="font-size: 10px; ">No objetable</p>
</td> 
<td>
<?php
    $pob = $reg[0]["poblacion"];
    echo $pob;
    ?>
</td>
</tr>


</table>
<br />


</table>
<table width="100%" border="1">
  <thead>

</table>

<br />

<p style="text-align:left;"><strong>OBSERVACI&Oacute;N:  </strong><?php echo $reg[0]["comentarios"]; ?></p>
<form name="exportar" id="exportar" action="reportepdfdt.php" method="post">
<input type="hidden" name="idmuestra" id="idmuestra" value="<?php echo $id; ?>" />
<input type="hidden" name="canton" id="canton" value="<?php echo $canton; ?>"  />
<!-- <input type="submit" class="btn-success" name="exportar" value="Exportar a PDF" /> -->

	</div>
	
</div>
<?php include('footer.php'); ?>
</body>
</html>