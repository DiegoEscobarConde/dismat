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
         helper(['form']);                      //VALIDACION PARA LOS CAMPOS CONTRASEÑA*/
        $this->reglasCambia = [
            'password' =>
            ['rules' => 'required', 'errors' =>
            ['required' => 'El CAMPO ES OBLIGATORIO!!']],

            're_password' =>
            ['rules' => 'required|matches[password]', 'errors' =>
            [
                'required' => 'El CAMPO  re pasword ES OBLIGATORIO!!',
                'matches' => 'LAS CONTRASEÑAS NO COINCIDEN!!'
            ]]
        ];
                    
                
                
    }

     public function index($estado = 1)
    {
        $empleados = $this->empleados->where('rol')->findAll();
        $usuarios = $this->usuarios->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios,'empleados'=>$empleados];
    
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
          $nombres = $this->request->getPost('nombres');
          $apellido = $this->request->getPost('primerApellido');
        //  if (is_string($nombres)){  
          $password = substr(bin2hex(random_bytes(4)), 0, 8);
          $nombreUsuario = strtolower(substr($nombres, 0, 3) . $apellido);;
          
          
    $this->usuarios->save(['nombres' => $this->request->getPost('nombres'),
         'primerApellido' => $this->request->getPost('primerApellido'),
         'segundoApellido' => $this->request->getPost('segundoApellido'),
         'email' => $this->request->getPost('email'),
         'celular' => $this->request->getPost('celular'),
         'usuario' => $nombreUsuario,
         'password' => password_hash($password,PASSWORD_DEFAULT),
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
  //  }
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
      
       if($this->request->getMethod() =="post" && $this->validate($this->reglasLogin))
        {   
             $usuario = $this->request->getPost('usuario');
             $password = $this->request->getPost('password');
             $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();
             
             if ($datosUsuario != null) 
             {
               
                if (password_verify($password, $datosUsuario['password']))
                 {
                     $datosSession = [
                    'id' => $datosUsuario['id'],
                    'nombres' => $datosUsuario['nombres'],
                    'primerApellido' => $datosUsuario['primerApellido'],
                    'segundoApellido' => $datosUsuario['segundoApellido'],
                    'email' => $datosUsuario['email'],
                    'celular' => $datosUsuario['celular'],
                    'usuario' => $datosUsuario['usuario'],
                    'password' => $datosUsuario['password'],
                    'id_Empleado' => $datosUsuario['id_Empleado'] ];
        
                    $sesion = session();
                    $sesion->set($datosSession);
                    return redirect()->to(base_url() . '/usuarios');
                 }  else {
                $data['error'] = "Las contraseñas no coinciden";
                echo view('login', $data);
                }
                 } else {
                   $data['error'] = "El usuario no existe";
                   echo view('login', $data);
                  } 
                }  else {
                 $data=['validation'=>$this->validator];
                 echo view ('login',$data);
                 }    
                 
                 
         
        
       
              
     }
        
     
     public function logout()
     {
        $session = session();
        $session->destroy();
    return redirect()->to(base_url());   
     }
     public function enviar()
     {

      
      /*$asunto=$this->request->getPost('asunto');
      $mensaje=$this->request->getPost('mensaje');
      $correo=$this->request->getPost('correo');
      $email = \Config\Services::email();

            $email->setFrom('escobar.diego.9494@gmail.com', 'diegoescobar');
                $email->setTo($correo);


                 $email->setSubject($asunto);
                  $email->setMessage($mensaje);

               if(! $email->send()) {
                echo "no se envio nada";
                echo $email->printDebugger([encabezado]);
               }else{
                echo 'enviado';
               }*/
                // Recoge los datos del formulario
                
        $usuario = $this->request->getPost('usuario');
        $contrasena = $this->request->getPost('password');
        $correo = $this->request->getPost('email');
        // Configura la biblioteca de correo
        $email = \Config\Services::email();
        $email->setTo($correo);
       $email->setFrom('escobar.diego.1091@gmail.com', 'diegoescobar');
        $email->setSubject('credenciales de acceso');
        $email->setMessage("usuario: $usuario\npassword: $contrasena");
       
      
        // Intenta enviar el correo
        if ($email->send()) {
            // Correo enviado exitosamente
            return redirect()->to('/productos'); // Redirige a una página de éxito
        } else {
            // Error al enviar el correo
           // return redirect()->to('/categorias'); // Redirige a una página de fallo
           echo $email ->printDebugger(['headers']);
        }
    }
    public function cambia_pasword()
    {
        //$session = session();

        $usuario = $this->usuarios->where('activo', 1)->first();
        //$usuario = $this->usuarios->where('usuario', $session->id_usuario)->first();
        $data = ['titulo' => 'Cambiar Cntraseña', 'usuario' => $usuario];

        echo view('encabezado');
        echo view('usuarios/cambia_pasword', $data);
        echo view('pie');
    }


    public function actualiza_pasword()
    {

        $contrasena = 'password';
        $contrasenaEncriptada = password_hash($contrasena, PASSWORD_BCRYPT);

        if ($this->request->getPost() && $this->validate($this->reglasCambia)) {
            $session = session();
            $idUsuario = $session->id_usuario;

            $this->usuarios->update($idUsuario, ['password' => $contrasenaEncriptada]);
            //$encrypter = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
            $usuario = $this->usuarios->where('activo', 1)->first();
            $data = ['titulo' => 'Cambiar Cntraseña', 'usuario' => $usuario,'validation'=>$this->validator];

            echo view('encabezado');
            echo view('usuarios/cambia_pasword', $data);
            echo view('pie');

            return redirect()->to(base_url() . '/usuarios');
        } else {

            $usuario = $this->usuarios->where('activo', 1)->first();
            //$usuario = $this->usuarios->where('usuario', $session->id_usuario)->first();
            $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario, 'validation'=>$this->validator];

            echo view('encabezado');
            echo view('usuarios/cambia_pasword', $data);
            echo view('pie');
        }
    }
     
    }

    
          



            
            
                    
                      


            

