var medida;
var disponible=1;
var cerrado="no";
var idcursor;
var indicefila;


$(document).ready(function(){
				$("#select-cursos").select2({
					 width: '240px',
				});
			});

$(document).ready(function(){

	if ($(window).width()<=675)
	{
		
		$("#select-cursos").select2({
				width: '260px'
		});
	

	}
	else{
		$("#select-cursos").select2({
				width: '400px'
		});
	}
});


$(window).resize(function(){
		if ($(window).width()<=1200)
		{
			$("#tabla-acomodar").addClass("col-sm-12");
			$("#tablas-extras").removeClass("container")
			$("#tablas-extras").addClass("container-fluid");
		}
		else{
			$("#tabla-acomodar").removeClass("col-sm-12");	
			$("#tablas-extras").removeClass("container-fluid")
			$("#tablas-extras").addClass("container");
		}
});
$(window).ready(function(){
		if ($(window).width()<=1200)
		{
			$("#tabla-acomodar").addClass("col-sm-12");
			$("#tablas-extras").removeClass("container")
			$("#tablas-extras").addClass("container-fluid");
		}
		else{
			$("#tabla-acomodar").removeClass("col-sm-12");	
			$("#tablas-extras").removeClass("container-fluid")
			$("#tablas-extras").addClass("container");
		}
});


$(window).resize(function(){
	if($(window).width()!=medida)
	{
		if ($(window).width()<=675)
		{
			
			$("#select-cursos").select2({
					width: '260px'
			});

		}
		else{
			$("#select-cursos").select2({
					width: '400px'
			});
		}
		medida=$(window).width();
	}
});

// $(document).ready(function(){
// 	$("#tabla").html('<center><img style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
// 	ciclo=$("#cbociclo").val();
// 	curso=$("#select-cursos").val();
// 	$.post("anexos/tabla.php",{curso:curso,ciclo:ciclo},
// 				function(data){
// 					$("#tabla").css({"display":"none"});
// 					$("#tabla").html(data).fadeIn();
// 			});
// });
let cboaulas;
let cbodocentes;
$(document).ready(function(){
	$.post("anexos/combos/aulas.php",{},
		function(data){
			cboaulas=JSON.parse(data);
		});
});

$(document).ready(function(){
	$.post("anexos/combos/docentes.php",{},
		function(data){
			cbodocentes=JSON.parse(data);
		});
});

