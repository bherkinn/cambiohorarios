<?php 
	require_once("../../models/conexion.php");
	$periodo=$_POST["periodo"];
	$codCurso=$_POST["codCurso"];
	$codCursoNuevo=$_POST["codCursoNuevo"];
	$o=new Conexion();
	$o->modificarCursoTotalTablaHorarios($periodo,$codCurso,$codCursoNuevo);
 ?>