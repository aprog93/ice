<?= $this->extend('app/bd') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">

    <div class="rounded-2 mx-auto align-items-center shadow col-4">

        <div class="p-3 border-bottom-1 bg-custom rounded-top-2 rouded-end-2">
            <h1 class="h5 m-0">Importar Base de Datos</h1>
        </div>
        <div class="p-3">

            <?php if (!empty($type)) : ?>
                <div class="alert alert-danger pe-3 pt-2 pb-0">
                    <p>
                        <b><?= esc($msg); ?> </b>
                    </p>
                </div>
            <?php endif;  ?>

            <!-- <?= form_open_multipart(base_url("app/import")) ?> -->
            <form class="row gx-3 gy-2 align-items-center" action="<?= base_url("app/import") ?>" method="post" enctype="multipart/form-data">

                <!-- <div class="row pe-0"> -->
                    <div class="col-6">
                        <label for="bd" class="form-label">Contenido de la Base de Datos:</label>
                        <select class="form-select form-select-sm" name="bd" id="bd" value="" required>
                            <option value=0 hidden></option>
                            <option value=1>Colaboradores</option>
                            <option value=2>Pasaportes</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div class="border rounded-2 info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0a5" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                            <span>Formato correcto de fecha en la BD, según configuración local: <strong><?= esc($formato) ?></strong>.</span>
                        </div>
                    </div>
                <!-- </div> -->

                <div class="col-12">
                    <label for="fila" class="form-label">Base de Datos:</label>
                    <input type="file" name="fila" id="fila" class="form-control" accept=".xls,.xlsx,.mdb,.accdb" required/>
                </div>

                <div class="w-100 btn-center mt-3 my-auto text-center">
                    <button class="btn btn-custom" id="importar">Importar</button>
                </div>

            </form>
        </div>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>