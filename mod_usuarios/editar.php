<?php
header("Content-Type: text/html;charset=utf-8");
if(isset($_GET["id"]) and $_GET["id"]!="")
{
require_once("../clases/Usuario.php");
require_once '../clases/Encrypter.php';
$user = new Usuario();
$idusuario = $_GET["id"];
$reg=$user->lista_usuarios_cod($idusuario);
$passwd = Encrypter::decrypt($reg[0]["password"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" type="text/css" rel="stylesheet"/>
<script language="javascript" type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo admite letras, números y  guión bajo.");
        $.validator.addMethod("pass",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo admite letras, números, asterisco y  guión bajo.");
        $("#form_cambiar").validate({
         rules:{
             'nombre':{
                 required:true,
                 alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_]+$",
                 remote: "comprobar2.php"
             },
             'passwd':{
                 required:true,
                 pass:"[0-9a-zA-Z_*]+$",
                 remote:"comprobar2.php",
                 minlength:6
             },
             'passwd_repetir':{
                 required:true,
                 equalTo:"#passwd"
             }
         },
         messages:{
             'nombre':{
                 required:"Campo requerido.",
                 remote:'usuario ya existe'
             },
             'passwd':{
                 required:"Campo requerido",
                 remote:'Este password ya existe',
                 minlength:"INGRESE 6 o MÁS CARACTERES "
             },
             'passwd_repetir':{
                 required:'campo necesario',
                 equalTo:'La contraseña no es diferente'
             }
         }
        });
    })
</script>
<title>Editar usuario</title>

</head>
    <body>
    <fieldset><legend>DATOS ACTUALES: </legend>
      <strong>Nombre de usuario:</strong><?php echo $reg[0]["nombreuser"]; ?> <br />
      <strong>Contraseña:</strong> <?php echo $passwd ?><br />
      <strong>E-mail:</strong><?php echo $reg[0]["email"]; ?>
</fieldset>
<form action="procesa_cambios.php" method="post" name="form_cambiar" id="form_cambiar">
<fieldset><legend>NUEVOS DATOS: </legend>
Nombre de usuario:<input name="nombre" type="text" size="20" id="nombre" /><br />
Contrase&ntilde;a:<input name="passwd" id="passwd" type="text" size="20" /><br />
Repetir contrase&ntilde;a:<input name="passwd_repetir" type="text" size="20" id="passwd_repetir" />
<table width="100%">
  <tr style="background:#E8E8E8; border:none;">
    <th style="text-align:center">
	<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
    <input name="Volver" type="button" class="submit" title="Volver" onClick="history.back();" value="ATRÁS" />   
    &nbsp;&nbsp;||&nbsp;&nbsp;   
    <input name="Actualizar" type="submit" class="submit"  title="Actualizar" value="CAMBIAR"/></th>
    </tr>
</table>
</fieldset>
</form>

</body>
</body>
</html>
<?php 
} else{
    header("Location: lista_usuarios.php?error=1");
}
?>