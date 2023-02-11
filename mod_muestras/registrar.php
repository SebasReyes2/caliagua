<?php 
require_once "../clases/Muestra.php"; 
if (isset($_POST["grabar"]) and ($_POST['grabar']=="ok") and isset($_POST["numero"]))
{
/*datos requeridos necesario*/
    $numero = $_POST["numero"];
	$cod_provincia = $_POST["provincia"];
    $codcanton = $_POST["canton"];
    $codsistema = $_POST["sistema"];
    $departamento = $_POST["departamento"];
    $recolector = $_POST["recolector"];
    $fecha = $_POST["fecha"];
    $fecha_analisis=$_POST["fecha_analisis"];
    $hora = $_POST["horas"].":".$_POST["minutos"];
    $hora_analisis = $_POST["horas2"].":".$_POST["minutos2"];
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
    $coliformes_fecales=$_POST["coliformes_fecales"];
	$coliformes_ufc=$_POST["coliformes_ufc"];
    $coliformes_totales = $_POST["coliformes_totales"];
    $observacion = $_POST["observacion"];
/*****INSERTAR DATOS EN LA DB MYSQL******/
    if ($color != "" or $turbiedad != "" or $olor != "" or $dureza!="" or $cloroLibre!=""
            or $fluoruros!="" or $manganeso!="" or $nitratos!="" or $nitritos!="" 
            or $coliformes_fecales!="" or $ph!="" or $temperatura!="" or $solidos_totales!=""
            or $conductividad!="" or $fosfatos!="" or $hierro!="" or $sulfatos!="" 
            or $amoniaco!="" or $coliformes_totales!="" or $observacion!="") {
        $muestra = new Muestra();
        $muestra->registrar_muestra($codcanton, $codsistema, $numero, $departamento, $fuente, 
                                   $recolector, $fecha, $fecha_analisis, $hora, $hora_analisis, 
                                   $color, $turbiedad, $olor, $dureza, $cloroLibre, $fluoruros, $manganeso, 
                                   $nitratos, $nitritos,$coliformes_fecales, $coliformes_ufc, $ph, $temperatura, 
                                   $solidos_totales, $conductividad, $fosfatos, $hierro, 
                                   $sulfatos, $amoniaco, $coliformes_totales, $observacion);
    } else{
        echo "<script type='text/javascript'>
               alert('LA FICHA DEBE TENER AL MENOS UN RESULTADO');
		window.location='registrar_muestra.php';
             </script>";
    }
}else{
	echo "<script type='text/javascript'>
              alert('POR FAVOR INGRESE DATOS DE LA FICHA');
              window.location='registrar_muestra.php';
          </script>";
}
?>