<?php
use Dompdf\Dompdf;
use Dompdf\Options;
require_once ("../dompdf/dompdf_config.inc.php");
unset($html);
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pdf</title>
<style>
    body{
        font-size: 9.5px;
    }
</style>
</head>

<body>
<table width="100%">
    <tr>
    <td align="center" colspan="3">
        <h3>SECRETAR&Iacute;A DEL AGUA</h3><br />
        <h4>Reporte de análisis de agua</h4>
    </td>
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
  <td colspan="3">&nbsp;</td>
  </tr>
    
  <tr>
  <td align="left"><strong>Laboratorio/Departamento:</strong></td>
  <td colspan="3">&nbsp;</td>
  </tr>

  <tr>
  <td align="left"><strong>T&eacute;cnico responsable de muestra:</strong></td>
  <td colspan="3">&nbsp;</td>
  </tr>
    </tbody>
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2" align="left">2) DATOS DE LA MUESTRA</th>
    <th colspan="2" align="left"><strong>Código de Muestra:</strong>&nbsp;&nbsp;&nbsp;</th>
    </tr> 
</thead>   
    <tbody>   
  <tr>
  <td align="left"><strong>Provincia:</strong></td>
  <td width="33%">&nbsp;</td>
  <td width="15%" align="left"><strong>Cant&oacute;n:</strong></td>
  <td width="33%">&nbsp;</td>
  </tr>
  
  <tr>
  <td align="left"><strong>Parroquia:</strong></td>
  <td width="32%">&nbsp;</td>
  <td width="15%" align="left"><strong>Barrio/Comunidad:</strong></td>
  <td width="33%">&nbsp;</td>
  </tr>
  
  <tr>
  <td width="20%" align="left"><strong>Sistema: </strong></td>
  <td width="32%">&nbsp;</td>
  <td width="15%" align="left"><strong>Tipo:</strong></td>
  <td width="33%">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"><strong>Sitio de toma de muestra:</strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"><strong>Fecha/hora de recolección:</strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
    
  <tr>
    <td colspan="2" align="left"><strong>Hora de recolección:</strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
    </tbody>
</table>
<br />
<p>&nbsp;</p>
<table width="100%" border="1">
<thead>
<tr>
<th colspan="4" align="left">3. CARACTER&Iacute;STICAS F&Iacute;SICAS:</th>
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
<td><strong>pH</strong></td>
<td align="center">Unidades</td>
<td align="center">6 - 9</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td><strong>Color</strong></td>
<td align="center">Color real</td>
<td align="center">20</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td><strong>Olor</strong></td>
<td align="center">--</td>
<td align="center"><p>Es permitido olor y sabor removible por tratamiento  convencional&nbsp;*</p></td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td><strong>Turbiedad</strong></td>
<td align="center">NTU</td>
<td align="center">10</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td><strong>Temperatura</strong></td>
<td align="center">&deg;C</td>
<td align="center">Condici&oacute;n natural+/-3 &deg;C</td>
<td align="center">&nbsp;</td>
</tr>
    
<tr>
<td><strong>S&oacute;lidos totales disueltos</strong></td>
<td align="center">mg/l</td>
<td align="center">500</td>
<td align="center">&nbsp;</td>
</tr>
    
<tr>
<td><strong>Conductividad</strong></td>
<td align="center">&mu;S/cm</td>
<td align="center">-</td>
<td align="center">&nbsp;</td>
</tr>
    </tbody>   
</table>
<br /><br /><p>&nbsp;</p>
<table width="100%" border="1">
<thead>
<tr>
  <th colspan="4" align="left">4. CARACTER&Iacute;STICAS QU&Iacute;MICAS:</th></tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L&iacute;mite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td align="left"><strong>Dureza, CaCO3</strong></td>
<td align="center">mg/l</td>
<td align="center">500</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Cloro libre residual </strong></td>
<td align="center">mg/l</td>
<td align="center">0,3 a 1,5</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Hierro total, Fe&sup3;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Nitratos, NO3&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">10</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Nitritos, NO2&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Sulfatos, SO4&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">250</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Fosfatos, PO4&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Manganeso, Mn</strong></td>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Fluoruros (Fl&uacute;or), F</strong></td>
<td align="center">mg/l</td>
<td align="center">&lt;1,4</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</strong></td>
<td align="center">mg/l</td>
<td align="center">1,0</td>
<td align="center">&nbsp;</td>
</tr>
    </tbody>
</table>
<br />
<br />
<p></p>
<p></p>
<table width="100%" border="1">
  <thead>
<tr>
<th colspan="4" align="left">5. REQUISITOS MICROBIOL&Oacute;GICOS:</th>
</tr>
<tr>
<th>Par&aacute;metro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L&iacute;mite</th>
<th style="text-align:center;">Resultados</th>  
</tr>
</thead>
    <tbody>
<tr>
<td align="left"><strong>Coliformes totales</strong></td>
<td align="center">NMP/100 ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="left"><strong>Coliformes fecales</strong></td>
<td align="center">NMP/100ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td align="center">&nbsp;</td>
</tr>
    </tbody>
</table>
<br />
<p></p>
<p>* L&iacute;mites permisibles basados en la norma TULAS  Libro VI, Anexo I, Tabla 1.<br />
<strong>L&iacute;mite permisible: </strong> TULAS  Libro VI, Anexo I, Tabla 2</p>
<p><strong>OBSERVACI&Oacute;N:  </strong></p>
</body>
</html>
';
//$html = utf8_decode($html);
$nombrepdf = "formato_ficha";
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