<?php 
		require_once("../../models/conexion.php");
		$o=new Conexion();
		$datos=$o->mostrarPeriodos();
		echo json_encode($datos);
 ?>