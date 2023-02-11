<?php 
error_reporting(E_ALL);
include("../clases/Sistema.php");
require_once '../clases/nombre_canton.php';
require_once '../clases/nombre_provincia.php';
$mensaje = null;
$resultados[] = null;
$sql[] = NULL;
unset($sql);
$codcanton = (int)$_POST["canton"];
$id = (int)$_POST["sistema"];
/*OBTENER EL NOMBRE DE LA TABLA SEGUN EL CODIGO DEL CANTON*/
$canton = canton($codcanton);
/*REALIZAR LA CONSULTA*/
$sistemas=new Sistema();
$resultados= $sistemas->get_datostecnicos($id);
$rows = count($resultados);

/*OBTENER EL NOMBRE DEL SISTEMA SEGUN SU ID*/
$sistema[]="";
unset($sistema);
$sistema = new Sistema();
$nombre=$sistema->sistemas_id($_POST["sistema"]);

if ($rows == 0)
{
	$mensaje = "NO EXISTEN RESULTADOS.";
	$resultados = NULL;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="../css/formularios.css" rel="stylesheet" type="text/css" />-->
    <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <link type="text/css" href="../themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
        <link type="text/css" href="../css/demo_table_jui.css" rel="stylesheet">
        <link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" >
$(document).ready(function(){
                $("#datatables").dataTable({
                    "sPaginationType":"full_numbers",
                    "bJQueryUI":true,
                    "bProcessing": true,
                    "oLanguage":{
                        "sLengthMenu": "Ver _MENU_ fichas",
                        "sInfo": "Resultados _START_ - _END_ de _TOTAL_ fichas",
                        "sSearch":"Buscar: ",
                        "sInfoFiltered":"(Filtrado de _MAX_ fichas)",
                        "oPaginate":{
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }
                    }
                });
            });
</script>
<title>Resultados de busqueda</title>
</head>

<body> 
<?php include('header.php'); ?>
<div id="wrapper">
	<div id="page" class="container">                                                                                                                                                                                                                   
    <?php include('tabla_fichas_dt.php'); ?>
	</div>
	
</div>
<?php include('footer.php'); ?>
</body>
</html>