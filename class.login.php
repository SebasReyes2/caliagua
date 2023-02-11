<?php
		
	session_start();
	require_once("conexion/Conexion.php");
	require("clases/Encrypter.php");
	class Logeo
	{
		public function acceso()
		{
			if(isset($_POST["login"]) and isset($_POST["passwd"]))
			{				
				$login=$_POST["login"];    		
				$pass = $_POST["passwd"];
				//$pass = Encrypter::encrypt($_POST["passwd"]);
				//$pass = Encrypter::encryptSSL($_POST["passwd"]);
				$sql = "select * from usuarios where nombreuser= '".$login."' 
						and password='".$pass."'";
				$mysqli=Conexion::con();
				$datos=$mysqli->query($sql);
				$mysqli->close();
				if($datos->num_rows == 0)
				{		
					echo "<script> 
					alert(
						'Usuario o contraseña incorrecta'
					);
					window.location= 'inicioSesion.php';
					
					</script>";
					
					
				}
				else
				{
					$reg = $datos->fetch_assoc();
					$_SESSION["usuario"] = $reg['nombreuser'];
					$_SESSION["perfil"] = $reg['perfil'];
					$_SESSION["codcanton"] = $reg['codcanton'];
					$_SESSION["codprovincia"] = $reg['codprovincia'];
					$_SESSION["nombrecanton"] = $reg['nombrecanton'];
					$_SESSION["nombreprovincia"] = $reg['nombreprovincia'];

					header("Location: index.php");
				}	
			}
			else
			{
				header("Location: index.php?error=1");
			}
		}
	}
?>
