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