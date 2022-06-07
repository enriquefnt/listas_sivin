<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI"){

?>


<form action="parte_internado.php" method="post" >
   <select name="AOP" required="required" id="AOPe">
    <option value=0>Seleccione AOP</option>



<?php
$aop = [];
  foreach ($result as $aop) {
 echo '<option value=' .  $aop['Ao_Id'].'>' . $aop['Ao_Nom'] .'</option>';
  }
?>
</select>

<input type="date" name="dia"   >
<input type="submit" value="Seleccionar">
</form>
<?php
 } 


 else { ?>

<form action="parte_internado.php" method="post" >

<select hidden name="AOP" required="required" id="AOPe">
    <option value=<?= $_SESSION['AOPe'] ?>></option>
</select>

<input type="date" name="dia" >
<input type="submit" value="Seleccionar Fecha">
</form>  


<?php } ?>

<br>

<?php 

  
  if ( isset($cuenta) && $cuenta > 0) { ?>

<div class="w3-responsive">
  <button  onclick="ExportToExcel('xlsx')">
   <i class="fas fa-download"></i>
   Descargar xlsx
</button>
  <table class="w3-table-all w3-tiny" id="tbl_exporttable_to_xls">

        <tbody>
  <thead>
  <tr class="w3-blue-grey">
    <th>Nombre</th>
    <th>Domicilio</th>
    <th>Ingreso</th>
    <th>Motivo</th>
    <th>Egreso</th>
    <th>Estado</th>    
  </tr>
  </thead>

  <tbody>

<?php 


 }
?>






  <?php 

  
  if ( isset($cuenta) && $cuenta > 0) {

  foreach ($internados as $internado): ?>
  <tr class="w3-hover-pale-green">
    <td><?= htmlspecialchars($internado['ApeNom'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($internado['Domicilio'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($internado['Ingreso'], ENT_QUOTES, 'UTF-8'); ?></td>
     <td><?= htmlspecialchars($internado['Motivo'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($internado['Alta'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?= htmlspecialchars($internado['Estado'], ENT_QUOTES, 'UTF-8'); ?></td>
    </td>
   </tr>

  <?php 
   
  endforeach; } 
  
    ?>

<?php 

if (isset($_POST['dia']) && isset($cuenta) && $cuenta > 0) { ?>

  <h5><?='Sala: '.$internado['Sala']. ' &nbsp;&nbsp;&nbsp;&nbsp; Fecha: ' .$internado['Fecha'] . ' &nbsp;&nbsp;&nbsp;&nbsp; Total internados: '. $cuenta ; ?></h5>

<?php 

}  else if(isset($_POST['dia'])) { 
$date=date_create($_POST['dia']);

  ?>
 <h5><?='Sin Internados el día ' . date_format($date,"d/m/Y") . ' en el Area Operativa n° '. $_POST['AOP']; ?></h5>
<?php 
 


}  
?>

</tbody>  
</table> 
 <script type="text/javascript" src="descarga.js"></script>  
</div>





