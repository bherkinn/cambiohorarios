<?php 
	require_once("../../models/conexion.php");
		$curso=$_POST["curso"];
		$periodo=$_POST["periodo"];
		$o=new Conexion();
		$o->BorrarPorCurso($curso,$periodo);	
		
?>
