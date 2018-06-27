



<?php 
	usleep(600000);

	function Cargar($curso,$ciclo){

		require_once("../models/conexion.php");
		$u=new Conexion();
		$datos=$u->Cargas($curso,$ciclo);	

		foreach($datos as $a)
		{
			$indice=$a->idHorarios;

?>
	
		<tr class="tr" id="<?php echo $indice; ?>">

		<td class="comun">
			<input type="text" id="txtdia<?php echo $indice;?>" spellcheck="false" name="txtdia" class="i txtform" value="<?php echo $a->dia; ?>" disabled autocomplete="off">
		</td>

		<td class="comun">
			<input type="text" id="txthora<?php echo $indice;?>" spellcheck="false" name="txthora" class="i txtform " value="<?php echo $a->hora; ?>" disabled autocomplete="off">
		</td>

		<td class="comun">
			<input type="text" id="txtcurso<?php echo $indice;?>" spellcheck="false" name="txtcurso" class="txtform i" value="<?php echo $curso; ?>" disabled autocomplete="off" >
		</td>

		<td class="comun">
			<input type="text" id="txtseccion<?php echo $indice;?>" spellcheck="false" name="txtseccion" class="txtform i" value="<?php echo $a->secCurso; ?>" disabled autocomplete="off">
		</td>

		<td class="comun">
			<input type="text" id="txttp<?php echo $indice;?>" spellcheck="false" name="txttp" class="txtform i" value="<?php echo $a->teopra; ?>" disabled autocomplete="off">
		</td>

		<td class="comun" id="aulas">
			
				<select id="select-aulas<?php echo $indice;?>" class="select-aulas cboaulas" disabled>

					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("aulas","aula",2);
						foreach($tabla as $e)
						{
							if($e->taburete==1)
							{
								$e->taburete="Si";
							}
							else
							{
								$e->taburete="No";
							}
					?>		
						<option value="<?php echo $e->aula; ?>" <?php if($e->aula==$a->codAula):echo "selected"; endif?> 
								title="<?php echo 'Capacidad: '.$e->capacidad.'&#10;'.
													'Pizarra: '.$e->pizarra.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Entorno: '.$e->tipSilla.'&#10;'.
													'Ventilacion: '.$e->equVentilacion.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Taburete: '.$e->taburete.'&#10;';?>">
								<?php echo $e->aula; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?> 

				</select>
			
		</td>
		<td>
			<select id="select-aulas2<?php echo $indice;?>" class="select-aulas cboaulas" disabled>
					<option>
					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("aulas","aula",2);
						foreach($tabla as $e)
						{
							if($e->taburete==1)
							{
								$e->taburete="Si";
							}
							else
							{
								$e->taburete="No";
							}
					?>		
						<option value="<?php echo $e->aula; ?>" <?php if($e->aula==$a->codAula2):echo "selected"; endif?> 
								title="<?php echo 'Capacidad: '.$e->capacidad.'&#10;'.
													'Pizarra: '.$e->pizarra.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Entorno: '.$e->tipSilla.'&#10;'.
													'Ventilacion: '.$e->equVentilacion.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Taburete: '.$e->taburete.'&#10;';?>">
								<?php echo $e->aula; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?> 

				</select>
		</td>
		<td class="comun" id="docentes">
			
				<select id="select-docentes<?php echo $indice;?>" class="select-docentes cbodocentes" disabled>
					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("docentes","apePaterno",2);
						foreach($tabla as $e)
						{
					?>	
						<option value="<?php echo $e->codDocente; ?>" <?php if($e->codDocente==$a->codDocente):echo "selected"; endif ?> >
							<?php echo $e->apePaterno." ".$e->apeMaterno.", ".$e->nombres; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?>
				</select>
			
		</td>
		<td class="comun">
			<input type="text" name="txtc1" id="txtc1<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c1 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc2" id="txtc2<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c2 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc3" id="txtc3<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c3 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc4" id="txtc4<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c4 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc5" id="txtc5<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c5 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc6" id="txtc6<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c6 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc7" id="txtc7<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c7 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc8" id="txtc8<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c8 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc9" id="txtc9<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c9 ?>" disabled autocomplete="off">
		</td>
		<td class="comun">
			<input type="text" name="txtc10" id="txtc10<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c10 ?>" disabled autocomplete="off">
		</td>
	</tr>

	<?php  
		}

	}	
	?>
	<script type="text/javascript">

		var trderecho;
		var combo=0;
		var idcursor;
		/**********************/
		var open="";
		var combodocente="";
		var comboaula="";
		var docente="";
		

			$("td").click(function(){
							var nombre=$(this).attr("id");
							if(nombre=="docentes")
							{
								combo=1;
								//permiso=0;
							}
							else
							{
								//permiso=0;
							}

							if(nombre=="aulas")
							{
								combo=1;
								//permiso=0;
							}
							else
							{
								//permiso=0;
							}

						});

			$("td").mouseenter(function(){
				var indefinido=$(this).attr("id");
				if(indefinido)
				{

				}
				else
				{
					combo=0;
				}
			});

			$("th").mouseenter(function(){
				var indefinido=$(this).attr("id");
				if(indefinido)
				{

				}
				else
				{
					combo=0;
				}
			});
			

// **********************************************************************************************************



$(document).ready(function(){
	$("tr").click(function(){
		idcursor=$(this).attr("id");

			
			if(idcursor)
			{	

				if(idcursor!=open)
				{	
					if(open!="")
					{
						salir(open);
					}		
					open=idcursor;
					if(open!=docente)
					{
						docente=open;
						
						//$("#tabla-docentes").html(data).fadeIn();
						//datosDocentes=JQuery.parseJSON(data);

						send(open);
						//console.log(datosDocentes);
						
						console.log(idcursor);
						
					}
					editar(idcursor);
						
					

					$("#select-aulas"+open).change(function(){
						combo=0;
						console.log("aulas");

					});

					$("#select-docentes"+open).change(function(){
						combo=0;
						console.log("docentes");
					});

					if(idcursor!=open)
					{

					}

				}
				
			}
	});
});

	$("#tabla").mouseleave(function(){		

				if(open)
				{
					{	
							if(combo==0)
							{
								salir(open);
								open="";
							}
							else
							{

							}
						
					}
				}
			});
		
	
		
	
	</script>