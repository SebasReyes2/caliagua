<?php
    include_once '../conexion/Conexion.php';
    session_start();
    $mysqli=Conexion::con();
    if (!$mysqli) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
   



    $nombrprovi=strtolower($_SESSION["nombreprovincia"]);
    $ensayo = $_POST["ensayo"];
    $fuente = $_POST["fuente"];
    $recolector = $_POST["recolector"];
    $fecha_muestreo = $_POST["fecha_muestreo"];
    $tipo_muestra = $_POST["tipo_muestra"];
    $fecha_laboratorio = $_POST["fecha_laboratorio"];
    $fecha_analisis = $_POST["fecha_analisis"];
    $id_provincia = $_POST["provincia"];
    $id_canton = $_POST["canton"];
    $id_parroquia = $_POST["parroquia"];
    $id_sistema=$_POST["sistema"];
    $ph=$_POST["ph"];
    $id_sistema=$_POST["sistema"];
    $color=$_POST["color"];
    $turbiedad=$_POST["turbiedad"];
    $temperatura=$_POST["temperatura"];
    $solidos=$_POST["solidos"];
    $conduvtividad =$_POST["conductividad"];
    $hierro=$_POST["hierro"];
    $manganeso=$_POST["manganeso"];
    $nitratos=$_POST["nitratos"];
    $nitritos=$_POST["nitritos"];
    $sulfatos=$_POST["sulfatos"];
    $fluoruro=$_POST["fluoruro"];
    $cloro=$_POST["cloro"];
    $aresenico=$_POST["aresenico"];
    $cobre=$_POST["cobre"];
    $dureza=$_POST["dureza"];
    $cromo=$_POST["cromo"];
    $plomo=$_POST["plomo"];
    $cadmio=$_POST["cadmio"];
    $mercurio=$_POST["mercurio"];
    $coliformes=$_POST["coliformes"];
    $cryptos=$_POST["cryptos"];
    $giardia=$_POST["giardia"];
    $observacion=$_POST["observacion"];
    $informe=$_POST["informe"];
    $pdf=readfile($informe);
    $pdf=mysqli_real_escape_string($mysqli,$pdf);
    $sql="Insert into muestras_".$nombrprovi." (codprovincia,codcanton,codparroquia,
    codsistema,ensayo,fuente,recolector,fecha_muestreo,fecha_laboratorio,
    fecha_analisis,tipo_muestra,ph,color_aparente,turbiedad,temperatura,solidos_totales,
    conductividad,hierro,manganeso,nitratos,nitritos,sulfatos,
    fluoruro,cloro_libre,arsenico,cobre,dureza,cromo,plomo,cadmio,mercurio,
    coliformes_fecales,cryptosporidium,giardia,observacion,informe)
    values ('$id_provincia','$id_canton','$id_parroquia','$id_sistema',$ensayo,'$fuente','$recolector','$fecha_muestreo',
    '$fecha_laboratorio','$fecha_analisis','$tipo_muestra','$ph','$color',
    '$turbiedad','$temperatura','$solidos','$conduvtividad','$hierro','$manganeso',
    '$nitratos','$nitritos','$sulfatos','$fluoruro','$cloro','$aresenico',
    '$cobre','$dureza','$cromo','$plomo','$cadmio','$mercurio','$coliformes',
    '$cryptos','$giardia','".$observacion."','$pdf')";

    

    if (mysqli_query($mysqli, $sql)) {
        echo "<script> 
        alert(
            'REGISTRO EXITOSO'
        );
        window.location= 'Agregar.php';
        
        </script>";
       
    } else {
        echo "Error al ingresar datos: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    $mysqli->close();
?>