<?php
header("Content-Type: text/html;charset=utf-8");
include_once ("../clases/Barrio.php");

if (!empty($_POST['provincia']) && !empty($_POST['canton']) && !empty($_POST['parroquia']) && !empty($_POST['nombre']))
{
 
  $barrio = new Barrio();
  $barrio->insertar($_POST['parroquia'],$_POST['nombre']);
}
else
{
   echo "<script type='text/javascript'>
    		alert('ERROR TODOS LOS DATOS SON OBLIGATORIOS.');
    		window.location='registrar_barrios.php';
	     </script>";
}
?>
