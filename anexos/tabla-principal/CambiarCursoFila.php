<?php 
	require_once("../../models/conexion.php");
	$id=$_POST["id"];
	$codCurso=$_POST["codCurso"];
	$o=new Conexion();
	$o->modificarCursoTablaHorarios($id,$codCurso);
 ?>