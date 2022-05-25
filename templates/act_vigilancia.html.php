
<?php
session_start();
?>

<?php 

if ($_SESSION['tipo'] == "SI"){

?>


<form action="act_vigilancia.php" method="post" >
   <select name="AOP" required="required" id="AOPe">
    <option value=0>Seleccione AOP</option>

<?php
$aop = [];
  foreach ($result as $aop) {
 echo '<option value=' .  $aop['Ao_Id'].'>' . $aop['Ao_Nom'] .'</option>';
  }
?>
</select>

<input type="number" name="anio" value="2022"  step="1" min="2016" max="2023">
<input type="submit" value="Seleccionar Area y Año">
</form>
<?php
 } 


 else { ?>

<form action="act_vigilancia.php" method="post" >

<select hidden name="AOP" required="required" id="AOPe">
    <option value=<?= $_SESSION['AOPe'] ?>></option>
</select>

<input type="number" name="anio" value="2022" step="1" min="2016" max="2023">
<input type="submit" value="Seleccionar Año">
</form>  


<?php } ?>

<br>

<?php 

  
  if ( isset($cuenta) && $cuenta > 0) { ?>


  <div class="w3-responsive">

        
      <table class="w3-table-all w3-tiny" id="tbl_exporttable_to_xls">
        
        <tbody>
  <thead>
  <tr>
    <th>Area Operativa</th>
    <th>Nombre</th>
    <th>Mes</th>
    
    <th>Notificaciones</th>
    <th>Controles</th>
    <th>Egresos</th>
    <th>Total</th>
  </tr>
  </thead>
  <tbody>
  
 
    
  
  <?php foreach ($vigilantes as $vigilante): ?>
   
  <tr class="w3-hover-pale-green" >
    <td><?= htmlspecialchars($vigilante['Ao_Nom'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($vigilante['Nombre'], ENT_QUOTES, 'UTF-8'); ?>
    <td><?= htmlspecialchars($vigilante['mes'], ENT_QUOTES, 'UTF-8'); ?></td>
    
    <td align="center"><?= htmlspecialchars($vigilante['Notificaciones'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?= htmlspecialchars($vigilante['Controles'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?= htmlspecialchars($vigilante['Altas'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td align="center"><?= htmlspecialchars($vigilante['Total'], ENT_QUOTES, 'UTF-8'); ?></td>
        
   </tr>
  
  <?php endforeach; ?>
  <div></div>
  <h4><?='Período: '. $_POST['anio'] .' -  AOP: '.$vigilante['Ao_Nom'] .' -  Al día: ' . date("d-m-Y "); ?></h4>
  </div>
  <button  onclick="ExportToExcel('xlsx')">
   <i class="fas fa-download"></i>
   Descargar xlsx
</button>

 

  </tbody>
</table >
      
  
</div>
  </main>
<script type="text/javascript" src="descarga.js"></script> 

<?php } 

else if(isset($_POST['AOP'])) { ?>
<div>
  <h4><?='Sin actividad en el Período: '. $_POST['anio'] .' -  AOP: '.$_POST['AOP'] .' -  Al día: ' . date("d-m-Y "); ?></h4>

</div>

<?php } ?>


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="mergeTable.js"></script>
    <script>
        $('#tbl_exporttable_to_xls').margetable({
            colindex:[{
               index:0
          },{
             index:1,
              dependent:[0]
          },{
              index:2,
             dependent:[0,1]
          }]
       });
        $('#textTable').margetable({
            type: 2,
            colindex: [0, 1, 3]
        });
    </script>
</body>

</html>