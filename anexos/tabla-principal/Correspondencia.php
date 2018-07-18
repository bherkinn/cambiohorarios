<?php

	require_once("../../models/conexion.php");
	$codCurso=$_POST['codCurso'];
	$verCurricular=$_POST['verCurricular'];
	$o=new Conexion();
	echo json_encode($o->MostrarCorrespondencias($codCurso,$verCurricular));

 ?>