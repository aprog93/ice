<?= $this->extend('potencial/colaboradores') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">
    <!-- Área de ventanas modal -->
    <!-- Modal de mensaje si todo está bien-->
    <?= $this->include('mensajes/modalSuccess') ?>
    <!-- Modal de mensaje si si hay error-->
    <?= $this->include('mensajes/modalError') ?>
    <!-- Modal Formularios-->
    <?= $this->include('potencial/cargos/formCargo') ?>

    <?= $this->include('potencial/centros/tiposCentros/formTipoCentro') ?>

    <?= $this->include('potencial/centros/formCentro') ?>

    <?= $this->include('potencial/profesiones/formEspecialidad') ?>

    <?= $this->include('otros/formIdioma') ?>

    <!-- Fin área de ventanas modal -->

    <?= $this->include('potencial/colaboradores/formColaborador') ?>

</div>

<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<script src="<?= esc(base_url('assets/js/potencial/colaboradores/insertar.js')) ?>"></script>
<script>
    function urlBase() {
        var url = window.location.pathname.split('/');

        var ruta = ""; //url.protocol + "//";

        for (let index = 0; index < url.length - 1; index++) {
            if (url[index] != 'public')
                ruta += url[index] + "/";

        }

        return ruta;
    };
//------------------------------------------------------------
    function onSuccess() {
        selectMunicipio.empty();
        selectCentro.empty();
        resetForm(formInsertarColaborador);
    }
</script>
<?= $this->endSection() ?>