<?php
if (empty($_SESSION['name']))
{session_start();}



?>
	
	<div class="w3-responsive">
			<table id="example" class="w3-table-all w3-tiny"  >
				
	<thead>
  <tr class="w3-blue-grey">
  	<th>Fecha</th>
    <th>Nombre</th>
    <th>Edad </th>

    <?php if ($_SESSION['Tipo']="SI") { ?>
    <th>Area</th>
    <?php  } ?>
    <th>Clasificacion X Antropometría</th>
    <th>Observacion</th>
    
    <th>Ver Evolución</th>
    
  </tr>
  </thead>
  <tbody>
  <?php if (isset($error)): ?>

			<p>
				<?php echo $error; ?>
			</p>

		<?php else: ?>
		
			
	<?php foreach ($casos as $caso): ?>
  <tr class="w3-hover-pale-green">
    <td><?= htmlspecialchars($caso['Fecha'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?=  htmlspecialchars($caso['Nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td ><?= htmlspecialchars($caso['años'] .'A ' . $caso['meses'] .'M ' . $caso['dias'] .'D ', ENT_QUOTES, 'UTF-8'); ?></td>
    
     <?php if ($_SESSION['Tipo']="SI") { ?>
    <td><?= htmlspecialchars($caso['AOP'], ENT_QUOTES, 'UTF-8'); ?></td>
    <?php  } ?>
    <td><?=  htmlspecialchars($caso['Clacificación'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?=  htmlspecialchars($caso['OBS1'], ENT_QUOTES, 'UTF-8'); ?></td>

    <td align="center">

        <div>
        <form action="controles.php" method="post">
        <input type="hidden" name="IdNiño" value=<?= htmlspecialchars($caso['IdNiño'], ENT_QUOTES, 'UTF-8'); ?>>
                        <button class="btn btn-default" type="submit"><i class="far fa-eye  fa-lg"></i></button>
        </form>
        </div>
    </td>
        
  </tr>
  <?php endforeach; ?>
  <?php if(isset($casos)){ ?>
  <h5><?= 'Notificaciones y controles de casos que se encuentran en MCDA y se les administró ATLU al día ' . date("d-m-Y ") .' - Total de casos: '. $cuenta .'' ;?> </h5> 	
<?php } ?>
  </tbody>
</table>
			
	<?php endif; ?>
</div>
