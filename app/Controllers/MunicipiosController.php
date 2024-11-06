<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MunicipiosController extends BaseController
{
    public function index()
    {
        //
    }
    public function seleccionar()
    {
        //Seleccionar a traves del metodo post
        $municipioModel = model('MunicipioModel');
        $data = [
            'idprovincia' => $this->request->getVar("idprovincia"),
        ];

        $result = $municipioModel->asObject()->where($data)->findAll();

        if (!empty($result)) {
            $data['status'] = 1;
            $data['options'] = $result;
        }
        else {
            $data['status'] = 0;
            $data['error'] = 'No se pudo insertar el tipo de centro en la base de datos.';
        }

        return $this->response->setJSON($data);
    }
}
