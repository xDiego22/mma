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
			data: { accion_personal: "consultar" },
		},
		columns: [
			{ data: "nombre_club" },
			{ data: "id_club" , className: 'd-none'},
			{ data: "cedula" },
			{ data: "nombre_completo" },
			{ data: "telefono" },
			{ data: "cargo" },
			{ data: "direccion" },
			{ data: "opciones" ,searchable: false},
			{ data: "nombre", className: 'd-none' },
			{ data: "apellido", className: 'd-none' },
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

	$("#cedula_personal").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	});
	$("#cedula_personal").on("keyup", function(){
		validarkeyup(/^[0-9]{7,8}$/, $(this),$("#scedula_personal"),"Debe ser formato (15345987)");
	});

	$("#nombres_personal").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	}); 
	$("#nombres_personal").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$(this),$("#snombres_personal"),"Introduzca nombres de manera correcta");
	});

	$("#apellidos_personal").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});	
	$("#apellidos_personal").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$(this),$("#sapellidos_personal"),"Introduzca apellidos de manera correcta");
	});

	$("#telefono_personal").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	});
	$("#telefono_personal").on("keyup", function(){
		validarkeyup(/^[0-9]{11}$/,$(this),$("#stelefono_personal"),"Debe ser formato (04141234567)");
	});

	$("#direccion_personal").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e);//letras á é í ó ú ñ
	});
	$("#direccion_personal").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$(this),$("#sdireccion_personal"),"Solo letras y/o numeros entre 3 y 30 caracteres");
	});


//VALIDACION DE BOTONES
	$("#registrar_personal").on("click", function(){
		if (validarboton()){			
			var datos = new FormData();
			datos.append('accion_personal','registrar_personal');	
			datos.append('club_personal',$("#club_personal").val());		
			datos.append('cedula_personal',$("#cedula_personal").val());
			datos.append('nombres_personal',$("#nombres_personal").val());
			datos.append('apellidos_personal',$("#apellidos_personal").val());
			datos.append('telefono_personal',$("#telefono_personal").val());
			datos.append('cargo_personal',$("#cargo_personal").val());
			datos.append('direccion_personal',$("#direccion_personal").val());					
			enviaAjax(datos, 'registrar_personal');
			
			
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar_personal").on("click", function(){
		if (validarboton()){
			var datos = new FormData();
			datos.append('accion_personal','modificar_personal');
			datos.append('club_personal',$("#club_personal").val());			
			datos.append('cedula_personal',$("#cedula_personal").val());
			datos.append('nombres_personal',$("#nombres_personal").val());
			datos.append('apellidos_personal',$("#apellidos_personal").val());
			datos.append('telefono_personal',$("#telefono_personal").val());
			datos.append('cargo_personal',$("#cargo_personal").val());
			datos.append('direccion_personal',$("#direccion_personal").val());					
			enviaAjax(datos,'modificar_personal');
			
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

function validarboton () {	
	
	if ($("#club_personal").val()=="" && validarkeyup(/^[0-9]{7,8}$/, $("#cedula_personal"),$("#scedula_personal"),"Debe ser formato (12.345.678)")==false && validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$("#nombres_personal"),$("#snombres_personal"),"Introduzca nombres de manera correcta")==false && validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$("#apellidos_personal"),$("#sapellidos_personal"),"Introduzca apellidos de manera correcta")==false && validarkeyup(/^[0-9]{11}$/,$("#telefono_personal"),$("#stelefono_personal"),"Debe ser formato (04141234567)")==false && $("#cargo_personal").val()=="" && validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$("#direccion_personal"),$("#sdireccion_personal"),"Solo letras y/o numeros entre 3 y 30 caracteres")==false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}
	 
	else if ($("#club_personal").val()=="") {
		mensajemodal("SELECCIONE EL CLUB");
		return false;
	}
	else if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula_personal"),$("#scedula_personal"),"Debe ser formato (12.345.678)")==false) {
		mensajemodal("ERROR EN CEDULA");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$("#nombres_personal"),$("#snombres_personal"),"Introduzca nombres de manera correcta")==false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,30}$/,$("#apellidos_personal"),$("#sapellidos_personal"),"Introduzca apellidos de manera correcta")==false) {
		mensajemodal("ERROR EN APELLIDOS");
		return false;
	}
	else if (validarkeyup(/^[0-9]{11}$/,$("#telefono_personal"),$("#stelefono_personal"),"Debe ser formato (04141234567)")==false) {
		mensajemodal("ERROR EN TELEFONO");
		return false;
	}
	else if ($("#cargo_personal").val()=="") {
		mensajemodal("ERROR EN CARGO");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$("#direccion_personal"),$("#sdireccion_personal"),"Solo letras y/o numeros entre 3 y 30 caracteres")==false) {
		mensajemodal("ERROR EN DIRECCION");
		return false;
	}
	else{
		return true;//devolver a verdadero si todos los campos estan completos y correctos	
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
				if(accion=='registrar_personal'){
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
				}else if(accion=='modificar_personal'){
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
	$("#club_personal").val('');
	$("#cedula_personal").val('');
	$("#nombres_personal").val('');
	$("#apellidos_personal").val('');
	$("#telefono_personal").val('');
	$("#cargo_personal").val('');
	$("#direccion_personal").val('');
	
}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario()
	$("#registrar_personal").show();
	$("#modificar_personal").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$(".texto").html('');
	$("#modificar_personal").show();
	$("#registrar_personal").hide();

	var linea = $(fila).closest('tr');
	$("#club_personal").val($(linea).find("td:eq(1)").text());
	$("#cedula_personal").val($(linea).find("td:eq(2)").text());
	$("#nombres_personal").val($(linea).find("td:eq(8)").text());
	$("#apellidos_personal").val($(linea).find("td:eq(9)").text());
	$("#telefono_personal").val($(linea).find("td:eq(4)").text());
	$("#cargo_personal").val($(linea).find("td:eq(5)").text());
	$("#direccion_personal").val($(linea).find("td:eq(6)").text());

}

function elimina(fila){
	var linea = $(fila).closest('tr');
	var cedula = $(linea).find("td:eq(2)");
	
	var datos = new FormData();
	datos.append('accion_personal','eliminar_personal');
	datos.append('cedula_personal',cedula.text());
	

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
					tabla.row(linea).remove().draw(false);
					mensajemodal("Eliminado correctamente");
				} else {
					mensajemodal(respuesta);
					setTimeout(function () {
					window.location.reload();
					}, 2000);
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