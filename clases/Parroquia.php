<?php
include_once ("../conexion/Conexion.php");
class Parroquia
{
	//private $visitas=array();
	private $parroquias;	
	public function __construct()
	{
	    $this->parroquias=array();
	}
	public function parroquias()
	{
	    $mysqli=Conexion::con();
		$sql="select * from cantones order by nombrecanton desc";		
		$res=$mysqli->query($sql);		
		while ($regparro=$res->fetch_assoc())
		{
			$this->parroquias[]=$regparro;
		}
		$res->free();
		$mysqli->close();
		return $this->parroquias;
	}	
	//parroquias por id
	public function parroquias_id($id)
	{
	    $mysqli=Conexion::con();
		$sql="select * from parroquias where codcanton=$id order by nombrecanton desc";		
		$res=$mysql_i->query($sql);
		$mysqli->close();
		while ($regparro=$res->fetch_assoc())
		{
			$this->parroquias[]=$regparro;
		}
		$res->free();
		$mysqli->close();
		return $this->parroquias;
	}	
    public function parroquias_canton($codcanton)
	{
        $mysqli=Conexion::con();
		$sql="select * from parroquias where codcanton=$codcanton order by nombreparroquia asc";	
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->parroquias[]=$reg;
		}
		$res->free();
		$mysqli->close();
		return $this->parroquias;			
	}		
}
?>