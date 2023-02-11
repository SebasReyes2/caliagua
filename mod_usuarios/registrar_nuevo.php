<?php
error_reporting(E_ALL ^ E_NOTICE);
header("Content-Type: text/html;charset=utf-8");
include_once ("../clases/Usuario.php");
include_once ("../clases/Encrypter.php");
if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    
if (($_POST["passwd"] == $_POST["passwd2"]) and isset($_POST["nombreuser"])
     and isset($_POST["passwd"]) and isset($_POST["passwd2"]) 
      and isset($_POST["canton"]) and isset($_POST["email"])and isset($_POST["provincia"]))
{
    $login = $_POST["nombreuser"];
    $password = Encrypter::encrypt($_POST["passwd"]);
	$canton = $_POST["canton"];
    $perfil = $_POST["perfil"];
    $correo = $_POST["email"];
	$provincia = $_POST["provincia"];
	$users = new Usuario();
    $reg = $users->lista_usuarios();
    $n = count($reg);
    $error = 0;
    $resp = 0;
    for ($i=0;$i<$n;$i++)
		{
			if ($login != $reg[$i]["nombreuser"] )
			{
				if($password != $reg[$i]["password"])
				{
					if($correo != $reg[$i]["email"])
					{
						$error++;
					}

					else
					{
					$resp = 2;
					}
				}
				else 
				{
				$resp = 3;
				}
			}
			else 
			{
				$resp = 4;
			}
			
			
		}
                if ($error == $n && $resp == 0)
		{
			$usuarios = new Usuario();
			$usuarios->insertar($login,$password,$canton,$perfil,$correo,$provincia);
		}
		else
		{
			header("Location: agregar_usuario.php?resp=$resp");
		}
}else{
    header("Location: agregar_usuario.php?resp=1");
} 

}else{
    header("Location: agregar_usuario.php");
}

?>