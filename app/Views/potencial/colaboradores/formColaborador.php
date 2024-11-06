<div class="rounded-2 mx-auto align-items-center shadow">

    <div class="p-3 border-bottom bg-custom rounded-top-2 rouded-end-2">
        <h1 class="h5 m-0">Nuevo Colaborador</h1>
    </div>

    <div class="align-items-center p-3">
        <form id="insertarColaboradorForm" action="<?= base_url("potencial/colaboradores/insert") ?>" method="post">

            <div class="row g-3">
                <input type="hidden" name="id" class="form-control" id="id" required value="<?= (isset($valores)) ? $valores[0]['id'] : '' ?>" />
                <div class="col-sm-4">
                    <label for="nombre" class="form-label">Nombre(s) y Apellidos:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" required value="<?= (isset($valores)) ? $valores[0]['nombre'] : '' ?>" />
                    <span class="text-danger error nombre_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="carneidentidad" class="form-label">Carné Identidad:</label>
                    <input type="number" name="carneidentidad" class="form-control" id="carneidentidad" required value="<?= (isset($valores)) ? $valores[0]['carneidentidad'] : '' ?>" <?= (isset($valores)) ? "readonly" : "" ?> />
                    <span class="text-danger error carneidentidad_error"></span>
                </div>
                <div class="col-1_5">
                    <label for="idsexo" class="form-label">Sexo:</label>
                    <select class="form-control form-select" name="idsexo" id="idsexo" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($sexo as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idsexo']) ? "selected" : "" ?>><?= $dato['sexo'] ?></option>
                        <?php endforeach ?>

                    </select>
                    <span class="text-danger error idsexo_error"></span>
                </div>
                <div class="col-1_5">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" name="edad" class="form-control" id="edad" required value="<?= (isset($valores)) ? $valores[0]['edad'] : '' ?>" />
                    <span class="text-danger error edad_error"></span>
                </div>
                <div class="col-1_5">
                    <label for="idcolorpiel" class="form-label">Piel:</label>
                    <select class="form-control form-select" name="idcolorpiel" id="idcolorpiel" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($piel as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idcolorpiel']) ? "selected" : "" ?>><?= $dato['descripcion'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error idcolorpiel_error"></span>
                </div>
                <div class="col-1_5">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" name="telefono" class="form-control rounded-3" id="telefono" value="<?= (isset($valores)) ? $valores[0]['telefono'] : '' ?>" />
                    <span class="text-danger error telefono_error"></span>
                </div>
            </div>

            <div class="row g-3 my-0">
                <div class="col-sm-2">
                    <label for="provincia" class="form-label">Provincia:</label>
                    <select class="form-control form-select" name="provincia" id="provincia" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($provincia as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idprovincia']) ? "selected" : "" ?>><?= $dato['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error provincia_error"></span>
                </div>

                <div class="col-sm-2">
                    <label for="idmunicipio" class="form-label">Municipio:</label>
                    <select class="form-control form-select municipio" name="idmunicipio" id="idmunicipio" required>
                        <option hidden disabled selected></option>
                        <?php if (isset($municipio)) : ?>
                            <?php foreach ($municipio as $dato) : ?>
                                <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idmunicipio']) ? "selected" : "" ?>><?= $dato['nombre'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <span class="text-danger error municipio_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="reparto" class="form-label">Localidad o Reparto:</label>
                    <input type="text" name="reparto" class="form-control rounded-3" id="reparto" value="<?= (isset($valores)) ? $valores[0]['reparto'] : '' ?>" />
                    <span class="text-danger error reparto_error"></span>
                </div>
                <div class="col-sm-4">
                    <label for="direccion" class="form-label">Dirección Particular:</label>
                    <input type="text" name="direccion" class="form-control rounded-3" id="direccion" required value="<?= (isset($valores)) ? $valores[0]['direccion'] : '' ?>" />
                    <span class="text-danger error direccion_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="idestadocivil" class="form-label">Estado Civil:</label>
                    <select class="form-control form-select" name="idestadocivil" id="idestadocivil" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($estadocivil as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idestadocivil']) ? "selected" : "" ?>><?= $dato['descripcion'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error estadocivil_error"></span>
                </div>
            </div>

            <div class="row g-3 my-0">
                <div class="col-sm-3">
                    <label for="nombrepadre" class="form-label">Nombre del padre:</label>
                    <input type="text" name="nombrepadre" class="form-control rounded-3" id="nombrepadre" required value="<?= (isset($valores)) ? $valores[0]['nombrepadre'] : '' ?>" />
                    <span class="text-danger error nombrepadre_error"></span>
                </div>
                <div class="col-sm-3">
                    <label for="nombremadre" class="form-label">Nombre de la madre:</label>
                    <input type="text" name="nombremadre" class="form-control rounded-3" id="nombremadre" required value="<?= (isset($valores)) ? $valores[0]['nombremadre'] : '' ?>" />
                    <span class="text-danger error nombremadre_error"></span>
                </div>
                <div class="col-sm-3">
                    <label for="familiaraavisar" class="form-label">Familiar a quién avisar:</label>
                    <input type="text" name="familiaraavisar" class="form-control rounded-3" id="familiaraavisar" value="<?= (isset($valores)) ? $valores[0]['familiaraavisar'] : '' ?>" />
                    <span class="text-danger error familiaraavisar_error"></span>
                </div>
                <div class="col-sm-3">
                    <label for="conyugue" class="form-label">Cónyugue:</label>
                    <input type="text" name="conyugue" class="form-control rounded-3" id="conyugue" value="<?= (isset($valores)) ? $valores[0]['conyugue'] : '' ?>" />
                    <span class="text-danger error conyugue_error"></span>
                </div>
            </div>

            <div class="row g-3 my-0">
                <div class="col-sm-1">
                    <label for="cantidadhijos" class="form-label">Hijos:</label>
                    <input type="number" name="cantidadhijos" class="form-control rounded-3" id="cantidadhijos" value="<?= (isset($valores)) ? $valores[0]['cantidadhijos'] : '' ?>" />
                    <span class="text-danger error cantidadhijos_error"></span>
                </div>

                <div class="col-sm-3">
                    <label for="idcentro" class="form-label">Centro Laboral:</label>
                    <select class="form-control form-select" name="idcentro" id="idcentro" required <?= (isset($valores)) ? '' : 'disabled' ?> >
                        <option value="" hidden disabled selected></option>
                        <option class="text-bg-dark" value="add">INSERTAR CENTRO LABORAL</option>
                        <?php if (isset($centrolaboral)) : ?>
                            <?php foreach ($centrolaboral as $dato) : ?>
                                <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idcentro']) ? "selected" : "" ?>><?= $dato['centrotrabajo'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <span class="text-danger error centro_error"></span>
                </div>

                <div class="col-sm-2">
                    <label for="telefonolaboral" class="form-label">Teléfono Laboral:</label>
                    <input type="tel" name="telefonolaboral" class="form-control rounded-3" id="telefonolaboral" value="<?= (isset($valores)) ? $valores[0]['telefonolaboral'] : '' ?>" />
                    <span class="text-danger error telefono_error"></span>
                </div>

                <div class="col-sm-2">
                    <label for="idcargosalir" class="form-label">Cargo al Salir:</label>
                    <select class="form-control form-select" name="idcargosalir" id="idcargosalir" required>
                        <option value="" hidden disabled selected></option>
                        <option class="text-bg-dark" value="add">INSERTAR CARGO</option>

                        <?php foreach ($cargo as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idcargosalir']) ? "selected" : "" ?>><?= $dato['cargo'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error idcargosalir_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="idespecialidad" class="form-label">Especialidad:</label>
                    <select class="form-control form-select" name="idespecialidad" id="idespecialidad" required>
                        <option value="" hidden disabled selected></option>
                        <option class="text-bg-dark" value="add">INSERTAR ESPECIALIDAD</option>
                        <?php foreach ($especialidad as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idespecialidad']) ? "selected" : "" ?>><?= $dato['especialidad'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error idespecialidad_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="idgradocientifico" class="form-label">Grado Científico:</label>
                    <select class="form-control form-select" name="idgradocientifico" id="idgradocientifico" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($grado as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idgradocientifico']) ? "selected" : "" ?>><?= $dato['grado'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error gradocientifico_error"></span>
                </div>
            </div>

            <div class="row g-3 my-0">
                <div class="col-sm-2">
                    <label for="idcategoriadocente" class="form-label">Categoría Docente:</label>
                    <select class="form-control form-select" name="idcategoriadocente" id="idcategoriadocente" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($categoria as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idcategoriadocente']) ? "selected" : "" ?>><?= $dato['categoria'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error categoriadocente_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="ididioma" class="form-label">Idioma:</label>
                    <select class="form-control form-select" name="ididioma" id="ididioma" required>
                        <option value="" hidden disabled selected></option>
                        <option class="text-bg-dark" value="add">INSERTAR IDIOMA</option>
                        <?php foreach ($idioma as $dato) : ?>
                            <?php if(isset($valores))
                                $selected = ($dato['id'] == $valores[0]['ididioma']) ? "selected" : "";
                            else $selected = ($dato['idioma'] === "ESPAÑOL") ? "selected" : "";
                            ?>
                            <option value="<?= $dato['id'] ?>" <?= $selected ?>><?= $dato['idioma'] ?></option>

                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error ididioma_error"></span>
                </div>
                <div class="col-sm-1">
                    <label for="salario" class="form-label">Salario:</label>
                    <input type="text" name="salario" class="form-control rounded-3" id="salario" required value="<?= (isset($valores)) ? $valores[0]['salario'] : '' ?>" />
                    <span class="text-danger error salario_error"></span>
                </div>
                <div class="col-sm-2">
                    <label for="idmilitancia" class="form-label">Militancia:</label>
                    <select class="form-control form-select" name="idmilitancia" id="idmilitancia" required>
                        <option hidden disabled selected></option>
                        <?php foreach ($militancia as $dato) : ?>
                            <option value="<?= $dato['id'] ?>" <?= (isset($valores) && $dato['id'] == $valores[0]['idmilitancia']) ? "selected" : "" ?>><?= $dato['militancia'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-danger error militancia_error"></span>
                </div>
                <div class="col-sm-1">
                    <label for="cuadro" class="form-label">Cuadro:</label>
                    <select class="form-control form-select" name="cuadro" id="cuadro" required>
                        <option hidden disabled selected></option>
                        <option value=0 <?= (isset($valores) && $valores[0]['cuadro'] == 0) ? "selected" : "" ?>>NO</option>
                        <option value=1 <?= (isset($valores)  && $valores[0]['cuadro'] == 1) ? "selected" : "" ?>>SI</option>
                    </select>
                    <span class="text-danger error cuadro_error"></span>
                </div>
            </div>

            <div class="mt-3 my-auto text-center">
                <button type="submit" class="btn btn-custom me-2" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-custom-secondary cancel">Cancelar</button>
            </div>
        </form>
    </div>

</div>