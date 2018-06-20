<?php 
	
	require_once("../../models/conexion.php");
	
					$idaula=$_POST["idaula"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioAula("$idaula"));

 ?>