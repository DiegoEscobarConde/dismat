<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;
class Productos extends BaseController
{
    protected $productos;
    protected $categorias;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->categorias= new CategoriaModel();
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
      $datos = ['titulo' => 'Agregar Producto','categorias',$categorias];

       echo view('encabezado');
       echo view('productos/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post")
        {
          
            $this->productos->save(['codigo' => $this->request->getPost('codigo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'cantidad' => $this->request->getPost('cantidad'),
            'stock' => $this->request->getPost('stock'),
            'inventario' => $this->request->getPost('inventario'),
            //'id_categoria' => $this->request->getPost('id_categoria'),
        ]);
            return redirect()->to(base_url().'productos');
        }else{

            $datos = ['titulo' => 'Agregar Producto','validation' =>$this->validator];

            echo view('encabezado');
            echo view('productos/nuevo',$datos);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id)
    {
        $categoria = $this->productos->where('id_Producto',$id)->first();
   
      $dato = ['titulo' => 'Editar Producto','datos'=> $categoria];

       echo view('encabezado');
       echo view('productos/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->productos->update($this->request->getPost('id_Producto'),
        ['nombre' => $this->request->getPost('nombre')]);
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
}

