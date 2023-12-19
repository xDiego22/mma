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
			data: { accion_evento: "consultar" },
		},
		columns: [
			{ data: "id_club",className: "d-none" },
			{ data: "nombre_evento" },
			{ data: "fecha" },
			{ data: "hora" },
			{ data: "monto" },
			{ data: "club" },
			{ data: "direccion" },
			{ data: "juez1" },
			{ data: "juez2" },
			{ data: "juez3" },
			{ data: "opciones" },
		],
		columnDefs: [
			{	target: -1,searchable: false,},
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
 
    $("#nombre_evento").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e)//letras á é í ó ú ñ
	});
	$("#nombre_evento").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/,$(this),$("#snombre_evento"),"Solo letras y/o numeros entre 5 y 30 caracteres");
	});

	$("#monto_evento").on("keypress",function(e){
		validarkeypress(/^[0-9.,bsB$\b]*$/,e);
	});
	$("#monto_evento").on("keyup", function(){
		validarkeyup(/^[0-9]{1,11}[.,]{0,1}[0-9]{0,2}[bsB$]{0,2}$/,$(this),$("#smonto_evento"),"Debe ser formato (25,10bs)");
	});

	$("#direccion_evento").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,.#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e);//letras á é í ó ú ñ
	});
	$("#direccion_evento").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,.#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$(this),$("#sdireccion_evento"),"Solo letras y/o numeros entre 3 y 30 caracteres");
	});

	$("#juez1").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});

	$("#juez1").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$(this),$("#sjuez1"),"Introduzca nombre de manera correcta");
	});



	$("#juez2").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#juez2").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$(this),$("#sjuez2"),"Introduzca nombre de manera correcta");
	});

	$("#juez3").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});

	$("#juez3").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$(this),$("#sjuez3"),"Introduzca nombre de manera correcta");
	});



