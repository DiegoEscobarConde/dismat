
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
      
<form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id_cliente'];?>" name="id_cliente"/>
<div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">nombre</label>
                   <input class ="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">apellido paterno</label>
                   <input class ="form-control" id="primerApellido" name="primerApellido" value="<?php echo $datos['primerApellido'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">segundoApellido</label>
                   <input class ="form-control" id="segundoApellido" name="segundoApellido" value="<?php echo $datos['segundoApellido'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">precio_venta</label>
                   <input class ="form-control" id="ci_nit" name="ci_nit" value="<?php echo $datos['ci_nit'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">email</label>
                   <input class ="form-control" id="email" name="email" value="<?php echo $datos['email'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">direccion</label>
                   <input class ="form-control" id="direccion" name="direccion" value="<?php echo $datos['direccion'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
    


        <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>
</form>

