<?php 
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include("../clases/Muestra.php");
$reg[] = array();
$canton =  (int)$_GET["canton"];
$id = (int)$_GET["idmuestra"];
$muestra = new Muestra();
$reg = $muestra->muestra_id($id,$canton);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    
<title>Reporte de Ficha</title>

<meta name="keywords" content="fichas, agua potable" />
<meta name="description" content="" />
  
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
    
    <link rel="stylesheet" type="text/css"  href="../css/style.css"> 
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    
    
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
    <link href="../themes/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />


    
    
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <link type="text/css" href="../themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet" />
        <link type="text/css" href="../css/demo_table_jui.css" rel="stylesheet" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    
    <div class="container">
    
<!-- Titulos -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Cali Agua</a> </div>
    
    <!-- NAV -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php" class="page-scroll">Inicio</a></li>
          <li><a href="../contacto.php"  class="page-scroll">Acerca de</a></li>
        <li><a href="../estadisticas_agua/tipo_sistema.php" class="page-scroll">Estadísticas</a></li>
        <li><a href="../mod_consultas/"  class="page-scroll">Consulta de Fichas</a></li>
          
      </ul> 
        <br class="clear" />
    </div>
  </div>
</nav>

        <br><br><br><br><br><br>
    
<div id="wrapper">
	<div id="page" class="container">
    <table width="100%">
    <tr>
 
    <td style="color:#000; text-align:center">
        <h3>SECRETAR&Iacute;A DEL AGUA<br /></h3>
        <h4>CONTROL DE CALIDAD DEL AGUA PARA CONSUMO HUMANO<br />Reporte de análisis de agua</h4>
        <p>Informe N&ordm;:&nbsp;<?php echo $reg[0]["ensayo"] ?></p>
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
  <th>T&eacute;cnico responsable de muestra:</th>
  <td colspan="3"><?php echo $reg[0]["recolector"]; ?></td>
  </tr>
      
</table>

<table width="100%" border="1">
<thead>
  <tr>
    <th colspan="2">2) DATOS DE LA MUESTRA</th>
    <td colspan="2">C&oacute;digo de Muestra:&nbsp;&nbsp;&nbsp;<?php echo $reg[0]["codmuestra"] ?></td>
    </tr> 
