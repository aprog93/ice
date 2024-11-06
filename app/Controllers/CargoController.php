<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CargoController extends BaseController
{
    public function index()
    {
        return view('potencial/cargos/cover');
    }

    public function insertar() {

        $data = [];
        return view('potencial/cargos/insertar');

    }

    public function accionInsertar()
    {
        $cargoModel = model('CargoModel');

        $rules = [
            'cargo' => [
                'rules' => 'required|is_unique[cargos.cargo]',
                'errors' => [
                    'required' => 'La descripción del cargo es requerida.',
                    'is_unique' => 'El cargo que intenta insertar ya existe en la base de datos.',
                ]
            ]
        ];

        $data = [
            'cargo' => strtoupper($this->request->getVar("cargo")),
        ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => -1,
                'error' => $this->validator->getErrors(),
            ];
        } else {
            $data['id'] = $cargoModel->insert($data);

            if ($data['id'])
                $data['status'] = 1;
            else {
                $data['status'] = 0;
                $sata['error'] = 'No se pudo insertar el cargo en la base de datos.';
            }
        }
        return $this->response->setJSON($data);
    }
}