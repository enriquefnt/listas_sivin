<?php  
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';
?>

	<?php
	$title = 'Nominal';
	$result = findAll($connect, 'AREAS','Ao_Nom');
try {

		



		$sql='call MSP_NUTRICION.nominal(12); ';			

		//$sql='call MSP_NUTRICION.nominal(8); ';	
		$casos = $connect->query($sql);
		$cuenta = $casos->rowCount();
		



}	

catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/otraprueba.html.php';
?>