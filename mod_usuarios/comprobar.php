<?php
require_once("../conexion/Conexion.php");
require_once '../clases/Encrypter.php';
/*verificar que no se repita el nombre de usuario*/
if(isset($_GET["nombreuser"])) {
    $mysqli=Conexion::con();
    $usuario = $_GET["nombreuser"];
    $query = "select  nombreuser from usuarios where nombreuser='$usuario'";
    $resultado = $mysqli->query($query);
    $mysqli->close();
    if($resultado->fetch_assoc()) {
        echo "false";
    }else{
	   echo "true";
    }
}
/*verificar que no se repita el password*/
if (isset($_GET["passwd"])) {
    $mysqli=Conexion::con();
    $pw = Encrypter::encrypt($_GET["passwd"]);
    $sql = "select password from usuarios where password='$pw'";
    $resultado = $mysqli->query($sql);
    $mysqli->close();
    if($resultado->fetch_assoc()) {
        echo "false";
    }else{
	   echo "true";
    }
}
/*verificar que no se repita el e-mail*/
if (isset($_GET["email"])) {
    $mysqli=Conexion::con();
    $mail = $_GET["email"];
    $sql = "select email from usuarios where email='$mail'";
    $resultado = $mysqli->query($sql);
    $mysqli->close();
    if($resultado->fetch_assoc()) {
        echo "false";
    }else{
	echo "true";
    }
}

?>
