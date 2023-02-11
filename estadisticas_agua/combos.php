<?php
include("../conexion/Conexion.php");
$Accion = $_REQUEST['Accion'];
if(is_callable($Accion)){
    $Accion();
}
/*funcion obtener provincias*/
function GetProvincias() {
    header("Content-Type: application/json");
    $Provincias = array();
    $sql = "select codprovincia,nommbreprovincia from provincia";
    $mysqli = Conexion::con();
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()) {
        $Provincias[]=$Fila;
    }
    echo json_encode($Provincias);
}
/*funcion obtener cantones segun la provincia*/
function GetCantones() {
    header("Content-Type: application/json");
    $Cantones = array();
    $sql = "select codcanton,nombrecanton from cantones where cod_provincia=".$_REQUEST['cod_provincia']." order by nombrecanton";
    #$sql="select codcanton,nombrecanton from cantones where cod_provincia="+$var_id->id+" order by nombrecanton";
    $mysqli = Conexion::con();
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()) {
        $Cantones[]=$Fila;
    }
    echo json_encode($Cantones);
}
/*funcion obtener parroquias segun el canton*/
function GetParroquias() {
     header("Content-Type: application/json");
     $Parroquias=array();
     $query = "select codparroquia,nombreparroquia from parroquias where codcanton=".$_REQUEST['codcanton']." order by nombreparroquia";
     $mysqli = Conexion::con();
     $consulta = $mysqli->query($query);
     $mysqli->close();
     while ($Fila = $consulta->fetch_assoc()){
         $Parroquias[]=$Fila;
     }
     echo json_encode($Parroquias);
}
/*funcion obtener barrios segun el canton*/
function GetBarrios() {
    header("Content-Type: application/json");
    $Barrios = array();
    $sql = "select codbarrio,nombrebarrio from barrios where codparroquia=".$_REQUEST['codparroquia']." order by nombrebarrio";
    $mysqli = Conexion::con();
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()){
        $Barrios[] = $Fila;
    }
    echo json_encode($Barrios);
}
/*funcion obtener sistemas segun el barrio*/
function GetSistemas() {
    header("Content-Type: application/json");
    $Sistemas = array();
    $sql = "select codsistema,nombresistema from sistemas where codbarrio=".$_REQUEST['codbarrio']." order by nombresistema";
    $mysqli = Conexion::con();
    $consult = $mysqli->query($sql);
    $mysqli->close();
    while($Fila = $consult->fetch_assoc())
    {
        $Sistemas[]=$Fila;
    }
    echo json_encode($Sistemas);
}
?>
