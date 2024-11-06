<?= $this->extend('plantillas/app') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">

    <div class="panel rounded-2 mx-auto align-items-center shadow col-4">

        <div class="panel-heading px-3 py-2 border-bottom-1 bg-custom rounded-top-2 rouded-end-2">
            <h1 class="h5 m-0"><?= esc($title) ?></h1>
        </div>
        <div class="panel-body p-3">

            <?php if (!empty($msg)) : ?>
                <div class="d-flex align-items-center py-1">
                    <div class="mx-1">
                        <svg class="me-2" width="32" height="32" fill="#0a5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                    <div class="mx-1 text-justify">
                        <?= esc($msg); ?>
                    </div>
                </div>
            <?php endif;  ?>

            <div class="w-100 btn-center mt-3 my-auto text-center">
                <a href="<?= base_url($accept_link) ?>"><input type="button" class="btn btn-custom" id="Aceptar" value="Sí"></a>
                <a href="<?= base_url($cancel_link) ?>"><input type="button" class="btn btn-custom" id="Cancelar" value="No"></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>