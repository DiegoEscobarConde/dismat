
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php \Config\Services::validation()->listErrors();?>
      
<form method="POST" action="<?php echo base_url(); ?>/usuarios/insertar" autocomplete="off">
<?php csrf_field();?>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">usuario</label>
              <input class ="form-control" id="nombreUsuario" name="nombreUsuario" type="text"
              value="<?php echo set_value('nombreUsuario')?>"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">nombre</label>
              <input class ="form-control" id="nombre" name="nombre" type="text"
              value="<?php echo set_value('nombre')?>"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">contraseña</label>
              <input class ="form-control" id="password" name="password" type="password"
              value="<?php echo set_value('password')?>"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">repite</label>
              <input class ="form-control" id="password" name="password" type="password"
              value="<?php echo set_value('password')?>"
              autofocus require/>
          </div>  
     </div>
</div>
        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 

</form>
</div>

<!-- DataTales Example -->

       
   

