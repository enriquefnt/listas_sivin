<?php  
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';

if (empty($_SESSION['name']))
{session_start();}

	$title = 'Para MCDA';
	$_POST['AOPE']=$_SESSION['AOPe'];

try {

		if(isset($_POST['AOPE'])){

		if($_SESSION['tipo']=="NO") { 	

		$sql='call MSP_NUTRICION.usoATLU('.$_POST['AOPE'].'); ';			
	}

	else {
		$sql='call MSP_NUTRICION.usoATLUall(); ';
	}
			
		$casos = $connect->query($sql);
		$cuenta = $casos->rowCount();
		
}
ob_start();

	include __DIR__ . '/../templates/conMCDA.html.php';

$output = ob_get_clean() ;

}	

catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/layout.html.php';
?>