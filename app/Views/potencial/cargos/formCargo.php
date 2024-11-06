<div class="modal fade" id="insertarCargo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertarCargoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url("potencial/cargos/insertar") ?>" method="post" accept-charset="utf-8">
                <div class="modal-header bg-custom my-0">
                    <h1 class="modal-title fs-5" id="insertarCargoLabel">Nuevo Cargo</h1>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 my-1">
                        <label for="cargo" class="form-label">Descripción del Cargo:</label>
                        <input type="text" name="cargo" class="form-control" id="cargo" required />
                        <span class="text-danger error cargo_error"></span>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 text-center">
                    <button type="submit" class="btn btn-custom">Insertar</button>
                    <button type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>