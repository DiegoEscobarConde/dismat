<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\EmpleadosModel;
class Usuarios extends BaseController
{
    protected $usuarios,$empleados,$reglasCambia;
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
         
                    
                
                
    }

     public function index($estado = 1)
    {
        $userModel = new UsuariosModel();
        $usuarios = $userModel->getUsersWithRoles();
        $empleados = $this->empleados->where('rol')->findAll();
        $usuarios = $this->usuarios->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios,'rol'=>$empleados,'usuarios' => $usuarios];
    
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
        
         $hash = password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);
          $nombres = $this->request->getPost('nombres');
          $apellido = $this->request->getPost('primerApellido');
         if (is_string($nombres)){  
          $password = substr(bin2hex(random_bytes(4)), 0, 8);
          $nombreUsuario = strtolower(substr($nombres, 0, 3) . $apellido);;
          
          
    $this->usuarios->save(['nombres' => $this->request->getPost('nombres'),
         'primerApellido' => $this->request->getPost('primerApellido'),
         'segundoApellido' => $this->request->getPost('segundoApellido'),
         'email' => $this->request->getPost('email'),
         'celular' => $this->request->getPost('celular'),
         'usuario' => $nombreUsuario,
         'password' => $hash,$password,
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
        if($this->request->getMethod() =="post"){  
            $usuario =$this->request->getPost('usuario');
            $password =$this->request->getPost('password');
            
            $datosUsuario = $this ->usuarios->where('usuario',$usuario)->first();
                 if($datosUsuario != null)
                {
                    var_dump($usuario);
                    var_dump($datosUsuario['password']);
                     if(password_verify($password,$datosUsuario['password']))
                        {
                            $datosSession= [
                           'id'=> $datosUsuario ['id'],
                           'usuario'=> $datosUsuario ['usuario'],
                           'id_Empleado'=> $datosUsuario ['id_Empleado']];
                            $sesion =session();
                            $sesion->set($datosSession);
                            return redirect()->to(base_url(). '/');
                        } else
                           {
                             $data['error']="las contraseñas no coinciden";
                             echo view('login',$data);
                            }
                 } else
                           {
                             $data['error']="el  ususario no existe";
                             echo view('login',$data);
                           }
         
     }

    }
    public function logout() {
        $session = session(); // Obtener la instancia de la sesión
        $session->destroy(); // Eliminar toda la información de la sesión
        return redirect()->to('login');
    }
    
  
   /* public function valida()
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
        }*/
    
     

    
  /*  public function enviar()
    {
        if($this->request->getMethod() =="post"){  
            $usuario =$this->request->getPost('usuario');
            $password =$this->request->getPost('password');
        // Cargar la librería de correo electrónico
        $email = \Config\Services::email();
    
        // Configurar el asunto y el contenido del correo
        $email->setSubject('Tus credenciales de acceso');
        $mensaje = "Tu nombre de usuario es: $usuario<br>Tu contraseña es: $password";
        $email->setMessage($mensaje);
    
        // Opcional: Configurar el remitente (from)
        $email->setFrom('escobar.diego@gmail.com', 'diego');
    
        // Configurar los destinatarios (usuarios) como un arreglo de correos
        $destinatarios = array();
        foreach ($usuario as $usuarios) {
            $destinatarios[] = $usuarios['email']; // Supongamos que el campo es 'correo'
        }
        $email->setTo($destinatarios);
    
        // Enviar el correo
        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }
      }*/
      public function enviarCredenciales()
      {
        if($this->request->getMethod() =="post"){ 
          // Cargar la librería de correo electrónico
          $nombreUsuario =$this->request->getPost('usuario');
          $password =$this->request->getPost('password');
          $correo=$this->request->getPost('email');
          $asunto=$this->request->getPost('asunto');
         
       $email=\Config\Services::email();
      

       $email->setFrom('escobar.diego.1091@gmai.com', 'diego');
       $email->setTo($correo);

      /* $email->setCC('another@another-example.com');
       $email->setBCC('them@their-example.com');*/
       
       $email->setSubject( $asunto );
       $email->setMessage ("Tu nombre de usuario es: $nombreUsuario<br>Tu contraseña es: $password");
       
       $email->send();
  
       return redirect()->to(base_url().'usuarios'); 
      }
    }
    
       
       public function email()
       {
           if($this->request->getMethod() =="post" )
           {
             
               $this->usuarios->save(['usuarios' => $this->request->getPost('id')]);
               return redirect()->to(base_url().'usuarios');
           }else{
   
               $datos = ['titulo' => 'enviar correo','validation' =>$this->validator];
   
               echo view('encabezado');
               echo view('usuarios/email',$datos);
               echo view('pie');
           }
         
           
       }
}
    
               



            
            
                    
                      


            

