<?php
require "../conexion/Conexion.php";
$mysqli=Conexion::con();
$sql[] = array();
$sql = "select nombrebarrio from barrios where codbarrio = '".$_GET["id"]."'";
$consulta = $mysqli->query($sql);
while($nonb = $consulta->fetch_assoc()){ ?>
<link href="../css/formularios.css" rel="stylesheet" type="text/css" />
<input name="nombre" type="text" size="30" value="<?php echo $nonb["nombrebarrio"]; ?>"/>
<?php
}
$consulta->free();
$mysqli->close();
?>