</thead>   
   
  <tr>
  <th>Provincia: </th>
  <td width="48%"><?php echo $reg[0]["nombreprovincia"]?></td>
  <td width="17%"><strong>Cant&oacute;n:</strong></td>
  <td width="21%"><?php echo $reg[0]["nombrecanton"] ?></td>
  </tr>
  
  <tr>
  <th>Parroquia: </th>
  <td width="48%"><?php echo $reg[0]["nombreparroquia"] ?></td>
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
    <?php echo $reg[0]["fecha_muestreo"];  ?>
    </td>
  	</tr>
    
    <tr>
    <th colspan="2">Fecha/hora de análisis:</th>
    <td colspan="2">
    <?php echo $reg[0]["fecha_analisis"]; ?>
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
<td>6 - 9 *</td>
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
<td align="center">15</td>
<td>
    <?php
    $color = $reg[0]["color_aparente"];
    if ($color<=15){
        echo $color;
    }else{
        echo '<strong class="rojo">'.$color.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th>Turbiedad</th>
<td align="center">NTU</td>
<td align="center">5</td>
<td>
    <?php
    $turbiedad = $reg[0]["turbiedad"];
    if ($turbiedad<=5) {
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
<td>Condici&oacute;n natural+/-3 &deg;C <strong>*</strong></td>
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
<td>500 <strong>*</strong></td>
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
<td>- <strong>*</strong></td>
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
<td align="center">500 <strong>*</strong></td>
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
<td align="center">0,3 *</td>
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
<td align="center">50</td>
<td>
    <?php
    $nitratos = $reg[0]["nitratos"];
    if($nitratos<=50){
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
<td align="center">3.0</td>
<td>
    <?php
    $nitritos = $reg[0]["nitritos"];
    if ($nitritos<=3){
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
<td align="center">250 *</td>
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
<th>Manganeso, Mn</th>
<td align="center">mg/l</td>
<td align="center">0,1 *</td>
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
<td align="center">1.5</td>
<td>
    <?php
    $fluor = $reg[0]["fluoruro"];
    if ($fluor<1.5){
        echo $fluor;
    }else{
        echo '<strong class="rojo">'.$fluor.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Arsenico, As</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $arsenico = $reg[0]["arsenico"];
    if($arsenico<=0.01){
        echo $arsenico;
    }else{
       echo '<strong class="rojo">'.$arsenico.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Cobre, Co</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $cobre = $reg[0]["cobre"];
    if($cobre<=2){
        echo $cobre;
    }else{
        echo '<strong class="rojo">'.$cobre.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Cromo, Cr</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $cromo = $reg[0]["cromo"];
    if($cromo<=0.05){
        echo $cromo;
    }else{
        echo '<strong class="rojo">'.$cromo.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Plomo, Pb</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $plomo = $reg[0]["plomo"];
    if($plomo<=0.01){
        echo $plomo;
    }else{
        echo '<strong class="rojo">'.$plomo.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Cadmio, Cd</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $cadmio = $reg[0]["cadmio"];
    if($cadmio<=0.03){
        echo $cadmio;
    }else{
        echo '<strong class="rojo">'.$cadmio.'</strong>';
    }
    ?>
</td>
</tr>

<tr>
<th> Mercurio, Hg</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td>
    <?php
    $mercurio = $reg[0]["mercurio"];
    if($mercurio<=0.006){
        echo $mercurio;
    }else{
        echo '<strong class="rojo">'.$mercurio.'</strong>';
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
<th>Coliformes fecales</th>
<td align="center">NMP/100 ml</td>
<td>3000<strong>&nbsp;*</strong></td>
<td>
     <?php
    $col_tot = $reg[0]["coliformes_fecales"];
    if ($col_tot == NULL){
        echo "-";
    }else{
		if ($col_tot <= 3000){
		if ($col_tot == 0){
			echo "Ausencia";
		}else{
		echo $col_tot;
		}
	} else{
		echo '<strong class="rojo">'.$col_tot.'</strong>';	
	}
	}
	
    ?>
</td>
</tr>

<tr>
<th>Cryptosporidium</th>
<td align="center">Número de ooquistes/L</td>
<td align="center">50<strong>&nbsp;*</strong></td>
<td>
    <?php
    $cry = $reg[0]["cryptosporidium"];
    if ($cry == ""){
        echo "-";
    }else{
		if ($cry <= 50){
		if ($cry == 0){
			echo "Ausencia";
		}else{
		echo $cry;
		}
	} else{
		echo '<strong class="rojo">'.$cry.'</strong>';	
	}
	}	
    ?>

</tr>
 <th>Giardia</th>
 <td align="center">Número de quistes/L</td>
<td align="center">1* <strong>&nbsp;</strong></td>
<td>
 <?php
    $giardia = $reg[0]["giardia"];
    if ($giardia == ""){
        echo "-";
    }else{
		if ($giardia <= 1){
		if ($giardia == 0){
			echo "Ausencia";
		}else{
		echo $giardia;
		}
	} else{
		echo '<strong class="rojo">'.$giardia.'</strong>';	
	}
	}	
    ?>
  </td>
</tr>

</table>
<br>
<p style="font-size:12px;">* L&iacute;mites permisibles para aguas de consumo  humano y uso doméstico, que únicamente requieren tratamiento convenciona basados en la norma TULAS  Libro VI, Anexo I, Tablas 1 y 2.<br>
** Menor a 1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo. <br>  
*** Menor a 1 Significa que no se observa colonias. Método estándar 9222B, técnica de filtración por membrana. 44,5°C (+-) 0,2°C/24h.</p>
<br>

<p style="text-align:left;"><strong>L&iacute;mite permisible: </strong>NORMA
  TÉCNICA ECUATORIANA(NTE) INEN 1108 QUINTA REVISIÓN 2014-01</p>
<p style="text-align:left;"><strong>OBSERVACIÓN:  </strong><?php echo $reg[0]["observacion"]; ?></p>
<form name="exportar" id="exportar" action="reportepdf.php" method="post">
<input type="hidden" name="idmuestra" id="idmuestra" value="<?php echo $id; ?>" />
<input type="hidden" name="canton" id="canton" value="<?php echo $canton; ?>"  />
    
    
<center>
    <button type="submit" class="btn btn-success btn-small" name="exportar" value="Exportar a PDF" ><i class="icon"></i>Descargar PDF</button>  
    </center>    
  
    
</form>

	</div>
	
</div>

        </div>
    
    <br><br>
       <script type="text/javascript" src="../js/main.js"></script>
    <footer>
    <div id="footer" >
    
        <center>
    <img src="../img/LOGO_U_BN.png" height="90" alt="unach.png">
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
    <img src="../img/senagua.jpg"  height="98" alt="senagua.jpg" usemap="#foot" />
     </center>

      

    <!-- Footer ================================================== -->
          <div class="container-fluid text-center copyrights">
            <div class="col-md-8 col-md-offset-2">

              <p style="color: white;">&copy; 2022 CaliAgua - Dirección Zonal 3 MAATE | Todos los derechos reservados | Desarrollado por <a href="https://www.unach.edu.ec/" rel="nofollow">UNACH</a></p>
       
        </div>
      </div> 
    </div>
       </footer>
    
</body>
</html>