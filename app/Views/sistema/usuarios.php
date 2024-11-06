<?= $this->extend('plantillas/app') ?>

<?= $this->section('toolbar') ?>
<ul class="nav nav-link-white my-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url("sistema/usuarios/insertar") ?>">Nuevo usuario...</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url("sistema/usuarios/s") ?>">Usuarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url("sistema/usuarios/cambiarpasswd") ?>">Cambiar contraseña</a>
    </li>
</ul>
<?= $this->endSection() ?>


<?= $this->section('main') ?>
<?= $this->renderSection('main') ?>
<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>

<?= $this->renderSection('scriptfoot') ?>
<?= $this->endSection() ?>