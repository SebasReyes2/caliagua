<?php
include_once ("../clases/Sistema.php");
echo $_POST["diametro1"];
$sistema = new Sistema();
$verifica = $sistema->detallestecnicos_by_id($_POST["sistema"]);
if(count($verifica)==0)
{
$idsistema = $_POST["sistema"];
$numconex = $_POST["conmedidor"] + $_POST["sinmedidor"];
$poblacion = $numconex * 5;
if (isset($idsistema)) {
$sistema->insertar_detalles($idsistema,$_POST["captacion"],$_POST["latitud"],$_POST["longitud"],$_POST["altitud"],
                            $_POST["caforado"],$_POST["faforo"],$_POST["eaforo"],$_POST["cautorizado"],$_POST["fconstruccion"],
							$_POST["jlegalizada"],$_POST["jfiscalizada"],$_POST["tarifareal"],$_POST["tconstruccion"],$_POST["sdesinfeccion"],
							$_POST["pqutilizados"],$_POST["proveedores"],$_POST["tuberia1"],$_POST["tuberia2"],$_POST["tuberia3"],
							$_POST["magnitud_tuberia"],$_POST["distancia"],$_POST["mag_distancia"],$_POST["rompepresion"],
							$_POST["valvulas_aire"],$_POST["valvulas_purga"],$_POST["numtanques"],$_POST["estado"],$_POST["uso"],
							$_POST["capacidad"],$_POST["longitudred"],$_POST["diametro1"],$_POST["diametro2"],$_POST["diametro3"],
							$_POST["magnitud_diametro"],$_POST["re_rompepresion"],$numconex,$_POST["conmedidor"],$_POST["sinmedidor"],
							$poblacion,$_POST["comentarios"]);				
							
							
																																
}else {
    echo "<script type='text/javascript'>
	alert('SELECCIONE DATOS BASICOS DEL SISTEMA.');
	window.location='../inicio.php';
	</script>";
}
}else{
    echo "<script type='text/javascript'>
	alert('YA SE HA REGISTRADO INFORMACION TECNICA DE ESTE SISTEMA.');
	window.location='datostecnicos.php';
	</script>";
}

?>