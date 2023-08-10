$(document).ready(function () {
  //Función que verifica que exista algo dentro de un div
  //oculto y lo muestra por el modal
  if ($.trim($("#mensajes").text()) != "") {
        mensajemodal($("#mensajes").html());
    }

    $("#correo_recuperar").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z0-9@_.\b\u00f1\u00d1\u00E0-\u00FC-]*$/,e);
    });

    $("#enviar_correo").on("click", () => {
        
        if (validarboton()) {
            
            var datos = new FormData();
            datos.append("accion_recuperar", "accion_recuperar");
            datos.append("correo_recuperar", $("#correo_recuperar").val());
    
            enviaAjax(datos);
        }
    });
});

function validarkeypress(er, e) {
  codigo = e.keyCode; //codigo ascii

  tecla = String.fromCharCode(codigo); //transformar codigo ascii generado al pulsar boton a una tecla

  tecla_bien = er.test(tecla); //evalua con la expresion regular y almacena

  //elimnina tecla fuera de la expresion regular
  if (!tecla_bien) {
    e.preventDefault();
  }
}

function validarkeyup(er, id) {

  tecla_bien = er.test(id.val()); //evalua valor almacendo en el input

  if (tecla_bien) {
    return true;
  }
  else {
    return false;
  }
}

function mensajemodal(mensaje) {
  $("#contenidodemodal").html(mensaje);
  $("#mostrarmodal").modal("show");
  setTimeout(function () {
    $("#mostrarmodal").modal("hide");
  }, 4000);
}

function enviaAjax(datos) {
    $.ajax({
        async: true,
        url: "", //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
        type: "POST", //tipo de envio
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        success: function () {
    
           //mensajemodal("enviado")

        },
        error: function () {
            mensajemodal("Error con ajax");
        },
    });
}

function validarboton() {
  
    if (
      validarkeyup(
        /^[0-9A-Za-z_\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,
        $("#correo_recuperar")
      ) == false
    ) {
      mensajemodal("Error en correo");
      return false;
    } else {
      return true;
    }
  
} 