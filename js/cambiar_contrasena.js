$(document).ready(function () {

    if ($.trim($("#mensajes").text()) != "") {
      mensajemodal($("#mensajes").html());
    }

    $("#cedula").on("keypress", function(e){
		validarkeypress(/^[0-9\b]*$/,e);
    });

    $("#token").on("keyup", function () {
      validarkeyup(/^[a-f0-9]{32}$/i, $("#token"), $("#stoken"), "");
    });

    $("#contrasena").on("keypress", function (e) {
      validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/, e);
    });
    $("#contrasena").on("keyup", function () {
      validarkeyup(
        /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
        $(this),
        $("#scontrasena"),
        "Ingrese contraseña correctamente"
      );
    });

    $("#contrasena2").on("keypress", function (e) {
      validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/, e);
    });
    $("#contrasena2").on("keyup", function () {
      validarkeyup(
        /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
        $(this),
        $("#scontrasena2"),
        "Ingrese confirmacion de contraseña correctamente"
      );
    });

    $("#enviar").on("click", function () {
      if (validarboton()) {
        var datos = new FormData();
        
        datos.append("accion", "cambiar");
        datos.append("cedula", $("#cedula").val());
        datos.append("token", $("#token").val());
        datos.append("contrasena", $("#contrasena").val());
       
        enviaAjax(datos, "enviar");
      }
      limpia_formulario();
    });
});

function limpia_formulario() {
    $("#contrasena").val("");
    $("#contrasena2").val("");
    $("#scontrasena").text("");
    $("#scontrasena2").text("");
}

function validarkeypress(er, e) {
  codigo = e.keyCode; //codigo ascii

  tecla = String.fromCharCode(codigo); //transformar codigo ascii generado al pulsar boton a una tecla

  tecla_bien = er.test(tecla); //evalua con la expresion regular y almacena

  //elimnina tecla fuera de la expresion regular
  if (!tecla_bien) {
    e.preventDefault();
  }
}

function validarkeyup(er, id, idmensaje, mensaje) {
  tecla_bien = er.test(id.val()); //evalua valor almacendo en el input

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

function mensajemodal(mensaje) {
  $("#contenidodemodal").html(mensaje);
  $("#mostrarmodal").modal("show");
  setTimeout(function () {
    $("#mostrarmodal").modal("hide");
  }, 4000);
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
       if (accion == "enviar") {
        try {
            if (respuesta === "Se ha modificado la contraseña exitosamente") {

                setTimeout(() => {
                    location.href = '.';
                },4000);
            }
          
            mensajemodal(respuesta);
          
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

function validarboton () {
	//ningun campo completado
	if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula"), $("#scedula"), "") == false &&
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/, $("#contrasena"), $("#scontrasena"), "Ingrese contraseña correctamente") == false &&
		validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/, $("#contrasena2"), $("#scontrasena2"), "") == false) {
		mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
		return false;
    }
    
    //solo cedula
	else if (validarkeyup(/^[0-9]{7,8}$/, $("#cedula"),$("#scedula"),"")==false) {
		mensajemodal("ERROR EN CEDULA");
		return false;
    }
        
	else if (validarkeyup(/^[a-f0-9]{32}$/i, $("#token"), $("#stoken"), "") == false) {
        mensajemodal("ERROR EN TOKEN");
        return false;
    }

  //solo contraseña
  else if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena"),
      $("#scontrasena"),
      "Ingrese contraseña correctamente"
    ) == false
  ) {
    mensajemodal("ERROR EN CONTRASEÑA");
    return false;
  }

  //solo confirmacion de contraseña
  else if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena2_usuarios"),
      $("#scontrasena2_usuarios"),
      "Solo debe ser A-Z a-z 0-9 _ . - entre 6 a 20 caracteres"
    ) == false
  ) {
    mensajemodal("ERROR EN CONFIRMACION DE CONTRASEÑA");
    return false;
  }

  //contraseña y la confirmacion de la contraseña no coinciden
  else if ($("#contrasena").val() != $("#contrasena2").val()) {
    mensajemodal("LAS CONTRASEÑAS NO COINCIDEN <br> INGRESELAS CORRECTAMENTE");
    return false;
  } else {
    return true;
  }
}