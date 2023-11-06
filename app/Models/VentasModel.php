<?php 
namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table      = 'ventas';
    protected $primaryKey = 'id_Venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','nota', 'total','id_cliente','estado'];

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
     
     
   
         
     public function insertaVenta($id_Venta,$total,$id,$id_cliente) {
        $this->insert([
               'nota'=> $id_Venta, 
               'id'=> $id,
               'total'=>$total,
               'id_cliente'=>$id_cliente          
         ]);
         return $this->insertID();
      } 

       
      
 
      public function obtener($activo = 1){
        $this->select('ventas.*, u.usuario AS usuarios, c.primerApellido AS clientes');
        $this->join('usuarios AS u', 'ventas.id = u.id'); // Cambio en la condición de unión
        $this->join('clientes AS c', 'ventas.id_cliente = c.id'); // Cambio en la condición de unión
        $this->where('ventas.estado', $activo);
        $this->orderBy('ventas.fechaRegistro', 'DESC');
        $datos = $this->findAll();
        return $datos;
    }
  
    
    
    
 
    }

      
   
            
        

        
    




