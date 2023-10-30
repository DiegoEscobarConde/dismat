<?php 
namespace App\Models;

use CodeIgniter\Model;

class ComprasModel extends Model
{
    protected $table      = 'compras';
    protected $primaryKey = 'id_Compra';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['totalPago', 'estado','id_Proveedor','id_Producto','id','nota'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaRegistro';
    protected $updatedField  = '';
    protected $deletedField  = 'delete_at';

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
     
       public function insertaCompra($id,$total,$id_compras) {
          $this->insert([
            'nota'=> $id_compras,
            'totalPago'=>$total,
            'id'=> $id,
           ]);
           return $this->insertID();
        }  
        

        
    
}



