
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
      
<form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id_categoria'];?>" name="id_categoria"/>
<div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">NOMBRE CATEGORIA</label>
                   <input class ="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'];?>"
                   autofocus require/>
              </div>

          
        </div>
     </div>


        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>
</form>

