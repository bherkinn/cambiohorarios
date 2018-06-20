<?php 
	
	require_once("../../models/conexion.php");
	
					$idcurso=$_POST["idcurso"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioCurso("$idcurso"));

 ?>