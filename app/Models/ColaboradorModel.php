<?php

namespace App\Models;

use CodeIgniter\Model;

class ColaboradorModel extends Model
{
    protected $table            = 'colaboradores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','carneidentidad','idsexo','edad','idcolorpiel','telefono','direccion','reparto','idmunicipio','idestadocivil','cantidadhijos','nombrepadre','nombremadre','familiaraavisar','conyugue','idcentro','idcargosalir','idespecialidad','telefonolaboral','cuadro','idgradocientifico','idcategoriadocente','ididioma','salario','idmilitancia'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function find($where = "")
    {
        $builder = $this->builder($this->table);
        $builder->select(
            'colaboradores.*,
            sexo,
            colorespiel.descripcion AS piel,
            municipios.nombre AS nombremunicipio,
            provincias.id AS idprovincia,
            provincias.nombre AS nombreprovincia,
            estadosciviles.descripcion estadocivil,
            centros.centrotrabajo,
            especialidad,
            cargo,
            grado,
            categoria,
            idioma,
            militancia'
        );

        $builder->join('sexos', 'sexos.id = colaboradores.idsexo');
        $builder->join('colorespiel', 'colorespiel.id = colaboradores.idcolorpiel');
        $builder->join('municipios', 'municipios.id = colaboradores.idmunicipio');
        $builder->join('provincias', 'provincias.id = municipios.idprovincia');
        $builder->join('estadosciviles', 'estadosciviles.id = colaboradores.idestadocivil');
        $builder->join('centros', 'centros.id = colaboradores.idcentro');
        $builder->join('especialidades', 'especialidades.id = colaboradores.idespecialidad');
        $builder->join('cargos', 'cargos.id = colaboradores.idcargosalir');
        $builder->join('gradoscientificos', 'gradoscientificos.id = colaboradores.idgradocientifico');
        $builder->join('categoriasdocentes', 'categoriasdocentes.id = colaboradores.idcategoriadocente');
        $builder->join('idiomas', 'idiomas.id = colaboradores.ididioma');
        $builder->join('militancia', 'militancia.id = colaboradores.idmilitancia');

        $bajas = model("BajaModel")->findColumn('idcolaborador');

        if (!empty($bajas))
            $builder->where('colaboradores.id !=', $bajas);

        if (!empty($where))
            $builder->where($where);

        $query = $builder->get();
        return  $query->getResultArray();
    }
}
