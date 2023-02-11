<?php 
error_reporting(E_ALL ^ E_NOTICE);
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include_once("../class.login.php");
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"]))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../css/fichas.css" rel="stylesheet" type="text/css" />
<link href="../css/calendario.css" type="text/css" rel="stylesheet" />
<script src="../js/calendario/calendar.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-es.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-setup.js" language="javascript" type="text/javascript"></script>
<script src="../js/funcion_from.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="../js/jquery-1.4.1.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript" src="../js/additional-methods.js"></script>
<script language="javascript">
                $(document).ready(function(){
                $.ajax({
                   url:'combos.php?Accion=GetProvincias',
                    success:function(Datos){
			   $("#provincia,#canton,#parroquia").append("<option value=''>--Seleccionar--</option>");
                        for(x=0;x<Datos.length;x++)
                            {
                                $("#provincia").append(new Option(Datos[x].nom_provincia,Datos[x].cod_provincia ));
                            }
                    }
                });	
		   $('#provincia').change(function(){
                    $('#canton,#parroquia').empty();
                   $("#canton").append("<option value=''>--Selecionar--</option>");
                    $.getJSON("combos.php",{Accion:'GetCantones',cod_provincia:$('#provincia option:selected').val()},function(Datos){
                            for(x=0;x<Datos.length;x++)
                            {
                                $("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton));
                            }
                       });
					 });
                $('#canton').change(function(){
                    $('#parroquia,#barrio,#sistema').empty();
                    $("#barrio").append("<option value=''>--Selecionar--</option>");
                    $("#sistema").append("<option value=''>--Selecionar--</option>");
                    $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                        $("#parroquia").append("<option value=''>--Selecionar--</option>");
                         for(x=0;x<Datos.length;x++)
                            {
                                $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                            }
                    });
                });
                $('#parroquia').change(function(){
                    $('#barrio,#sistema').empty();
                    $.getJSON("combos.php",{Accion:'GetBarrios',codparroquia:$('#parroquia option:selected').val()},function(Datos){
                        $("#barrio").append("<option value=''>--Selecionar--</option>");
                        for(x=0;x<Datos.length;x++)
                        {
                            $("#barrio").append(new Option(Datos[x].nombrebarrio,Datos[x].codbarrio));
                        }
                    });
                });
                 $('#barrio').change(function(){
                    $('#sistema').empty();
                    $.getJSON("combos.php",{Accion:'GetSistemas',codbarrio:$('#barrio option:selected').val()},function(Datos){
                        $("#sistema").append("<option value=''>--Selecionar--</option>");
                        for(x=0;x<Datos.length;x++)
                            {
                                $("#sistema").append(new Option(Datos[x].nombresistema,Datos[x].codsistema));
                            }
                    });
                });
            });
