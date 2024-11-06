<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto me-2">
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>potencial/centros/insert">Insertar</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>potencial/centros/search">Buscar...</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>potencial/centros/show">Ver</a>
    </li>
   <!--  <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>potencial/centros/update">Modificar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>potencial/centros/delete">Eliminar</a>
    </li> -->
</ul>
<?= $this->endSection() ?>


<?= $this->section('main') ?>
<?= $this->renderSection('main') ?>
<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<!-- <script src="<?= esc(base_url()) ?>public/assets/js/jquery.js"></script> -->
<?= $this->endSection() ?>