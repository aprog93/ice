<div class="modal fade" id="insertarCentro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertarCentroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= base_url("potencial/centros/insertar") ?>" method="post">
                    <div class="modal-header bg-custom my-0">
                        <h1 class="modal-title fs-5" id="insertarCentroLabel">Nuevo Centro Laboral</h1>
                    </div>
                    <div class="modal-body">
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
                            <label for="nombreprovincia" class="form-label">Provincia:</label>
                            <input type="text" name="nombreprovincia" class="form-control" id="nombreprovincia" required disabled />
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
                    <div class="modal-footer border-0 pt-0 text-center">
                        <input id="btnInsertarCentro" type="submit" class="btn btn-custom" value="Insertar" />
                        <input id="btnCancelarCentro" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal" value="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
    </div>