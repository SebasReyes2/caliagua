<?php 
include("../conexion/Conexion.php");
function parroquia_gravedad($id_parroquia){
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='A gravedad';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
function parroquia_bombeo($id_parroquia){
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='Bombeo';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
function parroquia_mixto($id_parroquia){
    $mysqli=Conexion::con();
    unset($sql);
    $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='Mixto';";
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
?>