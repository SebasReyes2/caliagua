<?php
use Dompdf\Dompdf;
use Dompdf\Options;
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once ("../dompdf/dompdf_config.inc.php");
require_once ("../clases/Sistema.php");
require_once ("../funciones/tildes.php");
require_once ("funciones.php");
$idsistema = (int)$_POST["idsistema"];
$canton = (int)$_POST["canton"];
$strsello = darsello($canton);
$sistemanew = new Sistema();
$reg = $sistemanew->sistemas_id($idsistema,$canton);
$codigo = $reg[0]["codsistema"];
$municipio = chao_tilde($reg[0]["municipio"]);
$nom_provincia = chao_tilde($reg[0]["nom_provincia"]);
$nomcanton = chao_tilde($reg[0]["nombrecanton"]);
$parroquia = chao_tilde($reg[0]["nombreparroquia"]);
$barrio = chao_tilde($reg[0]["nombrebarrio"]);
$sistema = chao_tilde($reg[0]["nombresistema"]);
$tipo = $reg[0]["tiposistema"];
$fecha = $reg[0]["faforo"];

$captacion = $reg[0]["captacion"];
$latitud = $reg[0]["latitud"];
$longitud = $reg[0]["longitud"];
$altitud = $reg[0]["altitud"];
$caforado = $reg[0]["caforado"];
$faforo = $reg[0]["faforo"];
$eaforo = $reg[0]["eaforo"];
$cautorizado = $reg[0]["cautorizado"];
$fconstruccion = $reg[0]["fconstruccion"];
$jlegalizada = $reg[0]["jlegalizada"];
$jfiscalizada = $reg[0]["jfiscalizada"];
$tarifareal = $reg[0]["tarifareal"];
$tconstruccion = $reg[0]["tconstruccion"];
$sdesinfeccion = $reg[0]["sdesinfeccion"];
$pqutilizados = $reg[0]["pqutilizados"];
$proveedores = $reg[0]["proveedores"];
$tuberia1 = $reg[0]["tuberia1"];
$tuberia2 = $reg[0]["tuberia2"];
$tuberia3 = $reg[0]["tuberia3"];
$magnitud_tuberia = $reg[0]["magnitud_tuberia"];
$distancia = $reg[0]["distancia"];
$mag_distancia = $reg[0]["mag_distancia"];
$rompepresion = $reg[0]["rompepresion"];
$valvulas_aire = $reg[0]["valvulas_aire"];
$valvulas_purga = $reg[0]["valvulas_purga"];
$numtanques = $reg[0]["numtanques"];
$estado = $reg[0]["estado"];
$uso = $reg[0]["uso"];
$capacidad = $reg[0]["capacidad"];
$longitudred = $reg[0]["longitudred"];
$diametro1 = $reg[0]["diametro1"];
$diametro2 = $reg[0]["diametro2"];
$diametro3 = $reg[0]["diametro3"];
$magnitud_diametro = $reg[0]["magnitud_diametro"];
$re_rompepresion = $reg[0]["re_rompepresion"];
$numconex = $reg[0]["numconex"];
$conmedidor = $reg[0]["conmedidor"];
$sinmedidor = $reg[0]["sinmedidor"];
$poblacion = $reg[0]["poblacion"];
$comentarios = $reg[0]["comentarios"];
unset($html);
$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pdf</title>
<style>
    body{
        font-size: 9.5px;
    }
    .rojo{
        color: #FF4500;
        text-decoration: none;
        text-transform: none;
    }
</style>
</head>

<body>
<table width="100%">
    <tr>
    <td align="center">'.$strsello.'</td>
    <td align="center">
        <h3>SECRETAR&Iacute;A DEL AGUA</h3><br />
        <h4>CONTROL DE CALIDAD DEL AGUA PARA CONSUMO HUMANO<br />
        Reporte de análisis de agua</h4>
       
    </td>
    <td align="center"> <img src="../imagen/senagua.gif" /></td>
    </tr>
