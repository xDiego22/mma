$(document).ready(function () {
    $("#registrar").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});


$(document).ready(function () {
    $("#registrar1").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica1").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});

$(document).ready(function () {
    $("#eliminar1").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar2").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica2").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar2").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar3").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica3").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar3").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar4").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica4").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar4").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar5").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica5").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar5").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar6").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica6").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});
$(document).ready(function () {
    $("#eliminar6").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar7").on("click", function () {
        mensajemodal("Ronda Guardada");
    });
});

$(document).ready(function () {
    $("#registrar8").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#eliminar8").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar9").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar10").on("click", function () {
        mensajemodal("Permisos Guardados");
    });
});

$(document).ready(function () {
    $("#modifica11").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});

$(document).ready(function () {
    $("#eliminar11").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});

$(document).ready(function () {
    $("#registrar12").on("click", function () {
        mensajemodal("Registrado Correctamente");
    });
});

$(document).ready(function () {
    $("#modifica12").on("click", function () {
        mensajemodal("Modificado Correctamente");
    });
});

$(document).ready(function () {
    $("#eliminar12").on("click", function () {
        mensajemodal("Eliminado Correctamente");
    });
});


function mensajemodal(mensaje){
	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function() {
		$("#mostrarmodal").modal("hide");
	},4000);
}