<?php
include_once ("../clases/Sistema.php");
if (!empty($_POST["canton"]) and !empty($_POST["parroquia"]) and !empty($_POST["barrio"]) 
	and !empty($_POST["nombre"]) and !empty($_POST["tipo"]))
	{
$sistema = new Sistema();
$sistema->insertar($_POST["barrio"],$_POST["nombre"], $_POST["tipo"]);
}
else
{
   echo "<script type='text/javascript'>
            alert('TODOS LOS CAMPOS SON NECESARIOS..???');
			window.location='registrar_sistema.php';
         </script>";
}
?>
