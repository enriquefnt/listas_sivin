<?php
include __DIR__ . '/../include/conecta.php';
include __DIR__ . '/../include/funciones.php';
setlocale(LC_ALL, 'es_ES');

 $result = findAll($connect, 'AREAS','Ao_Nom');

   try {
     if (isset($_GET['AOP'])&&isset($_GET['dia'])) {
      
      $sql='call MSP_NUTRICION.res_men("'.$_GET['dia'].'",'.$_GET['AOP'].')';

      $dias_mes = $connect->query($sql);

      $total_dias = $dias_mes->rowCount();
}


$title = 'Internación';

ob_start();
include __DIR__ . '/../templates/resu_mes.html.php';

$output = ob_get_clean() ;

}
  
catch (PDOException $e) {
      $error = 'Error en la base:' . $e->getMessage() . ' en la linea ' .
      $e->getFile() . ':' . $e->getLine();
    }
   

include  __DIR__ . '/../templates/layout.html.php';
?>
