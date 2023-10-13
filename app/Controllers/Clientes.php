<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;


class Clientes extends BaseController
{
    protected $clientes,$reglas,$busCli;
   
    public function __construct()
    {
        $this->clientes = new ClientesModel();
      
        helper(['form']);
        $this->reglas =[
            'nombre'=>[
                'rules'=>'required|is_unique[clientes.nombre]',
                 'errors'=>[
                    'required'=>'el campo{field} es obligatorio.',
                    'is_unique'=>'el codigo{field} debe ser unico.'
                           ]
                      ] 
                      ];
    }

    

     public function index($estado = 1)
    {
        $clientes = $this->clientes->where('estado',$estado)->findAll();
        $data = ['titulo' => 'clientes', 'datos' => $clientes];
    
     echo view('encabezado');
     echo view('clientes/cliente',$data);
     echo view('pie');

    }
    
     public function nuevo()
    {

      $data = ['titulo' => 'Agregar Cliente'];

       echo view('encabezado');
       echo view('clientes/nuevo',$data);
       echo view('pie');

    }
    public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
        {
          
            $this->clientes->save(['nombre' => $this->request->getPost('nombre'),
            'primerApellido' => $this->request->getPost('primerApellido'),
            'segundoApellido' => $this->request->getPost('segundoApellido'),
            'ci_nit' => $this->request->getPost('ci_nit'),
            'celular' => $this->request->getPost('celular'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
             ]);
            return redirect()->to(base_url().'clientes');
        }else{


            $data = ['titulo' => 'Agregar cliente','validation' =>$this->validator];

            echo view('encabezado');
            echo view('clientes/nuevo',$data);
            echo view('pie');
        }
      
        
    }
  

    public function editar($id)
    {
        $clientes = $this->clientes->where('id_cliente',$id)->first();
   
      $dato = ['titulo' => 'Editar Cliente','datos'=> $clientes];

       echo view('encabezado');
       echo view('clientes/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->clientes->update($this->request->getPost('id_cliente'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/clientes');
    }
    public function eliminar($id)
    {
   
        $this->clientes->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/clientes');
    }
    public function eliminados($activo = 0)
    {
        $clientes = $this->clientes->where('estado',$activo)->findAll();
        $data = ['titulo' => 'clientes Eliminados', 'datos' => $clientes];
    
     echo view('encabezado');
     echo view('clientes/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->clientes->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/clientes');
    }
   public function autocompleteData(){
        $returnData = array();
        $valor =$this->request->getGet('term');
        $clientes =$this->clientes->like('ci_nit',$valor)->where('estado',1)->findAll();
       
        if(!empty($clientes)){
            foreach($clientes as $row){
                $data['id_cliente']=$row['id_cliente'];
                $data['value']=$row['ci_nit'];
                $data['primerApellido']=$row['primerApellido'];
                $data['nombre']=$row['nombre'];
            
               
                array_push($returnData,$data);
            }
        }
        echo json_encode($returnData);
    }
  /* public function buscar()
    {
        $busCli = $this->request->getPost('clientes');

        $model = new ClientesModel(); // Reemplaza 'MiModelo' con el nombre de tu modelo
        $resultado = $model->like('ci_Nit', $busCli)->findAll(); // Cambia 'nombre' por el campo que deseas buscar

        // Devuelve los resultados como JSON
        return $this->response->setJSON($resultado);
    }*/
  


}

