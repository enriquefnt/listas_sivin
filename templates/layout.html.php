<?php
if (empty($_SESSION['name']))
{session_start();}
?>

<!DOCTYPE html>
<html style=" height:100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../estilos/estilo_layout.css">
	
<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">


 <link rel="shortcut icon" type="image/x-icon" href="../public/favicon.ico">
	<title><?=$title?></title>
</head>


<body >
<header >
	
<div class="container-fluid  bg-primary text-white">


<h2>Listados de registros de SiViNSalta</h2>

	<p>
		<?php if (isset($_SESSION['tipo']) &&$_SESSION['tipo'] == "NO"){ 
		echo  'Usuario:' ;
		} else { echo '
		Administrador:' ;} ?>
		<b><?php 
		if(isset($_SESSION['name'])) {
			echo $_SESSION['name'];
		}
		?></b>
		
		<b><?php 
		if(isset($_SESSION['name']) && $_SESSION['tipo'] == "NO") {
			echo "&nbsp&nbsp	&nbsp	Area Operativa: ";
			echo $_SESSION['nomAOPe'];
		}
		?></b>

	</p>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark ">
	
	<div class="container-fluid">
		<ul class="navbar-nav bg-primary navbar-dark">

		<li class="nav-item">	<a class="nav-link " href="../include/inicio.php" ><b>Inicio</b></a></li>
		<li class="nav-item">	<a class="nav-link " href="../include/nominal.php" ><b>Nominal</b></a></li>
	  <li class="nav-item">	<a class="nav-link " href="../include/parte_internado.php" ><b>Parte
	  	 internación</a></li>
	  <li class="nav-item"> <a class="nav-link " href="../include/paraMCDA.php" ><b>MCDA</b></a></li>
	  <li class="nav-item">	 <a class="nav-link "href="../include/act_vigilancia.php" >Actividad Vigilancia</b></a></li>
	<?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "SI"){ ?>
		<li class="nav-item"><a class="nav-link" href="../include/ultimos.php"class="nav-item"><b>Ultimos Movimientos</b></a></li>
	<?php } ?>	
		<li class="nav-item">	<a class="nav-link " href="../include/logout.php"class="w3-bar-item w3-button "><b>Salir</b></a></li>
		</ul>
	</div>
	</div>
	
</nav>
</header>




<main class="w3-row-padding table-container">	
	<div class="container-fluid" >
		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>	
			<?=$output?>
	</div>

</main>

<footer class="text-center  bg-light ">
		<section class="d-flex justify-content-center  p-2 border-bottom" >
 			<div class="me-5 d-none d-lg-block">
			<h6 > DNyAS - Programa: Observatorio Vigilancia Nutricional - 2022 - v. 1.0 </h6>
			</div>



		</section>
</footer>
</body>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<!-- jquery -->

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

</html>