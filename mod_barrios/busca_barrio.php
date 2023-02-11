<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../class.login.php';
if ($_SESSION["usuario"] and $_SESSION["perfil"]){
    @require_once "../conexion/Conexion.php";
    $mysqli=Conexion::con();
    $sql = "select codbarrio,nombrebarrio,nombreparroquia,nombrecanton,nom_provincia
            from barrios
            inner join parroquias
            on barrios.codparroquia = parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton = cantones.codcanton
			inner join provincias
			on cantones.cod_provincia = provincias.cod_provincia
            order by nombrebarrio asc";
    $result = $mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscar</title>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
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
                        "sLengthMenu": "Ver _MENU_ registros",
                        "sInfo": "Resultados _START_ - _END_ de _TOTAL_ registros",
                        "sSearch":"Buscar: ",
                        "sInfoFiltered":"(Filtrado de _MAX_ registros)",
                        "oPaginate":{
                        "sFirst": "Primero",
                        "sLast":"Ãšltimo",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sZeroRecords": "NO EXISTEN RESULTADOS"
                    }
                });
            });
</script>
</head>
<style type="text/css">
body{
	font-size:14px;
}
</style>
    <body>
<div>
    <h2 style="text-align: center;">LISTA DE BARRIOS ACTUALMENTE REGISTRADOS</h2>
            <table class="display" id="datatables" with="100%">
                <thead>
                    <tr>
                    	<th>Provincia</th>
                        <th>Canton</th>
                        <th>Parroquia</th>
                        <th>Barrio/Comunidad</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($row = $result->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $row['nom_provincia']?></td>
                        <td><?php echo $row['nombrecanton']?></td>
                        <td><?php echo $row['nombreparroquia']?></td>
                        <td><?php echo $row['nombrebarrio']?></td>
                        <td><a href="javascript:void(0);" onClick="window.location='cambiar.php?id=<?php echo $row['codbarrio']; ?>';" title="EDITAR REGISTRO">
                                <img src="../imagen/operaciones/edit.png" width="16" height="16" alt="editar" border="0" />
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        if (isset($_GET) and $_GET["error"] == 1){
            echo '<script type="text/javascript">
                     	alert("INGRESA UN PARÃ�METRO DE BÃšSQUEDA.");
                  </script>';
        }
        if (isset($_GET) and $_GET["msg"] == 2){
            echo '<script type="text/javascript">
                     	alert("EL NOMBRE DEL BARRIO A SIDO CAMBIADO.");
                  </script>';
        }
        ?>
</body>
</html>
<?php
}else{
    header("Location: ../administracion.php?error=2");
}
?>