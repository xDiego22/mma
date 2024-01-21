
$(document).ready(function () {
  if ($.trim($("#mensajes").text()) != "") {
    mensajemodal($("#mensajes").html());
  }

 
  $("#boton_recargar").on("click", function () {
    var datos = new FormData();
    datos.append("accion", "consultar");
    enviaAjax(datos, "recargar");
  });

  $("#respaldar").on("click", function () {
    let datos = new FormData();
    datos.append("accion", "respaldar");
    enviaAjax(datos, "respaldar");
  });

  $("#restore").on("click", function () {
    let datos = new FormData();
    datos.append("accion", "restore");
    datos.append("restorePoint", $("#restorePoint").val());
    enviaAjax(datos, "restore");
    
  });

  $("#boton_eliminar").on("click", function () {
    if ($("#restorePoint").val() !== "") {
      Swal.fire({
        title: "¿Estas Seguro?",
        html: "Se eliminará este punto de restauracion <br> ¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3B71CA",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          let datos = new FormData();
          datos.append("accion", "eliminar");
          datos.append("restorePoint", $("#restorePoint").val());
          enviaAjax(datos, "boton_eliminar");
        }
      });
    } else {
      Swal.fire({
        title: "Error: Seleccione una opcion",
        icon: "error",
      });
    }
    
  });

});

function validar() {
  
}



function enviaAjax(datos, accion) {
  $.ajax({
    async: true,
    url: "", //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
    type: "POST", //tipo de envio
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    beforeSend: function () {
        if (accion == "restore") {
        	const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "info",
            title: "Procesando solicitud",
            text:"por favor espere..."
          });

        } 
			},
    success: function (respuesta) {
      if (accion == "respaldar") {
        
        Swal.fire({
          title: `${respuesta}`,
          icon: "success",
          showConfirmButton: true,
          timer: 3500,
          timerProgressBar: true,
          willClose: () => {
            location.reload();
          },
        });
      } 
      if (accion == "restore") {
          $("#modal_restorePoint").modal('hide');
           Swal.fire({
             title: `${respuesta}`,
             text: "Se ha reestablecido el punto de recuperacion satisfactoriamente",
             icon: "success",
           });
      } 
      if (accion == "boton_eliminar") {

        let selectedValue = $("#restorePoint").val();

        // Si hay un valor seleccionado
        if (selectedValue) {
          $("#restorePoint option[value='" + selectedValue + "']").remove();
        }

        Swal.fire({
          title: `${respuesta}`,
          text: 'El punto de recuperacion ha sido eliminado satisfactoriamente',
          icon: "success",
        });
      }
    },
    error: function (respuesta) {
      $("#modal_restorePoint").modal("hide");
				Swal.fire({
          title: `${respuesta.responseText}`,
          icon: "error",
        });
    },
  });
}
function mensajemodal(mensaje) {
  $("#contenidodemodal").html(mensaje);
  $("#mostrarmodal").modal("show");
  setTimeout(function () {
    $("#mostrarmodal").modal("hide");
  }, 4000);
}