
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>  
<form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id'];?>" name="id"/>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">Nombres</label>
              <input class ="form-control" id="nombres" name="nombres" type="text"
              value="<?php echo set_value('nombres')?>"
              autofocus require/>
          </div>  
           
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">Apellido Paterno</label>
              <input class ="form-control" id="primerApellido" name="primerApellido" type="text"
              value="<?php echo set_value('primerApellido')?>"
              autofocus require/>
          </div> 
          <div class=" col-12 col-sm-6">
              <label for="">Apellido Materno</label>
              <input class ="form-control" id="segundoApellido" name="segundoApellido" type="text"
              value="<?php echo set_value('segundoApellido')?>"
              autofocus require/>
          </div>  
          <div class=" col-12 col-sm-6">
              <label for="">Email</label>
              <input class ="form-control" id="email" name="email" type="text"
              value="<?php echo set_value('email')?>"
              autofocus require/>
          </div>  
          <div class=" col-12 col-sm-6">
              <label for="">Celular</label>
              <input class ="form-control" id="celular" name="celular" type="text"
              value="<?php echo set_value('celular')?>"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
    
    
</div> 

<div class=" form-group">
     <div class=" col-12 col-sm-6">
     <div class="row">
              <label for="exampleInputEmail1">Roles</label>
                    <select class="form-control" id="id_Empleado" name="id_Empleado">
                        <option value="" >Seleccionar rol</option>
                        <?php foreach($empleados as $empleado){ ?>
                            <option value="<?php echo $empleado['id_Empleado']; ?>">
                            <?php echo $empleado['rol']; ?></option>
                        <?php }?>
                     </select>
     </div>
    
    
 </div>
 
 </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Regresar</a>
     
 
</div>
</div>
</form>

