<div id="layoutSienav_content">
<main>
<div class="container-fluid">
    
<?php $idVentaTmp = uniqid();?>

<form id="form_venta" name="form_venta" class="form-horizontal" method="POST" action="<?php base_url(); ?>/ventas/ventas" autocomplete="off">
   <h1 class="h3 mb-2 text-center"><?php echo $titulo ?></h1>
      <input type="hidden" id="id_Venta" name="id_Venta" value="'<?php echo $idVentaTmp; ?>'"/>
   <h4 class="h5 mb-2 text-gray-800">Datos cliente</h4>
   
                <div class="card">
                                <div class="card-body">                          
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>NIT</label>
                                                    <input type="hidden" display= "flex" align-items=" center" class="form-control ui-autocomplete-input " id="id_clientes" name="id_clientes" >
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
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary" >Guardar cliente</button>
       </div>
    </div>
  </div>
</form>
</div>
</div>
</div>

   <h4 class="h5 mb-2 text-gray-800">Datos venta</h4>
   <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                
                                <label>codigo</label>
                                <input type="hidden" display= "flex" align-items=" center" class="form-control ui-autocomplete-input " id="id_Producto" name="id_Producto" >
                                                    <input display= "flex" align-items=" center" type="text" class="form-control ui-autocomplete-input  " id="codigo" name="codigo" placeholder=""  onkeyup= "<?php echo $idVentaTmp;?>" autocomplete="off" onkeyup=""/>
                            
                            <div class="col-sm-2">
                               <label for="codigo" id="resultado_error" style="color: red;" ></label>
                            </div>
                            </div>
                                                                                           
                            <div class=" col-12 col-sm-4">
              <label for=""><br>&nbsp;</label>
             <button id="agregar_producto" name="agregar_producto" type="button"
             class="btn btn-primary" onclick="agregarProducto(id_Producto.value,cantidad.value,'<?php echo $idVentaTmp;?>')">agregar producto</button>
          </div>                            
                        </div>
      </div>

                          
   <!-- DataTales Example -->
<div class ="card">
  <div class="card-body">
  <div class="row">
          <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive tablaProductos" width="100%">
               <thead class="thead-dark">
                    <tr>
                        <th>codigo</th>
                        <th>descripcion</th>
                        <th>cantidad</th>
                        
                        <th>precio unitario</th>
                        <th>total</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                                            <td id="codigo"></td>
                                            <td  id="descripcion"></td>
                                            <td><input type="text" name="cantidad" id="cantidad"value="0" min="1" disabled></td>
                                          
                                            <td id="precio_ventaU" class="textright">0.00</td>
                                            <td id="total" class="txtright">0.00</td>
                                            
                                           
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
</div>





                <!-- /.container-fluid -->

</form>
</div>
</main>
</div>


 
<script>
    
   
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

        $("#id_clientes").val(ui.item.id);
        $("#clientes").val(ui.item.value);
    }
});
$("#modal").ajax({
    type: 'POST',
    url: 'clientes/insertar', // Reemplaza 'URL_DEL_CONTROLADOR' con la URL real
    data: datos, // Tus datos para insertar el cliente
    dataType: 'json',
    success: function (data) {
        // Actualiza los campos "Cliente" y "NIT" con la información del cliente recién registrado
        $('#resultadoLabel').val(data.nombre + ' ' + data.primerApellido);
        $('#resultadoLabel2, #nit').val('NIT: ' + data.nit);
    }
});

    $("#codigo").autocomplete({
        source: "<?php echo base_url(); ?>/productos/autocompleteData1",
        minLength : 2,
        select:function (event,ui){
            event.preventDefault();
            var codigo = ui.item.value;
            $("#id_Producto").val(ui.item.id);
            $("#codigo").val(ui.item.value);
           
            }
  
           });//ojo
           function buscarProducto(e, tagCodigo, codigo) {
     var enterkey = 13;
     if (codigo != '') {
          if (e.which == enterkey) {
               $.ajax({
                    url: '<?php echo base_url(); ?>/productos/buscarPorCodigo1/' + codigo,
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
                                   $("#total").val(resultado.datos.precio_ventaU);
                                   $("#cantidad").focus();
                              } else {
                                   $("#id_Producto").val('');
                                   $("#descripcion").val('');
                                   $("#cantidad").val('');
                                   $("#precio_ventaU").val('');
                                   $("#total").val('');
                              }
                         }
                    }
               });
          }
     }
}


function agregarProducto(id_Producto, cantidad, id_venta) {
     if (id_Producto != null && id_Producto != 0 && cantidad > 0) {
          $.ajax({
               url: '<?php echo base_url(); ?>/temporal/insertar/' + id_Producto + "/"+ cantidad + "/" + id_venta ,
               success: function (resultado) {
                    if (resultado == 0) {
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
                              $("#total").val('');
                             
                         } else {
                              // Maneja la situación si hubo un error al agregar el producto
                              alert("Error al agregar el producto: " + resultado.error);
                         }
                    }
               }
          });
     }
}

   


 
  



	
            

</script>
   
  

