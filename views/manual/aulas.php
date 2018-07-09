
 <!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>M-Aulas</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- **************************************CSS************************************* -->
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/css/comun-tablas.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/css/principal.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/css/aulas.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/select2/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/alertify/themes/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/alertify/themes/alertify.default.css">


	<!-- ***************************************JS************************************* -->

	<script type="text/javascript" src="../../librerias/alertify/lib/alertify.js"></script>
	<script type="text/javascript" src="../../librerias/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../librerias/bootstrap4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../librerias/select2/js/select2.min.js"></script>
	<script type="text/javascript" src="../../librerias/bootstrap4/js/bootstrap.bundle.min.js"></script>
	<!-- <script type="text/javascript" src="../../librerias/js/fancywebsocket.js"></script> -->
<!-- 	<script type="text/javascript" src="librerias/jqueryPlugintipsy/js/jquery.tipsy.js"></script> -->

	<style type="text/css">
	 	.cboperiodo{
			padding: 5px;
			font-size: 12px;
			margin-left: 20px;
		    border-radius: 4px;
		    position: absolute;
		}
		.titulo-tabla{
			padding: 5px;
			font-weight: bold;
			font-size: 28px;
			color: #787777;
		}
	 </style>

	<?php 
		require_once("../../models/conexion.php");
		$o= new Conexion();
	 ?>

</head>

