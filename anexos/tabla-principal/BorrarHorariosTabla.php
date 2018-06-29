<?php 
	require_once("../../models/conexion.php");
		$id=$_POST["id"];
		$o=new Conexion();
		$o->Borrar($id);	
		
?>