<?php 
	require_once("../../models/conexion.php");

	$ciclo=$_POST["ciclo"];
	$grupo=$_POST["grupo"];
	$basehorarios=new Conexion();
	echo json_encode($basehorarios->Modulos($ciclo,$grupo));
 ?>