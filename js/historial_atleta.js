$(document).ready(function () { 

    if($.trim($("#mensajes").text()) != ""){
		mensajemodal($("#mensajes").html());
    }
    
    $("#atleta").on("change",function(){
		$("#lista_resultado").html('');
		
		var datos = new FormData();
		datos.append('accion_historial','mostrar_resultado');
		datos.append('atleta',$("#atleta").val());
		enviaAjax(datos,'muestra');		
	});
});

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
						$("#lista_resultado").html(respuesta);
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
            }	
    });
	
}