<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TemporalModel;
use App\Models\ProductosModel;
class Temporal extends BaseController
{
    protected $temporal,$productos,$nota;
    

    public function __construct()
    {
        $this->temporal = new TemporalModel();
        $this->productos = new ProductosModel();
      
    }

    public function insertar($id_Producto,$cantidad,$id_compra)
    {
       
        
            $error='';
            $productos =$this->productos->where('id_Producto',$id_Producto)->first();
            if($productos){
                $datosExiste=$this->temporal->porIdProductoCompra($id_Producto,$id_compra);
                if($datosExiste){
                    $cantidad=$datosExiste->cantidad+$cantidad;
                    $total=$cantidad*$datosExiste->precio;
                    $this->temporal->actualizarProductoCompra($id_Producto,$cantidad,$id_compra,$total);
                }else{
                    $total=$cantidad*$productos['precio_compraU'];
                    $this->temporal->save([
                        'nota' =>$id_compra,
                        'id_Producto'=>$id_Producto,
                        'codigo'=>$productos['codigo'],
                        'descripcion'=>$productos['descripcion'],
                        'precio'=>$productos['precio_compraU'],
                        'cantidad'=>$cantidad,
                        'total'=> $total,
                    ]);
                }
            }else{
                $error ="no existe el producto";
            }
            
         $res['datos']=$this->cargarProductos($id_compra);
         $res['total']=number_format($this->totalProductos($id_compra),2,'-',',');
          $res['error']=$error;
          echo json_encode($res);
       
      
        
    }
    
   public function cargarProductos ($id_compra)
    {
    $resultado=$this->temporal->porCompra($id_compra);
    $fila='';
    $numfila=0;
        foreach($resultado as $row) 
       {
         $numfila++;
         $fila.="<tr id_Producto='fila'".$numfila."'>";
         $fila.="<td>".$numfila."</td>";
         $fila.="<td>".$row['codigo']."</td>";
         $fila.="<td>".$row['descripcion']."</td>";
         $fila.="<td>".$row['precio']."</td>";
         $fila.="<td>".$row['cantidad']."</td>";
         $fila.="<td>".$row['total']."</td>";
         $fila.="<td><a onclick=\"eliminar producto(".$row['id_Producto'].",'".$id_compra."')\"
         class='borrar'><span class'fas fa-fw-fa-trash'></span></a></td>";
         $fila.="</tr>" ;

       }
    return $fila;
    }
    public function totalProductos ($id_compra)
    {
    $resultado=$this->temporal->porCompra($id_compra);
   
    $total=0;
        foreach($resultado as $row) 
       {
        $total+=$row['total'];

       }
    return $total;
    }


 
   
}

