<?php  
include __DIR__ . '/conecta.php';
?>


<?php

		try {
		
			
			$sql='call MSP_NUTRICION.controlesXcaso(.'.$_POST['IdNiño'].'.);';			

		
		$controles = $connect->query($sql);
	
				
			
		}

			catch (PDOException $e) {
			$error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
			$e->getFile() . ':' . $e->getLine();
		}
		?>


	<?php  
include __DIR__ . '/../templates/controles_caso.html.php';
?>
