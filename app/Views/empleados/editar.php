
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?> 
<form method="POST" action="<?php echo base_url(); ?>/empleados/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id_Empleado'];?>" name="id_categoria"/>
<div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">editar rol</label>
                   <input class ="form-control" id="rol" name="rol" value="<?php echo $datos['rol'];?>"
                   autofocus required/>
              </div>

          
        </div>
     </div>


        <a href="<?php echo base_url(); ?>/empleados" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>
</form>

