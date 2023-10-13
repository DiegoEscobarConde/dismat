<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
class Empleados extends BaseController
{
    protected $categorias;
    protected $reglas;

    public function __construct()
    {
        $this->categorias = new EmpleadosModel();
        helper(['form']);
        $this->reglas =[
            'nombre'=>[
                'rules'=>'required',
                 'errors'=>[
                    'required'=>'el campo{field} es obligatorio.'
                           ]
                      ] 
                      ];
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
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
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
  

    public function editar($id,$valid=null)
    {
        $categoria = $this->categorias->where('id_categoria',$id)->first();
        if($valid !=null){
            $dato = ['titulo' => 'Editar Categoria','datos'=> $categoria,'validation'=>$valid];
        } else{
            $dato = ['titulo' => 'Editar Categoria','datos'=> $categoria];
        }
   
      

       echo view('encabezado');
       echo view('categorias/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas)){
        $this->categorias->update($this->request->getPost('id_categoria'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/categorias');
       }else{
        return $this-> editar($this->request->getPost('id_categoria'),$this->validator);
       }
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

