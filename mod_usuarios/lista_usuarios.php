<?php 
error_reporting(E_ALL ^ E_NOTICE);
include_once "../class.login.php";
if (isset($_SESSION["usuario"]) and isset($_SESSION["perfil"])
        and $_SESSION["perfil"]=="administrador"){
include_once("../clases/Usuario.php");
include_once ("../funciones/tildes.php");
$users = new Usuario();
$reg=$users->lista_usuarios();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/alertas/alertify.default.css" type="text/css"></link>
<link rel="stylesheet" href="../css/alertas/alertify.core.css" type="text/css"></link>
<script type="text/javascript" language="javascript" src="../js/alertas/alertify.js"></script>
<script language="javascript" type="text/javascript" src="../js/funciones.js"></script>
<title>Lista de usuarios</title>
</head>
<body>
    <table width="670" border="0">
    <thead style="font-size:14px;">
    <tr><th colspan="10" style="text-align:center;">LISTA DE USUARIOS DEL SISTEMA</th></tr>
    <tr>
    <th width="107" style="text-align:center;">USUARIO</th>
    <th width="81" style="text-align:center;">PERFIL</th>
    <th width="115" style="text-align:center;">CANTÓN</th>
    <th width="133" style="text-align:center;">EDITAR</th.0>
    <th width="70" style="text-align:center;">ELIMINAR</th>
    </tr>
    </thead>
    <tbody>
<?php
for ($i=0;$i<count($reg);$i++)
{
?>
<tr id="<?php echo "ide_$i";?>" onMouseMove="cambiar('<?php echo "ide_$i";?>','#a1cbe2');" onMouseOut="cambiar('<?php echo "ide_$i";?>','#F2F6F6');">
<td>
<?php echo $reg[$i]["nombreuser"];?>
</td>
<td>
<?php echo $reg[$i]["perfil"]?>
</td>
<td><?php echo $reg[$i]["codcanton"];?></td>
<td style="text-align:center;">
<a href="javascript:void(0);" onClick="window.location='editar.php?id=<?php echo $reg[$i]["coduser"];?>';" title="CAMBIAR NOMBRE DE USUARIO Y CONTRASEÑA"><img src="../imagen/operaciones/edit.png" border="0"></a>
</td>
<td style="text-align:center;">
<a href="javascript:void(0);" onClick="window.location='eliminar.php?id=<?php echo $reg[$i]["coduser"];?>';" title="Eliminar Registro"><img src="../imagen/eliminar.png" border="0"></a>
</td>

</tr>
<?php
}
?>
</tbody>
<tfoot>
<tr><th colspan="5">Actualmente <?php echo count($reg); ?> usuarios</th></tr>
</tfoot>
</table>
<?php 
if (isset($_GET) and $_GET["error"]==1) {
	echo '<script type="text/javascript">
                alert("SELECCIONE UN USUARIO PARA ELIMINAR O ACTUALIZAR");
          </script>';
}
if (isset($_GET) and $_GET["msg"]==2) {
	echo '<script type="text/javascript">
                alert("USUARIO ELIMINADO CORRECTAMENTE");
          </script>';
}	
if (isset($_GET) and $_GET["msg"]==3){
	echo '<script type="text/javascript">
                alert("INFORMACIÓN ACTUALIZADA CORRECTAMENTE");
          </script>';
}

?>
    </body>
</html>
<?php
}else{
    header("Location: ../index.php?error=2");
}
?>