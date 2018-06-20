<?php 
	require_once("../../models/conexion.php");
					$indice=$_POST["idfila"];

					$basehorarios=new Conexion();

					$base=$basehorarios->MostrarDatosFila($indice);
					foreach ($base as $a) {
						$idcurso=$a->codCurso;
					}
					echo json_encode($basehorarios->HorarioCurso("$idcurso"));
 ?>