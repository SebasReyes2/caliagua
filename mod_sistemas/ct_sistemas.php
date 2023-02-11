<?php 
require("../clases/Sistema.php");
if (isset($_POST["grabar"]) and $_POST["grabar"] == 'ok')
{
    $codigo = $_POST["codigo"];
    $numconex = $_POST["conmedidor"] + $_POST["sinmedidor"];
    $poblacion = $numconex*5;
      
    $system = new Sistema();
    $system->update_tecnicos($_POST["latitud"],$_POST["longitud"],
                            $_POST["altitud"],$_POST["caforado"],
                            $_POST["cautorizado"],$_POST["tarifareal"],$_POST["tconstruccion"],
							$_POST["proveedores"],$_POST["tuberia1"],$_POST["tuberia2"],
							$_POST["tuberia3"],$_POST["distancia"],$_POST["rompepresion"],
							$_POST["valvulas_aire"],$_POST["valvulas_purga"],$_POST["numtanques"],
							$_POST["capacidad"],$_POST["longitudred"],$_POST["diametro1"],
							$_POST["diametro2"],$_POST["diametro3"],$_POST["re_rompepresion"],
							$numconex,$_POST["conmedidor"],$_POST["sinmedidor"],$poblacion,
							$_POST["comentarios"],$codigo);						
    exit();
}else{
    echo "<script type='text/javascript'>
				alert('BUSCAR UN SISTEMA PRIMERO');
				window.location='buscar_sistema.php';
		 </script>";
}
?>