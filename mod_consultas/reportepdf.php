<?php

ini_set ('error_reporting', E_ALL & ~E_NOTICE);

require_once ("../clases/Muestra.php");
require_once ("../funciones/tildes.php");
require_once ("funciones.php");

require_once ("../dompdf-1.2.0/autoload.inc.php");


$idmuestra = (int)$_POST["idmuestra"];
$canton = (int)$_POST["canton"];
$strsello = darsello($canton);
$muestranew = new Muestra();
$reg = $muestranew->muestra_id($idmuestra,$canton);
$codigo = $reg[0]["codmuestra"];
$numero = $reg[0]["ensayo"];
$recolector = chao_tilde($reg[0]["recolector"]);
$nomprovincia= chao_tilde($reg[0]["nombreprovincia"]);
$nomcanton= chao_tilde($reg[0]["nombrecanton"]);
$parroquia = chao_tilde($reg[0]["nombreparroquia"]);
$sistema = chao_tilde($reg[0]["nombresistema"]);
$tipo = $reg[0]["tiposistema"];
$fuente = chao_tilde($reg[0]["fuente"]);
$fecha_muestreo = $reg[0]["fecha_muestreo"];
$fecha_analisis = $reg[0]["fecha_analisis"];
$color = $reg[0]["color_aparente"];
$turbiedad = $reg[0]["turbiedad"];
$dureza = $reg[0]["dureza"];
$cloro_libre = $reg[0]["cloro_libre"];
$fluoruros = $reg[0]["fluoruro"];
$manganeso = $reg[0]["manganeso"];
$nitratos = $reg[0]["nitratos"];
$nitritos = $reg[0]["nitritos"];
$col_fecales = $reg[0]["coliformes_fecales"];
$cry = $reg[0]["cryptosporidium"];
$giardia = $reg[0]["giardia"];
$ph = $reg[0]["ph"];
$temperatura = $reg[0]["temperatura"];
$sol_totoales = $reg[0]["solidos_totales"];
$conductividad = $reg[0]["conductividad"];
$hierro = $reg[0]["hierro"];
$sulfatos = $reg[0]["sulfatos"];
$arsenico = $reg[0]["arsenico"];
$cobre = $reg[0]["cobre"];
$cromo = $reg[0]["cromo"];
$plomo = $reg[0]["plomo"];
$cadmio = $reg[0]["cadmio"];
$mercurio = $reg[0]["mercurio"];
$observacion = $reg[0]["observacion"];

