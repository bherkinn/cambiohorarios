<?php 
		require_once("../../models/conexion.php");
		$o=new Conexion();
		$datos=$o->mostrar("cursos","codCurso",2);
		echo json_encode($datos);
 ?>