</script>
<script language="javascript">
$(document).ready(function() {
        $.validator.addMethod("alfa",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo sólo admite letras.");
        $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo no admite caracteres como: /?.<>*&^%$#@,ect");
        $.validator.addMethod("decimal",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Por favor ingrese número decimales.");
        $.validator.addMethod("colsabor",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo incorrecto admitidos letras y número.");
	$("#muestra").validate({
		rules:{
			'numero':'required',
			'provincia':'required',
			'canton':'required',
			'parroquia':'required',
			'barrio':'required',
			'sistema':'required',
			'departamento':{
                            required:true,
                            alfa:"[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"
                        },
			'recolector':{
                            required:true,
                            alfa:"[a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"
                        },
			'fecha':'required',
                        'fecha_analisis':'required',
			'horas':'required',
			'minutos':'required',
                        'horas2':'required',
			'minutos2':'required',
			'fuente':{
                            required:true,
                            alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-()\s]+$"
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
			'numero': 'Inserte un codigo',
			'provincia':'Seleccione una provincia',
			'canton':'Seleccione un canton',
			'parroquia':'Seleccione una parroquia',
			'barrio':'Seleccione un barrio',
			'sistema':'Seleccione el sistema',
			'departamento':{
                            required:'Campo necesario'
                        },
			'recolector':{
                            required:'Campo necesario'
                        },
			'fecha':'Campo necesario',
                        'fecha_analisis':'Campo necesario',
			'horas':'Campo necesario',
			'minutos':'Campo necesario',
                        'horas2':'Campo necesario',
			'minutos2':'Campo necesario',
			'fuente':{
                            required:'Campo necesario'
                        }
                        
                }
		});
});
</script>
<title>..::Registrar ficha::..</title>
</head>

<body onload="history.forward();">
<?php
$horas=array('00','01','02','03','04','05',
             '06','07','08','09','10','11',
             '12','13','14','15','16','17',
             '18','19','20','21','22','23',
             '24','25','26','27','28','29',
             '30','31','32','33','34','35',
             '36','37','38','39','40','41',
             '42','43','44','45','46','47',
             '48','49','50','51','52','53',
             '54','55','56','57','58','59');
?>
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
         <?php if ($_SESSION["perfil"] == "administrador") {?>
      	<li>
            <a href="busqueda.php">
            <img src="../imagen/operaciones/edit.png" width="16" height="16" />&nbsp; 
            Cambiar ficha</a>
        </li> <?php } ?>
        <li>
            <a href="../salir.php">
            <img src="../imagen/logout.png" width="16" height="16" />&nbsp; 
            Salir</a>
        </li>
    </ul>
  </div>
  <div class="content">
      <form name="muestra" id="muestra" action="registrar.php" method="post">
<table width="100%" border="0">
<thead>
<tr>
<th colspan="4" style="text-align:center;"><h2>Reporte de análisis de agua</h2></th>
</tr>
</thead>
<tr>
<th colspan="2">1. DATOS DE LA MUESTRA</th>
<tr>
    <th>C&oacute;digo de Muestra:</th>
    <td colspan="3" style="text-align:left;">
      <input name="numero" type="text" size="10" maxlength="50" /></td>
  </tr>
<tr>
<th>Provincia: </th>
<td style="text-align:left;">
 <select name="provincia" id="provincia">
  </select>
</td>
<th>Cant&oacute;n:</th>
<td style="text-align:left;">
    <select name="canton" id="canton">
  </select>
</td>
</tr>
<tr>
<th>Parroquia: </th>
<td style="text-align:left;">
    <select name="parroquia" id="parroquia">
    </select>
</td>
<th>Barrio/Comunidad: </th>
<td style="text-align:left;">
    <select name="barrio" id="barrio">
    </select>
</td>
</tr>
<tr>
<th>Nombre del sistema: </th>
<td style="text-align:left;">
    <select name="sistema" id="sistema" onchange="from(document.muestra.sistema.value,'tipo','tipo.php');">
      
      </select>
</td>
<th>Tipo:</th>
<td style="text-align:left;"><div id="tipo">
    <input name="tipo" type="text" disabled="disabled" size="15" readonly="readonly" />
    </div></td>
</tr>
<tr>
    <th>Laboratorio/Departamento:</th>
    <td colspan="3" style="text-align:left;">
      <input name="departamento" type="text" size="50" maxlength="50" /></td>
  </tr>
  <tr>
    <th>Responsable de la recolección:</th>
    <td colspan="3" style="text-align:left;">
      <input name="recolector" type="text" size="50" maxlength="50"/></td>
    </tr>
<tr>
    <th>Fecha de recolección:</th>
    <td style="text-align:left;">
    <input name="fecha" type="text" id="fecha" size="11" readonly="readonly">
    <img src="../imagen/calendario.png" width="16" height="16" border="0" title="Fecha" id="lanzador">
<script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "fecha",     // id del campo de texto 
     ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del botón que lanzará el calendario 
}); 
</script>
    </td>
    <th> Fecha de an&aacute;lisis: </th>
    <td style="text-align:left;">
      
        <input name="fecha_analisis" type="text" id="fecha_analisis" size="11" readonly="readonly">
    <img src="../imagen/calendario.png" width="16" height="16" border="0" title="Fecha" id="lanzador2">
<script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "fecha_analisis",     // id del campo de texto 
     ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador2"     // el id del botón que lanzará el calendario 
}); 
</script>
  	</tr>
    
    <tr>
    <th>Hora de recolecci&oacute;n: </th>
    <td style="text-align:left;">
    <select name="horas">
          <option value="">hh</option>
      <?php for ($i=0 ; $i<24;$i++) { ?>
      <option value="<?php echo $horas[$i]; ?>"><?php echo $horas[$i]; ?></option>
      <?php } ?>
      </select>:
	<select name="minutos">
        <option value="">mm</option>
      <?php for ($i=0 ; $i<count($horas);$i++) { ?>

      <option value="<?php echo $horas[$i]; ?>"><?php echo $horas[$i]; ?></option>
      <?php } ?>
      	</select>
    </td>
    <th>Hora de an&aacute;lisis: </th>
    <td style="text-align:left;">
      <select name="horas2" id="horas2">
          <option value="">hh</option>
      <?php for ($i=0 ; $i<24;$i++) { ?>
      <option value="<?php echo $horas[$i]; ?>"><?php echo $horas[$i]; ?></option>
      <?php } ?>
      </select>:
	<select name="minutos2" id="minutos2">
        <option value="">mm</option>
      <?php for ($i=0 ; $i<count($horas);$i++) { ?>

      <option value="<?php echo $horas[$i]; ?>"><?php echo $horas[$i]; ?></option>
      <?php } ?>
      	</select>
  	</tr>
    
  	<tr>
    <th>Sitio de toma de la muestra:</th>
    <td colspan="3" style="text-align:left;">
      <input name="fuente" type="text"  id="fuente" size="50" /></td>
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
<td><input name="ph" type="text" id="ph" size="10" /></td>
</tr>

