<?php
include_once ("../conexion/Conexion.php");
class Provincia
{
	//private $visitas=array();
	private $provincias;
    public function __construct()
    {
        $this->provincias=array();
    }
	public function datos()
	{
		$sql="select codprovincia,nombreprovincia from provincias order by nombreprovincia asc";
		$mysqli = Conexion::con();
		$res=$mysqli->query($sql);
		while ($reg=$res->fetch_assoc())
		{
			$this->provincias[]=$reg;
		}
		$res->free();
		$mysqli->close();
		return $this->provincias;
	}
	public function nombre_provincia($id) {
	    $sql = "select nombreprovincia from provincias where codprovincia='$id'";
	    $mysqli = Conexion::con();
	    $resp = $mysqli->query($sql);
	    while ($reg = $resp->fetch_assoc()){
		  $this->provincias[] = $reg;
	    }
	    $resp->free();
	    $mysqli->close();
	    return $this->provincias;
	}
}
?>
