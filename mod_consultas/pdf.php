<?php
use Dompdf\Dompdf;
use Dompdf\Options;
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once ("../dompdf/dompdf_config.inc.php");
require_once ("../clases/Muestra.php");
require_once ("../funciones/tildes.php");
require_once ("funciones.php");
$idmuestra = (int)$_POST["idmuestra"];
$canton = (int)$_POST["canton"];
$strsello = darsello($canton);
$muestranew = new Muestra();
$reg = $muestranew->muestra_id($idmuestra,$canton);
$codigo = $reg[0]["codmuestra"];
$numero = $reg[0]["numero"];
$municipio = chao_tilde($reg[0]["municipio"]);
$departamento = chao_tilde($reg[0]["departamento"]);
$recolector = chao_tilde($reg[0]["recolector"]);
$nomcanton= chao_tilde($reg[0]["nombrecanton"]);
$parroquia = chao_tilde($reg[0]["nombreparroquia"]);
$barrio = chao_tilde($reg[0]["nombrebarrio"]);
$sistema = chao_tilde($reg[0]["nombresistema"]);
$tipo = $reg[0]["tiposistema"];
$fuente = chao_tilde($reg[0]["fuente"]);
$hora = $reg[0]["hora"];
$hora_analisis = $reg[0]["hora_analisis"];
$fecha = $reg[0]["fecha"];
$fecha_analisis = $reg[0]["fecha_analisis"];
$color = $reg[0]["color"];
$turbiedad = $reg[0]["turbiedad"];
$olor = $reg[0]["olor"];
$dureza = $reg[0]["dureza"];
$cloro_libre = $reg[0]["cloro_libre"];
$fluoruros = $reg[0]["fluoruros"];
$manganeso = $reg[0]["manganeso"];
$nitratos = $reg[0]["nitratos"];
$nitritos = $reg[0]["nitritos"];
$col_fecales = $reg[0]["coliformes_fecales"];
$coliformes_ufc = $reg[0]["coliformes_ufc"];
$ph = $reg[0]["ph"];
$temperatura = $reg[0]["temperatura"];
$sol_totoales = $reg[0]["solidos_totales"];
$conductividad = $reg[0]["conductividad"];
$fosfatos = $reg[0]["fosfatos"];
$hierro = $reg[0]["hierro"];
$sulfatos = $reg[0]["sulfatos"];
$amoniaco = $reg[0]["amoniaco"];
$col_totales = $reg[0]["coliformes_totales"];
$observacion = $reg[0]["observacion"];
if ($ph == NULL){
    $ph = "-";
}else{
    if (($ph >= 6) and ($ph <= 9)){
        $ph = (float)$ph;
    }else{
        $ph = '<strong class="rojo">'.(float)$ph.'</strong>';
    }
}
if ($color == NULL){
    $color = "-";
}else{
    if ($color <= 20){
        $color = (float)$color;
    }else{
        $color = '<strong class="rojo">'.(float)$color.'</strong>';
    }
}
if ($olor == NULL){
    $olor = "-";
}else{
    $olor = '<strong class="rojo">'.$olor.'</strong>';
}
if ($turbiedad == NULL){
    $turbiedad = "-";
}else{
    if ($turbiedad <= 10){
        $turbiedad = (float)$turbiedad;
    }else{
        $turbiedad = '<strong class="rojo">'.(float)$turbiedad.'</strong>';
    }
}
if ($temperatura == NULL){
    $temperatura = "-";
}  else {
    $temperatura = (float)$temperatura;
}
if ($sol_totoales == NULL){
    if ($sol_totoales <= 500){
        $sol_totoales = (float)$sol_totoales;
    }else{
         $sol_totoales = '<strong class="rojo">'.(float)$sol_totoales.'</strong>';
    }
}
if ($conductividad == NULL){
    $conductividad = "-";
}else{
    $conductividad = (float)$conductividad;
}
if ($dureza == NULL){
    $dureza = "-";
}else{
    if ($dureza <= 500){
    $dureza = (float)$dureza;
    }else{
        $dureza = '<strong class="rojo">'.(float)$dureza.'</strong>';
    }
}
if ($cloro_libre == NULL){
    $cloro_libre = "-";
}  else {
    if (($cloro_libre) >= 0.3 and ($cloro_libre <= 1.5)){
        $cloro_libre = (float)$cloro_libre;
    }  else {
        $cloro_libre = '<strong class="rojo">'.(float)$cloro_libre.'</strong>';
    }
}
if ($hierro == NULL){
    $hierro = "-";
}  else {
    if ($hierro <= 0.3){
        $hierro = (float)$hierro;
    }else{
        $hierro = '<strong class="rojo">'.(float)$hierro.'</strong>';
    }
}
if ($nitratos == NULL){
    $nitratos = "-";
}else{
    if ($nitratos <= 10){
        $hierro = (float)$nitratos;
    }  else {
        $nitratos = '<strong class="rojo">'.(float)$nitratos.'</strong>';
    }
}
if ($nitritos == NULL){
    $nitritos = "-";
}else{
    if ($nitritos <= 0.1){
        $nitritos = (float)$nitritos;
    }else{
        $nitritos = '<strong class="rojo">'.(float)$nitritos.'</strong>';
    }
}
if ($sulfatos == NULL){
    $sulfatos = "-";
}else{
    if ($sulfatos <= 250){
        $sulfatos = (float)$sulfatos;
    }else{
        $sulfatos = '<strong class="rojo">'.(float)$sulfatos.'</strong>';
    }
}
if ($fosfatos == NULL){
    $fosfatos = "-";
}else{
    if ($fosfatos < 0.3){
        $fosfatos = (float)$fosfatos;
    }else{
        $fosfatos = '<strong class="rojo">'.(float)$fosfatos.'</strong>';
    }
}
if ($manganeso == NULL){
    $manganeso = "-";
}else{
    if ($manganeso <= 0.1){
        $manganeso = (float)$manganeso;
    }else{
        $manganeso = '<strong class="rojo">'.(float)$manganeso.'</strong>';
    }
}
if ($fluoruros == NULL) {
    $fluoruros = "-";
}else{
    if ($fluoruros < 1.4){
        $fluoruros = (float)$fluoruros;
    }else{
        $fluoruros = '<strong class="rojo">'.(float)$fluoruros.'</strong>';
    }
}
if ($amoniaco == NULL) {
    $amoniaco = "-";
}else{
    if ($amoniaco <=1.0){
        $amoniaco = (float)$amoniaco;
    }else{
        $amoniaco = '<strong class="rojo">'.(float)$amoniaco.'</strong>';
    }
}
if ($col_fecales == NULL) {
    $col_fecales = "-";    
}else{
    if($col_fecales == 0){
        $col_fecales = "Ausencia";
    }  else {
        $col_fecales = '<strong class="rojo">'.(float)$col_fecales.'</strong>';
    }
}
if ($col_ufc == NULL) {
    $col_ufc = "-";    
}else{
    if($col_ufc == 0){
        $col_ufc = "Ausencia";
    }  else {
        $col_ufc = '<strong class="rojo">'.(float)$col_ufc.'</strong>';
    }
}
if ($col_totales == NULL) {
    $col_totales = "-";    
}else{
    if($col_totales == 0){
        $col_totales = "Ausencia";
    }  else {
        $col_totales = '<strong class="rojo">'.(float)$col_totales.'</strong>';
    }
}
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
        <p>Informe N&ordm;:&nbsp;'.$codigo.'</p>
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
    
  <tr>
  <td align="left"><strong>Departamento:</strong></td>
  <td colspan="3">'.$departamento.'</td>
  </tr>

  <tr>
  <td align="left"><strong>T&eacute;cnico responsable de muestra:</strong></td>
  <td colspan="3">'.$recolector.'</td>
  </tr>
    </tbody>
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2" align="left">2) DATOS DE LA MUESTRA</th>
    <th colspan="2" align="left"><strong>Muestra N&ordm;:</strong>&nbsp;&nbsp;&nbsp;'.$numero.'</th>
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
    <td colspan="2" align="left"><strong>Sitio de toma de muestra:</strong></td>
    <td colspan="2">'.$fuente.'</td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"><strong>Fecha/hora de recolección:</strong></td>
    <td colspan="2">'.$fecha.'/'.$hora.'</td>
  </tr>
    
  <tr>
    <td colspan="2" align="left"><strong>Hora de recolección:</strong></td>
    <td colspan="2">'.$fecha_analisis.'/'.$hora_analisis.'</td>
  </tr>
    </tbody>
