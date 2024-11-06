<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CentrosController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('potencial/centros/cover');
    }
    //----------------------------------------------------------
    public function insertar()
    {

        $data = [
            'provincia' => model("ProvinciaModel")->findAll(),
            'tipocentro' => model("TipoCentroModel")->findAll(),
        ];

        return view('potencial/centros/insertar', $data);
    }
//----------------------------------------------------------
    public function accionInsertarCentro()
    {
        $centroModel = model('CentroModel');

        $rules = [
            'centrotrabajo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre del centro es requerido.',
                ]
            ],
            'direccioncentro' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'La direccón del centro es requerida.',
                    'alpha_numeric_punct' => 'Caracteres no permitido en la dirección del centro de trabajo.',
                ]
            ],
            'idmunicipio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El el municipio al que pertenece el centro es requerido.',
                ]
            ],
            'idtipocentro' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El tipo de centro es requerido.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => 1,
                'errors' => $this->validator->getErrors(),
            ];
        } else {
            $data = [
                'centrotrabajo' => strtoupper($this->request->getVar("centrotrabajo")),
                'idtipocentro' => $this->request->getVar("idtipocentro"),//idtipocentro
                'direccioncentro' => strtoupper($this->request->getVar("direccioncentro")),
                'idmunicipio' => $this->request->getVar("idmunicipio"),
            ];
            $data['id'] = $centroModel->insert($data);

            if ($data['id']) {
                $data['status'] = 0;
            }
        }
        return $this->response->setJSON($data);
    }

    //---------------------------------------------------------------------------------------------------------
    public function accionInsertarTipo()
    {
        $tipoCentroModel = model('TipoCentroModel');

        $rules = [
            'tipocentro' => [
                'rules' => 'required|is_unique[tiposcentros.tipocentro]',
                'errors' => [
                    'required' => 'El tipo de centro es requerido.',
                    'is_unique' => 'El tipo de centro que intenta insertar ya existe en la base de datos.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => 1,
                'errors' => $this->validator->getErrors(),
            ];
        } else {
            $data = [
                'tipocentro' =>  strtoupper($this->request->getVar("tipocentro")),
            ];

            $data['id'] = $tipoCentroModel->insert($data);

            if ($data['id'])
                $data['status'] = 0;
        }
        return $this->response->setJSON($data);
    }

    public function select()
    {
        $idprovincia = $this->request->getVar("idprovincia");
        $centroModel = model('CentroModel');

        $result = $centroModel->findByProv($idprovincia);     //   asObject()->where($data)->findAll();

        if (!empty($result)) {
            $data['status'] = 0;
            $data['options'] = $result;
        }
        else {
            $data['status'] = 1;
            $data['error'] = 'No se encontraron centros laborales dentro de esta provincia en la base de datos.';
        }

        return $this->response->setJSON($data);
    }
}