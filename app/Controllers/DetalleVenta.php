<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
use App\Models\ClientesModel;
class DetalleVenta extends BaseController
{
    protected $productos,$detalle_Venta,$categorias,$clientes;
 
    protected $reglas;

    public function __construct()
    {
       $this-> clientes= new ClientesModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
       
        helper(['form']);
       
    }

    

     public function index($estado = 1)
    {
        $productos = $this->productos->where('estado',$estado)->findAll();
        $data = ['titulo' => 'productos', 'datos' => $productos];
    
     echo view('encabezado');
     echo view('productos/productos',$data);
     echo view('pie');

    }
    
    /* public function nuevo()
    {
        
     
      $categorias = $this->categorias->where('estado',1)->findAll();

      $data = ['titulo' => 'Agregar Producto','productos','categorias'=>$categorias];

       echo view('encabezado');
       echo view('productos/nuevo',$data);
       echo view('pie');

    }*/
    public function insertar($id_Producto,$cantidad,$id_Venta)
    { 
        $error ='';
        $productos=$this->productos->where('id_Producto',$id_Producto)->first();
        if($productos)
        {
         $datosexiste= $this->detalle_Venta->porIdProducto($id_Producto) ;    
        if($datosexiste){
            $cantidad=$datosexiste->cantidad+$cantidad;
            $total=$cantidad*$datosexiste->precio;
        }else{
            $total=$cantidad*$productos['precioVenta'];
            $this->detalle_Venta->save([
               'id_Venta'=>$id_Venta,
                'id_Producto'=>$id_Producto,
                'codigo'=>$productos ['codigo'],
                'descripcion'=>$productos ['descripcion'],
                'precio_venta'=>$productos['precio_venta'],
                'cantidad'=>$cantidad,
                'total'=>$total,
                
            ]);
        }
        }else{
            $error = 'no existe el producto';


        }
        $res['error']=$error;
        echo json_encode($res);
        
      
        
    }
    public function autocompleteData1(){
        $returnData = array();
        $valor =$this->request->getGet('term');
        $productos =$this->productos->like('codigo',$valor)->where('estado',1)->findAll();
       
        if(!empty($productos)){
            foreach($productos as $row){
                $data['id_Producto']=$row['id_Producto'];
                $data['value']=$row['codigo'];
                $data['label']=$row['codigo'].' - '.$row['descripcion'];
               
                array_push($returnData,$data);
            }
        }
        echo json_encode($returnData);
    }
    
}

