<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
use App\Models\TemporalModel;



class Ventas extends BaseController
{
    protected $ventas,$clientes,$productos,$detalle_Venta,$temporal,$compras;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
  
        
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
        $this->temporal= new TemporalModel();
      
        helper(['form']);
       
    }

    

     public function index($estado = 1)
    {
        $ventas = $this->ventas->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Nueva Venta', 'datos' => $ventas];
    
     echo view('encabezado');
     echo view('ventas/ventas',$data);
     echo view('pie');

    }
  
     public function ventas()
    {
        
    
      $data = ['titulo' => 'NUEVA VENTA'];

       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }
  
  

    public function editar($id)
    {
        $ventas = $this->ventas->where('id_cliente',$id)->first();
   
      $dato = ['titulo' => 'Editar Cliente','datos'=> $ventas];

       echo view('encabezado');
       echo view('ventas/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->ventas->update($this->request->getPost('id_cliente'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/ventas');
    }
    public function eliminar($id)
    {
   
        $this->ventas->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/ventas');
    }
   
    public function reingresar($id)
    {
   
        $this->ventas->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/ventas');
    }
   public function guarda()
    {
        $id_venta=$this->request->getPost('id_Venta');
        $total=preg_replace('/[\$,]/','',$this->request->getPost('total'));
        $session=session();
        $resultadoId=$this->ventas->insertarVenta($id_venta,$total,$session->id);
        $this->temporal=new TemporalModel();
        if($resultadoId){
            $resultadoVenta=$this->temporal->porCompra($id_venta);
            foreach($resultadoVenta as $row){
                $this->detalle_Venta->save([
                    'id_venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'stock'=>$row['stock'],
                    'precio_ventaU'=>$row['preci_ventaU']
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'],$row['stock']);
            }
            $this->temporal->eliminarCompra($id_venta);
        }
    }
 


   
 
    

}





