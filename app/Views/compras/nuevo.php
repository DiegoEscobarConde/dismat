

<?php $id_compra=uniqid();
?>
<div class="container-fluid">

 

      
<form method="POST" id="form_compra" name="form_compra" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">

<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-4">
               <input type="hidden" id="id_Producto" name="id_Producto"/>
               <input type="hidden" id="id_Compra" name="id_Compra" value="<?php echo $id_compra;?>"/>
              <label for="">codigo</label>
              <input class ="form-control" id="codigo" name="codigo" type="text" placeholder="codigo" onkeyup="buscarProducto(event,this,this.value)"
              autofocus/>
              <label for="codigo" id="resultado_error" style="color:red"></label>
          </div>  
   
    
          <div class=" col-12 col-sm-4">
              <label for="">descripcion</label>
              <input class ="form-control" id="descripcion" name="descripcion" type="text" 
             disabled/>
          </div>  
          
          <div class=" col-12 col-sm-4">
              <label for="">cantidad</label>
              <input class ="form-control" id="cantidad" name="cantidad" type="text" 
             />
          </div>   
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-4">
              <label for="">precio_compra</label>
              <input class ="form-control" id="precio_compraU" name="precio_compraU" type="text" 
              disabled />
          </div>  
     
    
          <div class=" col-12 col-sm-4">
              <label for="">totalPago</label>
              <input class ="form-control" id="subtotal" name="subtotal" type="text" 
             disabled/>
          </div>  
          
          <div class=" col-12 col-sm-4">
              <label for=""><br>&nbsp;</label>
             <button id="agregar_producto" name="agregar_producto" type="button"
             class="btn btn-primary" onclick="agregarProducto(id_Producto.value,cantidad.value,'<?php echo $id_compra;?>')">agregar producto</button>
          </div>   
     </div>
</div>
      <div class="row">
        
          <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive " width="100%">
               <thead class="thead-dark">
                    <th>#</th>
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>total</th>
                    <th width="1%"></th>
               </thead>
               <tbody></tbody>
          </table>
      </div>
       <div class="row">
          <div class="col-12 col-sm-6 offset-md-6">
              <label style="font-weight:bold; font-size:30px ; text-align: center;">total bs </label>
               <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight:bold; font-size:30px ; text-align: center;" />
               <button type="button" id="completar_compra" name="completar_compra" class="btn btn-success">comprar</button>

          </div>
      </div>
      
</form>
</div>
</main>
<script>


$(document).ready(function() {
    $("#completar_compra").click(function() {
        let nfilas = $("#tablaProductos tr").length;

        if (nfilas < 2) {
            alert("Debes agregar al menos un producto.");
        } else {
            $("#form_compra").submit(); // Corrige el selector del formulario
        }
    });
});


function buscarProducto(e, tagCodigo, codigo) {
     var enterkey = 13;
     if (codigo != '') {
          if (e.which == enterkey) {
               $.ajax({
                    url: '<?php echo base_url(); ?>/productos/buscarPorCodigo/' + codigo,
                    dataType: 'json',
                    success: function (resultado) {
                         if (resultado == 0) {
                              $(tagCodigo).val('');
                         } else {
                              $(tagCodigo).removeClass('has-error');
                              $("#resultado_error").html(resultado.error);
                              if (resultado.existe) {
                                   $("#id_Producto").val(resultado.datos.id_Producto);
                                   $("#descripcion").val(resultado.datos.descripcion);
                                   $("#cantidad").val(1);
                                   $("#precio_compraU").val(resultado.datos.precio_compraU);
                                   $("#subtotal").val(resultado.datos.precio_compraU);
                                   $("#cantidad").focus();
                              } else {
                                   $("#id_Producto").val('');
                                   $("#descripcion").val('');
                                   $("#cantidad").val('');
                                   $("#precio_compraU").val('');
                                   $("#subtotal").val('');
                              }
                         }
                    }
               });
          }
     }
}


function agregarProducto(id_Producto, cantidad, id_compra) {
    
     if (id_Producto != null && id_Producto != 0 && cantidad > 0) {
          $.ajax({
               url: "<?php echo base_url(); ?>/temporal/insertar/" + id_Producto + "/"+ cantidad + "/" + id_compra ,
               
               success: function (resultado) {
                    if (resultado == 0) {
                         // Maneja la situación si no se pudo agregar el producto
                    
                    } else {
                         var resultado = JSON.parse(resultado);
                         if (resultado.error == '') {
                              // Limpia la tabla de productos
                              $("#tablaProductos tbody").empty();
                              // Agrega los datos del producto al DataTable
                              $("#tablaProductos tbody").append(resultado.datos);
                              // Actualiza el total
                              $("#total").val(resultado.total);
                              // Limpia los campos
                              $("#id_Producto").val('');
                              $("#codigo").val('');
                              $("#descripcion").val('');
                              $("#cantidad").val('');
                              $("#precio_compraU").val('');
                              $("#subtotal").val('');
                             
                         } else {
                              // Maneja la situación si hubo un error al agregar el producto
                              alert("Error al agregar el producto: " + resultado.error);
                         }
                    }
               }
          });
     }
}
function eliminarProducto(id_Producto, id_compra) {
     if (id_Producto != null && id_Producto != 0 && cantidad > 0) {
          $.ajax({
               url: '<?php echo base_url(); ?>/temporal/eliminar/' + id_Producto + "/" + id_compra  + "/" + cantidad,
               success: function (resultado) {
                    if (resultado == 0) {
                         // Maneja la situación si no se pudo agregar el producto
                         $(tagCodigo).val('');
                         alert("No se pudo agregar el producto.");
                    } else {
                         var resultado = JSON.parse(resultado);
                        
                              // Limpia la tabla de productos
                              $("#tablaProductos tbody").empty();
                              // Agrega los datos del producto al DataTable
                              $("#tablaProductos tbody").append(resultado.datos);
                              // Actualiza el total
                              $("#total").val(resultado.total);
                              // Limpia los campos                       
                    }
               }
          });
     }
}


  

</script>

<!-- DataTales Example -->

       
   

