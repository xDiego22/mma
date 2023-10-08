$(document).ready(function () {
    //consultar informacion del perfil
    consultarPerfil();

    if ($.trim($("#mensajes").text()) != "") {
      mensajemodal($("#mensajes").html());
    }

    $("#contrasena_actual").on("keypress", function (e) {
      validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/, e);
    });

    $("#contrasena_actual").on("keyup", function () {
      validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
        $(this),$("#scontrasena_actual"),"Ingrese contraseña correctamente");
    });

    $("#contrasena_nueva").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/, e);
    });
    $("#contrasena_nueva").on("keyup", function () {
        validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$(this),$("#scontrasena_nueva"),"Ingrese contraseña correctamente");
    });

    $("#contrasena_repetir").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]*$/, e);
    });
    $("#contrasena_repetir").on("keyup", function () {
        validarkeyup(/^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,$(this),$("#scontrasena_repetir"),"Ingrese contraseña correctamente");
    });


    $("#nombre_perfil").on("keypress", function(e){
		validarkeypress(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,e);
	});

	$("#nombre_perfil").on("keyup", function(){
		validarkeyup(/^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/, $(this), $("#snombre"), "Introduzca nombre de manera correcta");
    });
    
    $("#correo_perfil").on("keypress", function (e) {
    	validarkeypress(/^[A-Za-z0-9@_.\b\u00f1\u00d1\u00E0-\u00FC-]*$/, e);
	});
	
	$("#correo_perfil").on("keyup", function (e) {
    	validarkeyup(/^[0-9A-Za-z_.\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,$("#correo_perfil"),$("#scorreo"),"formato de correo incorrecto") == false
  	});

    $("#cambiar").on("click", function () {
      if (validarCambiar()) {
        var datos = new FormData();
        
        datos.append("accion", "cambiar");
        datos.append("contrasena_actual", $("#contrasena_actual").val());
        datos.append("contrasena_nueva", $("#contrasena_nueva").val());
        datos.append("contrasena_repetir", $("#contrasena_repetir").val());
       
        enviaAjax(datos, "cambiar");
        
       
      }
      $("#modal_contrasena").modal("hide");
      limpiaFormularioContrasena();
    });

    $("#boton_editar").on("click", function () {
        $(".texto").html("");
        $("#nombre_perfil").val($("#nombre_info").text());
        $("#correo_perfil").val($("#correo_info").text());
    });

    $("#editar").on("click", function () {
        
        if (validarEditar()) {
            var datos = new FormData();
            
            datos.append("accion", "editar");
            datos.append("nombre_perfil", $("#nombre_perfil").val());
            datos.append("correo_perfil", $("#correo_perfil").val());
            
            enviaAjax(datos, "editar");
        
        }
        $("#modal_perfil").modal("hide");
        limpiaFormularioPerfil();
    });

});

function limpiaFormularioContrasena() {
    $("#contrasena_actual").val("");
    $("#scontrasena_actual").val("");
    
    $("#contrasena_nueva").val("");
    $("#scontrasena_nueva").val("");

    $("#contrasena_repetir").val("");
    $("#scontrasena_repetir").val("");
}

function limpiaFormularioPerfil() {
  $("#nombre_perfil").val("");
  $("#snombre").val("");

  $("#correo_perfil").val("");
  $("#scorreo").val("");
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

function consultarPerfil() {
    var datos = new FormData();

    datos.append("accion", "consultar");
    enviaAjax(datos, "consultar");
}

function enviaAjax(datos, accion) {
  $.ajax({
    async: true,
    url: "", 
    type: "POST", 
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: function (respuesta) {
    
        if (accion == "cambiar") {
            try {
                mensajemodal(respuesta);
            } catch (e) {
                mensajemodal("Error en Ajax " + e.name + " !!!");
            }
        }

        if (accion == "editar") {
            try {
                mensajemodal(respuesta);
                consultarPerfil();
            } catch (e) {
                mensajemodal("Error en Ajax " + e.name + " !!!");
            }
        }

        if (accion == "consultar") {
            try {
                arreglo = JSON.parse(respuesta);
                if (arreglo["resultado"] == "encontro") {
                    $("#cedula_info").text(arreglo[0].cedula);
                    $("#nombre_info").text(arreglo[0].nombre);
                    $("#correo_info").text(arreglo[0].correo);
                    
                } else {
                    mensajemodal("usuario no registrado en sistema");
                }
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

function validarEditar() {
    //ningun campo completado
    
  if (
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#nombre_perfil"),
      $("#snombre"),
      "Introduzca nombre de manera correcta"
    ) == false &&
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_usuarios"),
      $("#scontrasena_usuarios"),
      "Ingrese contraseña correctamente"
    ) == false &&
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena2_usuarios"),
      $("#scontrasena2_usuarios"),
      "Ingrese confirmacion de contraseña correctamente"
    ) == false &&
    $("#rol_usuario").val() == "" &&
    validarkeyup(
      /^[0-9A-Za-z_.\u00f1\u00d1\u00E0-\u00FC-]{3,30}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,
      $("#correo_usuarios"),
      $("#scorreo_usuarios"),
      "ERROR EN CORREO"
    ) == false
  ) {
    mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
    return false;
  }
    
    //solo nombre
  else if (
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#nombre_perfil"),
      $("#snombre"),
      "Introduzca nombre de manera correcta"
    ) == false
  ) {
    mensajemodal("ERROR EN NOMBRE");
    return false;
  }else {
    return true;
  }
}

function validarCambiar() {
  //ningun campo completado
  if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_actual"),
      $("#scontrasena_actual"),
      "Ingrese contraseña actual correctamente"
    ) == false &&
   validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_nueva"),
      $("#scontrasena_nueva"),
      "Ingrese contraseña nueva correctamente"
    ) == false &&
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_repetir"),
      $("#scontrasena_repetir"),
      "Ingrese contraseña de confirmacion correctamente"
    ) == false 
  ) {
    mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
    return false;
  }

  //solo contraseña
  else if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_actual"),
      $("#scontrasena_actual"),
      "Ingrese contraseña actual correctamente"
    ) == false
  ) {
    mensajemodal("ERROR EN CONTRASEÑA ACTUAL");
    return false;
  }

  //solo confirmacion de contraseña
  else if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_nueva"),
      $("#scontrasena_nueva"),
      "Ingrese contraseña nueva correctamente"
    ) == false
  ) {
    mensajemodal("ERROR EN CONTRASEÑA NUEVA");
    return false;
  }

  //solo confirmacion de contraseña
  else if (
    validarkeyup(
      /^[A-Za-z0-9-_./@$!%*?&#\b\u00f1\u00d1]{6,20}$/,
      $("#contrasena_repetir"),
      $("#scontrasena_repetir"),
      "Ingrese contraseña de confirmacion correctamente"
    ) == false
  ) {
    mensajemodal("ERROR EN CONFIRMACION DE CONTRASEÑA");
    return false;
  }

  //contraseña y la confirmacion de la contraseña no coinciden
  else if ($("#contrasena_nueva").val() != $("#contrasena_repetir").val()) {
    mensajemodal("LAS CONTRASEÑAS NO COINCIDEN <br> INGRESELAS CORRECTAMENTE");
    return false;
  } else {
    return true;
  }
}