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
    $sql = "select codprovincia,nombreprovincia from provincias";
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
    $sql = "select codcanton,nombrecanton from cantones where codprovincia=".$_REQUEST['codprovincia']." order by nombrecanton";
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()) {
        $Cantones[]=$Fila;
    }
    echo json_encode($Cantones);
}
/*funcion obtener parroquias segun el canton*/
function GetParroquias() {
     $mysqli=Conexion::con();
     header("Content-Type: application/json");
     $Parroquias=array();
     $query = "select codparroquia,nombreparroquia from parroquias where codcanton=".$_REQUEST['codcanton']." order by nombreparroquia";
     $consulta = $mysqli->query($query);
     $mysqli->close();
     while ($Fila =  $consulta->fetch_assoc()){
         $Parroquias[]=$Fila;
     }
     echo json_encode($Parroquias);
}
/*funcion obtener barrios segun el canton*/
function GetBarrios() {
    $mysqli=Conexion::con();
    header("Content-Type: application/json");
    $Barrios = array();
    $sql = "select codbarrio,nombrebarrio from barrios where codparroquia=".$_REQUEST['codparroquia']." order by nombrebarrio";
    $consulta = $mysqli->query($sql);
    $mysqli->close();
    while ($Fila = $consulta->fetch_assoc()){
        $Barrios[] = $Fila;
    }
    echo json_encode($Barrios);
}
/*funcion obtener sistemas segun el barrio*/
function GetSistemas() {
    $mysqli=Conexion::con();
    header("Content-Type: application/json");
    $Sistemas = array();
    $sql = "select codsistema,nombresistema from sistemas where codparroquia=".$_REQUEST['codparroquia']." order by nombresistema";
    $consult = $mysqli->query($sql);
    $mysqli->close();
    while($Fila = $consult->fetch_assoc())
    {
        $Sistemas[]=$Fila;
    }
    echo json_encode($Sistemas);
}
?>
