<?php
include_once("../clases/Barrio.php");
if($_GET["id"]) {
$barrios = new Barrio();
if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
	$cod = (int)$_POST["id"];
	$nuevobarrio = trim($_POST["nombre"]);
	$barrios->actualizar_barrio($nuevobarrio,$cod);
	exit;
}
$reg = $barrios->barrio_id($_GET["id"]);
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/jquery-1.4.1.js"></script>
<script language="javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript">
</script>
<script language="javascript" >
$(document).ready(function() {
        $.validator.addMethod("alfa",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Campo sólo admite letras u numeros.");
	$("#form").validate({
		rules:{
                    'nombre':{
                        required : true,
                        minlength : 3,
                        alfa:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]+$"
                    }
		},
		messages:{
                    'nombre': {
                        required:'Campo requirido.',
                        minlength:"Este campo debe tener minimo 3 caracteres."
                    }
           }
	});
})
</script>
        
<title>Registrar barrio</title>

</head>
<body onLoad="limpiar();">
<form name="form" method="post" id="form">
  <fieldset><legend>Cambiar nombre del barrio: </legend>
Cantón:
<input  name="canton" type="text" disabled value="<?php echo $reg[0]["nombrecanton"]; ?>" maxlength="20"/>
<br>
Parroquia:
<input name="parroquia" type="text" disabled value="<?php echo $reg[0]["nombreparroquia"]; ?>" />
<br/>
Nombre del barrio:<input name="nombre" type="text" class="editable" value="<?php echo $reg[0]["nombrebarrio"]; ?>"  size="20"/>	<strong class="p_form">(*)</strong>
<hr/>
<input type="hidden" name="grabar" value="si">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<input type="button" value="Atrás" title="Atrás" onClick="history.back();" class="submit"/>
&nbsp;&nbsp;||&nbsp;&nbsp;
<input type="submit" value="Cambiar" title="cambiar" class="submit"/>  
</fieldset>
<strong class="p_form">(*) Campo editable</strong>    
</form>
</body>
</html>
<?php
}else{
    header("Location: busca_barrio.php?error=1");
}
?>
