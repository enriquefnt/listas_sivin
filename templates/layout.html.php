<?php
if (empty($_SESSION['name']))
session_start();
?>

<!DOCTYPE html>
<html style=" height:100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../estilos/estilo_layout.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
 <script src="https://kit.fontawesome.com/07598e026b.js" crossorigin="anonymous"></script>
 
 <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
 <link rel="shortcut icon" type="image/x-icon" href="../public/favicon.ico">
	<title><?=$title?></title>
</head>


<body class="w3-light-grey">
<header class="w3-row-padding header w3-blue-grey">
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



<div>
	<div class="w3-bar w3-border w3-light-grey">

			<a href="../include/inicio.php" class="w3-bar-item w3-button">Inicio</a>
			<a href="../include/nominal.php" class="w3-bar-item w3-button">Nominal</a>
	  	<a href="../include/parte_internado.php" class="w3-bar-item w3-button">Parte internación</a>
	<?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "SI"){ ?>
		<a href="../include/ultimos.php"class="w3-bar-item w3-button ">Ultimos Movimientos</a></li>
	<?php } ?>	
			<a href="../include/logout.php"class="w3-bar-item w3-button ">Salir</a></li>
		
	</div>
	</div>
</header >




<main class="w3-row-padding table-container">	
	<div class="w3-container" >
		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">&times;</span>	
			<?=$output?>
	</div>

</main>

<footer class="w3-row-padding footer" >
	
	<div class="w3-container w3-blue-grey  w3-center">
<h6 > DNyAS - Programa: Observatorio Vigilancia Nutricional - 2022</h6>
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
</html>