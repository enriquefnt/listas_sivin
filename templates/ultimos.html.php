<?php  

include __DIR__ . '/../include/conecta.php';
?>


	

	
	<div class="w3-responsive">
		<h5>Últimos movimientos en el sistema (30 días).</h5>
			<table id="example" class="w3-table-all w3-tiny">
				
	<thead>
  <tr class="w3-blue-grey">
  	<th>Fecha</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Area</th>
    <th>Tipo</th>
    <th>Motivo de notificación</th>
    <th>Z Peso/edad</th>
    <th>Z Talla/edad</th>
    <th>Z IMC/edad</th>
    <th>Ver Evolución</th>
    <th>Clasificación</th>
    <th>Control Médico</th>
    <th>Estado</th>
    <th>Vigilante</th>
    <th>Demora en notificar (Días)</th>
  </tr>
  </thead>
  <tbody>
  <?php if (isset($error)): ?>

			<p>
				<?php echo $error; ?>
			</p>

		<?php else: ?>
		
			<ul>
	<?php foreach ($casos as $caso): ?>
  <tr class="w3-hover-pale-green">
      <td><?= htmlspecialchars($caso['Fecha'], ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?= htmlspecialchars($caso['Nombre'], ENT_QUOTES, 'UTF-8'); ?></td>      	
  		
     <td><?= htmlspecialchars($caso['años'] .'A ' . $caso['meses'] .'M ' . $caso['dias'] .'D ', ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?= htmlspecialchars($caso['direccion'], ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?= htmlspecialchars($caso['Tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?= htmlspecialchars($caso['MotNom'], ENT_QUOTES, 'UTF-8'); ?></td>
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
      <td><?= htmlspecialchars($caso['Estado'], ENT_QUOTES, 'UTF-8'); ?></td>
      <td><?= htmlspecialchars($caso['vigilante'], ENT_QUOTES, 'UTF-8'); ?></td>
      <td align="center"><?= htmlspecialchars($caso['retraso'], ENT_QUOTES, 'UTF-8'); ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
			
	<?php endif; ?>
	
</div>
