<?php
//session_start();
?>

<?php $title ="Inicio"?>
<div class="w3-responsive">
<h5 align="center">Listados extraídos de los casos registrados en SIViNSalta</h5>

</div>
<div>
<ul>
	
	

Opciones del menú:<br><br>
<li><b>Inicio:</b> Esta pantalla.<br></li>
<li><b>Nominal:</b> Listado  de los casos registrados en el sistema del área operativa correspondeinte al usuario logueado. Indicando la fecha de notificación o último control, su edad, domicilio antropometría, clasificación, días sin registros, nombre del vigilante y demora en la notificación. Tiene un enlace a "Ver Controles" que lista el historial de controles, con la fecha, antropometría y clasificación.<br></li>

<?php 
if ($_SESSION['tipo']== "SI"){ ?>
<li><b>Últimos movimientos:</b> Listado nominal de los últimos movimentos en el sistema<br></li>
<?php }
?>
<li><b>Parte Internación:</b> Indica en el día seleccionado la lista de casos registrados en internación, con la fecha de ingreso, motivo y fecha de egreso.<br></li>
<li><b>Salir:</b> Sale del sistema y desconecta al usuario. Para volver a ingresar debe indicar su nombre de usuario y contraseña.<br></li>

</ul>	
</div>