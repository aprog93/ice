<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

service('auth')->routes($routes);

//$routes->addRedirect('/', 'login');
$routes->get('/', 'AppController::index');

//$routes->get('logout', 'AppController::index');

//$routes->group("potencial", ["filter" => "group:tramitador"], static function ($routes) {
$routes->group("potencial", ["filter" => "group:superadmin"], static function ($routes) {

    $routes->group("colaboradores", static function ($routes) 
    {
        $routes->get('/', 'ColaboradorController::index');
        $routes->get('insert', 'ColaboradorController::insertar');
        $routes->post('insert', 'ColaboradorController::accionInsertar');
        $routes->get('show', 'ColaboradorController::show');
        $routes->get('editar/(:num)', 'ColaboradorController::editar/$1');
    });

    $routes->group("profesiones", static function ($routes) 
    {

        $routes->get('/', 'ProfesionesController::index');
        $routes->get('insert', 'ProfesionesController::insertar');
        $routes->post('insertar', 'ProfesionesController::accionInsertar');
    });

    $routes->group("cargos", static function ($routes) 
    {

        $routes->get('/', 'CargoController::index');
        $routes->post('insertar', 'CargoController::accionInsertar');
        $routes->get('insert', 'CargoController::insertar');
        // $routes->get('show', 'CargoController::show');
    });

    $routes->group("idiomas", static function ($routes) 
    {
        $routes->get('/', 'IdiomaController::index');
        $routes->post('insertar', 'IdiomaController::accionInsertar');
    });

    $routes->group("centros", static function ($routes) 
    {
        $routes->get('/', 'CentrosController::index');
        $routes->get('seleccionar', 'CentrosController::select');
        $routes->get('seleccionar/(:any)', 'CentrosController::select/$1');
        $routes->post('insertarTipo', 'CentrosController::accionInsertarTipo');
        $routes->get('insert', 'CentrosController::insertar');
        $routes->post('insertar', 'CentrosController::accionInsertarCentro');
    });
});

$routes->group("otros", ["filter" => "group:superadmin"], static function ($routes) {
    $routes->group("municipios", static function ($routes) 
    {
        $routes->get('seleccionar', 'MunicipiosController::seleccionar');
        $routes->post('seleccionar', 'MunicipiosController::seleccionar');
    });
});

$routes->group("sistema",  static function ($routes) {

    $routes->group("bd", static function ($routes) 
    {
        $routes->get('/', 'BaseDatoController::index');
        $routes->get('importdata', 'BaseDatoController::importarData');
        $routes->get('import', 'BaseDatoController::importar');
        $routes->get('clean', 'BaseDatoController::vaciarBD');
        $routes->get('cleanAll', 'BaseDatoController::accionVaciarBD');
        $routes->post('importdata', 'BaseDatoController::accionImportarDatos');
        $routes->post('import', 'BaseDatoController::accionImportar');
    });

    $routes->group("usuarios", static function ($routes) 
    {
        $routes->get('/', 'UsuarioController::index');
        $routes->get('insertar', 'UsuarioController::insertar');
        $routes->post('insertar', 'UsuarioController::accionInsertar');
        $routes->get('show', 'UsuarioController::show');
        $routes->get('cambiarpasswd', 'UsuarioController::cambiarContrasenna');
        $routes->post('cambiarpasswd', 'UsuarioController::accionCambiarContrasenna');
    });
});

/* $routes->group("app", ["filter" => "group:tramitador"], static function ($routes) {

    $routes->get('bd', 'AppController::bd');
    $routes->get('import', 'AppController::importar');
    $routes->post('import', 'AppController::accionImportar');
    $routes->get('clean', 'AppController::vaciarBD');
    $routes->get('cleanAll', 'AppController::accionVaciarBD');
});

$routes->get('prueba', 'AppController::prueba');
 */

/* $routes->get('colaboradores/import', 'ColaboradorController::importar');
$routes->get('colaboradores/new', 'ColaboradorController::insertar');
$routes->get('colaboradores/show', 'ColaboradorController::show');
$routes->get('colaboradores/update', 'ColaboradorController::modificar');
$routes->get('colaboradores/delete', 'ColaboradorController::eliminar');
$routes->get('colaboradores/find', 'ColaboradorController::buscar'); */

/* $routes->group("admin", ["filter" => "group:admin"], static function ($routes) {

    $routes->get('entities', 'Entities::index');
    $routes->post('entities/create', 'Entities::create');

});
 */

//  Rutas para modelo de negocio de expedientes
$routes->group("tramitacion", ["filter" => "group:superadmin"], static function ($routes) {

    $routes->group("expedientes", static function ($routes) {
        $routes->get('/', 'ExpedienteController::index');
        $routes->get('insert', 'ExpedienteController::insertar');
        $routes->post('insert', 'ExpedienteController::accionInsertar');
        $routes->get('show', 'ExpedienteController::show');
        $routes->get('editar/(:num)', 'ExpedienteController::editar/$1');
    });

});

//  Rutas para modelo de negocio de tramites
$routes->group("tramitacion", ["filter" => "group:superadmin"], static function ($routes) {

    $routes->group("tramites", static function ($routes) {
        $routes->get('/', 'TramitesController::index');
        $routes->get('insert', 'TramitesController::insertar');
        $routes->post('insert', 'TramitesController::accionInsertar');
        $routes->get('show', 'TramitesController::show');
        $routes->get('editar/(:num)', 'TramitesController::editar/$1');
    });

});