$(document).ready(function(){
	// ------Curso Por Curricula-----
	$.post("anexos/combos/cursosPorCurricula.php",{vercurricular:"2018-2"},
        function(data1){
        // ------Datos Por Carga Curso------ 
    	$.post("anexos/cargaCurso/cargaCurso.php",{accion:"reporte"},
			function(data2){
				CrearTablaReportesCargaCurso(JSON.parse(data1),JSON.parse(data2));
			});
     });
})

function CrearTablaReportesCargaCurso(JsonCurricular,JsonCarga){
	numCurso=Object.keys(JsonCurricular).length;
	numCarga=Object.keys(JsonCarga).length;
	anexo="";
	nextcodigo="";
	$('#contenedor-carga-curso').append("<table border='1' id='tabla' class='tabla-reporte-carga-curso border'>");

	for(i=0;i<numCarga;i++){
		disponible=0;
		codigo=JsonCarga[i]["codCurso"];

			for(u=0;u<numCurso;u++)
			{
				if(JsonCurricular[u]["codCurso"]==JsonCarga[i]["codCurso"])
				{
					disponible=1;
				}
			}

		if(disponible==1)
		{
			
			if(codigo==nextcodigo)
			{
				$("#tabla").append("<tr><td>"+JsonCarga[i]["secCurso"]+"</td>"+
								   "<td>"+JsonCarga[i]["nombres"]+"</td>"+
								   "</tr>");
				unirfilas++;
				if(anexo!="")
				{
					$("."+anexo).attr("rowspan",unirfilas);
				}
			}
			else
			{
				// Verificamos que al final de la comparacion el Json siguiente no exista
				if(i+1<numCarga)
				{
					nextcodigo=JsonCarga[i+1]["codCurso"];
				}

				

				anexo=codigo;

				$('#tabla').append("<tr><td class='"+codigo+" tdnomcodigo'>"+JsonCarga[i]["nomCurso"]+
								   "<td class='"+codigo+" tdcodigo'>"+JsonCarga[i]["codCurso"]+"</td>"+
								   "<td>"+JsonCarga[i]["secCurso"]+"</td>"+
								   "<td>"+JsonCarga[i]["nombres"]+"</td>"+
									"</tr>");

				codigo=nextcodigo;
				unirfilas=1;
			}
		}	
	}
}
