<div id="layoutSienav_content">
<main>
<div class="container-fluid">
    
<?php $id_Venta = uniqid();?>

<form id="form_venta" name="form_venta" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>/ventas/guarda" autocomplete="off"> 
<input type="hidden" id="id_Venta" name="id_Venta" value="<?php echo $id_Venta; ?>"/>
   <h1 class="h3 mb-2 text-center"><?php echo $titulo ?></h1>

   <h4 class="h5 mb-2 text-gray-800">Datos cliente</h4>
  
   
                <div class="card">
                                <div class="card-body">  

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>NIT</label>
                                                    <input type="hidden" display= "flex" align-items=" center" class="form-control ui-autocomplete-input " id="id_cliente" name="id_cliente" value="1" >
                                                    <input display= "flex" align-items=" center" type="text" class="form-control ui-autocomplete-input  " id="clientes" name="clientes" placeholder=""  onkeyup="" autocomplete="off" onkeyup=""/>
                                                </div>
                                            </div>
                                           <div class="col-sm-3">   
                                           <br> <span class="input-group-addon">
                                                   <button flex=" 1" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal"><i class="fas fa-user"></i>+</button>  
                                              </span>
                                           </div>
                                         </div>
                                            <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Cliente</label>
                                                    <input type="text" name="resultadoLabel" class="form-control" id="resultadoLabel" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>nit</label>
                                                  
                                                    <input type="text" name="resultadoLabel2" id="resultadoLabel2" id="nit" class="form-control" disabled required>
                                                </div>
                                            </div>
                                          </div>
                                </div>
                            </div>
    <!--=====================================
        MODAL AGREGAR CLIENTE
    ======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
 <div class="modal-dialog">
 <div class="modal-content">
 <form method="POST" action="<?php echo base_url(); ?>/clientes/insertar" autocomplete="off">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:blueviolet; color:white" >
             <button type="btn btn-primary" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style=" text-align: center">Agregar cliente</h4>
          </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
           <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
                <div class="form-group">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                     <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Ingresar nombres" required>
                  </div>
               </div>
              <!-- ENTRADA PARA LOS APELLIDOS-->
            
           <div class="form-group">
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                   <input type="text" class="form-control input-lg" name="primerApellido" id="primerApellido" placeholder="Ingresar Apellido Paterno" required>
                 </div>
             </div>
                <!-- ENTRADA PARA LOS APELLIDOS-->
            
           <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                 <input type="text" class="form-control input-lg" name="segundoApellido" id="segundoApellido" placeholder="Ingresar Apellido Materno" required>
               </div>
           </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="ci_nit" id="ci_nit" placeholder="Ingresar documento" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Ingresar email" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">   
              <div class="input-group">             
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="celular" id="celular" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
               <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="direccion" id="direccion" placeholder="Ingresar dirección" required>
               </div>
            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO 
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div> -->

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

       <div class="modal-footer">
      <a href="<?php echo base_url(); ?>/clientes/insertar" type="button" class="btn btn-success">Guardar</a>
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
    </div>
  </div>
  </div>
  </div>
</form>
</div>
</div>
</div>

   <h4 class="h5 mb-2 text-gray-800">Datos venta</h4>
   <!--<div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <input type="hidden" id="id_Producto" name="id_Producto">
                                <label>codigo</label>
                              <input  type="text" class="form-control" id="codigo" name="codigo" placeholder=""  onkeyup= "agregarProducto(event,this.value,1, <?php echo $id_Venta;?>);" autofocus />
                            
                            <div class="col-sm-2">
                               <label for="codigo" id="resultado_error" style="color: red;" ></label>
                            </div>
                            </div>
                                                                                           
                            <div class=" col-12 col-sm-4">
              <label for=""><br>&nbsp;</label>
              <button id="agregar_producto" name="agregar_producto" type="button"
             class="btn btn-primary" onclick="agregarProducto(id_Producto.value,cantidad.value,'<?php echo $id_Venta;?>')">agregar producto</button>
          </div>                            
                        </div>
      </div>-->

                          
   <!-- DataTales Example -->
<!--<div class ="card">
  <div class="card-body">
  <div class="row">
          <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive tablaProductos" width="100%">
          <thead class="thead-dark">-->
                  <!--  <th>#</th>
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>total</th>
                    <th width="1%"></th>-->
                    <!--<tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
               </thead>       
                <tbody></tbody>
            </table>
       </div>
            <div class="row">
              <div class="col-12 col-sm-6 offset-md-6">
                <label style="font-weight:bold; font-size:30px ; text-align: center;">total bs </label>
                <input type="text" id="total" name="total" size="7" readonly="false" value="0.00" style="font-weight:bold;  font-size:30px ; text-align: center;"/>
                 <button type="button" id="completar_venta" class="btn btn-success">vender</button>
               </div>
             </div>   
</div>
</div>
</div>-->
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
      </div>
       <div class="row">
          <div class="col-12 col-sm-6 offset-md-6">
              <label style="font-weight:bold; font-size:30px ; text-align: center;">total bs </label>
               <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight:bold; font-size:30px ; text-align: center;" />
               <div>
                <button type="button" id="completar_venta" 
               class="btn btn-success">vender</button>     
               </div>
              

          </div>        

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




   //////////////////////////////////////////////////
   //nueva forma//////

  

	
/*function agregarProducto(id_Producto, cantidad, id_venta) {
    let enterKey=13;
    if(codigo != ''){  
     if(e.which== enterKey)
     {   
     if (id_Producto != null && id_Producto != 0 && cantidad > 0)
      {
          $.ajax
          ({
               url: '<?php echo base_url(); ?>/temporal/insertar/' + id_Producto + "/"+ cantidad + "/" + id_venta ,
               success: function (resultado) {
                    if (resultado == 0) 
                    {
                         // Maneja la situación si no se pudo agregar el producto
                         alert("No se pudo agregar el producto.");
                    } else 
                    {
                         var resultado = JSON.parse(resultado);
                         if (resultado.error == '') 
                         {
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
                             
                         } else 
                         {
                              // Maneja la situación si hubo un error al agregar el producto
                              alert("Error al agregar el producto: " + resultado.error);
                         }
                    }
               }
          });
     }
   }
}
}*/


$(document).ready(function() {
    $("#completar_venta").click(function() {
        let nfilas = $("#tablaProductos tr").length;

        if (nfilas < 2) {
            alert("Debes agregar al menos un producto.");
        } else {
            $("#form_venta").submit(); // Corrige el selector del formulario
        }
    });
});

</script>
   
  

