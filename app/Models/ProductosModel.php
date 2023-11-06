<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id_Producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 'descripcion', 'precio_ventaU', 'precio_compraU',
    'stock', 'inventario', 'id_categoria', 'estado'];

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
     
    public function actualizaStock ($id_Producto,$cantidad){
      $this->set ('stock',"stock + $cantidad",FALSE);
      $this-> where('id_Producto',$id_Producto);
    $this ->update();         
}
public function actualizaStock2($id_Producto,$cantidad){
  $this->set ('stock',"stock - $cantidad",FALSE);
  $this-> where('id_Producto',$id_Producto);
$this ->update();         
}


}



