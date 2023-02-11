<?php
include_once "../class.login.php";
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"])) {
	if($_SESSION["perfil"]=="administrador"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/fichas.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
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
                    $("#barrio").append("<option value=''>---Selecionar---</option>");
                    $("#sistema").append("<option value=''>---Selecionar---</option>");
                    $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                        $("#parroquia").append("<option value=''>---Selecionar---</option>");
                         for(x=0;x<Datos.length;x++)
                            {
                                $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                            }
                    });
                });
                $('#parroquia').change(function(){
                    $('#barrio').empty();
                    $.getJSON("combos.php",{Accion:'GetBarrios',codparroquia:$('#parroquia option:selected').val()},function(Datos){
                        $("#barrio").append("<option value=''>---Selecionar---</option>");
                        for(x=0;x<Datos.length;x++)
                        {
                            $("#barrio").append(new Option(Datos[x].nombrebarrio,Datos[x].codbarrio));
                        }
                    });
                });
                 $('#barrio').change(function(){
                    $('#sistema').empty();
                    $.getJSON("combos.php",{Accion:'GetSistemas',codbarrio:$('#barrio option:selected').val()},function(Datos){
                        $("#sistema").append("<option value=''>---Selecionar---</option>");
                        for(x=0;x<Datos.length;x++)
                            {
                                $("#sistema").append(new Option(Datos[x].nombresistema,Datos[x].codsistema));
                            }
                    });
                });
            });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#bsistema").validate({
		rules:{
		    'provincia':'required',
			'canton':'required',
			'parroquia':'required',
            'barrio':'required',
            'sistema':'required'
		},
		messages:{
			'provincia':'Campo necesario',
			'canton':'Campo necesario',
            'parroquia':'Campo necesario',
            'barrio':'Campo necesario',
            'sistema':'Campo necesario'
		}
	});
});
</script>
<title>Buscar sistema</title>
</head>
    <body>
    
    <div class="container">
<div class="pagina">
 <div class="header">
  <div class="fltlft">
<h1>CALIAGUA</h1>
<h3>M&Oacute;DULO DE ADMINISTRACI&Oacute;N DE FICHAS</h3>
<div class="error">
</div>
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
    <form  method="post" id="bsistema" name="bsistema" action="resultados_busqueda.php">
<fieldset style="width: 400px;"><legend>Busque el sistema que desea cambiar sus datos:</legend>
Provincia:
    <select name="provincia" id="provincia">
    </select><strong class="p_form">*</strong><br />
Cant&oacute;n:
    <select name="canton" id="canton">
    </select><strong class="p_form">*</strong><br />
Parroquia:
<select name="parroquia" id="parroquia">
</select><strong class="p_form">*</strong><br />
Barrio/Comunidad:
<select name="barrio" id="barrio">
</select><strong class="p_form">*</strong><br />
Sistema:
<select name="sistema" id="sistema">
</select><strong class="p_form">*</strong><hr />
<input name="buscar" type="hidden" value="ok" />
<input name="ok" type="submit" class="submit"  value="Buscar"/>
</fieldset>
<strong class="p_form">* Campo necesario para b&uacute;squeda</strong>
</form>
  <br class="clearfloat" />
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
	} else{
		echo "<script type='text/javascript'>
                    alert('USUARIO NO AUTORIZADO A CAMBIAR DATOS DE LA FICHA');
					window.location='index.php';
              </script>";
	}
} else{
	header("Location: ../index.php?error=2");
}
?>
