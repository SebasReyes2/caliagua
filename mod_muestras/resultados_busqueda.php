<?php 
error_reporting(E_ALL);
include_once("../class.login.php");
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"]))
{
require_once "../clases/Muestra.php";
require_once "../clases/Sistema.php";
if (isset($_POST["sistema"]) and isset($_POST["canton"]))
{
$idsistema = (int)$_POST["sistema"];
$idcanton = (int)$_POST["canton"];
$muestras = new Muestra();
$datos = $muestras->muestras_by_sistema($idsistema,$idcanton);
}
else { 
		echo "<script type='text/javascript'>
                    alert('SELECCIONE LOS DATOS INICIALES PARA BUSCAR LAS FICHAS');
					window.location='busqueda.php';
              </script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<link type="text/css" href="../css/fichas.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <link type="text/css" href="../themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
        <link type="text/css" href="../css/demo_table_jui.css" rel="stylesheet">
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
                    },
                    "sZeroRecords": "NO EXISTEN RESULTADOS"
                    }
                });
            });
</script>
<title>..::Resultados de busqueda::..</title>

</head>
    <body>
    
    <div class="container">
<div class="pagina">
 <div class="header">
  <div class="fltlft">
<h1>CALIAGUA</h1>
<h3>M&Oacute;DULO DE ADMINISTRACIÓN DE FICHAS</h3>
  </div>
  </div>
  <div id="menu">
  <ul id="menu1">
  		<li>
            <a href="../administracion.php">
            <img src="../imagen/home.png" width="16" height="16"/>&nbsp;
            Inicio
            </a>
        </li>
  		<li>
            <a href="index.php">
            <img src="../imagen/operaciones/home.png" width="16" height="16"/>&nbsp;
            Administraci&oacute;n
            </a>
        </li>
        <li>
        	 <a href="registrar_muestra.php">
            <img src="../imagen/operaciones/reg.png" width="16" height="16" />&nbsp;
            Registrar ficha </a>
        </li>
      <?php if ($_SESSION["perfil"] == "administrador") {?>
        <li>
            <a href="busqueda.php">
            <img src="../imagen/operaciones/edit.png" width="16" height="16" />&nbsp; 
            Cambiar ficha</a>
      </li><?php } ?>
        <li>
            <a href="../salir.php">
            <img src="../imagen/logout.png" width="16" height="16" />&nbsp; 
            Salir</a>
        </li>
    </ul>
  </div>
  <div class="content">
      
      <h2 class="message">LISTADO DE FICHAS ENCONTRADAS</h2>
      <div>
      <h4>
      NOMBRE DEL SISTEMA: <?php 
      $sistema = new Sistema();
      $nombresistema = $sistema->nombre_by_id($idsistema);
      echo $nombresistema[0]["nombresistema"]."<br>";
      ?>
      </h4>     
      </div>
  <?php 
  if ((count ($datos) > 0)) {
  ?>
<table class="display" id="datatables">
    <thead>
        <tr>
            <th style="text-align: center;">C&oacute;digo</th>
            <th style="text-align: center;">N° de muestra</th>
            <th style="text-align: center;">Fecha</th>
            <th style="text-align: center;">Hora</th>
            <th style="text-align: center;">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count ($datos); $i++) {?>
  <tr>
      <td><?php echo $datos[$i]["codmuestra"] ?></td>
      <td><?php echo $datos[$i]["numero"] ?></td>
      <td><?php echo $datos[$i]["fecha"] ?></td>
      <td><?php echo $datos[$i]["hora"] ?></td>
      <td style="text-align:center;">
              <a href="javascript:void(0);" 
                     onClick="window.location='cambiar_ficha.php?id=<?php echo $datos[$i]["codmuestra"]; ?>&canton=<?php echo $_POST["canton"];?>' ;">
                  <input name="EDITAR" type="image" value="EDITAR" src="../imagen/operaciones/edit.png" align="center" /></a>
          
      </td>
  </tr>
  <?php
	}
	?>
    </tbody>
</table>
      
<?php
  }else{
	  echo '<div>
    		<strong>NO EXISTEN FICHAS AUN REGISTRADAS</strong>
		</div>';
  }
?>
  <br class="clearfloat" />
  <br class="clearfloat" />
  </div>
  <br class="clearfloat" />
  <div class="footer">
   <img src="../imagen/footer_final.jpg" width="1000" height="90" alt="footer" usemap="#foot" /> 
  <map name="foot">
  <area shape="rect" coords="30,11,145,74" href="http://www.habitatyvivienda.gob.ec/" target="_blank" />
  <area shape="rect" coords="205,11,321,79" href="http://subcuencachambo.wordpress.com/" target="_blank" />  
  <area shape="rect" coords="383,11,468.9,74" href="#top" />
  <area shape="rect" coords="524.9,11,639.9,74" href="http://www.avsf.org/" target="_blank"/>
  <area shape="rect" coords="692.9,11,803.9,74" href="http://www.eau-seine-normandie.fr/" target="_blank" />
  <area shape="rect" coords="868.9,11,967.9,74" href="http://www.afd.fr/" target="_blank" />
  </map>
  </div>
</div> 
</div>
</body>
</html>
<?php }?>
