<?php 
include_once '../clases/Provincia.php';
include_once '../clases/Canton.php';
include_once '../clases/Sistema.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Estadísticas CaliAgua</title>
    
<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="../css/style.css"> 
    
    
<meta name="keywords" content="" />
<meta name="description" content="" />
    
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
    
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
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
<link href="http://fonts.cdnfonts.com/css/beyond-the-mountains" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    
    
<script type="text/javascript">	
    
    $(document).ready(function(){          
    	$("#tab").tabs({
        	collapsible: false
       	});
       	$('#grafico').hide();
       	$('#procesar').hide();
      	// carga_datos_provincia();
     	$("#datosp").validate({
        	rules: {
         		'provincia1':'required'
            },
        	submitHandler:function(){
            	$().ajaxStart(function(){
                	$('#procesar').show();
            	}).ajaxStop(function(){
                	$('#procesar').hide();
                	$('#grafico').fadeIn('slow');
                	$('#provincia1 option:selected').removeAttr("selected");
                                     
            	});
          		$.ajax({
              		beforeSend:function(){
                  		$('#procesar').show();
              	},
            	type: 'POST',
            	cache:false,
            	url: "grafico_provincia.php",
            	data: $("#datosp").serialize()+"&id=" + Math.random(),
            	timeout:3000000,
            	success: function(data) {
                	$('#grafico').fadeIn('slow');
                	$('#procesar').hide();
                	$('#grafico').html(data);
            	}
        });
        
        return false;
        }
     });
  });
    
    
        
        
     $(document).ready(function(){       
       $("#tab").tabs({
           collapsible: false
       });
       $('#grafico').hide();
       $('#procesar').hide();
       //carga_datos_provincia();
       //carga_datos_canton();
   $("#datospc").validate({
        rules:{
         'provincia2':'required',
         'canton1':'required'
             },
        submitHandler:function(){
            $().ajaxStart(function(){
                $('#procesar').show();
            }).ajaxStop(function(){
                $('#procesar').hide();
                $('#grafico').fadeIn('slow');
                //$('#provincia2 option:selected').removeAttr("selected");
                $('#canton1 option:selected').removeAttr("selected");
                         
            });
          $.ajax({
              beforeSend:function(){
                  $('#procesar').show();
              },
            type: 'POST',
            cache:false,
            url: "grafico_canton.php",
            data: $("#datospc").serialize()+"&id=" + Math.random(),
            timeout:3000000,
            success: function(data) {
                $('#grafico').fadeIn('slow');
                $('#procesar').hide();
                $('#grafico').html(data);
            }
        });
        
        return false;
        }
        
    });
  });
    
    $(document).ready(function(){
        
       $("#tab").tabs({
           collapsible: false
       });
       
       $('#grafico').hide();
       $('#procesar').hide();
       carga_datos_provincia();
       carga_datos_parroquia();
       carga_datos_canton();
   $("#datos").validate({
        rules:{
	 'provincia':'required',
         'canton':'required', 
         'parroquia':'required'
        },
        submitHandler:function(){
            $().ajaxStart(function(){
                $('#procesar').show();
            }).ajaxStop(function(){
                $('#procesar').hide();
                $('#grafico').fadeIn('slow');
                $('#provincia option:selected').removeAttr("selected");
                $('#canton option:selected').removeAttr("selected");
                $('#parroquia option:selected').removeAttr("selected");          
            });
          $.ajax({
              beforeSend:function(){
                  $('#procesar').show();
              },
            type: 'POST',
            cache:false,
            url: "grafico_parroquia.php",
            data: $("#datos").serialize()+"&id=" + Math.random(),
            timeout:3000000,
            success: function(data) {
                $('#grafico').fadeIn('slow');
                $('#procesar').hide();
                $('#grafico').html(data);
            }
        });
        
        return false;
        }
        
    });
  });
 /**
 *Función para el select de la provincia
 */
 function carga_datos_provincia() { 
    $.ajax({    
		url:'combos.php?Accion=GetProvincias',
		success:function(Datos){
			$("#provincia1").append("<option value=''>Seleccionar</option>");
			for(x=0;x<Datos.length;x++)
			{
				//$("#provincia1").append(new Option(Datos[x].nom_provincia,Datos[x].cod_provincia ));
			}
			$.each(Datos, function(index){
				//console.log(Datos[index].nom_provincia+":"+Datos[index].cod_provincia);
				$("#provincia1").append(new Option(Datos[index].nom_provincia, Datos[index].cod_provincia));
				/*
				$.each(Datos[index], function (key, val) {
					//console.log(key +":"+ val);
					$("#provincia1").append(new Option(val, key));
				});
				*/
			});			
        },
        error: function (request, status, error) {
        	console.log(request.responseText);
    	}
	 });	
}
function carga_datos_canton() {
    $.ajax({
	url:'combos.php?Accion=GetProvincias',
        success:function(Datos){
		$("#provincia2,#canton1").append("<option value=''>--Seleccionar--</option>");
			//for(x=0;x<Datos.length;x++) { $("#provincia2").append(new Option(Datos[x].nom_provincia,Datos[x].cod_provincia )); }
        	$.each(Datos, function(index){
				console.log(Datos[index].nom_provincia+":"+Datos[index].cod_provincia);
				$("#provincia2").append(new Option(Datos[index].nom_provincia, Datos[index].cod_provincia));
			});		
        }
    });	
    $('#provincia2').on('change',function(){
    	/*
    	var data = { "programs": [ { "name":"zonealarm", "price":"500" }, { "name":"kaspersky", "price":"200" } ] };
        $.each(data.programs, function (i) {
    		$.each(data.programs[i], function (key, val) {
        		console.log(key+":"+val);
    		});
		});
		*/
    	$('#canton1,#parroquia').empty();
    	$("#parroquia,#canton1").append("<option value=''>--Seleccionar--</option>");
    	var id = $('#provincia2 option:selected').val();
    	var cod_id=JSON.parse(JSON.stringify({'cod_provincia': id}));
    	console.log(cod_id);
    	console.log(cod_id.cod_provincia);
    	$.getJSON("combos.php",
    	{
    	  Accion:'GetCantones', 
    	  //cod_provincia: JSON.parse($("#provincia2 option:selected").val())
    	  //"cod_provincia":$("#provincia2 option:selected").val()
    	  //"cod_provincia": JSON.stringify({'id': id})
    	  //"cod_provincia":JSON.parse('{"id":id}')
    	  //"cod_provincia":JSON.parse('1')
    	  //"cod_provincia":$.parseJSON(id)
    	  //cod_provincia:$("#provincia2 option:selected").val()
    	  //cod_provincia: cod_id
    	  cod_provincia: $("#provincia2 option:selected").val()
    	})
    	.done(function(Datos) {   
    		console.log(Datos);
    		$.each(Datos, function(index) {
    			console.log(Datos[index]);
				$('#canton1').append(new Option(Datos[index].nombrecanton, Datos[index].codcanton));          	
        	});
        	/* 	
    		for(i=0;i<Datos.length;i++) {
    			$('#canton1').append(new Option(Datos[i].nombrecanton, Datos[i].codcanton));
    		}
    		*/
    	})
    	.fail(function(jqxhr, textStatus, error){
    		var err = textStatus + ", " + error + ", " + jqxhr;
    		console.log('Request Failed. ' + err);
    	});
    });          
}
/**
 *Función para el select de la parroquia
 */
