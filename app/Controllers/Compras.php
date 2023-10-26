<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalModel;
use App\Models\ProductosModel;
use App\Models\DetalleCompraModel;

class Compras extends BaseController
{
    protected $compras,$temporal,$id,$productos;
    protected $detalle_compra;

    public function __construct()
    {
        $this->compras = new ComprasModel();
        $this->detalle_compra = new DetalleCompraModel();
        
    
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
            $resultadoCompra = $this->temporal->porCompra($id_compras);
            foreach ($resultadoCompra as $row) {
                $this->detalle_compra->save([
                    'id_Compra' => $resultadoId,
                    'id_Producto' => $row['id_Producto'],
                    'descripcion' => $row['descripcion'],
                    'cantidad' => $row['cantidad'],
                    'precioUnitario' => $row['precioUnitario']
                ]);
                $this->productos = new ProductosModel();
                $this->productos->actualizarProductoCompra($row['id_Producto'], $row['stock']);
            }
            $this->temporal->eeliminarProductoCompra($id_compras);
        }
        return redirect()->to(base_url()."/productos");
    } 
    function muestraCompraPdf($id_compra){
        $data ['id_Compra']=$id_compra;
        echo view('encabezado');
        echo view('compras/ver_compra_pdf', $data);
        echo view('pie');

    }
    function generarCompraPdf ($id_compra)
    {
        $datosCompras=$this->compras->where('id_Compra', $id_compra)->firts();
       $detalle_compra=$this->detalle_compra->select('*')->where('id_Compra', $id_compra)->findAll();

       $pdf=new \FPDF('P','mm','letter');
       $pdf->AddPage();
       $pdf->SetMargins(10,10,10);
       $pdf->SetTitle('compras');
       $pdf->SetFont('Ariel','B',10);
       $pdf->Cell(195,5,"entrada de productos",0,1,"C");
       $this->response->setHeader('Content-Type','application/pdf');
       $pdf->Output('compra_pdf.pdf','I');
    }
    
   
}

