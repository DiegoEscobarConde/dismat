<?php 
namespace App\Models;

use CodeIgniter\Model;

class TemporalModel extends Model
{
    protected $table      = 'temporal';
    protected $primaryKey = 'id_temporal';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_Producto', 'codigo','descripcion','cantidad','precio','subtotal','nota'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
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
     
      public function porIdProductoCompra($id_Producto,$nota){
        $this->select('*');
        $this->where('nota',$nota);
        $this->where('id_Producto',$id_Producto);
     
        $datos=$this->get()->getRow();
        return $datos;

      }     
      public function porCompra($nota){
        $this->select('*');
        $this->where('nota',$nota);
        $datos=$this->findAll();
        return $datos;

      } 
      public function actualizarProductoCompra($id_Producto,$cantidad,$subtotal,$nota){
        $this->set('cantidad',$cantidad);
        $this->set('subtotal',$subtotal);
        $this->where('id_Producto',$id_Producto);
        $this->where('nota',$nota);
        $this->update();
      } 
      public function eliminarProductoCompra($id_Producto,$nota)
      {
          $this->where('id_Producto', $id_Producto);
          $this->where('nota', $nota);
          $this->delete();
      }

        

        
    
}