<tr>
<th>Color</th>
<td align="center">Color real</td>
<td align="center">15</td>
<td><input name="color" type="text" id="color" size="10" /></td>
</tr>

<tr>
<th>Olor</th>
<td align="center">--</td>
<td align="center">No objetable</td>
<td><input name="olor" type="text" id="olor" size="10" /></td>
</tr>

<tr>
<th>Turbiedad</th>
<td align="center">NTU</td>
<td align="center">5</td>
<td><input name="turbiedad" type="text" id="turbiedad" size="10" /></td>
</tr>

<tr>
<th>Temperatura</th>
<td>&deg;C</td>
<td>Condici&oacute;n natural+/-3 &deg;C <strong>*</strong></td>
<td><input name="temperatura" type="text" id="temperatura" size="10" /></td>
</tr>
<tr>
<th>S&oacute;lidos totales disueltos</th>
<td>mg/l</td>
<td>500 <strong>*</strong></td>
<td><input name="solidos_totales" type="text" id="solidos_totales" size="10" /></td>
</tr>
<tr>
<th>Conductividad</th>
<td>&mu;S/cm</td>
<td>- <strong>*</strong></td>
<td><input name="conductividad" type="text" id="conductividad" size="10" /></td>
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
<td><input name="dureza" type="text" id="dureza" size="10" /></td>
</tr>

<tr>
<th>Cloro libre residual </th>
<td align="center">mg/l</td>
<td align="center">0,3 a 1,5</td>
<td><input name="cloro_libre" type="text" id="cloro_libre" size="10" /></td>
</tr>

<tr>
<th>Hierro total, Fe&sup3;</th>
<td align="center">mg/l</td>
<td align="center">0,3 <strong>*</strong></td>
<td><input name="hierro" type="text" id="hierro" size="10" /></td>
</tr>

