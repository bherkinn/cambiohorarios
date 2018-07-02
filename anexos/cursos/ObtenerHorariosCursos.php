<?php 
	require_once("../../models/conexion.php");
					$indice=$_POST["idfila"];

					$basehorarios=new Conexion();

					$base=$basehorarios->MostrarDatosFila($indice);
					foreach ($base as $a) {
						$idcurso=$a->codCurso;
						$perAcademico=$a->perAcademico;
					}
					echo json_encode($basehorarios->HorarioCurso("$idcurso",$perAcademico));
 ?>