<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table      = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'primerApellido', 'segundoApellido','ci_nit'
    ,'celular', 'email', 'direccion', 'id','estado'];

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
     

      public function obtenerDatosCliente($id_cliente)
      {
          // Consulta para obtener los datos del cliente por su ID
          return $this->asArray()
              ->where(['id_cliente' => $id_cliente])
              ->first();
      }

   
}
        
    




