<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfesionesController extends BaseController
{
    public function index()
    {
        return view('potencial/profesiones/cover');
        
    }

    public function insertar() {

        $data = [];
        return view('potencial/profesiones/insertar');

    }

    public function accionInsertar()
    {
        $especialidadModel = model('EspecialidadModel');

        $rules = [
            'especialidad' => [
                'rules' => 'required|is_unique[especialidades.especialidad]',
                'errors' => [
                    'required' => 'La descripción del cargo es requerida.',
                    'is_unique' => 'La profesión o especialidad que intenta insertar ya existe en la base de datos.',
                ]
            ]
        ];

        $data = [
            'especialidad' => strtoupper($this->request->getVar("especialidad")),
        ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => -1,
                'error' => $this->validator->getErrors(),
            ];
        } else {
            $data['id'] = $especialidadModel->insert($data);

            if ($data['id'])
                $data['status'] = 1;
            else {
                $data['status'] = 0;
                $sata['error'] = 'No se pudo insertar la profesión o especialidad en la base de datos.';
            }
        }
        return $this->response->setJSON($data);
    }
}
