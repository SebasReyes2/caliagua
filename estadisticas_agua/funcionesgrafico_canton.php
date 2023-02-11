<?php 
include("../conexion/Conexion.php");

function canton_gravedad($id_canton){ 
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton
            where cantones.codcanton='$id_canton' and tiposistema='A gravedad';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
function canton_bombeo($id_canton){
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton
            where cantones.codcanton='$id_canton' and tiposistema='Bombeo';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
function canton_mixto($id_canton){
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton
            where cantones.codcanton='$id_canton' and tiposistema='Mixto';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
?>