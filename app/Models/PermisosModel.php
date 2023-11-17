<?php 
namespace App\Models;

use CodeIgniter\Model;

class PermisosModel extends Model
{
    protected $table      = 'permisos';
    protected $primaryKey = 'id_permiso';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'tipo'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = '';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

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
     
            
        

        
    
}



