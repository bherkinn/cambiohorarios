<?php 
	

	function CrearTabla($i)
                  {


                  	require_once("../models/conexion.php");
					$indice=$_POST["idfila"];

					$basehorarios=new Conexion();

					$base=$basehorarios->MostrarDatosFila($indice);
					foreach ($base as $a) {
						$iddocente=$a->codDocente;
					}

?>

	<table border="2" class="table-responsive-horario border rounded">
            <tr>
              <th class="horas">Horas</th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miercoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Sabado</th>
            </tr>
            <tr>

<?php 


	              	  $o=new Conexion();
	              	  $datos=$o->HorarioDocente("$iddocente");
	              	  $dia_horario=array();//----------------------------------------------------DIA DE LA BASE DE DATOS
	              	  $hora_inicio=array();//----------------------------------------------------HORA INICIO DE LA BASE DE DATOS
	              	  $hora_fina=array();//------------------------------------------------------HORA FINAL DE LA BASE DE DATOS
	              	  $curso_horario=array();//--------------------------------------------------CURSO DE LA BASE DE DATOS

	              	  $mostrar;
	              	  $contador_horario=0;
	              	  $contador_bucle_principal=0;
	              	  $ingresa=0;



	              	  foreach ($datos as $u) {
	              	  	$hora_inicio[$contador_horario]=intval(substr($u->hora,0,2));
	              	  	$hora_final[$contador_horario]=intval(substr($u->hora,3,5));

	              	  	switch ($u->dia) {
	              	  		case 'LU':$india=1;
	              	  			
	              	  			break;
	              	  		
	              	  		case 'MA':$india=2;
	              	  			
	              	  			break;

	              	  		case 'MI':$india=3;
	              	  			
	              	  			break;

	              	  		case 'JU':$india=4;
	              	  			
	              	  			break;

	              	  		case 'VI':$india=5;
	              	  			
	              	  			break;

	              	  		case 'SA':$india=6;
	              	  			break;	              	  			
	              	  	}

	              	    $dia_horario[$contador_horario]=$india; //-----------------------------------DIA DE LA BASE DE DATOS
	              	  	$contador_horario++;


	              	  }

                    $pase=0;
                    $salto=6;
                    $indice=6;	
                   
                    
                    for($a=0;$a<=$i;$a++)
                    {
                    	
                                           
                      if($a==$pase)
                      {
                      	 $dia=0;
                      	 $longitud=strlen($indice);
                   	 	 $nextlongitud=strlen($indice+1);

                   	 	 if($longitud>1 && $nextlongitud>1)
                   	 	 {
                   	 	 	$hora=$indice."-".($indice+1);
                   	 	 }
                   	 	 else
                   	 	 {
                   	 	 	if($longitud==1 && $nextlongitud>1)
                   	 	 	{
                   	 	 		$hora="0".$indice."-".($indice+1);
                   	 	 	}

                   	 	 	if($longitud==1 && $nextlongitud==1)
                   	 	 	{
                   	 	 		$hora="0".$indice."-0".($indice+1);
                   	 	 	}

                   	 	 }

                        echo "<tr>";
                       echo "<td>".$hora."</td>";
                       $pase=$pase+7;

                       $indice++;    

                      }
                      else
                      {	
                      	 
                      	$contador2=0;
                      	foreach ($datos as $h) {
                      		
                      		if($dia==$dia_horario[$contador2])
                      			{	
                      				

                      					if(($indice-1>=$hora_inicio[$contador2] && $hora_final[$contador2]>=($indice)))
                      					{

                      						echo "<td class='contenido-tabla'style='background-color: #AAE69D;color:#000;'>".$h->codCurso." ".$h->secCurso."<br>".$h->codAula."</td>";   
	                      					$ingresa=1; 

                      					}

	                      				           				
                      			}
                      			
                      			$contador2++;

                      	}

                      	if($ingresa==1){
                      		$ingresa=0;
                      	}
                      	else
                      	{
                      		echo "<td class='contenido-tabla'></td>";
                      	}
                      	

                      	
                      			
	                      		
	                  
                          

                          if($a==$salto)
                          {
                          echo "</tr>";
                          $salto=$pase-1;

                          }
                      }


                      $dia++;
                      
                    } 


?>

				</table>

	          </center>
	          <br>
<?php 

                }              

CrearTabla(111);

 ?>