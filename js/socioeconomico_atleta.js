$(document).ready(function () {
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
	});

	//Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
    }
    //VALIDACION DE BOTONES

	$("#registrar").on("click", function(){
		if (validarboton()) {			
			var datos = new FormData();
			datos.append('accion_socioeconomico','registrar');	
			
			//socioeconomica
            datos.append('nombre_atleta', $("#nombre_atleta").val());
			datos.append('tipo_vivienda', $("#tipo_vivienda").val());
			datos.append('zona_vivienda', $("#zona_vivienda").val());

			datos.append('habitantes_vivienda', $("#habitantes_vivienda").val());
			datos.append('propiedad_vivienda', $("#propiedad_vivienda").val());
			//servicio basico
			if ($("#internet").is(":checked")) {
				datos.append('internet','POSEE');
			}
			else {
				datos.append('internet','NO POSEE');
			}
			
			if ($("#luz").is(":checked")) {
				datos.append('luz','POSEE');
			}
			else {
				datos.append('luz','NO POSEE');
			}
			
			if ($("#agua").is(":checked")) {
				datos.append('agua','POSEE');
			}
			else {
				datos.append('agua','NO POSEE');
			}
			
			if ($("#telefono_residencial").is(":checked")) {
				datos.append('telefono_residencial','POSEE');
			}
			else {
				datos.append('telefono_residencial','NO POSEE');
			}

			if ($("#cable").is(":checked")) {
				datos.append('cable','POSEE');
			}
			else {
				datos.append('cable','NO POSEE');
			}

			enviaAjax(datos,'registrar');
			
		}
		$("#modal_gestion").modal("hide");
		limpia_formulario();
	});

	$("#modificar").on("click", function(){
		if (validarboton()) {			
			var datos = new FormData();

			datos.append('accion_socioeconomico','modificar');			

            datos.append('nombre_atleta', $("#nombre_atleta").val());
    
			datos.append('tipo_vivienda', $("#tipo_vivienda").val());
			datos.append('zona_vivienda', $("#zona_vivienda").val());

			datos.append('habitantes_vivienda', $("#habitantes_vivienda").val());
			datos.append('propiedad_vivienda', $("#propiedad_vivienda").val());
			//servicio basico
			if ($("#internet").is(":checked")) {
				datos.append('internet','POSEE');
			}
			else {
				datos.append('internet','NO POSEE');
			}
			
			if ($("#luz").is(":checked")) {
				datos.append('luz','POSEE');
			}
			else {
				datos.append('luz','NO POSEE');
			}
			
			if ($("#agua").is(":checked")) {
				datos.append('agua','POSEE');
			}
			else {
				datos.append('agua','NO POSEE');
			}
			
			if ($("#telefono_residencial").is(":checked")) {
				datos.append('telefono_residencial','POSEE');
			}
			else {
				datos.append('telefono_residencial','NO POSEE');
			}

			if ($("#cable").is(":checked")) {
				datos.append('cable','POSEE');
			}
			else {
				datos.append('cable','NO POSEE');
			}
            
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
            	//aqui el envio es diferente porque se envia la localizacion por aqui
				if(accion=='eliminar'){
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
				}else if(accion=='registrar'){
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
				}else if(accion=='modificar'){
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
	//socioecomico
    $("#nombre_atleta").val('');
	$("#tipo_vivienda").val('');
	$("#zona_vivienda").val('');
	$("#propiedad_vivienda").val('');
	$("#habitantes_vivienda").val('');
	$("#internet").prop("checked", false);
	$("#luz").prop("checked",false);
	$("#agua").prop("checked", false); 
	$("#telefono_residencial").prop("checked",false);
	$("#cable").prop("checked",false);
}

function validarboton() {
    
	//ningun campo
	if ($("#nombre_atleta").val() == false &&
		$("#tipo_vivienda").val() == false &&
		$("#zona_vivienda").val() == false &&
		$("#propiedad_vivienda").val() == false &&
		$("#habitantes_vivienda").val() == false) {
		mensajemodal("NO INGRESO NINGUN DATO");
		return false;
	}
    else if ($("#nombre_atleta").val()==false) {
        mensajemodal("ERROR EN ATLETA");
		return false;
    }
	else if($("#tipo_vivienda").val()==false){
		mensajemodal("ERROR EN TIPO DE VIVIENDA");
		return false;
	}
	else if($("#zona_vivienda").val()==false){
		mensajemodal("ERROR EN ZONA DE VIVIENDA");
		return false;
	}
	else if($("#propiedad_vivienda").val()==false){
		mensajemodal("ERROR EN PROPIEDAD DE LA VIVIENDA");
		return false;
	}
	else if($("#habitantes_vivienda").val()==false){
		mensajemodal("ERROR EN HABITANTES DE VIVIENDA");
		return false;
	}
	
	else{
		return true;
	}

}

function modalregistrar() {
	$("#modal_gestionlabel").html("Registrar");
	$("span").html('') ;
	limpia_formulario()
	$("#registrar").show();
	$("#modificar").hide();
}

function modalmodificar(fila) {
	$("#modal_gestionlabel").html("Modificar");
	$("span").html('');
	$("#modificar").show();
	$("#registrar").hide();

	var linea = $(fila).closest('tr');
	
	//socioeconomicos
    $("#nombre_atleta").val($(linea).find("td:eq(0)").text())
	$("#tipo_vivienda").val($(linea).find("td:eq(3)").text());
	$("#zona_vivienda").val($(linea).find("td:eq(4)").text());
	$("#habitantes_vivienda").val($(linea).find("td:eq(5)").text());
	$("#propiedad_vivienda").val($(linea).find("td:eq(6)").text());
	
	if($(linea).find("td:eq(7)").text()=="POSEE"){
		$("#internet").prop("checked",true);
	}
	if($(linea).find("td:eq(8)").text()=="POSEE"){
		$("#luz").prop("checked",true);
	}
	if($(linea).find("td:eq(9)").text()=="POSEE"){
		$("#agua").prop("checked",true);
	}
	if($(linea).find("td:eq(10)").text()=="POSEE"){
		$("#telefono_residencial").prop("checked",true);
	}
	if($(linea).find("td:eq(11)").text()=="POSEE"){
		$("#cable").prop("checked",true);
	}

}

function elimina(fila){
	var linea = $(fila).closest('tr');
	var nombre = $(linea).find("td:eq(0)");
	
	var datos = new FormData();
	datos.append('accion_socioeconomico','eliminar');
	datos.append('nombre_atleta',nombre.text());
	enviaAjax(datos,'eliminar');
	
	linea.remove();	
}