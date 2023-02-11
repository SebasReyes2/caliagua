<?php 
if ($resultados){
?>
<h3><strong>Sistema:</strong> <?php echo $nombre[0]["nombresistema"] ?><br />
    <strong>LISTA DE DATOS TÉCNICOS REGISTRADOS</strong>
</h3>
<table class="display" id="datatables" with="100%">
<thead>
<tr>
    <!--<th width="18" style="text-align:center;">N&deg;</th>-->
  <th width="166" style="text-align:center;">ID DE REGISTRO</th>
  <th width="214" style="text-align:center;">NÚMERO DE REGISTRO</th>
  <th width="113" style="text-align:center;">FECHA</th> 
  <th width="92" style="text-align:center;">FICHA</th>
  <!--<th style="text-align:center;">PDF</th>-->
</tr>
</thead>
<tbody>
 
  <tr>
  	<th style="text-align:center;"><?php echo $id; ?></th>
    <td  style="text-align:center;"><?php echo $resultados[0]["codigo"]; ?></td>
    <!-- <td  style="text-align:center;"><?php echo $resultados[0]["faforo"]; ?> </td> -->
   <td  style="text-align:center;"> <?php echo $resultados[0]["faforo"]?></td> 
    <td  style="text-align:center;">
    <a href="javascript:void(0);" onClick="window.location='reportedt.php?codigo=<?php echo $resultados[0]["codsistema"]; ?>';">
        <img src="../imagen/Clipboard.png" width="20" height="20" alt="Clipboard" title="VER FICHA"/>
    </a>
    </td>
    <!--<td  style="text-align:center;">
    <a href="javascript:void(0);" onClick="window.location='reportepdf.php?idmuestra=
	<?php echo $rows["codigo"]; ?>&canton=<?php echo $codcanton;?>';">
      <img src="../imagen/pdf.png" width="20" height="20" />
      </a>
      </td>-->
  </tr>
  
</tbody>
</table>

<?php } else 
echo "NO EXISTEN RESULTADOS...!!!"?>
