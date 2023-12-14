var tabla;
$(document).ready(function () {
  //accion de datatable js

  tabla = $("#tablaconsulta").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json",
    },
    ajax: {
      url: "",
      type: "POST",
      data: { accion_atletas: "consultar" },
    },
    columns: [
      { data: "nombre_club" },
      { data: "idclub" },
		{
			data: "img",
			render: function (data,type,row) {
				// Agregar un parámetro único para evitar la caché
				let timestamp = new Date().getTime();
				return `<img src='img/atletas/${data}.png?${timestamp}' style='width:50px'class='rounded-circle'/>`;
			}
		},
      { data: "cedula" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "peso" },
      { data: "estatura" },
      { data: "fechadenacimiento" },
      { data: "telefono" },
      { data: "sexo" },
      { data: "deportebase" },
      { data: "categoria" },
      { data: "fechaingresoclub" },
      { data: "entrenador" },
      { data: "opciones" },
    ],
    columnDefs: [
      {
        target: 1,
        searchable: false,
        className: "d-none",
      },
      {
        target: -1,
        searchable: false,
      },
    ],

    lengthMenu: [
      [5, 10, 15],
      [5, 10, 15],
    ],

    ordering: false,
    info: true,
  });

  //control de input para mostrar imagen
  $("#archivo").on("change", function () {
    mostrarImagen(this);
  });

  $("#imagen").on("error", function () {
    $(this).prop("src", "img/atletas/icono_persona.png");
  });

  //Seccion para mostrar lo enviado en el modal mensaje//

  //Función que verifica que exista algo dentro de un div
  //oculto y lo muestra por el modal
  if ($.trim($("#mensajes").text()) != "") {
    mensajemodal($("#mensajes").html());
  }

  $("#cedula_atleta").on("keypress", function (e) {
    validarkeypress(/^[0-9\b]*$/, e);
  });
  $("#cedula_atleta").on("keyup", function () {
    validarkeyup(
      /^[0-9]{7,8}$/,
      $(this),
      $("#scedula_atleta"),
      "Debe ser formato (15345987)"
    );
  });

  $("#nombres_atleta").on("keypress", function (e) {
    validarkeypress(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,
      e
    ); //letras á é í ó ú ñ
  });
  $("#nombres_atleta").on("keyup", function () {
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $(this),
      $("#snombres_atleta"),
      "Introduzca nombres de manera correcta"
    );
  });

  $("#apellidos_atleta").on("keypress", function (e) {
    validarkeypress(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,
      e
    ); //letras á é í ó ú ñ
  });
  $("#apellidos_atleta").on("keyup", function () {
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $(this),
      $("#sapellidos_atleta"),
      "Introduzca apellidos de manera correcta"
    );
  });

  $("#peso_atleta").on("keypress", function (e) {
    validarkeypress(/^[0-9.\b]*$/, e);
  });
  $("#peso_atleta").on("keyup", function () {
    validarkeyup(
      /^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/,
      $(this),
      $("#speso_atleta"),
      "Debe ser formato (Ej: 56.4)"
    );
  });

  $("#estatura_atleta").on("keypress", function (e) {
    validarkeypress(/^[0-9.\b]*$/, e);
  });
  $("#estatura_atleta").on("keyup", function () {
    validarkeyup(
      /^[0-3]{1}[.]{1}[0-9]{1,2}$/,
      $(this),
      $("#sestatura_atleta"),
      "Ingrese una estatura valida... Debe ser formato (Ej: 1.68)"
    );
  });

  $("#telefono_atleta").on("keypress", function (e) {
    validarkeypress(/^[0-9\b]*$/, e);
  });
  $("#telefono_atleta").on("keyup", function () {
    validarkeyup(
      /^[0-9]{11}$/,
      $(this),
      $("#stelefono_atleta"),
      "Debe ser formato (04141234567)"
    );
  });

  $("#entrenador_atleta").on("keypress", function (e) {
    validarkeypress(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]*$/,
      e
    ); //letras á é í ó ú ñ
  });
  $("#entrenador_atleta").on("keyup", function () {
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $(this),
      $("#sentrenador_atleta"),
      "Introduzca nombre de manera correcta"
    );
  });

  //VALIDACION DE BOTONES

  $("#registrar_atletas").on("click", function () {
    if (validarboton()) {
      var datos = new FormData();
      var file = $("#archivo")[0].files[0];
      datos.append("imagenarchivo", file);
      datos.append("accion_atletas", "registrar_atletas");
      datos.append("club_atleta", $("#club_atleta").val());
      datos.append("cedula_atleta", $("#cedula_atleta").val());
      datos.append("nombres_atleta", $("#nombres_atleta").val());
      datos.append("apellidos_atleta", $("#apellidos_atleta").val());
      datos.append("peso_atleta", $("#peso_atleta").val());
      datos.append("estatura_atleta", $("#estatura_atleta").val());
      datos.append("fecha_atleta", $("#fecha_atleta").val());
      datos.append("telefono_atleta", $("#telefono_atleta").val());
      datos.append("sexo_atleta", $("#sexo_atleta").val());
      datos.append("deporte_atleta", $("#deporte_atleta").val());
      datos.append("categoria_atleta", $("#categoria_atleta").val());
      datos.append("fecha_ingreso_atleta", $("#fecha_ingreso_atleta").val());
      datos.append("entrenador_atleta", $("#entrenador_atleta").val());

      enviaAjax(datos, "registrar_atletas");
    }
    $("#modal_gestion").modal("hide");
    limpia_formulario();
  });

  $("#modificar_atletas").on("click", function () {
    if (validarboton()) {
      var datos = new FormData();
      var file = $("#archivo")[0].files[0];
      datos.append("imagenarchivo", file);
      datos.append("accion_atletas", "modificar_atletas");
      datos.append("club_atleta", $("#club_atleta").val());
      datos.append("cedula_atleta", $("#cedula_atleta").val());
      datos.append("nombres_atleta", $("#nombres_atleta").val());
      datos.append("apellidos_atleta", $("#apellidos_atleta").val());
      datos.append("peso_atleta", $("#peso_atleta").val());
      datos.append("estatura_atleta", $("#estatura_atleta").val());
      datos.append("fecha_atleta", $("#fecha_atleta").val());
      datos.append("telefono_atleta", $("#telefono_atleta").val());
      datos.append("sexo_atleta", $("#sexo_atleta").val());
      datos.append("deporte_atleta", $("#deporte_atleta").val());
      datos.append("categoria_atleta", $("#categoria_atleta").val());
      datos.append("fecha_ingreso_atleta", $("#fecha_ingreso_atleta").val());
      datos.append("entrenador_atleta", $("#entrenador_atleta").val());

      enviaAjax(datos, "modificar_atletas");
      
    }
    $("#modal_gestion").modal("hide");
    limpia_formulario();
  });
});

