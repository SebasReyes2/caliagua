<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Fichas por Sistema</title>
    
    
    
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
    
    <link rel="stylesheet" type="text/css"  href="../css/style.css"> 
    
 
<meta name="keywords" content="" />
<meta name="description" content="" />
    
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
    
<link href="../themes/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/messages_es.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>

    
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    
    
<script type="text/javascript">
    $(document).ready(function(){
         $("#tabs").tabs({
                        collapsible: false
           });
         $.ajax({
                    url:'combos.php?Accion=GetProvincias',
                    success:function(Datos){
			   $("#provincia,#canton,#parroquia").append("<option value=''>--Seleccionar--</option>");
                        for(x=0;x<Datos.length;x++)
                            {
                                $("#provincia").append(new Option(Datos[x].nom_provincia,Datos[x].cod_provincia ));
                            }
                    }
                });	
		   $('#provincia').change(function(){
                    $('#canton,#parroquia').empty();
                   $("#canton").append("<option value=''>--Selecionar--</option>");
                    $.getJSON("combos.php",{Accion:'GetCantones',cod_provincia:$('#provincia option:selected').val()},function(Datos){
                            for(x=0;x<Datos.length;x++)
                            {
                                $("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton));
                            }
                       });
					 });
        $('#canton').change(function(){
            $('#parroquia,#barrio,#sistema').empty();
            $("#barrio").append("<option value=''>---Selecionar---</option>");
            $("#sistema").append("<option value=''>---Selecionar---</option>");
            $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                $("#parroquia").append("<option value=''>---Selecionar---</option>");
                 for(x=0;x<Datos.length;x++)
                    {
                        $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                    }
            });
        });
        $('#parroquia').change(function(){
            $('#barrio').empty();
            $.getJSON("combos.php",{Accion:'GetBarrios',codparroquia:$('#parroquia option:selected').val()},function(Datos){
                $("#barrio").append("<option value=''>---Selecionar---</option>");
                for(x=0;x<Datos.length;x++)
                {
                    $("#barrio").append(new Option(Datos[x].nombrebarrio,Datos[x].codbarrio));
                }
            });
        });
         $('#barrio').change(function(){
            $('#sistema').empty();
            $.getJSON("combos.php",{Accion:'GetSistemas',codbarrio:$('#barrio option:selected').val()},function(Datos){
                $("#sistema").append("<option value=''>---Selecionar---</option>");
                for(x=0;x<Datos.length;x++)
                    {
                        $("#sistema").append(new Option(Datos[x].nombresistema,Datos[x].codsistema));
                    }
            });
        });
          $("#datostecnicos").validate({
		rules:{
			'canton':'required',
			'parroquia':'required',
                        'barrio':'required',
                        'sistema':'required'
			},
		messages:{
                        'canton':'Campo necesario',
                        'parroquia':'Campo necesario',
                        'barrio':'Campo necesario',
                        'sistema':'Campo necesario'
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


	<!-- end #header -->
<br><br><br><br><br><br><br><br>
<div id="portfolio">
  <div class="container">
    <div class="row">
      <div class="categories">

        <ul class="cat">
          <li>
            <ol class="type">
              <li><a href="index.php" data-filter="#" >Fichas por Cantón</a></li>
              <li><a href="#" data-filter="#" class="active">Fichas por Sistema</a></li>
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
        
        
        <div id="banner-wrapper">
            <div id="banner" class="container" style="font-size: 14px;">
            <h4>Seleccione los datos del sistema:</h4>
                <div id="tabs">
                <ul>
                    <li><a href="#tabs1">Datos de Consulta</a></li>
    		</ul>
    
    	<div id="tabs1">
        
      	<form id="datostecnicos" name="datostecnicos" method="post" action="">
         <table class="table">
                    <tr class="success">	
                    
                      <td><label for="provincia"> Provincia:  </label></td>
                        <td>  
                            <select name="provincia" id="provincia"
                        class="select-css">
                      </select>
                    </td>
                    </tr>    
          <tr class="success">
                        <td><label for="canton"> Cantón:  </label></td>
                        <td>  <select name="canton" id="canton"
                        class="select-css" >
                      </select>
                    </td>
                     </tr> 
             
             <tr class="success">
                        <td><label for="canton"> Parroquia:  </label></td>
                        <td>  <select name="parroquia" id="parroquia"
                        class="select-css" >
                      </select>
                    </td>
                     </tr> 
             
             <tr class="success">
                        <td><label for="canton"> Barrio:  </label></td>
                        <td>  <select name="barrio" id="barrio"
                        class="select-css" >
                      </select>
                    </td>
                     </tr> 
            <tr class="success">
                        <td><label for="canton"> Sistema:  </label></td>
                        <td>  <select name="sistema" id="sistema"
                        class="select-css" >
                      </select>
                    </td>
                     </tr> 
             </table>
              
            <div class="text-center">
                        
                <div class="row-fluid">                  <div class="span12 text-center">
                    
          <button type="reset" name="borrar" value="Borrar" class="btn btn-warning"><i class="icon"></i>&nbsp;Borrar</button>
                      &nbsp;&nbsp;||&nbsp;&nbsp;

            
            <button name="aceptar" value="Buscar" type="submit" onclick = "this.form.action = 'resultados.php';" class="btn btn-success btn-small"><i class="icon"></i>&nbsp;Buscar Muestras</button>
          			 &nbsp;&nbsp;||&nbsp;&nbsp;
            <button name="aceptar1" value="Datostecnicos" type="submit" onclick = "this.form.action = 'resultadosdt.php';" class="btn btn-success btn-small"><i class="icon"></i>&nbsp;Datos Técnicos</button>
          
          					
                   </div>
                            </div>
                        </div>
                      
                </form>
               
    	</div></div></div>
        
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
