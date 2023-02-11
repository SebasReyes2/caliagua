<?php 
require("../conexion/Conexion.php");
class Reportes
{
	private $datos;
	public function __construct()
	{
		$this->datos = array();
	}
	public function reporte_ficha($cod)
	{
	    $mysqli=Conexion::con();
		$sql = "select *, (select nombrecanton from cantones where cantones.codcanton = muestras.codcanton) as ncanton,"
		."(select nombreparroquia from parroquias where parroquias.codparroquia = muestras.codparroquia) as nparroquia,"
		."(select nombrebarrio from barrios where barrios.codbarrio = muestras.codbarrio) as nbarrio,"
		."(select nombresistema from sistemas where sistemas.codsistema = muestras.codsistema) as nsistema"
		."from muestras where codmuestra='$cod'";
		$resultados = $mysqli->query($sql);
		$mysqli->close();
		while ($regist = $resultados->fetch_assoc())
		{
			$this->datos[] = $regist;
		}
		return $this->datos;
		$resultados->free();		
	}
	
	public function obtener_ph($cod, $anio)
	{
	    $mysqli=Conexion::con();
		$sql = "select ph from  muestras where codsistema ='$cod' and year(fecha)='$anio' order by fecha asc";
		$result = $mysqli->query($sql);
		$mysqli->close();
		while ($regist = $result->fetch_assoc())
		{
			$this->datos[] = $regist;
		}
		return $this->datos;
		$result->free();
	}
}
?>