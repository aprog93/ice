//---Ventana Modal------------------------------------------------------------------------
const modalInsertarExpediente = $("#insertarExpediente");
//const modalInsertarTipoCentro = $("#insertarTipoCentro");

const formInsertarExpediente  = modalInsertarExpediente.find('form');
//const formInsertarTipoCentro = modalInsertarTipoCentro.find('form');

const selectPasaporteRequerido = formInsertarExpediente.find('#idpasaporterequerido');
const selectMotivoViaje = formInsertarExpediente.find("#idmotivoviaje");
const selectTipoActividad = formInsertarExpediente.find("#idtipoactividad");

$(document).ready(function () {
    modalInsertarExpediente.modal("show");
});
//-------------Funciones Básicas-----------------------------------------------------------
function urlBase() {
    var url = window.location.pathname.split('/');

        var ruta = "";//url.protocol + "//";

        for (let index = 0; index < url.length - 1; index++) {
            //if(url[index] != 'public')
                ruta += url[index] + "/";

        }

        return ruta;
};

const resetForm = (form) => {
    form[0].reset();
    form.find('span.error').text("");
}

//---Insertar Tipo Centro Code---------------------------------------------------------
/* formInsertarTipoCentro.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarTipoCentro.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarTipoCentro.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function () {
            formInsertarTipoCentro.find('span.error').text('');
        },
        success: function (data) {
            if (data.status == 0) {
                var newOption = new Option(data.tipocentro, data.id, false, true);
                selectTipoCentro.append(newOption).trigger('change');
                resetForm(formInsertarTipoCentro);
                modalInsertarTipoCentro.modal("hide");
            }
            else {
                $.each(data.errors, function (prefix, val) {
                    formInsertarTipoCentro.find('span.' + prefix + '_error').text(val);
                });
            }
        },
        error: function () {
            alert('No se pudo insertar el tipo de centro en la base de datos.');
        },
    });
});

formInsertarTipoCentro.find('.cancel').on("click", function () {
    resetForm(formInsertarTipoCentro);
    selectTipoCentro.val("");
});

selectTipoCentro.on("change", function () {
    if ($(this).val() == "add") {
        modalInsertarTipoCentro.modal("show");
    }
}); */
//---Insertar Centro Code------------------------------------------------------------

const modalSuccess = $("#success");
const  modalError  = $("#error");

formInsertarExpediente.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarExpediente.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarExpediente.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarExpediente.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 0) {
                modalSuccess.find("p").text("El Expediente No. " + data.numeroexpediente + " ha sido creado e insertado con éxito en el sistema.");
                resetForm(formInsertarExpediente);
                modalSuccess.modal("show");
            }

            else {
                modalError.find("p").text(data.error);
                modalError.modal("show");
            }
        }
    });
});

formInsertarExpediente.find('.cancel').on("click", function () {
    window.location.href = urlBase();
});

modalSuccess.find('.btn').on("click", function () {
    modalSuccess.hide();
    modalInsertarCentro.show();
});
modalError.find('.btn').on("click", function () {
    window.location.href = urlBase();
});
//------------------------------------------------------------------- */
//var getUrl = $(location).attr("origin")+'/ice/otros/municipios/seleccionar';
