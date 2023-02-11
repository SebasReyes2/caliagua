<?php 
include_once("../conexion/Conexion.php");
function nombrecanton ($idcanton)
{
    $mysqli=Conexion::con();
	$canton = array();	
	$sql = "select nombrecanton from cantones where codcanton='$idcanton'";
	$consulta = $mysqli->query($sql);
	while ($registro = $consulta->fetch_assoc(MYSQLI_ASSOC))
	{
		$canton[]=$registro["nombrecanton"];
	}
	$mysqli->close();
	return $canton;	
}
?>
