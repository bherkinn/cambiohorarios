<?php 
	require_once("../../models/conexion.php");
		$id=$_POST["id"];
		$estado=$_POST["estado"];
		$o=new Conexion();
		$o->Borrar($id,$estado);	
		
?>