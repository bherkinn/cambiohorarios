<?php 
	require_once("../../models/conexion.php");

	$accion=$_POST["accion"];
	$o=new Conexion();

		switch ($accion) {

			case 'cursos':
				echo json_encode($o->obtnerCursosPorCurricula());
				break;

			case 'reporteCursosT':
				echo json_encode($o->obtenerCargaCursosT());
				break;

			case 'reporteCursosP':
				echo json_encode($o->obtenerCargaCursosP());
				break;

			default:
				
				break;
		}
 ?>