<?php

try {
$connect = new PDO('mysql:host=200.45.111.41;dbname=MSP_NUTRICION;
charset=utf8', 'SiViNSalta', '@#sivin#@salta!%2020&&');
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
$title = 'Ocurrio un error';
$output = 'No se pudo conectar al servidor: '
. $e->getMessage() . ' en '
. $e->getFile() . ':' . $e->getLine();

}

?>