//VALIDACION DE BOTONES
	$("#registrar_evento").on("click", function(){
		if (validarboton()) {
			var datos = new FormData();
			datos.append('accion_evento','registrar_evento');			
			datos.append('nombre_evento',$("#nombre_evento").val());
			datos.append('fecha_evento',$("#fecha_evento").val());
			datos.append('hora_evento',$("#hora_evento").val());
			datos.append('club_responsable_evento',$("#club_responsable_evento").val());
			datos.append('monto_evento',$("#monto_evento").val());
			datos.append('direccion_evento', $("#direccion_evento").val());
			datos.append('juez1',$("#juez1").val());
			datos.append('juez2', $("#juez2").val());
			datos.append('juez3',$("#juez3").val());
			enviaAjax(datos, 'registrar_evento');
			
			
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar_evento").on("click", function(){
		if (validarboton()) {
			var datos = new FormData();
			datos.append('accion_evento','modificar_evento');			
			datos.append('nombre_evento',$("#nombre_evento").val());
			datos.append('fecha_evento',$("#fecha_evento").val());
			datos.append('hora_evento',$("#hora_evento").val());
			datos.append('club_responsable_evento',$("#club_responsable_evento").val());
			datos.append('monto_evento',$("#monto_evento").val());
			datos.append('direccion_evento', $("#direccion_evento").val());
			datos.append('juez1',$("#juez1").val());
			datos.append('juez2', $("#juez2").val());
			datos.append('juez3',$("#juez3").val());
			enviaAjax(datos, 'modificar_evento');
			
			
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

function validarboton (){

	//campos vacios
   if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/,$("#nombre_evento"),$("#snombre_evento"),"Solo letras y/o numeros entre 5 y 30 caracteres")==false && $("#fecha_evento").val()=="" && $("#hora_evento").val()=="" && $("#club_responsable_evento").val()=="" && validarkeyup(/^[0-9]{1,11}[.,]{0,1}[0-9]{0,2}[bsB$]{0,2}$/,$("#monto_evento"),$("#smonto_evento"),"Debe ser formato (25,10bs)")==false && validarkeyup(/^[A-Za-z0-9,.#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$("#direccion_evento"),$("#sdireccion_evento"),"Solo letras y/o numeros entre 3 y 30 caracteres")==false && validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez1"),$("#sjuez1"),"Introduzca nombre de manera correcta") == false && validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez2"),$("#sjuez2"),"Introduzca nombre de manera correcta") == false && validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez3"),$("#sjuez3"),"Introduzca nombre de manera correcta") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}
	//campos individuales
    //le falta el nombre
    else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_evento"),$("#snombre_evento"),"Solo letras y/o numeros entre 5 y 30 caracteres")==false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}
	//le falta fecha
	else if ($("#fecha_evento").val()=="") {
	    mensajemodal("ERROR EN FECHA");
		return false;
	}
	//le falta hora del evento
	else if ($("#hora_evento").val()=="") {
		mensajemodal("ERROR EN HORA");
		return false;
	}
	else if ($("#club_responsable_evento").val()=="") {
	    mensajemodal("ERROR EN CLUB RESPONASABLE");
		return false;
	}
	
	//le falta monto del evento
	else if (validarkeyup(/^[0-9]{1,11}[.,]{0,1}[0-9]{0,2}[bsB$]{0,2}$/,$("#monto_evento"),$("#smonto_evento"),"Debe ser formato (25,10bs)")==false) {
		mensajemodal("ERROR EN MONTO");
		return false;
	}
	//le falta direccion
	else if (validarkeyup(/^[A-Za-z0-9,.#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/, $("#direccion_evento"), $("#sdireccion_evento"),"Solo letras y/o numeros entre 3 y 30 caracteres")==false) {
		mensajemodal("ERROR EN DIRECCION");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez1"),$("#sjuez1"),"Introduzca nombre de manera correcta") == false){
		mensajemodal("ERROR EN JUEZ 1");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez2"),$("#sjuez2"),"Introduzca nombre de manera correcta") == false){
		mensajemodal("ERROR EN JUEZ 2");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{3,50}$/,$("#juez3"),$("#sjuez3"),"Introduzca nombre de manera correcta") == false){
		mensajemodal("ERROR EN JUEZ 2");
		return false;
	}
	else {
		return true; //devolver a verdadero si todos los campos estan completos y correctos
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
            	if(accion=='registrar_evento'){
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
				}else if(accion=='modificar_evento'){
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
	$("#nombre_evento").val('');
	$("#fecha_evento").val('');
	$("#hora_evento").val('');
	$("#club_responsable_evento").val('');
	$("#monto_evento").val('');
	$("#direccion_evento").val('');
	$("#juez1").val('');
	$("#juez2").val('');
	$("#juez3").val('');
}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario()
	$("#registrar_evento").show();
	$("#modificar_evento").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$(".texto").html('');
	$("#modificar_evento").show();
	$("#registrar_evento").hide();

	var linea = $(fila).closest('tr');
	$("#nombre_evento").val($(linea).find("td:eq(1)").text());
	$("#fecha_evento").val($(linea).find("td:eq(2)").text());
	$("#hora_evento").val($(linea).find("td:eq(3)").text());
	$("#club_responsable_evento").val($(linea).find("td:eq(0)").text());
	$("#monto_evento").val($(linea).find("td:eq(4)").text());
	$("#direccion_evento").val($(linea).find("td:eq(6)").text());
	$("#juez1").val($(linea).find("td:eq(7)").text());
	$("#juez2").val($(linea).find("td:eq(8)").text());
	$("#juez3").val($(linea).find("td:eq(9)").text());
	
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
			
			var linea = $(fila).closest("tr");
			var nombre = $(linea).find("td:eq(1)");

			var datos = new FormData();
			datos.append("accion_evento", "eliminar_evento");
			datos.append("nombre_evento", nombre.text());
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