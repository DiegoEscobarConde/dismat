<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
use App\Models\TemporalModel;






class Ventas extends BaseController
{
    protected $ventas,$clientes,$productos,$detalle_Venta,$temporal,$compras,$db,$id;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
      
        
      
        helper(['form']);
       
    }

    

    public function lista()
    {
        
        $datos=$this->ventas->obtener(1);
      $data = ['titulo' => 'libro de ventas','datos'=>$datos];

       echo view('encabezado');
       echo view('ventas/listaVentas',$data);
       echo view('pie');

    }
    public function eliminar($id_Producto){
        $productos=$this->detalle_Venta->where('id_Venta',$id_Producto)->findAll();
foreach ($productos as $producto) {
               $this->productos->actualizaSock ($producto['id_Producto'],$producto['$cantidad'],['+']);
    
    }
     $this->ventas->update($id_Producto,['estado'=>0]);
     return redirect()->to(base_url().'/ventas/listaVentas');

}
     public function ventas()
    {
        
    
      $data = ['titulo' => 'NUEVA VENTA'];

       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }
   public function guarda()//funcion antigua +pdf por si no da chatgpt
    {
        $id_Venta = $this->request->getPost('id_Venta');
    $total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));
    $id_cliente = $this->request->getPost('id_cliente');
     // Asumiendo que notaR proviene de una fuente válida
     $session=session();
        var_dump($id_Venta);
        var_dump($total);
        var_dump($id_cliente);
       
    // Asegúrate de que 'id' no se incluye en la inserción si es autoincremental
    $resultadoId = $this->ventas->insertarVenta($id_Venta, $total, $id_cliente, $session->id_usuario);

    // Resto de tu lógica...
        $this->temporal=new TemporalModel();
        if($resultadoId){
            $resultadoCompra=$this->temporal->porCompra($id_Venta);
            foreach($resultadoCompra as $row){
                $this->detalle_Venta->save([
                    'id_Venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'nombre'=>$row['nombre'],
                    'cantidad'=>$row['cantidad'],
                    'precioVenta'=>$row['precioVenta']
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock($row['id_Producto'],$row['stock'],'-');
            }
            $this->temporal->eliminarCompra($id_Venta);
        }
        return redirect()->to(base_url()."/productos".$resultadoId);
      // return redirect()->to(base_url()."/ventas/muestraVentaPdf/".$resultadoId);
    }
    function muestraVentaPdf($id_Venta){
        $data ['id_Venta']=$id_Venta;
        echo view('encabezado');
        echo view('compras/ver_ticket', $data);
        echo view('pie');

    }
    function generarCompraPdf ($id_Venta)
    {
        $datosventas=$this->ventas->where('id_Venta', $id_Venta)->firts();
      // $detalle_venta=$this->detalle_venta->select('*')->where('id_Venta', $id_venta)->findAll();

       $pdf=new \FPDF('P','mm','letter');
       $pdf->AddPage();
       $pdf->SetMargins(10,10,10);
       $pdf->SetTitle('ventas');
       $pdf->SetFont('Ariel','B',10);
       $pdf->Cell(195,5,"entrada de productos",0,1,"C");
       $this->response->setHeader('Content-Type','application/pdf');
       $pdf->Output('compra_pdf.pdf','I');
    }

  
    public function pdf()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ventas');
        // Aplicar la cláusula ORDER BY para ordenar por el ID en orden descendente
        $builder->orderBy('id', 'DESC'); // Suponiendo que 'id' es el nombre de tu columna de ID

        // Limitar el resultado a un solo registro
        $builder->limit(1);

        // Realizar la consulta para obtener el último ID
        $query = $builder->get();

        // Obtener el último ID
        $ultimoRegistro = $query->getRow();
        $ultimoID = $ultimoRegistro->id;
        $totalPago = $ultimoRegistro->total;

        //PROCESO DE GENERAR LITERALMENTE EL NUMERO TOTAL DE LA VENTA ACTUAL
        $numero = $totalPago;
        $fmt = new \NumberFormatter('es', \NumberFormatter::SPELLOUT);
        $palabras = $fmt->format($numero);
       
        //PROCESO DE GENERAR EL PDF EN CON LOS VALORES DE LA VENTA ACTUAL
        $db = \Config\Database::connect();
        $builder = $db->table('detalleventas');
        $builder->select('ventas.id');
        $builder->select('clientes.ciNit');
        $builder->select('clientes.razonSocial');
        $builder->select('ventas.fechaRegistro');
        $builder->select('detalleventas.cantidadVenta');
        $builder->select('productos.nombre');
        $builder->select('productos.precioBase');
        $builder->select('detalleventas.precioUnitario');
        $builder->select('ventas.total');
        $builder->select('usuarios.nombreUsuario');

        $builder->join('ventas', 'ventas.id = detalleventas.idVenta');
        $builder->join('productos', 'productos.id = detalleventas.idProducto');
        $builder->join('clientes', 'clientes.id = ventas.idCliente');
        $builder->join('usuarios', 'usuarios.id = ventas.idUsuario');

        $builder->where('ventas.id', $ultimoID);
        $ventas = $builder->get();
        $data = $ventas->getResult();
        $pdf=new \FPDF('P','mm','letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 15);
        //$pdf->Line(11, 130, 197, 130);
        $pdf->Line(11, 150, 90, 150);
        $pdf->Line(120, 150, 200, 150);
        $pdf->Line(11, 170, 199, 170);
        $pdf->Cell(10, 10, $pdf->Image(base_url() . '/images/ferreteria.jpg', 10, 10, 50), 0, 0, 'C');
        $pdf->Cell(65, 15, "GROMAR");
        $pdf->Cell(80, 10, "LA FERRETERIA");
        $pdf->Cell(10, 10, "Nro: 0000" . $ultimoID);
        $pdf->Cell(70, 10, "");
        $pdf->Ln(10);
        $pdf->Cell(55, 10, "");
        $pdf->Cell(10, 10, "MAS ECONOMICA Y COMPLETA");
        $pdf->Ln(30);
        $pdf->Cell(70, 10, "");
        $pdf->Cell(80, 10, "RECIBO DE VENTA");
        $pdf->Ln(10);
        $pdf->Cell(190, 20, "", 1);
        $pdf->Ln(10);
        foreach ($data as $venta) {
            $pdf->Cell(70, 0, "CLIENTE: " . $venta->razonSocial);
            $pdf->Cell(70, 0, "C.I. " . $venta->ciNit);
            $pdf->Cell(70, 0, "FECHA: " . date('d/m/Y'));
        }
        $pdf->Ln(10);
        $pdf->Cell(70, 10, 'PRODUCTO', 1);
        $pdf->Cell(40, 10, 'CANTIDAD', 1);
        $pdf->Cell(40, 10, 'PRECIO', 1);
        $pdf->Cell(40, 10, 'SUBTOTAL', 1);
        foreach ($data as $venta) {
            $pdf->Ln(10);
            $pdf->Cell(70, 10, $venta->nombre, 1);
            $pdf->Cell(40, 10, $venta->cantidadVenta, 1);
            $pdf->Cell(40, 10, $venta->precioBase, 1);
            $pdf->Cell(40, 10, $venta->precioUnitario, 1);
        }
        $pdf->Ln(20);
        $pdf->Cell(85, 10, "TRATANTE: " . $venta->nombreUsuario);
        $pdf->Cell(10, 10, "");
        $pdf->Cell(16, 10, "");

        $pdf->Cell(80, 10, "TOTAL A PAGAR Bs. " . $venta->total);

        $pdf->Ln(20);
        $pdf->Cell(150, 10, "SON: " . $palabras . " 00/100 bolivianos");
        $pdf->Ln(20);
        $pdf->Cell(85, 10, "UNA VEZ REALIZADA LA COMPRA NO SE ACEPTAN DEVOLUCIONES");
        $pdf->Cell(10, 10, "");
        $pdf->Cell(16, 10, "");
        $pdf->Ln(10);
        $pdf->Cell(10, 10, "Gracias  por su preferencia!!");
        $pdf->Ln(20);
        $pdf->Cell(70, 10, "TELEFONO: 7135362");
        $pdf->Cell(60, 10, "UBICACION");
        $pdf->Cell(10, 10, "E-MAIL");
        $pdf->SetFont('Arial', '', 8);
        $pdf->Output('listado_ventas.pdf', 'I'); // 'I' para mostrar en el navegador, 'F' para guardar en un archivo

        exit();
        //FALTA CONTROLAR ACENTOS, CAMBIAR EL CORREO DEL USUARIO POR EL NOMBRE DEL USUARIO
        //PONER IMAGENS DE FONDO, COLOREAR LAS CELDAS, PONER LEYENADAS CREIBLES Y REALISTAS
        //PONER COLOR BLANCO AL TEXTO DEL LOGOTIPO (GROMAR) Y AUMENTAR LA HORA A LA FECHA
        //COLOCAR CORREOS DE LA EMPRESA O DUEÑO DE LA EMPRESA.
    }
 

 

   
 


   
 
    

}





