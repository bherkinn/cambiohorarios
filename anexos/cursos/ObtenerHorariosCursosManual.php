<?php 
	
	require_once("../../models/conexion.php");
					$periodo=$_POST["periodo"];
					$idcurso=$_POST["idcurso"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioCurso($idcurso,$periodo));

 ?>