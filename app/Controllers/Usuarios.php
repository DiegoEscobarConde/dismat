<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\EmpleadosModel;
class Usuarios extends BaseController
{
    protected $usuarios,$empleados;
protected $reglas,$reglasLogin;
    public function __construct()
    {
        $this-> usuarios = new UsuariosModel();
        $this-> empleados = new EmpleadosModel();

        helper(['form']);
        $this->reglas =[
           
                    'nombres'=> [
                        'rules'=> 'required[usuarios.nombres]',
                        'errors' =>[
                            'required'=> 'el campo{field} es obligatorio.'
                        ]
                        ],
                        'primerApellido'=> [
                            'rules'=> 'required[usuarios.primerApellido]',
                            'errors' =>[
                                'required'=> 'el campo{field} es obligatorio.'
                            ]
                            ],
                            'segundoApellido'=> [
                                'rules'=> 'required[usuarios.segundoApellido]',
                                'errors' =>[
                                    'required'=> 'el campo{field} es obligatorio.'
                                ]
                                ],
                                'email'=> [
                                    'rules'=> 'required[usuarios.email]',
                                    'errors' =>[
                                        'required'=> 'el campo{field} es obligatorio.'
                                    ]
                                    ],
                                    'celular'=> [
                                        'rules'=> 'required[usuarios.celular]',
                                        'errors' =>[
                                            'required'=> 'el campo{field} es obligatorio.'
                                        ]
                                        ],
                                
                                  
                                        
                    'id_Empleado'=>[
                    'rules'=> 'required|matches[id_Empleado]',
                    'errors' =>[
                        'required'=> 'el campo{field} es obligatorio.',
                        
                    ]
                    ]
                    ];
                   
                    helper(['form']);
                    $this->reglasLogin =[
                        'usuario'=> [
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
     $empleados = $this->empleados->where('estado',1)->findAll();
   
      $datos = ['titulo' => 'Agregar Usuario','empleados'=>$empleados];

       echo view('encabezado');
       echo view('usuarios/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
    {
        
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
        {
          // $hash = password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);
          $nombre = $this->request->getPost('nombres');
          $apellido = $this->request->getPost('primerApellido');
          $password = substr(bin2hex(random_bytes(4)), 0, 8);
          $nombreUsuario = strtolower(substr($nombre, 0, 3) . $apellido);;
          
    $this->usuarios->save(['nombres' => $this->request->getPost('nombres'),
         'primerApellido' => $this->request->getPost('primerApellido'),
         'segundoApellido' => $this->request->getPost('segundoApellido'),
         'email' => $this->request->getPost('email'),
         'celular' => $this->request->getPost('celular'),
         'usuario' => $nombreUsuario,
         'password' =>  $password,PASSWORD_DEFAULT,
         'id_Empleado' => $this->request->getPost('id_Empleado'),
         'estado'=> 1
        ]);
            return redirect()->to(base_url().'/usuarios');
        }else{
            $empleados = $this->empleados->where('estado',1)->findAll();
            $datos = ['titulo' => 'Agregar Usuario','empleados'=>$empleados,
            'validation'=>$this->validator];

            echo view('encabezado');
            echo view('usuarios/nuevo',$datos);
            echo view('pie');
        }
       
    
      
        
    }
  

    public function editar($id)
    {
        $usuarios = $this->usuarios->where('id',$id)->first();
        $empleados = $this->empleados->where('estado',1)->findAll();
   
      $data = ['titulo' => 'Editar Usuario','datos'=> $usuarios,'empleados'=>$empleados];

       echo view('encabezado');
       echo view('usuarios/editar',$data);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->usuarios->update($this->request->getPost('id'),
        ['nombres' => $this->request->getPost('nombres'),
        'primerApellido' => $this->request->getPost('primerApellido'),
         'segundoApellido' => $this->request->getPost('segundoApellido'),
         'email' => $this->request->getPost('email'),
         'celular' => $this->request->getPost('celular'),
         'id_Empleado' => $this->request->getPost('id_Empleado'),
         'estado'=> 1
    ]);
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
        $data = ['titulo' => 'usuarios Eliminados', 'datos' => $usuarios];
    
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
      

            $usuario =$this->request->getPost('usuario');
            $password =$this->request->getPost('password');
            $datosUsuario = $this ->usuarios->where('usuario',$usuario)->first();
                 if($datosUsuario != null)
                {
                     if(password_verify($password,$datosUsuario['password']))
                        {
                            $datosSession= [
                           'id'=> $datosUsuario ['id'],
                           'nombres'=> $datosUsuario ['nombres'],
                           'primerApellido'=> $datosUsuario ['primerApellido'],
                           'segundoApellido'=> $datosUsuario ['segundoApellido'],
                           'email'=> $datosUsuario ['email'],
                           'celular'=> $datosUsuario ['celular'],
                           'usuario'=> $datosUsuario ['usuario'],
                           'id_Empleado'=> $datosUsuario ['id_Empleado']];
                            $sesion =session();
                            $sesion->set($datosSession);
                            return redirect()->to(base_url(). '/');
                        } else
                           {
                             $data['error']="las contraseñas no coinciden";
                             echo view('login'.$data);
                            }
                 } else
                           {
                             $data['error']="el  ususario no existe";
                             echo view('login',$data);
                           }
         
     }
               
}


            
            
                    
                      


            

 