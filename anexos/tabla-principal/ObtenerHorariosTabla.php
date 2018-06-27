<?php 	
		
		require_once("../../models/conexion.php");
		$curso=$_POST["curso"];
		$ciclo=$_POST["ciclo"];
		$o=new Conexion();
		$datos=$o->Cargas($curso,$ciclo);	
		echo json_encode($datos);
 ?>