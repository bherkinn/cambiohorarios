<?php 
	
	require_once("../../models/conexion.php");
	
					$iddocente=$_POST["iddocente"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioDocente("$iddocente"));

 ?>