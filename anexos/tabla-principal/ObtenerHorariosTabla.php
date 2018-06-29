<?php 	
		
		require_once("../../models/conexion.php");
		$curso=$_POST["curso"];
		$ciclo=$_POST["ciclo"];
		$estado=$_POST["estado"];
		$o=new Conexion();
		$datos=$o->Cargas($curso,$ciclo,$estado);	
		echo json_encode($datos);
 ?>