<?= $this->extend('potencial/centros') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">
    <div class="modal fade" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-custom my-0">
                    <h5 class="modal-title fs-5" id="successLabel">Nuevo Centro Laboral</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center py-1">
                        <div class="mx-1">
                            <svg class="me-2" width="32" height="32" fill="#0a5" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        </div>
                        <div class="mx-1 text-justify">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 text-center">
                    <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de mensaje si si hay error-->
    <div class="modal fade" id="error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-custom my-0">
                    <h5 class="modal-title fs-5" id="errorLabel">Nuevo Centro Laboral</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center py-1">
                        <div class="mx-1">
                            <svg class="me-2" width="32" height="32" fill="#f00" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                            </svg>
                        </div>
                        <div class="mx-1 text-justify">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 text-center">
                    <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="insertarTipoCentro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertarTipoCentroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= base_url("potencial/centros/insertarTipo") ?>" method="post" accept-charset="utf-8">
                    <div class="modal-header bg-custom my-0">
                        <h1 class="modal-title fs-5" id="insertarTipoCentroLabel">Nuevo Tipo de Centro Laboral</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12  my-1">
                            <label for="tipocentro" class="form-label">Tipo Centro:</label>
                            <input type="text" name="tipocentro" class="form-control" id="tipocentro" required>
                            <span class="text-danger error tipocentro_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 text-center">
                        <input id="btnInsertarTipoCentro" type="submit" class="btn btn-custom" value="Insertar" />
                        <input id="btnCancelarTipoCentro" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal" value="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------- -->
    <div class="w-500px rounded-2 mx-auto align-items-center shadow" id="insertarCentro" role="dialog" tabindex="-1">
        <div class="">
            <div class="">
            <form action="<?= base_url("potencial/centros/insertar") ?>" method="post">
                    <div class="p-3 border-bottom bg-custom rounded-top-2 rouded-end-2">
                        <h1 class="fs-5" id="insertarCentro">Nuevo Centro Laboral</h1>
                    </div>
                    <div class="align-items-center p-3 row">
                        <div class="col-sm-12  my-1">
                            <label for="centrotrabajo" class="form-label">Nombre del Centro:</label>
                            <input type="text" name="centrotrabajo" class="form-control" id="centrotrabajo" required />
                            <span class="text-danger error centrotrabajo_error"></span>
                        </div>
                        <div class="col-sm-12  my-1">
                            <label for="direccioncentro" class="form-label">Dirección:</label>
                            <input type="text" name="direccioncentro" class="form-control" id="direccioncentro" required />
                            <span class="text-danger error direccioncentro_error"></span>
                        </div>
                        <div class="col-sm-6  my-1">
                            <label for="provincia" class="form-label">Provincia:</label>
                            <select class="form-control form-select" name="provincia" id="provincia" required>
                                <option hidden disabled selected></option>
                                <?php foreach ($provincia as $dato) : ?>
                                    <option value="<?= $dato['id'] ?>"><?= $dato['nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger error idmunicipio_error"></span>
                        </div>
                        <div class="col-sm-6  my-1">
                            <label for="idmunicipio" class="form-label">Municipio:</label>
                            <select class="form-control form-select municipio" name="idmunicipio" id="idmunicipio" required>
                            </select>
                            <span class="text-danger error idmunicipio_error"></span>
                        </div>
                        <div class="col-sm-8  my-1">
                            <label for="idtipocentro" class="form-label">Tipo de Centro:</label>
                            <select class="form-control form-select" name="idtipocentro" id="idtipocentro" required>
                                <option value="" hidden disabled selected></option>
                                <option class="text-bg-dark" value="add">INSERTAR TIPO DE CENTRO</option>
                                <?php foreach ($tipocentro as $dato) : ?>
                                    <option value="<?= $dato['id'] ?>"><?= $dato['tipocentro'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger error idtipocentro_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-3 pt-0 text-center">
                        <input id="btnInsertarCentro" type="submit" class="btn btn-custom me-2" value="Insertar" />
                        <input id="btnCancelarCentro" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal" value="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------ -->
</div>

<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<script src="<?= esc(base_url('assets/js/potencial/centros/insertar.js')) ?>"></script>
<?= $this->endSection() ?>