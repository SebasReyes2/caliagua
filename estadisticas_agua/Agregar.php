<?php
   
    include_once '../conexion/Conexion.php';
    $mysqli=Conexion::con();
    if (!$mysqli) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    session_start();
    $query2 = "SELECT * FROM parroquias WHere codcanton= '" . $_SESSION["codcanton"] . "'";

    $result2 = mysqli_query($mysqli, $query2);

   
  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        $("#pestanias").tabs({
           collapsible: false
       }); 

       $('#parroquia').change(function(){
                    $('#sistema').empty();
                    
                    $.getJSON("filtrar_sistemas.php",{Accion:'GetSistemas',codparroquia:$('#parroquia option:selected').val()},function(Datos){
                        $("#sistema").append("<option value=''>Selecciona un sistema</option>");
                        for(x=0;x<Datos.length;x++)
                            {
                                $("#sistema").append(new Option(Datos[x].nombresistema,Datos[x].codsistema));
                            }
                    });
                });

       
    });
    
</script>

</head>

<body onload="document.form" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
           <div class="portfolio-items">
               <div class="breakfast" >
    
       
              
               </div>
            </div>
        </div>
    </div>
</div>

<div id="three-columns"> 
    <div class="content" id="principal">
        <form name="datos" id="datos" action="agregar_parametros.php" method="POST">
            <div id="pestanias">
                <ul>
                    <li><a href="#tab1">Registro de parámetros</a></li>
                </ul>
                    <div id="tab1">
                        <div class="row-fluid">
                            <div class="span4">
                                <h4>Parametros Generales:</h4>
                                <table class="table">
                                    <tr class="success"> 
                                    <td><label >Informe de ensayo N°: </label> </td>
                                    <td>
                                        <input name="ensayo" id="ensayo" type="number" required/></td> 
                                    </td>
                                    </tr>

                                    <tr class="success"> 
                                    <td><label >Luegar de Muestreo: </label> </td>
                                    <td>
                                        <input name="fuente" id="fuente" type="text" required/></td> 
                                    </td>
                                    <td><label >Muestreado por: </label> </td>
                                    <td>
                                        <input name="recolector" id="recolector" type="text" required/></td> 
                                    </tr>

                                    <tr class="success"> 
                                    <td><label>Fecha y hora de muestreo: </label> </td>
                                    <td>
                                        <input name="fecha_muestreo" type="datetime-local" required/></td> 
                                    </td>
                                    
                                    <td><label>Fecha y Hora de ingreso al laboratorio: </label> </td>
                                    <td>
                                        <input name="fecha_laboratorio" type="datetime-local" required></td> 
                                    </td>
                                    
                                    </tr>

                                    <tr class="success"> 
                                    <td><label>Tipo de Muestra: </label> </td>
                                    <td>
                                        <input name="tipo_muestra" type="text" maxlength="50" required/></td> 
                                    </td>
                                    
                                    <td><label>Fecha de analisis: </label> </td>
                                    <td>
                                        <input name="fecha_analisis" type="date" maxlength="50" required/></td> 
                                    </td>

                                    </tr>

                                    <tr class="success">
                                    <td><label for="provincia">Provincia: </label> </td>
                                    <td>
                                        <?php echo '<select name="provincia" id="provincia" class="select-css" required>';
                                        
                                            echo '<option value="'.$_SESSION["codprovincia"].'">'.$_SESSION["nombreprovincia"].'</option>';
                                        
                                        echo '</select>';
                                        ?>
                                    </td>
                                    <td><label for="canton">Cantón: </label> </td>
                                    <td>
                                    <?php echo '<select name="canton" id="canton" class="select-css" required>';
                                        
                                            echo '<option value="'.$_SESSION["codcanton"].'">'.$_SESSION["nombrecanton"].'</option>';
                                        
                                        echo '</select>';
                                        ?> 
                                    </td>
                                    </tr>
                                    
                                    <tr class="success">
                                    <td><label >Parroquia: </label> </td>
                                    <td>
                                        <?php echo '<select name="parroquia" id="parroquia" class="select-css" required>';
                                        while ($row = mysqli_fetch_array($result2)) {

                                            echo '<option value="'.$row['codparroquia'].'">'.$row['nombreparroquia'].'</option>';                                            
                                        }
                                        echo '</select>';
                                        ?> 
                                    </td>
                                    <td><label >Sistema: </label> </td>
                                    <td>
                                    <select name="sistema" id="sistema" class="select-css" required>';

                                    <option value=''>Selecciona un sistema</option>
                                        
                                    </select>
                                        
                                        
                                    </tr>
                                </table>
                            </div>

                            <div class="span4">
                                <h4>Caracteristicas Fisicas:</h4>
                                <table class="table">
                                    <thead class="success">
                                        <th>
                                            Parametros
                                        </th>
                                        <th>
                                            Expresados como
                                        </th>
                                        <th>
                                            Límite permisible <br>(NTE INEN 1108. Sexta <br>revisión 2020-04)
                                        </th>
                                        <th>
                                            Resultado
                                        </th>
                                    </thead>

                                    <tr class="success"> 
                                    <td><label >pH </label> </td>
                                    <td><label >Unidades de pH</label> </td>
                                    <td><label >6,5 - 8</label> </td>
                                    <td>
                                        <input name="ph" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Color aparente</label> </td>
                                    <td><label >Pt - Co</label> </td>
                                    <td><label >15</label> </td>
                                    <td>
                                        <input name="color" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Turbiedad</label> </td>
                                    <td><label >NTU</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="turbiedad" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Temperatura</label> </td>
                                    <td><label >°C</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="temperatura" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Sólidos Totales disueltos</label> </td>
                                    <td><label > mg/L</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="solidos" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Conductividad</label> </td>
                                    <td><label >μS/cm</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="conductividad" type="number" maxlength="50" /></td> 
                                    </tr>

                                 </table>

                                 <h4>Caracteristicas Quimicas:</h4>

                                 <table class="table">
                                    
                                 <table class="table">
                                 <table class="table">
                                    <thead class="success">
                                        <th>
                                            Parametros
                                        </th>
                                        <th>
                                            Expresados como
                                        </th>
                                        <th>
                                            Límite permisible <br>(NTE INEN 1108. Sexta <br>revisión 2020-04)
                                        </th>
                                        <th>
                                            Resultado
                                        </th>
                                    </thead>
                                    
                                    <tr class="success"> 
                                    <td><label >Hierro total</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="hierro" type="number" maxlength="50" /></td> 
                                    </tr>	
                                    <tr class="success"> 
                                    <td><label >Manganeso</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="manganeso" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Nitratos (NO3)</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >50,0</label> </td>
                                    <td>
                                        <input name="nitratos" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Nitritos</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >3,0</label> </td>
                                    <td>
                                        <input name="nitritos" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Sulfatos</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label > - </label> </td>
                                    <td>
                                        <input name="sulfatos" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Fluoruro</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >1,5</label> </td>
                                    <td>
                                        <input name="fluoruro" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Cloro libre residual</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,3 - 1,5</label> </td>
                                    <td>
                                        <input name="cloro" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Arsénico</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,01</label> </td>
                                    <td>
                                        <input name="aresenico" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Cobre</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >2,0</label> </td>
                                    <td>
                                        <input name="cobre" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Dureza total</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,05</label> </td>
                                    <td>
                                        <input name="dureza" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Cromo total</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,05</label> </td>
                                    <td>
                                        <input name="cromo" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Plomo</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,01</label> </td>
                                    <td>
                                        <input name="plomo" type="number" maxlength="50" /></td> 
                                    </tr>
                                    <tr class="success"> 
                                    <td><label >Cadmio</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,003</label> </td>
                                    <td>
                                        <input name="cadmio" type="number" maxlength="50" /></td> 
                                    </tr>

                                    <tr class="success"> 
                                    <td><label >Mercurio</label> </td>
                                    <td><label >mg/L</label> </td>
                                    <td><label >0,006</label> </td>
                                    <td>
                                        <input name="mercurio" type="number" maxlength="50" /></td> 
                                    </tr>

                                 </table>
                            </div>
                

                            <div class="span4">
                                <h4>Caracteristicas Biologicas:</h4>
                                <table class="table">
                                        <thead class="success">
                                            <th>
                                                Parametros
                                            </th>
                                            <th>
                                                Expresados como
                                            </th>
                                            <th>
                                                Límite permisible <br> (Norma INEN 1108)
                                            </th>
                                            <th>
                                                Resultado
                                            </th>
                                        </thead>

                                        <tr class="success"> 
                                        <td><label >Coliformes fecales</label> </td>
                                        <td><label >UFC/100 mL</label> </td>
                                        <td><label >AUSENCIA</label> </td>
                                        <td>
                                            <input name="coliformes" type="number" maxlength="50" /></td> 
                                        </tr>
                                        <tr class="success"> 
                                        <td><label >Cryptosporidium</label> </td>
                                        <td><label >Número de ooquistes/L</label> </td>
                                        <td><label >AUSENCIA</label> </td>
                                        <td>
                                            <input name="cryptos" type="number" maxlength="50" /></td> 
                                        </tr>
                                        <tr class="success"> 
                                        <td><label >Giardia</label> </td>
                                        <td><label >Número de quistes/L</label> </td>
                                        <td><label >AUSENCIA</label> </td>
                                        <td>
                                            <input name="giardia" type="number" maxlength="50" /></td> 

                                            
                                        </tr>	
                                </table>
                                <div class="success">
                                        <h4>Observaciones</h4>
                                        <textarea class="success"  name="observacion" hint="Escriba sus observaciones" rows="4" cols="122"></textarea>
                            
                                </div>
                                <div class="center">
                                            <input type="file" name="informe" accept="application/pdf" required/>
                                </div>
                            </div>
                            
                            <div class="text-center">
                
                               <button type="submit" name="enviar" class="btn btn-success"><i class="icon-picture"></i>&nbsp;Registrar</button>
                            </div>

                        </div>

                    </div>
                
            </div>    
        </form>
    </div>
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