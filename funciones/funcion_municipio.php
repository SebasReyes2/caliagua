<?php 
include_once("../conexion/Conexion.php");
function municipio ($idcanton)
{
    $mysqli=Conexion::con();
	$muni = array();	
	$sql = "select municipio from cantones where codcanton='".$idcanton."'";
	$consulta = $mysqli->query($sql);
	while ($registro = $consulta->fetch_assoc(MYSQLI_ASSOC))
	{
		$muni[]=$registro["municipio"];
	}
	return $muni;	
}

?>