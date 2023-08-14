$(document).ready(function(){

	//accion de datatable js
	 
	$('#tablaconsulta').DataTable( {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
		},
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

	$("#cedula_usuarios").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	});
	$("#cedula_usuarios").on("keyup", function(){
		validarkeyup(/^[0-9]{7,8}$/, $(this),$("#scedula_usuarios"),"Debe ser formato (15345987)");
	});

	$("#nombre_usuarios").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);
	});

	$("#nombre_usuarios").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/, $(this), $("#snombre_usuarios"), "Introduzca nombre de manera correcta");
	});

	$("#contrasena_usuarios").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/,e);
	});
	$("#contrasena_usuarios").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$(this),$("#scontrasena_usuarios"),"Ingrese contraseña correctamente");
	});

	$("#contrasena2_usuarios").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/,e);
	});
	$("#contrasena2_usuarios").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$(this),$("#scontrasena2_usuarios"),"Ingrese confirmacion de contraseña correctamente");
	}); 

	$("#correo_usuarios").on("keypress", function (e) {
    	validarkeypress(/^[A-Za-z0-9@_.\b\u00f1\u00d1\u00E0-\u00FC-]*$/, e);
	});
	
	$("#correo_usuarios").on("keyup", function (e) {
    	validarkeyup(/^[0-9A-Za-z_.\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,$("#correo_usuarios"),$("#scorreo_usuarios"),"formato de correo incorrecto") == false
  	});

	//VALIDACION DE BOTONES
	$("#registrar_usuarios").on("click", function(){
		if (validarboton()){
			var datos = new FormData();
			datos.append('accion_usuarios','registrar_usuarios');
			datos.append('cedula_usuarios', $("#cedula_usuarios").val());
			datos.append('nombre_usuarios',$("#nombre_usuarios").val());
			datos.append('contrasena_usuarios',$("#contrasena_usuarios").val());
			datos.append('contrasena2_usuarios',$("#contrasena2_usuarios").val());
			datos.append('rol_usuario', $("#rol_usuario").val());
			datos.append("correo_usuarios", $("#correo_usuarios").val());
			enviaAjax(datos, 'registrar_usuarios');
			
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar_usuarios").on("click", function(){
		if (validarboton()){
			var datos = new FormData();
			datos.append('accion_usuarios','modificar_usuarios');
			datos.append('cedula_usuarios',$("#cedula_usuarios").val());
			datos.append('nombre_usuarios',$("#nombre_usuarios").val());
			datos.append('contrasena_usuarios',$("#contrasena_usuarios").val());
			datos.append('contrasena2_usuarios',$("#contrasena2_usuarios").val());
			datos.append('rol_usuario', $("#rol_usuario").val());
			datos.append("correo_usuarios", $("#correo_usuarios").val());
			enviaAjax(datos,'modificar_usuarios');
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
	//ningun campo completado
	if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula_usuarios"), $("#scedula_usuarios"), "Debe ser formato (15345987)") == false &&
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/, $("#contrasena_usuarios"), $("#scontrasena_usuarios"), "Ingrese contraseña correctamente") == false &&
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/, $("#contrasena2_usuarios"), $("#scontrasena2_usuarios"), "Ingrese confirmacion de contraseña correctamente") == false &&
		$("#rol_usuario").val()=="" && validarkeyup(/^[0-9A-Za-z_.\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,$("#correo_usuarios"),$("#scorreo_usuarios"),"ERROR EN CORREO") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
	}

	//solo cedula
	else if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula_usuarios"),$("#scedula_usuarios"),"Debe ser formato (15345987)")==false) {
		mensajemodal("ERROR EN CEDULA");
		return false;
	}

	//solo nombre
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/, $("#nombre_usuarios"),$("#scedula_usuarios"),"Debe ser formato (15345987)")==false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}

	//solo contraseña
	else if (validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$("#contrasena_usuarios"),$("#scontrasena_usuarios"),"Ingrese contraseña correctamente")==false) {
		mensajemodal("ERROR EN CONTRASEÑA");
		return false;
	}

	//solo confirmacion de contraseña
	else if (validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$("#contrasena2_usuarios"),$("#scontrasena2_usuarios"),"Solo debe ser A-Z a-z 0-9 _ . - entre 6 a 20 caracteres")==false) {
		mensajemodal("ERROR EN CONFIRMACION DE CONTRASEÑA");
		return false;
	}
		
	else if (validarkeyup(/^[0-9A-Za-z_.\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,$("#correo_usuarios"),$("#scorreo_usuarios"),"formato de correo incorrecto") == false
  ) {
	mensajemodal("ERROR EN CORREO");
  }

  //tipo de usuario
  else if ($("#rol_usuario").val() == "") {
    mensajemodal("ERROR EN ROL DE USUARIO");
    return false;
  }

  //contraseña y la confirmacion de la contraseña no coinciden
  else if (
    $("#contrasena_usuarios").val() != $("#contrasena2_usuarios").val()
  ) {
    mensajemodal("LAS CONTRASEÑAS NO COINCIDEN <br> INGRESELAS CORRECTAMENTE");
    return false;
  } else {
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
            success: function(respuesta) {//si resulto exitosa la transmision
            	if(accion=='eliminar_usuarios'){
					try{
						if(respuesta=='eliminado'){
							mensajemodal("Eliminado correctamente");
						} else {
							mensajemodal("No se pudo eliminar debido a informacion dependiente en otra tabla");
							setTimeout(function() {
								window.location.reload();
								},2000);
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				}else if(accion=='registrar_usuarios'){
					try{
						let fila = respuesta.indexOf('<tr>');
						if(fila !== -1){
							$("#resultadoconsulta").html(respuesta);
							mensajemodal("Registrado Correctamente");
						}
						else{
							mensajemodal(respuesta);
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				}else if(accion=='modificar_usuarios'){
					try{
						let fila = respuesta.indexOf('<tr>');
						if(fila !== -1){
							$("#resultadoconsulta").html(respuesta);
							mensajemodal("Modificado Correctamente");
						}
						else{
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
	$("#cedula_usuarios").val('');
	$("#nombre_usuarios").val('');
	$("#contrasena_usuarios").val('');
	$("#contrasena2_usuarios").val('');
	$("#rol_usuario").val('');
	$("#correo_usuarios").val("");
	
}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$(".texto").html('') ;
	limpia_formulario()
	$("#registrar_usuarios").show();
	$("#modificar_usuarios").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$(".texto").html('');
	$("#modificar_usuarios").show();
	$("#registrar_usuarios").hide();

	var linea = $(fila).closest('tr');
	$("#cedula_usuarios").val($(linea).find("td:eq(0)").text());
	$("#nombre_usuarios").val($(linea).find("td:eq(1)").text());
	//$("#contrasena_usuarios").val($(linea).find("td:eq(2)").text());
	//$("#contrasena2_usuarios").val($(linea).find("td:eq(2)").text());
	$("#rol_usuario").val($(linea).find("td:eq(6)").text());

	$("#correo_usuarios").val($(linea).find("td:eq(2)").text());
}


function elimina(fila){
	var linea = $(fila).closest('tr');
	var cedula = $(linea).find("td:eq(0)");
	
	var datos = new FormData();
	datos.append('accion_usuarios','eliminar_usuarios');
	datos.append('cedula_usuarios',cedula.text());
	enviaAjax(datos,'eliminar_usuarios');
	
	linea.remove();	
}