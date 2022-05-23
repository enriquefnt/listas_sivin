<?php  

include __DIR__ . '/../include/conecta.php';
?>


	<?php
			try {
						
			$sql='call MSP_NUTRICION.ultimos_movimientos();';
					

				$casos = $connect->query($sql);
			$title="Ultimos"	;

			ob_start();

	include __DIR__ . '/../templates/ultimos.html.php';

$output = ob_get_clean() ;			
			
			}

			catch (PDOException $e) {
			$error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
			$e->getFile() . ':' . $e->getLine();
		}
		?>
<?php  

include __DIR__ . '/../templates/layout.html.php';
?>
	
	