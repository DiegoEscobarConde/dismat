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
    public function transaccion()
    {  //ESTE ES EL VÁLIDO!!

        $this->db = \Config\Database::connect();

        $idProducto = $this->request->getPost('id_Producto');
        $idCliente = $this->request->getPost('id_cliente');
        $total = $this->request->getPost('total');
        $usuario = 1;
        //$this->db->transStart();
        $this->db->transBegin();


        try {
            $ventaData = array(
                'total' => $total,
                'id_cliente' => $idCliente,
                'id' => $usuario
            );

            $this->ventas->insert($ventaData);
            $idVenta = $this->db->insertID();

            foreach ($idProducto as $venta) {
                $producto = $this->productos->find($venta['id_ProductoVenta']);

                if ($producto['stock'] < $venta['cantidad']) {
                    $this->db->transRollback();
                } else {

                    $detalleVentaData = array(
                        'id_Producto' => $venta['idProductoVenta'],
                        'id_Venta' => $idVenta,
                        'cantidadVenta' => $venta['cantidad'],
                        'precioUnitario' => $venta['importe']
                    );
                    $this->detalle_Venta->insert($detalleVentaData);

                    $producto = $this->productos->find($venta['idProductoVenta']);
                    $nuevaCantidadProducto = $producto['stock'] - $venta['cantidad'];
                    $this->productos->update($venta['idProductoVenta'], ['stock' => $nuevaCantidadProducto]);
                }
            }

            $this->db->transCommit();
            return $this->response->setJSON(['message' => 'Exito']);

            //echo 'Transacción completada con éxito.';
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            $this->db->transRollback();
            return $this->response->setJSON(['message' => 'Error']);
            //echo 'Error en la transacción: ' . $e->getMessage();
        }
    }
 


   
 
    

}





