<?php 
error_reporting(E_ALL);
include_once '../clases/Muestra.php';
$datos[] = array();
if(isset($_GET) and $_GET["canton"]!='' and isset($_GET["id"]))
{
$canton = (int)$_GET["canton"];
$muestra = (int)$_GET["id"];  
$muestras = new Muestra();
$datos[] = $muestras->muestra_id($muestra,$canton);
$regist = new Muestra();
$datos = $regist->muestra_id($muestra,$canton);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/fichas.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.4.1.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript" src="../js/additional-methods.js"></script>
<script language="javascript">
$(document).ready(function() {
        $.validator.addMethod("alfa",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo sólo admite letras.");
        $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo admite letras, espacio, guión bajo y números.");
        $.validator.addMethod("decimal",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Por favor ingrese número decimales.");
	$("#update_muestra").validate({
		rules:{
			'departamento':{
                            required:true,
                            alfa:"[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"
                        },
			'recolector':{
                            required:true,
                            alfa:"[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"
                        },
			'fuente':{
                            required:true,
                            alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$"
                        },
                        'color':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'turbiedad':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
			'olor':{alfa:"[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"},
                        'ph':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'temperatura':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'solidos_totales':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'conductividad':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'dureza':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'cloro_libre':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'fluoruros':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'manganeso':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'nitratos':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'nitritos':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'hierro':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'fosfatos':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'sulfatos':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'amoniaco':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'coliformes_fecales':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
						'coliformes_ufc':{decimal:"^([0-9])*[.]?[0-9]*$",number:true},
                        'coliformes_totales':{decimal:"^([0-9])*[.]?[0-9]*$",number:true}
			},
		messages:{
			'departamento':{
                            required:'Campo necesario'
                        },
			'recolector':{
                            required:'Campo necesario'
                        },
			'fuente':{
                            required:'Campo necesario'
                        }
                        
                }
		});
});
</script>
<title>..::Actualizar ficha::..</title>
</head>
    <body onLoad="history.forward(); document.form.reset();">
<div class="container">
    <div class="pagina">
        <div class="header">
  <div class="fltlft">
<h1>CALIAGUA</h1>
<h3>M&Oacute;DULO DE ADMINISTRACIÓN DE FICHAS</h3>
  </div>
  </div>
  <div id="menu">
  <ul id="menu1">
        <li>
            <a href="../administracion.php">
            <img src="../imagen/home.png" width="16" height="16"/>&nbsp;
            Inicio
            </a>
        </li>
        <li>
            <a href="index.php">
            <img src="../imagen/operaciones/home.png" width="16" height="16"/>&nbsp;
            Administraci&oacute;n
            </a>
        </li>
      	<li>
        	 <a href="registrar_muestra.php">
            <img src="../imagen/operaciones/reg.png" width="16" height="16" />&nbsp;
            Registrar ficha </a>
        </li>
        <li>
            <a href="../salir.php">
            <img src="../imagen/logout.png" width="16" height="16" />&nbsp; 
            Salir</a>
        </li>
    </ul>
  </div>
  <div class="content">

<form name="update_muestra" id="update_muestra" action="actualizar.php" method="post">
<table width="100%">
<thead>
<tr>
<th colspan="4" style="text-align:center;"><h2>Reporte de análisis de agua</h2></th>
</tr>
</thead>
<tr>
<th colspan="2">1. DATOS DE LA MUESTRA</th>
<th>C&oacute;digo de Muestra:</th>
<td style="text-align:left;"><label for="canton"></label>
 <input name="numero" type="text" id="numero"  value="<?php echo $datos[0]["numero"] ?>" readonly="readonly" /> 
</td>
</tr>

<tr>
<th>Provincia:</th>
<td style="text-align:left;"> <input name="provincia" type="text" value="<?php echo $datos[0]["nom_provincia"] ?>" readonly="readonly" />
</td>
<th>Cant&oacute;n:</th>
<td style="text-align:left;"><label for="canton"></label>
 <input name="canton" type="text" id="canton"  value="<?php echo $datos[0]["nombrecanton"] ?>" readonly="readonly" /> 
</td>
</tr>

<tr>
<th>Parroquia: </th>
<td style="text-align:left;"><label for="parroquia"></label>
<input name="parroquia" type="text" id="parroquia" value="<?php echo $datos[0]["nombreparroquia"] ?>" readonly="readonly" />
</td>
<th>Barrio/Comunidad: </th>
<td style="text-align:left;"><label for="barrio"></label>
<input type="text" name="barrio" id="barrio" value="<?php echo $datos[0]["nombrebarrio"] ?>" disabled="disabled" /></td>
</tr>

<tr>
<th>Nombre del sistema: </th>
<td style="text-align:left;"><label for="sistema"></label>
  <input name="sistema" type="text" disabled="disabled" id="sistema" value="<?php echo $datos[0]["nombresistema"] ?>" size="45"/>
</td>
<th>Tipo:</th>
<td style="text-align:left;"><input type="text" name="tipo" value="<?php echo $datos[0]["tiposistema"] ?>" disabled="disabled" /></td>
</tr>
<tr>
    <th>Instituci&oacute;n:</th>
    <td colspan="3" style="text-align:left;">
      <input name="institucion" type="text" readonly="readonly" size="75" value="<?php echo $datos[0]["municipio"] ?>" />
    </td>
  </tr>
<tr>
    <th>Departamento:</th>
    <td colspan="3" style="text-align:left;">
      <input name="departamento" type="text" class="editable" value="<?php echo $datos[0]["departamento"] ?>" size="50" maxlength="50" />
    </td>
  </tr>
  <tr>
    <th>Recolector:</th>
    <td colspan="3" style="text-align:left;">
      <input name="recolector" value="<?php echo $datos[0]["recolector"] ?>" type="text" class="editable" size="50" maxlength="50"/></td>
    </tr>
<tr>
    <th>Fecha de recolección:</th>
    <td style="text-align:left;">
    <input name="fecha" type="text" id="fecha" value="<?php echo $datos[0]["fecha"] ?>" size="11" readonly="readonly">
    </td>
    <th>Fecha de analisis: </th>
    <td  style="text-align:left;"><label for="hora"></label>
      <input name="hora" type="text" id="hora" value="<?php echo $datos[0]["fecha_analisis"] ?>" size="11" readonly="readonly" /></td>
  	</tr>
    
    <tr>
    <th>Hora de recolección:</th>
    <td style="text-align:left;">
    <input name="fecha" type="text" id="fecha" value="<?php echo $datos[0]["hora"] ?>" size="11" readonly="readonly">
    </td>
    <th>Hora de analisis: </th>
    <td  style="text-align:left;"><label for="hora"></label>
      <input name="hora" type="text" id="hora" value="<?php echo $datos[0]["hora_analisis"] ?>" size="11" readonly="readonly" /></td>
  	</tr>
    
  	<tr>
    <th>Sitio de toma de la muestra:</th>
    <td colspan="3" style="text-align:left;"><label for="fuente"></label>
      <input name="fuente" type="text" class="editable" value="<?php echo $datos[0]["fuente"] ?>"  id="fuente" size="50" /></td>
    </tr>
    
</table>
<br />
<table width="100%" border="1">
<thead>
<tr>
<th colspan="4">2. Características Físicas:</th>
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
<td>6 - 9 <strong>*</strong></td>
<td><input name="ph" type="text" class="editable" id="ph" value="<?php echo $datos[0]["ph"] ?>" size="10"  /></td>
</tr>

<tr>
<th>Color</th>
<td align="center">Color real</td>
<td align="center">15</td>
<td><input name="color" type="text" class="editable" id="color" value="<?php echo $datos[0]["color"] ?>" size="10" /></td>
</tr>

<tr>
<th>Olor</th>
<td align="center">--</td>
<td align="center">No objetable</td>
<td><input name="olor" type="text" class="editable" id="olor" value="<?php echo $datos[0]["olor"] ?>" size="10" /></td>
</tr>

<tr>
<th>Turbiedad</th>
<td align="center">NTU</td>
<td align="center">5</td>
<td><input name="turbiedad" type="text" class="editable" id="turbiedad" value="<?php echo $datos[0]["turbiedad"] ?>" size="10" /></td>
</tr>

<tr>
<th>Temperatura</th>
<td>&deg;C</td>
<td>Condici&oacute;n natural+/-3 &deg;C <strong>*</strong></td>
<td><input name="temperatura" type="text" class="editable" id="temperatura" value="<?php echo $datos[0]["temperatura"] ?>" size="10" /></td>
</tr>
<tr>
<th>S&oacute;lidos totales disueltos</th>
<td>mg/l</td>
<td>500 <strong>*</strong></td>
<td><input name="solidos_totales" type="text" class="editable" id="solidos_totales" value="<?php echo $datos[0]["solidos_totales"] ?>" size="10" /></td>
</tr>
<tr>
<th>Conductividad</th>
<td>&mu;S/cm</td>
<td>- <strong>*</strong></td>
<td><input name="conductividad" type="text" class="editable" id="conductividad" value="<?php echo $datos[0]["conductividad"] ?>" size="10" /></td>
</tr>
</table>
<br />
<table width="100%" border="1">
<thead>
<tr>
  <th colspan="4">3. Características químicas:</th></tr>
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
<td><input name="dureza" type="text" class="editable" id="dureza" value="<?php echo $datos[0]["dureza"] ?>" size="10" /></td>
</tr>

<tr>
<th>Cloro libre residual </th>
<td align="center">mg/l</td>
<td align="center">0,3 a 1,5</td>
<td><input name="cloro_libre" type="text" class="editable" id="cloro_libre" value="<?php echo $datos[0]["cloro_libre"] ?>" size="10" /></td>
</tr>

<tr>
<th>Hierro total, Fe&sup3;</th>
<td align="center">mg/l</td>
<td align="center">0,3 <strong>*</strong></td>
<td><input name="hierro" type="text" class="editable" id="hierro" value="<?php echo $datos[0]["hierro"] ?>" size="10" /></td>
</tr>

<tr>
<th>Nitratos, NO3&macr;</th>
<td align="center">mg/l</td>
<td align="center">50</td>
<td><input name="nitratos" type="text" class="editable" id="nitratos" value="<?php echo $datos[0]["nitratos"] ?>" size="10" /></td>
</tr>

<tr>
<th>Nitritos, NO2&macr;</th>
<td align="center">mg/l</td>
<td align="center">3.0</td>
<td><input name="nitritos" type="text" class="editable" id="nitritos" value="<?php echo $datos[0]["nitritos"] ?>" size="10" /></td>
</tr>

<tr>
<th>Sulfatos, SO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">250 <strong>*</strong></td>
<td><input name="sulfatos" type="text" class="editable" id="sulfatos" value="<?php echo $datos[0]["sulfatos"] ?>" size="10" /></td>
</tr>

<tr>
<th>Fosfatos, PO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">0,3 <strong>*</strong></td>
<td><input name="fosfatos" type="text" class="editable" id="fosfatos" value="<?php echo $datos[0]["fosfatos"] ?>" size="10" /></td>
</tr>

<tr>
<th>Manganeso, Mn</th>
<td align="center">mg/l</td>
<td align="center">0,1 <strong>*</strong></td>
<td><input name="manganeso" type="text" class="editable" id="manganeso" value="<?php echo $datos[0]["manganeso"] ?>" size="10" /></td>
</tr>

<tr>
<th>Fluoruros (Fl&uacute;or), F</th>
<td align="center">mg/l</td>
<td align="center">1.5</td>
<td><input name="fluoruros" type="text" class="editable" id="fluoruros" value="<?php echo $datos[0]["fluoruros"] ?>" size="10" /></td>
</tr>

<tr>
<th>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</th>
<td align="center">mg/l</td>
<td align="center">1,0 *</td>
<td><input name="amoniaco" type="text" class="editable" id="amoniaco" value="<?php echo $datos[0]["amoniaco"] ?>" size="10" /></td>
</tr>
</table>
<br />
<table width="100%" border="1">
  <thead>
<tr>
<th colspan="4">4. Requisitos microbiol&oacute;gicos: </th>
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
<td>3000<strong>&nbsp;*</strong></td>
<td>
    <input name="coliformes_totales" type="text" class="editable" id="coliformes_totales" value="<?php echo $datos[0]["coliformes_totales"] ?>" size="10" /></td>
</tr>

<tr>
<th>Coliformes fecales</th>
<td align="center">NMP/100ml</td>
<td align="center"><1,1<strong>&nbsp;**</strong>
  </td>
<td>
  <input name="coliformes_fecales" type="text" class="editable" id="coliformes_fecales" value="<?php echo $datos[0]["coliformes_fecales"] ?>" size="10" />
 </tr> 
  <tr>
	<th>Coliformes fecales</th>
    <td align="center">UFC/100ml</td>
    <td align="center"><1<strong>&nbsp;***</strong>
    <td>
  <input name="coliformes_ufc" type="text" class="editable" id="coliformes_ufc" value="<?php echo $datos[0]["coliformes_ufc"] ?>" size="10" />
  
  </td>
</tr>

</table>
<br>
<p style="font-size:12px;">* L&iacute;mites permisibles para aguas de consumo  humano y uso doméstico, que únicamente requieren tratamiento convenciona basados en la norma TULAS  Libro VI, Anexo I, Tablas 1 y 2.</p>
<p style="font-size:12px;">** <1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo   </p>
<p style="font-size:12px;">*** <1 Significa que no se observa colonias. Método estándar 9222B, técnica de filtración por membrana. 44,5°C (+-) 0,2°C/24h.  </p>
<br>
    <p><strong>Observaciones:  </strong><br />
  <textarea name="observacion" class="editable" id="observacion"><?php echo $datos[0]["observacion"] ?></textarea>
</p>
<br/>
<p><strong>L&iacute;mite permisible: </strong>NORMA
  TÉCNICA ECUATORIANA(NTE) INEN 1108 QUINTA REVISIÓN 2014-01</p>
<table width="100%">
  <tr>
<td width="500" colspan="4" style="text-align:center;">
<input name="grabar" type="hidden" value="ok" />
<input name="canton" type="hidden" value="<?php echo $_GET["canton"]; ?>" />
<input name="muestra" type="hidden" value="<?php echo $_GET["id"]; ?>" />
<input name="Guardar" type="submit" class="submit" value="GUARDAR" /></td></tr>
</table>
</form>
      <br class="clearfloat" />
  </div>
  <div class="footer">
   <img src="../imagen/footer_final.jpg" width="1000" height="90" alt="footer" usemap="#foot" /> 
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
</div>

</body>
</html>
<?php
}else{
    echo "<script type='text/javascript'>
			alert('BUSQUE UN SISTEMA PARA VER SUS FICHAS Y MODIFICAR LOS DATOS.');
			window.location='busqueda.php';
		  </script>";
}
?>