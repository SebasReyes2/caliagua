<?php 
include_once("class.login.php");
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"]))
{
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<title>..:: CALIAGUA DHP ::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.setup.js"></script>
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
<script language="javascript">
    function autofitIframe(id){
        if (!window.opera && document.all && document.getElementById){
                id.style.height=id.contentWindow.document.body.scrollHeight;
            } else if(document.getElementById) {
        id.style.height=id.contentDocument.body.scrollHeight+"px";
      }
  }
</script>
<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true,
				numeric: true
			});
		});	
		
</script>
</head>
    <body id="top" onload="history.forward();">
<!-- MENU DE CABECERA -->
<div class="wrapper col1">
  <div id="topbar">
   <marquee direction="left" width="100%" scrollamount="7">
     <p>-----&nbsp;&nbsp;&nbsp;Secretaria del Agua&nbsp;&nbsp;&nbsp;-----&nbsp;&nbsp;&nbsp;Direcci&oacute;n Provincial Regional Zona 3&nbsp;&nbsp;&nbsp;-----&nbsp;&nbsp;&nbsp;Riobamba&nbsp;&nbsp;&nbsp;-----&nbsp;&nbsp;&nbsp;Universidad Nacional de Chimborazo&nbsp;&nbsp;&nbsp;-----&nbsp;&nbsp;&nbsp;Facultad de Ingenieria&nbsp;&nbsp;&nbsp;-----</p>
    </marquee>
    <br class="clear" />
  </div>
</div>
<!-- CABECERA O HEADER -->
 <div class="wrapper col2">
  <div id="header">
    <div class="fl_left">
      <h1>CALIAGUA DHP</h1>
      <h3>"Gestión de datos de calidad del
          agua de consumo doméstico de la DemarcaciÃ³n HidrogrÃ¡fica de Pastaza"</h3>
    </div>
  </div>
</div>
<!-- MENU DE ADMINISTRACION Y REGISTRADO -->
 
<div class="wrapper col3">
  <div id="topnav">
    <?php 
	if ($_SESSION["perfil"]=='administrador')
	{
		include("menus/administrador.php");
	}else
	{
		include("menus/registrado.php");
	}
	?>
    <br class="clear" />
  </div>
</div>  

<!-- CONTENIDO Y ACCESO -->
<div class="wrapper col5">
  <div id="container">
    <div id="content">
     <h2><img src="imagen/home.png" width="20" height="20" />&nbsp;&nbsp;Inicio: </h2>
     <iframe name="contenido" id="ifrm" src="inicio.php" onload="autofitIframe(this);"></iframe>
    </div>
    <div id="column">
      <div class="holder">
      <h1><img src="imagen/accesos.png" width="20" height="20" />&nbsp;&nbsp;<strong id="titulo">Acceso:</strong> </h1>
      <p>Hola <?php echo $_SESSION["usuario"]; ?>,<br />
        <a href="salir.php"><input name="loguot" type="button" value="Finalizar sesi&oacute;n" src="imagen/logout.png" alt="Salir" style="cursor:pointer;" />
        </a></p>
      </div>
      
      <div class="holder">
      <h1><img src="imagen/galeria.png" width="20" height="20" />&nbsp;&nbsp;<strong id="titulo">Galeria:</strong> </h1>
      <div id="slider">
         <ul>				
			<?php
			$mysqli=Conexion::con();
			$sql="select foto,titulo from galeria_slide limit 10,16";
			$res=$mysqli->query($sql);
			$mysqli->close();
			#while ($reg=mysql_fetch_array($res))
			while ($reg=$res->fetch_array())
			{
			?>
				<li><img src="imagen/admin/<?php echo $reg["foto"];?>" title="<?php echo $reg["titulo"];?>" /></li>
			<?php
			}
			?>		
		</ul>
      </div>
      </div>
      
      <div class="holder">
       <h1><img src="imagen/contact.png" width="20" height="20" />&nbsp;&nbsp;<strong id="titulo">Contáctenos:</strong> </h1>
        <div class="imgholder">
        <img src="imagen/contacto.png" width="151" height="80" />
        <h4>SENAGUA, Secretaria del Agua</h4>	
         <p>Riobamba - Ecuador, Chile 10-51 Darquea Frente al Hospital Policl&iacute;nico<BR />Tel&eacute;fonos: (593) (3) 296 06 23</p>

        </div>
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- FOOTER -->
<div class="wrapper col6">
  <div id="footer">
    <div id="newsletter">
    <p>Copyright &copy; 2015 -  UNACH - FACULTAD DE INGENIER&Iacute;A. </p>
    </div>
    <div class="footbox">
    	Con el apoyo de: 
    </div>
    <div id="newsdes">
    <p>Desarrollado por: Ã�ngel E.MoyÃ³n</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- AUSPISIANTES -->
<div class="wrapper col7">
  <div id="copyright">
  <img src="imagen/footer_final.jpg" width="1000" height="90" alt="footer" usemap="#foot" /> 
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
</body>
</html>
<?php 
}else
{
	header("Location: index.php?error=2");
}
?>
