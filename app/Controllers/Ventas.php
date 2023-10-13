<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;


class Ventas extends BaseController
{
    protected $ventas, $ultimoCliente,$clientes,$productos,$detalle_Venta;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
  
        $this->clientes = new ClientesModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
      
        helper(['form']);
       
    }

    

     public function index($estado = 1)
    {
        $ventas = $this->ventas->where('estado',$estado)->findAll();
        $productos = $this->productos->where('estado',$estado)->findAll();
        $data = ['titulo' => 'Nueva Venta', 'datos' => $ventas,'productos'=>$productos];
    
     echo view('encabezado');
     echo view('ventas/nuevo',$data);
     echo view('pie');

    }
    
     public function ventas($estado=1)
    {
        
     $productos = $this->productos->where('estado',$estado)->findAll();
      $data = ['titulo' => 'NUEVA VENTA','productos'=>$productos];

       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }
    /*public function insertar()
    {
        if($this->request->getMethod() =="post" && $this->validate($this->reglas))
        {
          
            $this->ventas->save(['nombre' => $this->request->getPost('nombre'),
            'primerApellido' => $this->request->getPost('primerApellido'),
            'segundoApellido' => $this->request->getPost('segundoApellido'),
            'ci_nit' => $this->request->getPost('ci_nit'),
            'celular' => $this->request->getPost('celular'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion'),
             ]);
            return redirect()->to(base_url().'ventas');
        }else{


            $data = ['titulo' => 'Agregar cliente','validation' =>$this->validator];

            echo view('encabezado');
            echo view('ventas/nuevo',$data);
            echo view('pie');
        }
      
        
    }*/
  

    public function editar($id)
    {
        $ventas = $this->ventas->where('id_cliente',$id)->first();
   
      $dato = ['titulo' => 'Editar Cliente','datos'=> $ventas];

       echo view('encabezado');
       echo view('ventas/editar',$dato);
       echo view('pie');

    }
    public function actualizar()
    {
   
        $this->ventas->update($this->request->getPost('id_cliente'),
        ['nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/ventas');
    }
    public function eliminar($id)
    {
   
        $this->ventas->update($id,['estado' => 0]);
        return redirect()->to(base_url().'/ventas');
    }
    public function eliminados($activo = 0)
    {
        $ventas = $this->ventas->where('estado',$activo)->findAll();
        $data = ['titulo' => 'productos Eliminadas', 'datos' => $ventas];
    
     echo view('encabezado');
     echo view('ventas/eliminados',$data);
     echo view('pie');

    }
    public function reingresar($id)
    {
   
        $this->ventas->update($id,['estado' => 1]);
        return redirect()->to(base_url().'/ventas');
    }
    public function mostrarUltimoCliente(){
        $clienteModel = new ClientesModel();
        $ultimoCliente = $clienteModel->orderBy('id_cliente','DESC')->first();
        if($ultimoCliente){
            $data['ultimoCliente']= $ultimoCliente;
            return view('resultadoLabel',$data);
        } else {
            return "no hay ada";
        }
    }
    public function mostrarCliente($idCliente)
    {
        $clienteModel = new ClientesModel();
        $clientes = $clienteModel->find($idCliente);

        if ($clientes) {
            $data['cliente'] = $clientes;
            return view('ventas', $data);
        } else {
            // Manejar el caso en el que el cliente no se encuentre
            return "Cliente no encontrado";
        }
    }
    public function mostrarCliente1($id)
    {
        // Cargar el modelo de cliente
        $clienteModel = new ClientesModel();

        // Obtener los datos del cliente por su ID
        $cliente = $clienteModel->find($id);

        // Pasar los datos del cliente a la vista
        $data['cliente'] = $cliente;

        // Cargar la vista para mostrar los datos del cliente
        return view('ventas', $data);
    }
    public function buscarCliente()
    {
        $clienteModel = new ClientesModel();

        $searchTerm = $this->request->getPost('search'); // Obtén el término de búsqueda del formulario

        $clientes = $clienteModel->like('nombre', $searchTerm)->findAll();

        // Pasar los resultados de la búsqueda a una vista
        $data['clientes'] = $clientes;

        return view('ventas', $data);
    }
   /* public function mostrarVenta($ventaId)
    {
        // Supongamos que obtienes el ID del cliente asociado a la venta
        $clienteId = $this->obtenerClienteIdPorVenta($ventaId);

        // Pasar el ID del cliente a la vista de ventas
        $data['id_cliente'] = $clienteId;

        return view('ventas', $data);
    }

    private function obtenerClienteIdPorVenta($ventaId)
    {
        // Supongamos que tienes una tabla "ventas" con una columna "cliente_id" que almacena el ID del cliente asociado a cada venta.
    // Puedes usar el modelo de ventas para consultar la base de datos y obtener el ID del cliente.

    // Cargar el modelo de ventas
    $ventasModel = new \App\Models\VentasModel();

    // Consultar la base de datos para obtener el registro de venta
    $venta = $ventasModel->find($ventaId);

    if (!empty($venta)) {
        // Si se encuentra la venta, obtén el ID del cliente asociado a ella
        return $venta['id_cliente'];
    } else {
        // Manejar el caso en el que no se encuentre la venta
        return null; // o algún otro valor predeterminado según tu lógica
    }
        // Lógica para obtener el ID del cliente asociado a la venta
        // Esto podría implicar consultas a la base de datos u otras operaciones
        // Retorna el ID del cliente
   
}*/
public function mostrarDatosCliente($clienteId)
{
    // Cargar el modelo de cliente
    $clienteModel = new ClientesModel();

    // Obtener los datos del cliente por su ID
    $cliente = $clienteModel->find($clienteId);

    // Pasar los datos del cliente a la vista
    $data['cliente'] = $cliente;

    return view('ventas', $data);
}
/*public function autocompleteData(){
    $returnData = array();
    $valor =$this->request->getGet('term');
    $clientes =$this->clientes->like('nombre',$valor)->where('estado',1)->findAll();
    if(!empty($clientes)){
        foreach($clientes as $row){
            $data['id_cliente']=$row['id_cliente'];
            $data['value']=$row['nombre'];
            array_push($returnData,$data);
        }
    }
    echo json_encode($returnData);
}*/
/*public function buscar()
    {
        $busCli = $this->request->getPost('searchTerm');

        $model = new ClientesModel(); // Reemplaza 'MiModelo' con el nombre de tu modelo
        $resultado = $model->like('ci_Nit', $busCli)->findAll(); // Cambia 'nombre' por el campo que deseas buscar

        // Devuelve los resultados como JSON
        return $this->response->setJSON($resultado);
    }*/
    public function agregarProducto()
    {
        
    }
}



