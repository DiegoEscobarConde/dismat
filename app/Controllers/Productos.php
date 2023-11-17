<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;
class Productos extends BaseController
{
    protected $productos;
    protected $categorias;
    protected $reglas;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->categorias= new CategoriaModel();
        helper(['form']);
        $this->reglas =[
            'codigo'=>[
                'rules'=>'required|is_unique[productos.codigo]',
                 'errors'=>[
                    'required'=>'el campo{field} es obligatorio.',
                    'is_unique'=>'el codigo{field} debe ser unico.'
                           ]
                      ] 
                      ];
    }

    

     public function index($estado = 1)
    {
        $productos = $this->productos->where('estado',$estado)->findAll();
        $data = ['titulo' => 'productos', 'datos' => $productos];
    
     echo view('encabezado');
     echo view('productos/productos',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
        
     
      $categorias = $this->categorias->where('estado',1)->findAll();

      $data = ['titulo' => 'Agregar Producto','productos','categorias'=>$categorias];

       echo view('encabezado');
       echo view('productos/nuevo',$data);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
        {
          
            $this->productos->save(['codigo' => $this->request->getPost('codigo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio_ventaU' => $this->request->getPost('precio_ventaU'),
            'precio_compraU' => $this->request->getPost('precio_compraU'),
            'stock' => $this->request->getPost('stock'),
            'id_categoria' => $this->request->getPost('id_categoria'),
        ]);
            return redirect()->to(base_url().'productos');
        }else{

    
            $categorias = $this->categorias->where('estado',1)->findAll();

            $data = ['titulo' => 'Agregar Producto','productos','categorias'=>$categorias,'validation' =>$this->validator];

            echo view('encabezado');
            echo view('productos/nuevo',$data);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id)
    {
        $productos = $this->productos->where('id_Producto',$id)->first();
        $categorias = $this->categorias->where('estado',1)->findAll();
   
      $dato = ['titulo' => 'Editar Producto','datos'=> $productos,'categorias'=>$categorias,'validation' =>$this->validator];

       echo view('encabezado');
       echo view('productos/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->productos->update($this->request->getPost('id_Producto'),
        ['codigo' => $this->request->getPost('codigo'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precio_ventaU' => $this->request->getPost('precio_ventaU'),
        'precio_compraU' => $this->request->getPost('precio_compraU'),
        'stock' => $this->request->getPost('stock'),
        'id_categoria' => $this->request->getPost('id_categoria'),
    ]);

    
    
   
        return redirect()->to(base_url().'/productos');
    }
    public function eliminar($id)
    {
   
        $this->productos->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/productos');
    }
    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('estado',$activo)->findAll();
        $data = ['titulo' => 'productos Eliminadas', 'datos' => $productos];
    
     echo view('encabezado');
     echo view('productos/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->productos->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/productos');
    }
    public function autocompleteData1(){
        $returnData = array();
        $valor =$this->request->getGet('term');
        $productos =$this->productos->like('codigo',$valor)->where('estado',1)->findAll();
       
        if(!empty($productos)){
            foreach($productos as $row){
                $data['id_Producto']=$row['id_Producto'];
                $data['value']=$row['codigo'];
                $data['label']=$row['descripcion'];
               
                array_push($returnData,$data);
            }
        }
        echo json_encode($returnData);
    }
  
    public function buscarPorCodigo($codigo){
        $this ->productos->select('*');
        $this ->productos->where('codigo',$codigo);
        $this ->productos->where('estado',1);
       $datos=$this->productos->get()->getRow();
     
       $res['existe']=false;
       $res['datos']='';
       $res['error']='';
      
       if($datos){
        $res['datos']=$datos;
        $res['existe']=true;

       }else{
        $res['error']='no existe producto';
        $res['existe']=false;
       }
       echo json_encode($res);
    }
    public function buscarPorCodigo1($codigo){
        $this ->productos->select('*');
        $this ->productos->where('codigo',$codigo);
        $this ->productos->where('estado',1);
       $data=$this->productos->get()->getRow();
     
       $res['existe']=false;
       $res['datos']='';
       $res['error']='';
      
       if($data){
        $res['datos']=$data;
        $res['existe']=true;

       }else{
        $res['error']='no existe producto';
        $res['existe']=false;
       }
       echo json_encode($res);
    }
 
function mostrarMinimos(){
  echo view('encabezado') ; 
  echo view('productos/ver_minimos') ; 
  echo view('pie') ; 
}
public function generarMinimosPdf()
{
$pdf = new \FPDF('P','mm','letter');
$pdf->AddPage();
$pdf->SetMargins(10,10,10);
$pdf->SetTitle("reporte de productos por categorias");
$pdf->Image("img/logo.png",10,20,50);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0,5,utf8_decode("reporte de productos por categorias"),0,1,'C');
$pdf->Ln(25);
$pdf->Cell(40, 5, utf8_decode('codigo'), 1, 0, 'C');
$pdf->Cell(80, 5, utf8_decode('descripcion'), 1, 0, 'C');
$pdf->Cell(40, 5, utf8_decode('piezas'), 1, 0, 'C');
$pdf->Cell(40, 5, utf8_decode('stock'), 1, 1, 'C'); // Cambiado '0' a '1' para avanzar a la siguiente línea

$datosProductos = $this->productos->getProductosMnimosConCategoria();
$prevCategoria = null;

foreach ($datosProductos as $producto) {
    // Imprimir la categoría si ha cambiado
    if ($producto['nombre'] != $prevCategoria) {
        // Imprimir una fila con el nombre de la categoría
        $pdf->Cell(200, 5, utf8_decode('Categoría: ' . $producto['nombre']), 1, 1, 'L');
        
        // Actualizar la categoría actual
        $prevCategoria = $producto['nombre'];
    }

    // Imprimir los detalles del producto
    $pdf->Cell(40, 5, utf8_decode($producto['codigo']), 1, 0, 'C');
    $pdf->Cell(80, 5, utf8_decode($producto['descripcion']), 1, 0, 'C');
    $pdf->Cell(40, 5, utf8_decode('piezas'), 1, 0, 'C');
    $pdf->Cell(40, 5, utf8_decode($producto['stock']), 1, 1, 'C'); // Cambiado '0' a '1' para avanzar a la siguiente línea
}



$this->response->setHeader('Content-Type','application/pdf');
$pdf->Output('ProductoMininmo.pdf','I');
}

}

