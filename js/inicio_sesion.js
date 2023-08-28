$(document).ready(function(){

	//Seccion para mostrar lo enviado en el modal mensaje//

	//Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
	} 
 	
 	$("#cedula_inicio").on("keypress",function(e){
 		validarkeypress(/^[0-9\b]*$/,e);
 	});
	
	
	$("#contrasena_inicio").on("keypress", function (e) {
		validarkeypress(/^[a-zA-Z0-9#$_*.\b\u00f1\u00d1]*$/,e);
	});
 	//VALIDACION DE BOTONES
	$("#iniciar_sesion").on("click", function(){
		if (validarboton()) {
			var datos = new FormData();
			datos.append('accion_inicio_sesion','iniciar_sesion');
			datos.append('cedula_inicio',$("#cedula_inicio").val());
			datos.append('contrasena_inicio', $("#contrasena_inicio").val());
			datos.append("g-recaptcha-response", $("#g-recaptcha-response").val());
			enviaAjax(datos);
			limpia_formulario();
		}
	});


}); 
 
function validarkeypress(er,e){

	codigo = e.keyCode; //codigo ascii

	tecla = String.fromCharCode(codigo);//transformar codigo ascii generado al pulsar boton a una tecla

	tecla_bien = er.test(tecla); //evalua con la expresion regular y almacena

	//elimnina tecla fuera de la expresion regular
	if (!tecla_bien) {
		e.preventDefault();
	}
}


function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}
   
function validarboton(){
	if ($("#cedula_inicio").val()=="" && $("#contrasena_inicio").val()=="") {
		mensajemodal("NO INGRESO NINGUN CAMPO");
		return false;
	}
	else if ($("#cedula_inicio").val()=="") {
		mensajemodal("NO INGRESO CEDULA");
		return false;
	}
	else if($("#contrasena_inicio").val()==""){
		mensajemodal("NO INGRESO CONTRASEÑA");
		return false;
	}
	else {
		return true;
	}
	
} 

function enviaAjax(datos){
	
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
            	if (respuesta=='ok') {
            		location = "?pagina=principal";
				}
				else {
			   		mensajemodal(respuesta);
			   	}
            },
            error: function(){
			   mensajemodal("Error con ajax");	
            }
			
    }); 
	
}

function limpia_formulario(){
	$("#cedula_inicio").val('');
	$("#contrasena_inicio").val('');
	grecaptcha.reset(0);
}