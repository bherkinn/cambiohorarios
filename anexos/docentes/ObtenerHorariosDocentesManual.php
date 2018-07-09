<?php 
	
	require_once("../../models/conexion.php");
		
					$periodo=$_POST["periodo"];
					$iddocente=$_POST["iddocente"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioDocente($iddocente,$periodo));

 ?>