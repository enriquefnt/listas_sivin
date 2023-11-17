<?php
//session_start();
?>

<?php $title ="Inicio"?>
<div class="w3-responsive">
<h4 align="center">Listas extraídas de  SIViNSalta</h4>

</div>
<div class="w3-responsive">
<ul>


Opciones del menú:<br><br>
<li><b>Inicio:</b> Esta pantalla.<br></li>
<li><b><a href="../include/nominal.php" class="w3-bar-block">Nominal:</a></b> Listado  de los casos registrados en el sistema del área operativa correspondiente al usuario logueado indicando la fecha de notificación o último control, edad, domicilio antropometría, clasificación, días sin registros, nombre del vigilante y demora en la notificación. Tiene un enlace a "Ver Controles" que muestra el historial de controles, con la fecha,edad, antropometría y clasificación.<br></li>
<li><b><a href="../include/paraMCDA.php" class="w3-bar-block">Casos para MCDA: </a></b> Lista de casos mayores de 6 meses con indicador antropométrico de Desnutrición Aguda (IMC/Edad < -2 Z).<br></li>
<li><b><a href="../include/conMCDA.php" class="w3-bar-block">Casos en  MCDA: </a></b> Lista de casos que se encuentran bajo estrategia MCDA en tratamiento con ATLU<br></li>
<?php 
if ($_SESSION['tipo']== "SI"){ ?>
<li><b><a href="../include/ultimos.php" class="w3-bar-block">Ultimos movimientos:</a></b>  Listado nominal de los últimos movimentos en el sistema<br></li>
<?php }
?>

<li><b>
	Internacion: <a href="../include/parte_internado.php" class="w3-bar-block">Parte diario de internados</a></b> y <b><a href="../include/resu_mes.php" class="w3-bar-block">Resumen mensual.</a></b><br></li>







<li><b><a href="../include/act_vigilancia.php" class="w3-bar-block">Actividad de vigilancia: </a></b> Lista las notificaciones, controles y altas registradas por cada vigilante por mes en el período indicado.<br></li>
<li><b><a href="../include/logout.php"class="w3-bar-block ">Salir: </a></li></b> Sale del sistema y desconecta al usuario. Para volver a ingresar debe indicar su nombre de usuario y contraseña.<br></li>

</ul>	
</div>