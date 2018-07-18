<?php 
	
	require_once("../../models/conexion.php");

		$accion=$_POST["accion"];

		switch ($accion) {

			case 'periodo':
				$o=new Conexion();
				echo json_encode($o->ObtenerPeriodos());
				break;

			case 'horario':
				$periodo=$_POST["periodo"];
				$ciclo=$_POST["ciclo"];
				$grupo=$_POST["grupo"];
				$o=new Conexion();
				echo json_encode($o->Modulos($ciclo,$grupo,$periodo));

				break;
			default:
				
				break;
		}

		
	
?>