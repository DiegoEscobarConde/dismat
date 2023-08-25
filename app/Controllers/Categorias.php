<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CategoriaModel;
class Categorias extends BaseController
{
    protected $categorias;

    public function __construct()
    {
        $this->categorias = new CategoriaModel();
    }

     public function index($estado = 1)
    {
        $categorias = $this->categorias->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Categorias', 'datos' => $categorias];
    
     echo view('encabezado');
     echo view('categorias/categorias',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
   
      $datos = ['titulo' => 'Agregar Categoria'];

       echo view('encabezado');
       echo view('categorias/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate(['nombre'=>'required']))
        {
          
            $this->categorias->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url().'categorias');
        }else{

            $datos = ['titulo' => 'Agregar Categoria','validation' =>$this->validator];

            echo view('encabezado');
            echo view('categorias/nuevo',$datos);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id)
    {
        $categoria = $this->categorias->where('id_categoria',$id)->first();
   
      $dato = ['titulo' => 'Editar Categoria','datos'=> $categoria];

       echo view('encabezado');
       echo view('categorias/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->categorias->update($this->request->getPost('id_categoria'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/categorias');
    }
    public function eliminar($id)
    {
   
        $this->categorias->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/categorias');
    }
    public function eliminados($activo = 0)
    {
        $categorias = $this->categorias->where('estado',$activo)->findAll();
        $data = ['titulo' => 'Categorias Eliminadas', 'datos' => $categorias];
    
     echo view('encabezado');
     echo view('categorias/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->categorias->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/categorias');
    }
}

