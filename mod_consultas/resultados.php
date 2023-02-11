<?php 
error_reporting(E_ALL);
require("../conexion/Conexion.php");
include("../clases/Sistema.php");
require_once '../clases/nombre_canton.php';
$mensaje = null;
$resultados[] = null;
$sql[] = NULL;
$mysqli=Conexion::con();
unset($sql);
$codcanton = (int)$_POST["canton"];
$id = (int)$_POST["sistema"];
/*OBTENER EL NOMBRE DE LA TABLA SEGUN EL CODIGO DEL CANTON*/
$canton = canton($codcanton);
/*REALIZAR LA CONSULTA*/
$sql = "select  codmuestra,codsistema,numero,fecha,hora
	    from $canton where codsistema='$id' order by fecha desc";
$resultados = $mysqli->query($sql);
$mysqli->close();
$rows = $resultados->num_rows;
/*OBTENER EL NOMBRE DEL SISTEMA SEGUN SU ID*/
$sistema[]="";
unset($sistema);
$sistema = new Sistema();
$nombre=$sistema->nombre_by_id($_POST["sistema"]);

if ($rows == 0)
{
	$mensaje = "NO EXISTEN RESULTADOS.";
	$resultados = NULL;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    
<title>Fichas por Sistemas</title>

    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
    
    <link rel="stylesheet" type="text/css"  href="../css/style.css"> 
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    
    
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
    <link href="../themes/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />


    
    
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <link type="text/css" href="../themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet" />
        <link type="text/css" href="../css/demo_table_jui.css" rel="stylesheet" />
    
    
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
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    
   <div class="container">
    
<!-- Titulos -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Cali Agua</a> </div>
    
    <!-- NAV -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php" class="page-scroll">Inicio</a></li>
          <li><a href="../contacto.php"  class="page-scroll">Acerca de</a></li>
        <li><a href="../estadisticas_agua/tipo_sistema.php" class="page-scroll">Estadísticas</a></li>
        <li><a href="../mod_consultas/"  class="page-scroll">Consulta de Fichas</a></li>
          
      </ul> 
        <br class="clear" />
    </div>
  </div>
</nav>

        <br><br><br><br><br> 
    
<div id="banner-wrapper">
	<div id="banner" class="container" style="font-size: 14px;">
        <br><br><br><br>
    <?php include('tabla_fichas.php'); ?>
        <br><br><br><br><br>
	</div>
	
</div>
</div>
</body>
    
    <br><br>
       <script type="text/javascript" src="../js/main.js"></script>
    <footer>
    <div id="footer" >
    
        <center>
    <img src="../img/LOGO_U_BN.png" height="90" alt="unach.png">
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
    <img src="../img/senagua.jpg"  height="98" alt="senagua.jpg" usemap="#foot" />
     </center>

      

    <!-- Footer ================================================== -->
          <div class="container-fluid text-center copyrights">
            <div class="col-md-8 col-md-offset-2">

              <p style="color: white;">&copy; 2022 CaliAgua - Dirección Zonal 3 MAATE | Todos los derechos reservados | Desarrollado por <a href="https://www.unach.edu.ec/" rel="nofollow">UNACH</a></p>
       
        </div>
      </div> 
    </div>
       </footer>
</html>
