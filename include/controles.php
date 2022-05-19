<?php  
include __DIR__ . '/../include/conecta.php';

?>


<?php
		$title = 'Controles';

try {
		
	if (isset($_POST['IdNiño'])){
			
			$sql='call MSP_NUTRICION.controlesXcaso('.$_POST['IdNiño'].');';		
			$controles = $connect->query($sql);
			
		}	
		
		
		
		ob_start();
			include __DIR__ . '/../templates/controles.html.php';
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

