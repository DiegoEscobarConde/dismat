<?php 
namespace App\Models;

use CodeIgniter\Model;

class EmpleadosModel extends Model
{
    protected $table      = 'empleados';
    protected $primaryKey = 'id_Empleado';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['rol', 'estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaRegistro';
    protected $updatedField  = 'fechaActualizacion';
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
     
            
        

        
    
}



