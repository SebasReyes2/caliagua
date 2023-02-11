<?php 
include_once '../clases/Provincia.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..::Estadisticas de agua::..</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/messages_es.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#tab").tabs({
           collapsible: false
       });
       $('#grafico').hide();
       $('#procesar').hide();
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
    $("#datos").validate({
        rules:{
            'canton':'required',
            'parroquia':'required'
        },
        submitHandler:function(){
            $().ajaxStart(function(){
                $('#procesar').show();
            }).ajaxStop(function(){
                $('#procesar').hide();
                $('#grafico').fadeIn('slow');
				$('#canton option:selected').removeAttr("selected");
				$('#parroquia option:selected').removeAttr("selected");
            });
          $.ajax({
              beforeSend:function(){
                  $('#procesar').show();
              },
            type: 'POST',
            cache:false,
            url: "sistemas_parroquia.php",
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
    
    $('#op_canton').validate({
        rules:{
            's_canton':'required'
        },
        submitHandler:function(){
            $().ajaxStart(function(){
                $('#procesar').show();
            }).ajaxStop(function(){
                $('#procesar').hide();
                $('#grafico').fadeIn('slow');
            });
          $.ajax({
              beforeSend:function(){
                  $('#procesar').show();
              },
            type: 'POST',
            cache:false,
            url: "sistemas_canton.php",
            data: $("#op_canton").serialize()+"&id=" + Math.random(),
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
</script>


</head>

<body>
<?php include("partes/header.php"); ?>
<div class="content">
<h4>Pocentaje de tipo de sistemas de agua por:</h4>
    <div id="tab" style="font-size: 12px;">
        <ul>
            <li><a href="#tab1">Seleccione la Provincia: </a></li>
        </ul>  
        <div id="tab1">
            <form action="sistemas_canton.php" method="post" name="op_provincia" id="op_provincia">
              <table class="table">
                  <tr class="success">
                   <td><label for="s_provincia">Provincia:</label></td>
                   <td>
                    <select name="s_provincia" id="s_provincia" class="span3">
                     <option value="">---Seleccionar---</option>
                       <?php
                       $provincia = new Provincia;
                       $datos = $provincia->datos();
                       for ($i=0;$i<count($datos);$i++) {
                       ?>         
			<option value="<?php echo $datos[$i]["cod_provincia"]; ?>"><?php echo htmlspecialchars($datos[$i]["nom_provincia"]) ; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                    </table>
              <div class="text-center">
              <button name="aceptar1" value="Buscar" type="submit" onclick = "this.form.action = 'calidad_Chimborazo.php';" class="btn 							              btn-success btn-small"><i class="icon"></i>&nbsp;Buscar</button>
              
          </div>
                  </form>
        </div>
   
<div class="container text-center"><p>Los resultados se muestran con la informaci&oacute;n que al momento est&aacute; en la base de datos.</p></div>
    
  
</div>
<?php include("partes/footer.php"); ?>
</body>
</html>