var tabla
$(document).ready(function () {
  //accion de datatable js

  tabla = $("#tablaconsulta").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
    },
    ajax: {
      url: "",
      type: "POST",
      data: { accion: "consultar" },
    },
    columns: [
      { data: "cedula" },
      { data: "nombre" },
      { data: "modulo" },
      { data: "fecha" },
      { data: "hora" },
      { data: "accion" },
    ],

    ordering: false,
    lengthMenu: [
      [5, 10, 15, 20, -1],
      [5, 10, 15, 20, "Todos"],
    ],
  });

  $("#boton_recargar").on("click", function () {
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
      text: "por favor espere...",
    });
    var datos = new FormData();
    datos.append("accion", "consultar");
    enviaAjax(datos, "recargar");
  });

  $("#boton_vaciar").on("click", function () {
    vaciar();
  });

});

function recargar() {
  setInterval(function () {
    var datos = new FormData();
    datos.append("accion", "recargar");
    enviaAjax(datos, "recargar_automatico");
    alert('hola');
  }, 10000);
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
    success: function (respuesta) {
      if (accion == "recargar") {
        try {

          tabla.ajax.reload(null, false);
          
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Informacion actualizada",
          });
        } catch (e) {
          mensajemodal("Error en Ajax " + e.name + " !!!");
        }
      } 
      if (accion == "recargar_automatico") {
        try {
          tabla.ajax.reload(null, false);
        } catch (e) {
          mensajemodal("Error en Ajax " + e.name + " !!!");
        }
      } 
    },
    error: function () {
      mensajemodal("Error con ajax");
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

function vaciar() {
  Swal.fire({
    title: "¿Estas Seguro?",
    html: "Eliminaras todos los registros de la tabla. <br>¡No podrás revertir esta accion!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3B71CA",
    confirmButtonText: "Si, vaciar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      let datos = new FormData();
      datos.append("accion", "vaciar");

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
            if (respuesta == "Tabla vaciada correcctamente") {
              Swal.fire({
                title: "¡Limpieza Exitosa!",
                text: "La informacion ha sido eliminada.",
                icon: "success",
              });
              tabla.ajax.reload(null, false);
            } else {
             mensajemodal(respuesta);
              
            }
          } catch (e) {
            mensajemodal(respuesta);
          }
        },
        error: function (respuesta) {
          Swal.fire({
            title: `${respuesta.responseText}`,
            icon: "error",
          });
        },
      });
    }
  });
}