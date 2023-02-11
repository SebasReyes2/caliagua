<?php 
if (isset($_GET) and $_GET["id"]!="")
{
$id = $_GET["id"];
include_once("../clases/Usuario.php");
$usuario = new Usuario();
$usuario->eliminar_usuario($id);
}else{
	header("Location: lista_usuarios.php?error=1");
}
?>
