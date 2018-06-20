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

$(document).ready(function(){
	$("#tabla").html('<center><img style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
	ciclo=$("#cbociclo").val();
	curso=$("#select-cursos").val();
	$.post("anexos/tabla.php",{curso:curso,ciclo:ciclo},
				function(data){
					$("#tabla").css({"display":"none"});
					$("#tabla").html(data).fadeIn();
			});
});


// $(document).ready(function(){
// 	$("#tabla").load('anexos/tabla.php');
// });

$(document).ready(function(){
	$("#select-cursos").change(function(){
		$("#select-cursos option:selected").each(function(){
			$("#tabla").css({"display":"none"});
			$("#tabla").html('<center><img id="cargando" style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
			curso=$(this).val();
			ciclo=$("#cbociclo").val();
			disponible=1;
			$.post("anexos/tabla.php",{curso:curso,ciclo:ciclo},
				function(data){
					$("#tabla").css({"display":"none"});
					$("#tabla").html(data).fadeIn();
			});
		})
	})
	
});

$(document).ready(function(){
	$("#cbociclo").change(function(){
		$("#cbociclo option:selected").each(function(){
			$("#tabla").css({"display":"none"});
			$("#tabla").html('<center><img id="cargando" style="height:80px;" src="librerias/img/cargando.gif"/></center>').fadeIn();
			curso=$("#select-cursos").val();
			ciclo=$(this).val();
			disponible=1;
			$.post("anexos/tabla.php",{curso:curso,ciclo:ciclo},
				function(data){
					$("#tabla").css({"display":"none"});
					$("#tabla").html(data).fadeIn();
			});
		})
	})
	
});



function editar(indice){

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
	 								
	 		
	 				// $("#txtdia"+indice).prop("disabled", true);
	 				// $("#txtdia"+indice).addClass('i');
	 				// $("#txtdia"+indice).removeClass('form-control');  
	 				
	 				// //*******************************
	 				// $("#txthora"+indice).prop("disabled", true);
	 				// $("#txthora"+indice).addClass('i');
	 				// $("#txthora"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtseccion"+indice).prop("disabled", true);
	 				// $("#txtseccion"+indice).addClass('i');
	 				// $("#txtseccion"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txttp"+indice).prop("disabled", true);
	 				// $("#txttp"+indice).addClass('i');
	 				// $("#txttp"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#select-aulas"+indice).prop("disabled", true);
	 				// //*******************************
	 				// $("#select-docentes"+indice).prop("disabled", true);
	 				// //*******************************
	 				// $("#txtc1"+indice).prop("disabled", true);
	 				// $("#txtc1"+indice).addClass('i');
	 				// $("#txtc1"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc2"+indice).prop("disabled", true);
	 				// $("#txtc2"+indice).addClass('i');
	 				// $("#txtc2"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc3"+indice).prop("disabled", true);
	 				// $("#txtc3"+indice).addClass('i');
	 				// $("#txtc3"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc4"+indice).prop("disabled", true);
	 				// $("#txtc4"+indice).addClass('i');
	 				// $("#txtc4"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc5"+indice).prop("disabled", true);
	 				// $("#txtc5"+indice).addClass('i');
	 				// $("#txtc5"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc6"+indice).prop("disabled", true);
	 				// $("#txtc6"+indice).addClass('i');
	 				// $("#txtc6"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc7"+indice).prop("disabled", true);
	 				// $("#txtc7"+indice).addClass('i');
	 				// $("#txtc7"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc8"+indice).prop("disabled", true);
	 				// $("#txtc8"+indice).addClass('i');
	 				// $("#txtc8"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc9"+indice).prop("disabled", true);
	 				// $("#txtc9"+indice).addClass('i');
	 				// $("#txtc9"+indice).removeClass('form-control');
	 				// //*******************************
	 				// $("#txtc10"+indice).prop("disabled", true);
	 				// $("#txtc10"+indice).addClass('i');
	 				// $("#txtc10"+indice).removeClass('form-control'); 		
	}

function salir(indice){

					actualizar(indice);

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
	 		datos.append("txtdia",$("#txtdia"+indice).val());
	 		datos.append("txthora",$("#txthora"+indice).val());
	 		datos.append("txtcurso",$("#txtcurso"+indice).val());
	 		datos.append("txtseccion",$("#txtseccion"+indice).val());
	 		datos.append("txttp",$("#txttp"+indice).val());
	 		datos.append("cboaula",$("#select-aulas"+indice).val());
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
	 				console.log($("#select-docentes"+indice).val());
	 				$("#auxiliar").html(resultado);
	 			}

	 		});
	 	}






