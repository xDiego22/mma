var tabla;
$(document).ready(function () {
	
	//accion de datatable js
	 
	tabla = $("#tablaconsulta").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
    },
    ajax: {
      url: "",
      type: "POST",
      data: { accion_club: "consultar" },
    },
    columns: [
      { data: "codigo" },
      { data: "nombre" },
      { data: "telefono" },
      { data: "deportebase" },
      { data: "direccion" },
      { data: "opciones" },
    ],
    columnDefs: [
      {
        target: -1,
        searchable: false,
      },
    ],
    lengthMenu: [
      [5, 10, 15],
      [5, 10, 15],
    ],

    ordering: false,
    info: false,
  });

	//Seccion para mostrar lo enviado en el modal mensaje//

	//Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
	}

	$("#codigo_club").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9\b]*$/,e)
	});
	$("#codigo_club").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9]{3,10}$/,$(this),$("#scodigo_club"),"Solo letras y/o numeros entre 3 y 10 caracteres");
	});

	$("#nombre_club").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e)//letras á é í ó ú ñ
	});
	$("#nombre_club").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/,$(this),$("#snombre_club"),"Solo letras y/o numeros entre 5 y 30 caracteres");
	});

	$("#telefono_club").on("keypress",function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	});
	$("#telefono_club").on("keyup", function(){
		validarkeyup(/^[0-9]{11}$/,$(this),$("#stelefono_club"),"Debe ser formato (04141234567)");
	});

	$("#direccion_club").on("keypress", function(e){
		validarkeypress(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]*$/,e);//letras á é í ó ú ñ
	});
	$("#direccion_club").on("keyup", function(){
		validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$(this),$("#sdireccion_club"),"Solo letras y/o numeros entre 3 y 30 caracteres");
	});

	//VALIDACION DE BOTONES
	$("#registrar_club").on("click", function () {
		if (validarboton()) {
			var datos = new FormData();
			datos.append('accion_club','registrar_club');
			datos.append('codigo_club',$("#codigo_club").val());
			datos.append('nombre_club',$("#nombre_club").val());
			datos.append('telefono_club',$("#telefono_club").val());
			datos.append('deporte_club',$("#deporte_club").val());
			datos.append('direccion_club',$("#direccion_club").val());
			enviaAjax(datos,'registrar_club');
		
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar_club").on("click", function () {
		
		if (validarboton()) {
			var datos = new FormData();
			datos.append('accion_club','modificar_club');
			datos.append('codigo_club',$("#codigo_club").val());
			datos.append('nombre_club',$("#nombre_club").val());
			datos.append('telefono_club',$("#telefono_club").val());
			datos.append('deporte_club',$("#deporte_club").val());
			datos.append('direccion_club',$("#direccion_club").val());
			enviaAjax(datos,'modificar_club');
			
			
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
	if (validarkeyup(/^[A-Za-z0-9]{3,10}$/, $("#codigo_club"), $("#scodigo_club"), "Solo letras y/o numeros entre 5 y 10 caracteres") == false && validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/, $("#nombre_club"), $("#snombre_club"), "Solo letras y/o numeros entre 5 y 30 caracteres") == false && validarkeyup(/^[0-9]{11}$/, $("#telefono_club"), $("#stelefono_club"), "Debe ser formato (04141234567)") == false && $("#deporte_club").val() == "" && validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/, $("#direccion_club"), $("#sdireccion_club"), "Solo letras y/o numeros entre 3 y 30 caracteres") == false) {
		$("#modal_gestion").modal("hide");
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}
	//campos faltantes individules
	//falta codigo del club
	else if(validarkeyup(/^[A-Za-z0-9]{3,10}$/,$("#codigo_club"),$("#scodigo_club"),"Solo letras y/o numeros entre 5 y 10 caracteres")==false){
		mensajemodal("ERROR EN CODIGO");
		return false;
	}
	//falta nombre del club
	else if (validarkeyup(/^[A-Za-z0-9\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{5,30}$/,$("#nombre_club"),$("#snombre_club"),"Solo letras y/o numeros entre 5 y 30 caracteres")==false) {
		mensajemodal("ERORR EN NOMBRE");
		return false;
	}
	//falta telefono
	else if (validarkeyup(/^[0-9]{11}$/,$("#telefono_club"),$("#stelefono_club"),"Debe ser formato (04141234567)")==false) {
		mensajemodal("ERORR EN TELEFONO");
		return false;
	} 
	//falta deporte base
	else if ($("#deporte_club").val()==""){
		mensajemodal("ERORR EN DEPORTE");
		return false;
	}
	//falta direccion
	else if (validarkeyup(/^[A-Za-z0-9,#\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1-]{3,30}$/,$("#direccion_club"),$("#sdireccion_club"),"Solo letras y/o numeros entre 3 y 30 caracteres")==false){
		mensajemodal("ERORR EN DIRECCION");
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
				
				if(accion=='registrar_club'){
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
				}else if(accion=='modificar_club'){
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
	$("#codigo_club").val('');
	$("#nombre_club").val('');
	$("#telefono_club").val('');
	$("#deporte_club").val('');
	$("#direccion_club").val('');
}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario()
	$("#registrar_club").show();
	$("#modificar_club").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$(".texto").html('');
	$("#modificar_club").show();
	$("#registrar_club").hide();

	var linea = $(fila).closest('tr');
	$("#codigo_club").val($(linea).find("td:eq(0)").text());
	$("#nombre_club").val($(linea).find("td:eq(1)").text());
	$("#telefono_club").val($(linea).find("td:eq(2)").text());
	$("#deporte_club").val($(linea).find("td:eq(3)").text());
	$("#direccion_club").val($(linea).find("td:eq(4)").text());
	
}

function elimina(fila){
	var linea = $(fila).closest('tr');
	var codigo = $(linea).find("td:eq(0)");
	
	var datos = new FormData();
	datos.append('accion_club','eliminar_club');
	datos.append('codigo_club',codigo.text());
	
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
