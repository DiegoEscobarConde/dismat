
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>
      
<form method="POST" action="<?php echo base_url(); ?>/clientes/insertar" autocomplete="off">
<?php csrf_field();?>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">nombre</label>
              <input class ="form-control" id="nombre" name="nombre" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">apellido paterno</label>
              <input class ="form-control" id="primerApellido" name="primerApellido" type="text" value="<?php echo set_value('primerApellido') ?>"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">apellido materno</label>
              <input class ="form-control" id="segundoApellido" name="segundoApellido" type="text" value="<?php echo set_value('segundoApellido') ?>"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">CI-NIT</label>
              <input class ="form-control" id="ci_nit" name="ci_nit" type="text"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">celular</label>
              <input class ="form-control" id="celular" name="celular" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">email</label>
              <input class ="form-control" id="email" name="email" type="text"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">direccion</label>
              <input class ="form-control" id="direccion" name="direccion" type="text"
              autofocus require/>
          </div>  
     </div>
     </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary">Regresar</a>
       
 

</form>
</div>
</main>
<!-- DataTales Example -->

       
   

