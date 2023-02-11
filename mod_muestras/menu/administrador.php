<ul id="menu1">
  		<li>
            <a href="../administracion.php">
            <img src="../imagen/home.png" width="16" height="16"/>&nbsp;
            Inicio
            </a>
        </li>
        <li>
        	 <a href="registrar_muestra.php">
            <img src="../imagen/operaciones/reg.png" width="16" height="16" />&nbsp;
            Registrar ficha </a>
        </li>
        <li>
        	 <a href="formato_ficha.php">
            <img src="../imagen/Clipboard.png" width="16" height="16" />&nbsp;
            Formato ficha </a>
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