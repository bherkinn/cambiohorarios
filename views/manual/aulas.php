
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

	<?php 
		require_once("../../models/conexion.php");
		$o= new Conexion();
	 ?>

	

</head>

<body>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      ...
		    </div>
		  </div>
		</div>
		
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
		
		<br>
	
		<center>
							<select id="select-aulas" class="select-cursos">
								<?php 
								$o->Open(2);
								$tabla=$o->Mostrar("aulas","aula",2);
								foreach($tabla as $a)
								{
							?>	
								<option value="<?php echo $a->aula; ?>">
									
										<?php echo $a->aula;
										?>
									
								</option>
							<?php  
								}
								$o->Close(2);	
							?>
							</select>
		</center>
		<br>
		<br>
          <div id="tabla" class="container">

			

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
			$("#tabla-docentes").append("<tr><td colspan='6' class='cabecera-tabla ca'>"+titulo+"</td><td rowspan='2'></td></tr>");
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

		$(document).ready(function(){
			idaula=$("#select-aulas").val();
			$.post("../../anexos/aulas/ObtenerHorariosAulasManual.php",{idaula:idaula},
						function(data){
						var haulas=JSON.parse(data);
						
							llenarTablaAulas(haulas);
						
			});
		});

		$(document).ready(function(){
			$("#select-aulas").change(function(){
				$("#select-aulas option:selected").each(function(){
					idaula=$(this).val();
					$.post("../../anexos/aulas/ObtenerHorariosAulasManual.php",{idaula:idaula},
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