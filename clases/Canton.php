<?php
include_once ("../conexion/Conexion.php");
class Canton
{
	//private $visitas=array();
	private $cantones;	
	public function __construct()
	{
	    $this->cantones=array();
	}
	public function datos()
	{
		$sql="select * from provincias order by nombreprovincia asc";
		$mysqli =  Conexion::con();
		$res=$mysqli->query($sql);
		while($regcan=$res->fetch_assoc())
		{
			$this->cantones[]=$regcan;
		}
		$res->free();
		$mysqli->close();
		return $this->cantones;
	}
	//cantones por id
	public function cantones_id($id)
	{
	    $sql="select * from cantones where codprovincia=$id order by nombreprovincia desc";
		$mysqli = Conexion::con();
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($regcan=$res->fetch_assoc())
		{
			$this->cantones[]=$regcan;
		}
		$res->free();
		$mysqli->close();
		return $this->cantones;
	}
	public function canton_provincia($cod_provincia) {
	    $sql = "select * from cantones where codprovincia order by nombrecanton asc";
	    $mysqli=Conexion::con();
	    $resp = $mysqli->query($sql);
	    while ($reg = $resp->fetch_assoc()){
	        $this->cantones[] = $reg;
	    }
	    $resp->free();
	    $mysqli->close();
	    return $this->cantones;
	}
}

?>
