<?php 
	require_once("../models/conexion.php");
		$anteperiodo=$_POST["anteperiodo"];
		$neoperiodo=$_POST["neoperiodo"];
		$curricula=$_POST["curricula"];
		$o=new Conexion();
		$o->NuevoPeriodo($anteperiodo,$neoperiodo);
		$o->agregarPeriodoPorCurricula($neoperiodo,$curricula);
?>