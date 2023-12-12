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
    var datos = new FormData();
    datos.append("accion", "consultar");
    enviaAjax(datos, "recargar");
  });

});

function recargar() {
  setInterval(function () {
    var datos = new FormData();
    datos.append("accion", "recargar");
    enviaAjax(datos, "recargar");
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
          tabla.ajax.reload(null,false);
        } catch (e) {
          mensajemodal("Error en Ajax " + e.name + " !!!");
        }
      } else {
        mensajemodal("no boton");
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
