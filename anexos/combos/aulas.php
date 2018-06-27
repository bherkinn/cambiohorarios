<?php 
		require_once("../../models/conexion.php");
		$o=new Conexion();
		$o->open(2);
		$datos=$o->mostrar("aulas","aula",2);	
		$o->close(2);
		echo json_encode($datos);
 ?>