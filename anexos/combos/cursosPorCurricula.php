<?php 
		require_once("../../models/conexion.php");
		$vercurricular=$_POST["vercurricular"];
		$o=new Conexion();
		$datos=$o->mostrarCursosPorPeriodo($vercurricular);
		echo json_encode($datos);
 ?>