<?php 
require("../conexion/Conexion.php");
class Reportestecnicos
{
	private $datos;
	public function __construct()
	{
		$this->datos = array();
	}
	public function reporte_datostecnicos($cod)
	{
	    $mysqli=Conexion::con();
		$sql = "select *, (select nombrecanton from cantones where cantones.codcanton = sistemas.codcanton) as ncanton,"
		."(select nombreparroquia from parroquias where parroquias.codparroquia = sistemas.codparroquia) as nparroquia,"
		."(select nombrebarrio from barrios where barrios.codbarrio = sistemas.codbarrio) as nbarrio,"
		."(select nombresistema from sistemas where sistemas.codsistema = tecnicosistemas.codsistema) as nsistema"
		."from tecnicosistemas where codigo='$cod'";
		$resultados = $mysqli->query($sql);
		$mysqli->close();
		while ($regist = $resultados->fetch_assoc())
		{
			$this->datos[] = $regist;
		}
		return $this->datos;
		$resultados->free();		
	}
}
?>