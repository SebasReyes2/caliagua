<?php
    include_once '../conexion/Conexion.php';
    $mysqli=Conexion::con();
    if (!$mysqli) {
        die("Conexión fallida: " . mysqli_connect_error());
    }


    $query = "SELECT nombreprovincia FROM provincias";
    $query2 = "SELECT nombreparroquia FROM parroquias";
    $query3 = "SELECT nombrecanton FROM cantones";
    $query4 = "SELECT nombresistema FROM sistemas";
    $query5 = "SELECT nombrebarrio FROM barrios";

    $result = mysqli_query($mysqli, $query);
    $result2 = mysqli_query($mysqli, $query2);
    $result3 = mysqli_query($mysqli, $query3);
    $result4 = mysqli_query($mysqli, $query4);
    $result5 = mysqli_query($mysqli, $query5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Estadísticas CaliAgua</title>
       
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    

    
<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="../css/style.css"> 
    
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../themes/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/calendario.css" type="text/css" rel="stylesheet" />
<script src="../js/calendario/calendar.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-es.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-setup.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/messages_es.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="js/combos.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
<link href="http://fonts.cdnfonts.com/css/beyond-the-mountains" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">



<script type="text/javascript">
    $(document).ready(function(){
		$("#grafica,#procesar,#recargar").hide();
		$("#four-columns").attr("width","auto");
       	$("#tabb").tabs({
           collapsible: false
       	});
        $("#pestanias").tabs({
           collapsible: false
       });      
    });
</script>
</head>

<body onload="document.form.reset()" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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


	<!-- end #header -->
<br><br><br><br><br><br><br><br>
<div id="portfolio">
  <div class="container">
    <div class="row">
      <div class="categories">

        <ul class="cat">
          <li>
            <ol class="type">
              <li><a href="tipo_sistema.php" data-filter="*#" >Tipo de sistema</a></li>
              <li><a href="grafica_parametro.php" data-filter="*" class="active" >Gráfico por parámetros</a></li>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>

       <div class="row">
           <div class="portfolio-items">
               <div class="breakfast" >
    
       
              
               </div>
      </div>
</div>
</div>
</div>

<div id="three-columns">
        
        
        
    <div class="content" id="principal">
                 <form name="datos" id="datos" action="graf_parametro.php" method="POST">
                     <div id="pestanias">
                         <ul>
                             <li><a href="#tab1">Datos de consulta</a></li>
                         </ul>
                         <div id="tab1">
                             <div class="row-fluid">
                    <div class="span4">
                        <h4>Ubicación:</h4>
                        <table class="table">
              			  
                            
                                <tr class="success"> 
                           		<td><label for="provincia">Provincia: </label> </td>
                                <td>
                                    <?php echo '<select name="provincia" id="provincia" class="select-css">';
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="'.$row['codprovincia'].'">'.$row['nombreprovincia'].'</option>';
                                        }
                                        echo '</select>';
                                    ?>
                                </td>
                                
                                
                                <td><label for="canton">Cantón: </label> </td>
                                <td>
                                    <?php echo '<select name="canton" id="canton" class="select-css">';
                                        while ($row = mysqli_fetch_array($result3)) {
                                            echo '<option value="'.$row['codcanton'].'">'.$row['nombrecanton'].'</option>';
                                        }
                                        echo '</select>';
                                        ?> 
                                </td>
                                </tr>
                            
                                
                                <tr class="success"> 
                                <td><label for="parroquia">Parroquia: </label> </td>
                                <td>
                                    <?php echo '<select name="parroquia" id="parroquia" class="select-css">';
                                        while ($row = mysqli_fetch_array($result2)) {
                                            echo '<option value="'.$row['codparroquia'].'">'.$row['nombreparroquia'].'</option>';
                                        }
                                        echo '</select>';
                                    ?> 
                                </td>
                                
                                <td><label for="barrio">Barrio/Comunidad: </label> </td>
                                <td>
                                    <?php echo '<select name="barrio" id="barrio" class="select-css">';
                                        while ($row = mysqli_fetch_array($result5)) {
                                            echo '<option value="'.$row['codbarrio'].'">'.$row['nombrebarrio'].'</option>';
                                        }
                                        echo '</select>';
                                    ?> 
                                </td>
                                
                                </tr>
                                
                                <tr class="success">
                               <td><label for="sistema">Sistema: </label> </td>
                                <td>
                                    <?php echo '<select name="sistema" id="sistema" class="select-css">';
                                        while ($row = mysqli_fetch_array($result4)) {
                                            echo '<option value="'.$row['codsistema'].'">'.$row['nombresistema'].'</option>';
                                        }
                                        echo '</select>';
                                    ?> 
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                        
                    <div class="span4">
                        <h4>Parámetro:</h4>
                            <table class="table">
              			<tr class="success">   
                                <td><label for="parametro">Parámetro:</label></td>
                        <td>
                            <select name="parametro" id="parametro" class="select-css">
                            
                                	<option value="">---Seleccionar--(Características Física)</option>
                                    
                                    <option value="ph">pH</option>
                                    <option value="color">Color</option>
                                    <option value="turbiedad">Turbiedad</option>
                                    <option value="temperatura">Temperatura</option>
                                    <option value="solidos_totales">S&oacute;lidos totales disueltos</option>
                                    <option  value="conductividad">Conductividad</option>
                                    <optgroup label="Características químicas"></optgroup>
                                    <option value="dureza">Dureza</option>
                                    <option value="cloro_libre">Cloro libre residual</option>
                                    <option value="nitratos">Nitratos</option>
                                    <option value="nitritos">Nitritos</option>
                                    <option value="sulfatos">Sulfatos</option>
                                    <option value="fosfatos">Fosfatos</option>
                                    <option value="manganeso">Manganeso</option>
                                    <option value="fluoruros">Fluoruros</option>
                                    <option value="amoniaco">Nitrógeno amoniacal</option>
                                    <optgroup label="Requisitos microbiol&oacute;gicos"></optgroup>
                                    <option value="coliformes_fecales">Coliformes fecales NMP</option>
									<option value="coliformes_ufc">Coliformes fecales UFC</option>
                                    <option value="coliformes_totales">Coliformes totales</option>
                            
                                </select>
                             </td>
                    </tr>
                              </table>
                        
                        <div class="text-center">
                <button type="reset" name="borrar" id="borrar" value="borrar" class="btn btn-warning ">
                            <i class="icon-off"></i>&nbsp;Reiniciar
                        </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                    <button type="submit" value="Generar gráfica" name="enviar" class="btn btn-success"><i class="icon-picture"></i>&nbsp;Gráfica</button>
                </div>
                        
                            </div>
                    </div>
           <!--Scripts         <div class="span4">
                        <h4>Fechas:</h4>
                        <div class="alert alert-success">
                            Fecha inicial:&nbsp;<input name="fecha_inicial" type="text" disabled="disabled" class="input-small" id="fecha_inicial" value="" /><i class="icon-calendar" id="fecha1"></i><br />
                            <script type="text/javascript">
                                Calendar.setup({ 
                                        inputField: "fecha_inicial",     // id del campo de texto 
                                        ifFormat: "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
                                        button: "fecha1"     // el id del botón que lanzará el calendario 
                                });
                            </script>
                            Fecha final:&nbsp;<input name="fecha_final" type="text" disabled="disabled" class="input-small" id="fecha_final" value="" /><i class="icon-calendar" id="fecha2"></i>
                            <script type="text/javascript">
                                Calendar.setup({ 
                                        inputField: "fecha_final",     // id del campo de texto 
                                        ifFormat: "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
                                        button: "fecha2"     // el id del botón que lanzará el calendario 
                                });
                            </script>
                        </div>
                    </div>
                </div>--> 
           
        </div>
                
                
         </form>
     </div>
             <br>
         
        <div id="procesar" class="text-center">
            <img src="images/loading.gif" width="45" height="45" alt="ajax-loader"/>
        </div>
    <div id="grafica"></div>
         <div id="container"> </div>
        
        <br>
        <div id="recargar" class="content text-center">
           
           <button type="button" class="btn btn-success" name="recargar" onclick="window.location.reload();"><i class="icon-off"></i>Atrás</button>
        </div>
    </div>
    

     </div>

<!--Scripts -->
    


    <br><br>
<script type="text/javascript" src="../js/main.js"></script>
    
</body>
    
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