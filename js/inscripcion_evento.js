$(document).ready(function () {

	//control de input para mostrar imagen 
	$("#archivo").on("change",function(){
		mostrarImagen(this);
	});
				

	$("#imagen").on("error",function(){
		$(this).prop("src","img/atletas/icono_persona.png");
	});

	//Seccion para mostrar lo enviado en el modal mensaje//

	//Función que verifica que exista algo dentro de un div
	//oculto y lo muestra por el modal
	if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
	}
	
	$("#cedula_inscripcion").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
	}); 
	$("#cedula_inscripcion").on("keyup", function () {
		validarkeyup(/^[0-9]{7,8}$/, $(this), $("#scedula_inscripcion"), "Debe ser formato (15345987)");
		if($("#cedula_inscripcion").val().length > 7){
			var datos = new FormData();
			datos.append('accion_inscripcion', 'consulta_cedula');
			datos.append('cedula_inscripcion', $("#cedula_inscripcion").val());
			enviaAjax(datos, 'consulta_cedula');
		}
	});

	$("#nombre_inscripcion").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);//letras á é í ó ú ñ
	});
	$("#nombre_inscripcion").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $(this), $("#snombre_inscripcion"), "Introduzca nombre de manera correcta");
	});

	$("#peso_inscripcion").on("keypress", function(e){
		validarkeypress(/^[0-9.\b]*$/,e);
	});
	$("#peso_inscripcion").on("keyup", function(){
		validarkeyup(/^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/,$(this),$("#speso_inscripcion"),"Debe ser formato (Ej: 56.4)");
	});

	$("#incluir_evento").on("click", function(){
		if (validarboton()) {
			var datos = new FormData();
			var file = $("#archivo")[0].files[0];
			
			datos.append('accion_inscripcion', 'incluir_evento');
			datos.append('imagenarchivo', file);
			datos.append('evento_inscripcion',$("#evento_inscripcion").val());
			datos.append('cedula_inscripcion', $("#cedula_inscripcion").val());
			datos.append('nombre_inscripcion', $("#nombre_inscripcion").val());
			datos.append('sexo_inscripcion', $("#sexo_inscripcion").val());
			datos.append('peso_inscripcion', $("#peso_inscripcion").val());
			datos.append('fechadenacimiento', $("#fechadenacimiento").val());
			datos.append('estado',$("#estado").val());
			enviaAjax(datos, 'incluye');
			limpia_formulario()
		}
	});
	
	$("#evento_inscripcion").on("change",function(){
		$("#lista_inscritos").html('');
		
		var datos = new FormData();
		datos.append('accion_inscripcion','mostrarinscritos');
		datos.append('evento',$("#evento_inscripcion").val());
		enviaAjax(datos,'muestra');		
	});
	
});

function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}

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

function validarboton (){
	//ningun campo seleccionado
	if ($("#evento_inscripcion").val() == "" &&
		$("#sexo_inscripcion").val() == "" &&
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#nombre_inscripcion"), $("#snombre_inscripcion"), "Introduzca nombres de manera correcta") == false &&
		validarkeyup(/^[0-9]{7,8}$/, $("#cedula_inscripcion"), $("#scedula_inscripcion"), "Debe ser formato (15345987)") == false &&
		$("#fechadenacimiento").val() == "" &&
		validarkeyup(/^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/, $("#peso_inscripcion"), $("#speso_inscripcion"), "Debe ser formato (Ej: 56.4)") == false &&
		$("#estado").val()=="") {
		mensajemodal("NO HA SELECCION NINGUNA OPCION");
		return false;
	}
	//solo selecciono evento
	else if ($("#sexo_inscripcion").val()=="") {
		mensajemodal("SELECCIONE SEXO DE ATLETA");
		return false;
	}
	//solo selecciono atleta
	else if ($("#evento_inscripcion").val()=="") {
		mensajemodal("SELECCIONE ALGUNA OPCION EN EL CAMPO DE EVENTO");
		return false;
	}
	else if (validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,50}$/, $("#nombre_inscripcion"), $("#snombre_inscripcion"), "Introduzca nombres de manera correcta") == false) {
		mensajemodal("ERROR EN NOMBRE");
		return false;
	}
	
	else if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula_inscripcion"),$("#scedula_inscripcion"),"Debe ser formato (15345987)") == false) {
		mensajemodal("ERROR EN CEDULA");
		return false;
	}
		
	else if ($("#fechadenacimiento").val()=="") {
		mensajemodal("ERROR EN FECHA DE NACIMIENTO");
		return false;
	}
	
	else if (validarkeyup(/^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/,$("#peso_inscripcion"),$("#speso_inscripcion"),"Debe ser formato (Ej: 56.4)") == false) {
		mensajemodal("ERROR EN PESO");
		return false;
	}
		else if ($("#estado").val()=="") {
		mensajemodal("ERROR EN SELECCIONAR ESTADO");
		return false;
	}
	
	else{
		return true;
	}
}

