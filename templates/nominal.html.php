<?php
session_start();
?>

<body>
<?php 

if ($_SESSION['tipo'] == "SI" && empty($cuenta) ){

?>

<form action="nominal.php" method="get" id="box">
   <select name="AOP" required="required" id="AOPe">
    <option value=0>Seleccione AOP</option>

<?php
$aop = [];
  foreach ($result as $aop) {
 echo '<option value=' .  $aop['Ao_Id'].'>' . $aop['Ao_Nom'] .'</option>';
  }
?>
</select>
<button type="submit" id="btn" >Selecccionar</button>
</form>
<?php
 } 
 else if (empty($cuenta)) {$aop = [$_SESSION['AOPe'],$_SESSION['nomAOPe']];

  ?>

<div style="padding: 2px ;margin: 1px;">

<form action="nominal.php" method="get" >
<input type="hidden" id="AOPe" name="AOP" value=<?=$_SESSION['AOPe'];?>>


<button type="submit" >Listar Nominales de  <?=$_SESSION['nomAOPe'] ;?></button>
</form>

</div>


 <?php } ?>

<br>
<?php 

  
  if ( isset($cuenta) && $cuenta > 0) { ?>
  
  <div>
  <table id="example" class="w3-table-all w3-tiny" > 
      
   
  <thead >
  <tr class="w3-blue-grey">
    <th class="nosort">Último registro </th>
    <th>Nombre</th>
    <th>Edad (Último control)</th>
    <th>Edad (Hoy)</th>
    <th>Responsable</th>
   <th>Domicilio</th>
    <th>Tipo</th>
    <th>Motivo de notificación</th>
    <th>Z Peso/edad</th>
    <th>Z Talla/edad</th>
    <th>Z IMC/edad</th>
    <th>Ver Evolución</th>
    <th>Clasificación</th>
    <th>Control Médico</th>
    <th>Días sin registros</th>
    <th>Vigilante</th>
    <th>Demora en notificar (Días)</th>
  </tr>
  </thead>
  <tbody class="table-hover">
  <?php  }  ?>




  <?php 

  if(isset($casos)){
  foreach ($casos as $caso): ?>
  <tr >
    <td ><?= htmlspecialchars($caso['Fecha'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['años'] .'A ' . $caso['meses'] .'M ' . $caso['dias'] .'D ', ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['añosr'] .'A ' . $caso['mesesr'] .'M ' . $caso['diasr'] .'D ', ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Responsable'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Domicilio'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['MotNom'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['ZPesoEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center" ><?= htmlspecialchars($caso['ZTallaEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['ZIMCEdad'], ENT_QUOTES, 'UTF-8'); ?></td>



 <td align="center">

        <div>
        <form action="controles.php" method="post">
        <input type="hidden" name="IdNiño" value=<?= htmlspecialchars($caso['IdNiño'], ENT_QUOTES, 'UTF-8'); ?>>
                        <button class="btn btn-default" type="submit"><i class="far fa-eye  fa-lg"></i></button>
        </form>
        </div>
  </td>

   <td><?= htmlspecialchars($caso['Clacificación'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['Medico'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center" style= "background-color: #<?= htmlspecialchars($caso['color'], ENT_QUOTES, 'UTF-8'); ?>">
          <?= htmlspecialchars($caso['dias_transcurridos'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['vigilante'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td align="center"><?= htmlspecialchars($caso['retraso'], ENT_QUOTES, 'UTF-8'); ?></td>
   
   </tr>
  <?php endforeach;
    } 
  

if(isset($casos)){ ?>

  <h6><?='Area Operativa: '. $caso['AOP'].  ' al día ' . date("d-m-Y ") .' - Total notificados: '. $cuenta; ?></h6>
 <?php } ?>
  </tbody>
         
    </table>
</div>




