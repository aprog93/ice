//---Ventana Modal------------------------------------------------------------------------
const modalInsertarEspecialidad = $("#insertarEspecialidad");
const formInsertarEspecialidad  = modalInsertarEspecialidad.find('form');

$(document).ready(function () {

    $('.cargando').hide();
    modalInsertarEspecialidad.show();
});
//-------------Funciones Básicas-----------------------------------------------------------
function urlBase() {
    var url = window.location.pathname.split('/');

        var ruta = "";//url.protocol + "//";

        for (let index = 0; index < url.length - 1; index++) {
            ruta += url[index] + "/";

        }

        return ruta;
};

const resetForm = (form) => {
    form[0].reset();
    form.find('span.error').text("");
}
//---Insertar Profesión Code------------------------------------------------------------
const modalSuccess = $("#success");
const  modalError  = $("#error");

formInsertarEspecialidad.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarEspecialidad.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarEspecialidad.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarEspecialidad.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 1) {
                modalSuccess.find("p").text("La especialidad " + data.especialidad + " ha insertado con éxito en el sistema.");
                resetForm(formInsertarEspecialidad);
                modalInsertarEspecialidad.hide();
                modalSuccess.modal("show");
            }

            else {
                modalError.find("p").text(data.error);
                modalError.modal("show");
            }
        }
    });
});

formInsertarEspecialidad.find('.cancel').on("click", function () {
    window.location.href = urlBase();
});

modalSuccess.find('.btn').on("click", function () {
    modalSuccess.hide();
    modalInsertarEspecialidad.show();
});
modalError.find('.btn').on("click", function () {
    window.location.href = urlBase();
});
//------------------------------------------------------------------- */