<body>
		
		<header>
			<div class="cabecera">
				<div class="cabezal-menu">
					<img class="img-logo" src="../../librerias/img/uni.png">
					<div class="nom-titulo">
						HORARIOS
						<br>
						 FIM
					</div>
				</div>
				<div class="div-menu">
					<button id="menu" class="menu fas fa-bars">
					
					</button>
				</div>
				

				<nav>
				<ul class="nav">
					<!-- <li class="titulo-lista">PRINCIPAL</li> -->
					<li><a href="../../index.php"><i class="icono izquierda fas fa-registered"></i>Registrar</a></li>
					<li><a href="../../index.php"><i class="icono izquierda fas fa-arrows-alt"></i>Cruces</a></li>
					<li class="titulo-lista">VISTAS</li>
					<li><a href="#" id="link1"><i class="icono izquierda fas fa-eye"></i> Automatico<i class="icono derecha fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="../../docentes.php"></i>DOCENTES</a></li>
							<li><a href="../../aulas.php">AULAS</a></li>
							<li><a href="../../cursos.php">CURSOS</a></li>
						</ul>
					</li>
					<li><a href="#" id="link2"><i class="icono izquierda fas fa-hand-paper"></i> Manual <i class="icono derecha fas fa-chevron-down"></i></a>
						<ul>
							<li><a href="../../views/manual/docentes.php">DOCENTES</a></li>
							<li><a href="../../views/manual/aulas.php">AULAS</a></li>
							<li><a href="../../views/manual/cursos.php">CURSOS</a></li>
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
		
		<center><div class="titulo-tabla">AULAS - MANUAL</div></center>
		<div style="margin-bottom: 15px;">
		<center>
				<select id="select-aulas">
					
				</select>
				<select id="cboperiodo" class="cboperiodo " style="font-size: 12px;">
				</select>
		</center>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="container-fluid">
				<center>
					<div id="tabla" class="">

			

					</div>
				</center>
		</div>
		</div>
		
          
		<br>



	<script type="text/javascript">

		function CrearTabla(filas,columnas,hora){

			var dias = new  Array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADOS','DOMINGOS');
			var cantidad="";
			var tabla=document.createElement("table");
			tabla.setAttribute("id","tabla-docentes");
			tabla.setAttribute("class","table-responsive-horario border rounded");
			tabla.setAttribute("border","3");
		    //tabla.style.border="1px solid gray";
		    var content=document.getElementById("tabla");
		    content.appendChild(tabla);
		    var titulo="UNIVERSIDAD NACIONAL DE INGENIERIA - FACULTAD DE INGENIERIA MECANICA - COMISION DE HORARIOS";
			
			horainicial=hora;
			$("#tabla-docentes").append("<tr><td colspan='6' class='cabecera-tabla ca'>"+titulo+"</td><td class='td-periodo' rowspan='2'></td></tr>");
			$("#tabla-docentes").append("<tr><td id='nomaula' colspan='3' class='cabecera-tabla2'></td><td colspan='3' id='caracteristica' class='caract'></td></tr>");
			for(i=0;i<filas;i++){
				$("#tabla-docentes").append("<tr>");
				for(u=0;u<columnas;u++)
				{
					if(i==0)
					{
						$("#tabla-docentes").append("<th class='horas' id='"+u+"'></th>");
						if(u!=0)
						{
							$("#"+u).html(dias[u-1]);
						}
					}
					else
					{	
						$("#tabla-docentes").append("<td id='a"+(horainicial-1)+""+u+"'></td>");

						if(u!=0)
						{
							$("#a"+(horainicial-1)+""+u).addClass("contenido-tabla");

							
						}
						else
						{
							$("#a"+(horainicial-1)+""+u).addClass("horas");

							inicial=hora.toString().length;
							final=(hora+1).toString().length;
							console.log(cantidad);

							if(inicial>1&&final>1)
							{
								$("#a"+(horainicial-1)+""+u).html(hora+"-"+(hora+1));
							}
							
							if(inicial==1&&final>1)
							{
								$("#a"+(horainicial-1)+""+u).html("0"+hora+"-"+(hora+1));
							}

							if(inicial==1&&final==1)
							{
								$("#a"+(horainicial-1)+""+u).html("0"+hora+"-"+"0"+(hora+1));
							}
							
							

							hora++;
							
						}
					}
				}

				horainicial++;

				$("#tabla-docentes").append("</tr>");
				$("#0").html("HORAS");
			}

		}

			CrearTabla(16,7,7);
		
	</script>

		
	<script type="text/javascript" src="../../librerias/js/comun.js" >
		
	</script>

	<script type="text/javascript">

		$.post("../../anexos/combos/periodo.php",{},
            function(data){
                cboperiodo=JSON.parse(data);
                cantidadcbp=Object.keys(cboperiodo).length;
                for(i=0;i<cantidadcbp;i++)
                {
                    $("#cboperiodo").append("<option value="+cboperiodo[i]["perAcademico"]+">"+cboperiodo[i]["perAcademico"]+"</option>");
                }

                $.post("../../anexos/aulas/ObtenerAulas.php",{},
	            function(data){
	            	cboaula=JSON.parse(data);
                	cantidadaula=Object.keys(cboaula).length;
                	for(u=0;u<cantidadaula;u++)
                	{
                		$("#select-aulas").append("<option value="+cboaula[u]["aula"]+">"+cboaula[u]["aula"]+"</option>");

                	}

                	idaula=$("#select-aulas").val();
                	periodo=$("#cboperiodo").val();
					$.post("../../anexos/aulas/ObtenerHorariosAulasManual.php",{idaula:idaula,periodo:periodo},
								function(data){
								var haulas=JSON.parse(data);
								
									llenarTablaAulas(haulas);
								
					});
				});
            });

		$(document).ready(function(){
			$("#select-aulas").change(function(){
				$("#select-aulas option:selected").each(function(){
					idaula=$("#select-aulas").val();
                	periodo=$("#cboperiodo").val();
					$.post("../../anexos/aulas/ObtenerHorariosAulasManual.php",{idaula:idaula,periodo:periodo},
								function(data){
								var haulas=JSON.parse(data);
								
									llenarTablaAulas(haulas);
								
					});
				});
			});
			
		});

		$(document).ready(function(){
			$("#cboperiodo").change(function(){
				$("#cboperiodo option:selected").each(function(){
					idaula=$("#select-aulas").val();
                	periodo=$("#cboperiodo").val();
					$.post("../../anexos/aulas/ObtenerHorariosAulasManual.php",{idaula:idaula,periodo:periodo},
								function(data){
								var haulas=JSON.parse(data);
								
									llenarTablaAulas(haulas);
								
					});
				});
			});
			
		});



		// ************************************************

		$(document).ready(function(){
				$("#select-aulas").select2({
					 width: '160px',
				});
			});

	</script>
	<script type="text/javascript" src="../../librerias/js/manual/aulas.js"></script>

</body>

</html>