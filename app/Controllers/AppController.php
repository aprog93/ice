<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AppController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        //$data['titulo'] = 'Sistema de Exportaciones ICE';
        return view('app/home');
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function invalidAccess()
    {
        $data['message'] = 'Usted no se ha autenticado en el sistema.';
        return view('app/invalid_access', $data);
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    function prueba() {
        $data = [
            'title' => 'Prueba',
            'error' => 'Operación de prueba.',
            'accept_link' => '/',
        ];
        return view('mensajes/error', $data);
    }
}