<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Dirección Exportaciones ICE">
    <meta name="author" content="Edelbys Díaz Vázquez. KubaProg">

    <title><?= $this->renderSection('title') ?></title>

    <link href="<?= esc(base_url('/assets/css/bootstrap.min.css')) ?>" rel="stylesheet">
    <link href="<?= esc(base_url('/assets/css/datatables.min.css')) ?>" rel="stylesheet">
    <link href="<?= esc(base_url('/assets/css/app.css')) ?>" rel="stylesheet">

    <?= $this->renderSection('css') ?>

    <script src="<?= esc(base_url('assets/js/jquery-3.7.1.min.js')) ?>"></script>
    <script src="<?= esc(base_url('assets/js/bootstrap.bundle.min.js')) ?>"></script>

    <?= $this->renderSection('scripthead') ?>

</head>

<body class="d-flex w-100 h-100 bg-light">

    <div class="d-flex w-100 h-100 align-items-center mx-auto p-0 flex-column cover-container shadow">
        <header class="d-flex w-100 bg-white border-bottom m-0">
            <div class="my-auto">
                <img src="<?= esc(base_url('assets/img/ICE_logo.jpg')) ?>" />
            </div>

            <div class="col flex-column align-items-center justify-content-center my-auto">
                <div class="row my-auto py-1 mx-0 t-shadow text-start">
                    <h1 class="h4">Dirección de Exportaciones</h1>
                </div>

                <div class="ms-3 ps-3">
                    <?= $this->renderSection('nav') ?>
                </div>

            </div>
        </header>

        <main class="w-100 px-3 py-5">
            <?= $this->renderSection('main') ?>
        </main>

        <footer class="w-100 mt-auto border-top bg-white py-1 text-center">
            <p class="m-0">&copy; 2024. Sistema de Dirección de Exportaciones. ICE</p>

            <p class="m-0"><a href="https://kubaprog.com/" class="text-dark">KubaProg</a>.</p>
        </footer>

    </div>
    <?= $this->renderSection('scriptfoot') ?>
</body>

</html>