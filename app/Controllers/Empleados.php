<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
use App\Models\PermisosModel;
use App\Models\DetalleRolesPermisosModel;
class Empleados extends BaseController
{
    protected $empleados,$permisos,$idRol,$detalleRoles;
    protected $reglas;

    public function __construct()
    {
        $this->empleados = new EmpleadosModel();
        $this->permisos = new PermisosModel();
        $this->detalleRoles = new DetalleRolesPermisosModel();
        helper(['form']);
        $this->reglas =[
            'rol'=>[
                'rules'=>'required',
                 'errors'=>[
                    'required'=>'el campo{field} es obligatorio.'
                           ]
                      ] 
                      ];
    }

     public function index($estado = 1)
    {
        $empleados = $this->empleados->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Roles', 'datos' => $empleados];
    
     echo view('encabezado');
     echo view('empleados/empleados',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {
   
      $datos = ['titulo' => 'Agregar Rol'];

       echo view('encabezado');
       echo view('empleados/nuevo',$datos);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
        {
          
            $this->empleados->save(['rol' => $this->request->getPost('rol')]);
            return redirect()->to(base_url().'empleados');
        }else{

            $datos = ['titulo' => 'Agregar Empleado','validation' =>$this->validator];

            echo view('encabezado');
            echo view('empleados/nuevo',$datos);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id,$valid=null)
    {
        $empleados = $this->empleados->where('id_Empleado',$id)->first();
        if($valid !=null){
            $dato = ['titulo' => 'Editar Empleado','datos'=>   $empleados,'validation'=>$valid];
        } else{
            $dato = ['titulo' => 'Editar Empleado','datos'=>   $empleados];
        }
   
      

       echo view('encabezado');
       echo view('empleados/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas)){
        $this->empleados->update($this->request->getPost('id_Empleado'),
        ['nombre' => $this->request->getPost('rol')]);
        return redirect()->to(base_url().'/empleados');
       }else{
        return $this-> editar($this->request->getPost('id_Empleado'),$this->validator);
       }
    }
    public function eliminar($id)
    {
   
        $this->empleados->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/empleados');
    }
    public function eliminados($activo = 0)
    {
        $empleados = $this->empleados->where('estado',$activo)->findAll();
        $data = ['titulo' => 'Roles Eliminados', 'datos' => $empleados];
    
     echo view('encabezado');
     echo view('empleados/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->empleados->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/empleados');
    }
    public function detalles(){
        $permisos= $this->permisos->findAll();
        $idRol=$this->request->getPost('id_Empleados');
       
        $data =['titulo'=>'asignar permisos','permisos'=>$permisos,'id_Empleado'=> $idRol];
    echo view('encabezado');
     echo view('empleados/detalles',$data);
    echo view('pie');
    }
    public function guardaPermisos(){
        if($this->request->getMethod()=="post"){
            $idRol =$this ->request->getPost('id_Empleado');
            $permisos =$this ->request->getPost('permisos');
            foreach($permisos as $permiso){   
                $this->detalleRoles->save(['id_Empleado'=>$idRol,'id_permiso'=>$permiso]);      
        }
        print_r($_POST);
    }


}
}

