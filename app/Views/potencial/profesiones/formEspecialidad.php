<div class="modal fade" id="insertarEspecialidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertaEspecialidadLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url("potencial/profesiones/insertar") ?>" method="post">
                <div class="modal-header bg-custom my-0">
                    <h1 class="modal-title fs-5" id="insertarEspecialidadLabel">Nueva Especialidad</h1>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12  my-1">
                        <label for="especialidad" class="form-label">Descripción de la Especialidad:</label>
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