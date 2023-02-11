<?php
require_once '../class.login.php';
if ($_SESSION["usuario"] and $_SESSION["perfil"]){
    @require_once "../conexion/Conexion.php";
    $mysqli=Conexion::con();
    $sql = "select codsistema,nombresistema,nombrebarrio,nombreparroquia,nombrecanton,nom_provincia
            from sistemas
            inner join barrios
            on sistemas.codbarrio = barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia = parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton = cantones.codcanton
			inner join provincias
			on cantones.cod_provincia = provincias.cod_provincia";
    $result = $mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscar sistemas</title>
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
                        "sLast":"Último",
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
    <h2 style="text-align: center;">LISTA DE SISTEMAS ACTUALMENTE REGISTRADOS</h2>
            <table class="display" id="datatables" with="100%">
                <thead>
                    <tr>
					
						<th>PROVINCIA</th>
                        <th>CANT&Oacute;N</th>
                        <th>PARROQUIA</th>
                        <th>BARRIO</th>
                        <th>SISTEMA</th>
                        <th>INF. B&Aacute;SICA</th>
                        <th>INF. T&Eacute;CNICA</th>
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
                        <td><?php echo $row['nombresistema']?></td>
                        <th><a href="javascript:void(0);" onClick="window.location='cambiar_basicos.php?id=<?php echo $row['codsistema']; ?>';" title="EDITAR REGISTRO">
                                <img src="../imagen/operaciones/edit.png" width="16" height="16" alt="editar" border="0" />
                            </a>
                        </th>
                        <th><a href="javascript:void(0);" onClick="window.location='cambiar_tecnicos.php?id=<?php echo $row['codsistema']; ?>';" title="EDITAR REGISTRO">
                                <img src="../imagen/operaciones/edit.png" width="16" height="16" alt="editar" border="0" />
                            </a>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>
</html>
<?php
}else{
    header("Location: ../administracion.php?error=2");
}
?>