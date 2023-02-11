<?php 
require("../class.login.php");
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" src="../js/jquery.validate.js"></script>
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
</script>
<script language="javascript">
$(document).ready(function() {
	$("#datostecnicos").validate({
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
<title>Datos tecnicos</title>
</head>
<body>
    <?php
    if(isset($_GET) and $_GET["error"]==1)
    {
        echo '<script type="text/javascript">
                alert("SE HA REGISTRADO INFORMACIÓN TÉCNICA.");
              </script>';
    }
    ?>
    <h3>Parametros para ingreso de datos tecnicos</h3>
<form id="datostecnicos" name="datostecnicos" method="post" action="ingreso_datostecnicos.php">
<fieldset><legend>Datos b&aacute;sicos</legend>
  <label for="canton">Provincia: <strong class="p_form">(*)</strong></label>
  <select name="provincia" id="provincia">
  </select></br>
  <label for="canton">Cant&oacute;n: <strong class="p_form">(*)</strong></label>
  <select name="canton" id="canton">
  </select></br>
  <label>Parroquia <strong class="p_form">(*)</strong>:</label>
  <select name="parroquia" id="parroquia">
    <option value="">---Selecionar---</option>
  </select></br>
  <label>Barrio/Comunidad <strong class="p_form">(*)</strong>:</label>
  <select name="barrio" id="barrio">
    <option value="">---Selecionar---</option>
  </select></br>
  <label>Sistema <strong class="p_form">(*)</strong>:</label>
  <select name="sistema" id="sistema">
    <option value="">---Selecionar---</option>
  </select>  </br>
  <input name="Borrar" type="reset" value="BORRAR" class="submit"/>
  &nbsp;&nbsp;||&nbsp;&nbsp;
  <input  name="Aceptar" type="submit" value="BUSCAR" class="submit"/>
  </fieldset>
  <strong class="p_form">(*) Campo necesario para la b&uacute;squeda</strong>
</form>
</body>
</html>
<?php 
}else{
	header("Location: ../index.php?error=2");
}
?>