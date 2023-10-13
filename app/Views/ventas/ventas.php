<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
    
<?php $idVentaTmp = uniqid();?>
<br>
<form id="form-venta" name="form_venta" class="form-horizontal" method="POST" action="<?php base_url(); ?>/ventas/guarda" autocomplete="off">
   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
      <input type="hidden" id="id_Venta" name="id_Venta" value="<?php echo $idVentaTmp; ?>"/>
    
    <div class="form-group" >
      <div class="row"  >
                <div class="col-sm-3">  
                     <label>CI -NIT</label>
                    <input type="hidden" display= "flex" align-items=" center" class="form-control ui-autocomplete-input " id="id_clientes" name="id_clientes" >
                    <input display= "flex" align-items=" center" type="text" class="form-control ui-autocomplete-input  " id="clientes" name="clientes" placeholder=""  onkeyup="" autocomplete="off" />
                 </div>
                 <div class="col-sm-5"> 
                     <br><label style= " font-size:20px; font-weight:bold;" flex=" 1" margin-right=" 10px" id="resultadoLabel" id="nombre" id="primerApellido" ></label>
                     <input type="hidden" id="resultadoLabel" id="nombre" disabled>
                 </div>
                 <div class="col-sm-3">   
                    <br> <span class="input-group-addon">
                        <button flex=" 1" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal"> Nuevo Cliente</button>  
                        </span>
                </div>
        </div>     
     </div>
                       <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <input type="hidden" id="id_Producto" name="id_Producto"/>
                                <label>codigo</label>
                                <input class="form-control" id="codigo" name="codigo" type="text" placeholder="aqui producto" onkeyup="  agregarProducto(event,this.value,1,<?php echo $idVentaTmp;?> );"/>
                            </div>
                            <div class="col-sm-2">
                               <label for="codigo" id="resultado_error" style="color: red;" ></label>
                            </div>
                          
                             
                                 
                                
                            <div class="col-12 col-sm-4">
                               <br><span class="input-group-addon">
                                 <button id="agregarProducto" name="agregarProducto" type="submit" class="btn btn-primary"  onclick="agregarProducto(id_Producto.value,cantidad.value,'<?php echo $idVentaTmp;?>');">Agregar producto</button>
                                 </span>
                             </div>
                           
                            
                        </div>
                       </div>


   <!-- DataTales Example -->

   <div class="row">
   <div class="table">
            <table class="display" id="tabla_Productos" width="100%" cellspacing="0" text="center"> 
                <thead class="thead-dark">
                    <tr>
                        <th>codigo</th>
                        <th>descripcion</th>
                        <th>piezas</th>
                        <th>descuento</th>
                        <th>precio unitario</th>
                        <th>total</th>
                        <th width="1%"></th>
                    </tr>
                </thead>         
                <tbody>
                    </tbody>
            </table>
            </div>
        <div class ="row">
            <div class="col-12 col-sm-6 offset-md-10">
                <label style="font-weight: bold; font-size: 15px; text-align:center;">total bs</label>
                <input type="text" id="total" name="total" size="4" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align:center;"/>
                </div>
                <div>
               
                 <div class="row">
                   
                <button type="button" id="completa_venta" class="btn btn-success">completar venta</button>
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

            </div>
  
          </div>

        </div> -->

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <!--<a href="<?php echo base_url(); ?>clientes" class="btn btn-info">Agregar</a>-->


          <button type="submit" class="btn btn-primary" id="resultadoLabel">Guardar cliente</button>

        </div>

 


    </div>

  </div>
</form>

</div>

