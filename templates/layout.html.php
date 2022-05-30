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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



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

		<li class="nav-item">	<a class="nav-link active" href="../include/inicio.php" >Inicio</a></li>
		<li class="nav-item">	<a class="nav-link active" href="../include/nominal.php" >Nominal</a></li>
	  <li class="nav-item">	<a class="nav-link active" href="../include/parte_internado.php" >Parte
	  	 internación</a></li>
	  <li class="nav-item"> <a class="nav-link active" href="../include/paraMCDA.php" >MCDA</a></li>
	  <li class="nav-item">	 <a class="nav-link active"href="../include/act_vigilancia.php" >Actividad Vigilancia</a></li>
	<?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "SI"){ ?>
		<li class="nav-item"><a class="nav-link" href="../include/ultimos.php"class="w3-bar-item w3-button ">Ultimos Movimientos</a></li>
	<?php } ?>	
		<li class="nav-item">	<a class="nav-link active" href="../include/logout.php"class="w3-bar-item w3-button ">Salir</a></li>
		</ul>
	</div>
	</div>
	
</nav>
</header>




<main >	
	<div  >
		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>	
			<?=$output?>
	</div>

</main>

<footer  >
	
	<div >
<h6 > DNyAS - Programa: Observatorio Vigilancia Nutricional - 2022 - v. 1.0 </h6>
</div>
</footer>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#AOP').val(1);
    recargarLista();

    $('#AOP').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
    //  url:"sectores.php",
      url:" /../descu/includes/sectores.php"

      data:"areaoperativa=" + $('#AOP').val(),
      success:function(r){
        $('#selectsector').html(r);
      }
    });
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</html>