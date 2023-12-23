var tabla;
$(document).ready(function () {

	tabla = $('#tablaconsulta').DataTable( {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
		},
		ajax: {
			url: "",
			type: "POST",
			data: { accion_resultados: "consultar" },
		},
		columns: [
			{ data: "nombre_evento" },
			{ data: "id_evento" , className: 'd-none'},
			{ data: "nombre_atleta1" },
			{ data: "nombre_atleta2" },
			{ data: "ronda" },
			{ data: "forma_ganar" },
			{ data: "id_atleta1" , className: 'd-none'},
			{ data: "id_atleta2" , className: 'd-none' },
			{ data: "opciones" ,searchable: false},
		],
		lengthMenu: [
            [5, 10, 15],
            [5, 10, 15]
		],
		
		"ordering": false,
        "info":     false
    } );

	//Seccion para mostrar lo enviado en el modal mensaje//
 
	//Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
	}

//VALIDACION DE BOTONES
	$("#incluir_resultados").on("click", function(){
		if (validarboton()){
			var datos = new FormData();
			datos.append('accion_resultados', 'incluir_resultados');
			datos.append('nombre_evento',$("#nombre_evento").val());
			datos.append('atleta_ganador',$("#atleta_ganador").val());
			datos.append('atleta_perdedor', $("#atleta_perdedor").val());
			datos.append('ronda', $("#ronda").val());
			datos.append('forma_ganar', $("#forma_ganar").val());
			enviaAjax(datos,'incluir_resultados');
			$("#modal_gestion").modal("hide");
			limpia_formulario();
		}
	});

	$('#nombre_evento').on('change', function () {
		var datos = new FormData();
		//envia para la busqueda de rondas en el evento terminado
		datos.append('accion_resultados', 'select_ronda');
		datos.append('nombre_evento',$("#nombre_evento").val());
		enviaAjax(datos, 'select_ronda');
	});

	$('#ronda').on('change', function () {
		var datos = new FormData();

		//envia para la busqueda de atletas en el evento terminado		
		datos.append('accion_resultados', 'select_atleta');
		datos.append('nombre_evento', $("#nombre_evento").val());
		datos.append('ronda', $("#ronda").val());
		
		enviaAjax(datos, 'select_atleta');
	});

});

//funciones

function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}
 
function validarboton () {
	if ($("#nombre_evento").val() == "" && $("#atleta_ganador").val() == "" && ("#atleta_perdedor").val() == "" && $("#ronda").val() == "" && $("#forma_ganar").val() == "") {
		mensajemodal("NO HA SELECCION NINGUNA OPCION");
		return false;
	}
	//falto EVENTO
	else if ($("#nombre_evento").val() == "") {
		mensajemodal("SELECCIONE EVENTO");
		return false;
	}
	//falto ATLETA GANADOR DEL EVENTO
	else if ($("#atleta_ganador").val() == "") {
		mensajemodal("SELECCIONE ATLETA GANADOR");
		return false;
	}
	//falto ATLETA PERDEDOR DEL EVENTO
	else if ($("#atleta_perdedor").val() == "") {
		mensajemodal("SELECCIONE ATLETA PERDEDOR");
		return false;
	}
	else if ($("#ronda").val() == "") {
		mensajemodal("SELECCIONE RONDA");
		return false;
	}
		else if ($("#forma_ganar").val() == "") {
		mensajemodal("SELECCIONE FORMA DE GANAR");
		return false;
	}
	else {
		return true;
	}
} 

function enviaAjax(datos,accion){
	 
	$.ajax({ 
		    async: true,
            url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
            type: 'POST',//tipo de envio 
			contentType: false,
            data: datos,
			processData: false,   
	        cache: false,  
            success: function(respuesta) {
            	if(accion=='incluir_resultados'){
					try{
						if (respuesta === "Registrado Correctamente") {
							tabla.ajax.reload(null, false);
							mensajemodal(respuesta);
						} else {
							mensajemodal(respuesta);
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				} else if (accion == 'select_atleta') {
						$('#atleta_ganador').html(respuesta);
						$('#atleta_perdedor').html(respuesta);
				}else if (accion == 'select_ronda') {
					$('#ronda').html(respuesta);
				}
				else {
					limpia_formulario();
					mensajemodal(respuesta);
				}
            }, 
            error: function(){
			   mensajemodal("Error con ajax");	
            }
			
    }); 	 
}


function limpia_formulario() {
	$("#atleta_ganador").val('');
	$("#atleta_perdedor").val('');
	$("#ronda").val('');
	$("#forma_ganar").val('');
}


function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario();
	$('#nombre_evento').val('');
	$("#registrar_resultados").show();

}

function elimina(fila) {
	

	Swal.fire({
		title: "¿Estas Seguro?",
		text: "¡No podrás revertir esto!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#d33",
		cancelButtonColor: "#3B71CA",
		confirmButtonText: "Si, eliminar",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.isConfirmed) {
			
			
			let linea = $(fila).closest('tr');
			let evento = $(linea).find("td:eq(1)");
			let atleta_ganador = $(linea).find("td:eq(6)");
			let atleta_perdedor = $(linea).find("td:eq(7)");
			let ronda = $(linea).find("td:eq(4)");
			let forma_ganar = $(linea).find("td:eq(5)");
			
			var datos = new FormData();
			
			datos.append('accion_resultados', 'eliminar_resultados');
			datos.append('nombre_evento',evento.text());
			datos.append('atleta_ganador',atleta_ganador.text());
			datos.append('atleta_perdedor',atleta_perdedor.text());
			datos.append('ronda',ronda.text());
			datos.append('forma_ganar', forma_ganar.text());
		
			$.ajax({ 
				async: true,
				url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
				type: 'POST',//tipo de envio 
				contentType: false,
				data: datos,
				processData: false,   
				cache: false,  
				success: function(respuesta) {
					
						try{
							if (respuesta == 'eliminado') {
								Swal.fire({
									title: "Eliminado correctamente!",
									text: "La informacion ha sido eliminada.",
									icon: "success",
								});
								tabla.row(linea).remove().draw(false);
							} else {
								mensajemodal(respuesta);
								
							}
						}
						catch(e){
							mensajemodal("Error en Ajax "+e.name+" !!!");
						}
				}, 
				error: function(){
					mensajemodal("Error con ajax");	
				}
					
			});
		}
  	});
}
