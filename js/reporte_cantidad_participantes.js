var mychart;

$(document).ready(function () {
    
 
    $("#evento").on("change",function(){
		var datos = new FormData();
		datos.append('accion','evento');
		datos.append('evento',$("#evento").val());
		enviaAjax(datos,'evento');		
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
			timeout:10000,
                success: function(respuesta) {
                    if (accion == 'evento') {
                        
                        try {
                            let valores = JSON.parse(respuesta);
                            
                            let masculinos = valores[0][0].cantidad;
                            let femeninos = valores[1][0].cantidad;

                            const ctx = document.getElementById('grafica');

                            if (mychart) {
                                mychart.destroy();
                            }
                            mychart = new Chart(ctx, {
                                type: 'bar',
                                data: { 
                                    labels: ['Masculinos','Femeninos'],
                                    datasets: [{
                                        barPercentage: 0.5,
                                        label: 'Cantidades',
                                        data: [masculinos,femeninos],
                                        backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'
                                        ],
                                        borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(75, 192, 192)'
                                        ],
                                        borderWidth: 1
                                    }],
                                },
                                options: {
                                    scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                    }
                                }
                            });
                        } catch(e){
						    mensajemodal("Error en Ajax "+e.name+" !!!");
					    }
                        
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

    function mensajemodal(mensaje){
        $("#contenidodemodal").html(mensaje);
        $("#mostrarmodal").modal("show");
        setTimeout(function() {
            $("#mostrarmodal").modal("hide");
        },4000);
    }