<?php
session_start();
if (isset($_POST['OK'])) 
{
    
}
error_reporting(E_ALL ^ E_NOTICE);

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
    
    
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<!-- LOGIN -->
      
 
<div class="container">
    <div class="login-box">
        
    
        <img src="img/logo_caliagua.png" class="ava" alt="Logo" class="img-responsive">
                <form id="formuser" name="user" method="post" action="login.php">
               
        <div class="form">
            
            
            <h1>Login</h1>
            <div class="grupo">
                <input name="login" type="text" id="" required> <span class="barra"></span>
                <label>Usuario</label>
            </div> 
            
            <div class="grupo">
                <input name="passwd" type="password" id="" required>
                <span class="barra"></span>
                <label>Contraseña</label>
            </div>
                  
            <button type="submit" name="OK" class="submit" id="OK">Iniciar Sesión</button>             
       	  
       </div>
    </form>
 
    </div>  
</div> 

</html>