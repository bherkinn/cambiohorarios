<?php 
		require_once("../../models/conexion.php");
		$o=new Conexion();
		$datos=$o->mostrarVerCurricular();
		echo json_encode($datos);
 ?>