#$type=pathinfo($strsello, PATHINFO_EXTENSION);
#$imagenBase64 = 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($strsello));

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
    if ($color <= 15){
        $color = (float)$color;
    }else{
        $color = '<strong class="rojo">'.(float)$color.'</strong>';
    }
}
if ($turbiedad == NULL){
    $turbiedad = "-";
}else{
    if ($turbiedad <= 5){
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
    if ($nitratos <= 50){
        $hierro = (float)$nitratos;
    }  else {
        $nitratos = '<strong class="rojo">'.(float)$nitratos.'</strong>';
    }
}
if ($nitritos == NULL){
    $nitritos = "-";
}else{
    if ($nitritos <= 3){
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
    if ($fluoruros < 1.5){
        $fluoruros = (float)$fluoruros;
    }else{
        $fluoruros = '<strong class="rojo">'.(float)$fluoruros.'</strong>';
    }
}
if ($arsenico == NULL) {
    $arsenico = "-";
}else{
    if ($arsenico <=1.0){
        $arsenico = (float)$arsenico;
    }else{
        $arsenico = '<strong class="rojo">'.(float)$arsenico.'</strong>';
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
if ($cry == NULL) {
    $cry = "-";    
}else{
    if($cry == 0){
        $cry = "Ausencia";
    }  else {
        $cry = '<strong class="rojo">'.(float)$cry.'</strong>';
    }
}

if ($giardia == NULL) {
    $giardia = "-";    
}else{
    if($giardia == 0){
        $giardia = "Ausencia";
    }  else {
        $giardia = '<strong class="rojo">'.(float)$giardia.'</strong>';
    }
}

if ($cobre == NULL) {
    $cobre = "-";    
}else{
    if($cobre == 0){
        $cobre = "Ausencia";
    }  else {
        $cobre = '<strong class="rojo">'.(float)$cobre.'</strong>';
    }
}

if ($cromo == NULL) {
    $cromo = "-";    
}else{
    if($cromo == 0){
        $cromo = "Ausencia";
    }  else {
        $cromo = '<strong class="rojo">'.(float)$cromo.'</strong>';
    }
}

if ($plomo == NULL) {
    $plomo = "-";    
}else{
    if($plomo == 0){
        $plomo = "Ausencia";
    }  else {
        $plomo = '<strong class="rojo">'.(float)$plomo.'</strong>';
    }
}

if ($mercurio == NULL) {
    $mercurio = "-";    
}else{
    if($mercurio == 0){
        $mercurio = "Ausencia";
    }  else {
        $mercurio = '<strong class="rojo">'.(float)$mercurio.'</strong>';
    }
}

$nombrepdf = $parroquia."-".$fecha_muestreo;

unset($html);
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">

<title>' .$nombrepdf. '  </title>
<style>
    body{
        font-size: 9.5px;
    }
    .rojo{
        color: #FF4500;
        text-decoration: none;
        text-transform: none;
    }
    .img{
        height: 2px;
	   width: 70px;
    }
</style>
</head>

<body>
<center>
<table width="100%" >
    <tr>
    <td align="center">'.$strsello.' </td>
    <td align="center">
        <h3>SECRETAR&Iacute;A DEL AGUA</h3><br />
        <h4>CONTROL DE CALIDAD DEL AGUA PARA CONSUMO HUMANO<br />
        Reporte de an&aacute;lisis de agua</h4>
        <p>Informe N&ordm;:&nbsp;'.$codigo.'</p>
    </td>
    <td align="center"> 
    <img src="../imagen/senagua.gif" height="80" />
    </td>
    </tr>
</table>
</center>
<br />
<table width="100%" border="1">
  <thead>
  <tr>
    <th colspan="4" align="left">1) DATOS DE LA INSTITUCI&Oacute;N</th>   
  </tr>
  </thead>  
    <tbody>

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
  <td width="33%">'.$nomprovincia.'</td>
  </tr>	 
	 
	 
  <tr>
  <td align="left"><strong>Provincia:</strong></td>
  <td width="32%">Chimborazo</td>
  <td width="15%" align="left"><strong>Cant&oacute;n:</strong></td>
  <td width="33%">'.$nomcanton.'</td>
  </tr>
  
  <tr>
  <td align="left"><strong>Parroquia:</strong></td>
  <td width="32%">'.$parroquia.'</td>
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
    <td colspan="2" align="left"><strong>Fecha/hora de recolecci�n:</strong></td>
    <td colspan="2">'.$fecha_muestreo.'</td>
  </tr>
    
  <tr>
    <td colspan="2" align="left"><strong>Hora de recolecci�n:</strong></td>
    <td colspan="2">'.$fecha_analisis.'</td>
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
<th>Par�metro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L�mite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td><strong>pH</strong></td>
<td align="center">Unidades</td>
<td align="center">6 - 9 *</td>
<td align="center">'.$ph.'</td>
</tr>

<tr>
<td><strong>Color</strong></td>
<td align="center">Color real</td>
<td align="center">15</td>
<td align="center">'.$color.'</td>
</tr>


<tr>
<td><strong>Turbiedad</strong></td>
<td align="center">NTU</td>
<td align="center">5</td>
<td align="center">'.$turbiedad.'</td>
</tr>

<tr>
<td><strong>Temperatura</strong></td>
<td align="center">&deg;C</td>
<td align="center">Condici&oacute;n natural+/-3 &deg;C *</td>
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
<td align="center">- *</td>
<td align="center">'.$conductividad.'</td>
</tr>
    </tbody>   
</table>

<table width="100%" border="1">
<thead>
<tr>
  <th colspan="4" align="left">4. CARACTER&Iacute;STICAS QU&Iacute;MICAS:</th></tr>
<tr>
<th>Par�metro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L&iacute;mite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>
    <tbody>
<tr>
<td align="left"><strong>Dureza, CaCO3</strong></td>
<td align="center">mg/l</td>
<td align="center">500 *</td>
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
<td align="center">0,3 *</td>
<td align="center">'.$hierro.'</td>
</tr>

<tr>
<td align="left"><strong>Nitratos, NO3&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">50</td>
<td align="center">'.$nitratos.'</td>
</tr>

<tr>
<td align="left"><strong>Nitritos, NO2&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">3.0</td>
<td align="center">'.$nitritos.'</td>
</tr>

<tr>
<td align="left"><strong>Sulfatos, SO4&macr;</strong></td>
<td align="center">mg/l</td>
<td align="center">250 *</td>
<td align="center">'.$sulfatos.'</td>
</tr>


<tr>
<td align="left"><strong>Manganeso, Mn</strong></td>
<td align="center">mg/l</td>
<td align="center">0,1 *</td>
<td align="center">'.$manganeso.'</td>
</tr>

<tr>
<td align="left"><strong>Fluoruros (Fl&uacute;or), F</strong></td>
<td align="center">mg/l</td>
<td align="center">&lt;1,5</td>
<td align="center">'.$fluoruros.'</td>
</tr>

<tr>
<td align="left"><strong>Arsenico, As;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,01 *</td>
<td align="center">'.$arsenico.'</td>
</tr>

<tr>
<td align="left"><strong>Cobre, Co;</strong></td>
<td align="center">mg/l</td>
<td align="center">2,0 *</td>
<td align="center">'.$cobre.'</td>
</tr>

<tr>
<td align="left"><strong>Cromo, Cr;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,05 *</td>
<td align="center">'.$cromo.'</td>
</tr>

<tr>
<td align="left"><strong>Plomo, Pb;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,01 *</td>
<td align="center">'.$plomo.'</td>
</tr>

<tr>
<td align="left"><strong>Cadmio, Cd;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,003 *</td>
<td align="center">'.$cadmio.'</td>
</tr>

<tr>
<td align="left"><strong>Mercurio, Hg;</strong></td>
<td align="center">mg/l</td>
<td align="center">0,006 *</td>
<td align="center">'.$mercurio.'</td>
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
<td align="left"><strong>Coliformes Fecales</strong></td>
<td align="center">NMP/100 ml</td>
<td align="center">3000<strong>&nbsp;*</strong></td>
<td align="center">'.$col_fecales.'</td>
</tr>

<tr>
<td align="left"><strong>Cryptosporidium</strong></td>
<td align="center">Número de ooquistes/L</td>
<td align="center">1<strong>&nbsp;*</strong></td>
<td align="center">'.$cry.'</td>
</tr>


<tr>
<td align="left"><strong>Giardia</strong></td>
<td align="center">Número de quistes/L</td>
<td align="center">50<strong>&nbsp;*</strong></td>
<td align="center">'.$giardia.'</td>
</tr>
    </tbody>
</table>
<br />
<p></p>
<p>(*) L�mites permisibles para aguas de consumo humano y uso dom�stico, que �nicamente requieren tratamiento convenciona basados en la norma TULAS Libro VI, Anexo I, Tablas 1 y 2.
<p>(**) Menor a 1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo.
<p>(***) Menor a 1 Significa que no se observa colonias. M�todo est�ndar 9222B, t�cnica de filtraci�n por membrana. 44,5�C (+-) 0,2�C/24h. <br/>
<p>
<strong>L&iacute;mite permisible: </strong> NORMA
  T�CNICA ECUATORIANA(NTE) INEN 1108 QUINTA REVISI�N 2014-01</p>
<p><strong>OBSERVACI&Oacute;N:  </strong>'.$observacion.'</p>
</body>
</html>
';

use Dompdf\Dompdf;
$pdf = new Dompdf();


#$options = new Options();
#$options->set('isRemoteEnabled', TRUE);
#$options->set('isHtml5ParserEnabled', TRUE);
#$options->set('chroot','/');
#$options->setChroot('/');
#$options->setIsRemoteEnabled(TRUE);
#$options->setIsHtml5ParserEnabled(TRUE);
#$pdf = new DOMPDF($options);


$options = $pdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$pdf->setOptions($options);

#$pdf->set_base_path($_SERVER['DOCUMENT_ROOT']);
$pdf->loadHtml($html);
//ini_set("memory_limit", "32M");
#$pdf->setPaper('A4', 'portrait');
/*$contxt = stream_context_create([
    'ssl' => [
        'verify_peer' => FALSE,
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE
    ]
]);*/
#$pdf->setHttpContext($contxt);


$pdf->setPaper('letter');

$pdf->render();

#$pdf->stream("$nombrepdf".'.pdf', array("Attachment" => FALSE));
$pdf->stream("$nombrepdf".'.pdf');