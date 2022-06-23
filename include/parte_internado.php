<?php
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';

 $result = findAll($connect, 'AREAS','Ao_Nom');

   try {
     if (isset($_GET['AOP'])&&isset($_GET['dia'])) {
      
      $sql='call Parte_internados("'.$_GET['dia'].'",'.$_GET['AOP'].')';

      $internados = $connect->query($sql);

      $cuenta = $internados->rowCount();
}


$title = 'Internación';

ob_start();
include __DIR__ . '/../templates/parte_internado.html.php';

$output = ob_get_clean() ;

}
  
catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/layout.html.php';
?>