//funciones
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

function validarboton() {
  //ningun campo
  if (
    validarkeyup(
      /^[0-9]{7,8}$/,
      $("#cedula_atleta"),
      $("#scedula_atleta"),
      "Debe ser formato (15345987)"
    ) == false &&
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{5,40}$/,
      $("#nombres_atleta"),
      $("#snombres_atleta"),
      "Introduzca nombres de manera correcta"
    ) == false &&
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{5,40}$/,
      $("#apellidos_atleta"),
      $("#sapellidos_atleta"),
      "Introduzca apellidos de manera correcta"
    ) == false &&
    validarkeyup(
      /^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/,
      $("#peso_atleta"),
      $("#speso_atleta"),
      "Debe ser formato (Ej: 56.4)"
    ) == false &&
    validarkeyup(
      /^[0-3]{1}[.]{1}[0-9]{1,2}$/,
      $("#estatura_atleta"),
      $("#sestatura_atleta"),
      "Ingrese una estatura valida... Debe ser formato (Ej: 1.68)"
    ) == false &&
    $("#fecha_atleta").val() == "" &&
    $("#club_atleta").val() == "" &&
    validarkeyup(
      /^[0-9]{11}$/,
      $("#telefono_atleta"),
      $("#stelefono_atleta"),
      "Debe ser formato (04141234567)"
    ) == false &&
    $("#sexo_atleta").val() == "" &&
    $("#deporte_atleta").val() == "" &&
    $("#categoria_atleta").val() == "" &&
    $("#fecha_ingreso_atleta").val() == "" &&
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#entrenador_atleta"),
      $("#sentrenador_atleta"),
      "Introduzca nombre de manera correcta"
    ) == false
  ) {
    mensajemodal("NINGUN CAMPO HA SIDO COMPLETADO");
    return false;
  }

  //solo telefono
  else if (
    validarkeyup(
      /^[0-9]{11}$/,
      $("#telefono_atleta"),
      $("#stelefono_atleta"),
      "Debe ser formato (04141234567)"
    ) == false
  ) {
    mensajemodal("ERROR EN TELEFONO");
    return false;
  }
  //solo club del atleta
  else if ($("#club_atleta").val() == "") {
    mensajemodal("ERROR EN CLUB DEL ATLETA");
    return false;
  }

  //solo fecha de nacimiento
  else if ($("#fecha_atleta").val() == "") {
    mensajemodal("ERROR EN FECHA DE NACIMIENTO");
    return false;
  }

  //solo estatura
  else if (
    validarkeyup(
      /^[0-3]{1}[.]{1}[0-9]{1,2}$/,
      $("#estatura_atleta"),
      $("#sestatura_atleta"),
      "Ingrese una estatura valida... Debe ser formato (Ej: 1.68)"
    ) == false
  ) {
    mensajemodal("ERROR EN ESTATURA");
    return false;
  }

  //solo peso
  else if (
    validarkeyup(
      /^[0-9]{2,3}[.]{0,1}[0-9]{0,1}$/,
      $("#peso_atleta"),
      $("#speso_atleta"),
      "Debe ser formato (Ej: 56.4)"
    ) == false
  ) {
    mensajemodal("ERROR EN PESO");
    return false;
  }

  //solo apellidos
  else if (
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#apellidos_atleta"),
      $("#sapellidos_atleta"),
      "Introduzca apellidos de manera correcta"
    ) == false
  ) {
    mensajemodal("ERROR EN APELLIDO");
    return false;
  }

  //solo nombres
  else if (
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#nombres_atleta"),
      $("#snombres_atleta"),
      "Introduzca nombres de manera correcta"
    ) == false
  ) {
    mensajemodal("ERROR EN NOMBRE");
    return false;
  }

  //solo cedula
  else if (
    validarkeyup(
      /^[0-9]{7,8}$/,
      $("#cedula_atleta"),
      $("#scedula_atleta"),
      "Debe ser formato (15345987)"
    ) == false
  ) {
    mensajemodal("ERROR EN CEDULA");
    return false;
  }

  //solo sexo
  else if ($("#sexo_atleta").val() == "") {
    mensajemodal("ERROR EN SEXO");
    return false;
  }

  //solo deporte base del atleta
  else if ($("#deporte_atleta").val() == "") {
    mensajemodal("ERROR EN DEPORTE BASE");
    return false;
  }

  //solo categoria del atleta
  else if ($("#categoria_atleta").val() == "") {
    mensajemodal("ERROR EN CATEGORIA DEL ATLETA");
    return false;
  }

  //solo fecha de ingreso
  else if ($("#fecha_ingreso_atleta").val() == "") {
    mensajemodal("ERROR EN FECHA DE INGRESO");
    return false;
  }
  //solo entrenador del atleta
  else if (
    validarkeyup(
      /^[A-Za-z\b\s\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da\u00f1\u00d1]{2,25}$/,
      $("#entrenador_atleta"),
      $("#sentrenador_atleta"),
      "Introduzca nombre de manera correcta"
    ) == false
  ) {
    mensajemodal("ERROR EN NOMBRE DEL ENTRENADOR");
    return false;
  } else {
    return true;
  }
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
      if (accion == "registrar_atletas") {
        try {
          if (respuesta === "Registrado Correctamente") {
            tabla.ajax.reload(null, false);
            mensajemodal(respuesta);
          } else {
            mensajemodal(respuesta);
          }
        } catch (e) {
			    mensajemodal("Error en Ajax " + e.name + " !!!");
			  }
      } else if (accion == "modificar_atletas") {
        try {
          if (respuesta === "Modificado Correctamente") {
            tabla.ajax.reload(null, false);
            mensajemodal(respuesta);
          } else {
            mensajemodal(respuesta);
          }
        } catch (e) {
          mensajemodal("Error en Ajax " + e.name + " !!!");
        }
      } else {
        limpia_formulario();
        mensajemodal(respuesta);
      }
    },
    error: function () {
      mensajemodal("Error con ajax");
    },
  });
}