</table>
<br />
<table width="100%" border="1">
  <thead>
  <tr>
    <th colspan="4" align="left">1) DATOS DE LA INSTITUCI&Oacute;N</th>   
  </tr>
  </thead>  
    <tbody>
  <tr>
  <td width="26%" align="left"><strong>Instituci&oacute;n:</strong></td>
  <td colspan="3">'.$municipio.'</td>
  </tr>
    
    </tbody>
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2" align="left">2) DATOS TECNICOS DEL SISTEMA</th>
       </tr> 
</thead>   
    <tbody>   
  <tr>
  <td align="left"><strong>Provincia:</strong></td>
  <td width="32%">Chimborazo</td>
  <td width="15%" align="left"><strong>Cant&oacute;n:</strong></td>
  <td width="33%">'.$nomcanton.'</td>
  </tr>
  
  <tr>
  <td align="left"><strong>Parroquia:</strong></td>
  <td width="32%">'.$parroquia.'</td>
  <td width="15%" align="left"><strong>Barrio:</strong></td>
  <td width="33%">'.$barrio.'</td>
  </tr>
  
  <tr>
  <td width="20%" align="left"><strong>Sistema: </strong></td>
  <td width="32%">'.$sistema.'</td>
  <td width="15%" align="left"><strong>Tipo:</strong></td>
  <td width="33%">'.$tipo.'</td>
  </tr>
    
  <tr>
    <td colspan="2" align="left"><strong>Hora de recolección:</strong></td>
    <td colspan="2">'.$faforo.'/'.$faforo.'</td>
  </tr>
    </tbody>
</table>
<br />
<p>..</p>



<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">3. DATOS DE CAPTACION:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Fuente</strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$captacion.'</td>
</tr>

<tr>
<td><strong>Latitud </strong></td>
<td align="center">º</td>
<td align="center">--</td>
<td align="center">'.$latitud.'</td>
</tr>

<tr>
<td><strong>Longitud </strong></td>
<td align="center">º</td>
<td align="center">--</td>
<td align="center">'.$longitud.'</td>
</tr>

<tr>
<td><strong>Altitud</strong></td>
<td align="center">msnm</td>
<td align="center">--</td>
<td align="center">'.$altitud.'</td>
</tr>

<tr>
<td><strong>Caudal aforado</strong></td>
<td align="center">Litros/segundo</td>
<td align="center">--</td>
<td align="center">'.$caforado.'</td>
</tr>

<tr>
<td><strong>Fecha de aforo</strong></td>
<td align="center">Año/Mes/Día</td>
<td align="center">--</td>
<td align="center">'.$faforo.'</td>
</tr>

<tr>
<td><strong>Epoca de aforo</strong></td>
<td align="center">Estaci&oacute;n</td>
<td align="center">--</td>
<td align="center">'.$eaforo.'</td>
</tr>

<tr>
<td><strong>Caudal autorizado</strong></td>
<td align="center">Litros/segundo</td>
<td align="center">--</td>
<td align="center">'.$cautorizado.'</td>
</tr>

    </tbody>   
</table>


<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">4.  ORGANIZACIÓN::</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Fecha de Construcción</strong></td>
<td align="center">Año/Mes/Día</td>
<td align="center">--</td>
<td align="center">'.$fconstruccion.'</td>
</tr>

<tr>
<td><strong>Junta Legalizada</strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$jlegalizada.'</td>
</tr>

<tr>
<td><strong>Junta Fiscalizada</strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$jfiscalizada.'</td>
</tr>

<tr>
<td><strong>Tarifa Real</strong></td>
<td align="center">D&oacute;lares</td>
<td align="center">--</td>
<td align="center">'.$tarifareal.'</td>
</tr>  
  
<tr>
<td><strong>Tarifa de Construcci&oacute;n</strong></td>
<td align="center">D&oacute;lares</td>
<td align="center">--</td>
<td align="center">'.$tconstruccion.'</td>
</tr> 
    </tbody>   
</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">5.  CALIDAD DEL AGUA:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Desinfecci&oacute;n </strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$sdesinfeccion.'</td>
</tr>

