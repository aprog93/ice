<?php

namespace App\Controllers;

use PDO;
use PDOException;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as XLS;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XLSX;

class ColaboradorController extends BaseController
{
    protected $helpers = ['form'];
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function index()
    {
        // return view('potencial/colaboradores');
        return $this->show();
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function insertar()
    {
        $data = [
            'sexo' => model("SexoModel")->findAll(),
            'piel' =>  model("ColorPielModel")->findAll(),
            'provincia' => model("ProvinciaModel")->findAll(),
            'estadocivil' => model("EstadoCivilModel")->findAll(),
            'tipocentro' => model("TipoCentroModel")->findAll(),
            'cargo' => model("CargoModel")->findAll(),
            'especialidad' => model("EspecialidadModel")->findAll(),
            'grado' => model("GradoCientificoModel")->findAll(),
            'categoria' => model("CategoriaDocenteModel")->findAll(),
            'idioma' => model("IdiomaModel")->findAll(),
            'militancia' => model("MilitanciaModel")->findAll(),
        ];

        return view('potencial/colaboradores/insertar', $data);
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function show()
    {

        $colaboradores = model("ColaboradorModel");
        $result = $colaboradores->find();

        $data = [
            'datos' => $result,
        ];

        return view('potencial/colaboradores/ver', $data);
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function accionInsertar()
    {

        $rules = [
            'nombre' => [
                'label' => 'Nombre del Colaborador',
                'rules' => [
                    'required',
                    'alpha_space',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                    'alpha_space' => 'El {field} solo debe contener caracteres alfabéticos y espacios.',
                ],
            ],            
            'idsexo' => [
                'label' => 'Sexo',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'idcolorpiel' => [
                'label' => 'Color de la Piel',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'telefono' => [
                'label' => 'Teléfono',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'idmunicipio' => [
                'label' => 'Municipio',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'reparto' => [
                'label' => 'Reparto',
                'rules' => [
                    'alpha_numeric_space',
                    'permit_empty'
                ],
                'errors' => [
                    'alpha_numeric_space' => 'El campo {field} solo admite caracteres alfabéticos y espacios.',
                ],
            ],
            'idestadocivil' => [
                'label' => 'Estado Civil',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'idestadocivil' => [
                'label' => 'Estado Civil',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'nombrepadre' => [
                'label' => 'Nombre del Padre',
                'rules' => [
                    'required',
                    'alpha_space',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                    'alpha_space' => 'El {field} solo debe contener caracteres alfabéticos y espacios.',
                ],
            ],
            'nombremadre' => [
                'label' => 'Nombre del Madre',
                'rules' => [
                    'required',
                    'alpha_space',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                    'alpha_space' => 'El {field} solo debe contener caracteres alfabéticos y espacios.',
                ],
            ],
            'familiaraavisar' => [
                'label' => 'Familiar a Avisar',
                'rules' => [
                    'required',
                    'alpha_space',
                ],
                'errors' => [
                    'required' => 'El campo {field} es requerido.',
                    'alpha_space' => 'El campo {field} solo debe contener caracteres alfabéticos y espacios.',
                ],
            ],
            'conyugue' => [
                'label' => 'Conyugue',
                'rules' => [
                    'alpha_space',
                    'permit_empty',
                ],
                'errors' => [
                    'alpha_space' => 'El campo {field} solo debe contener caracteres alfabéticos y espacios.',
                ],
            ],
            'cantidadhijos' => [
                'label' => 'Cantidad de Hijos',
                'rules' => [
                    'required',
                    'is_natural',
                ],
                'errors' => [
                    'required' => 'El campo {field} es requerido.',
                    'is_natural' => 'La {field} debe ser un número natural.',
                ],
            ],
            'idcentro' => [
                'label' => 'Centro Laboral',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'idcargosalir' => [
                'label' => 'Cargo al Salir',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                ],
            ],
            'idespecialidad' => [
                'label' => 'Especialidad',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'La {field} es requerida.',
                ],
            ],
            'idgradocientifico' => [
                'label' => 'Grado Científico',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => "El {field} es requerido. Seleccione '-' si el colaborador no tiene {field}.",
                ],
            ],
            'idcategoriadocente' => [
                'label' => 'Categoría Docente',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => "La {field} es requerida. Seleccione '-' si el colaborador no tiene {field}.",
                ],
            ],
            'ididioma' => [
                'label' => 'Idioma',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => "El {field} es requerido.",
                ],
            ],
            'salario' => [
                'label' => 'Salario',
                'rules' => [
                    'required',
                    'decimal',
                ],
                'errors' => [
                    'required' => "El {field} es requerido.",
                    'decimal' => "El {field} debe ser un valor decimal.",
                ],
            ],
            'idmilitancia' => [
                'label' => 'Militancia',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El campo {field} es requerido. Si el colaborador no es militante, seleccione /"-/".',
                ],
            ],
            'cuadro' => [
                'label' => 'Cuadro',
                'rules' => [
                    'required',
                ],
                'errors' => [
                    'required' => 'El campo {field} es requerido. Seleccione Sí o No por favor.',
                ],
            ],
        ];

        $id = $this->request->getVar('id');

        if(empty($id))

            $rules['carneidentidad'] = [
                'label' => 'Carné de Identidad',
                'rules' => [
                    'required',
                    'numeric',
                    'max_length[11]',
                    'min_length[11]',
                    'is_unique[colaboradores.carneidentidad]',
                ],
                'errors' => [
                    'required' => 'El {field} es requerido.',
                    'numeric' => 'El {field} solo debe contener caracteres numéricos.',
                    'max_length' => 'El {field} debe tener 11 caracteres.',
                    'min_length' => 'El {field} debe tener 11 caracteres.',
                    'is_unique' => 'El {field} debe ser único. Existe otro colaborador con este {field}.',
                ],
            ];

        if (!$this->validate($rules)) {
            $data = [
                'status' => -1,
                'errors' => $this->validator->getErrors(),
            ];

            // return view('potencial/colaboradores/insertar', $data);
        } else {

            $data = [
                'nombre' => strtoupper($this->request->getVar('nombre')),
                'carneidentidad' => $this->request->getVar('carneidentidad'),
                'idsexo' => $this->request->getVar('idsexo'),
                'edad' => $this->request->getVar('edad'),
                'idcolorpiel' => $this->request->getVar('idcolorpiel'),
                'telefono' => $this->request->getVar('telefono'),
                'direccion' => strtoupper($this->request->getVar('direccion')),
                'reparto' => strtoupper($this->request->getVar('reparto')),
                'idmunicipio' => $this->request->getVar('idmunicipio'),
                'idestadocivil' => $this->request->getVar('idestadocivil'),
                'cantidadhijos' => $this->request->getVar('cantidadhijos'),
                'nombrepadre' => strtoupper($this->request->getVar('nombrepadre')),
                'nombremadre' => strtoupper($this->request->getVar('nombremadre')),
                'familiaraavisar' => strtoupper($this->request->getVar('familiaraavisar')),
                'conyugue' => strtoupper($this->request->getVar('conyugue')),
                'idcentro' => $this->request->getVar('idcentro'),
                'idcargosalir' => $this->request->getVar('idcargosalir'),
                'idespecialidad' => $this->request->getVar('idespecialidad'),
                'telefonolaboral' => $this->request->getVar('telefonolaboral'),
                'cuadro' => $this->request->getVar('cuadro'),
                'idgradocientifico' => $this->request->getVar('idgradocientifico'),
                'idcategoriadocente' => $this->request->getVar('idcategoriadocente'),
                'ididioma' => $this->request->getVar('ididioma'),
                'salario' => $this->request->getVar('salario'),
                'idmilitancia' => $this->request->getVar('idmilitancia'),
            ];

            $colaborador = model("ColaboradorModel");

            if(empty($id)) {
                $idColaborador = $colaborador->insert($data);
                $data['status'] = 0;
            }
            else {
                $data['status'] = 1;
                $idColaborador = $colaborador->update($id, $data);
            }
        }

        return $this->response->setJSON($data);
    }

    // Modificar para no borra, marcar como baja en la db
    public function elimimar() 
    {
        $data['title'] = 'Baja a Colaborador';
            $data['accept_link'] = 'sistema/bd/importdata';

            if (!empty($data['type'])) {

                if ($data['type'] == 'error')
                    return view('mensajes/error', $data);
            }

            $data['msg'] = 'Base de datos importada con éxito. ¿Desea importar otra base de datos?';
            $data['cancel_link'] = 'sistema/bd';

            return view('mensajes/success-question', $data);
    }

    public function editar($idcolaborador)
    {
        $colaborador = model("ColaboradorModel");
        $result = $colaborador->find(['colaboradores.id' => $idcolaborador]);

        $data = [
            'sexo' => model("SexoModel")->findAll(),
            'piel' =>  model("ColorPielModel")->findAll(),
            'provincia' => model("ProvinciaModel")->findAll(),
            'municipio' => model("MunicipioModel")->where('idprovincia', $result[0]['idprovincia'])->findAll(),
            'estadocivil' => model("EstadoCivilModel")->findAll(),
            'centrolaboral' => model("CentroModel")->findByProv($result[0]['idprovincia']),
            'tipocentro' => model("TipoCentroModel")->findAll(),
            'cargo' => model("CargoModel")->findAll(),
            'especialidad' => model("EspecialidadModel")->findAll(),
            'grado' => model("GradoCientificoModel")->findAll(),
            'categoria' => model("CategoriaDocenteModel")->findAll(),
            'idioma' => model("IdiomaModel")->findAll(),
            'militancia' => model("MilitanciaModel")->findAll(),
            'valores' => $result,
        ];

        return view('potencial/colaboradores/editar', $data);
    }
}
