<?php 
include("../conexion/Conexion.php");
function provincia_gravedad($id_provincia){
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
            inner join provincias
            on cantones.cod_provincia=provincias.cod_provincia
            where provincias.cod_provincia='$id_provincia' and tiposistema='A gravedad';";
   $respuesta = $mysqli->query($sql);
   $n_reg = $respuesta->num_rows;
   $respuesta->free();    
   $mysqli->close();
   return $n_reg;
}
function provincia_bombeo($id_provincia){
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
            inner join provincias
            on cantones.cod_provincia=provincias.cod_provincia
            where provincias.cod_provincia='$id_provincia' and tiposistema='Bombeo';";
    $mysqli=Conexion::con();
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}


function provincia_mixto($id_provincia){
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
            inner join provincias
            on cantones.cod_provincia=provincias.cod_provincia
            where provincias.cod_provincia='$id_provincia' and tiposistema='Mixto';";
    $mysqli=Conexion::con();
    $respuesta = $mysqli->query($sql);
    $n_reg = $respuesta->num_rows;
    $respuesta->free();
    $mysqli->close();
    return $n_reg;
}
?>
