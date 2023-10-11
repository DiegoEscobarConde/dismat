
<div class="container-fluid">

 
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?> 
<form method="POST" action="<?php echo base_url(); ?>/compras/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id_categoria'];?>" name="id_categoria"/>
<div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">NOMBRE CATEGORIA</label>
                   <input class ="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'];?>"
                   autofocus required/>
              </div>

          
        </div>
     </div>


        <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>
</form>

