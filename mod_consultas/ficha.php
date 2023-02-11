<table width="100%">
    <tr>
    <td><img src="../imagen/cantones/<?php echo $reg[0]["foto"]; ?>" width="84" height="60" /></td>
    <td style="color:#000; text-align:center">
        <h3>SECRETAR&Iacute;A DEL AGUA<br /></h3>
        <h4>CONTROL DE CALIDAD DEL AGUA PARA CONSUMO HUMANO<br />Reporte de análisis de agua</h4>
        <p>Informe N&ordm;:&nbsp;<?php echo $reg[0]["codmuestra"] ?></p>
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
  <td colspan="3"><?php echo $reg[0]["municipio"]; ?></td>
  </tr>
  
  <tr>
  <th>Departamento:</th>
  <td colspan="3"><?php echo $reg[0]["departamento"]; ?></td>
  </tr>
  
  <tr>
  <th>T&eacute;cnico responsable de muestra:</th>
  <td colspan="3"><?php echo $reg[0]["recolector"]; ?></td>
  </tr>
      
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2">2) DATOS DE LA MUESTRA</th>
    <td colspan="2">Muestra N&ordm;:&nbsp;&nbsp;&nbsp;<?php echo $reg[0]["numero"] ?></td>
    </tr> 
</thead>   
   
  <tr>
   <th>Provincia: </th>
  <td width="48%"><?php echo $reg[0]["nom_provincia"]?></td>
  <td width="17%"><strong>Cant&oacute;n:</strong></td>
  <td width="21%"><?php echo $reg[0]["nombrecanton"] ?></td>
  </tr>
  
  <tr>
  <th>Parroquia: </th>
  <td width="48%"><?php echo $reg[0]["nombreparroquia"] ?></td>
  <td width="17%"><strong>Barrio:</strong></td>
  <td width="21%"><?php echo $reg[0]["nombrebarrio"] ?></td>
  </tr>
  
  <tr>
  <th width="14%">Sistema: </th>
  <td width="48%"><?php echo $reg[0]["nombresistema"] ?></td>
  <td width="17%"><strong>Tipo:</strong></td>
  <td width="21%"><?php echo $reg[0]["tiposistema"] ?></td>
  </tr>
  
  <tr>
    <th colspan="2">Sitio de toma de muestra:</th>
    <td colspan="2"><?php echo $reg[0]["fuente"]; ?></td>
    </tr>
  
  <tr>
    <th colspan="2">Fecha/hora de recolección:</th>
    <td colspan="2">
    <?php echo $reg[0]["fecha"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["hora"]; ?>
    </td>
  	</tr>
    
    <tr>
    <th colspan="2">Fecha/hora de análisis:</th>
    <td colspan="2">
    <?php echo $reg[0]["fecha_analisis"]; ?>&nbsp;/&nbsp;<?php echo $reg[0]["hora_analisis"]; ?>
    </td>
  	</tr>

</table>
<br />
<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">3. CARACTER&Iacute;STICAS F&Iacute;SICAS:</th>
</tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">Límite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>pH</th>
<td>Unidades</td>
<td>6 - 9</td>
<td style="text-align: center;">
    <?php 
    $ph = $reg[0]["ph"];
    if ($ph>=6 and $ph<=9){
        echo $ph;
    } else{
        echo '<strong class="rojo">'.$ph.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Color</th>
<td align="center">Color real</td>
<td align="center">20</td>
<td>
    <?php
    $color = $reg[0]["color"];
    if ($color<=20){
        echo $color;
    }else{
        echo '<strong class="rojo">'.$color.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Olor</th>
<td align="center">--</td>
<td align="center"><p style="font-size: 10px; ">Es permitido olor y sabor removible por tratamiento  convencional<strong>&nbsp;*</strong></p></td>
<td>
    <?php
    $olor = $reg[0]["olor"];
    if ($olor == NULL){
        echo "-";
    }else{
        echo '<strong class="rojo">'.$olor.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Turbiedad</th>
<td align="center">NTU</td>
<td align="center">10</td>
<td>
    <?php
    $turbiedad = $reg[0]["turbiedad"];
    if ($turbiedad<=10) {
        echo $turbiedad;
    }else{
        echo '<strong class="rojo">'.$turbiedad.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Temperatura</th>
<td>&deg;C</td>
<td>Condici&oacute;n natural+/-3 &deg;C</td>
<td>
    <?php
    $temp = $reg[0]["temperatura"];
    echo $temp;
    ?>
</td>
</tr>
<tr>
<th>S&oacute;lidos totales disueltos</th>
<td>mg/l</td>
<td>500</td>
<td>
    <?php
    $sold_totales = $reg[0]["solidos_totales"];
    if ($sold_totales<=500) {
        echo $sold_totales;
    }else{
        echo '<strong class="rojo">'.$sold_totales.'</strong>';
    }
    ?>
</td>
</tr>
<tr>
<th>Conductividad</th>
<td>&mu;S/cm</td>
<td>-</td>
<td><?php echo $reg[0]["conductividad"] ?></td>
</tr>
</table>

<table width="100%" border="1">
<thead>
<tr>
  <th colspan="4">4. CARACTER&Iacute;STICAS QU&Iacute;MICAS:</th></tr>
<tr>
<th>Parámetro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L&iacute;mite </th>
<th style="text-align:center;">Resultados</th>
</tr>
</thead>

<tr>
<th>Dureza, CaCO3</th>
<td align="center">mg/l</td>
<td align="center">500</td>
<td>
    <?php
    $dureza = $reg[0]["dureza"];
    if ($dureza<=500){
        echo $dureza;
    }else{
        echo '<strong class="rojo">'.$dureza.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Cloro libre residual </th>
<td align="center">mg/l</td>
<td align="center">0,3 a 1,5</td>
<td>
    <?php
    $cloro = $reg[0]["cloro_libre"];
    if ($cloro>=0.3 and $cloro<=1.5){
        echo $cloro;
    }else{
        echo '<strong class="rojo">'.$cloro.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Hierro total, Fe&sup3;</th>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td>
    <?php
    $hierro = $reg[0]["hierro"];
    if($hierro<=0.3){
        echo $hierro;
    }else{
        echo '<strong class="rojo">'.$hierro.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Nitratos, NO3&macr;</th>
<td align="center">mg/l</td>
<td align="center">10</td>
<td>
    <?php
    $nitratos = $reg[0]["nitratos"];
    if($nitratos<=10){
        echo $nitratos;
    }else{
        echo '<strong class="rojo">'.$nitratos.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Nitritos, NO2&macr;</th>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td>
    <?php
    $nitritos = $reg[0]["nitritos"];
    if ($nitritos<=0.1){
        echo $nitritos;
    }else{
        echo '<strong class="rojo">'.$nitritos.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Sulfatos, SO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">250</td>
<td>
    <?php
    $sulfatos = $reg[0]["sulfatos"];
    if ($sulfatos<=250){
        echo $sulfatos;
    }else{
        echo '<strong class="rojo">'.$sulfatos.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Fosfatos, PO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">0,3</td>
<td>
    <?php
    $fosfatos = $reg[0]["fosfatos"];
    if ($fosfatos<=0.3){
        echo $fosfatos;
    }else{
        echo '<strong class="rojo">'.$fosfatos.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Manganeso, Mn</th>
<td align="center">mg/l</td>
<td align="center">0,1</td>
<td>
    <?php
    $manganeso = $reg[0]["manganeso"];
    if($manganeso<=0.1){
        echo $manganeso;
    }else{
        echo '<strong class="rojo">'.$manganeso.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Fluoruros (Fl&uacute;or), F</th>
<td align="center">mg/l</td>
<td align="center">&lt;1,4</td>
<td>
    <?php
    $fluor = $reg[0]["fluoruros"];
    if ($fluor<1.4){
        echo $fluor;
    }else{
        echo '<strong class="rojo">'.$fluor.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</th>
<td align="center">mg/l</td>
<td align="center">1,0</td>
<td>
    <?php
    $amoniaco = $reg[0]["amoniaco"];
    if($amoniaco<=1){
        echo $amoniaco;
    }else{
        echo '<strong class="rojo">'.$amoniaco.'</strong>';
    }
    ?>
</td>
</tr>
</table>

<table width="100%" border="1">
  <thead>
<tr>
<th colspan="4">5. REQUISITOS MICROBIOL&Oacute;GICOS:</th>
</tr>
<tr>
<th>Par&aacute;metro</th>
<th style="text-align:center;">Unidad</th>
<th style="text-align:center;">L&iacute;mite</th>
<th style="text-align:center;">Resultados</th>  
</tr>
</thead>

<tr>
<th>Coliformes totales</th>
<td align="center">NMP/100 ml</td>
<td>0<strong>&nbsp;*</strong></td>
<td>
     <?php
    $col_tot = $reg[0]["coliformes_totales"];
    if ($col_tot==0){
        echo "Ausencia";
    }else{
        echo '<strong class="rojo">'.$col_tot.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Coliformes fecales</th>
<td align="center">NMP/100ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td>
    <?php
    $col_fec = $reg[0]["coliformes_fecales"];
    if ($col_fec==0){
            echo "Ausencia";
    }else{
        echo '<strong class="rojo">'.$col_fec.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Coliformes fecales</th>
<td align="center">UFC/100ml</td>
<td align="center">0<strong>&nbsp;*</strong></td>
<td>
    <?php
    $col_ufc = $reg[0]["coliformes_fecales"];
    if ($col_ufc==0){
            echo "Ausencia";
    }else{
        echo '<strong class="rojo">'.$col_ufc.'</strong>';
    }
    ?>
</td>
</tr>

</table>
<br />
<p style="text-align:left;">(*) L&iacute;mites permisibles basados en la norma TULAS  Libro VI, Anexo I, Tabla 1.</p>
<p style="text-align:left;">** Menor a 1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo. </p><br>  
<p style="text-align:left;">*** Menor a 1 Significa que no se observa colonias. Método estándar 9222B, técnica de filtración por membrana. 44,5°C (+-) 0,2°C/24h.</p>
<p style="text-align:left;"><strong>L&iacute;mite permisible: </strong> TULAS  Libro VI, Anexo I, Tabla 2</p>
<p style="text-align:left;"><strong>OBSERVACI&Oacute;N:  </strong><?php echo $reg[0]["observacion"]; ?></p>
<form name="exportar" id="exportar" action="pdf.php" method="post">
<input type="hidden" name="idmuestra" id="idmuestra" value="<?php echo $id; ?>" />
<input type="hidden" name="canton" id="canton" value="<?php echo $canton; ?>"  />
<input type="submit" class="btn-success" name="exportar" value="Exportar a PDF" />
</form>
