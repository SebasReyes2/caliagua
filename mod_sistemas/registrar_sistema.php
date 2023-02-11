<?php
require_once "../class.login.php";
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/funcion_from.js"></script>
<script language="javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript"></script>
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
                    $('#parroquia,#barrio').empty();
                    $("#barrio").append("<option value=''>---Selecionar---</option>");
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
            });
         </script>
<script language="javascript">
$(document).ready(function() {
        $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Este campo debe tener letras, números y guión bajo.");
	$("#formsistema").validate({
		rules:{
			'provincia':'required',
			'canton':'required',
			'parroquia':'required',
                        'barrio':'required',
                        'nombre':{
                            required:true,
                            minlength:5,
                            alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_()\s]+$"
                        },
                        'tipo':'required'
			},
		messages:{
			'provincia':'Campo necesario',
            'canton':'Campo necesario',
            'parroquia':'Campo necesario',
            'barrio':'Campo necesario',
            'nombre':{
                required:'Campo necesario',
                minlength:'Debe tener almenos 5 caracteres'
            },
            'tipo':'Campo necesario'
           }
		});
})
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body onload="history.forward(); document.form.reset();">
<form id="formsistema" name="formsistema" method="post" action="agregar.php">
  <fieldset>
      <legend>Registro de datos basicos del sistema: </legend>
<label for="provincia">Provincia <strong class="p_form">(*)</strong>:&nbsp;&nbsp; </label>
<select name="provincia"id="provincia">
</select><br>

<label for="canton">Cantón <strong class="p_form">(*)</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
<select name="canton"id="canton">
</select><br>
<label for="parroquia">Parroquia <strong class="p_form">(*)</strong>:</label>
<select name="parroquia" id="parroquia">
     <option value="">---Selecionar---</option>
</select><br>
<label for="barrio">Barrio/Comunidad <strong class="p_form">(*)</strong>:</label>
<select name="barrio" id="barrio" onchange="from(document.formsistema.barrio.value,'nombre','sistema.php');">
   <option value="">---Selecionar---</option>
</select><br>
Nombre del sistema <strong class="p_form">(*)</strong>:
<div id="nombre">
    <input name="nombre" type="text" size="30"/>
</div>
<label for="tipo">Tipo de sistema <strong class="p_form">(*)</strong>:</label>
<select name="tipo" id="tipo">
  <option value="">Tipo</option>
  <option value="A gravedad">A gravedad</option>
  <option value="Bombeo">Bombeo</option>
  <option value="Mixto">Mixto</option>
</select>
<br />
<input name="Borrar" type="reset" title="Borrar" value="Borrar" class="submit"/>&nbsp;&nbsp;||&nbsp;&nbsp;
<input name="Guardar" type="submit" title="Guardar" value="Guardar" class="submit"/>
</center>
  </fieldset>  
  <p class="p_form">(*)Campo necesario</p> 
</form>
</body>
</html>
<?php 
}else{
	header("Location: ../index.php?error=2");
}
?>
