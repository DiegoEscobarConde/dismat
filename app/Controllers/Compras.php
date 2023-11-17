<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalModel;
use App\Models\ProductosModel;
use App\Models\DetalleCompraModel;
use App\Models\UsuariosModel;

class Compras extends BaseController
{
    protected $compras,$temporal,$id,$productos,$db;
    protected $detalle_compra,$session;

    public function __construct()
    {
        $this->compras = new ComprasModel();
        $this->detalle_compra = new DetalleCompraModel();
      $this->session = new UsuariosModel();
      $this->temporal = new TemporalModel();

        $this->session = session();
     
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
   if(!isset($this->session->usuario)){return redirect()->to(base_url('/categorias'));}
       echo view('encabezado');
       echo view('compras/nuevo');
       echo view('pie');

    }
  

    
    
    
    public function guarda()//original 
    {
        $id_compra=$this->request->getPost('id_Compra');
        $total=$this->request->getPost('total');        
        $session=session(); 
        $resultadoId=$this->compras->insertaCompra($id_compra,$total,$session->id);  
       
        if($resultadoId){
            $this->temporal= new TemporalModel();
            $resultadoCompra=$this->temporal->porCompra($id_compra);
            foreach($resultadoCompra as $row){

                var_dump($row['descripcion']);
                var_dump($row['cantidad']);
                var_dump($row['precio']);
                $this->detalle_compra->save([
                    'id_Compra'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'cantidad'=>$row['cantidad'],
                    'precio' => $row['precio'],
                ]);
                 $this->productos=new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'],$row['cantidad']);
               
            }
            
            $this->temporal->eliminarCompra($id_compra);
        }
        return redirect()->to(base_url()."/productos");
    }

 
    function muestraCompraPdf($id_compra){
        $data['id_Compra'] = $id_compra;
        echo view('encabezado');
        echo view('compras/ver_compra_pdf', $data);
        echo view('pie');
    }
    
    function generarCompraPdf($id_compra)
    {
      $datosCompras=$this->compras->where('id_Compra', $id_compra)->first();
       $detalle_compra=$this->detalle_compra->select('*')->where('id_Compra', $id_compra)->findAll();

       $pdf=new \FPDF('P','mm','letter');
       $pdf->AddPage();
       $pdf->SetMargins(10,10,10);
       $pdf->SetTitle('compra');
       $pdf->SetFont('Ariel','B',10);
       $pdf->Cell(195,5,"entrada de productos",0,1,"C");
       $this->response->setHeader('Content-Type','application/pdf');
       $pdf->Output('compra_pdf.pdf','I');
    }
    
   
}

