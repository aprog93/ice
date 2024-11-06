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
                        <div class="mx-2">
                        <svg width="32" height="32" fill="#F5871F" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                
                            </svg>
                        </div>
                        <div class="mx-2 text-justify">
                            <?= esc($msg); ?>
                        </div>
                    </div>

                <?php endif; ?>
            </div>

            <div class="text-center m-0">
                <a href="<?= base_url($accept_link) ?>"><input type="button" class="btn btn-custom px-4" id="Aceptar" value="Sí" data-bs-dismiss="modal"></a>
                <a href="<?= base_url($cancel_link) ?>"><input type="button" class="btn btn-custom  px-4" id="Cancelar" value="No" data-bs-dismiss="modal"></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>