<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model
{
    protected $table      = 'detalleventa';
    protected $primaryKey = 'id_detalleVenta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cantidad', 'id_Producto','precioVenta','id_Venta','nombre'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaRegistro';
    protected $updatedField  = '';
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
     
     /* public function insertaVenta($id_Venta,$total,$id,$id_cliente){
        $this->insert([
          'id_Venta'=>$id_Venta,
          'total'=>$total,
          'id'=>$id,
          'id_cliente'=>$id_cliente,

        ]);
        return $this->insertID();
      }*/
      public function porIdProducto($id_Producto){
        $this->select('*');
        $this->where('id_Producto',$id_Producto);
        $datos=$this->get()->getRow();
        return $datos;

      }
            
        

        
    
}



