<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Principal</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <!-- **************************************CSS************************************* -->
      <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/fuente.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/principal.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/menu.css">
      <link rel="stylesheet" type="text/css" href="librerias/css/menucontextual.css">
      <link rel="stylesheet" type="text/css" href="librerias/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
      <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.min.css">
      
      <link rel="stylesheet" type="text/css" href="librerias/AlertifyJS-master/build/css/alertify.css">
      <!-- ***************************************JS************************************* -->
      <script type="text/javascript" src="librerias/AlertifyJS-master/build/alertify.js"></script>
      <script type="text/javascript" src="librerias/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="librerias/select2/js/select2.min.js"></script>
      <script type="text/javascript" src="librerias/js/fancywebsocket.js"></script>
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
                     <li><a href="CargaCurso.php"><i class="icono izquierda fas fa-book"></i>Carga Curso</a></li>
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
         <!-- <iframe id="iframe" style="width:100%;height:100%;position:absolute;border:none;background-color:transparent" allowtransparency=true>
         </iframe> -->

         <!-- *******************************************************BOTONES PRINCIPALES**************************************************** -->
         <!-- <button id="btn-menu" class="btn-menu fas fa-bars"></button> -->
         <!-- <button id="agregar" class="agregar btn-success" data-toggle="modal" data-target="#modal-agregar"> Agregar</button> -->
         
         <!-- ******************************************************MENUS CONTEXTUALES**************************************************** -->
         <ul id="menucontextual" class="dropdown-menu-modificado menu-contextual" style="width: 10px;">
            <li class="lista">			
               <a class="borrar comun-lista" id="eliminar-fila" href="#"><i class="fas fa-trash" style="font-size: 15px;"></i> Borrar </a>	
            </li>
            <li class="lista">			
               <a class="borrar comun-lista" id="duplicar-fila" href="#"><i class="fas fa-copy" style="font-size: 14px;"></i> Duplicar </a>	
            </li>
            <li class="lista">         
               <a class="borrar comun-lista" id="cambiar-curso-fila" href="#"><i class="fas fa-exchange-alt" style="font-size: 14px;"></i> Cambiar Curso </a>  
            </li>
         </ul>
         <ul id="menucontextual-agregar" class="dropdown-menu-modificado menu-contextual" style="width: 10px;">
            <li class="lista">			
               <a class="borrar comun-lista" id="registrar-fila" href="#"><i class="fas fa-save" style="font-size: 15px;"></i> Registrar </a>	
            </li>
         </ul>

         <!-- ******************************************************MODAL CAMBIAR CURSO**************************************************** -->
         <div id="modal-cambiar-curso" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cambiar Curso</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class=" offset-1 col-10">
                        <center>
                           Curso Actual :
                        </center>
                     </div>

                     <input type="text" style="text-align: center;margin-bottom: 5px; font-size: 12px;" id="txtcursoinicial" class="form-control offset-1 col-10 " disabled>
                     <div class=" offset-1 col-10 ">
                        <center>
                           Cambiar a :
                        </center>
                     </div>

                    <!--  <input type="text" style="text-align: center;margin-bottom: 15px;" id="txtcursofinal" class="form-control offset-sm-1 col-sm-10"> -->
                     <select id='cbocursofinal' class="form-control offset-1 col-10" style="text-align-last: center;margin-bottom: 15px;font-size: 11px;">
                        
                     </select>
                     <button class="offset-1 col-10 btn btn-info" id="btn-cambiar-curso">Cambiar</button>
                     <br>
                     <br>
                  </div>

               </div>
            </div>
         </div>
         <!-- ******************************************************/MODAL CAMBIAR CURSO************************************************** -->

         <!-- ******************************************************MODAL CAMBIAR CURSO TOTAL**************************************************** -->
         <div id="modal-cambiar-curso-total" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cambiar Curso Total</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class=" offset-1 col-10">
                        <center>
                           Curso Actual :
                        </center>
                     </div>

                     <input type="text" style="text-align: center;margin-bottom: 5px; font-size: 12px;" id="txtcursoinicialtotal" class="form-control offset-1 col-10 " disabled>
                     <div class=" offset-1 col-10 ">
                        <center>
                           Cambiar a :
                        </center>
                     </div>

                    <!--  <input type="text" style="text-align: center;margin-bottom: 15px;" id="txtcursofinal" class="form-control offset-sm-1 col-sm-10"> -->
                     <select id='cbocursofinaltotal' class="form-control offset-1 col-10" style="text-align-last: center;margin-bottom: 15px;font-size: 11px;">
                        
                     </select>
                     <button class="offset-1 col-10 btn btn-info" id="btn-cambiar-curso-total">Cambiar Todo</button>
                     <br>
                     <br>
                  </div>

               </div>
            </div>
         </div>
         <!-- ******************************************************/MODAL CAMBIAR CURSO TOTAL************************************************** -->

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
                     <div class="container-fluid">
                        <div class="form-inline">
                           <label class="control-label  col-sm-2 col-md-2 col-lg-3">Versión Curricular:</label>
                           <select id="cbocurricular" class="offset-lg-0 form-control col-sm-3 col-md-3 col-lg-2" style="text-align-last: center;">

                           </select>
                        </div>
                         <br>
                        <div class="form-inline">
                           <label class="control-label col-sm-2 col-md-2 col-lg-3">Clonar de :</label>
                           <select id="periodo-clonar" class="form-control col-sm-3 col-md-3 col-lg-2" style="text-align-last: center;">

                           </select>
                           <label class="control-label offset-sm-1 offset-md-1 col-sm-2 col-md-2 col-lg-3">Nuevo Periodo:</label>
                           <input id="txtperiodo" onkeypress="return validarNumericosGuiones(event);" style="text-align: center;" type="text" name="txtperiodo" class="form-control col-sm-3 col-md-3 col-lg-2" autocomplete="off">
                        </div>
                        <br>
                        <button id="agregar-periodo" class="btn btn-primary offset-sm-2 col-sm-8 offset-md-4 col-md-4">Agregar</button>
                     </div>
                     <br>
                     <div id="carga-agregar">
                     	
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ******************************************************/MODAL AGREGAR******************************************************** -->
         <!-- <div class="container-fluid" style="margin-top: 20px;margin-bottom: 20px;height: 25px;">

         </div> -->
         	
         <div id="tabla-acomodar" class="container" style="padding-top: 20px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border rounded" >
              <div id="correspondencia" class="padre-correspondencia">
                  <div id="m3" class="hijo-correspondencia"></div>
                  <div id="m4" class="hijo-correspondencia"></div>
                  <div id="m5" class="hijo-correspondencia"></div>
                  <div id="m6" class="hijo-correspondencia"></div>
                  <div id="text-correspondencia" class="hijo-text-correspondencia"></div>
              </div>
               <div class="container-fluid">
               	<div style="margin-bottom: 15px;">
               	  <center>
   		            <select id="select-cursos" class="select-cursos">
   		               
   		            </select>
                  <button id="btn-actualizar-tabla" class="fas fa-redo-alt btn-info btn-actualizar-tabla" style="float: left;"></button>
                  <button id="btn-cambiartotal-curso" class="btn-success btn-cambiar-curso" style="float: left;">Cambiar</button>

                  <button id="btn-borrar-curso" class="btn-danger btn-borrar-curso" style="float: left;">Borrar</button>
		            <select id="cboperiodo" class="cboperiodo " style="font-size: 12px;float: left;">
				      </select>
		          </center>
		        </div>
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
         		 width: '180px',
         	});
         
         });         
      </script>
      <script type="text/javascript" src="librerias/js/comun.js" ></script>
   </body>
</html>