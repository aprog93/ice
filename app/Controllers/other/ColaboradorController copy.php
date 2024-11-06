<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ColaboradorController extends BaseController
{
    protected $helpers = ['form'];
//-------------------------------------------------------------------------------------------------------------------------------------
    public function index() {
        return view('potencial/colaboradores');
    }
//-------------------------------------------------------------------------------------------------------------------------------------
    public function insertar() {

        $data = [
            'sexo' => model("SexoModel")->findAll(),
            'piel' =>  model("ColorPielModel")->findAll(),
            'provincia' => model("ProvinciaModel")->findAll(),
            'municipio' => model("MunicipioModel")->findAll(),
            'estadocivil' => model("EstadoCivilModel")->findAll(),
            'centro' => model("CentroModel")->findAll(),
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
    public function show() {

        $colaboradores = model("ColaboradorModel");
        $builder = $colaboradores->builder();

        $builder->select(
    'colaboradores.id AS id_colaborador, colaboradores.nombre AS nombrecolaborador, colaboradores.*,
            sexos.id AS id_sexo, sexo,
            colorespiel.id AS id_piel, colorespiel.descripcion AS piel,
            direccionesparticulares.id AS id_direccion, direccionesparticulares.descripcion AS direccion, reparto,
            municipios.id AS id_municipio, municipios.nombre AS nombremunicipio, idprovincia,
            provincias.id AS id_provincia, provincias.nombre AS nombreprovincia,
            estadosciviles.id AS id_estadocivil, estadosciviles.descripcion estadocivil,
            especialidades.id AS id_especialidad, especialidad,
            cargos.id AS id_cargo, cargo,
            gradoscientificos.id AS id_gradocientifico, grado,
            categoriasdocentes.id AS id_categoriadocente, categoria,
            idiomas.id AS id_idioma, idiomas.descripcion AS idioma,
            militancia.id AS id_militancia, militancia'
        );

        //$builder->select('*');
        $builder->join('sexos', 'sexos.id = colaboradores.idsexo');
        $builder->join('colorespiel', 'colorespiel.id = colaboradores.idcolorpiel');
        $builder->join('direccionesparticulares', 'direccionesparticulares.id = colaboradores.iddireccion');
        $builder->join('municipios', 'municipios.id = colaboradores.idmunicipio');
        $builder->join('provincias', 'provincias.id = municipios.idprovincia');
        $builder->join('estadosciviles', 'estadosciviles.id = colaboradores.idestadocivil');
        $builder->join('especialidades', 'especialidades.id = colaboradores.idespecialidad');
        $builder->join('cargos', 'cargos.id = colaboradores.idcargosalir');
        $builder->join('gradoscientificos', 'gradoscientificos.id = colaboradores.idgradocientifico');
        $builder->join('categoriasdocentes', 'categoriasdocentes.id = colaboradores.idcategoriadocente');
        $builder->join('idiomas', 'idiomas.id = colaboradores.ididioma');
        $builder->join('militancia', 'militancia.id = colaboradores.idmilitancia');

        $bajas = model("BajaModel")->findColumn('idcolaborador');
        $bajas = ( $bajas == null ) ?  $bajas : [];

        //$subQuery = $bajas->select('id', false);

        $builder->where('colaboradores.id !=', $bajas);

        //$builder->whereNotIn('colaboradores.id', $bajas->find('colaboradores.id'));
        //$builder->join('bajas', 'bajas.idcolaborador != colaboradores.id');
        $query   = $builder->get();

        print_r($query->getResultArray());

        /* foreach ($query->getResultArray() as $key=>$row) {
            echo $row['nombrecolaborador'].'<br>';
        } */

       /*
        $names = ['Frank', 'Todd', 'James'];
        $builder->whereNotIn('username', $names);

        Produces: WHERE username NOT IN ('Frank', 'Todd', 'James')
       */

        //return view('potencial/colaboradores/ver', $data);

    }
//-------------------------------------------------------------------------------------------------------------------------------------
}
