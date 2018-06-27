<?php 
	require_once("../../models/conexion.php");
		$o=new Conexion();
		$datos=$o->cboDocentes();
		echo json_encode($datos);
 ?>