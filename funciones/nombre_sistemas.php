<?php
require("../conexion/Conexion.php");

function nombresistema ($id)
{
    $mysqli=Conexion::con();
	$sistema = array();	
	$sql = "select nombresistema from sistemas where codsistema='".$id."'";
	$consul = $mysqli->query($sql);
	while ($registro = $consul->fetch_assoc(MYSQLI_ASSOC))
	{
		$sistema[]=$registro["nombresistema"];
	}
	$mysqli->close();
	return $sistema;	
}
?>