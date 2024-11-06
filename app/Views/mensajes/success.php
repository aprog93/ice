<?= $this->extend('plantillas/app') ?>

<?= $this->section('main') ?>

<div class="d-flex modal align-items-center" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog">
        <div class="modal-content rounded-2 shadow pb-3">
            <div class="modal-header p-2 bg-custom rounded-top-2 rouded-end-2">
                <h1 class="h5 m-0"><?= esc($title) ?></h1>
            </div>

            <div class="modal-body">
                <?php if (!empty($msg)) : ?>

                    <div class="d-flex align-items-center py-1">
                        <div class="mx-1">
                            <svg class="me-2" width="32" height="32" fill="#0a5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <div class="mx-1 text-justify">
                            <?= esc($msg); ?>
                        </div>
                    </div>

                <?php endif; ?>
            </div>

            <div class="text-center m-0">
                <a href="<?= base_url($accept_link) ?>"><input type="button" class="btn btn-custom" id="Aceptar" value="Aceptar" data-bs-dismiss="modal"></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>