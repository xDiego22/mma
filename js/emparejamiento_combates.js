
var filas_coincidentes;

$(document).ready(function () {
  
	$("#emparejar_combate").on("click", function(){
		if (validarboton()) {
			atleta = [];
			$("#lista_coincidentes tr").each(function(){
				atleta.push($(this).find('td:eq(0)').text());
			});
			
			var datos = new FormData();
			datos.append('accion','guardar');
			datos.append('evento',$("#evento_emparejamiento").val());
			datos.append('atleta',JSON.stringify(atleta));
			enviaAjax(datos,"guarda");
		}
	});
	
	$("#edad").on("change", function(){
		$("#peso").html('');
		if($(this).val()=='1'){
			var l = `
				<option value="" hidden="" selected="hidden">Seleccione</option>
				<option value=""></option>
				<option value="1">0 a 27</option>	
				<option value="2">28 a 35</option>
				<option value="3">36 a 41</option>
				<option value="4">41 +</option>
			`;
			$("#peso").append(l);
		}
		else if($(this).val()=='2'){
			var l = `
				<option value="" hidden="" selected="hidden">Seleccione</option>
				<option value=""></option>
				<option value="1">55 a 60</option>	
				<option value="2">61 a 66</option>
				<option value="3">67 a 74</option>
				<option value="4">75 +</option>
			`;
			$("#peso").append(l);
		}
        else if($(this).val()=='3'){
			var l = `
				<option value="" hidden="" selected="hidden">Seleccione</option>
				<option value=""></option>
				<option value="1">55 a 60</option>	
				<option value="2">61 a 66</option>
				<option value="3">67 a 74</option>
				<option value="4">75 a 82</option>
				<option value="5">82 +</option>
			`;
			$("#peso").append(l);
		}
		else if($(this).val()=='4'){
			var l = `
				<option value="" hidden="" selected="hidden">Seleccione</option>
				<option value=""></option>
				<option value="1">55 a 60</option>	
				<option value="2">61 a 70</option>
				<option value="3">71 a 80</option>
				<option value="4">81 a 90</option>
				<option value="5">90 +</option>
			`;
			$("#peso").append(l);
		}
		
		$("#lista_coincidentes").html('');
		var opciones = ['cedula DESC', 'nombre DESC', 'cedula ASC', 'nombre ASC'];
		var calculo = Math.floor(Math.random() * opciones.length); //calcula valor aleatorio de un array
		var valor = opciones[calculo];

		var datos = new FormData();
		datos.append('accion','mostrar');
		datos.append('evento',$("#evento_emparejamiento").val());
		datos.append('sexo',$("#sexo").val());
		datos.append('edad',$("#edad").val());
		datos.append('peso', $("#peso").val());
		datos.append('orden', valor);
		
		enviaAjax(datos, 'muestra');
		
	});
	
	$("#peso").on("change", function () {
		var opciones = ['cedula DESC', 'nombre DESC', 'cedula ASC', 'nombre ASC', 'edad', 'peso'];
		var calculo = Math.floor(Math.random() * opciones.length); //calcula valor aleatorio de un array
		var valor = opciones[calculo];

		var datos = new FormData();
		datos.append('accion','mostrar');
		datos.append('evento',$("#evento_emparejamiento").val());
		datos.append('sexo',$("#sexo").val());
		datos.append('edad',$("#edad").val());
		datos.append('peso', $("#peso").val());
		datos.append('orden', valor);
		
		enviaAjax(datos, 'muestra');
	}); 
	
	$("#sexo").on("change", function () {
		var opciones = ['cedula DESC', 'nombre DESC', 'cedula ASC', 'nombre ASC', 'edad', 'peso'];
		var calculo = Math.floor(Math.random() * opciones.length); //calcula valor aleatorio de un array
		var valor = opciones[calculo];
		
		var datos = new FormData();
		datos.append('accion','mostrar');
		datos.append('evento',$("#evento_emparejamiento").val());
		datos.append('sexo',$("#sexo").val());
		datos.append('edad',$("#edad").val());
		datos.append('peso', $("#peso").val());
		datos.append('orden', valor);
		
		enviaAjax(datos, 'muestra');
	});

	$("#evento_emparejamiento").on("change", function () {
		var opciones = ['cedula DESC', 'nombre DESC', 'cedula ASC', 'nombre ASC', 'edad', 'peso'];
		var calculo = Math.floor(Math.random() * opciones.length); //calcula valor aleatorio de un array
		var valor = opciones[calculo];

		var datos = new FormData();
		datos.append('accion','mostrar');
		datos.append('evento',$("#evento_emparejamiento").val());
		datos.append('sexo',$("#sexo").val());
		datos.append('edad',$("#edad").val());
		datos.append('peso', $("#peso").val());
		datos.append('orden', valor);
		
		enviaAjax(datos, 'muestra');
		$("#ronda").val('2');
	});

	$("#siguiente_ronda").on("click", function() {
		
		if (validar_siguiente()) {
			enviaAjax2($("#formulario_emparejamiento"));
		}
		
    });

});

function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}

