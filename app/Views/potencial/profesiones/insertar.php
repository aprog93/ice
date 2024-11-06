<?= $this->extend('potencial/profesiones') ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center">
    <div class="modal fade" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-custom my-0">
                    <h5 class="modal-title fs-5" id="successLabel">Nueva Profesión o Especialidad</h5>
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
                    <h5 class="modal-title fs-5" id="errorLabel">Nueva Profesión o Especialidad</h5>
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


    <div class="modal" id="insertarEspecialidad" role="dialog" tabindex="-1" aria-labelledby="insertarCentroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= base_url("potencial/profesiones/insertar") ?>" method="post" accept-charset="utf-8">
                    <div class="modal-header bg-custom my-0">
                        <h1 class="modal-title fs-5" id="insertarEspecialidadLabel">Nueva Profesión o Especialidad</h1>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12  my-1">
                            <label for="especialidad" class="form-label">Descripción:</label>
                            <input type="text" name="especialidad" class="form-control" id="especialidad" required />
                            <span class="text-danger error especialidad_error"></span>
                        </div>

                    </div>
                    <div class="modal-footer border-0 pt-0 text-center">
                        <button id="btnInsertarEspecialidad" type="submit" class="btn btn-custom">Insertar</button>
                        <button id="btnCancelarEspecialidad" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scriptfoot') ?>
<script src="<?= esc(base_url('assets/js/potencial/profesiones/insertar.js')) ?>"></script>
<?= $this->endSection() ?>