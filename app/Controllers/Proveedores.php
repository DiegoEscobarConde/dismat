<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProveedoresModel;


class Proveedores extends BaseController
{
    protected $proveedores,$empleados,$reglasCambia,$load;
protected $reglas,$reglasLogin;
    public function __construct()
    {
        $this-> proveedores = new ProveedoresModel();
        
       

        helper(['form']);
        
           
             
                    
                
                
    }

     public function index($estado = 1)
    {
        $proveedores = new ProveedoresModel();
       
        $proveedores = $this->proveedores->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Proveedores', 'datos' => $proveedores];
    
     echo view('encabezado');
     echo view('proveedores/proveedor',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
     $proveedores= $this->proveedores->where('estado',1)->findAll();
   
      $datos = ['titulo' => 'Agregar Proveedor',$proveedores];

       echo view('encabezado');
       echo view('proveedores/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
{
  
    if($this->request->getMethod() =="post")
    {   
            $this->proveedores->save(
            ['nombres' => $this->request->getPost('nombres'),
             'email' => $this->request->getPost('email'),
             'celular' => $this->request->getPost('celular'),
             'direccion' => $this->request->getPost('direccion'),
             'estado'=> 1
        ]);

        return redirect()->to(base_url().'proveedores');
    }else{


    
          
        
            $datos = ['titulo' => 'Agregar Usuario'];
     

            echo view('encabezado');
            echo view('proveedores/nuevo',$datos);
            echo view('pie');
        }

    }
       
    
    
        
    

    
    
  

    public function editar($id)
    {
        $proveedores = $this->proveedores->where('id_Proveedor',$id)->first();
      
   
      $data = ['titulo' => 'Editar Usuario','datos'=> $proveedores];

       echo view('encabezado');
       echo view('proveedores/editar',$data);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->proveedores->update($this->request->getPost('id_Proveedor'),
        ['nombres' => $this->request->getPost('nombres'),
         'email' => $this->request->getPost('email'),
         'celular' => $this->request->getPost('celular'),
         'direccion' => $this->request->getPost('direccion'),
         'estado'=> 1
    ]);
        return redirect()->to(base_url().'/proveedores');
    }
    public function eliminar($id)
    {
   
        $this->proveedores->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/proveedores');
    }
    public function eliminados($activo = 0)
    {
        $proveedores = $this->proveedores->where('estado',$activo)->findAll();
        $data = ['titulo' => 'usuarios Eliminados', 'datos' => $proveedores];
    
     echo view('encabezado');
     echo view('proveedores/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->proveedores->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/proveedores');
    }
    
    
}


    
               



            
            
                    
                      


            

