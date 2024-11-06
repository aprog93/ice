//---Ventanas Modals------------------------------------------------------------------------
const modalInsertarCargo = $("#insertarCargo");
const modalInsertarTipoCentro = $("#insertarTipoCentro");
const modalInsertarCentro = $("#insertarCentro");
const modalInsertarEspecialidad = $("#insertarEspecialidad");
const modalInsertarIdioma = $("#insertarIdioma");
const modalError = $("#error");
const modalSuccess = $("#success");
//---Formularios----------------------------------------------------------------------------
const formInsertarColaborador = $("#insertarColaboradorForm");
const formInsertarTipoCentro = modalInsertarTipoCentro.find('form');
const formInsertarCentro = modalInsertarCentro.find('form');
const formInsertarCargo = modalInsertarCargo.find('form');
const formInsertarEspecialidad  = modalInsertarEspecialidad.find('form');
const formInsertarIdioma  = modalInsertarIdioma.find('form');
//---Selects--------------------------------------------------------------------------------
const selectTipoCentro = formInsertarCentro.find('select');
const selectCentro = formInsertarColaborador.find("#idcentro");
const selectCargo = formInsertarColaborador.find("#idcargosalir");
const selectEspecialidad = formInsertarColaborador.find("#idespecialidad");
const selectIdioma = formInsertarColaborador.find("#ididioma");
const selectProvincia = formInsertarColaborador.find("#provincia");
const selectMunicipio = $(".municipio");
//-------------Funciones Básicas-----------------------------------------------------------
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
                modalInsertarCentro.modal("show");
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
    modalInsertarCentro.modal("show");
    selectTipoCentro.val("");
});

selectTipoCentro.on("change", function () {
    if ($(this).val() === "add") {
        modalInsertarTipoCentro.modal("show");
        modalInsertarCentro.modal("hide");
    }
});
//---Insertar Centro Code------------------------------------------------------------
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
        beforeSend: function () {
            formInsertarCentro.find('span.error').text('');
        },
        success: function (data) {
            if (data.status == 0) {
                var newOption = new Option(data.centrotrabajo + ' [' + formInsertarCentro.find('#idmunicipio').find('option:selected').text() +']', data.id, true, true);
                selectCentro.append(newOption).trigger('change');
                resetForm(formInsertarCentro);
                modalInsertarCentro.modal("hide");
            }
            else {
                $.each(data.errors, function (prefix, val) {
                    formInsertarCentro.find('span.' + prefix + '_error').text(val);
                });
            }
        },
        error: function(data) {
            alert('No se pudo insertar el centro de trabajo en la base de datos.');
        }
    });
});

formInsertarCentro.find('.cancel').on("click", function () {
    resetForm(formInsertarCentro);
    selectCentro.val("");
});

selectCentro.on("change", function () {
    if ($(this).val() === "add") {
        formInsertarCentro.find("#nombreprovincia").val(selectProvincia.find('option:selected').text());
        modalInsertarCentro.modal("show");
    }
});
//---Insertar Cargo Code------------------------------------------------------------
formInsertarCargo.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarCargo.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarCargo.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function () {
            formInsertarCargo.find('span.error').text('');
        },
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarCargo.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 1) {
                var newOption = new Option(data.cargo, data.id, true, true);
                selectCargo.append(newOption).trigger('change');
                resetForm(formInsertarCargo);
                modalInsertarCargo.modal("hide");
            }

            else {
                alert(data.error);
            }
        }
    });
});

formInsertarCargo.find('.cancel').on("click", function () {
    resetForm(formInsertarCargo);
    selectCargo.val("");
});

selectCargo.on("change", function () {
    if ($(this).val() === "add") {
        modalInsertarCargo.modal("show");
    }
});
//---Insertar Especialidad Code------------------------------------------------------------
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
        beforeSend: function () {
            formInsertarEspecialidad.find('span.error').text('');
        },
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarEspecialidad.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 1) {
                var newOption = new Option(data.especialidad, data.id, true, true);
                selectEspecialidad.append(newOption).trigger('change');
                resetForm(formInsertarEspecialidad);
                modalInsertarEspecialidad.modal("hide");
            }

            else {
                alert(data.error);
            }
        }
    });
});

formInsertarEspecialidad.find('.cancel').on("click", function () {
    resetForm(formInsertarEspecialidad);
    selectEspecialidad.val("");
});

