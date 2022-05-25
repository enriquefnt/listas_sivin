
<?php
if (empty($_SESSION['name']))
{session_start();}



?>
	
	<div class="w3-responsive">
			<table class="w3-table-all w3-tiny" id="managerTable" >
				<tbody>
	<thead>
  <tr>
  	<th>Fecha</th>
    <th>Nombre</th>
    <th>Edad </th>

    <?php if ($_SESSION['Tipo']="SI") { ?>
    <th>Area</th>
    <?php  } ?>

    <th>Motivo de notificación</th>
    <th>Peso</th>
    <th>Talla</th>
    <th>Z Peso/edad</th>
    <th>Z Talla/edad</th>
    <th>Z IMC/edad</th>
    <th>Ver Evolución</th>
    <th>Clasificación</th>
    <th>Control Médico</th>
    
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
    
    <td><?= htmlspecialchars($caso['MotNom'], ENT_QUOTES, 'UTF-8'); ?></td>

    <td align="center"><?= htmlspecialchars($caso['Peso'], ENT_QUOTES, 'UTF-8'); ?></td>
	<td align="center"><?= htmlspecialchars($caso['Talla'], ENT_QUOTES, 'UTF-8'); ?></td>

    <td align="center"><?= htmlspecialchars($caso['ZPesoEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td align="center"><?= htmlspecialchars($caso['ZTallaEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
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
    
  </tr>
  <?php endforeach; ?>
  <?php if(isset($casos)){ ?>
  <h5><?= 'Listado de casos con Desnutrición Aguda según antropometría mayores de 6 meses  al día ' . date("d-m-Y ") .' - Total de casos: '. $cuenta .'' ;?> </h5> 	 <p><b>	Importante:</b> esta lista considera solo la antropometría, la evaluación de cada caso determinará el requerimiento de MCDA. Asi mismo pueden haber niños notificados que requieran MCDA y no figuren en esta lista (ej. pérdida de peso aguda sin descenso del IMC/Edad por debajo de - 2 Z).  </p>
<?php } ?>
  </tbody>
</table>
			
	<?php endif; ?>
</div>
