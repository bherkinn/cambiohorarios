<?php
 	require_once("../models/conexion.php");
 	$o=new Conexion();
 ?>
 <script type="text/javascript">
 	$(document).ready(function(){
		$("#select-aulas").select2();
	});

	$(document).ready(function(){
		$(".cboaulas").select2();
	});

 </script>
 <center>
 <div class="container-fluid col-lg-12">
<!--  <div id="exterior" style="width: 100%; height: 100%;"> -->
	<!-- tabla-base -->
<div class="">
 <table class="tabla-base table-responsive border rounded">
		<tr class="head-tabla">
			<th class="titulo-dia">DIA</th>
			<th class="titulo-hora">HORA</th>
			<th class="titulo-registro">CURSO</th>
			<th class="titulo-registro titulo-seccion">SECCION</th>
			<th class="titulo-registro titulo-tp">T/P</th>
			<th class="titulo-aulas">AULA</th>
			<th class="titulo-aulas">AULA-2</th>
			<th class="titulo-docentes">DOCENTE</th>
			<th class="titulo-ciclo">C1</th>
			<th class="titulo-ciclo">C2</th>
			<th class="titulo-ciclo">C3</th>
			<th class="titulo-ciclo">C4</th>
			<th class="titulo-ciclo">C5</th>
			<th class="titulo-ciclo">C6</th>
			<th class="titulo-ciclo">C7</th>
			<th class="titulo-ciclo">C8</th>
			<th class="titulo-ciclo">C9</th>
			<th class="titulo-ciclo">C10</th>
		</tr>
		<?php 
				require_once("cargar.php");
	
					$curso=$_POST["curso"];
					$ciclo=$_POST["ciclo"];

					Cargar($curso,$ciclo);

				
		 ?>

		<tr class="tr">

			<td class="comun">
				<input type="text" id="txtdia" class="txtform form-control" required="" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txthora" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtcurso" class="txtform form-control" value="<?php echo $curso; ?>" disabled autocomplete="off" >
			</td>
			<td class="comun">
				<input type="text" id="txtseccion" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txttp" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				
				<select id="select-aulas" class="cboaulas">
					<option selected disabled>
						--ELEGIR--
					</option>
					<?php 
						$o->Open(2);
						$tabla=$o->Mostrar("aulas","aula",2);
						foreach($tabla as $a)							
						{
							if($a->taburete==1)
							{
								$a->taburete="Si";
							}
							else
							{
								$a->taburete="No";
							}
					?>	
						<option title="<?php echo 'Capacidad: '.$a->capacidad.'&#10;'.
													'Pizarra: '.$a->pizarra.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Entorno: '.$a->tipSilla.'&#10;'.
													'Ventilacion: '.$a->equVentilacion.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Taburete: '.$a->taburete.'&#10;';?>">
						<?php echo $a->aula; ?>
						</option>
					<?php  
						}
						$o->Close(2);	
					?>


				</select>
				
			</td>
			<td>
				<select id="select-aulas2" class="cboaulas">
					<option selected disabled>
						--ELEGIR--
					</option>
					<?php 
						$o->Open(2);
						$tabla=$o->Mostrar("aulas","aula",2);
						foreach($tabla as $a)							
						{
							if($a->taburete==1)
							{
								$a->taburete="Si";
							}
							else
							{
								$a->taburete="No";
							}
					?>	
						<option title="<?php echo 'Capacidad: '.$a->capacidad.'&#10;'.
													'Pizarra: '.$a->pizarra.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Entorno: '.$a->tipSilla.'&#10;'.
													'Ventilacion: '.$a->equVentilacion.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Taburete: '.$a->taburete.'&#10;';?>">
						<?php echo $a->aula; ?>
						</option>
					<?php  
						}
						$o->Close(2);	
					?>


				</select>
			</td>
			<td class="comun">
				
				<select id="select-docentes" class="cbodocentes">

					<option selected disabled>
						--SELECCIONE--
					</option>
					<?php 
						$o->Open(2);
						$tabla=$o->Mostrar("docentes","apePaterno",2);
						foreach($tabla as $a)
						{
					?>	
							<option value="<?php echo $a->codDocente ?>">
							<?php echo $a->apePaterno." ".$a->apeMaterno.", ".$a->nombres; ?>
							</option>
				
					<?php  
						}
						$o->Close(2);	
					?>
				</select>
				
			</td>
			<td class="comun">
				<input type="text" id="txtc1" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc2" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc3" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc4" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc5" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc6" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc7" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc8" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc9" class="txtform form-control" autocomplete="off">
			</td>
			<td class="comun">
				<input type="text" id="txtc10" class="txtform form-control" autocomplete="off">
			</td>
		</tr>	

</table>
</div>
</div>

</center>

<script>

	
	$(document).ready(function(){
		$(".select-aulas").select2();
	});

	$(document).ready(function(){
		$("#select-docentes").select2();
	});
	$(document).ready(function(){
		$(".select-docentes").select2();
	});

			
</script>

