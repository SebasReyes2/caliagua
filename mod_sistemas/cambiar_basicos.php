<?php 
require("../clases/Sistema.php");
if (isset($_GET["id"]) and $_GET["id"]!="")
{
$id = (int)$_GET["id"];
$sist = new Sistema();
$regis = $sist->sistemas_id($id);
$tipo = $regis[0]["tiposistema"];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="../css/formularios.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" src="../js/jquery.validate.js"></script>
<script language="javascript">
$(document).ready(function() {
    $.validator.addMethod("alfanum",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Este campo debe tener letras, números y guión bajo.");
   $("#formsistema").validate({
	rules:{
           'sistema':{
               required:true,
               minlength:5,
               alfanum:"[0-9a-zA-ZáéíïóúüÁÉÍÏÓÚÜñÑáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$"
           },
           'tipo':{required:true}
	},
	messages:{
            'sistema':{
                required:'Campo necesario.',
                minlength:'Debe tener minimos 5 caracteres.'
            },
            'tipo':{
                required:"Campo requerido."
            }
	}
	});
    $("#formsistema").validate({
     submitHandler: function(form){
         form.submit();
     }   
    });        
});
</script>
<title>Registrar barrio</title>
</head>
<body onLoad="history.forward();">
<form name="formsistema" id="formsistema" method="post" action="cb_sistemas.php">
  <fieldset><legend>Cambiar datos b&aacute;sicos</legend>
  <table width="100%" border="0">
  <tr>
    <th>Canton: </th>
    <td><input name="canton" type="text" disabled value="<?php echo $regis[0]["nombrecanton"]; ?>" readonly></td>
  </tr>
  <tr>
    <th>Parroquia</th>
    <td>
      <input name="parroquia" type="text" disabled id="parroquia3" value="<?php echo $regis[0]["nombreparroquia"]; ?>" readonly></td>
  </tr>
  <tr>
    <th>Barrio/Comunidad</th>
    <td>
      <input name="barrio" type="text" disabled id="barrio2" value="<?php echo $regis[0]["nombrebarrio"]; ?>" readonly></td>
  </tr>
  <tr>
    <th>Sistema<strong class="p_form"> (*)</strong>:</th>
    <td>
      <input class='editable' name="sistema" type="text" id="sistema" value="<?php echo $regis[0]["nombresistema"]; ?>" size="35"></td>
  </tr>
  <tr>
    <th>Tipo: </th>
    <td>
        <select name="tipo" id="tipo" class="editable">
              <option value="Mixto" <?php if($tipo == "Mixto") {
			echo "selected";} ?>>Mixto</option>
            <option value="A gravedad" <?php if($tipo == "A gravedad") {
        echo "selected";} ?>>A gravedad</option>
            <option value="Bombeo" <?php if($tipo == "Bombeo") {
        echo "selected";} ?>>Bombeo</option>    
        </select>
    </td>
  </tr>
  <tr>
      <td colspan="2" style="text-align:center;">
      <br>
          <input type="hidden" name="grabar" value="si">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
  <input type="button" value="ATRÁS" title="Atrás" onClick="history.back();" class="submit"/>
  &nbsp;&nbsp;||&nbsp;&nbsp;
<input name="cambiar" type="submit" value="CAMBIAR" class="submit"/>
      </td>
  </tr>
</table>
  </fieldset>
    <p class="p_form"> (*)Campo  editable.</p>   
</form>
    
</body>
</html>
<?php 
}
else
{
	header("Location: buscar_sistema.php?error=1");
}

?>