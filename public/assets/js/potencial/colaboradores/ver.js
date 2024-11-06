const linkShow = $("#show");
const linkEditar = $("#editar");
const linkBaja = $("#baja");

$(document).ready(function () {
    $('.cargando').hide();

});


linkShow.on("click", function (event) {
    event.preventDefault();
    alert("OK");
});