</table>
<br />
<p>..</p>
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
<td align="center">'.$ph.'</td>
</tr>

<tr>
<td><strong>Color</strong></td>
<td align="center">Color real</td>
<td align="center">20</td>
<td align="center">'.$color.'</td>
</tr>

<tr>
<td><strong>Olor</strong></td>
<td align="center">--</td>
<td align="center"><p>Es permitido olor y sabor removible por tratamiento  convencional&nbsp;*</p></td>
<td align="center">'.$olor.'</td>
</tr>

<tr>
<td><strong>Turbiedad</strong></td>
<td align="center">NTU</td>
<td align="center">10</td>
<td align="center">'.$turbiedad.'</td>
</tr>

<tr>
<td><strong>Temperatura</strong></td>
<td align="center">&deg;C</td>
<td align="center">Condici&oacute;n natural+/-3 &deg;C</td>
<td align="center">'.$temperatura.'</td>
</tr>
    
<tr>
<td><strong>S&oacute;lidos totales disueltos</strong></td>
<td align="center">mg/l</td>
<td align="center">500</td>
<td align="center">'.$sol_totoales.'</td>
</tr>
    
<tr>
<td><strong>Conductividad</strong></td>
<td align="center">&mu;S/cm</td>
<td align="center">-</td>
<td align="center">'.$conductividad.'</td>
</tr>
    </tbody>   
