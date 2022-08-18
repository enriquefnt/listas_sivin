<?php
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';

 $result = findAll($connect, 'AREAS','Ao_Nom');

   try {
     if (isset($_GET['AOP'])&&isset($_GET['desde'])) {
      
      $sql='call periodo_internados("'.$_GET['desde'].'","'.$_GET['hasta'].'",'.$_GET['AOP'].')';

      $internados = $connect->query($sql);

      $cuenta = $internados->rowCount();
}


$title = 'Internación';

ob_start();
include __DIR__ . '/../templates/periodo_internados.html.php';

$output = ob_get_clean() ;

}
  
catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/layout.html.php';
?>