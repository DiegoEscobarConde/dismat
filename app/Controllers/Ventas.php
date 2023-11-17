<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\DetalleVentaModel;
use App\Models\TemporalModel;
use App\Models\ClientesModel;





class Ventas extends BaseController
{
    protected $ventas,$clientes,$productos,$detalle_Venta,$temporal,$compras,$session,$db;
   
    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->productos = new ProductosModel();
        $this->detalle_Venta = new DetalleVentaModel();
        $this->clientes = new ClientesModel();      
        $this->session = session();     
       helper(['form']);      
    }

    public function lista()
    {
        
        $ventas = $this->ventas->findAll();
      $data = ['titulo' => 'libro de ventas','ventas'=>$ventas];

       echo view('encabezado');
       echo view('ventas/listaVentas',$data);
       echo view('pie');

    }
    public function ventasHechas() {
        // Obtén las fechas de inicio y fin del formulario
        $fecha_inicio = $this->request->getVar('fecha_inicio');
        $fecha_fin = $this->request->getVar('fecha_fin');
    
        // Llama a un modelo o servicio para obtener las ventas dentro del rango de fechas
        $ventas = $this->ventas->obtenerVentasPorRangoDeFechas($fecha_inicio, $fecha_fin);
    
        // Carga la vista con las ventas filtradas
        $data = [
            'ventas' => $ventas,
            'titulo' => 'Ventas filtradas por fecha', // Cambia el título según tus necesidades
        ];
       
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
        
        if(!isset($this->session->usuario)){return redirect()->to(base_url('/login'));}  
      $data = ['titulo' => 'NUEVA VENTA'];
       echo view('encabezado');
       echo view('ventas/ventas',$data);
       echo view('pie');

    }

   public function guarda()
    {
        $id_Venta = $this->request->getPost('id_Venta');
    $total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));
     $session=session();
        var_dump($id_Venta);
        var_dump($total);
     
        var_dump($session->usuario);
       
     
    
        
            $id_cliente = $this->request->getPost('id_cliente');
        
    
        var_dump($id_cliente);
    $resultadoId=$this->ventas->insertaVenta($id_Venta,$total,$id_cliente,$session->id);  
     
        if($resultadoId){
             $this->temporal=new TemporalModel();
            $resultadoCompra=$this->temporal->porCompra2($id_Venta);
            foreach($resultadoCompra as $row){
                $this->detalle_Venta->save([
                    'id_Venta'=>$resultadoId,
                    'id_Producto'=>$row['id_Producto'],
                    'descripcion'=>$row['descripcion'],
                    'cantidad'=>$row['cantidad'],
                    'precio'=>$row['precio'],
                    
                ]);
                $this->productos=new ProductosModel();
                $this->productos->actualizaStock2($row['id_Producto'],$row['cantidad']);
            }
            $this->temporal->eliminarCompra($id_Venta);
        }

       return redirect()->to(base_url()."/ventas/muestraVentaPdf/".$resultadoId);
      
    }

    function muestraVentaPdf($id_Venta){
       $data['id_Venta']=$id_Venta;
        echo view('encabezado');
        echo view('ventas/ver_venta_pdf',$data);
        echo view('pie');

    }
   
 

    function generarVentaPdf($id_Venta)
    {
        $datosVenta = $this->ventas->where('id_Venta', $id_Venta)->first(); // Corrige 'firts' a 'first'
        $detalleVenta = $this->detalle_Venta->select('*')->where('id_Venta', $id_Venta)->findAll();
       
            $datosCliente = $this->clientes->select('*')->where('id_cliente')->findAll();
        
            // Resto del código
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle('ventas');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(195, 25, "Nota de Remision",100, 40, "C");
       $pdf->Ln();
        $pdf->Image(base_url() . '/img/logo.png', 10, 10, 50, 15, 'PNG'); // Corrige 'image' a 'Image'
       
        $pdf->Ln();      
$pdf->Rect(140, 10, 70, 20); 
$pdf->SetFont('Arial', 'B', 9);// Agregar texto dentro del cuadro usando MultiCell
$pdf->SetXY(140, 10); // Establecer la posición dentro del cuadro
$pdf->MultiCell(140, 7, "NIT :                                1093457864"); // Parámetros: ancho, alto, texto
$pdf->SetXY(140, 10);
$nota="NOTA REMISION:               000".$id_Venta;
$pdf->MultiCell(140, 20,$nota );
$pdf->SetXY(140, 17);


$pdf->Ln();
$pdf->Cell(5, 10); // Espacio en blanco para separar la imagen del texto
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(50, 5, "GRACIAS POR SU PREFERENCIA!!!", 0, 5, "C");
//datosclientes
$pdf->SetLineWidth(1);
$pdf->Cell(10, 15);
$pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
$pdf->Cell(5, 1);
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(2, 7, "CLIENTE", 0, 5, "C");
//registro




// Datos de usuarios (reemplaza esto con tus propios datos)
foreach ($datosVenta as $row) {
$pdf->Ln();
$pdf->Cell(2, 10);
$pdf->SetLineWidth(0.2);
$pdf->Rect(10, 47, 196, 17); 
$pdf->SetFont('Arial', 'B', 6);// Agregar texto dentro del cuadro usando MultiCell
$pdf->SetXY(10, 47); 
$pdf->MultiCell(10, 7, "NIT/CI : ");
$pdf->SetXY(10, 47); 
$pdf->MultiCell(15, 17, "NOMBRE :");
$pdf->SetXY(10, 47); 
$pdf->MultiCell(18, 27, "DIRECCION :");
$pdf->SetXY(90, 47); 
$pdf->MultiCell(18, 7, "USUARIO :");
$pdf->SetXY(90, 47); 
$pdf->MultiCell(50, 17, "CIUDAD : Cochabamba");
$pdf->SetXY(150, 47); 
$fechaHora = utf8_encode('FECHA Y HORA:    ' . $datosVenta['fechaRegistro']);
$pdf->MultiCell(50, 7, $fechaHora);// Agregar la fecha y hora usando MultiCell
$pdf->Ln();
}

// Dibujar un rectángulo
$pdf->Rect(10, 68, 196, 5); // Parámetros: x, y, ancho, alto

// Establecer la fuente y estilo
$pdf->SetFont('Arial', 'B', 7);

// Agregar una fila de encabezados dentro del rectángulo
$pdf->Cell(12, 19, 'Cantidad', 0, 0, 'L'); // Agregar una celda sin borde
$pdf->Cell(30, 19, 'Unidad', 0, 0, 'C');

$pdf->Cell(40, 19, 'Detalle', 0, 0, 'C');
$pdf->Cell(44, 19, 'Precio Unitario', 0, 0, 'C');
$pdf->Cell(38, 19, 'Importe', 0, 0, 'C');
$pdf->Ln(10); // Saltar a la siguiente línea
$contador=1;
// Agregar datos de ejemplo
$importe = 0;

// Recorrer la lista de productos y agregarlos al PDF
$pdf->SetFont('Arial', '', 7); // Establece el estilo de fuente para los datos
foreach ($detalleVenta as $row) {
    $pdf->Cell(12, 10, $row['cantidad'], 0, 0, 'C');
    $pdf->Cell(30, 10, 'piezas', 0, 0, 'C');
    $pdf->Cell(40, 10, $row['descripcion'], 0, 0, 'C');
    $pdf->Cell(40, 10, number_format($row['precio'], 2, '.', '.'),0 , 0, 'C');

    $subtotal = $row['precio'] * $row['cantidad'];
    $importe += $subtotal; // Suma al total
    $pdf->Cell(40, 10, number_format($subtotal, 2, '.', '.'), 0, 1, 'C');
    $pdf->Ln(-5);
}
$pdf->Ln();
$pdf->SetLineWidth(1);
$pdf->Cell(190, 15);
$pdf->SetX(200);

$pdf->Cell(100, 1);
$pdf->Ln();
$total= ($importe);
$pdf->SetY(150); // Establece la posición vertical al pie de la página
$pdf->SetX(140);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(195, 5, 'Total Bs: ' .$total, 2, '.', '.', 0, 0, 'C');
//$contador++;
 // Saltar a la siguiente línea


// Agregar más filas de datos si es necesario

// Output: Mostrar o guardar el PDF (depende de tu caso)



  

    
   






        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('compra_pdf.pdf', 'I');
    }
    

  
  
    public function generarInformePDF() {
        // Obtén los datos de las ventas, tal como lo hiciste en el controlador anterior
    
        // Carga la biblioteca TCPDF
       
        
            // Obtén las fechas de inicio y fin del formulario
            $fecha_inicio = $this->request->getVar('fecha_inicio');
            $fecha_fin = $this->request->getVar('fecha_fin');
        
            // Llama a un modelo o servicio para obtener las ventas dentro del rango de fechas
            $ventas = $this->ventas->obtenerVentasPorRangoDeFechas($fecha_inicio, $fecha_fin);
        
            // Luego, puedes utilizar los datos de $ventas para generar el informe PDF, como se mostró en el ejemplo anterior.
        
        
        // Crear un nuevo objeto TCPDF
        $pdf = new \FPDF('P', 'mm', 'letter');
    
        // Establece las propiedades del documento PDF
        $pdf->SetTitle('Informe de Ventas');
        $pdf->SetAuthor('Tu Nombre');
        $pdf->SetSubject('Informe de Ventas');
        $pdf->SetKeywords('Ventas, PDF, Informe');
    
        // Agrega una página
        $pdf->AddPage();
    
        // Genera el contenido del informe
        $html = '<h1>Informe de Ventas</h1>';
        // Agrega los datos de las ventas al informe
        $html .= '<table>';
        // Aquí puedes agregar los datos de ventas, recorriendo el array de ventas
        foreach ($ventas as $venta) {
            $html .= '<tr>';
            $html .= '<td>' . $venta['fechaRegistro'] . '</td>';
            $html .= '<td>' . $venta['id_cliente'] . '</td>';
            // Agrega más columnas según tus necesidades
            $html .= '</tr>';
        }
        $html .= '</table>';
    
        // Escribir el contenido en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Genera el PDF y muestra el informe
        $pdf->Output('InformeVentas.pdf', 'I');
    }
    
 

 

   
 


   
 
    

}





