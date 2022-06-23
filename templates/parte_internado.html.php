<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI"){

?>


<form action="parte_internado.php" method="get" >
   <select name="AOP" required="required" id="AOPe">
    <option value=0>Seleccione AOP</option>



<?php
$aop = [];
  foreach ($result as $aop) {
 echo '<option value=' .  $aop['Ao_Id'].'>' . $aop['Ao_Nom'] .'</option>';
  }
?>
</select>

<input type="date" name="dia"  method="get"  >
<input type="submit" value="Seleccionar Fecha">
</form>
<?php
 } 


 else { ?>

<form action="parte_internado.php" method="get" >

<select hidden name="AOP" required="required" id="AOPe">
    <option value=<?= $_SESSION['AOPe'] ?>></option>
</select>

<input type="date" name="dia" method="get">
<input type="submit" value="Seleccionar Fecha">
</form>  


<?php } ?>

<br>

<?php 

  
  if ( isset($cuenta) && $cuenta > 0) { ?>

<div class="w3-responsive">
 
  <table class="w3-table-all w3-tiny" id="example">

       
  <thead>
  <tr class="w3-blue-grey">
    <th>Nombre</th>
    <th>Domicilio</th>
    <th>Ingreso</th>
    <th>Motivo</th>
    <th>Egreso</th>
    <th>Estado</th>    
    <th>Evolución</th>
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
    <td align="center">

        <div>
        <form action="controles.php" method="post">
        <input type="hidden" name="IdNiño" value=<?= htmlspecialchars($internado['IdNiño'], ENT_QUOTES, 'UTF-8'); ?>>
                        <button class="btn btn-default" type="submit"><i class="far fa-eye  fa-lg"></i></button>
        </form>
        </div>
  </td>
   </tr>

  <?php 
   
  endforeach; } 
  
    ?>

<?php 

if (isset($_GET['dia']) && isset($cuenta) && $cuenta > 0) { ?>

  <h5><?='Sala: '.$internado['Sala']. ' &nbsp;&nbsp;&nbsp;&nbsp; Fecha: ' .$internado['Fecha'] . ' &nbsp;&nbsp;&nbsp;&nbsp; Total internados: '. $cuenta ; ?></h5>

<?php 

}  else if(isset($_GET['dia'])) { 
$date=date_create($_GET['dia']);

  ?>
 <h5><?='Sin Internados el día ' . date_format($date,"d/m/Y") . ' en el Area Operativa n° '. $_GET['AOP']; ?></h5>
<?php 
 


}  
?>

</tbody>  
</table> 
 
</div>





