<?php
include("../conexion/Conexion.php");
$Accion = $_REQUEST['Accion'];
if(is_callable($Accion)){
    $Accion();
}
/*funcion obtener provincias*/
function GetProvincias() {
    $mysqli=Conexion::con();
    header("Content-Type: application/json");
    $Provincias = array();
    $sql = "select cod_provincia,nom_provincia from provincias";
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()) {
        $Provincias[]=$Fila;
    }
    echo json_encode($Provincias);
}
/*funcion obtener cantones segun la provincia*/
function GetCantones() {
    $mysqli=Conexion::con();
    header("Content-Type: application/json");
    $Cantones = array();
    $sql = "select codcanton,nombrecanton from cantones where cod_provincia=".$_REQUEST['cod_provincia']." order by nombrecanton";
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()) {
        $Cantones[]=$Fila;
    }
    echo json_encode($Cantones);
}
?>
