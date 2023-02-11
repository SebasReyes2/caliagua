<?php
include_once '../clases/Sistema.php';
if (isset($_POST["cambiar"]) and $_POST["sistema"]!=""
     and $_POST["id"]!="" and isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
        $newnombre = htmlspecialchars($_POST["sistema"]);
        $newtipo = htmlspecialchars($_POST["tipo"]);
	$newsistema = new Sistema();
	$newsistema->actualizar_basicos($newnombre,$newtipo,$_POST["id"]);
	exit;	
}else{
    header("Location: buscar_sistema.php?error=1");
}
?>
