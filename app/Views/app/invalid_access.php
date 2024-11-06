<?= $this->extend('plantillas/main') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
  <div class="wrap">
        <h1>Acceso Denegado</h1>

        <p>           
            <?= nl2br(esc($message)) ?>           
        </p>
    </div>
<?= $this->endSection() ?>