</table>

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
<td align="center">'.$dureza.'</td>
</tr>

<tr>
<td align="left"><strong>Cloro libre residual </strong></td>
<td align="center">mg/l</td>
<td align="center">0,3 a 1,5</td>
<td align="center">'.$cloro_libre.'</td>
</tr>

<tr>
<td align="left"><strong>Hierro total, Fe&sup3;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td align="center">'.$hierro.'</td>
</tr>

<tr>
<td align="left"><strong>Nitratos, NO3&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">10</td>
<td align="center">'.$nitratos.'</td>
</tr>

<tr>
<td align="left"><strong>Nitritos, NO2&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td align="center">'.$nitritos.'</td>
</tr>

<tr>
<td align="left"><strong>Sulfatos, SO4&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">250</td>
<td align="center">'.$sulfatos.'</td>
</tr>

<tr>
<td align="left"><strong>Fosfatos, PO4&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td align="center">'.$fosfatos.'</td>
</tr>

<tr>
<td align="left"><strong>Manganeso, Mn</strong></td>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td align="center">'.$manganeso.'</td>
</tr>

<tr>
<td align="left"><strong>Fluoruros (Fl&uacute;or), F</strong></td>
<td align="center">mg/l</td>
<td align="center">&lt;1,4</td>
<td align="center">'.$fluoruros.'</td>
</tr>

<tr>
<td align="left"><strong>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</strong></td>
<td align="center">mg/l</td>
<td align="center">1,0</td>
<td align="center">'.$amoniaco.'</td>
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
<td align="center">'.$col_totales.'</td>
</tr>

<tr>
<td align="left"><strong>Coliformes fecales</strong></td>
<td align="center">NMP/100ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td align="center">'.$col_fecales.'</td>
</tr>
    </tbody>
	
<tr>
<td align="left"><strong>Coliformes UFC</strong></td>
<td align="center">NMP/100ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td align="center">'.$col_ufc.'</td>
</tr>
    </tbody>	
	
</table>
<br />
<p></p>
<p>* L&iacute;mites permisibles basados en la norma TULAS  Libro VI, Anexo I, Tabla 1.<br/>
<p>** Menor a 1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo. <br>  
<p>*** Menor a 1 Significa que no se observa colonias. Método estándar 9222B, técnica de filtración por membrana. 44,5°C (+-) 0,2°C/24h.</p>
<strong>L&iacute;mite permisible: </strong> TULAS  Libro VI, Anexo I, Tabla 2</p>
<p><strong>OBSERVACI&Oacute;N:  </strong>'.$observacion.'</p>
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


