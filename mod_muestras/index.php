<?php 
include_once("../class.login.php");
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"]))
{
$horas=array('00','01','02','03','04','05','06',
	     '07','08','09','10','11','12',
	     '13','14','15','16','17','18',
	     '19','20','21','22','23','24',
             '25','26','27','28','29','30',
	     '31','32','33','34','35','36',
	     '37','38','39','40','41','42',
	     '43','44','45','46','47','48',
	     '49','50','51','52','53','54',
	     '55','56','57','58','59');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/fichas.css" rel="stylesheet" type="text/css" />
<title>..::Administracion de fichas::..</title>
</head>

<body onload="history.forward();">

<div class="container">
<div class="pagina">
 <div class="header">
  <div class="fltlft">
<h1>CALIAGUA</h1>
<div class="error">
  <strong style="color: #030;">M&Oacute;DULO DE ADMINISTRACIÓN DE FICHAS</strong>
  </div>
  </div>
  </div>
  <div id="menu">
  <?php  if($_SESSION["perfil"]=="administrador"){ 
  		require_once "menu/administrador.php";
		}
		else {
			require_once "menu/registrado.php";
		}
  ?>
  </div>
  <div class="content">
    <h2>M&oacute;dulo de administracion de fichas</h2><br />
    <p><strong>Registrar ficha:</strong> registrar datos con la información del análisis de las muestra de agua potable.</p>
   	<br />
    <p><strong>Actualizar ficha:</strong> cambia informacion de las fichas registradas con la información del análisis<br /> de las muestra de agua potable.</p>
     <br class="clearfloat" />
  </div>
 
  <div class="footer">
   <img src="../imagen/footer_final.jpg" width="1000" height="90" alt="footer" border="0" usemap="#foot" /> 
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
<?php }else{
    header("Location: ../index.php?error=2");
}
?>