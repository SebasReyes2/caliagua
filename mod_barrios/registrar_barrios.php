<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../class.login.php';
if ($_SESSION["usuario"] and $_SESSION["perfil"]){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" src="../js/jquery.validate.min.js"></script>
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
                   $("#canton").append("<option value=''>--Seleccionar--</option>");
                    $.getJSON("combos.php",{Accion:'GetCantones',cod_provincia:$('#provincia option:selected').val()},function(Datos){
		            for(x=0;x<Datos.length;x++)
                            {
                                $("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton));
                            }
                       });
					 });
					 
                   $('#canton').change(function(){
                    $('#parroquia,#barrio').empty();
					$.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                    $("#parroquia").append("<option value=''>--Selecionar--</option>");
                        for(x=0;x<Datos.length;x++)
                        {
                            $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                        }
                });
                });            
                    $('#canton').change(function(){
                    $('#parroquia').empty();
                    $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                    });
                });
			});
</script>
<script language="javascript">
$(document).ready(function() {
        $.validator.addMethod("alfa",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo sólo admite letras y n�meros.");
	$("#form").validate({
		rules:{
			'provincia':'required',
			'canton':'required',
			'parroquia':'required',
                        'nombre':{
                            required:true,
                            alfa:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s()]+$"
                        }
			},
		messages:{
			'provincia': 'Campo necesario',
			'canton': 'Campo necesario',
            'parroquia':'Campo necesario',
            'nombre':{
                required:"Campo necesario"
            }
           }
	});
})
</script>
<title>Registrar barrio</title>

</head>
<body onLoad="history.forward(); document.form.reset();">
    <?php 
    if(isset($_GET) and $_GET["msg"] == 1){
        echo '<script type="text/javascript">
                alert("REGISTRO AGREGADO CON EXITO");
              </script>';
    }
    ?>
<form name="form" id="form" method="post" action="agregar.php">
    <fieldset><legend>Registrar nuevo barrio: </legend>
Provincia <strong class="p_form">(*)</strong>:&nbsp;
<select name="provincia" id="provincia">
 </select>  
<br>
Cantón <strong class="p_form">(*)</strong>:&nbsp;&nbsp;&nbsp;&nbsp;
<select name="canton" id="canton">
  </select>
<br>
Parroquia <strong class="p_form">(*)</strong>:
<select name="parroquia" id="parroquia">
   </select>
<br>
Nombre del Barrio/ Comunidad <strong class="p_form">(*)</strong>:<input name="nombre" type="text" size="20"/>

<hr/>
<input type="reset" class="submit" title="borrar" value="Borrar" />
&nbsp;&nbsp;||&nbsp;&nbsp;
 <input type="submit" class="submit" title="Guardar" value="Guardar"/> 
</fieldset> 
<p class="p_form">(*)Campo necesario</p>   
</form>
</body>
</html>
<?php }else{
	header("Location: ../index.php?error=2");
	}
?>

