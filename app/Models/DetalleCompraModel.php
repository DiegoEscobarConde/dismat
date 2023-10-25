<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetalleCompraModel extends Model
{
    protected $table      = 'detallecompra';
    protected $primaryKey = 'id_detallecompra';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cantidad','precioUnitario', 'id_Producto','id_Compra','id_Proveedor','id'];

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
     
      public function insertaCompra($id_detallecompra,$total,$id,$id_cliente){
        $this->insert([
          'id_Compra'=>$id_detallecompra,
          'total'=>$total,
          'id'=>$id,
          'id_cliente'=>$id_cliente,

        ]);
        return $this->insertID();
      }
      public function porIdProducto($id_Producto){
        $this->select('*');
        $this->where('id_Producto',$id_Producto);
        $datos=$this->get()->getRow();
        return $datos;

      }
            
        

        
    
}



