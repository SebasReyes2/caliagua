<?php 
include_once("../conexion/Conexion.php");
function nom_provincia ($idprovincia)
{
    $mysqli=Conexion::con();
	$provincia = array();	
	$sql = "select nom_provincia from provincias where cod_provincia='$idprovincia'";
	$consulta = $mysqli->query($sql);
	while ($registro = $consulta->fetch_assoc(MYSQLI_ASSOC))
	{
		$provincia[]=$registro["nom_provincia"];
	}
	$mysqli->close();
	return $provincia;	
}
?>