function limpia_formulario() {
  $("#club_atleta").val("");
  $("#cedula_atleta").val("");
  $("#nombres_atleta").val("");
  $("#apellidos_atleta").val("");
  $("#peso_atleta").val("");
  $("#estatura_atleta").val("");
  $("#fecha_atleta").val("");
  $("#telefono_atleta").val("");
  $("#sexo_atleta").val("");
  $("#deporte_atleta").val("");
  $("#categoria_atleta").val("");
  $("#fecha_ingreso_atleta").val("");
  $("#entrenador_atleta").val("");
  $("#imagen").prop("src", "img/atletas/icono_persona.png");
}

function modalregistrar() {
  $("#modal_gestionlabel").html("Registrar");
  $(".texto").html("");
  limpia_formulario();
  $("#registrar_atletas").show();
  $("#modificar_atletas").hide();
}

function modalmodificar(fila) {
	var timestamp = new Date().getTime();
  $("#modal_gestionlabel").html("Modificar");
  $(".texto").html("");
  $("#modificar_atletas").show();
  $("#registrar_atletas").hide();

  var linea = $(fila).closest("tr");
  $("#club_atleta").val($(linea).find("td:eq(1)").text());
  $("#cedula_atleta").val($(linea).find("td:eq(3)").text());
  $("#nombres_atleta").val($(linea).find("td:eq(4)").text());
  $("#apellidos_atleta").val($(linea).find("td:eq(5)").text());
  $("#peso_atleta").val($(linea).find("td:eq(6)").text());
  $("#estatura_atleta").val($(linea).find("td:eq(7)").text());
  $("#fecha_atleta").val($(linea).find("td:eq(8)").text());
  $("#telefono_atleta").val($(linea).find("td:eq(9)").text());
  $("#sexo_atleta").val($(linea).find("td:eq(10)").text());
  $("#deporte_atleta").val($(linea).find("td:eq(11)").text());
  $("#categoria_atleta").val($(linea).find("td:eq(12)").text());
  $("#fecha_ingreso_atleta").val($(linea).find("td:eq(13)").text());
  $("#entrenador_atleta").val($(linea).find("td:eq(14)").text());
  $("#imagen").prop("src","img/atletas/" + $(linea).find("td:eq(3)").text() + ".png?" + timestamp);
}

function elimina(fila) {
	var linea = $(fila).closest("tr");
	var cedula = $(linea).find("td:eq(3)");

	var datos = new FormData();
	datos.append("accion_atletas", "eliminar_atletas");
	datos.append("cedula_atleta", cedula.text());
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
				if (respuesta == "eliminado") {
					tabla.row(linea).remove().draw(false);
					mensajemodal("Eliminado correctamente");
				} else {
					mensajemodal(respuesta);
					setTimeout(function () {
					window.location.reload();
					}, 2000);
				}
			} catch (e) {
			mensajemodal("Error en Ajax " + e.name + " !!!");
			}
		},
		error: function () {
		mensajemodal("Error con ajax");
		},
	});
}

//funcion para mostrar la imagen antes de subirla al servidor
function mostrarImagen(f) {
  var tamano = f.files[0].size;
  var megas = parseInt(tamano / 1024);

  if (megas > 1024) {
    mensajemodal("La imagen debe ser igual o menor a 1024 K");
    $(f).val("");
  } else {
    if (f.files && f.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#imagen").attr("src", e.target.result);
      };
      reader.readAsDataURL(f.files[0]);
    }
  }
}
//fin de funcion mostrar imagen
