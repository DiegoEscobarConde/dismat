<div id="layoutSienav_content">
<main>
<div class="container-fluid">
    
<?php $id_Venta = uniqid();?>

<?php $total= uniqid();?>
<form id="form_venta" name="form_venta" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>/ventas/guarda" autocomplete="off"> 
<input type="hidden" id="id_Venta" name="id_Venta" value="<?php echo $id_Venta; ?>"/>
<input type="hidden" name="id_cliente" id="id_cliente" value="" />



   <h1 class="h3 mb-2 text-center"><?php echo $titulo ?></h1>

   <h4 class="h5 mb-2 text-gray-800">Datos cliente</h4>
  
   
                <div class="card">
                                <div class="card-body">  

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>NIT</label>
                                                
                                                    <input type="hidden" display= "flex" align-items=" center" class="form-control" id="id_cliente" name="id_cliente" >
                                                    <input display= "flex" align-items=" center" type="text" class="form-control ui-autocomplete-input  " id="clientes" name="clientes" placeholder=""  onkeyup="" autocomplete="off" onkeyup=""/>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">   
                                             <br> 
                                         <span class="input-group-addon">
                                                 <a href="<?php echo base_url(); ?>/clientes/nuevo" class="btn btn-danger">
                                                  <i class="fas fa-user"></i>+
                                                     </a>  
                                            </span>
                                              </div>

                                         </div>
                                         <div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label>Cliente</label>
            <?php if (!empty($nuevoCliente)) : ?>
                <input type="text" name="resultadoLabel" class="form-control" id="resultadoLabel" disabled value="<?= $nuevoCliente['nombre'] ?>" required/>
            <?php else : ?>
                <!-- Código original si no hay nuevo cliente -->
                <input type="text" name="resultadoLabel" class="form-control" id="resultadoLabel" disabled required/>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label>NIT</label>
            <?php if (!empty($nuevoCliente)) : ?>
                <input type="text" name="resultadoLabel2" id="resultadoLabel2" id="nit" class="form-control" disabled value="<?= $nuevoCliente['nit'] ?>" required/>
            <?php else : ?>
                <!-- Código original si no hay nuevo cliente -->
                <input type="text" name="resultadoLabel2" id="resultadoLabel2" id="nit" class="form-control" disabled required/>
            <?php endif; ?>
        </div>
    </div>
</div>

                                </div>
                            </div>

   <h4 class="h5 mb-2 text-gray-800">Datos venta</h4>
 
                <!-- /.container-fluid -->
 <div class="card">
   <div class="card-body">               
     <div class=" form-group">
      <div class="row">
          <div class=" col-12 col-sm-4">
               <input type="hidden" id="id_Producto" name="id_Producto"/>             
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
              <label for="">precio_ventaU</label>
              <input class ="form-control" id="precio_ventaU" name="precio_ventaU" type="text" 
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
             class="btn btn-primary" onclick="agregarProducto(id_Producto.value,cantidad.value,'<?php echo $id_Venta;?>')">agregar producto</button>
          </div>   
     </div>
</div>

      <div class="row">
          <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive tablaProductos" width="100%">
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
                 <label style="font-weight:bold; font-size:30px ; text-align: center;">total bs </label><input type="hidden" name="totalP" id="totalP" />
                  <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight:bold; font-size:30px ; text-align: center;" />
               <div>
                  <button type="button" id="completar_venta" 
                   class="btn btn-success">vender</button>     
               </div>
          </div>        
       </div>		
     </div>
 </div>
    
</form>
</div>
</main>
</div>


 
<script>

  
$(function(){ 
    $("#clientes").autocomplete({
    source: "<?php echo base_url(); ?>/clientes/autocompleteData",
    minLength: 2,
    select: function (event, ui) {
        event.preventDefault();
        var nit =  ui.item.value;
        var cliente =ui.item.primerApellido +' '+ ui.item.nombre;

        // Asigna el valor del cliente al campo "Cliente"
        $("#resultadoLabel").val(cliente);

        // Asigna el valor del NIT a los campos "nit" y "resultadoLabel2"
        $("#resultadoLabel2, #nit").val(nit);

        $("#id_cliente").val(ui.item.id);
        $("#clientes").val(ui.item.value);
    }
});
});



// Evento que se dispara cuando se presiona Enter en el campo de código


$(function(){  
    $("#codigo").autocomplete({
        source: "<?php echo base_url(); ?>/productos/autocompleteData1",
        minLength : 2,
        select: function (event,ui){
            event.preventDefault();
            var codigo = ui.item.value;
            $("#id_Producto").val(ui.item.id);
            $("#codigo").val(ui.item.value);
            setTimeout(
                function(){
                    
                }
            )
           
               }
  
           });
          });
           


           
           //ojo
  
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
                                   $("#precio_ventaU").val(resultado.datos.precio_ventaU);
                                   $("#subtotal").val(resultado.datos.precio_ventaU);
                                   $("#cantidad").focus();
                              } else {
                                   $("#id_Producto").val('');
                                   $("#descripcion").val('');
                                   $("#cantidad").val('');
                                   $("#precio_ventaU").val('');
                                   $("#subtotal").val('');
                              }
                         }
                    }
               });
          }
     }
}
function agregarProducto(id_Producto, cantidad, id_Venta) {
     if (id_Producto != null && id_Producto != 0 && cantidad > 0) {
          $.ajax({
               url: '<?php echo base_url(); ?>/temporal/insertar2/' + id_Producto + "/"+ cantidad + "/" + id_Venta ,
              
               success: function (resultado) {
                    if (resultado == 0) {
                          console.log(resultado);
                         // Maneja la situación si no se pudo agregar el producto
                         alert("No se pudo agregar el producto.");
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
                              $("#precio_ventaU").val('');
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
function eliminarProducto(id_Producto, id_Venta) {
    $.ajax({
        url: '<?php echo base_url(); ?>/temporal/eliminar/' + id_Producto + "/" + id_Venta,
        dataType: 'json',
        success: function (resultado) {
            try {
                var resultadoJSON = JSON.parse(resultado);
                // Limpia la tabla de productos
                $("#tablaProductos tbody").empty();
                // Agrega los datos del producto al DataTable
                $("#tablaProductos tbody").append(resultadoJSON.datos);
                // Actualiza el total
                $("#total").val(resultadoJSON.total);
                // Limpia los campos
            } catch (error) {
                console.error("Error al analizar la respuesta JSON: " + error);
                // Aquí puedes manejar el error de análisis JSON si es necesario
            }
        }
    });
}



$(document).ready(function() {
    $("#completar_venta").click(function() {
        let nfilas = $("#tablaProductos tr").length;

        if (nfilas < 2) {
            alert("Debes agregar al menos un producto.");
        } else {
            $("#form_venta").submit(); // Corrige el selector del formulario
            alert("venta realizada con exito.");
        }
    });
});

</script>
   
  

