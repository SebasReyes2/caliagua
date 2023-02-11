<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../class.login.php';
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"])
        and $_SESSION["perfil"]=="administrador"){
?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once ("../funciones/tildes.php");
include_once ("../clases/Provincia.php");
$provincia=new Provincia();
$prov=$provincia->datos();
?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once ("../funciones/tildes.php");
include_once ("../clases/Canton.php");
$canton=new Canton();
$cant=$canton->datos();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/alertas/alertify.default.css" type="text/css"></link>
<link rel="stylesheet" href="../css/alertas/alertify.core.css" type="text/css"></link>
<script type="text/javascript" language="javascript" src="../js/alertas/alertify.js"></script>
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
                	console.log($('#provincia option:selected').val());
			$('#canton,#parroquia').empty();
                   	$("#canton").append("<option value=''>--Seleccionar--</option>");
                    	$.getJSON("combos.php", {
				Accion: 'GetCantones',
				cod_provincia: $('#provincia option:selected').val()
			}, function(Datos) {
                        	console.log(Datos);
			    	for(x=0;x<Datos.length;x++)
                            	{
                                	$("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton));
                            	}
                       }).error(function(jqXHR, textStatus, errorThrown){
		       		console.log(errorThrown);
				console.log("error "+textStatus);
				console.log("incoming Tex " + jqXHR.responseText);	
		       });
		});
});
$(document).ready(function() {
    $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo admite letras, números y  guión bajo.");
   $("#form_agrega").validate({
	rules:{
		'nombreuser':{
                    required:true,
                    remote:"comprobar.php",
                    alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_]+$"
                },
		'passwd':{required:true,minlength:5,
                        remote:"comprobar.php",
						minlength:true
			},
		'passwd2':{required:true,minlength:5,equalTo:"#passwd"},
		
		
		
		
		'provincia':'required',
		'canton':'required',
		'perfil':{ required:true, minlength:1 },
		'email':{required:true,email:true,remote:"comprobar.php"}
	},
	messages:{
		'nombreuser':{
                    required:"Campo necesario",
                    remote:"Este usuario ya existe."
                },
		'passwd':{
			required:"Campo necesario.",
			minlength:"Este campo debe tener 5 caracteres o más.",
            remote:"Esta contraseña ya existe.",
			minlength:"Debe ingresar 6 digitos o más"
			},
		'passwd2':{
			required:'Campo necesario.',
			minlength:"Este campo debe tener 5 caracteres o más",
                        equalTo:'La contraseña es diferente'
		},
		'perfil':"Seleccione al menos una opcion.",
		'email':{
			required:"Email es requerido.",
			email:"Dirección de correo errónea.",
                        remote:"Este e-mail ya existe."
		}
	}
    });
});
</script>
<title>Registrar usuario</title>
</head>
    <body onload="history.forward();">
<form action="registrar_nuevo.php" method="post" name="form_agrega" id="form_agrega">
<fieldset style="width:400px;"> <legend>Registrar nuevo usuario: </legend>
<table border="0">
  <tr style="background:#E8E8E8;">
    <th width="133" align="left"><label>Nombre de usuario: </label></th>
    <td width="257"><input name="nombreuser" id="nombreuser" type="text"/></td>
  </tr>
  <tr style="background:#E8E8E8;">
    <th align="left"><label>Contraseña: </label></th>
    <td><input name="passwd" id="passwd" type="password"  /></td>
  </tr>
  <tr style="background:#E8E8E8;">
    <th align="left"><label>Repetir contraseña: </label></th>
    <td><input name="passwd2" id="passwd2" type="password"/></td>
  </tr>
  
  <tr style="background:#E8E8E8;">
    <th height="79" align="left" scope="row">Provincia:</th>
    <td>
    <select name="provincia"id="provincia">
</select><br>
<tr style="background:#E8E8E8;">
    <th height="79" align="left" scope="row">Cantón:</th>
    <td>
<select name="canton"id="canton">
</select><br>  
  <tr style="background:#E8E8E8;">
    <td colspan="2"><fieldset style="width:265px;"><legend>Perfil:</legend>
    Registrado<input name="perfil" type="radio" class="radio" value="registrado" /><br />
    Administrador<input name="perfil" type="radio" class="radio" value="administrador" />
    </fieldset>
    </td>
  </tr>
  
  <tr style="background:#E8E8E8;">
    <th align="left"><label>E-mail: </label></th>
    <td><input name="email" type="text" id="email" size="30" /></td>
  </tr>
  <tr style="background:#E8E8E8; ">
    <td colspan="2" style="text-align:center;">
        <input name="grabar" type="hidden" value="si" />
     <input name="Borrar" type="reset" class="submit"  title="Borrar" value="Borrar"/>  
    &nbsp;&nbsp;||&nbsp;&nbsp;
      <input name="Guardar" type="submit" class="submit" title="Guardar" value="Guardar"/> 
    </td>
    </tr>
</table>
</fieldset>
</form>
<?php
if (isset($_GET) and $_GET["msg"]==1){
    echo '<script type="text/javascript">
           alert("USUARIO REGISTRADO CORRECTAMENTE");
          </script>';
}
if (isset($_GET) and $_GET["resp"]==1)
{
	echo '<script type="text/javascript">
           alert("Las contraseñas no son iguales.");
          </script>';
}
if (isset($_GET) and $_GET["resp"]==2)
{
	echo '<script type="text/javascript">
           alert("Este e-mail ya está en uso ingrese otro");
          </script>';
}
if (isset($_GET) and $_GET["resp"]==3)
{
	echo '<script type="text/javascript">
           alert("Este password ya está en uso ingrese otro");
          </script>';
}
if (isset($_GET) and $_GET["resp"]==4)
{
	echo '<script type="text/javascript">
           alert("Este nombre de usuario ya está en uso ingrese otro");
          </script>';
}
?>
</body>
</html>
<?php
   }else{
       header("Location: ../index.php?error=2");
   }
?>
