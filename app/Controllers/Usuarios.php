<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
class Usuarios extends BaseController
{
    protected $usuarios,$password;
protected $reglas,$reglasLogin;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        helper(['form']);
        $this->reglas =[
            'nombreUsuario'=> [
                'rules'=> 'required|is_unique[usuarios.usuario]',
                'errors' =>[
                    'required'=> 'el campo{field} es obligatorio.'
                ]
                ],
                
                'password' => [
                    'rules'=> 'required',
                    'errors' =>[
                        'required'=> 'el campo{field} es obligatorio.'
                    ]
                    ],
                'repassword'=>[
                    'rules'=> 'required|matches[password]',
                    'errors' =>[
                        'required'=> 'el campo{field} es obligatorio.',
                       
                    ]
                    ],
                    'nombre'=> [
                        'rules'=> 'required|is_unique[usuarios.usuario]',
                        'errors' =>[
                            'required'=> 'el campo{field} es obligatorio.'
                        ]
                        ],
                    'id_Empleado'=>[
                    'rules'=> 'required|matches[password]',
                    'errors' =>[
                        'required'=> 'el campo{field} es obligatorio.',
                        
                    ]
                    ]
                    ];
                    $this->usuarios = new UsuariosModel();
                    helper(['form']);
                    $this->reglasLogin =[
                        'nombreUsuario'=> [
                            'rules'=> 'required',
                            'errors' =>[
                                'required'=> 'el campo{field} es obligatorio.'
                            ]
                            ],
                            
                            'password' => [
                                'rules'=> 'required',
                                'errors' =>[
                                    'required'=> 'el campo{field} es obligatorio.'
                                ]
                                ]
                                ];
                    
                
                
    }

     public function index($estado = 1)
    {
        $usuarios = $this->usuarios->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];
    
     echo view('encabezado');
     echo view('usuarios/usuarios',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
   
      $datos = ['titulo' => 'Agregar Usuario'];

       echo view('encabezado');
       echo view('usuarios/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate(['nombre'=>'required']))
        {
          
            $this->usuarios->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url().'usuarios');
        }else{

            $datos = ['titulo' => 'Agregar Categoria','validation' =>$this->validator];

            echo view('encabezado');
            echo view('usuarios/nuevo',$datos);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id)
    {
        $categoria = $this->usuarios->where('id_categoria',$id)->first();
   
      $dato = ['titulo' => 'Editar Categoria','datos'=> $categoria];

       echo view('encabezado');
       echo view('usuarios/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->usuarios->update($this->request->getPost('id_categoria'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/usuarios');
    }
    public function eliminar($id)
    {
   
        $this->usuarios->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/usuarios');
    }
    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('estado',$activo)->findAll();
        $data = ['titulo' => 'usuarios Eliminadas', 'datos' => $usuarios];
    
     echo view('encabezado');
     echo view('usuarios/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->usuarios->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/usuarios');
    }
    public function login()
    {
   
      echo view('login');
    }
    public function valida()
    {
if($this->request->getMethod()=="post" && $this->validate($this->reglasLogin)){

    $usuario =$this->request->getPost('nombreUsuario');
    $password =$this->request=('password');
     $datoUsuario = $this ->usuarios->where('nombreUsuario',$usuario)->first();
     if($datoUsuario != null){
        if(password_verify( $password ,$datoUsuario['password'])){

            $datosSession= [
                'id'=> $datoUsuario ['id'],
                'nombre'=> $datoUsuario ['nombre'],
                'id_Empleado'=> $datoUsuario ['id_Empleado'],

            ];
            $sesion =session();
            $sesion->set($datosSession);
            return redirect()->to(base_url(). '/categorias');
        }

     }else{
        $data['error']="el  ususario no existe";
     }
     
    }


}
}

