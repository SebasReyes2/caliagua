<?php
include_once("../conexion/Conexion.php");
?>
<?php
if (isset($_GET) and $_GET["id"]!=0) {
    $mysqli=Conexion::con();
    $sql="select tiposistema from sistemas where codsistema=".$_GET["id"]."";
    $consulta = $mysqli->query($sql);
    while ($sys=$consulta->fetch_array()){
        ?>
    <link href="../css/fichas.css" rel="stylesheet" type="text/css" />
    
    <input name="tipo" type="text"  value="<?php echo $sys["tiposistema"]; ?>" size="15" readonly="readonly" />
    	<?php
    }
    $consulta->free();
    $mysqli->close();
}else{
?>
<link href="../css/fichas.css" rel="stylesheet" type="text/css" />

<input name="tipo" type="text"  value="<?php echo $sys["tiposistema"]; ?>" size="15" readonly="readonly" />
<?php }?>