function carga_datos_parroquia() {
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
                   $("#parroquia,#canton").append("<option value=''>--Seleccionar--</option>");
                   $.getJSON("combos.php",{Accion:'GetCantones',cod_provincia:$('#provincia option:selected').val()},function(Datos){
                            for(x=0;x<Datos.length;x++)
                            {
                                $("#canton").append(new Option(Datos[x].nombrecanton,Datos[x].codcanton));
                            }
                       });
		    });
            $('#canton').change(function(){
            $('#parroquia').empty();
            $.getJSON("combos.php",{Accion:'GetParroquias',codcanton:$('#canton option:selected').val()},function(Datos){
                $("#parroquia").append("<option value=''>---Selecionar---</option>");
                 for(x=0;x<Datos.length;x++)
                    {
                        $("#parroquia").append(new Option(Datos[x].nombreparroquia,Datos[x].codparroquia));
                    }
            });
        });
}
    
</script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <div class="container">

        

<!-- Titulos -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top" >
    <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="index.php">Cali Agua</a> </div>
    
<!-- NAV -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav navbar-right " >
        <li><a href="../index.php" class="page-scroll">Inicio</a></li>
        <li><a href="../contacto.php" class="page-scroll">Agregar Reporte</a></li>
        <li><a href="tipo_sistema.php" class="page-scroll">Estadísticas</a></li>
        <li><a href="../mod_consultas/"  class="page-scroll">Consulta de Fichas</a></li>
        <li><a href="../inicioSesion.php" class="page-scroll">Iniciar Sesión</a></li>
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
              <li><a href="#" data-filter="#" class="active">Tipo de sistema</a></li>
              <li><a href="grafica_parametro.php" data-filter="#" >Gráfico por parámetros</a></li>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
