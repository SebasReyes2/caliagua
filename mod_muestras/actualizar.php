<?php 
include_once("../clases/Muestra.php");
if(isset($_POST) and $_POST["grabar"]=="ok"){
/*datos requeridos necesario*/
  	$cod_provincia = $_POST["provincia"];
    $codcanton = $_POST["canton"];
    $codmuestra = $_POST["muestra"];
    $departamento = $_POST["departamento"];
    $recolector = $_POST["recolector"];
    $fuente = $_POST["fuente"];
/* ** resultados de la muestra que pueden ser vacios** */
    $color = $_POST["color"];
    $turbiedad = $_POST["turbiedad"];
    $olor = $_POST["olor"];
    $dureza = $_POST["dureza"];
    $ph = $_POST["ph"];
    $temperatura = $_POST["temperatura"];
    $solidos_totales = $_POST["solidos_totales"];
    $conductividad = $_POST["conductividad"];
    $cloroLibre=$_POST["cloro_libre"];
    $fluoruros=$_POST["fluoruros"];
    $manganeso=$_POST["manganeso"];
    $nitratos=$_POST["nitratos"];
    $nitritos=$_POST["nitritos"];
    $fosfatos = $_POST["fosfatos"];
    $hierro = $_POST["hierro"];
    $sulfatos = $_POST["sulfatos"];
    $amoniaco = $_POST["amoniaco"];
    $coliformes_totales = $_POST["coliformes_totales"];
    $coliformes_fecales = $_POST["coliformes_fecales"];
	$coliformes_ufc = $_POST["coliformes_ufc"];
    $observacion = $_POST["observacion"];
    
        if ($color != "" or $turbiedad != "" or $olor != "" or $cloroLibre!="" 
            or $fluoruros!="" or $manganeso!="" or $nitratos!="" or $nitritos!="" 
            or $ph!="" or $temperatura!="" or $solidos_totales!="" or $conductividad!=""
            or $fosfatos!="" or $hierro!="" or $sulfatos!="" or $amoniaco!="" 
            or $coliformes_totales!="" or $dureza!="" or $coliformes_fecales!="" or  				               $coliformes_ufc!="" or $observacion!=""){
    /*-----------ACTUALIZAR DATOS DE LA MUESTRA----------*/
                $muestranew = new Muestra();
                $muestranew->actualizar_muestra($codcanton, $codmuestra, $departamento, 
                        $fuente, $recolector, $color, $turbiedad, $olor, $dureza, $cloroLibre, 
                        $fluoruros, $manganeso, $nitratos, $nitritos, $coliformes_fecales, $ph, 
                        $temperatura, $solidos_totales, $conductividad, $fosfatos, $hierro, 
                        $sulfatos, $amoniaco, $coliformes_totales, $observacion);
                exit;
            } else{
                echo "<script type='text/javascript'>
                        alert('DEBE INGRESAR AL MENOS UN RESULTADO EN LA FICHA');
		                window.location='cambiar_ficha.php';
                     </script>";
            }
}
 else {
    echo "<script type='text/javascript'>
			alert('BUSQUE UN SISTEMA PARA VER SUS FICHAS Y MODIFICAR LOS DATOS.');
			window.location='busqueda.php';
		  </script>";    
}

?>