$(document).ready(function(){
	$("#tabla-carga").removeClass("table-responsive border rounded");
	$("#tabla-carga").html('<center><img style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
	ciclo=$("#cbociclo").val();
	curso=$("#select-cursos").val();
	
	$.post("anexos/tabla-principal/ObtenerHorariosTabla.php",{curso:curso,ciclo:ciclo},
				function(data){	
					 datosJSON=JSON.parse(data);
					 setTimeout("$('#tabla-carga').css({'display':'none'});$('#tabla-carga').html('');",10);
					 setTimeout("$('#tabla-carga').fadeIn(CrearTablaPrincipal(datosJSON,cboaulas,cbodocentes));",10);
					 
					// $("#tabla").html(data).fadeIn();
			});
});

function CrearTablaPrincipal(datosJson,cboaulas,cbodocentes){
	$("#tabla-carga").attr("class","table-responsive border rounded");
	var cantidad=Object.keys(datosJSON).length;
	var cantidadAulas=Object.keys(cboaulas).length;
	var cantidadDocentes=Object.keys(cbodocentes).length;
	var tabla=document.createElement("table");
	tabla.setAttribute("id","tabla-principal");
	tabla.setAttribute("class","tabla-principal");
	var contenedor=document.getElementById("tabla-carga");
	contenedor.appendChild(tabla);
	$("#tabla-principal").append("<tr class='head-tabla'><th style='width:2px'></th>"+
									 "<th class='num th'>N.O.</th>"+
									 "<th class='th'>DIA</th>"+
								 	 "<th class='th'>HORA</th>"+
								 	 "<th class='th'>CURSO</th>"+
								 	 "<th class='th'>SECCION</th>"+
								 	 "<th class='th'>T/P</th>"+
								 	 "<th class='thaula'>AULA</th>"+
								 	 "<th class='thaula'>AULA 2</th>"+
								 	 "<th class='thdocente'>DOCENTE</th>"+
								 	 "<th class='th'>C1</th>"+
								 	 "<th class='th'>C2</th>"+
								 	 "<th class='th'>C3</th>"+
								 	 "<th class='th'>C4</th>"+
								 	 "<th class='th'>C5</th>"+
								 	 "<th class='th'>C6</th>"+
								 	 "<th class='th'>C7</th>"+
								 	 "<th class='th'>C8</th>"+
								 	 "<th class='th'>C9</th>"+
								 	 "<th class='thc10'>C10</th>"+
								 	 "<th style='width:2px'></th>"+"</tr>");
	for(i=0;i<cantidad;i++)
	{	
		id=datosJSON[i]['idHorarios'];
		$("#tabla-principal").append(
		"<tr class='tr' id='"+id+"'>"+
		"<td></td>"+
		"<td><input id='txtorden"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['orden']+"'></td>"+
		"<td><input id='txtdia"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['dia']+"'></td>"+
		"<td><input id='txthora"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['hora']+"'></td>"+
		"<td><input id='txtcurso"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['codCurso']+"'></td>"+
		"<td><input id='txtseccion"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['secCurso']+"'></td>"+
		"<td><input id='txttp"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['teopra']+"'></td>"+
		"<td id='tdaulas'><select class='select-aulas' id='select-aulas"+id+"' disabled></select>"+
		"<td id='tdaulas2'><select class='select-aulas' id='select-aulas2"+id+"' disabled><option value=''> </option></select>"+
		"<td id='tddocentes'><select class='select-docentes' id='select-docentes"+id+"' disabled></select>"+
		"<td><input id='txtc1"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c1']+"'></td>"+
		"<td><input id='txtc2"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c2']+"'></td>"+
		"<td><input id='txtc3"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c3']+"'></td>"+
		"<td><input id='txtc4"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c4']+"'></td>"+
		"<td><input id='txtc5"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c5']+"'></td>"+
		"<td><input id='txtc6"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c6']+"'></td>"+
		"<td><input id='txtc7"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c7']+"'></td>"+
		"<td><input id='txtc8"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c8']+"'></td>"+
	    "<td><input id='txtc9"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c9']+"'></td>"+
	    "<td><input id='txtc10"+id+"' type='text' disabled class='i txtform' spellcheck='false' autocomplete='off' value='"+datosJSON[i]['c10']+"'></td>"+
	    "<td></td>"+
	    "</tr>");

		for(u=0;u<cantidadAulas;u++)
		{	
			// AULAS1
			$("#select-aulas"+datosJSON[i]['idHorarios']).append("<option value='"+cboaulas[u]['aula']+"'>"+cboaulas[u]['aula']+"</option>");
			if(datosJSON[i]['codAula']==cboaulas[u]['aula'])
				{
					$("#select-aulas"+datosJSON[i]['idHorarios']+">option"+"[value='"+datosJSON[i]['codAula']+"']").attr("selected","");
				}
			$("#select-aulas"+datosJSON[i]['idHorarios']+">option"+"[value='"+cboaulas[u]['aula']+"']").attr(
												"title","Capacidad: "+cboaulas[u]['capacidad']+
														"Tipo: "+cboaulas[u]['tipSilla']+
														"Entrada: "+cboaulas[u]['tipEntrada']);

			// AULAS2
			$("#select-aulas2"+datosJSON[i]['idHorarios']).append("<option value='"+cboaulas[u]['aula']+"'>"+cboaulas[u]['aula']+"</option>");
			if(datosJSON[i]['codAula2']==cboaulas[u]['aula'])
				{
					$("#select-aulas2"+datosJSON[i]['idHorarios']+">option"+"[value='"+datosJSON[i]['codAula2']+"']").attr("selected","");
				}
			$("#select-aulas2"+datosJSON[i]['idHorarios']+">option"+"[value='"+cboaulas[u]['aula']+"']").attr(
												"title","Capacidad: "+cboaulas[u]['capacidad']+
														"Tipo: "+cboaulas[u]['tipSilla']+
														"Entrada: "+cboaulas[u]['tipEntrada']);
		}

		for(a=0;a<cantidadDocentes;a++)
		{
			$("#select-docentes"+datosJSON[i]['idHorarios']).append("<option value='"+cbodocentes[a]["codDocente"]+"'>"+cbodocentes[a]['apePaterno']+" "+
																   cbodocentes[a]['apeMaterno']+", "+cbodocentes[a]['nombres']+"</option>");
			if(datosJSON[i]['codDocente']==cbodocentes[a]['codDocente'])
				{
					$("#select-docentes"+datosJSON[i]['idHorarios']+">option"+"[value='"+datosJSON[i]['codDocente']+"']").attr("selected","");
				}
		}
		
	}
	//AGREGAR FILA DE GURADAR
	$("#tabla-principal").append(
		"<tr>"+
		"<td></td>"+
		"<td><input id='txtorden' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtdia' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txthora' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtcurso' type='text' class='form-control txtform' spellcheck='false' autocomplete='off' disabled value='"+$("#select-cursos").val()+"'></td>"+
		"<td><input id='txtseccion' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txttp' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td id='tdaulas'><select class='select-aulas' id='select-aulas'><option disabled selected >Elegir</option></select>"+
		"<td id='tdaulas2'><select class='select-aulas' id='select-aulas2'><option value=''> </option></select>"+
		"<td id='tddocentes'><select class='select-docentes' id='select-docentes'><option disabled selected >Elegir</option></select>"+
		"<td><input id='txtc1' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc2' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc3' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc4' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc5' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc6' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc7' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
		"<td><input id='txtc8' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
	    "<td><input id='txtc9' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
	    "<td><input id='txtc10' type='text' class='form-control txtform' spellcheck='false' autocomplete='off'></td>"+
	    "<td></td>"+
	    "</tr>");
	for(u=0;u<cantidadAulas;u++)
		{	
			// AULAS1
			$("#select-aulas").append("<option value='"+cboaulas[u]['aula']+"'>"+cboaulas[u]['aula']+"</option>");
			
			$("#select-aulas>option"+"[value='"+cboaulas[u]['aula']+"']").attr(
												"title","Capacidad: "+cboaulas[u]['capacidad']+
														"Tipo: "+cboaulas[u]['tipSilla']+
														"Entrada: "+cboaulas[u]['tipEntrada']);
			// AULAS2
			$("#select-aulas2").append("<option value='"+cboaulas[u]['aula']+"'>"+cboaulas[u]['aula']+"</option>");
			
			$("#select-aulas2>option"+"[value='"+cboaulas[u]['aula']+"']").attr(
												"title","Capacidad: "+cboaulas[u]['capacidad']+
														"Tipo: "+cboaulas[u]['tipSilla']+
														"Entrada: "+cboaulas[u]['tipEntrada']);
		}

		for(a=0;a<cantidadDocentes;a++)
		{
			$("#select-docentes").append("<option value='"+cbodocentes[a]["codDocente"]+"'>"+cbodocentes[a]['apePaterno']+" "+
																   cbodocentes[a]['apeMaterno']+", "+cbodocentes[0]['nombres']+"</option>");		
		}

	$(".select-aulas").select2({
		width:"80px"
	});
	$(".select-docentes").select2({
		width:"160px"
	});

	//***********************
	
	MenuContextual();
	AccionesDeCajas();


}

function AccionesDeCajas(){

	var comboactivo=0;
	var idcursor;
	var idcursoractivo;
	var open=0;

	$("tr").click(function(){
		idcursor=$(this).attr("id");
		editar(idcursor);
		open=1;
		//*********Comprobar si el cursor esta activo**********
		if(idcursoractivo)
		{	
			if(idcursor!=idcursoractivo)
			{
				salir(idcursoractivo);
			}	
		}
		idcursoractivo=idcursor;	
		comboactivo=1;
	});

	$("#tabla-carga").mouseleave(function(){
		if(open==1)
		{
				if(comboactivo==0)
				{
					salir(idcursoractivo);
					open=0;
				}	
		}
				
	});

	$("td, th").mouseenter(function(){
		idcelda=$(this).attr("id");
		if(idcelda)
		{
			comboactivo=1;
		}
		else
		{
			if(comboactivo==1)
			{
				comboactivo=0;
			}
		}

	});
}

// ***************************************************Menu Contextual********************************************************

function MenuContextual(){

	$("tr").mousedown(function(e){
		comboactivo=1;
		trderecho=$(this).attr("id");
		if(trderecho)
		{
			console.log(trderecho)
			if(e.which==3)
			{
			$("#"+trderecho).addClass("pintado")
			$("#menucontextual").css("top",e.pageY - 20);
			$("#menucontextual").css("left",e.pageX - 20);
			$("#menucontextual").show("fast");

			$(document).on("contextmenu", function(e) {
                return false;
             });
			}
		}
		$("#eliminar-fila").click(function(e){
			e.preventDefault();
			$("#"+trderecho).fadeOut(1000);
			$("#menucontextual").hide("fast");
		})
	});
		
	

	$("#menucontextual").mouseleave(function(){
		$("#"+trderecho).removeClass("pintado")
		$("#menucontextual").hide("fast");
		$(document).off("contextmenu");
		
	});
}


// $(document).ready(function(){
// 	$("#tabla").load('anexos/tabla.php');
// });

$(document).ready(function(){
	$("#select-cursos").change(function(){
		$("#select-cursos option:selected").each(function(){
			$("#tabla-carga").removeClass("table-responsive border rounded");
			$("#tabla-carga").html("");
			$("#tabla-carga").html('<center><img style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
			ciclo=$("#cbociclo").val();
			curso=$("#select-cursos").val();
	
			$.post("anexos/tabla-principal/ObtenerHorariosTabla.php",{curso:curso,ciclo:ciclo},
				function(data){	
					 datosJSON=JSON.parse(data);
					 setTimeout("$('#tabla-carga').css({'display':'none'});$('#tabla-carga').html('');",300);
					 setTimeout("$('#tabla-carga').fadeIn(CrearTablaPrincipal(datosJSON,cboaulas,cbodocentes));",300);	 
					// $("#tabla").html(data).fadeIn();
			});
			});
		});
	});
	
// });

// $(document).ready(function(){
// 	$("#cbociclo").change(function(){
// 		$("#cbociclo option:selected").each(function(){
// 			$("#tabla").css({"display":"none"});
// 			$("#tabla").html('<center><img id="cargando" style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
// 			curso=$("#select-cursos").val();
// 			ciclo=$(this).val();
// 			disponible=1;
// 			$.post("anexos/tabla.php",{curso:curso,ciclo:ciclo},
// 				function(data){
// 					$("#tabla").css({"display":"none"});
// 					$("#tabla").html(data).fadeIn();
// 			});
// 		})
// 	})
	
// });



function editar(indice){

			$("#txtorden"+indice).prop("disabled", false);
	 		$("#txtorden"+indice).addClass('form-control');
	 		$("#txtorden"+indice).removeClass('i');
			//*****************************
	 		$("#txtdia"+indice).prop("disabled", false);
	 		// $("#txtdia"+indice).focus();
	 		$("#txtdia"+indice).addClass('form-control');
	 		$("#txtdia"+indice).removeClass('i');  
	 								 
	 		//****************************
	 		$("#txthora"+indice).prop("disabled", false);
	 		$("#txthora"+indice).addClass('form-control');
	 		$("#txthora"+indice).removeClass('i');
	 								  
	 		//****************************
	 		$("#txtseccion"+indice).prop("disabled", false);
	 		$("#txtseccion"+indice).addClass('form-control');	 	
	 		$("#txtseccion"+indice).removeClass('i');	 							     
	 		//****************************
	 		$("#txttp"+indice).prop("disabled", false);
	 		$("#txttp"+indice).addClass('form-control'); 	
	 		$("#txttp"+indice).removeClass('i');							
	 		//****************************
	 		$("#select-aulas"+indice).prop("disabled", false);
	 		$("#select-aulas2"+indice).prop("disabled", false);
	 		//****************************
	 		$("#select-docentes"+indice).prop("disabled", false);
	 		//***************************
	 		$("#txtc1"+indice).prop("disabled", false);
	 		$("#txtc1"+indice).addClass('form-control');
	 		$("#txtc1"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc2"+indice).prop("disabled", false);
	 		$("#txtc2"+indice).addClass('form-control');
	 		$("#txtc2"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc3"+indice).prop("disabled", false);
	 		$("#txtc3"+indice).addClass('form-control');
	 		$("#txtc3"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc4"+indice).prop("disabled", false);
	 		$("#txtc4"+indice).addClass('form-control');
	 		$("#txtc4"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc5"+indice).prop("disabled", false);
	 		$("#txtc5"+indice).addClass('form-control');
	 		$("#txtc5"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc6"+indice).prop("disabled", false);
	 		$("#txtc6"+indice).addClass('form-control');
	 		$("#txtc6"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc7"+indice).prop("disabled", false);
	 		$("#txtc7"+indice).addClass('form-control');
	 		$("#txtc7"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc8"+indice).prop("disabled", false);
	 		$("#txtc8"+indice).addClass('form-control');
	 		$("#txtc8"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc9"+indice).prop("disabled", false);
	 		$("#txtc9"+indice).addClass('form-control');
	 		$("#txtc9"+indice).removeClass('i');
	 		//***************************
	 		$("#txtc10"+indice).prop("disabled", false);
	 		$("#txtc10"+indice).addClass('form-control');
	 		$("#txtc10"+indice).removeClass('i');
	 										
	}

function salir(indice){

					actualizar(indice);
					$("#txtorden"+indice).prop("disabled", true);
	 				$("#txtorden"+indice).addClass('i');
	 				$("#txtorden"+indice).removeClass('form-control');

					$("#txtdia"+indice).prop("disabled", true);
	 				$("#txtdia"+indice).addClass('i');
	 				$("#txtdia"+indice).removeClass('form-control');  
	 				
	 				//*******************************
	 				$("#txthora"+indice).prop("disabled", true);
	 				$("#txthora"+indice).addClass('i');
	 				$("#txthora"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtseccion"+indice).prop("disabled", true);
	 				$("#txtseccion"+indice).addClass('i');
	 				$("#txtseccion"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txttp"+indice).prop("disabled", true);
	 				$("#txttp"+indice).addClass('i');
	 				$("#txttp"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#select-aulas"+indice).prop("disabled", true);
	 				$("#select-aulas2"+indice).prop("disabled", true);
	 				// //*******************************
	 				$("#select-docentes"+indice).prop("disabled", true);
	 				//*******************************
	 				$("#txtc1"+indice).prop("disabled", true);
	 				$("#txtc1"+indice).addClass('i');
	 				$("#txtc1"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc2"+indice).prop("disabled", true);
	 				$("#txtc2"+indice).addClass('i');
	 				$("#txtc2"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc3"+indice).prop("disabled", true);
	 				$("#txtc3"+indice).addClass('i');
	 				$("#txtc3"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc4"+indice).prop("disabled", true);
	 				$("#txtc4"+indice).addClass('i');
	 				$("#txtc4"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc5"+indice).prop("disabled", true);
	 				$("#txtc5"+indice).addClass('i');
	 				$("#txtc5"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc6"+indice).prop("disabled", true);
	 				$("#txtc6"+indice).addClass('i');
	 				$("#txtc6"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc7"+indice).prop("disabled", true);
	 				$("#txtc7"+indice).addClass('i');
	 				$("#txtc7"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc8"+indice).prop("disabled", true);
	 				$("#txtc8"+indice).addClass('i');
	 				$("#txtc8"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc9"+indice).prop("disabled", true);
	 				$("#txtc9"+indice).addClass('i');
	 				$("#txtc9"+indice).removeClass('form-control');
	 				//*******************************
	 				$("#txtc10"+indice).prop("disabled", true);
	 				$("#txtc10"+indice).addClass('i');
	 				$("#txtc10"+indice).removeClass('form-control');

	 				
} 

function guardar(){

	 		var datos = new FormData();
	 		datos.append("txtdia",$("#txtdia").val());
	 		datos.append("txthora",$("#txthora").val());
	 		datos.append("txtcurso",$("#txtcurso").val());
	 		datos.append("txtseccion",$("#txtseccion").val());
	 		datos.append("txttp",$("#txttp").val());
	 		datos.append("cboaula",$("#select-aulas").val());
	 		datos.append("cbodocente",$("#select-docentes").val());
	 		datos.append("txtc1",$("#txtc1").val());
	 		datos.append("txtc2",$("#txtc2").val());
	 		datos.append("txtc3",$("#txtc3").val());
	 		datos.append("txtc4",$("#txtc4").val());
	 		datos.append("txtc5",$("#txtc5").val());
	 		datos.append("txtc6",$("#txtc6").val());
	 		datos.append("txtc7",$("#txtc7").val());
	 		datos.append("txtc8",$("#txtc8").val());
	 		datos.append("txtc9",$("#txtc9").val());
	 		datos.append("txtc10",$("#txtc10").val());

	 		$.ajax({

	 			type:"POST",
	 			data:datos,
	 			url:"anexos/registrar.php",
	 			contentType: false,
	 			processData: false,
	 			success:function(resultado)
	 			{
	 				// $("#respuesta").html(resultado);
	 				var idcurso=$("#txtcurso").val();
			 		$.post("anexos/tabla.php",{ curso: idcurso},
					function(data){
					$("#tabla").html(data);
					});
	 			}

	 		});
	 	}

function actualizar(indice){

	 		var datos = new FormData();
	 		datos.append("txtorden",$("#txtorden"+indice).val());
	 		datos.append("txtdia",$("#txtdia"+indice).val());
	 		datos.append("txthora",$("#txthora"+indice).val());
	 		datos.append("txtcurso",$("#txtcurso"+indice).val());
	 		datos.append("txtseccion",$("#txtseccion"+indice).val());
	 		datos.append("txttp",$("#txttp"+indice).val());
	 		datos.append("cboaula",$("#select-aulas"+indice).val());
	 		datos.append("cboaula2",$("#select-aulas2"+indice).val());
	 		datos.append("cbodocente",$("#select-docentes"+indice).val());
	 		datos.append("txtc1",$("#txtc1"+indice).val());
	 		datos.append("txtc2",$("#txtc2"+indice).val());
	 		datos.append("txtc3",$("#txtc3"+indice).val());
	 		datos.append("txtc4",$("#txtc4"+indice).val());
	 		datos.append("txtc5",$("#txtc5"+indice).val());
	 		datos.append("txtc6",$("#txtc6"+indice).val());
	 		datos.append("txtc7",$("#txtc7"+indice).val());
	 		datos.append("txtc8",$("#txtc8"+indice).val());
	 		datos.append("txtc9",$("#txtc9"+indice).val());
	 		datos.append("txtc10",$("#txtc10"+indice).val());
	 		datos.append("id",indice);

	 		$.ajax({

	 			type:"POST",
	 			data:datos,
	 			url:"anexos/actualizar.php",
	 			contentType: false,
	 			processData: false,
	 			success:function(resultado)
	 			{
	 				// console.log($("#select-docentes"+indice).val());
	 			}



	 		});
	 	}






