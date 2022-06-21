<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI"){

setlocale(LC_TIME, 'spanish.UTF-8');

?>


<form action="resu_mes.php" method="get" id="box" >
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
<button type="submit" id="btn" value="Indicar primer día del mes"></button>
</form>
<?php
 } 


 else { ?>

<form action="resu_mes.php" method="get"  >

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
  
  <table class="w3-table-all w3-tiny" id="example">

       
  <thead>
  <tr class="w3-blue-grey">
  	<th>Día</th>
    <th>Ingresos</th>
    <th>Altas</th>
    <th>Internados</th>
    <th>Parte diario</th>
   </tr>
  </thead>

  <tbody>

<?php 


 }
?>






  <?php 

  setlocale(LC_TIME, 'spanish.UTF-8');
  if ( isset($total_dias) && $total_dias > 0) {
 $totalAlta=0;
 $totalIngresos=0;
 $total_pac_cama=0;

  foreach ($dias_mes as $el_dia): 

$totalAlta=$totalAlta+$el_dia['Altas'];
$totalIngresos=$totalIngresos+$el_dia['Ingresos'];
$total_pac_cama=$total_pac_cama+$el_dia['Internados'];
  	?>
  <tr class="w3-hover-pale-green">

   
  	<td><?= strftime("%a %d",strtotime($el_dia['Dia'])); ?></td>
    <td><?= htmlspecialchars($el_dia['Ingresos'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($el_dia['Altas'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($el_dia['Internados'], ENT_QUOTES, 'UTF-8'); ?></td>

<td align="center">

        <div>
        <form action="parte_internado.php" method="get">
        <input type="hidden" name="IdNiño" value=<?= htmlspecialchars($el_dia['Dia'], ENT_QUOTES, 'UTF-8'); ?>>
                        <button class="btn btn-default" type="submit"><i class="far fa-eye  fa-lg"></i></button>
        </form>
        </div>
  </td>
     
   </tr>

  <?php 
   
  endforeach; 

} 
  
    ?>

<?php 

if (isset($_GET['dia']) && isset($total_dias) && $total_dias > 0) { 
setlocale(LC_TIME, 'spanish.UTF-8');
$date=date_create($_GET['dia'])
	?>

  <h5><?=  ' &nbsp;&nbsp;&nbsp;&nbsp; Total dias del mes: '. $total_dias . ' &nbsp;&nbsp;&nbsp;&nbsp; Mes: ' . strftime("%B, %G",strtotime($_GET['dia']))
. ' &nbsp;&nbsp;Altas: '  .$totalAlta 
.' &nbsp;&nbsp;Ingresos: '  .$totalIngresos
. '&nbsp;&nbsp;Total Pacientes-cama: '.  $total_pac_cama;


   ?></h5>

<?php 

}  else if(isset($_POST['dia'])) { 


  ?>
 <h5><?='Sin Internados el mes ' . date_format($date,"m/Y") . ' en el Area Operativa n° '. $_GET['AOP']; ?></h5>
<?php 
 


}  
?>

</tbody>  
</table> 
 <script type="text/javascript" src="descarga.js"></script>  
</div>





