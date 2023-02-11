<?php 
include_once "../clases/Sistema.php";
//error_reporting(E_ALL ^ E_NOTICE);
$sistema = new Sistema();
$datos = $sistema->detallestecnicos_by_id($_GET["id"]);
if (count($datos) == 1 and isset($_GET) and $_GET["id"] != "")
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="../js/additional-methods.js"></script>
<script language="javascript">   
$(document).ready(function() {
        $.validator.addMethod("decimal",function(value,element,regexp){
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
        },"Sólo números decimales");
	$("#tecnicos").validate({
		rules:{
			 'latitud':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			 'longitud':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'altitud':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'caforado':{required:true},
							
			'cautorizado':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'tarifareal':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'tconstruccion':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'proveedores':{required:true},
							
			'tuberia1':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'tuberia2':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'tuberia3':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'distancia':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'rompepresion':{required:true, digits:true},	
			'valvulas_aire':{required:true,digits:true},
			'valvulas_purga':{required:true,digits:true},
			'numtanques':{required:true,digits:true},
			'capacidad':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'longitudred':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'diametro1':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'diametro2':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			'diametro3':{required:true,
							decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
			're_rompepresion':{required:true, digits:true},
			'conmedidor':{required:true, digits:true},
			'sinmedidor':{required:true, digits:true}
		},
		messages:{
                        'caforado':{
						     required:'Campo requerido',
						     digits:'Por favor sólo números'},
						'cautorizado':{
							 required:'Campo requerido',
						     digits:'Por favor sólo números'},
					    'tarifareal':{
							 required:'Campo requerido',
						     digits:'Por favor sólo números'},
						 'tuberia1':{
                            required:'Campo requerido',
							 digits:'Por favor sólo números'},
                         'tuberia2':{
							 required:'Campo requerido',
						     digits:'Por favor sólo números'},
					     'tuberia3':{
							 required:'Campo requerido',
						     digits:'Por favor sólo números'},
							 
						'distancia':{
                            required:'Campo requerido',
			    			digits:'Por favor sólo números enteros'
                        },
                       
                        'rompepresion':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
                        'valvulas':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
                        'capacidad':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
                        'longitud':{
                            required:'Campo requerido',
                            digits:'Por favor sólo números enteros'
                        },
                        'diametro':{
                            required:'Campo requerido'
                        },
                        're_rompepresion':{
                            required:'Campo necesario',
                            digits:'Por favor sólo números enteros'
                        },
                        'conmedidor':{
                            required:'Campo necesario',
                            digits:'Por favor sólo números enteros'
                        },
                        'sinmedidor':{
                            required:'Campo necesario',
                            digits:'Por favor sólo números enteros'
                        }
                        
		}
        });
});
</script>
<title>Datos Tecnicos</title>
</head>
    <body onload="history.forward();">
    <p class="message" style="width:600px;">Nombre del sistema:
    <strong><?php echo "    ".$datos[0]["nombresistema"] ?></strong></p>
<form id="tecnicos" name="tecnicos" method="post" action="ct_sistemas.php">
<fieldset style=" width:600px;"><legend>Datos técnicos: </legend>
   <fieldset><legend>1. Datos de captación:</legend>
          1.1. Fuente: <strong><?php echo $datos[0]["captacion"] ?></strong><br />
          1.2. Coordenadas:
       Latitud:<input name="latitud" type="text" class="editable" value="<?php echo $datos[0]
	   ["latitud"] ?>" size="10" />	 (º)  &nbsp;&nbsp;
       Longitud:<input name="longitud" type="text" class="editable" value="<?php echo $datos[0]
	   ["longitud"] ?>" size="10" /> (º)  &nbsp;   <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       Altitud:<input name="altitud" type="text" class="editable" value="<?php echo $datos[0]
	   ["altitud"] ?>" size="10" /> msnm      
        <fieldset class="fieldset"><legend>1.3. Caudales  </legend>  
       1.3.1.Caudal aforado:<input name="caforado" type="text" class="editable" value="
	   <?php echo $datos[0]["caforado"] ?>" size="10" /> 	lts/s<br />
   	   1.3.2.Fecha de aforo:<strong><?php echo $datos[0]["faforo"] ?></strong><br />
       1.3.3. Epoca de aforo: <strong><?php echo $datos[0]["eaforo"] ?></strong><br />
       1.3.4. Caudal autorizado:<input name="cautorizado" type="text" class="editable" value="<?php echo $datos[0]["cautorizado"] ?>" size="10" />
	lts/s<br />
    </fieldset>
    </fieldset>
   <fieldset><legend>2. Organización: </legend>
     2.1. Fecha de Construción del sistema:<strong><?php echo $datos[0]["fconstruccion"] ?></strong><br />
     2.2. Junta Legalizada:<strong><?php echo $datos[0]["jlegalizada"] ?></strong><br />
     2.3. Junta Fiscalizada:<strong><?php echo $datos[0]["jfiscalizada"] ?></strong><br />
     2.4. Tarifa Real ($): <input name="tarifareal" type="text" class="editable" value="<?php echo $datos[0]["tarifareal"] ?>" size="10" />
	 dolares<br />
     2.5. Tarifa de Construcción($): <input name="tconstruccion" type="text" class="editable" value="<?php echo $datos[0]
	 ["tconstruccion"] ?>" size="10" />	dolares<br />
     </fieldset>
     <fieldset><legend>3. Calidad de Agua: </legend>
       3.1. Desinfección:<strong><?php echo $datos[0]["sdesinfeccion"] ?></strong><br />
       3.2. Productos químicos utlizados:<strong><?php echo $datos[0]["pqutilizados"] ?></strong><br />
      <fieldset>
        <legend>3.2.1.Proveedores:</legend>
        <textarea name="proveedores" class="editable" id="proveedores"><?php echo $datos[0]["proveedores"] ?></textarea>
        </fieldset>
        </fieldset> 
	<fieldset> <legend>4. Datos de Conducción: </legend>
   		 4.1.Díametro de tuberia:
        <input name="tuberia1" type="text" class="editable" value="<?php echo $datos[0]["tuberia1"] ?>" size="10" />
        <input name="tuberia2" type="text" class="editable" value="<?php echo $datos[0]["tuberia2"] ?>" size="10" />
        <input name="tuberia3" type="text" class="editable" value="<?php echo $datos[0]["tuberia3"] ?>" size="10" />
        <strong><?php echo $datos[0]["magnitud_tuberia"] ?></strong><br />
        4.2.Distancia de conducción en base a diámetro:
        <input name="distancia" type="text" class="editable" value="<?php echo $datos[0]["distancia"] ?>"  size="10" />
        <strong class="p_form">*</strong> metros<br />
        4.3.Tanques rompe presiones :
        <input name="rompepresion" type="text" class="editable" value="<?php echo $datos[0]["rompepresion"] ?>" size="10"/>Unidades<br />
        4.4.Válvulas:
          <input name="valvulas_aire" type="text" class="editable" value="<?php echo $datos[0]["valvulas_aire"] ?>" size="10" />Aire
          <input name="valvulas_purga" type="text" class="editable" value="<?php echo $datos[0]["valvulas_purga"] ?>" size="10" />Purga<br />
       </fieldset>      
   		 <fieldset ><legend>5. Datos del Almacenamiento:</legend>
          5.1.Número de tanques:<input name="numtanques" type="text" class="editable" value="<?php echo $datos[0]["numtanques"] ?>" size="10" />Unidades
        <fieldset class="fieldset"><legend>5.2.Almaceamiento  </legend> 
          5.2.1.Estado: <strong><?php echo $datos[0]["estado"] ?></strong><br />
          5.2.2.Uso:<strong><?php echo $datos[0]["uso"] ?></strong><br />
          5.2.3.Capacidad del tanque:<input name="capacidad" type="text" class="editable" value="<?php echo $datos[0]
		  ["capacidad"] ?>" size="10" /> m&sup3;<br />       
          </fieldset>
     	</fieldset>  
        <fieldset><legend>6. Red de Distribución:</legend>
        6.1.Longitud de red de distribucion: <input name="longitudred" type="text" class="editable" value="<?php echo $datos[0]
		  ["longitudred"] ?>" size="10" /> metros.<br />
        6.2.Diámetro de la tubería: 
        	<input name="diametro1" type="text" class="editable" value="<?php echo $datos[0]["diametro1"] ?>" size="10" />
            <input name="diametro2" type="text" class="editable" value="<?php echo $datos[0]["diametro2"] ?>" size="10" />
            <input name="diametro3" type="text" class="editable" value="<?php echo $datos[0]["diametro3"] ?>" size="10" />
            <strong><?php echo $datos[0]["magnitud_diametro"] ?></strong><br />
       6.3.Rompe presiones: <input name="re_rompepresion" type="text" class="editable" value="<?php echo $datos[0]
		  ["re_rompepresion"] ?>" size="10" /> metros.<br />
           <fieldset class="fieldset"><legend>6.4.Número de conexiones domiciliarias  </legend>
     	 	 6.4.1.Con medidor:<input name="conmedidor" type="text" class="editable" value="<?php echo $datos[0]["conmedidor"] ?>" size="10"/><br />
             6.4.2.Sin medidor:<input name="sinmedidor" type="text" class="editable" value="<?php echo $datos[0]["sinmedidor"] ?>" size="10"/><br />
           </fieldset>
     </fieldset>
             <p><strong>Comentarios:  </strong><br />
             <textarea name="comentarios" class="editable" id="comentarios"><?php echo $datos[0]["comentarios"] ?></textarea>
             </p>
<table width="100%" border="0">
  <tr>
    <td align="center">
    <input name="grabar" type="hidden" value="ok" />
    <input type="hidden" name="codigo" value="<?php echo $datos[0]["codigo"]?>"/>
	<input type="button" value="Atrás" title="Atrás" onClick="history.back();" class="submit"/>
	&nbsp;&nbsp;||&nbsp;&nbsp;
	<input name="Guardar" type="submit" title="GUARDAR DATOS" value="Guardar" class="submit"/>
    </td>
  </tr>
</table>
</fieldset>
<strong class="p_form">(*) Campo editable y necesario</strong>
</form>
</body>
</html>
<?php
}else{
    echo "<script type='text/javascript'>
              alert('NO EXISTE INFORMACIÓN TÉCNICA REGISTRADA...!!!');
              window.location='buscar_sistema.php';
          </script>";
}
?>
