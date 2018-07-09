<?php 
	
	require_once("../../models/conexion.php");
					
					$periodo=$_POST["periodo"];
					$idaula=$_POST["idaula"];
					$basehorarios=new Conexion();
					echo json_encode($basehorarios->HorarioAula($idaula,$periodo));

 ?>