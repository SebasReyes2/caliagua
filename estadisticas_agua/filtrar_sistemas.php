<?php
    include("../conexion/Conexion.php");
    $Accion = $_REQUEST['Accion'];
    if(is_callable($Accion)){
        $Accion();
    }

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