<tr>
<th>Nitratos, NO3&macr;</th>
<td align="center">mg/l</td>
<td align="center">50</td>
<td><input name="nitratos" type="text" id="nitratos" size="10" /></td>
</tr>

<tr>
<th>Nitritos, NO2&macr;</th>
<td align="center">mg/l</td>
<td align="center">3.0</td>
<td><input name="nitritos" type="text" id="nitritos" size="10" /></td>
</tr>

<tr>
<th>Sulfatos, SO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">250 <strong>*</strong></td>
<td><input name="sulfatos" type="text" id="sulfatos" size="10" /></td>
</tr>

<tr>
<th>Fosfatos, PO4&macr;</th>
<td align="center">mg/l</td>
<td align="center">0,3 <strong>*</strong></td>
<td><input name="fosfatos" type="text" id="fosfatos" size="10" /></td>
</tr>

<tr>
<th>Manganeso, Mn</th>
<td align="center">mg/l</td>
<td align="center">0,1 <strong>*</strong></td>
<td><input name="manganeso" type="text" id="manganeso" size="10" /></td>
</tr>

<tr>
<th>Fluoruros (Fl&uacute;or), F</th>
<td align="center">mg/l</td>
<td align="center">1.5 </td>
<td><input name="fluoruros" type="text" id="fluoruros" size="10" /></td>
</tr>

<tr>
<th>Nitr&oacute;geno amoniacal(Amoniaco), NH&sup3;</th>
<td align="center">mg/l</td>
<td align="center">1,0 <strong>*</strong></td>
<td><input name="amoniaco" type="text" id="amoniaco" size="10" /></td>
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
<th>Colonia coliformes totales</th>
<td align="center">NMP/100 ml</td>
<td>3000<strong>&nbsp;*</strong></td>
<td>
    <input name="coliformes_totales" type="text" id="coliformes_totales" size="10" /></td>
</tr>

<tr>
<th>Colonia coliformes fecales</th>
<td align="center">NMP/100ml</td>
<td align="center"><1,1<strong>&nbsp;**</strong></td>
<td>
  <input name="coliformes_fecales" type="text" id="coliformes_fecales" size="10" />
  </td>
  </tr>
  <tr>
  <th>Colonia coliformes fecales</th>
  <td align="center">UFC/100ml</td>
<td align="center"><1<strong>&nbsp;***</strong></td>
<td>
  <input name="coliformes_ufc" type="text" id="coliformes_ufc" size="10" />
  </td>
</tr>

</table>
<br>
<p style="font-size:12px;">* L&iacute;mites permisibles para aguas de consumo  humano y uso doméstico, que únicamente requieren tratamiento convenciona basados en la norma TULAS  Libro VI, Anexo I, Tablas 1 y 2.</p>
<p style="font-size:12px;">** <1,1 Significa que en el ensayo del NMP utilizando 5 tubos de 20cm3 o 10 tubos de 10cm3 ninguno es positivo   </p>
<p style="font-size:12px;">*** <1 Significa que no se observa colonias. Método estándar 9222B, técnica de filtración por membrana. 44,5°C (+-) 0,2°C/24h.  </p>
<br>
    <p><strong>Observaciones:  </strong><br />
      <textarea name="observacion" id="observacion"></textarea>
</p><br />
<p><strong>L&iacute;mite permisible: </strong>NORMA
  TÉCNICA ECUATORIANA(NTE) INEN 1108 QUINTA REVISIÓN 2014-01</p>
<table width="100%">
<tr>
<td width="500" colspan="4" style="text-align:center;">
<input name="grabar" type="hidden" value="ok" />
<input name="Borrar" type="reset" class="submit" value="BORRAR" />
&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;
<input name="Guardar" type="submit" class="submit" value="GUARDAR" /></td></tr>
</table>
</form>

  </div>
  <br class="clearfloat" />
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
    header("Location: ../index.php?error=2");
}
?>