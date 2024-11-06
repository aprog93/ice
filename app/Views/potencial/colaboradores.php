<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto me-2">
    <li class="nav-item">
        <a class="nav-link" href="<?= esc(base_url('potencial/colaboradores/insert')) ?>">Insertar</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link load" href="<?= esc(base_url('potencial/colaboradores/search')) ?>">Buscar...</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link load" href="<?= esc(base_url('potencial/colaboradores/show')) ?>">Ver</a>
    </li>
    <!--  <li class="nav-item">
        <a class="nav-link load" href="<?= esc(base_url('potencial/colaboradores/update')) ?>">Modificar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link load" href="<?= esc(base_url('potencial/colaboradores/delete')) ?>">Eliminar</a>
    </li> -->
</ul>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

    <div class="modal-custom cargando row align-items-center" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<?= $this->endSection() ?>