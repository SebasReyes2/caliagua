<?php 
include_once("../conexion/Conexion.php");
class Parroquia{
    private $parroquia;
    public function __construct() {
        $this->parroquia = array();
    }
    function nombreparroquia ($idparroquia)
    {	
	$sql = "select nombreparroquia from parroquias where codparroquia='$idparroquia'";
	$consulta = mysql_query($sql,Conexion::con());
	while ($registro = mysql_fetch_assoc($consulta))
	{
            $this->parroquia[]=$registro;
	}
        mysql_close();
	return $this->parroquia;
	
    }
}
