<?php 
	require_once("../models/conexion.php");

	 $o=new Conexion();


	 $datos[0]=$_POST["txtdia"];
	 $datos[1]=$_POST["txthora"];
	 $datos[2]=$_POST["txtcurso"];
	 $datos[3]=$_POST["txtseccion"];
	 $datos[4]=$_POST["txttp"];
	 $datos[5]=$_POST["cboaula"];
	 $datos[6]=$_POST["cbodocente"];
	 $datos[7]=$_POST["txtc1"];
	 $datos[8]=$_POST["txtc2"];
	 $datos[9]=$_POST["txtc3"];	 
	 $datos[10]=$_POST["txtc4"];	 
	 $datos[11]=$_POST["txtc5"];
	 $datos[12]=$_POST["txtc6"];
	 $datos[13]=$_POST["txtc7"];
	 $datos[14]=$_POST["txtc8"];
	 $datos[15]=$_POST["txtc9"];
	 $datos[16]=$_POST["txtc10"];
	 $datos[17]=$_POST["id"];



	 $o->ActualizarDatos($datos);
?>