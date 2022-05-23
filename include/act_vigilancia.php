<?php  
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';
?>

	<?php

	$title = 'Actividad';
	$result = findAll($connect, 'AREAS','Ao_Nom');
			
			

			try {

				

				if (isset($_POST['AOP']) && isset($_POST['anio'])){	
			
			$sql='call Actividad1('.$_POST['anio'].' ,'.$_POST['AOP'].');';			
				
			$vigilantes = $connect->query($sql);
			$cuenta = $vigilantes->rowCount();
			}
			
			ob_start();
			include __DIR__ . '/../templates/act_vigilancia.html.php';
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