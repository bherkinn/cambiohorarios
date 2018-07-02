<?php 
	require_once("../models/conexion.php");
		$anteperiodo=$_POST["anteperiodo"];
		$neoperiodo=$_POST["neoperiodo"];
		$o=new Conexion();
		$o->NuevoPeriodo($anteperiodo,$neoperiodo);
?>