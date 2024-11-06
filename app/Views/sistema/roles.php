<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>app/import">Importar BD</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>app/clean">Vaciar BD</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>app/export">Exportar BD</a>
    </li>
</ul>
<?= $this->endSection() ?>


<?= $this->section('main') ?>
<?= $this->renderSection('main') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= esc(base_url()) ?>public/assets/js/jquery.js"></script>
<?= $this->renderSection('script') ?>
<?= $this->endSection() ?>