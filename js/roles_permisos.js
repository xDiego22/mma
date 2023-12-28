var tabla;
$(document).ready(function () {

    //accion de datatable js
	
    tabla = $('#tablaconsulta').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
		},  
		ajax: {
			url: "",
			type: "POST",
			data: { accion: "consultar" },
		},
		columns: [
			{ data: "id",className: 'd-none' },
			{ data: "nombre" },
			{ data: "descripcion" },
			{ data: "opciones", className: 'd-flex'},
		],
		columnDefs: [
			{
				target: -1,
				searchable: false,
			},
		],
        lengthMenu: [
            [5, 10, 15],
            [5, 10, 15]
        ],
		
        "ordering": false,
        "info": false
    });

    if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
    }
    
    $("#nombre_rol").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e)//letras á é í ó ú ñ
	});
	$("#nombre_rol").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/,$(this),$("#snombre_rol"),"Solo letras y/o numeros entre 5 y 30 caracteres");
	});

    $("#descripcion_rol").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e)//letras á é í ó ú ñ
	});
	$("#descripcion_rol").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,50}$/,$(this),$("#sdescripcion_rol"),"Solo letras y/o numeros entre 5 y 50 caracteres");
	});

    //VALIDACION DE BOTONES
	$("#registrar").on("click", function(){
		if (validarboton()) {
			if (validar_checkbox()) {
				var datos = new FormData();
				datos.append('accion','registrar');
				datos.append('nombre_rol',$("#nombre_rol").val());
				datos.append('descripcion_rol', $("#descripcion_rol").val());
				
				if ($("#modulo_club").is(":checked")) {
					datos.append('modulo_club','true');
				}
				else {
					datos.append('modulo_club','false');
				}

				if ($("#modulo_personal").is(":checked")) {
					datos.append('modulo_personal','true');
				}
				else {
					datos.append('modulo_personal','false');
				}

				if ($("#modulo_atletas").is(":checked")) {
					datos.append('modulo_atletas','true');
				}
				else {
					datos.append('modulo_atletas','false');
				}

				if ($("#modulo_medicos").is(":checked")) {
					datos.append('modulo_medicos','true');
				}
				else {
					datos.append('modulo_medicos','false');
				}

				if ($("#modulo_socioeconomicos").is(":checked")) {
					datos.append('modulo_socioeconomicos','true');
				}
				else {
					datos.append('modulo_socioeconomicos','false');
				}

				if ($("#modulo_eventos").is(":checked")) {
					datos.append('modulo_eventos','true');
				}
				else {
					datos.append('modulo_eventos','false');
				}

				if ($("#modulo_usuarios").is(":checked")) {
					datos.append('modulo_usuarios','true');
				}
				else {
					datos.append('modulo_usuarios','false');
				}

				if ($("#modulo_bitacora").is(":checked")) {
					datos.append('modulo_bitacora','true');
				}
				else {
					datos.append('modulo_bitacora','false');
				}

				if ($("#modulo_roles").is(":checked")) {
					datos.append('modulo_roles','true');
				}
				else {
					datos.append('modulo_roles','false');
				}

				if ($("#modulo_inscripcion").is(":checked")) {
					datos.append('modulo_inscripcion','true');
				}
				else {
					datos.append('modulo_inscripcion','false');
				}

				if ($("#modulo_emparejamientos").is(":checked")) {
					datos.append('modulo_emparejamientos','true');
				}
				else {
					datos.append('modulo_emparejamientos','false');
				}

				if ($("#modulo_resultados").is(":checked")) {
					datos.append('modulo_resultados','true');
				}
				else {
					datos.append('modulo_resultados','false');
				}

				if ($("#modulo_historial").is(":checked")) {
					datos.append('modulo_historial','true');
				}
				else {
					datos.append('modulo_historial','false');
				}


				if ($("#modulo_reportes").is(":checked")) {
					datos.append('modulo_reportes','true');
				}
				else {
					datos.append('modulo_reportes','false');
				}
				
				enviaAjax(datos, 'registrar');
			}
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar").on("click", function(){
		if (validarboton2()){
			var datos = new FormData();
			datos.append('accion','modificar');
			datos.append('nombre_rol',$("#nombre_rol2").val());
			datos.append('descripcion_rol',$("#descripcion_rol2").val());
			enviaAjax(datos,'modificar');
		}
		$("#modal_modificar").modal("hide");
		limpia_formulario();
	}); 

});


function envia_rol(rol_modulo) {
	var datos = new FormData();
	datos.append('accion','mostrar_permisos');
	datos.append('rol_modulo', rol_modulo);
	
	enviaAjax(datos, 'envia_rol');
	$("#rol_modulo2").val(rol_modulo);//solucion aqui, esto estaba debajo
	$("#actualizar").on("click", function() {
		
		enviaAjax2($("#formulario_permisos"));
		$("#modal_permisos").modal("hide");
    });
}

