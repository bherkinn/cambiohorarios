<?php 
	require_once("../../models/conexion.php");
	
		$basehorarios=new Conexion();
		echo json_encode($basehorarios->cboDocentes());

 ?>