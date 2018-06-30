<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Principal</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <!-- **************************************CSS************************************* -->
      <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/principal.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/menucontextual.css">
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
      <script type="text/javascript" src="librerias/js/fancywebsocket.js"></script>
   </head>
   <body>
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
         <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               ...
             </div>
           </div>
         </div> -->
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
      	<!-- *******************************************************BOTONES PRINCIPALES**************************************************** -->
         <button id="menu" class="menu fas fa-bars" style=""></button>

         <button id="agregar" class="agregar btn-success fas fa-plus-circle" data-toggle="modal" data-target="#modal-agregar"> Agregar</button>
         
         <!-- ******************************************************/BOTONES PRINCIPALES************************************************** -->
		<br>
         <!-- ******************************************************MENUS CONTEXTUALES**************************************************** -->
         <ul id="menucontextual" class="dropdown-menu-modificado menu-contextual" style="width: 10px;">
            <li class="lista">			
               <a class="borrar comun-lista" id="eliminar-fila" href="#"><i class="fas fa-trash" style="font-size: 15px;"></i> Borrar </a>	
            </li>
            <li class="lista">			
               <a class="borrar comun-lista" id="duplicar-fila" href="#"><i class="fas fa-copy" style="font-size: 14px;"></i> Duplicar </a>	
            </li>
         </ul>
         <ul id="menucontextual-agregar" class="dropdown-menu-modificado menu-contextual" style="width: 10px;">
            <li class="lista">			
               <a class="borrar comun-lista" id="registrar-fila" href="#"><i class="fas fa-save" style="font-size: 15px;"></i> Registrar </a>	
            </li>
         </ul>
         <!-- ******************************************************/MENUS CONTEXTUALES************************************************** -->

         <!-- ******************************************************MODAL AGREGAR******************************************************** -->
		<div id="modal-agregar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Periodo Academico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<select id="periodo-clonar" class="">
		               <?php 
		                  $ciclos=$o->MostrarCiclos();
		                  foreach($ciclos as $a)
		                  {
		                  ?>	
		               <option value="<?php echo $a->perAcademico; ?>">
		                  <?php echo $a->perAcademico; ?>
		               </option>
		               <?php  
		                  }
		                  ?>
	            	</select>
				</div>
		    </div>
		  </div>
		</div>
		<!-- ******************************************************/MODAL AGREGAR******************************************************** -->

         <center>
            <select id="select-cursos" class="select-cursos">
               <?php 
                  $o->Open(2);
                  $tabla=$o->Mostrar("cursos","codCurso",2);
                  foreach($tabla as $a)
                  {
                  ?>	
               <option value="<?php echo $a->codCurso; ?>">
                  <?php echo $a->codCurso." - ".$a->nomCurso; ?>
               </option>
               <?php  
                  }
                  $o->Close(2);	
                  ?>
            </select>
            <select id="cbociclo" class="cbociclos">
               <?php 
                  $ciclos=$o->MostrarCiclos();
                  foreach($ciclos as $a)
                  {
                  ?>	
               <option value="<?php echo $a->perAcademico; ?>">
                  <?php echo $a->perAcademico; ?>
               </option>
               <?php  
                  }
                  ?>
            </select>
         </center>
         <br>
         <div id="tabla-acomodar" class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border rounded" >
               <br>
               <div class="container-fluid">
                  <div id="tabla-carga" class="">
                     <!-- AQUI SE CARGARA LA TABLA DE DATOS -->
                  </div>
               </div>
               <br>
            </div>
            <br>	
         </div>
         <div id="tablas-extras" class="container">
            <div class="row">
               <div class="container-fluid col-md-6">
                  <div id="auxiliar" class="container-fluid border rounded" style=" height: 465px;">
                  </div>
               </div>
               <div class="container-fluid col-md-6">
                  <div class="container-fluid border rounded" style=" height: 265px;">
                     <br>
                     <center>
                        <div id="tabla-docentes">
                        </div>
                     </center>
                     <br>
                  </div>
               </div>
            </div>
         </div>
         <br>
      </div>
      <script type="text/javascript" src="librerias/js/principal.js" >
         $(document).ready(function(){
         	$("#select-cursos").select2({
         		 width: '240px',
         	});
         
         });
         
      </script>
      <script type="text/javascript" src="librerias/js/comun.js" ></script>
   </body>
</html>