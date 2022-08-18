<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI" && !isset($_GET['desde'])){

?>


<form action="periodo_internados.php" method="get" >
   <select name="AOP" required="required" id="AOPe">
    <option value=0>Seleccione AOP</option>



<?php
$aop = [];
  foreach ($result as $aop) {
 echo '<option value=' .  $aop['Ao_Id'].'>' . $aop['Ao_Nom'] .'</option>';
  }
?>
</select>

<input  type="text" name="desde" placeholder="Desde"
                    onfocus="(this.type='date')">


<input  type="text" name="hasta" placeholder="Hasta"
                    onfocus="(this.type='date')">

<input type="submit" value="Ver">
</form>
<?php
 } 


 else if(!isset($_GET['desde'])){ ?>

<form action="periodo_internados.php" method="get" >

<select hidden name="AOP" required="required" id="AOPe">
    <option value=<?= $_SESSION['AOPe'] ?>></option>
</select>

<input  type="text" name="desde" placeholder="Desde"
                    onfocus="(this.type='date')">


<input  type="text" name="hasta" placeholder="Hasta"
                    onfocus="(this.type='date')">

<input type="submit" value="Ver">
</form>  




<?php } ?>

<?php 

  
 if ( isset($cuenta) && $cuenta > 0) { ?>

<div class="w3-responsive">
 
  <table class="w3-table-all w3-tiny" id="example">

       
  <thead>
  <tr class="w3-blue-grey">
    <th>Nombre</th>
    <th>Domicilio</th>
    <th>Ingreso</th>
    <th>Motivo Ingreso</th>
    <th>Egreso</th>
    <th>Motivo Egreso</th>
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
    <td><?= htmlspecialchars($internado['MotivoAlta'], ENT_QUOTES, 'UTF-8'); ?></
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
if (isset($_GET['desde']) && isset($cuenta) && $cuenta > 0) {
$dated=date_create($_GET['desde']);
$dateh=date_create($_GET['hasta']);

 ?>

  <h6><?='Sala: '.$internado['Sala']. ' &nbsp;&nbsp;&nbsp;&nbsp; Del: '.date_format($dated,"d/m/Y").' hasta el '.date_format($dateh,"d/m/Y").' &nbsp;&nbsp;&nbsp; Total internados: '. $cuenta ; ?></h6>

<?php 

}  else if(isset($_GET['desde'])) { 

$dated=date_create($_GET['desde']);
$dateh=date_create($_GET['hasta']);
  ?>
 <h5><?='Sin Internados desde el día ' . date_format($dated,"d/m/Y") . ' hasta el día el día ' . date_format($dateh,"d/m/Y") . ' en el Area Operativa n° '. $_GET['AOP']; ?></h5>
<?php 
 


}  
?>

</tbody>  
</table> 
<div>
 <button type="button"   onClick="history.back();">Volver</button>
</div>
</div>


