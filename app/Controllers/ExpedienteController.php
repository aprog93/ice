<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ExpedienteController extends BaseController
{
    public function index()
    {
        return view('tramitacion/expedientes');
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function insertar()
    {
        $data = [
            'motivoviaje' => model("MotivoViajeModel")->findAll(),
            'tipoactividad' =>  model("TipoActividadModel")->findAll(),
            'tipopasaporte' =>  model("TipoPasaporteModel")->findAll(),
        ];

        return view('tramitacion/expedientes/insertar', $data);
    }
}
