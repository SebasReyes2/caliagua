<?php
require_once '../clases/Usuario.php';
require_once '../clases/Encrypter.php';
if(isset($_POST["nombre"]) and isset($_POST["passwd"])
        and $_POST["nombre"] != "" and $_POST["passwd"]!=""
        and isset($_POST["id"]) and $_POST["id"]!=""){
	$pass = Encrypter::encrypt($_POST["passwd"]);
    $usuarios = new Usuario();
    $usuarios->editar_usuarios($_POST["nombre"], $pass,$_POST["id"]);
    exit();
    
}
else{
	header("Location: lista_usuarios.php?error=1");
}
?>
