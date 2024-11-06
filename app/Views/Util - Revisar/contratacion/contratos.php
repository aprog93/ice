<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
    <ul class="nav nav-link-white my-auto">    
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>contratos/new">Nuevo</a>       
    </li>
    <li class="nav-item">
        <a class="nav-link">Buscar...</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url()) ?>contratos/show">Ver</a>
    </li>
    <li class="nav-item">
        <a class="nav-link">Modificar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link">Eliminar</a>
    </li>
    </ul> 
<?= $this->endSection() ?>


<?= $this->section('main') ?>
    <?= $this->renderSection('main') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?> 
        
<?= $this->endSection() ?>