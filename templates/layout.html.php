<?php
if (empty($_SESSION['name']))
{session_start();}
?>

<!DOCTYPE html>
<html style=" height:100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../estilos/estilo_layout.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
 <script src="https://kit.fontawesome.com/07598e026b.js" crossorigin="anonymous"></script>
 
 <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.css"/>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>




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
	  	<a href="../include/parte_internado.php" class="w3-bar-item w3-button">Parte
	  	 internación</a>
	  	 <a href="../include/paraMCDA.php" class="w3-bar-item w3-button">MCDA</a>
	  	 <a href="../include/act_vigilancia.php" class="w3-bar-item w3-button">Actividad Vigilancia</a>
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

	$(document).ready(function() {
    var table = $('#example').DataTable( {
       language: {
          
    "aria": {
        "sortAscending": "Activar para ordenar la columna de manera ascendente",
        "sortDescending": "Activar para ordenar la columna de manera descendente"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmente"
    },
    "buttons": {
        "collection": "Colección",
        "colvis": "Ver columnas",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "createState": "Crear Estado",
        "removeAllStates": "Borrar Todos los Estados",
        "removeState": "Borrar Estado",
        "renameState": "Renombrar Estado",
        "savedStates": "Guardar Estado",
        "stateRestore": "Restaurar Estado",
        "updateState": "Actualizar Estado"
    },
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor",
        "conditions": {
            "date": {
                "after": "Después",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina con",
                "equals": "Igual a",
                "not": "Diferente de",
                "startsWith": "Inicia con",
                "notEmpty": "No vacío",
                "notContains": "No Contiene",
                "notEnds": "No Termina",
                "notStarts": "No Comienza"
            },
            "array": {
                "equals": "Igual a",
                "empty": "Vacío",
                "contains": "Contiene",
                "not": "Diferente",
                "notEmpty": "No vacío",
                "without": "Sin"
            }
        },
        "data": "Datos"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "countFiltered": "{shown} ({total})",
        "collapseMessage": "Colapsar",
        "showMessage": "Mostrar Todo"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": ",",
    "datetime": {
        "previous": "Anterior",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ],
        "next": "Siguiente",
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "multi": {
            "title": "Múltiples Valores",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
        }
    },
    "decimal": ".",
    "emptyTable": "No hay datos disponibles en la tabla",
    "zeroRecords": "No se encontraron coincidencias",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "stateRestore": {
        "removeTitle": "Eliminar",
        "creationModal": {
            "search": "Buscar"
        
    }
} 
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
</html>
