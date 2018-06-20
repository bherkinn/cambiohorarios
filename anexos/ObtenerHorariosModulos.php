<?php 
	require_once("../models/conexion.php");

	$indice=$_POST["idfila"];
	$ciclo[0]="";
	$basehorarios= new Conexion();
	$base=$basehorarios->MostrarDatosFila($indice);
	
	echo json_encode($basehorarios->MostrarDatosFila($indice));

	

 ?>