<?= $this->extend('potencial/colaboradores') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="d-flex align-items-center w-100 px-4">
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
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
                </tr>
            </tfoot>
        </table>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('script') ?>
    <script>
        let table = new DataTable('#datatable', {
            scrollX: true,
            language: {
                url: '/ice/public/assets/others/es-MX.json',
            },
        });
    </script>
    <?= $this->endSection() ?>