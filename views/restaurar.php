<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recuperar</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <!-- **************************************CSS************************************* -->
      <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/principal.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/comun-tablas.css">
      <link rel="stylesheet" type="text/css" href="librerias/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
      <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.min.css">
      <!-- <link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.core.css"> -->
      <!-- <link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.default.css"> -->

	  <link rel="stylesheet" type="text/css" href="librerias/AlertifyJS-master/build/css/alertify.css">
	  <!--  <link rel="stylesheet" type="text/css" href="librerias/AlertifyJS-master/build/css/alertify.trl.css"> -->

      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <!-- ***************************************JS************************************* -->
      <!-- <script type="text/javascript" src="librerias/alertify/lib/alertify.js"></script> -->
      
      <script type="text/javascript" src="librerias/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="librerias/select2/js/select2.min.js"></script>
      <script type="text/javascript" src="librerias/AlertifyJS-master/build/alertify.js"></script>
</head>
<body>
	 <header>
         <div class="cabecera">
            <div class="cabezal-menu">
               <img class="img-logo" src="librerias/img/uni.png">
               <div class="nom-titulo">
                  HORARIOS
                  <br>
                  FIM
               </div>
            </div>
            <nav>
               <ul class="nav">
                  <!-- <li class="titulo-lista">PRINCIPAL</li> -->
                  <li><a href="index.php"><i class="icono izquierda fas fa-registered"></i>Registrar</a></li>
                  <li><a href="index.php"><i class="icono izquierda fas fa-arrows-alt"></i>Cruces</a></li>
                  <li><a href="restaurar.php"><i class="icono izquierda fas fa-arrows-alt"></i>Restaurar</a></li>
                  <li class="titulo-lista">VISTAS</li>
                  <li>
                     <a href="#" id="link1"><i class="icono izquierda fas fa-eye"></i>Automatico<i class="icono derecha fas fa-chevron-down"></i></a>
                     <ul>
                        <li><a href="docentes.php"></i>DOCENTES</a></li>
                        <li><a href="aulas.php">AULAS</a></li>
                        <li><a href="cursos.php">CURSOS</a></li>
                        <li><a href="modulo1.php">MODULO 1</a></li>
                        <li><a href="modulo2.php">MODULO 2</a></li>
                        <li><a href="modulo3.php">MODULO 3</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="#" id="link2"><i class="icono izquierda fas fa-hand-paper"></i> Manual <i class="icono derecha fas fa-chevron-down"></i></a>
                     <ul>
                        <li><a href="views/manual/docentes.php">DOCENTES</a></li>
                        <li><a href="views/manual/aulas.php">AULAS</a></li>
                        <li><a href="views/manual/cursos.php">CURSOS</a></li>
                     </ul>
                  </li>
                  <li class="titulo-lista">REPORTES</li>
                  <li><a href="#" id="link1"><i class="icono izquierda fas fa-user-circle"></i> Docentes</a>
                  <li><a href="#" id="link1"><i class="icono izquierda fas fa-cube"></i> Aulas</a>
                  <li><a href="#" id="link1"><i class="icono izquierda fas fa-clipboard"></i> Cursos</a>
               </ul>
            </nav>
         </div>
      </header>
      <div id="mostrar-menu" class="main-ocultar">
      	<button id="menu" class="menu fas fa-bars" style="position: absolute;"></button>
      	<center><div class="titulo-tabla">RESTAURAR</div></center>
      	<div>
      		<div class="container-fluid">
      		<div class="container-fluid">
				<div id="contenedor-recuperar" class="container-fluid table-responsive-bootstrap" style="">
				

      			</div>
      		</div>
      		</div>
      	</div>

      </div>


      <script type="text/javascript" src="librerias/js/comun.js" ></script>
      <script type="text/javascript">

      	var jsondocentes;

      	$(document).ready(function() {
		    $.post("anexos/combos/docentes.php", {},
		        function(data) {
		            jsondocentes = JSON.parse(data);
		        });
		});

      	$(document).ready(function(){
      		$.post("anexos/recuperar/ObtenerDatosRecuperar.php",{},
      			function(data){
      				var recuperar=JSON.parse(data);
      				CrearTablaRecuperar(recuperar,jsondocentes);
      			});
      		
      	});

      	function CrearTablaRecuperar(recuperar,docentes){	

      		var cantidad=Object.keys(recuperar).length;
      		var cdocentes=Object.keys(docentes).length;

      		$("#contenedor-recuperar").append("<table id='tabla-recuperar' class='table border-recuperar' ><tr class=''>" +
      			"<th style='width:50px;'></th>" +
      			"<th style='width:150px;'>FECHA Y HORA</th>" +
		        "<th class='num th'>N.O.</th>" +
		        "<th class='th'>DIA</th>" +
		        "<th class='th'>HORA</th>" +
		        "<th class='th'>CURSO</th>" +
		        "<th class='th'>SECCION</th>" +
		        "<th class='th'>T/P</th>" +
		        "<th class='thaula'>AULA</th>" +
		        "<th class='thaula'>AULA 2</th>" +
		        "<th class='thdocente'>DOCENTE</th>" +
		        "<th class='th'>C1</th>" +
		        "<th class='th'>C2</th>" +
		        "<th class='th'>C3</th>" +
		        "<th class='th'>C4</th>" +
		        "<th class='th'>C5</th>" +
		        "<th class='th'>C6</th>" +
		        "<th class='th'>C7</th>" +
		        "<th class='th'>C8</th>" +
		        "<th class='th'>C9</th>" +
		        "<th class='thc10'>C10</th></tr></table>");

      		for(i=0;i<cantidad;i++)
      		{	for(d=0;d<cdocentes;d++)
      			{
      				if(recuperar[i]["codDocente"]==docentes[d]["codDocente"])
      				{
      					recuperar[i]["codDocente"]=docentes[d]["apePaterno"]+" "+docentes[d]["apeMaterno"]+", "+docentes[d]["nombres"];
      				}
      			}

      			$("#tabla-recuperar").append("<tr id='"+recuperar[i]["idHorarios"]+"'><td><button onclick='Restaurar("+recuperar[i]["idHorarios"]+")' class='btn btn-info fas fa-reply'</button></td>"+
      			"<td>"+recuperar[i]["fecha"]+"</td>"+
      			"<td>"+recuperar[i]["orden"]+"</td>"+
      			"<td>"+recuperar[i]["dia"]+"</td>"+
      			"<td>"+recuperar[i]["hora"]+"</td>"+
      			"<td>"+recuperar[i]["codCurso"]+"</td>"+
      			"<td>"+recuperar[i]["secCurso"]+"</td>"+
      			"<td>"+recuperar[i]["teopra"]+"</td>"+
      			"<td>"+recuperar[i]["codAula"]+"</td>"+
      			"<td>"+recuperar[i]["codAula2"]+"</td>"+
      			"<td>"+recuperar[i]["codDocente"]+"</td>"+
      			"<td>"+recuperar[i]["c1"]+"</td>"+
      			"<td>"+recuperar[i]["c2"]+"</td>"+
      			"<td>"+recuperar[i]["c3"]+"</td>"+
      			"<td>"+recuperar[i]["c4"]+"</td>"+
      			"<td>"+recuperar[i]["c5"]+"</td>"+
      			"<td>"+recuperar[i]["c6"]+"</td>"+
      			"<td>"+recuperar[i]["c7"]+"</td>"+
      			"<td>"+recuperar[i]["c8"]+"</td>"+
      			"<td>"+recuperar[i]["c9"]+"</td>"+
      			"<td>"+recuperar[i]["c10"]+"</td></tr>");
      		}
      			

      	}

      	function Restaurar(id){

      		alertify.confirm("Usted va a restaurar un  Horario eliminado con anterioridad <br>"+
      			"¿Desea Restaurar?",
		    function(){

		    	$.post("anexos/tabla-principal/BorrarHorariosTabla.php", {
		            id: id,estado:1
		        },
		        function(data) {
		           $("#"+id).fadeOut();
		           alertify.success('Restaurado');
		        });  
		    },
		    function(){
		      alertify.error('Cancelado');
		    });
      	}

      	      	   	

      		
      </script>
</body>
</html>