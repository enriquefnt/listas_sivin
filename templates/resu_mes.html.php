<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI"){

setlocale(LC_TIME, 'spanish.UTF-8');
$date = "2017-03-25"; //es el campo que viene de MySQl aaaa-mm-dd
echo strftime("%A, %d de %B, %G", strtotime($date));
?>


<form action="resu_mes.php" method="post" >
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
<input type="submit" value="Indicar primer día del mes">
</form>
<?php
 } 


 else { ?>

<form action="resu_mes.php" method="post" >

<select hidden name="AOP" required="required" id="AOPe">
    <option value=<?= $_SESSION['AOPe'] ?>></option>
</select>

<input type="date" name="dia" >
<input type="submit" value="Indicar primer día del mes">
</form>  


<?php } ?>

<br>

<?php 

  
  if ( isset($total_dias) && $total_dias > 0) { ?>

<div class="w3-responsive">
  
  <table class="w3-table-all w3-tiny" >

        <tbody>
  <thead>
  <tr class="w3-blue-grey">
  	<th>Día</th>
    <th>Ingresos</th>
    <th>Altas</th>
    <th>Internados</th>
   </tr>
  </thead>

  <tbody>

<?php 


 }
?>






  <?php 

  setlocale(LC_TIME, 'spanish.UTF-8');
  if ( isset($total_dias) && $total_dias > 0) {


  foreach ($dias_mes as $el_dia): 

$dia_f=date_create($el_dia['Dia']);

  	?>
  <tr class="w3-hover-pale-green">

   
  	<td><?= strftime("%A %d",strtotime($el_dia['Dia'])); ?></td>
    <td><?= htmlspecialchars($el_dia['Ingresos'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($el_dia['Altas'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($el_dia['Internados'], ENT_QUOTES, 'UTF-8'); ?></td>
     
   </tr>

  <?php 
   
  endforeach; 

} 
  
    ?>

<?php 

if (isset($_POST['dia']) && isset($total_dias) && $total_dias > 0) { 
setlocale(LC_TIME, 'spanish.UTF-8');
$date=date_create($_POST['dia'])
	?>

  <h5><?=  ' &nbsp;&nbsp;&nbsp;&nbsp; Total dias del mes: '. $total_dias . ' &nbsp;&nbsp;&nbsp;&nbsp; Mes: ' . strftime("%B, %G",strtotime($_POST['dia'])) ?></h5>

<?php 

}  else if(isset($_POST['dia'])) { 


  ?>
 <h5><?='Sin Internados el mes ' . date_format($date,"m/Y") . ' en el Area Operativa n° '. $_POST['AOP']; ?></h5>
<?php 
 


}  
?>

</tbody>  
</table> 
 <script type="text/javascript" src="descarga.js"></script>  
</div>