function validarboton (){

	if ($("#lista_emparejada tr").length<1) {
		mensajemodal("NO HAY EMPAREJAMIENTOS");
		return false;
	}
	else{
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
			beforeSend: function(){},
			timeout:10000,
            success: function(respuesta) {
				if(accion=='muestra'){
					try{
						$("#lista_coincidentes").html(respuesta);
						filas_coincidentes = $("#lista_coincidentes tr").length;
						empareja();
					}
					catch(e){
						mensajemodal("Error en Ajax "+e.name+" !!!");
					}
				}
				else{
					try{
						mensajemodal(respuesta);
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
			complete: function(){}
			
    });
}
 
function enviaAjax2(datos) {
	$.ajax({ 
		    async: true,
            url: '', 
            type: 'POST',
            data: datos.serialize(),
            beforeSend: function(){},
            timeout:10000,
            success: function(respuesta) {
				mensajemodal('Ronda Guardada');
				eliminar();
            },
            error: function(){
				mensajemodal("Error con ajax");	
            }
    });
}

function empareja() {
	$("#lista_emparejada").html('');
	let contador=1;
	let fila;
	let valor = 0;
	let j = 1;
	$("#lista_coincidentes tr").each(function(){
		if(contador==1){
			fila += 
			`<tr>
				<td style="display:none;">
					<input type="text" name="contador[]" style="display:none;">
				</td>
				<td style="display:none;">` +
					$(this).find("td:eq(0)").text() +
				`</td>` +
				`<td class="text-center">
					<input type="checkbox" id="id_check${j}" onclick="checkeds(this);">
				</td>` +
				`<td style="display:none;">
					<input type="text" name="atleta${valor}">
				</td>` +
				`<td>` +
					$(this).find("td:eq(1)").html() +
				`</td>` +
				`<td>` +
					$(this).find("td:eq(2)").text() +
					`<br/>` +
					$(this).find("td:eq(3)").text() +
					`<br/>` +
					$(this).find("td:eq(4)").text() +
					`<br/>` +
					$(this).find("td:eq(5)").text() +
					`<br/>` +
				`</td>`;
				
		}
		else if(contador==2){
			fila +=
				`<td>
				</td>` +
				
				`<td style="display:none;">` +
					$(this).find("td:eq(0)").text() +
				`</td>` +
				
				`<td>
					<input type="checkbox" id="id_check${j}" onclick="checkeds_2(this);">
				</td>` +

				`<td style="display:none;">
					<input type="text" name="atleta${valor}">
				</td>` +

				`<td>` +
					$(this).find("td:eq(1)").html() +
				`</td>` +
				
				`<td>` +
					$(this).find("td:eq(2)").text() +
					`<br/>` +
						$(this).find("td:eq(3)").text() +
					`<br/>` +
						$(this).find("td:eq(4)").text() +
					`<br/>` +
						$(this).find("td:eq(5)").text() +
					`<br/>` +
				`</td>
				<td style="display:none;">
					<input type="text" name="contador[]" style="display:none;">
				</td>
			</tr>`;
		}
		
		
		contador++;
		j++;
		valor++;

		if(contador>2){
			contador=1;
		}
	});
	$("#lista_emparejada").append(fila);
}

function checkeds(x) { //esta funcion da el valor de  id del atleta1 al input text oculto
	let fila = $(x).closest("tr");
	let input_text =  $(fila).find("td:eq(3)>input");
	let id = $(fila).find("td:eq(1)");

	if ($(x).is(':checked')) {
		$(x).val(id.text());
		$(input_text).val(id.text());
		//console.log(input_text.val());
		
	} else{
		$(x).val('');
		$(input_text).val('');
		//console.log(input_text.val());
	}
}
function checkeds_2(x) { //esta funcion da el valor de  id del atleta2 al input text oculto
	let fila = $(x).closest("tr");
	let input_text =  $(fila).find("td:eq(9)>input");
	let id = $(fila).find("td:eq(7)");
	
	if ($(x).is(':checked')) {
		$(x).val(id.text());
		$(input_text).val(id.text());
		//console.log(input_text.val());
	} else{
		$(x).val('');
		$(input_text).val('');
		//console.log(input_text.val());
	}
}

function eliminar() {
	
	let n_filas = $("#lista_coincidentes tr").length;//numero de filas en la tabla de coincidentes
	
	for (let i = 1; i <= n_filas; i++) {
		if ($(`#id_check${i}`).is(':checked')) {
			
		}
		else {
			$(`#fila${i}`).remove();
		}
	}
	
	empareja();
	cambiar_id();

	let ronda = parseInt($("#ronda").val());
	ronda ++;
	$("#ronda").val(ronda);
	
}  

function select_evento() {
	
	$("#evento_id").val($("#evento_emparejamiento").val());

}

function cambiar_id() {
	let u=1;
	for (let i = 1; i <= filas_coincidentes; i++) {
		if ($(`#fila${i}`).length>0) {
			$(`#fila${i}`).attr("id", `fila${u}`);
			//console.log(`se modifico la fila${i} por fila${u}`);
			u++;
		}
	}
}

function validar_siguiente() {
	let num_filas = $("#lista_coincidentes tr").length;//numero de filas en la tabla de coincidentes
	let contador = 0;
	for (let i = 1; i <= num_filas; i++) {
		if ($(`#id_check${i}`).is(':checked')) {
			contador++;
		}
	}
	
	if (contador > 0) {
		return true;
	}
	else {
		mensajemodal('SELECCIONE AL MENOS UN GANADOR');
		return false;
	}
}