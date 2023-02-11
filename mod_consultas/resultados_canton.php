<?php 
error_reporting(E_ALL);
$idcanton = (int)$_POST["canton"];
require_once ("../conexion/Conexion.php");
require_once '../clases/nombre_canton.php';
require_once '../clases/Canton.php';
require_once '../clases/Provincia.php';
$mysqli=Conexion::con();
$muestra_canton = canton($idcanton);
$canton = new Canton();
$query2 = "SELECT provincias.nombreprovincia FROM provincias 
          JOIN cantones ON provincias.codprovincia = cantones.codprovincia 
          WHERE cantones.codcanton = '" . $idcanton . "'";
$result2 = mysqli_query($mysqli, $query2);
if ($result2) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $nombrprovi = strtolower($row['nombreprovincia']);
  }
}
$nombre_canton = $canton->canton_provincia($idcanton);
$sql = "select codmuestra, nombresistema,
        nombreparroquia,ensayo,fecha_muestreo
        from muestras_".$nombrprovi."
        inner join sistemas ON muestras_".$nombrprovi.".codsistema = sistemas.codsistema
        inner join parroquias ON sistemas.codparroquia = parroquias.codparroquia";
$datos = $mysqli->query($sql);
$registros = $datos->num_rows;
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    
<title>Fichas por Cantones</title>
    
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

        <br><br><br><br><br><br>
    
<div id="three-columns">        
    <div id="banner-wrapper">
    <div id="banner" class="container" style="font-size: 14px;">
        <?php
        if ($registros == 0){
            echo "NO SE HAN ENCONTRADO REGISTROS";
        }else{ ?>
        <br />
       <h4>Listado de fichas : </h4> 
	  
      
        <table class="display" id="datatables" with="100%">
            <thead>
            <tr>
              <th style="text-align:center;">N&deg;</th>
              <th style="text-align:center;">Parroquia</th>
              <th style="text-align:center;">Sistema</th>
              <th style="text-align:center;">C&oacute;digo de muestra</th>
              <th style="text-align:center;">Fecha/hora de recolecci&oacute;n</th>
              <th style="text-align:center;">FICHA</th>
              <!--<th style="text-align:center;">PDF</th>-->
            </tr>
            </thead>
            <tbody>
              <?php  $i = 1; while($rows = $datos->fetch_assoc()){ ?>
              <tr>
                <th style="text-align:center;"><?php echo $i; ?></th>
              
                <td  style="text-align:left;"><?php echo $rows["nombreparroquia"]; ?></td>               
                <td  style="text-align:left;"><?php echo $rows["nombresistema"]?></td>
                <td  style="text-align:left;"><?php echo $rows["codmuestra"]?></td>
                <td  style="text-align:left;"><?php echo $rows["fecha_muestreo"]?></td>
                <td  style="text-align:center;">
                <a href="javascript:void(0);" onClick="window.location='reporte.php?idmuestra=<?php echo $rows["codmuestra"]; ?>&canton=<?php echo $_POST["canton"];?>';">
                    <img src="../imagen/Clipboard.png" width="40" height="40" alt="Clipboard" title="VER FICHA"/>
                </a>
                </td>
              </tr>
              <?php $i++; } ?>
            </tbody>
        </table>
        
        <?php
        }
        ?>
        </div>
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
