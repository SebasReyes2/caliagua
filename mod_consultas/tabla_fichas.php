<?php 
if ($mensaje){ ?>
<div class="message"><?php echo $mensaje."<br />"; ?></div>
<?php
}
?>

<?php 
if ($resultados){
?>
<br>
<h4><strong>Sistema:</strong> <?php echo $nombre[0]["nombresistema"] ?><br><br>
    <strong>LISTA DE FICHAS REGISTRADAS</strong>
</h4> <br>
<table class="display" id="datatables" with="100%">
<thead>
<tr>
  <th style="text-align:center;">N&deg;</th>
  <th style="text-align:center;">FECHA</th>
  <th style="text-align:center;">COD.LAB</th>
  <th style="text-align:center;">HORA</th>
  <th style="text-align:center;">FICHA</th>
  <!--<th style="text-align:center;">PDF</th>-->
</tr>
</thead>
<tbody>
  <?php  $i = 1; while($rows = $resultados->fetch_assoc()){ ?>
  <tr>
  	<th style="text-align:center;"><?php echo $i; ?></th>
    <td  style="text-align:center;"><?php echo $rows["fecha"]; ?></td>
    <td  style="text-align:center;"><?php echo $rows["numero"]; ?> </td>
    <td  style="text-align:center;"><?php echo $rows["hora"]?></td>
    <td  style="text-align:center;">
    <a href="javascript:void(0);" onClick="window.location='reporte.php?idmuestra=<?php echo $rows["codmuestra"]; ?>&canton=<?php echo $codcanton;?>';">
        <img src="../imagen/Clipboard.png" width="40" height="40" alt="Clipboard" title="VER FICHA"/>
    </a>
    </td>
    <!--<td  style="text-align:center;">
    <a href="javascript:void(0);" onClick="window.location='reportepdf.php?idmuestra=<?php echo $rows["codmuestra"]; ?>&canton=<?php echo $codcanton;?>';">
      <img src="../imagen/pdf.png" width="20" height="20" />
      </a>
      </td>-->
  </tr>
  <?php $i++; } ?>
</tbody>
</table>

<?php }?>

