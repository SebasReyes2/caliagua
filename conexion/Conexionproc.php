<?php
header('Content-Type: text/html; charset=utf-8' );
class Conexionproc{
    public static function proconex() {
        $conproc = @mysqli_connect("%","Caliagua","123","caliaguadhp") or die("ERROR AL CONECTAR CON LA BASE DE DATOS");
        return $conproc;
    }
}
?>
