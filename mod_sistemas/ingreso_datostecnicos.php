<?php 
include_once("../clases/Sistema.php");
$sistema = new Sistema();
$regis = $sistema->detallestecnicos_by_id($_POST["sistema"]);
$ver = count($regis);
if ($ver == 0)
{
	$nombre = $sistema->nombre_by_id($_POST["sistema"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<link href="../css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/calendario.css" type="text/css" rel="stylesheet" />
<script src="../js/calendario/calendar.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-es.js" language="javascript" type="text/javascript"></script>
<script src="../js/calendario/calendar-setup.js" language="javascript" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="../js/additional-methods.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="js/combos.js"></script>
<script language="javascript">   
$(document).ready(function() {
        $.validator.addMethod("decimal",function(value,element,regexp){
            		var re = new RegExp(regexp);
            		return this.optional(element) || re.test(value);
            	},"Por favor ingrese números.");
	$("#datostecnicos").validate({
		rules:{
				'latitud':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
				'longitud':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
				'altitud':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
								
				'caforado':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
				'faforo':'required',
				'eaforo':{required:true},
				'cautorizado':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
				'fconstruccion':'required',
				'jlegalizada':{required:true},
				'tarifareal':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
				'tconstruccion':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
					'jfiscalizada':{required:true},
					'sdesinfeccion':{required:true},
					'pqutilizados':{required:true},
					'proveedores':{required:true},
					'cloracion':{required:true},
					'captacion':{required:true},
          			'distancia':{required:true,digits:true},
            		'tuberia1':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
					'tuberia2':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },
					'tuberia3':{required:true,
									decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
                                },												
								
                     'magnitud_tuberia':{required:true},
                        'rompepresion':{required:true,digits:true},
                        'valvulas':{required:true,digits:true},
					 'valvulas_purga':{required:true,digits:true},
                        'capacidad':{required:true,
						decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
									},
                        'numtanques':{required:true,digits:true},
						'estado	':{required:true},
						'uso':{required:true},
						
				        'longitudred':{required:true,
						decimal:"^([0-9])*[.]?[0-9]*$",
									number:true
									},
                        'diametro1':{required:true,decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
						'diametro2':{required:true,decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
						'diametro3':{required:true,decimal:"^([0-9])*[.]?[0-9]*$",
									number:true},
                        'magnitud_diametro':'required',
                        're_rompepresion':{required:true, digits:true},
                        'conmedidor':{required:true, digits:true},
                        'sinmedidor':{required:true, digits:true},
		},
		messages:{
			
			
				'latitud':{ 
					required:'Campo necesario',
                            digits:'Por favor sólo números'
                          },
				'longitud':{ 
						required:'Campo requerido',
						digits:'Por favor sólo números'
                          },
				'altitud':{ 
						required:'Campo requerido',
						digits:'Por favor sólo números'
                         },
				'caforado':{
                         required:'Campo requerido',
						 digits:'Por favor sólo números'              
                        },
				'eaforo':'Campo necesario.',
				'cautorizado':{
                            required:'Campo requerido',
							digits:'Por favor sólo números'
                        },
				'jlegalizada':'Campo necesario.',
				'tarifareal':{
                            required:'Campo requerido',
							digits:'Por favor sólo números'
							 },
				'tconstruccion':{
                            required:'Campo requerido',
							digits:'Por favor sólo números'
                        },
						'jfiscalizada':'Campo necesario.',
						'sdesinfeccion':'Campo necesario.',
						'pqutilizados':'Campo necesario.',
				        'proveedores':'Campo necesario.',
						'cloracion':'Campo necesario.',
						'captacion':'Campo necesario.',
            			'distancia':{
                            required:'Campo requerido',
			                digits:'Por favor sólo números enteros'
                        },
                        'tuberia1':{
                            required:'Campo requerido'
                        },
						'tuberia2':{
                            required:'Campo requerido'
                        },
						'tuberia3':{
                            required:'Campo requerido'
                        },
						'magnitud_tuberia':{
                            required:'Campo requerido'
                        },
                        'rompepresion':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
                        'valvulas_aire':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
						'valvulas_purga':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números enteros"
                        },
                        'capacidad':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números"
                        },
						'longitudred':{
                            required:"Campo requerido",
                            digits:"Por favor sólo números"
                        },
                        'diametro1':{
                            required:'Campo requerido'
                        },
						 'diametro2':{
                            required:'Campo requerido'
                        },
						 'diametro3':{
                            required:'Campo requerido'
                        },
                        'magnitud_diametro':'Campo necesario',
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
   <body>
    <p class="message" style="width:610px;">Nombre del sistema:
    <strong><?php echo "    ".$nombre[0]["nombresistema"] ?></strong></p>
    <form id="datostecnicos" name="datostecnicos" method="post" action="agregar_tecnicos.php">
     <fieldset style=" width:610px;"><legend>DATOS TECNICOS </legend>
<fieldset><legend>1. Datos de captación:</legend>
      1.1.Fuente:<select name="captacion">
         <option value="">Seleccionar</option>
         <option value="Ríos">Ríos</option>
         <option value="Lagos">Lagos</option>
         <option value="Asequias">Acequias</option>
         <option value="Campo de filtración">Campo de filtración</option>
         <option value="Vertiente">Vertiente</option>
        </select><strong class="p_form">*</strong><br />
   
       1.2.Coordenadas:
       Latitud<input name="latitud" type="text" style="font-size:11pt; width:40px; height:18px;" value="0"
       size="10" /><strong class="p_form">*</strong> (º)						       &nbsp;&nbsp;
       Longitud<input name="longitud" type="text" style="font-size:11pt; width:40px; height:18px;" value="0"
       size="10" /><strong class="p_form">*</strong> (º)       &nbsp;&nbsp;
       Altitud<input name="altitud" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" 
       size="10" /><strong class="p_form">*</strong> msnm     
       <fieldset>
       <legend>1.3.Caudales:</legend>
       1.3.1.Caudal aforado:<input name="caforado" type="text" style="font-size:11pt; width:40px; height:18px;"  value="0" size="10" /><strong 		class=       "p_form">*</strong>
	    lts/s<br />
   		<th>1.3.2.Fecha de aforo:</th>
   		<td style="text-align:left;">
   		<input name="faforo" type="text" id="faforo" size="10" readonly="readonly">
   		<img src="../imagen/calendario.png" width="16" height="16" border="0" title="Fecha" id="lanzador">
		<script type="text/javascript"> 
 	   Calendar.setup({ 
 	   inputField     :    "faforo",     // id del campo de texto 
  	   ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
  	   button     :    "lanzador"     // el id del botón que lanzará el calendario 
		}); 
      </script><br />      
       1.3.3. Epoca de aforo: <select name="eaforo">
       <option value="">Seleccionar</option>
       <option value="Invierno">Invierno</option>
       <option value="Verano">Verano</option>
       </select><strong class="p_form">*</strong><br />
       1.3.4. Caudal autorizado:<input name="cautorizado" type="text" style="font-size:	11pt; width:40px; height:18px;" value="0" size="10"/><strong 		       class="p_form">*</strong>lts/s<br />
       </fieldset>
       </fieldset>
<fieldset class="fieldset"><legend>2. Organización:  </legend> 
       <th>2.1. Fecha de Construción del sistema:</th>
       <td style="text-align:left;">
       <input name="fconstruccion" type="text" id="fconstruccion" size="11" readonly="readonly">
       <img src="../imagen/calendario.png" width="16" height="16" border="0" title="Fecha" id="lanzador1">
       <script type="text/javascript"> 
       Calendar.setup({ 
       inputField     :    "fconstruccion",     // id del campo de texto 
       ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto 
       button     :    "lanzador1"     // el id del botón que lanzará el calendario 
       }); 
       </script><br /> 
     2.2. Junta Legalizada:<select name="jlegalizada"/>
         <option value="">Seleccionar</option>
         <option value="Si">Si</option>
         <option value="Si">No</option>
         </select><strong class="p_form">*</strong><br />
     2.3. Junta Fiscalizada:<select name="jfiscalizada"/>
        <option value="">Seleccionar</option>
         <option value="Si">Si</option>
         <option value="Si">No</option>
         </select><strong class="p_form">*</strong><br />
     2.4. Tarifa Real ($):<input name="tarifareal" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" /><strong
          class="p_form">*</strong><br />
     2.5. Tarifa de Construcción($):<input name="tconstruccion" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" />
         <strong class="p_form">*</strong><br />
         </fieldset>
<fieldset class="fieldset"><legend>3. Calidad del agua:  </legend>
      3.1. Desinfección:<select name="sdesinfeccion"/>
        <option value="">Seleccionar</option>
         <option value="Cloración">Cloración</option>
         <option value="Filtración">Filtración</option>
         <option value="Floculación">Floculación</option>
         </select><strong class="p_form">*</strong><br />
       3.2. Productos químicos utlizados:<select name="pqutilizados"/>
        <option value="">Seleccionar</option>
         <option value="Cloro Gas">Cloro Gas</option>
         <option value="Cloro Liquido">Cloro Líquido</option>
         <option value="Cloro Pastillas">Cloro Pastillas</option>
         </select><strong class="p_form">*</strong><br /> 
      <fieldset>
   <legend>3.2.1.Proveedores:</legend>
        <textarea name="proveedores" rows="2" cols="130"> </textarea>
        </fieldset>
        </fieldset> 
<fieldset class="fieldset"><legend>4.Datos de Conducción:  </legend>  
        4.1.Díametro de tuberia:
        <input name="tuberia1" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
        <input name="tuberia2" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
        <input name="tuberia3" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
	    <select name="magnitud_tuberia">
		<option value="">Seleccionar</option>
		<option value="Pulgadas">Pulgadas</option>
    	<option value="Milímetros">Milimetros</option>
	    </select><strong class="p_form">*</strong>
        4.2.Distancia de conducción en base a diámetro:
        <input name="distancia" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
        <select name="mag_distancia">
		<option value="">Seleccionar</option>
		<option value="Pulgadas">pulgadas</option>
    	<option value="Milímetros">milimetros</option>
	    </select><strong class="p_form">*</strong><br /> 
        4.3.Tanques rompe presiones :
        <input name="rompepresion" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" /><strong class="p_form">*
        </strong> unidades<br /> 
        4.4.Válvulas:
        <input name="valvulas_aire" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" />Aire
        <input name="valvulas_purga" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" />Purga
        </fieldset>   
     	<fieldset class="fieldset"><legend>5. Datos del Almacenamiento  </legend> 
        5.1.Número de tanques:<input name="numtanques" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" /><strong class=        "p_form">*</strong>unidades;<br />
        <fieldset class="fieldset"><legend>5.2.Almaceamiento  </legend> 
          5.2.1.Estado<select name="estado">
		  <option value="">Seleccionar</option>
		  <option value="Bueno">Bueno</option>
    	  <option value="Regular">Regular</option>
          <option value="Malo">Malo</option>
	      </select><strong class="p_form">*</strong><br />
          5.2.2.Uso:<select name="uso"/>
          <option value="">Seleccionar</option>
          <option value="Si">Si</option>
          <option value="Si">No</option>
          </select><strong class="p_form">*</strong><br />  
          5.2.3.Capacidad del tanque:<input name="capacidad" type="text" style="font-size:11pt; width:40px; height:18px;" value="0" size="10" />
          <strong class="p_form">*</strong>m&sup3;<br />         
          </fieldset>
     	</fieldset>  
<fieldset class="fieldset"><legend>6. Red de Distribución  </legend>
        6.1.Longitud de red de distribucion: <input name="longitudred" style="font-size:11pt; width:40px; height:18px;" type="text" size="7" />
            <strong class="p_form">*</strong> metros.<br />
        6.2.Diámetro de la tubería: 
           <input name="diametro1" style="font-size:11pt; width:40px; height:18px;" type="text" size="4" /><strong class="p_form">* </strong>
           <input name="diametro2" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
           <input name="diametro3" type="text" style="font-size:11pt; width:40px; height:18px;" size="10" /><strong class="p_form">*</strong>
           <select name="magnitud_diametro">
           <option value="">Seleccionar</option>
           <option value="Pulgadas">Pulgadas</option>
           <option value="Milímetros">Milimetros</option>
           </select><strong class="p_form">*</strong><br />
       6.3.Rompe presiones: <input name="re_rompepresion" type="text" style="font-size:11pt; width:40px; height:18px;
           " value="0" size="10"/>Metros<br/>
           <fieldset class="fieldset"><legend>6.4.Número de conexiones domiciliarias  </legend>
     	 	 6.4.1.Con medidor:<input name="conmedidor" type="text" style="font-size:11pt; width:40px; height:18px;
             " value="0" size="10"/><br />
             6.4.2.Sin medidor:<input name="sinmedidor" type="text" style="font-size:11pt; width:40px; height:18px;
             " value="0" size="10"/>
           </fieldset>
        </fieldset> 
     <legend>Comentarios:      </legend>
         <textarea name="comentarios" rows="6" cols="70">Escribe aquí tus comentarios
         </textarea>    
         
   <table width="100%" border="0">
     <tr style="background:#E8E8E8; text-align:center;">
          <td style="background:#E8E8E8; text-align:center;">
         <input type="hidden" name="sistema" value="<?php echo $_POST["sistema"]; ?>"/>
	     <input type="button" value="Atrás" title="Atrás" onClick="history.back();" class="submit"/>
	     &nbsp;&nbsp;||&nbsp;&nbsp;
	     <input name="Guardar" type="submit" title="GUARDAR DATOS" value="Guardar" class="submit"/>
         </td>
    </tr>
    </table>
     </fieldset>
     <strong class="p_form">(*) Campo necesario</strong>
     </form>
     
  </body>
</html>
          <?php } 
            else {
              header("Location: datostecnicos.php?error=1");
                 }
          ?>