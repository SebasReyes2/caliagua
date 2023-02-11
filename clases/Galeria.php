<?php 
require_once("../conexion/Conexion.php");

class Galeria
{
	private $fotos;
	public function __construct(){
		$this->fotos=array();
	}
/*---------------GALERIA DE IMAGENES PARA LA PANTALLA INICIAL-----------------------*/
	public function galeria_inicio(){
	    $mysqli = Conexion::con();
		$sql="select foto,titulo from galeria_slide limit 0,10";
		$reg=$mysqli->query($sql);
		$mysqli->close();
		while ($regis=$reg->fetch_assoc()) 
		{
			$this->fotos=$regis;
		}
		$reg->free();
		return $this->fotos;
	}
}
?>