<tr>
<td><strong>Productos qu&iacute;micos utlizados </strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$pqutilizados.'</td>
</tr>

<tr>
<td><strong>Proveedores</strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$proveedores.'</td>
</tr>

  </tbody>   
</table>

<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">6.  DATOS DE CONDUCCIÓN::</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Díametro de tubería </strong></td>
<td align="center">'.$magnitud_tuberia.'</td>
<td align="center">--</td>
<td align="center">'.$tuberia1.'</td>
<td align="center">'.$tuberia2.'</td>
<td align="center">'.$tuberia3.'</td>
</tr>

<tr>
<td><strong>Distancia de conducción en base a diámetro  </strong></td>
<td align="center">'.$mag_distancia.'</td>
<td align="center">--</td>
<td align="center">'.$distancia.'</td>
</tr>

<tr>
<td><strong>Tanque rompe presiones </strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$rompepresion.'</td>
</tr>

<tr>
<td><strong>Válvulas  </strong></td>
<td align="center">Aire/Purga</td>
<td align="center">--</td>
<td align="center">'.$valvulas_aire.'</td>
<td align="center">'.$valvulas_purga.'</td>
</tr>

  </tbody>   
</table>



<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">6.  DATOS DE CONDUCCIÓN::</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Número de tanques </strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$numtanques.'</td>
</tr>

<tr>
<td><strong>Estado</strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$estado.'</td>
</tr>

<tr>
<td><strong>Uso </strong></td>
<td align="center">--</td>
<td align="center">--</td>
<td align="center">'.$uso.'</td>
</tr>

<tr>
<td><strong>Capacidad del tanque </strong></td>
<td align="center">&nbsp;</td>
<td align="center">--</td>
<td align="center">'.$capacidad.'</td>
</tr>

  </tbody>   
</table>


<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">7.  RED DE DISTRIBUCIÓN:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>Longitud de red de distribución</strong></td>
<td align="center">Metros</td>
<td align="center">--</td>
<td align="center">'.$longitudred.'</td>
</tr>

<tr>
<td><strong>Díametro de tubería</strong></td>
<td align="center">'.$magnitud_diametro.'</td>
<td align="center">--</td>
<td align="center">'.$diametro1.'</td>
<td align="center">'.$diametro2.'</td>
<td align="center">'.$diametro3.'</td>
</tr>

<tr>
<td><strong>Rompe presiones </strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$re_rompepresion.'</td>
</tr>


<tr>
<td><strong>Con medidor </strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$conmedidor.'</td>
</tr>

<tr>
<td><strong>Sin medidor </strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$sinmedidor.'</td>
</tr>

<tr>
<td><strong>Número de conexiones</strong></td>
<td align="center">Unidades</td>
<td align="center">--</td>
<td align="center">'.$numconex.'</td>
</tr>

<tr>
<td><strong>Población aproximada</strong></td>
<td align="center">Habitantes</td>
<td align="center">--</td>
<td align="center">'.$poblacion.'</td>
</tr>
  </tbody>   
</table>
<br/>
<p></p>
<p><strong>OBSERVACI&Oacute;N:  </strong>'.$comentarios.'</p>
</body>
</html>
';
//$html = utf8_decode($html);
$nombrepdf = $barrio."-".$fecha;
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$options->set('isHtml5ParserEnabled', TRUE);
$options->set('chroot','/');
#$options->setChroot('/');
#$options->setIsRemoteEnabled(TRUE);
#$options->setIsHtml5ParserEnabled(TRUE);
$pdf = new DOMPDF($options);
#$pdf->set_base_path($_SERVER['DOCUMENT_ROOT']);
$pdf->loadHtml($html);
//ini_set("memory_limit", "32M");
$pdf->setPaper('A4', 'portrait');
$contxt = stream_context_create([
    'ssl' => [
        'verify_peer' => FALSE,
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE
    ]
]);
$pdf->setHttpContext($contxt);
$pdf->render();
$pdf->stream("$nombrepdf".'.pdf', array("Attachment" => FALSE));
#$pdf->stream("$nombrepdf".'.pdf');