<?php 
namespace App\Models;

use CodeIgniter\Model;



    class UsuariosModel extends Model
    {
        protected $table      = 'usuarios';
        protected $primaryKey = 'id';
    
        protected $useAutoIncrement = true;
    
        protected $returnType     = 'array';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nombres','primerApellido','segundoApellido','email','celular','usuario','password','id_Empleado','estado'];
    
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
          public function getUsersWithRoles()
          {
              return $this->select('usuarios.*, rol AS rol')
                  ->join('empleados', 'empleados.id_Empleado = usuarios.id_Empleado')
                  ->findAll();
          }
      }

    