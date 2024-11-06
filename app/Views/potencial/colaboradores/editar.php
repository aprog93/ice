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

    const myUrl = $(location).attr("origin")+'/ice/potencial/colaboradores/show';

    function urlBase() {
        return myUrl;
    };
//------------------------------------------------------------
    modalSuccess.find('.btn').on("click", function () {
        window.location.href = urlBase();
    });

</script>
<?= $this->endSection() ?>