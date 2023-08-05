var mychart;

$(document).ready(function () {

    var datos = new FormData();
    datos.append('accion','inicio');
    enviaAjax(datos,'inicio');	
});

function enviaAjax(datos,accion){
        $.ajax({
            async: true,
            url: '', 
            type: 'POST', 
			contentType: false,
            data: datos,
			processData: false,
	        cache: false,
			timeout:10000,
                success: function(respuesta) {
                    if (accion == 'inicio') {
                        
                        try {
                            let valores = JSON.parse(respuesta);
                            
                            let rural = valores[0][0].cantidad;
                            let urbana = valores[1][0].cantidad;

                            const ctx = document.getElementById('grafica');

                            if (mychart) {
                                mychart.destroy();
                            }
                            mychart = new Chart(ctx, {
                                type: 'bar',
                                data: { 
                                    labels: ['Rural','Urbana'],
                                    datasets: [{
                                        barPercentage: 0.5,
                                        label: 'Cantidades',
                                        data: [rural,urbana],
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
    
    const labels = Utils.months({count: 7});
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};