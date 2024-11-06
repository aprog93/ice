<div class="modal fade" id="insertarExpediente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertarExpedienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= base_url("tramitacion/expedientes/insertar") ?>" method="post">
                    <div class="modal-header bg-custom my-0">
                        <h1 class="modal-title fs-5" id="insertarExpedienteLabel">Nuevo Expediente</h1>
                    </div>
                    <div class="modal-body row">
                        <div class="col-sm-4  my-1">
                            <label for="numeroexpediente" class="form-label">No. Expediente:</label>
                            <input type="text" name="numeroexpedientenumeroexpediente" class="form-control" id="numeroexpediente" required value="<?= (isset($valores)) ? $valores[0]['numeroexpediente'] : '' ?>" <?= (isset($valores)) ? "readonly" : "" ?> />
                            <span class="text-danger error numeroexpediente_error"></span>
                        </div>
                        <div class="col-sm-4  my-1">
                            <label for="fechanotaverbal" class="form-label">Fecha de Nota Verbal:</label>
                            <input type="date" name="fechanotaverbal" class="form-control" id="fechanotaverbal" required value="<?= (isset($valores)) ? $valores[0]['fechanotaverbal'] : '' ?>" />
                            <span class="text-danger error fechanotaverbal_error"></span>
                        </div>
                        <div class="col-sm-8 my-1">
                            <label for="solicitadopor" class="form-label">Solicitado por:</label>
                            <input type="text" name="solicitadopor" class="form-control" id="solicitadopor" required value="<?= (isset($valores)) ? $valores[0]['solicitadopor'] : '' ?>" />
                        </div>
                        <div class="col-sm-4 my-1">
                            <label for="fechasalida" class="form-label">Fecha de Salida:</label>
                            <input type="date" name="fechasalida" class="form-control" id="fechasalida" required value="<?= (isset($valores)) ? $valores[0]['fechasalida'] : '' ?>" />
                            <span class="text-danger error fechasalida_error"></span>
                        </div>
                        <div class="col-sm-4 my-1">
                            <label for="fecharegreso" class="form-label">Fecha de Regreso:</label>
                            <input type="date" name="fecharegreso" class="form-control" id="fecharegreso" required value="<?= (isset($valores)) ? $valores[0]['fecharegreso'] : '' ?>" />
                            <span class="text-danger error fecharegreso_error"></span>
                        </div>
                        <div class="col-sm-3 my-1">
                            <label for="estancia" class="form-label">Estancia:</label>
                            <input type="number" name="estancia" class="form-control" id="estancia" required value="<?= (isset($valores)) ? $valores[0]['estancia'] : '' ?>" />
                            <span class="text-danger error estancia_error"></span>
                        </div>
                        <div class="col-sm-5  my-1">
                            <label for="idtipoactividad" class="form-label">Tipo de Actividad:</label>
                            <select class="form-control form-select" name="idtipoactividad" id="idtipoactividad" required>
                                <option hidden disabled selected></option>
                                <?php foreach ($tipoactividad as $dato) : ?>
                                    <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idsexo']) ? "selected" : "" ?>><?= $dato['tipoactividad'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger error idtipoactividad_error"></span>
                        </div>
                        <div class="col-sm-4 my-1">
                            <label for="fechacreacion" class="form-label">Fecha de Creación:</label>
                            <input type="date" name="fechacreacion" class="form-control" id="fechacreacion" required value="<?= (isset($valores)) ? $valores[0]['fechacreacion'] : '' ?>" />
                            <span class="text-danger error fechacreacion_error"></span>
                        </div>
                        <div class="col-sm-4  my-1">
                            <label for="idpasaporterequerido" class="form-label">Pasaporte Requerido:</label>
                            <select class="form-control form-select" name="idpasaporterequerido" id="idpasaporterequerido" required>
                                <option hidden disabled selected></option>
                                <?php foreach ($tipopasaporte as $dato) : ?>
                                    <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idsexo']) ? "selected" : "" ?>><?= $dato['pasaporte'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger error idpasaporterequerido_error"></span>
                        </div>
                        <div class="col-sm-4  my-1">
                            <label for="idmotivoviaje" class="form-label">Motivo del Viaje:</label>
                            <select class="form-control form-select" name="idmotivoviaje" id="idmotivoviaje" required>
                                <option hidden disabled selected></option>
                                <?php foreach ($motivoviaje as $dato) : ?>
                                    <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idsexo']) ? "selected" : "" ?>><?= $dato['motivo'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-danger error idmotivoviaje_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 text-center">
                        <input id="btnInsertarexpediente" type="submit" class="btn btn-custom" value="Insertar" />
                        <input id="btnCancelarCentro" type="button" class="btn btn-custom-secondary cancel" data-bs-dismiss="modal" value="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
    </div>