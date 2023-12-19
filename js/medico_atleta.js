var tabla;
$(document).ready(function () {

	//accion de datatable js
	 
	tabla = $('#tablaconsulta').DataTable( {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
		},
		ajax: {
			url: "",
			type: "POST",
			data: { accion_medico: "consultar" },
		},
		columns: [
			{ data: "id_atleta",className: "d-none" },
			{ data: "cedula" },
			{ data: "nombre" },
			{ data: "medicamento" },
			{ data: "enfermedad" },
			{ data: "discapacidad" },
			{ data: "dieta" },
			{ data: "enfermedades_pasadas" },
			{ data: "nombre_parentesco" },
			{ data: "telefono_parentesco" },
			{ data: "tipo_parentesco" },
			{ data: "opciones",searchable: false },
		],
		lengthMenu: [
            [5, 10, 15],
            [5, 10, 15]
		],
		
		"ordering": false,
        "info":     false
	});
	
    //Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
    }
    
	//validaciones nuevas
	//medica
	$("#medicamento_atleta").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#medicamento_atleta").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#smedicamento_atleta"), "Introduzca datos de manera correcta");
	});

	$("#enfermedad_atleta").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#enfermedad_atleta").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#senfermedad_atleta"), "Introduzca datos de manera correcta");
	});

	$("#discapacidad_atleta").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#discapacidad_atleta").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#sdiscapacidad_atleta"), "Introduzca datos de manera correcta");
	});

	$("#dieta_atleta").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#dieta_atleta").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#sdieta_atleta"), "Introduzca datos de manera correcta");
	});

	$("#enfermedades_pasadas").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#enfermedades_pasadas").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#senfermedades_pasadas"), "Introduzca datos de manera correcta");
	});

	$("#nombre_parentesco").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#nombre_parentesco").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#snombre_parentesco"), "Introduzca datos de manera correcta");
	});

	$("#telefono_parentesco").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	});
	$("#telefono_parentesco").on("keyup", function(){
		validarkeyup(/^[0-9]{11}$/,$(this),$("#stelefono_parentesco"),"Debe ser formato (04145746754)");
	});

	$("#relacion_parentesco").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#relacion_parentesco").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,20}$/, $(this), $("#srelacion_parentesco"), "Ej:Padre, Madre, Primo, etc...");
	});

    //VALIDACION DE BOTONES

	$("#registrar").on("click", function(){
		if (validarboton()) {			
			var datos = new FormData();
			datos.append('accion_medico','registrar');	
			//lo nuevos datos para el formulario
			//medico
            datos.append('nombre_atleta', $("#nombre_atleta").val());
			datos.append('medicamento_atleta', $("#medicamento_atleta").val());
			datos.append('enfermedad_atleta', $("#enfermedad_atleta").val());

			datos.append('discapacidad_atleta', $("#discapacidad_atleta").val());
			datos.append('dieta_atleta',$("#dieta_atleta").val());

			datos.append('enfermedades_pasadas', $("#enfermedades_pasadas").val());
			datos.append('nombre_parentesco', $("#nombre_parentesco").val());

			datos.append('telefono_parentesco', $("#telefono_parentesco").val());
			datos.append('relacion_parentesco', $("#relacion_parentesco").val());

			enviaAjax(datos, 'registrar');

			
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar").on("click", function(){
		if (validarboton()) {			
			var datos = new FormData();

			datos.append('accion_medico','modificar');			

			//lo nuevos datos para el formulario
			//medico
            datos.append('nombre_atleta', $("#nombre_atleta").val());
			datos.append('medicamento_atleta', $("#medicamento_atleta").val());
			datos.append('enfermedad_atleta', $("#enfermedad_atleta").val());

			datos.append('discapacidad_atleta', $("#discapacidad_atleta").val());
			datos.append('dieta_atleta',$("#dieta_atleta").val());

			datos.append('enfermedades_pasadas', $("#enfermedades_pasadas").val());
			datos.append('nombre_parentesco', $("#nombre_parentesco").val());

			datos.append('telefono_parentesco', $("#telefono_parentesco").val());
			datos.append('relacion_parentesco', $("#relacion_parentesco").val());

			enviaAjax(datos,'modificar');
			
		
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

});

//funciones
function validarkeypress(er,e){

	codigo = e.keyCode; //codigo ascii

	tecla = String.fromCharCode(codigo);//transformar codigo ascii generado al pulsar boton a una tecla

	tecla_bien = er.test(tecla); //evalua con la expresion regular y almacena

	//elimnina tecla fuera de la expresion regular
	if (!tecla_bien) {
		e.preventDefault();
	}
}

function validarkeyup(er,id,idmensaje,mensaje){
	
	tecla_bien = er.test(id.val());//evalua valor almacendo en el input

	if (tecla_bien) {
		idmensaje.text("");
		return true;
	} 
	//si esta fuera de los parametros de la expresion regular muestra mensaje de error
	else {
		idmensaje.text(mensaje);
		return false;
	}
}

function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}

function colocarlinea(linea){

	//nuevos datos
	//medicos
    $("#nombre_atleta").val($(linea).find("td:eq(0)").text())
	$("#medicamento_atleta").val($(linea).find("td:eq(3)").text());
	$("#enfermedad_atleta").val($(linea).find("td:eq(4)").text());
	$("#discapacidad_atleta").val($(linea).find("td:eq(5)").text());
	$("#dieta_atleta").val($(linea).find("td:eq(6)").text());
	$("#enfermedades_pasadas").val($(linea).find("td:eq(7)").text());
	$("#nombre_parentesco").val($(linea).find("td:eq(8)").text());
	$("#telefono_parentesco").val($(linea).find("td:eq(9)").text());
	$("#relacion_parentesco").val($(linea).find("td:eq(10)").text());
	$("#modal1").modal("hide");
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
            	if(accion=='registrar'){
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
				}else if(accion=='modificar'){
					try{
						if (respuesta === "Modificado Correctamente") {
							tabla.ajax.reload(null, false);
							mensajemodal(respuesta);
						} else {
							mensajemodal(respuesta);
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
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

function limpia_formulario(){
	
	//medica
	$("#nombre_atleta").val('');
	$("#medicamento_atleta").val('');
	$("#enfermedad_atleta").val('');
	$("#discapacidad_atleta").val('');
	$("#dieta_atleta").val('');
	$("#enfermedades_pasadas").val('');
	$("#nombre_parentesco").val('');
	$("#telefono_parentesco").val('');
	$("#relacion_parentesco").val('');
}

function validarboton() {

	//ningun campo
	if ($("#nombre_atleta").val() == "" &&
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#medicamento_atleta"), $("#smedicamento_atleta"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#enfermedad_atleta"), $("#senfermedad_atleta"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#discapacidad_atleta"), $("#sdiscapacidad_atleta"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#dieta_atleta"), $("#sdieta_atleta"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#enfermedades_pasadas"), $("#senfermedades_pasadas"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#nombre_parentesco"), $("#snombre_parentesco"), "Introduzca datos de manera correcta") == false &&
		validarkeyup(/^[0-9]{11}$/, $("#telefono_parentesco"), $("#stelefono_parentesco"), "Debe ser formato (04145746754)") == false &&
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,20}$/, $("#relacion_parentesco"), $("#srelacion_parentesco"), "Ej:Padre, Madre, Primo, etc...") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}
	else if ($("#nombre_atleta").val() ==""){
		mensajemodal("ERROR EN ATLETA");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#enfermedad_atleta"), $("#senfermedad_atleta"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN ENFERMEDAD QUE PADECE");
		return false;
	}
	
	else if (validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#medicamento_atleta"), $("#smedicamento_atleta"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN MEDICAMENTO");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#discapacidad_atleta"), $("#sdiscapacidad_atleta"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN DISCAPACIDAD");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#dieta_atleta"), $("#sdieta_atleta"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN DIETA");
		return false;
	}	
	else if (validarkeyup(/^[A-Za-z0-9,.\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#enfermedades_pasadas"), $("#senfermedades_pasadas"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN ENFERMEDADES PASADAS");
		return false;
	}	
	else if (validarkeyup(/^[0-9]{11}$/, $("#telefono_parentesco"), $("#stelefono_parentesco"), "Debe ser formato (04145746754)") == false){
		mensajemodal("ERROR EN TELEFONO DE PARENTESCO");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#nombre_parentesco"), $("#snombre_parentesco"), "Introduzca datos de manera correcta") == false){
		mensajemodal("ERROR EN NOMBRE DE PARENTESCO");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,20}$/, $("#relacion_parentesco"), $("#srelacion_parentesco"), "Ej:Padre, Madre, Primo, etc...") == false){
		mensajemodal("ERROR EN RELACION DE PARENTESCO");
		return false;
	}
	
	else{
		return true;
	}

}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario()
	$("#registrar").show();
	$("#modificar").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$(".texto").html('');
	$("#modificar").show();
	$("#registrar").hide();

	var linea = $(fila).closest('tr');
	$("#nombre_atleta").val($(linea).find("td:eq(0)").text())
	$("#medicamento_atleta").val($(linea).find("td:eq(3)").text());
	$("#enfermedad_atleta").val($(linea).find("td:eq(4)").text());
	$("#discapacidad_atleta").val($(linea).find("td:eq(5)").text());
	$("#dieta_atleta").val($(linea).find("td:eq(6)").text());
	$("#enfermedades_pasadas").val($(linea).find("td:eq(7)").text());
	$("#nombre_parentesco").val($(linea).find("td:eq(8)").text());
	$("#telefono_parentesco").val($(linea).find("td:eq(9)").text());
	$("#relacion_parentesco").val($(linea).find("td:eq(10)").text());
	
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
			
			var linea = $(fila).closest('tr');
			var nombre = $(linea).find("td:eq(0)");
			
			var datos = new FormData();
			datos.append('accion_medico','eliminar');
			datos.append('nombre_atleta',nombre.text());
			
			$.ajax({
				async: true,
				url: "", //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
				type: "POST", 
				contentType: false,
				data: datos,
				processData: false,
				cache: false,
				success: function (respuesta) {
				
					try {
						if (respuesta == "eliminado") {
							Swal.fire({
								title: "Eliminado correctamente!",
								text: "La informacion ha sido eliminada.",
								icon: "success",
							});
							tabla.row(linea).remove().draw(false);
							
						} else {
							mensajemodal("Error: Infomacion dependiente de otra tabla.");
							
						}
					} catch (e) {
					mensajemodal("Error en Ajax " + e.name + " !!!");
					}
				},
				error: function () {
				mensajemodal("Error con ajax");
				},
			});
		}
  	});	

	
}