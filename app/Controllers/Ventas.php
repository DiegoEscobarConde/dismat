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
    protected $ventas,$clientes,$productos,$detalle_Venta,$temporal,$compras,$session,$db;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
        $this->clientes = new ClientesModel();
        
        $this->session = session();
      
        
      
        helper(['form']);
       
    }

    

    public function lista()
    {
        
        $datos=$this->ventas->obtener(1);
      $data = ['titulo' => 'libro de ventas','datos'=>$datos];

       echo view('encabezado');
       echo view('ventas/listaVentas',$data);
       echo view('pie');

    }
    public function eliminar($id_Producto){
        $productos=$this->detalle_Venta->where('id_Venta',$id_Producto)->findAll();
foreach ($productos as $producto) {
               $this->productos->actualizaSock ($producto['id_Producto'],$producto['$cantidad'],['+']);
    
    }
     $this->ventas->update($id_Producto,['estado'=>0]);
     return redirect()->to(base_url().'/ventas/listaVentas');

}
     public function ventas()
    {
        
        if(!isset($this->session->usuario)){return redirect()->to(base_url('/categorias'));}
      $data = ['titulo' => 'NUEVA VENTA'];

       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }

   public function guarda()//funcion antigua +pdf por si no da chatgpt
    {
        $id_Venta = $this->request->getPost('id_Venta');
    $total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));
    $id_cliente = $this->request->getPost('id_cliente');
     // Asumiendo que notaR proviene de una fuente válida
     $session=session();
        var_dump($id_Venta);
        var_dump($total);
        var_dump($id_cliente);
        var_dump($session->usuario);
       
        $this->ventas = new VentasModel();
    // Asegúrate de que 'id' no se incluye en la inserción si es autoincremental
    $resultadoId=$this->ventas->insertaVenta($id_Venta,$total,$session->id,$id_cliente);  
    // Resto de tu lógica...
       
        if($resultadoId){
             $this->temporal=new TemporalModel();
            $resultadoCompra=$this->temporal->porCompra2($id_Venta);
            foreach($resultadoCompra as $row){
                $this->detalle_Venta->save([
                    'id_Venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'cantidad'=>$row['cantidad'],
                    'precio'=>$row['precio']
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock2($row['id_Producto'],$row['cantidad']);
            }
            $this->temporal->eliminarCompra($id_Venta);
        }
//return redirect()->to(base_url()."/productos");
       return redirect()->to(base_url()."/ventas/muestraVentaPdf/".$resultadoId);
      
    }
  /*  public function guarda()//original 
    {
        $id_Venta=$this->request->getPost('id_Venta');
        $total=$this->request->getPost('total');   
        $id_cliente = $this->request->getPost('id_cliente');     
        $session=session(); 
        $resultadoId = $this->ventas->insertaVenta($session->id, $id_Venta, $total, $id_cliente);

       
        if($resultadoId){
            $this->temporal= new TemporalModel();
            $resultadoCompra=$this->temporal->porCompra($id_Venta);
            foreach($resultadoCompra as $row){
                var_dump($resultadoId);
                var_dump($row['id_Producto'],);
                var_dump($row['descripcion']);
                var_dump($row['cantidad']);
                var_dump($row['precioVenta']);
                $this->detalle_Venta->save([
                    'id_Venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'cantidad'=>$row['cantidad'],
                    'precio' => $row['precio'],
                ]);
                 $this->productos=new ProductosModel();
               $this->productos->actualizaStock($row['id_Producto'],$row['cantidad']);
               
            }
            
            $this->temporal->eliminarCompra($id_Venta);
        }
        return redirect()->to(base_url()."/productos");
    }*/
 
    function muestraVentaPdf($id_Venta){
       $data['id_Venta']=$id_Venta;
        echo view('encabezado');
        echo view('ventas/ver_venta_pdf',$data);
        echo view('pie');

    }
 

    function generarVentaPdf($id_Venta)
    {
        $datosVenta = $this->ventas->where('id_Venta', $id_Venta)->first(); // Corrige 'firts' a 'first'
        $detalleVenta = $this->detalle_Venta->select('*')->where('id_Venta', $id_Venta)->findAll();
    
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle('ventas');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(195, 25, "Nota de Remision ",30, 25, "C");
        $pdf->Image(base_url() . '/img/logo.png', 10, 10, 50, 15, 'PNG'); // Corrige 'image' a 'Image'
       // $pdf->Cell(50, 5, "direccion", 0, 0, "L");
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('compra_pdf.pdf', 'I');
    }
    

  

 

 

   
 


   
 
    

}





