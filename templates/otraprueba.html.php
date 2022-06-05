<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.css"/>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>


	<title>probandotabla</title>
</head>
<body>
<?php 

  
  if ( isset($cuenta) && $cuenta > 0) { ?>
	
	<div>
  <table id="example" class="table table-sm table-striped table-hover" > >
			
   
	<thead >
  <tr >
  	<th >Último registro </th>
    <th>Nombre</th>
    <th>Edad</th>
   <th>Domicilio</th>
    <th>Tipo</th>
    <th>Motivo de notificación</th>
    <th>Z Peso/edad</th>
    <th>Z Talla/edad</th>
    <th>Z IMC/edad</th>
    <th>Ver Evolución</th>
    <th>Clasificación</th>
    <th>Control Médico</th>
    <th>Días sin registros</th>
    <th>Vigilante</th>
    <th>Demora en notificar (Días)</th>
  </tr>
  </thead>
  <tbody class="table-hover">
  <?php  }  ?>




	<?php 

  if(isset($casos)){
  foreach ($casos as $caso): ?>
  <tr >
    <td><?= htmlspecialchars($caso['Fecha'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['años'] .'A ' . $caso['meses'] .'M ' . $caso['dias'] .'D ', ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Domicilio'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['Tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td><?= htmlspecialchars($caso['MotNom'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['ZPesoEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center" ><?= htmlspecialchars($caso['ZTallaEdad'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['ZIMCEdad'], ENT_QUOTES, 'UTF-8'); ?></td>



 <td align="center">

        <div>
        <form action="controles.php" method="post">
        <input type="hidden" name="IdNiño" value=<?= htmlspecialchars($caso['IdNiño'], ENT_QUOTES, 'UTF-8'); ?>>
                        <button class="btn btn-default" type="submit"><i class="far fa-eye  fa-lg"></i></button>
        </form>
        </div>
  </td>

   <td><?= htmlspecialchars($caso['Clacificación'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['Medico'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center" style= "background-color: #<?= htmlspecialchars($caso['color'], ENT_QUOTES, 'UTF-8'); ?>">
  	  	 	<?= htmlspecialchars($caso['dias_transcurridos'], ENT_QUOTES, 'UTF-8'); ?></td>
   <td align="center"><?= htmlspecialchars($caso['vigilante'], ENT_QUOTES, 'UTF-8'); ?></td>
 	<td align="center"><?= htmlspecialchars($caso['retraso'], ENT_QUOTES, 'UTF-8'); ?></td>
   
   </tr>
  <?php endforeach;
    } 
  

if(isset($casos)){ ?>
  <h5><?='Area Operativa: '. $caso['AOP'].  ' al día ' . date("d-m-Y ") .' - Total notificados: '. $cuenta; ?></h5>
 <?php } ?>
  </tbody>
        
        <tfoot>
            <tr>
                <th >Último registro </th>
    <th>Nombre</th>
    <th>Edad</th>
   <th>Domicilio</th>
    <th>Tipo</th>
    <th>Motivo de notificación</th>
    <th>Z Peso/edad</th>
    <th>Z Talla/edad</th>
    <th>Z IMC/edad</th>
    <th>Ver Evolución</th>
    <th>Clasificación</th>
    <th>Control Médico</th>
    <th>Días sin registros</th>
    <th>Vigilante</th>
    <th>Demora en notificar (Días)</th>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">

	$(document).ready(function() {
    var table = $('#example').DataTable( {
       language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: "Bfrtip",
        lengthChange: false,
        paging: false,
        scrollY: "600px",
       scrollCollapse: false,

        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
  }

    );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );</script>


</body>
</html>
