<?php

namespace App\Models;

use CodeIgniter\Model;

class CentroModel extends Model
{
    protected $table            = 'centros';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['centrotrabajo', 'idtipocentro', 'direccioncentro', 'idmunicipio'];

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

    public function findByProv($idprovincia)
    {
        $result = $this->builder($this->table)->select('centros.*, municipios.nombre')
            ->join('municipios', 'centros.idmunicipio = municipios.id')
            ->where('idprovincia', $idprovincia)->get();

        return $result->getResultArray();
    }
}
