<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\EmpleadosModel;

class Usuarios extends BaseController
{
    protected $usuarios,$empleados,$reglasCambia,$load;
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
    if ($this->request->getMethod() == "post") {
        $passwordAlfanumerico = $this->request->getPost('password');
        $nombres = $this->request->getPost('nombres');
        $apellido = $this->request->getPost('primerApellido');
       
        $passwordAlfanumerico = $this->generarPassword(); // Genera una contraseña alfanumérica de 8 caracteres
       // $password = password_hash($passwordAlfanumerico, PASSWORD_DEFAULT); // Encripta la contraseña
       $nombreUsuario = (string)$nombres . (string)$apellido; // Concatenar y convertir a string
$nombreUsuario = strtolower(substr($nombreUsuario, 0, 3)); // Convertir a minúsculas y obtener los primeros 3 caracteres

        $correo=$this->request->getPost('email');
         // Almacena $passwordEncriptado en la base de datos
          // Puedes guardar $passwordAlfanumerico en otra variable si necesitas enviarla por correo electrónico   
          $accion = $this->request->getPost('accion');
          if ($accion === "guardaryenviar") {     
            $this->usuarios->save([
                'nombres' => $this->request->getPost('nombres'),
                'primerApellido' => $this->request->getPost('primerApellido'),
                'segundoApellido' => $this->request->getPost('segundoApellido'),
                'email' => $correo,
                'celular' => $this->request->getPost('celular'),
                'usuario' => $nombreUsuario,
                'password' =>   $passwordAlfanumerico, // Almacena el hash de la contraseña
                'id_Empleado' => $this->request->getPost('id_Empleado'),
                'estado' => 1
            ]);
       
             // Envía el correo electrónico
             $email = \Config\Services::email();
        
             // Configurar los datos del correo
             $email->setFrom('escobar.diego.1091@gmail.com', 'diego'); // Establece el encabezado 'From' con tu dirección de correo
            
             $email->setTo($correo);
             $email->setSubject("envio de credenciales");
             $mensaje = "<p>bienvenid $nombres</p><p>Tu nombre de usuario es: $nombreUsuario</p><p>Tu contraseña es: $passwordAlfanumerico</p>";
             $email->setMessage($mensaje);
     
             // Intentar enviar el correo
             if ($email->send()) {
                 // El correo se envió exitosamente
                 return redirect()->to(base_url() . 'usuarios');
             } else {
                 // Hubo un error al enviar el correo
                 echo $email->printDebugger(); // Esto mostrará información de depuración para ayudarte a diagnosticar problemas
             }

        return redirect()->to(base_url() . '/usuarios');
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
    function generarPassword() {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 8; // Longitud de la contraseña deseada
        $password = '';
    
        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
    
        return $password;
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
    if ($this->request->getMethod() == "post") {
        $usuario = $this->request->getPost('usuario');
        $passwordAlfanumerico = $this->request->getPost('password');

        // Realiza la búsqueda del usuario en la base de datos
        $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();
        var_dump($usuario);
        var_dump($passwordAlfanumerico);
        if ($datosUsuario != null && isset($datosUsuario['password']) && is_string($datosUsuario['password'])) {
            // Las credenciales son válidas
            $datosSesion = [
                'id' => $datosUsuario['id'],
                'nombre' => $datosUsuario['nombre'],
                'usuario' => $datosUsuario['usuario'],
                'id_Empleado' => $datosUsuario['id_Empleado']
            ];
            $session =session();
           $session->set($datosSesion); // Inicia sesión

            return redirect()->to(base_url() . '/categoria');
        } else {
            $data['error'] = "Las credenciales son incorrectas";
            echo view('login', $data);
        }
    } else {
        $data = ['validation' => $this->validator];
        echo view('login', $data);
    }
}

   /* public function valida()
    {
        if($this->request->getMethod() =="post"){  
            $usuario =$this->request->getPost('usuario');
            $passwordAlfanumerico =$this->request->getPost('password');
            
            $datosUsuario = $this ->usuarios->where('usuario',$usuario)->first();
                 if($datosUsuario != null)
                {
                    var_dump($usuario);
                    var_dump($passwordAlfanumerico);
                    if (($passwordAlfanumerico. $datosUsuario['usuario'])) {
                        // Contraseña válida
                         $datosSession= 
                            [
                           'id'=> $datosUsuario ['id'],
                           'nombres'=> $datosUsuario ['nombres'],
                           'usuario'=> $datosUsuario ['usuario'],
                           'id_Empleado'=> $datosUsuario ['id_Empleado']
                            ];
                            $session =session();
                            $session->set($datosSession);
                            return redirect()->to(base_url(). '/categorias');
                    } 
                           
                        else
                           {
                             $data['error']="las contraseñas no coinciden";
                             echo view('login',$data);
                            }
                 } else  {
                             $data['error']="el  ususario no existe";
                             echo view('login',$data);
                           }
                        } else  {
                            $data=['validation'=>$this->validator];
                            echo view('login',$data);
                          }
         
     }*/
    


    
    public function logout() {
        $session = session(); // Obtener la instancia de la sesión
        $session->destroy(); // Eliminar toda la información de la sesión
        return redirect()->to(base_url());
    }
    
  

        
    
     

      /*  public function enviarCredenciales( )
        {
            if ($this->request->getMethod() == "post"){    
            $nombreUsuario = $this->usuarios->getPost('usuario');
            $passwordAlfanumerico  =$this->request->getPost('password');
            $correo=$this->request->getPost('email');
            $asunto=$this->request->getPost('asunto');
          
                $password = $this->request->getPost('password');
                $nombres = $this->request->getPost('nombres');
                $apellido = $this->request->getPost('primerApellido');
        
                $passwordAlfanumerico = $this->generarPassword(); // Genera una contraseña alfanumérica de 8 caracteres
                $password = password_hash($passwordAlfanumerico, PASSWORD_DEFAULT); // Encripta la contraseña
                $nombreUsuario=strtolower(substr($nombres, 0, 3).$apellido);
              
                 // Almacena $passwordEncriptado en la base de datos
                  // Puedes guardar $passwordAlfanumerico en otra variable si necesitas enviarla por correo electrónico
        
                   
                  
                  
             
                // Cargar la librería de correo electrónico
                $email = \Config\Services::email();
        
                // Configurar los datos del correo
                $email->setFrom('escobar.diego.1091@gmail.com', 'diego'); // Establece el encabezado 'From' con tu dirección de correo
               
                $email->setTo($correo);
                $email->setSubject($asunto);
                $mensaje = "<p>Tu nombre de usuario es: $nombreUsuario</p><p>Tu contraseña es: $passwordAlfanumerico</p>";
                $email->setMessage($mensaje);
        
                // Intentar enviar el correo
                if ($email->send()) {
                    // El correo se envió exitosamente
                    return redirect()->to(base_url() . 'usuarios');
                } else {
                    // Hubo un error al enviar el correo
                    echo $email->printDebugger(); // Esto mostrará información de depuración para ayudarte a diagnosticar problemas
                }
            }
        }*/

        
 
   

       public function email()
       {
           if($this->request->getMethod() =="post" )
           {
             
               $this->usuarios->save(['usuario' => $this->request->getPost('usuario')]);
               return redirect()->to(base_url().'usuarios');
           }else{
   
               $datos = ['titulo' => 'enviar correo','validation' =>$this->validator];
   
               echo view('encabezado');
               echo view('usuarios/email',$datos);        

            
        }
    }
}


    
               



            
            
                    
                      


            

