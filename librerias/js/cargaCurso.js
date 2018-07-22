$(document).ready(function() {
    // ------Curso Por Curricula-----
    $.post("anexos/combos/cursosPorCurricula.php", {
            vercurricular: "2018-2"
        },
        function(data1) {
            // ------Datos Por Carga Curso------ 
            $.post("anexos/cargaCurso/cargaCurso.php", {
                    accion: "reporte"
                },
                function(data2) {
                    CrearTablaReportesCargaCurso(JSON.parse(data1), JSON.parse(data2));
                });
        });
})

// function CrearTablaReportesCargaCurso(JsonCurricular, JsonCarga) {
//     numCurso = Object.keys(JsonCurricular).length;
//     numCarga = Object.keys(JsonCarga).length;
//     codigoActual = "";
//     nextcodigo = "";
//     $('#contenedor-carga-curso').append("<table border='1' id='tabla' class='tabla-reporte-carga-curso border'>");

//     for (i = 0; i < numCarga; i++) {
//         disponible = 0;
//         // Codigo Actual del Bucle
//         codigo = JsonCarga[i]["codCurso"];

//         // Verificamos si el curso existe en la Curricula
//         for (u = 0; u < numCurso; u++) {
//             if (JsonCurricular[u]["codCurso"] == JsonCarga[i]["codCurso"]) {
//                 disponible = 1;
//             }
//         }
//         // Si el curso existe en la curricula Ingresara a la condicion
//         if (disponible == 1) {
        	
//         			if (codigo == nextcodigo) {
// 	                    $("#tabla").append("<tr><td>" + JsonCarga[i]["secCurso"] + "</td>" +
// 	                        "<td>" + JsonCarga[i]["nombres"] + "</td>" +
// 	                        "<td>" + JsonCarga[i]["teopra"] + "</td>" +
// 	                        "<td>" + JsonCarga[i]["hora"] + "</td>" +
// 	                        "</tr>");
// 	                unirfilas++;
// 	                $("." + codigoActual).attr("rowspan", unirfilas);
        			
//         	}
// 	        	// Si el codigo del bucle es igual al codigo siguiente(ademas siempre entrara primero al else ya que nextcodigo aun no recibe un valor)

//             } else {
//                 // Verificamos que al final de la comparacion el Json siguiente no exista
//                 if (i + 1 < numCarga) {
//                     nextcodigo = JsonCarga[i + 1]["codCurso"];
//                 }
//                 codigoActual = codigo;

               
// 		    	$('#tabla').append("<tr><td class='" + codigo + " tdnomcodigo'>" + JsonCarga[i]["nomCurso"] +
//                 "<td class='" + codigo + " tdcodigo'>" + JsonCarga[i]["codCurso"] + "</td>" +
//                 "<td>" + JsonCarga[i]["secCurso"] + "</td>" +
//                 "<td>" + JsonCarga[i]["nombres"] + "</td>" +
//                 "<td>" + JsonCarga[i]["teopra"] + "</td>" +
//                 "<td>" + JsonCarga[i]["hora"] + "</td>" +
//                 "</tr>");

//                 codigo = nextcodigo;
//                 unirfilas = 1;
				       

//                 }
                
//             }
//         }

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
            // Si el codigo del bucle es igual al codigo siguiente(ademas siempre entrara primero al else ya que nextcodigo aun no recibe un valor)
            if(codigo==nextcodigo)
            {
                switch(JsonCarga[i]["teopra"])
                {
                    case "T":
                            $("#tabla").append("<tr><td>"+JsonCarga[i]["secCurso"]+"</td>"+
                                   "<td>"+JsonCarga[i]["nombres"]+"</td>"+
                                   "<td>"+JsonCarga[i]["teopra"]+"</td>"+
                                   "<td>"+JsonCarga[i]["hora"]+"</td>"+
                                   "</tr>");
                            unirfilas++;
                            if(anexo!="")
                            {
                                $("."+anexo).attr("rowspan",unirfilas);
                            }
                        break;
                    case "P":
                        break;
                    default:
                }
                
            }
            else
            {
                switch(JsonCarga[i]["teopra"])
                {
                    case "T":
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
                                           "<td>"+JsonCarga[i]["teopra"]+"</td>"+
                                           "<td>"+JsonCarga[i]["hora"]+"</td>"+
                                            "</tr>");

                        codigo=nextcodigo;
                        unirfilas=1;
                        break;
                    case "P":
                        $('#tabla').append("<tr><td class='"+codigo+" tdnomcodigo'>"+JsonCarga[i]["nomCurso"]+
                                           "<td class='"+codigo+" tdcodigo'>"+JsonCarga[i]["codCurso"]+"</td>"+
                                           "<td>"+JsonCarga[i]["secCurso"]+"</td>"+
                                           "<td>"+JsonCarga[i]["nombres"]+"</td>"+
                                           "<td>"+"Vacio"+"</td>"+
                                           "<td>"+JsonCarga[i]["hora"]+"</td>"+
                                            "</tr>");
                        break;
                    default:
                }

                
            }
        }   
    }
}
    