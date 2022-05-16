<?php
	require 'conecta.php';
	session_destroy();

	header('Location: /listas_sivin/public/index.php');
?>
