<?php 
	require_once("../../models/conexion.php");

	$accion=$_POST["accion"];
	$o=new Conexion();

		switch ($accion) {

			case 'reporte':
				echo json_encode($o->obtenerReporteCargaCurso());
				break;

			default:
				
				break;
		}
 ?>