</div>
</div>

<div id="three-columns">
<div class="content">
    <div id="formularios">
	<h4>Pocentaje de tipo de sistemas de agua por:</h4>
    <div id="tab" >
        <ul>
        <li><a href="#tab2">Grafico por Provincia </a></li>
        <li><a href="#tab3">Grafico por Cantón </a></li>
        <li><a href="#tab4">Grafico por Parroquia </a></li>
        </ul>          
      <div id="tab2">
          <form name="datosp" id="datosp" method="POST" action="grafico_provincia.php" >
              <table class="table">
               			<tr class="success">                   
                        <td><label for="provincia1">Provincia:</label></td>
                        <td>
                            <select name="provincia1" id="provincia1" class="select-css" >
                            </select>
                        </td>
                    </tr>  
                </table>
                <div class="text-center">
                    
                  
                 <button type="reset" name="borrar" id="borrar" value="borrar" class="btn btn-warning " onclick="window.location.reload();">Reiniciar
                        </button>
                    
                    <button type="submit" value="Generar gráfica" name="enviar" class="btn btn-success"  >Ver Gráfica</button>
                </div>
            </form>
       </div>
        
        
         <div id="tab3">
             <form name="datospc" id="datospc" method="post" action="grafico_canton.php">
              <table class="table">
              			<tr class="success">                                                                          
                        <td><label for="provincia2">Provincia:</label></td>
                        <td>
                            <select name="provincia2" id="provincia2" class="select-css">
                            </select>
                        </td>
                    </tr>
                    
                  <tr class="success">
                        <td><label for="canton1">Cantón:</label></td>
                        <td>
                            <select name="canton1" id="canton1" class="select-css">
                            </select>
                            
                        </td>
                    </tr>
                    
                </table>
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <button type="reset" name="borrar" id="borrar" value="borrar" class="btn btn-warning " onclick="window.location.reload();">
                            <i class="icon-off"></i>Reiniciar
                        </button>
                        <button class="btn btn-success" type="submit" name="generar" id="generar">
                            <i class="icon-picture"></i>Ver gráfica
                        </button>
                    </div>
                </div>
            </form>
              </div>
        
        
        
         <div id="tab4">
                <form name="datos" id="datos" method="post" action="grafico_parroquia.php">
              <table class="table">
              			<tr class="success">                                                                          
                        <td><label for="provincia">Provincia:</label></td>
                        <td>
                            <select name="provincia" id="provincia" class="select-css">
                            </select>
                        </td>
                    </tr>
                    
                  <tr class="success">
                        <td><label for="canton">Cantón:</label></td>
                        <td>
                            <select name="canton" id="canton" class="select-css">
                            </select>
                            
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label for="parroquia">Parroquia:</label></td>
                        <td>
                            <select name="parroquia" id="parroquia" class="select-css">
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <button type="reset" name="borrar" id="generar" value="borrar" class="btn btn-warning" onclick="window.location.reload();">
                            <i class="icon-off"></i>Reiniciar
                        </button>
                        
                        <button class="btn btn-success" type="submit" name="generar" id="generar">
                            <i class="icon-picture"></i>Ver gráfica
                        </button>
                    </div>
                </div>
            </form>
          </div>
        
        <div id="procesar" class="text-center">
        <img src="images/loading.gif" width="45" height="45" alt="ajax-loader"/>
    </div>
    <br><br>
    <div id="grafico">  </div>
      </div>
    </div>
    </div>
 </div> 
    
    </div>

    
<!-- <div id="recargar" class="content text-center">
            <a class="label label-success" onclick="window.location.reload();">Atras</a>
 </div>-->
    
    
    
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