function elimina(p){
	var linea = $(p).closest('tr');
	var cedula = $(linea).find("td:eq(1)");
	var id_evento = $(linea).find("td:eq(8)");
	
	var datos = new FormData();
		datos.append('accion_inscripcion','eliminaatleta');
		datos.append('evento',id_evento.text());
		datos.append('cedula_inscripcion',cedula.text());
		enviaAjax(datos,'elimina');
	linea.remove();	
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
			beforeSend: function(){
				
				
			},
			timeout:10000,
            success: function(respuesta) {//si resulto exitosa la transmision
			
			
				if(accion=='muestra'){
					try{
						$("#lista_inscritos").html(respuesta);
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				} 
				else if (accion=='consulta_cedula') {
					arreglo = JSON.parse(respuesta);
					if(arreglo['resultado']=='encontro'){  
						$("#nombre_inscripcion").val(arreglo[0].nombre);
						$("#sexo_inscripcion").val(arreglo[0].sexo);
						$("#peso_inscripcion").val(arreglo[0].peso);
						$("#fechadenacimiento").val(arreglo[0].fechadenacimiento);
					} else {
						mensajemodal("Atleta no registrado en sistema, ingrese los datos para inscribir");
					}
				}
					
				else if(accion=='elimina'){
					try{
						if(respuesta=='eliminado'){
							mensajemodal("Atleta eliminado de evento");
						} else {
							mensajemodal("No elimino atleta de evento");
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				}
				else if(accion=='incluye'){
					try{
						let fila = respuesta.indexOf('<tr>');
						if(fila !== -1){
							$("#lista_inscritos").html(respuesta);
							mensajemodal("Atleta incluido en el evento");
						}
						else{
							mensajemodal(respuesta);
						}
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				}
            },
            error: function(request, status, err){

				if (status == "timeout") {
					mensajemodal("Servidor ocupado, intente de nuevo");
				} else {
				    mensajemodal("ERROR: <br/>" + request + status + err);
				}
            },
			complete: function(){
				
			}
			
    });
    
    
	
}

//funcion para mostrar la imagen antes de subirla al servidor
function mostrarImagen(f) {
	
	var tamano = f.files[0].size;
    var megas = parseInt(tamano / 1024);
     
    if(megas > 1024){
		 mensajemodal("La imagen debe ser igual o menor a 1024 K");
         $(f).val('');
    }
    else{	
		if (f.files && f.files[0]) {
			var reader = new FileReader();
				reader.onload = function (e) {
				$('#imagen').attr('src', e.target.result);
			}
			reader.readAsDataURL(f.files[0]);
		}
	}
}
//fin de funcion mostrar imagen
 
function limpia_formulario() {
	
	$("#cedula_inscripcion").val('');
	$("#nombre_inscripcion").val('');
	$("#sexo_inscripcion").val('');
	$("#fechadenacimiento").val('');
	$("#peso_inscripcion").val('');
	$("#estado").val('');
}