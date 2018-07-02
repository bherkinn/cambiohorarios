<?php 
	require_once("../../models/conexion.php");

	$ciclo=$_POST["ciclo"];
	$grupo=$_POST["grupo"];
	$periodo=$_POST["periodo"];
	$basehorarios=new Conexion();
	echo json_encode($basehorarios->Modulos($ciclo,$grupo,$periodo));
 ?>