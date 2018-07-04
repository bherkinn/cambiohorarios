<?php 
	require_once("../../models/conexion.php");
	$o=new Conexion();
	echo json_encode($o->Recuperar());
 ?>