</main>

  <!--<script>
 
  //CAMPO DE CLIENTES ----------------------------------------------
  $("#clientes").on("input", function() {
                var clientes = $(this).val();

                // Realizar una solicitud AJAX al controlador para buscar datos
                $.ajax({
                    method: "POST",
                    url: '<?php echo base_url(); ?>/clientes/buscar',
                    data: {
                        clientes: clientes
                    },
                    dataType: "json",
                    success: function(data) {
                        // Construir la tabla de resultados
                        var table = "<table id='tCliente' ><thead><tr><th>ID</th><th>Nombre</th></tr></thead><tbody>";
                        $.each(data, function(index, row) {
                            table += "<tr><td id='idCliente'>" + row.id_cliente + "</td><td>" + row.ci_nit + "</td></tr>";
                        });
                        table += "</tbody></table>";

                        // Mostrar la tabla de resultados
                        $("#clientes").html(table);
                    },
                    error: function() {
                        // Manejar errores de la solicitud AJAX
                        alert("Error en la búsqueda.");
                    }
                    // Obtener el término de búsqueda ingresado por el usuario

                });
            });

        

</script>-->
<script>
     
    $("#clientes").autocomplete({
        source: "<?php echo base_url(); ?>/clientes/autocompleteData",
        minLength :2,
        select:function (event,ui){
            event.preventDefault();
            var nit = "NIT: " + ui.item.value;
           var cliente = "CLIENTE: " + ui.item.nombre;
            $("#id_clientes").val(ui.item.id);
            $("#resultadoLabel").text("NIT: " + ui.item.value+" "+"CLIENTE: " + ui.item.nombre+" "+ ui.item.primerApellido);
            $("#clientes").val(ui.item.value);

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
            });
   /* function agregarProducto(id_Producto,cantidad,id_Venta){
        var enterkey =13;
                if(codigo!=''){ 
                    if(e.which == enterkey){ 
               if(id_Producto !=null && id_Producto != 0 && cantidad > 0){
                   $.ajax({
                    url: '<?php echo base_url(); ?>/detalleventa/insertar'+id_Producto +"/"+cantidad+"/"+id_Venta ,
                   
                    success:function(resultado){
                      if(resultado==0){
                      

                       }else{   
                        var resultado= JSON.parse(resultado); 
                         $(resultado.error == '')
                             if(resultado.console.error == ''){
                            $("#tablaProducto tbody").empty();
                            $("#tablaProducto tbody").append(resultado.datos);
                            $("#total").val(resultado.total);
                            $("#id_Producto").val('');
                            $("#codigo").val('');
                            $("#descripcion").val('');
                            $("#cantidad").focus('');
                            $("#precio_compra").val('');
                            $("#subtotal").val('');
                        }           
                    }
                }
               });
            }
        }
    }
 }*/
    function eliminarProducto(id_Produto,id_Venta){
        $.ajax({
            url:'<?php echo base_url(); ?>/detalleventa/eliminar' +id_Produto+"/"+id_Venta,
            success: function (resultao){
                if(resultado== 0 ){
                    $(tagCodigo).val('');
                }else{
                    var resultado =JSON.parse(reultado);
                    ('#tabla_Productos tbody').empty();
                    $('#tabla_Productos tbody').append(resultados.datos);
                    $('#total').val (resultado.total);
                }
            }
        });
        function agregarProducto($id_Producto, $cantidad, $id_Venta) {
    var enterkey = 13;

    if (e.which == enterkey) {
        if ($id_Producto != null && $id_Producto != 0 && $cantidad > 0) {
            $.ajax({
                url: '<?php echo base_url(); ?>/detalleventa/insertar/' + $id_Producto + '/' + $cantidad + '/' + $id_Venta,
                success: function ($resultado) {
                    if ($resultado == 0) {
                        // Handle the case where the result is 0
                    } else {
                        var $resultado = JSON.parse($resultado);
                        if ($resultado.error == '') {
                            $("#tabla_Productos tbody").empty();
                            $("#tabla_Productos tbody").append($resultado.datos);
                            $("#total").val($resultado.total);
                            $("#id_Producto").val('');
                            $("#codigo").val('');
                            $("#descripcion").val('');
                            $("#cantidad").focus();
                            $("#precio_compra").val('');
                            $("#subtotal").val('');
                        } else {
                            console.error($resultado.error);
                        }
                    }
                }
            });
        }
    }
}

    }


        
            

</script>
   
  

