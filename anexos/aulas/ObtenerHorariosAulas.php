<?php 
	
	require_once("../../models/conexion.php");
					$indice=$_POST["idfila"];

					$basehorarios=new Conexion();

					$base=$basehorarios->MostrarDatosFila($indice);
					foreach ($base as $a) {
						$idaula=$a->codAula;
					}
					echo json_encode($basehorarios->HorarioAula("$idaula"));

 ?>