<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class IdiomaController extends BaseController
{
    public function index()
    {
        //
    }

    public function accionInsertar()
    {
        $idiomaModel = model('IdiomaModel');

        $rules = [
            'idioma' => [
                'rules' => 'required|is_unique[idiomas.idioma]',
                'errors' => [
                    'required' => 'La descripción del idioma es requerida.',
                    'is_unique' => 'El idioma que intenta insertar ya existe en la base de datos.',
                ]
            ]
        ];

        $data = [
            'idioma' => $this->request->getVar("idioma"),
        ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => -1,
                'error' => $this->validator->getErrors(),
            ];
        } else {
            $data['id'] = $idiomaModel->insert($data);

            if ($data['id'])
                $data['status'] = 1;
            else {
                $data['status'] = 0;
                $sata['error'] = 'No se pudo insertar el idioma en la base de datos.';
            }
        }
        return $this->response->setJSON($data);
    }
}