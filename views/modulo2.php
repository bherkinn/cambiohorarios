
 <!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Modulo 2</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- **************************************CSS************************************* -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/comun-tablas.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/menu.css">
    <link rel="stylesheet" type="text/css" href="librerias/css/fuente.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/modulos.css">
	<link rel="stylesheet" type="text/css" href="librerias/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.default.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


	<!-- ***************************************JS************************************* -->

	<script type="text/javascript" src="librerias/alertify/lib/alertify.js"></script>
	<script type="text/javascript" src="librerias/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="librerias/select2/js/select2.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="librerias/js/fancywebsocket.js"></script>
<!-- 	<script type="text/javascript" src="librerias/jqueryPlugintipsy/js/jquery.tipsy.js"></script> -->

	

	

</head>

<body>
		<div id="menu" class="menu-ocultar">

         <div class="menu-contenedor">
               <div class="cabecera">
                  <img class="img-logo" src="librerias/img/uni.png">
                  <div class="nom-sistema">HORARIOS FIM</div>
               </div>
               <div class="nav">
                  <ul>
                     <li><a href="index.php"><i class="icono izquierda fas fa-registered"></i>Principal</a></li>
                     <li><a href="restaurar.php"><i class="icono izquierda fas fa-redo-alt"></i>Restaurar</a></li>
                     <li class="titulo-sub-menu">VISTAS</li>
                     <li>
                        <a href="#" id="link1"><i class="izquierda fas fa-eye"></i>Automatico<i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                           <li><a href="docentes.php"></i>Docentes</a></li>
                           <li><a href="aulas.php">Aulas</a></li>
                           <li><a href="cursos.php">Cursos</a></li>
                           <li><a href="modulo1.php">Modulo 1</a></li>
                           <li><a href="modulo2.php">Modulo 2</a></li>
                           <li><a href="modulo3.php">Modulo 3</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" id="link2"><i class="icono izquierda fas fa-hand-paper"></i> Manual <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                           <li><a href="views/manual/docentes.php">Docentes</a></li>
                           <li><a href="views/manual/aulas.php">Aulas</a></li>
                           <li><a href="views/manual/cursos.php">Cursos</a></li>
                           <li><a href="views/manual/modulo.php">Modulos</a></li>
                        </ul>
                     </li>
                     <li class="titulo-sub-menu">REPORTES</li>
                     <li><a href="#" id="link1"><i class="icono izquierda fas fa-user-circle"></i> Docentes</a>
                     <li><a href="#" id="link1"><i class="icono izquierda fas fa-cube"></i> Aulas</a>
                     <li><a href="#" id="link1"><i class="icono izquierda fas fa-clipboard"></i> Cursos</a>
                  </ul>
               </div>
         </div>
         

         <div class="btn-menu-contenedor">
            <center>
               <button id="btn-menu" class="btn-menu fas fa-bars"></button>
            </center>
         </div>

      </div>

	<div id="contenedor" class="contenedor-tapar">

		  <center><div class="titulo-tabla">MODULO 2 - AUTOMÁTICO</div></center>
          <div id="tabla" class="container" style="">

			

		  </div>
		<br>
	</div>


	<script type="text/javascript">
		function CrearTabla(filas,columnas,hora){

			var dias = new  Array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADOS','DOMINGOS');
			var cantidad="";
			var tabla=document.createElement("table");
			tabla.setAttribute("id","tabla-modulo1");
			tabla.setAttribute("class","table-responsive-horario border rounded");
			tabla.setAttribute("border","3");
		    //tabla.style.border="1px solid gray";
		    var content=document.getElementById("tabla");
		    content.appendChild(tabla);
		    var titulo="UNIVERSIDAD NACIONAL DE INGENIERIA";
		    var titulo2="FACULTAD DE INGENIERIA MECANICA";
		    var subtitulo="COMISION DE HORARIOS";
		   
			
			horainicial=hora;
			$("#tabla-modulo1").append("<tr><td colspan='3' class='cabecera-tabla cam'>"+titulo+"<br>"+titulo2+"</td>"+
										   "<td class='cam2' colspan='2' rowspan='2'></td>"+
										   "<td class='cam3' colspan='2' rowspan='2'>"+
										   "<div class='titulos-fim'>"+ 
										   "Ciclo : <br>"+
										   "Especialidad : <br>"+
										   "Periodo Academicó : </div>"+
										   "<div id='m2datos' class='datos-fim'></div>"+
										   "<div id='m2fecha' class='fecha-fim'></div>"+
										   "<div class='grupo-fim-titulo'>Grupo :</div>"+
										   "<div id='m2grupo' class='grupo-fim'></div></td></tr>");
			$("#tabla-modulo1").append("<tr><td colspan='3' class='cabecera-tabla2'>"+subtitulo+"</td></td></tr>");
			for(i=0;i<filas;i++){
				$("#tabla-modulo1").append("<tr>");
				for(u=0;u<columnas;u++)
				{
					if(i==0)
					{
						$("#tabla-modulo1").append("<th class='horas' id='"+u+"'></th>");
						if(u!=0)
						{
							$("#"+u).html(dias[u-1]);
						}
					}
					else
					{	
						$("#tabla-modulo1").append("<td id='m2"+(horainicial-1)+""+u+"'></td>");

						if(u!=0)
						{
							$("#m2"+(horainicial-1)+""+u).addClass("contenido-tabla");

							
						}
						else
						{
							$("#m2"+(horainicial-1)+""+u).addClass("horas");

							inicial=hora.toString().length;
							final=(hora+1).toString().length;
							console.log(cantidad);

							if(inicial>1&&final>1)
							{
								$("#m2"+(horainicial-1)+""+u).html(hora+"-"+(hora+1));
							}
							
							if(inicial==1&&final>1)
							{
								$("#m2"+(horainicial-1)+""+u).html("0"+hora+"-"+(hora+1));
							}

							if(inicial==1&&final==1)
							{
								$("#m2"+(horainicial-1)+""+u).html("0"+hora+"-"+"0"+(hora+1));
							}
							
							

							hora++;
							
						}
					}
				}

				horainicial++;

				$("#tabla-modulo1").append("</tr>");
				$("#0").html("HORAS");
			}
			$("#tabla").append("<div id='aviso' class='rotar'>Seleccione</div>");
			$("#tabla").append("<div id='m2vacio' class='deshabilitar'>Vacio</div>");
		}

			CrearTabla(16,7,7);
		
	</script>


    </style>
		
	<script type="text/javascript" src="librerias/js/comun.js" >

	</script>


</body>

</html>