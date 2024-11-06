<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto me-2">
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>tramitacion/expedientes/insert">Insertar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>tramitacion/expedientes/show">Ver</a>
    </li>
</ul>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?= $this->renderSection('main') ?>
<h1>esta es la zona de expredientes</h1>
<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<?= $this->endSection() ?>