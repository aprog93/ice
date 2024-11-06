<?= $this->extend('plantillas/main') ?>

<?= $this->section('nav') ?>
<div class="d-flex flex-row-reverse bg-custom p-0 t-shadow">
  <ul class="nav nav-link-black my-auto">
    <li class="nav-item">
      <a href="<?= base_url() ?>" class="nav-link" aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
          <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
        </svg>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Potencial</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url("potencial/colaboradores") ?>">Colaboradores</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="<?= base_url("potencial/profesiones") ?>">Profesiones</a></li>
        <li><a class="dropdown-item" href="<?= base_url("potencial/cargos") ?>">Ocupaciones</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="<?= base_url("potencial/centros") ?>">Centros Laborales</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Tramitación</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url("tramitacion/expedientes")?>">Expedientes</a></li>
        <li><a class="dropdown-item" href="<?= base_url("tramitacion/tramites")?>">Trámites</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="<?= base_url("tramitacion/pasaportes")?>">Pasaportes</a></li>
        <li><a class="dropdown-item" href="<?= base_url("tramitacion/visas")?>">Visas</a></li>
        <li><a class="dropdown-item" href="<?= base_url("tramitacion/prestamos_pasaportes")?>">Préstamos Pasaportes</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Contratación</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url("contratacion/contratos") ?>">Contratos</a></li>
        <li><a class="dropdown-item" href="<?= base_url("contratacion/prorrogas") ?>">Prórrogas</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="<?= base_url("contratacion/cierres_contratos") ?>">Cierres Contratos</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Información Adicional</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url("prueba") ?>">Action</a></li>
        <li><a class="dropdown-item" href="<?= base_url() ?>">Another action</a></li>
        <li><a class="dropdown-item" href="<?= base_url() ?>">Something else here</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Estadísticas</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url() ?>">Action</a></li>
        <li><a class="dropdown-item" href="<?= base_url() ?>">Another action</a></li>
        <li><a class="dropdown-item" href="<?= base_url() ?>">Something else here</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Sistema</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url("sistema/usuarios") ?>">Usuarios</a></li>
        <li><a class="dropdown-item" href="<?= base_url("sistema/roles") ?>">Roles</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="<?= base_url("sistema/bd") ?>">Bases de Datos</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
          <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
        </svg>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url() ?>">Perfil de Usuario</a></li>
        <li><a class="dropdown-item" href="<?= base_url("logout") ?>">Cerrar Sesión</a></li>
      </ul>
    </li>
  </ul>
</div>

<div class="d-flex flex-row-reverse bg-custom-secondary ms-auto me-0  min-h-1 w-100 t-shadow-dark">
  <?= $this->renderSection('toolbar') ?>
</div>

<?= $this->endSection() ?>

