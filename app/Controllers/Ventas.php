<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
use App\Models\TemporalModel;
use App\Models\ClientesModel;




class Ventas extends BaseController
{
    protected $ventas,$clientes,$productos,$detalle_Venta,$temporal,$compras,$db;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
        $this->temporal= new TemporalModel();
        $this->clientes= new ClientesModel();
      
        helper(['form']);
       
    }

    

   /*  public function index($estado = 1)
    {
        $ventas = $this->ventas->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Nueva Venta', 'datos' => $ventas];
    
     echo view('encabezado');
     echo view('ventas/ventas',$data);
     echo view('pie');

    }*/
    public function lista()
    {
        
    
      $data = ['titulo' => 'libro de ventas'];

       echo view('encabezado');
       echo view('ventas/listaVentas',$data);
       echo view('pie');

    }
     public function ventas()
    {
        
    
      $data = ['titulo' => 'NUEVA VENTA'];

       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }
   public function guarda()
    {
        $id_venta=$this->request->getPost('id_Venta');
        $total=preg_replace('/[\$,]/','',$this->request->getPost('total'));
        $id_Cliente=$this->request->getPost('id_Cliente');
        $session=session();
        $resultadoId=$this->ventas->insertarVenta($id_venta,$total,$session->id,$id_Cliente);
       
        $this->temporal=new TemporalModel();
        if($resultadoId){
            $resultadoVenta=$this->temporal->porCompra($id_venta);
            foreach($resultadoVenta as $row){
                $this->detalle_Venta->save([
                    'id_venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'nombre'=>$row['nombre'],
                    'cantidad'=>$row['cantidad'],
                    'precioVenta'=>$row['precioVenta']
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'],$row['cantidad'],'-');
            }
            $this->temporal->eliminarCompra($id_venta);
        }
       // return redirect()->to(base_url()."/ventas/muestraVentaPdf/".$resultadoId);
    }
   
 


   
 
    

}





