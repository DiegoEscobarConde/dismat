<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalModel;
use App\Models\ProductosModel;

class Compras extends BaseController
{
    protected $compras,$temporal,$detalle_compra,$id,$productos;
    protected $reglas;

    public function __construct()
    {
        $this->compras = new ComprasModel();
    
        helper(['form']);
       
    }

     public function index($estado = 1)
    {
        $compras = $this->compras->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Compras', 'datos' => $compras];
    
     echo view('encabezado');
     echo view('compras/nuevo',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
   
       echo view('encabezado');
       echo view('compras/nuevo');
       echo view('pie');

    }
    
   /* public function guarda()
    {
        $id_compras=$this->request->getPost('id_Compra');
        $total=preg_replace('/[\$,]/','',$this->request->getPost('total'));
      $session=session();
    
        
        $resultadoId=$this->compras->insertaCompra($id_compras,$total,$session->id);
        $this->temporal=new TemporalModel();
        if($resultadoId){
            $resultadoVenta=$this->temporal->porCompra($id_compras);
            foreach($resultadoVenta as $row){
                $this->detalle_compra->save([
                    'id_Compra'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'stock'=>$row['stock'],
                    'precio_ventaU'=>$row['precio_ventaU']
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'],$row['stock']);
            }
            $this->temporal->eliminarCompra($id_compras);
        }
    }*/
  

    public function guarda()
    {
        
        $id_compras = $this->request->getPost('id_Compra');
        $total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));
        $session=session();
       
        var_dump($id_compras);
    var_dump($total);
 
    
        $resultadoId = $this->compras->insertaCompra($id_compras, $total, $session->id);
        $this->temporal = new TemporalModel();
    
        if ($resultadoId) {
            $resultadoVenta = $this->temporal->porCompra($id_compras);
            foreach ($resultadoVenta as $row) {
                $this->detalle_compra->save([
                    'id_Compra' => $resultadoId,
                    'id_Producto' => $row['id_Producto'],
                    'descripcion' => $row['descripcion'],
                    'stock' => $row['stock'],
                    'precio_compraU' => $row['precio_compraU']
                ]);
                $this->productos = new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'], $row['stock']);
            }
            $this->temporal->eliminarCompra($id_compras);
        }
    }
    
   
}

