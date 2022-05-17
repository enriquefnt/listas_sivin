<?php  
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';
?>

	<?php
	
	$result = findAll($connect, 'AREAS','Ao_Nom');
try {

		if(isset($_POST['AOP'])){



		$sql='call MSP_NUTRICION.nominal('.$_POST['AOP'].'); ';			

		//$sql='call MSP_NUTRICION.nominal(8); ';	
		$casos = $connect->query($sql);
		$cuenta = $casos->rowCount();
		$title = 'Listado';
}
ob_start();

	include __DIR__ . '/../templates/nominal.html.php';

$output = ob_get_clean() ;

}	

catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/layout.html.php';
?>