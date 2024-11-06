<?= $this->extend('tramitacion/expedientes') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">

    <!-- Modal de mensaje si todo está bien-->
    <?= $this->include('mensajes/modalSuccess') ?>
    <!-- Modal de mensaje si si hay error-->
    <?= $this->include('mensajes/modalError') ?>
    <!-- Modal Formularios-->
    <?= $this->include('tramitacion/expedientes/formExpediente') ?>
</div>

<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<script src="<?= esc(base_url('assets/js/tramitacion/expedientes/insertar.js')) ?>"></script>
<?= $this->endSection() ?>