<div class="modal fade" id="insertarIdioma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertarIdiomaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url("potencial/idiomas/insertar") ?>" method="post" accept-charset="utf-8">
                <div class="modal-header bg-custom my-0">
                    <h1 class="modal-title fs-5" id="insertarIdiomaLabel">Nuevo Idioma</h1>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12  my-1">
                        <label for="idioma" class="form-label">Idioma:</label>
                        <input type="text" name="idioma" class="form-control" id="idioma" required />
                        <span class="text-danger error idioma_error"></span>
                    </div>

                </div>
                <div class="modal-footer border-0 pt-0 text-center">
                    <button id="btnInsertarIdioma" type="submit" class="btn btn-custom">Insertar</button>
                    <button id="btnCancelarIdioma" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>