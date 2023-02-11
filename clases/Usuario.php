<?php
include_once ("../conexion/Conexion.php");
class Usuario {
	private $usuarios;	
	public function __construct() {
		$this->usuarios = array ();
	}	
	// LISTA DE USUARIOS REGISTRADOS Y ADMINISTRADORES..
	public function lista_usuarios() {
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
		$sql = "select coduser,nombreuser,password,email,perfil,codcanton
				from usuarios";
		$resp = $mysqli->query($sql);		
		while ( $reg = $resp->fetch_assoc()) {
			$this->usuarios [] = $reg;
		}
		$resp->free();
		$mysqli->close();
		return $this->usuarios;
	}
	// USUARIOS POR CODIGO
	public function lista_usuarios_cod($id) {
	    $mysqli=Conexion::con();
		$sql = "select * from usuarios where coduser=$id";
		$resp = $mysqli->query ($sql);
		while ($reg = $resp->fetch_assoc()) {
			$this->usuarios [] = $reg;
		}
		$mysqli->close();
		$resp->free();
		return $this->usuarios;
	}
	
	// INSERTAR DATOS EN LA TABLA.....
	public function insertar($login, $password, $canton, $perfil, $correo,$provincia) {
	    $mysqli=Conexion::con();
        $sql[] = array();
        unset($sql);
		$sql = "insert into usuarios values (null,'$login','$password','$canton','$perfil','$correo','$provincia')";
		$res = $mysqli->query($sql);
		if($res){
			 header("Location: lista_usuarios.php");
		}
		$res->free();
		$mysqli->close();		
	}
	
	// FUNCION PARA EDITAR INFORMACION DE UN USUARIO
	public function editar_usuarios($nlogin, $npassword, $id) {
	    $mysqli=Conexion::con();
        $sql[] = array();
        unset($sql);
		$sql = "update usuarios  set nombreuser='$nlogin',
                        password ='$npassword' where coduser=$id";
		$res = $mysqli->query($sql) or die("[-|]Error al actualizar");
		if($res){
		    header("Location: lista_usuarios.php?msg=3");
		}
		$res->free($res);
	    $mysqli->close();
	}	
	//ELIMINAR UN USUARIO...
	public function eliminar_usuario($id) {
	    $mysqli=Conexion::con();
        $sql[] = array();
        unset($sql);
		$sql = "delete from usuarios where coduser='$id'";
		$resp = $mysqli->query ($sql);
		header("Location: lista_usuarios.php?msg=2");
		$resp->free();
		$mysqli->close();
	}
}

?>