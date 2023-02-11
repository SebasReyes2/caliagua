<?php
include_once("../conexion/Conexion.php");

class Barrio{	
	private $barrios;		
	public function __construct()
	{
		$this->barrios = array();
	}
    //INSERTAR DATOS EN LA TABLA.....
	public function insertar ($parroquia, $nombre) {
		$mysqli = Conexion::con();
	    $sql = "insert into barrios (codparroquia,nombrebarrio ) VALUES ('$parroquia','".$nombre."' )";
		$res = $mysqli->query($sql) or die().mysql_error();
		if($res){
					echo "<script type='text/javascript'>
                    		alert('BARRIO REGISTRADO CON ÉXITO...!!!!');
							window.location='registrar_barrios.php';
          				  </script>";
		}
		$res->free();
		$mysqli->close();
	}		
    //OBTENER BARRIOS POR ID de parroquia
    public function barrio_idparroquia($id)
	{
        $mysqli = Conexion::con();
		$sql="select * from barrios where codparroquia='$id'";
		$res=$mysqli->query($sql);
		while ($reg=$res->fetch_assoc())
		{
			$this->barrios[]=$reg;
		}
		return $this->barrios;
		$mysqli->close();
		$res->free();			
	}
    public function barrio_id($id)
	{
        $mysqli = Conexion::con();
		$sql="select * from barrios
                        inner join parroquias
                        on barrios.codparroquia=parroquias.codparroquia
                        inner join cantones
                        on parroquias.codcanton=cantones.codcanton
						inner join provincias
						on cantones.cod_provincia=provincias.cod_provincia
                        where codbarrio='$id'";
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->barrios[]=$reg;
		}
		return $this->barrios;
		$res->free();
    }	
    /*FUNCION CAMBIAR NOMBRE DEL BARRIO*/
    public function actualizar_barrio($nnombre, $cod)
	{
        $mysqli=Conexion::con();
        $res[] = array();
		$sql = "update barrios set nombrebarrio='".$nnombre."' where codbarrio='$cod'";
		$res = $mysqli->query($sql);
        header("Location: busca_barrio.php?msg=2");
		$res->free();
		$mysqli->close();
	}
}
?>