selectEspecialidad.on("change", function () {
    if ($(this).val() === "add") {
        modalInsertarEspecialidad.modal("show");
    }
});
//---Insertar Idioma Code------------------------------------------------------------
formInsertarIdioma.on("submit", (event) => {
    event.preventDefault();
    $.ajax({
        url: formInsertarIdioma.attr('action'),
        //headers: {'X-Requested-With': 'XMLHttpRequest'},
        method: 'post',//$(form).attr('method'),
        data: new FormData(formInsertarIdioma.get(0)),
        cache: false,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function () {
            formInsertarIdioma.find('span.error').text('');
        },
        success: function (data) {
            if (data.status == -1) {
                $.each(data.error, function (prefix, val) {
                    formInsertarIdioma.find('span.' + prefix + '_error').text(val);
                });
            }
            else if (data.status == 1) {
                var newOption = new Option(data.idioma, data.id, true, true);
                selectIdioma.append(newOption).trigger('change');
                resetForm(formInsertarIdioma);
                modalInsertarIdioma.modal("hide");
            }

            else {
                alert(data.error);
            }
        }
    });
});

formInsertarIdioma.find('.cancel').on("click", function () {
    resetForm(formInsertarIdioma);
    selectIdioma.val("");
});

selectIdioma.on("change", function () {
    if ($(this).val() === "add") {
        modalInsertarIdioma.modal("show");
    }
});
//------------------------------------------------------------------------------------------
$(document).ready(function () {
    $('.cargando').hide();

    //---Insertar Colaborador Code------------------------------------------------------------
    formInsertarColaborador.on("submit", (event) => {
        event.preventDefault();
        $.ajax({
            url: formInsertarColaborador.attr('action'),
            //headers: {'X-Requested-With': 'XMLHttpRequest'},
            method: 'post',//$(form).attr('method'),
            data: new FormData(formInsertarColaborador.get(0)),
            cache: false,
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                modalError.find("p").empty();
                modalSuccess.find("p").empty();
            },
            success: function (data) {
                if (data.status == 0) {
                    modalSuccess.find("p").text("El colaborador " + data.nombre + " se ha insertado con éxito en el sistema.");
                    selectMunicipio.empty();
                    selectCentro.empty();
                    resetForm(formInsertarColaborador);
                    modalSuccess.modal("show");
                }

                else if (data.status == 1) {
                    modalSuccess.find("p").text("El colaborador con número de carnet " + data.carneidentidad + " se ha modificado con éxito en el sistema.");
                    modalSuccess.modal("show");
                }

                else if (data.status < 0) {

                    $.each(data.errors, function (key, value) {
                        modalError.find("p").append('<span id=' + key + '></span>');
                        modalError.find("p #" + key).text(value);
                        modalError.find("p").append('<br>');
                    });
                    modalError.modal("show");
                }
            },
            error: function () {
                modalError.find("p").text("Ha ocurrido un error desconocido intentando realizar la operación en la base de datos.");
                modalError.modal("show");
            },
        });
    });
});

formInsertarColaborador.find('.cancel').on("click", function () {
    window.location.href = urlBase();
});

selectIdioma.on("change", function () {
    if ($(this).val() === "add") {
        modalInsertarIdioma.modal("show");
    }
});
//-------------------------------------------------------------------
var getUrl1 = $(location).attr("origin")+'/ice/otros/municipios/seleccionar';
var getUrl2 = $(location).attr("origin")+'/ice/potencial/centros/seleccionar';
//option class="text-bg-dark" value="add">INSERTAR CENTRO LABORAL</option>
selectProvincia.on("change", function () {
    $.ajax({
        url: getUrl1,
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
    $.ajax({
        url: getUrl2,
        method: 'get',
        data: { "idprovincia": selectProvincia.val() },
        cache: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function() {
            selectCentro.empty();
            selectCentro.append("<option hidden disabled selected></option>");
            selectCentro.append("<option class='text-bg-dark' value='add'>INSERTAR CENTRO LABORAL</option>");
        },
        success: function (data) {

            selectCentro.prop("disabled", false);

            if (data.status == 0) {
                $.each(data.options, function (key, value) {
                    selectCentro.append(new Option(value['centrotrabajo']+" ["+value['nombre']+"]", value['id']));
                });

                selectCentro.trigger("keydown");
            }
            //Si status no es igual a 0, no hacer nada,
        },
        error: function(data) {
            console.log(data);
        },
    });

});
//-------------------------------------------------------------------