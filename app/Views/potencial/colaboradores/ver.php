<?= $this->extend('potencial/colaboradores') ?>

<?= $this->section('scripthead') ?>
<script src="<?= esc(base_url('assets/js/datatables.min.js')) ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<!-- <div class="cargando row align-items-center">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>
    </div> -->

<div class="modal-custom cargando row align-items-center" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex w-75 mx-auto">

    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <div class="w-100 rounded-2 mx-auto align-items-center shadow py-1 px-2 bg-custom-single">

        <table id="datatable" class="w-100 table table-striped display nowrap">
            <thead>
                <tr>
                    <th>Nombre(s) y Apellidos</th>
                    <th>C. Identidad</th>
                    <th>Sexo</th>
                    <th>Edad</th>
                    <th>Piel</th>
                    <th>Telefono</th>
                    <th>Provincia</th>
                    <th>Municipio</th>
                    <th>Reparto</th>
                    <th>Direccion</th>
                    <th>Centro laboral</th>
                    <th>Cargo</th>
                    <th>Especialidad</th>
                    <th>Grado Científico</th>
                    <th>Categoría Docente</th>
                    <th class="text-center">...</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $key => $dato) : ?>
                    <tr>
                        <td><?= $dato['nombre'] ?></td>
                        <td><?= $dato['carneidentidad'] ?></td>
                        <td><?= $dato['sexo'] ?></td>
                        <td><?= $dato['edad'] ?></td>
                        <td><?= $dato['piel'] ?></td>
                        <td><?= $dato['telefono'] ?></td>
                        <td><?= $dato['nombreprovincia'] ?></td>
                        <td><?= $dato['nombremunicipio'] ?></td>
                        <td><?= $dato['reparto'] ?></td>
                        <td><?= $dato['direccion'] ?></td>
                        <td><?= $dato['centrotrabajo'] ?></td>
                        <td><?= $dato['cargo'] ?></td>
                        <td><?= $dato['especialidad'] ?></td>
                        <td><?= $dato['grado'] ?></td>
                        <td><?= $dato['categoria'] ?></td>
                        <th>
                            <a id="show" href="<?= base_url("potencial/colaboradores/show/" . $dato['id']) ?>" class=""><img src="<?= base_url("/assets/img/bootstrap/list-stars.svg") ?>" /></a>
                            <a id="editar" href="<?= base_url("potencial/colaboradores/editar/" . $dato['id']) ?>" class=""><img src="<?= base_url("/assets/img/editar.png") ?>" /></a>
                            <a id="baja" href="<?= base_url("potencial/colaboradores/baja/" . $dato['id']) ?>" class=""><img src="<?= base_url("/assets/img/bootstrap/dash-circle-fill.svg") ?>" /></a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('scriptfoot') ?>
    <script>
        let table = new DataTable('#datatable', {
            scrollX: true,
            language: {
                url: '/ice/public/assets/others/es-MX.json',
            },
        });
    </script>
    <script src="<?= esc(base_url('assets/js/potencial/colaboradores/ver.js')) ?>"></script>
    <?= $this->endSection() ?>