function verifica(check){
    if ($(check).val()=="true") {
        $(check).val("false");  
    }
    else if ($(check).val()=="false") {
        $(check).val("true");

        
    }
}

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

function validar_checkbox () {
	if ($("#modulo_club") .is(":checked") ||
		$("#modulo_personal") .is(":checked") ||
		$("#modulo_atletas") .is(":checked") ||
		$("#modulo_medicos") .is(":checked") ||
		$("#modulo_socioeconomicos") .is(":checked") ||
		$("#modulo_eventos") .is(":checked") ||
		$("#modulo_usuarios") .is(":checked") ||
		$("#modulo_bitacora") .is(":checked") ||
		$("#modulo_roles") .is(":checked") ||
		$("#modulo_inscripcion") .is(":checked") ||
		$("#modulo_emparejamientos") .is(":checked") ||
		$("#modulo_resultados") .is(":checked") ||
		$("#modulo_historial") .is(":checked") ||
		$("#modulo_reportes") .is(":checked")) {
		
		return true;
	}
	else {
		mensajemodal("SELECCIONE AL MENOS UN MODULO PARA EL ROL");
		return false;
	}
}

function limpiarCheckbox() {
	$("#modulo_club").prop("checked", false);
	$("#modulo_personal").prop("checked", false);
	$("#modulo_atletas").prop("checked", false);
	$("#modulo_medicos").prop("checked", false); 
	$("#modulo_socioeconomicos").prop("checked", false);
	$("#modulo_eventos").prop("checked", false);
	$("#modulo_usuarios").prop("checked", false); 
	$("#modulo_bitacora").prop("checked", false);
	$("#modulo_roles").prop("checked", false);
	$("#modulo_inscripcion").prop("checked", false);
	$("#modulo_emparejamientos").prop("checked", false); 
	$("#modulo_resultados").prop("checked", false);
	$("#modulo_historial").prop("checked", false);
    $("#modulo_reportes").prop("checked", false);
}

function validarboton () {
	
	//ningun campo completado
    if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_rol"), $("#snombre_rol"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false &&
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,50}$/, $("#descripcion_rol"), $("#sdescripcion_rol"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}

	else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_rol"), $("#snombre_rol"), "Solo letras y/o numeros entre 5 y 30 caracteres") == false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}

	else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,50}$/, $("#descripcion_rol"), $("#sdescripcion_rol"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false) {
		mensajemodal("ERROR EN DESCRIPCION");
		return false;
	}
	
	else{
		return true;
	}
}

function validarboton2 () {
	
	//ningun campo completado
    if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_rol2"), $("#snombre_rol2"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false &&
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,50}$/, $("#descripcion_rol2"), $("#sdescripcion_rol2"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}

	else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_rol2"), $("#snombre_rol2"), "Solo letras y/o numeros entre 5 y 30 caracteres") == false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}

	else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,50}$/, $("#descripcion_rol2"), $("#sdescripcion_rol2"), "Solo letras y/o numeros entre 5 y 50 caracteres") == false) {
		mensajemodal("ERROR EN DESCRIPCION");
		return false;
	}
	
	else{
		return true;
	}
}


function enviaAjax(datos,accion){

	$.ajax({ 
		    async: true,
            url: '', 
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
				}else if(accion=='envia_rol'){
					try {
						$("#consulta_permisos").html(respuesta);

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

function enviaAjax2(datos) {
	$.ajax({ 
		    async: true,
            url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
            type: 'POST',
            data: datos.serialize(),
            beforeSend: function(){},
            timeout:10000,
            complete: function() {
				mensajemodal("Permisos actualizados");
				
            },
            error: function(){
				mensajemodal("Error con ajax");	
            }
    });
}

function limpia_formulario(){
	$("#nombre_rol").val('');
	$("#descripcion_rol").val('');
}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario();
	limpiarCheckbox();
	$("#registrar").show();
	$("#modificar").hide();
}

function modalmodificar(fila) {
	$(".texto").html('');
	var linea = $(fila).closest('tr');
	$("#nombre_rol2").val($(linea).find("td:eq(1)").text());
	$("#descripcion_rol2").val($(linea).find("td:eq(2)").text());
	$("#registrar").hide();
	$("#modificar").show();
}

function elimina(fila){

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
			var nombre = $(linea).find("td:eq(1)");
			
			var datos = new FormData();
			datos.append('accion','eliminar');
			datos.append('nombre_rol',nombre.text());
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
							
							mensajemodal("Error: debe eliminar antes los Usuarios que posean este rol");
						
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
