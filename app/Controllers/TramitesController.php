<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TramitesController extends BaseController
{
    public function index()
    {
        return view('tramitacion/tramites');
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    // public function insertar()
    // {
    //     $data = [
    //         'motivoviaje' => model("MotivoViajeModel")->findAll(),
    //         'tipoactividad' =>  model("TipoActividadModel")->findAll(),
    //         'tipopasaporte' =>  model("TipoPasaporteModel")->findAll(),
    //     ];

    //     return view('tramitacion/expedientes/insertar', $data);
    // }
}
