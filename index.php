<?php 
include_once("class.login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CaliAgua</title>
<!-- Links -->
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="http://fonts.cdnfonts.com/css/beyond-the-mountains" rel="stylesheet">


<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    
<!-- Estilos -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
</head>
    
    
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    
<!-- Titulos -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top" >
    <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="index.php">Cali Agua</a> </div>
    
<!-- NAV -->


 <div class="navbar-collapse " id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav navbar-right " >
        <li><a href="index.php" class="page-scroll nav-item nav-link active">Inicio</a></li>
        <li><a href="estadisticas_agua/tipo_sistema.php" class="page-scroll">Estadísticas</a></li>
        <li><a href="mod_consultas/"  class="page-scroll">Consulta de Fichas</a></li>
        
        
        <?php
            //En el if va la variable con la que identificas si estan logueados
            if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"]))
            {
              $perfil=$_SESSION["perfil"];
              if ($perfil=="SuperAdmin")
              {
                ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola <?php echo $_SESSION["usuario"]; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Agregar Usuario</a></li>
            <li><a href="#">Agregar Cantón</a></li>
            <li><a href="#">Agregar Parroquia</a></li>
            <li><a href="#">Agregar Sistema</a></li>
            <li class="divider"></li>
            <li><a href="salir.php">Cerrar Sesión</a></li>
          </ul>
        </li>

        <?php
              }
              else{
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola <?php echo $_SESSION["usuario"]; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li><a href="estadisticas_agua/Agregar.php">Agregar Registro</a></li>
                    <li class="divider"></li>
                    <li><a href="salir.php">Cerrar Sesión</a></li>
                  </ul>
                </li>
        <?php
            //Acción que se ejecutaria en caso de que no estes logueado
            }
          }
            else{
        ?>
          <li><a href="inicioSesion.php" class="page-scroll">Iniciar Sesión</a></li>
        </div>
        <?php
            }

        ?>
    </div>
      </ul>
        <br class="clear" />
    </div>
  </div>
</nav>

 
  

  
  
   <!-- Sobre Nosotros  ================================================== --> 
   <br>
   <br>
   <br>
   <br>
    <div id="portfolio">
    <div class="section-title text-center center">
    <div class="overlay">
      <h2>Conoce sobre CaliAgua</h2>
      <hr>
      <p>Los Gobiernos Autónomos Descentralizados Municipales, como las Juntas Administradoras de Agua Potable y Saneamiento, puedan a través de la Plataforma CALIAGUA reportar a la ciudadanía en general, los resultados de los análisis de la calidad de agua que están entregando a las poblaciones atendidas, expresados en  datos y estadísticas, lo que implica un permanente esfuerzo y compromiso para la mejora continua de la prestación del servicio.</p>
    </div>
  </div>
    </div>

    
   
    

  
<!-- Galeria ================================================== -->
<div id="portfolio">
  <div class="container">
    <div class="row">
      <div class="categories">
          <h2>Galería de las Juntas de Agua</h2>
      <br>
        <ul class="cat">
          <li>
            <ol class="type">
                <li><a href="#" data-filter="*" class="active">Todo</a></li>
                <li><a href="#" data-filter=".breakfast">Chimborazo</a></li>
                <li><a href="#" data-filter=".coto">Cotopaxi</a></li>
                <li><a href="#" data-filter=".lunch">Tungurahua</a></li>
                <li><a href="#" data-filter=".dinner">Pastaza</a></li>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/01-large.jpg" title="Junta ADM Agua Potable Cebadas" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Junta ADM Agua Potable Cebadas</h4>
              </div>
              <img src="img/portfolio/01-small.jpg" class="img-responsive" alt="Chimborazo"> </a> </div>
          </div>
        </div>
          
        <div class="col-sm-6 col-md-4 col-lg-4 coto">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/21-large.jpg" title="Laboratorio Saquisilí" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratorio Saquisilí</h4>
              </div>
              <img src="img/portfolio/21-small.jpg" class="img-responsive" alt="Cotopaxi"> </a> </div>
          </div>
        </div>  
         
             
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/06-large.png" title="Laboratorio Ambato" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratorio Ambato</h4>
              </div>
              <img src="img/portfolio/06-small.png" class="img-responsive" alt="Tungurahua"> </a> </div>
          </div>
        </div>  
         
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Laboratorio Cevallos" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratorio Cevallos</h4>
              </div>
              <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Tungurahua"> </a> </div>
          </div>
        </div>  
          
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/02-large.jpg" title="Planta de tratamiento San Vicente" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Planta de tratamiento San Vicente</h4>
              </div>
              <img src="img/portfolio/02-small.jpg" class="img-responsive" alt="Pastaza"> </a> </div>
          </div>
        </div>
          
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/03-large.jpg" title="Junta San Martín de Veranillo" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Tanque de Reserva para el Sistema de Agua Potable - El Libertador"</h4>
              </div>
              <img src="img/portfolio/03-small.jpg" class="img-responsive" alt="Chimborazo"> </a> </div>
          </div>
        </div>
          
        <div class="col-sm-6 col-md-4 col-lg-4 coto">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/23-large.jpg" title="Laboratorio Latacunga" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratiorio Latacunga</h4>
              </div>
              <img src="img/portfolio/23-small.jpg" class="img-responsive" alt="Cotopaxi"> </a> </div>
          </div>
        </div>  
    
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/10-large.jpg" title="Planta de Tratamientos de Agua Potable - Yanahurco" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Planta de Tratamientos de Agua Potable - Yanahurco</h4>
              </div>
              <img src="img/portfolio/10-small.jpg" class="img-responsive" alt="Tungurahua"> </a> </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Empresa Pública Municipal de Agua Potable y Alcantarillado de Pastaza" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Empresa Pública Municipal de Agua Potable y Alcantarillado de Pastaza</h4>
              </div>
              <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Pastaza"> </a> </div>
          </div>
        </div>  
          
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/04-large.jpg" title="Pozo de Abastecimiento para el sistema de Agua Potable" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Pozo de Abastecimiento para el sistema de Agua Potable - Junta San martín de Veranillo</h4>
              </div>
              <img src="img/portfolio/04-small.jpg" class="img-responsive" alt="Chimborazo"> </a> </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/09-large.jpg" title="Laboratorio Pastaza" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratorio Pastaza</h4>
              </div>
              <img src="img/portfolio/09-small.jpg" class="img-responsive" alt="Pastaza"> </a> </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-4 coto">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Laboratorio Saquisilí" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laboratorio Saquisilí</h4>
              </div>
              <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Cotopaxi"> </a> </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>
</div>

   <!-- footer  ================================================== --> 
    <div id="footer">
    <div class="section-title2 text-center center">
    <div class="overlay">
     
    <div class="container text-center">
      
    <div class="col-md-4">
      <h3>Acerca de</h3>
      <div class="contact-item">
        <ul>
          <li><a href="contacto.php">Haga click aquí para conocer más acerca de Caliagua</a></li>
        </ul>
      </div>
    </div>

    <div class="col-md-4">
      <h3>Horarios de atención</h3>
      <div class="contact-item">
        <p>Lunes - Viernes: 8:00 AM - 5:00 PM</p>
      </div>
    </div>
    
        <div class="col-md-4">
      <h3>Dirección</h3>
      <div class="contact-item">
        <p>Av. Chile Nro 1051 y Bernardo Daquea. </p>
        <p>Frente a la puerta de Emergencia del Hospital Policlínico</p>
          
        <div class="social">
        <ul>
          <li><a href="https://www.facebook.com/people/Direcci%C3%B3n-Zonal-3-MAATE-Chimborazo-Tungurahua-Cotopaxi-Pastaza/100068235377823/"><i class="fa fa-facebook"> </i></a> </li>
        </ul>
      </div>
      </div>
    </div>
        
        
    <div class="col-md-4">
      <h3>Información de Contacto</h3>
      <div class="contact-item">
        <p>Teléfono: (03) 296-0623</p>
      </div>
    </div>   
  </div>
    </div>
  </div>
    </div>
<!--Scripts -->
    
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script>   
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script>   
<script type="text/javascript" src="js/jquery.isotope.js"></script>  
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>  
<script type="text/javascript" src="js/main.js"></script>

</body>
    <?php include("pie/footer.php"); ?>
</html>