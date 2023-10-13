
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>
      
<form method="POST" action="<?php echo base_url(); ?>/usuarios/enviar" autocomplete="off" id="form_enviar_email">
<?php csrf_field();?>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">correo electronico</label>
              <input class ="form-control" id="email" name="email" type="email"
              value="<?php echo set_value('email')?>"
              autofocus require/>
          </div>  
           
     </div>
</div>
<div class=" form-group">
     <div class="row">
     <div class=" col-12 col-sm-6">
              <label for="">asunto</label>
              <input class ="form-control" id="asunto" name="asunto" type="text"
              value="<?php echo set_value('')?>"
              autofocus require/>
          </div> 
          <div class=" col-12 col-sm-6">
              <label for="">mensaje</label>
              <input class ="form-control" id="mensaje" name="mensaje" type="text"
              value="<?php echo set_value('')?>"
              autofocus require/>
          </div>  
         
</div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Regresar</a>
        
 

</form>
</div>

<!-- DataTales Example -->

       
   

