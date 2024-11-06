<?= $this->extend('plantillas/app') ?>

<?= $this->section('css') ?>
<?= $this->renderSection('css') ?>
<?= $this->endSection() ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto me-2">
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url('potencial/cargos/insert')) ?>">Insertar</a>
    </li>
</ul>
<?= $this->endSection() ?>


<?= $this->section('main') ?>
<?= $this->renderSection('main') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->renderSection('script') ?>
<?= $this->endSection() ?>