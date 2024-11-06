//---Ventana Modal------------------------------------------------------------------------
const modalInsertarCentro = $("#insertarCentro");
const modalInsertarTipoCentro = $("#insertarTipoCentro");

const formInsertarCentro  = modalInsertarCentro.find('form');
const formInsertarTipoCentro = modalInsertarTipoCentro.find('form');

const selectTipoCentro = formInsertarCentro.find('#idtipocentro');
const selectProvincia = formInsertarCentro.find("#provincia");
const selectMunicipio = $(".municipio");

$(document).ready(function () {
    $('.cargando').hide();
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
formInsertarTipoCentro.on("submit", (event) => {
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
});
//---Insertar Centro Code------------------------------------------------------------

const modalSuccess = $("#success");
const  modalError  = $("#error");

formInsertarCentro.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarCentro.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarCentro.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarCentro.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 0) {
                modalSuccess.find("p").text("El Centro " + data.centrotrabajo + " en " + selectMunicipio.find('option:selected').text() + " ha sido insertado con éxito en el sistema.");
                resetForm(formInsertarCentro);
                modalSuccess.modal("show");
            }

            else {
                modalError.find("p").text(data.error);
                modalError.modal("show");
            }
        }
    });
});

formInsertarCentro.find('.cancel').on("click", function () {
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
var getUrl = $(location).attr("origin")+'/ice/otros/municipios/seleccionar';

selectProvincia.on("change", function () {
    $.ajax({
        url: getUrl,
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'get',//$(form).attr('method'),
        data: { "idprovincia": selectProvincia.val() },
        cache: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function() {
            selectMunicipio.empty();
            selectMunicipio.append('<option hidden disabled selected></option>');
        },
        success: function (data) {

            if (data.status == 1) {
                $.each(data.options, function (key, value) {
                    selectMunicipio.append(new Option(value['nombre'], value['id']));
                });
                selectMunicipio.trigger("keydown");
            }
            else {
                modalError.find("p").text(data.error);
                modalError.modal("show");
            }
        },
        error: function(data) {
            console.log(data);
        },
    });
});
