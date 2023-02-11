<?php 

include_once("../conexion/Conexion.php");
function nombreparroquia ($idparroquia)
{
    $mysqli=Conexion::con();
	$parroquia = array();	
	$sql = "select nombreparroquia from parroquias where codparroquia='$idparroquia'";
	$consulta = $mysqli->query($sql);
	while ($registro = $consulta->fetch_assoc(MYSQLI_ASSOC))
	{
		$parroquia[]=$registro["nombreparroquia"];
	}
	return $parroquia;
}
?>