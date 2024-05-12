
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>
      
<form method="POST" id="registroForm" action="<?php echo base_url(); ?>/proveedores/insertar" autocomplete="off">
<?php csrf_field();?>
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
          <div class=" col-12 col-sm-6">
              <label for="">direccion</label>
              <input class ="form-control" id="direccion" name="direccion" type="text"
              value="<?php echo set_value('direccion')?>"
              autofocus require/>
          </div> 
           
     </div>
</div>
<div class=" form-group">
    
     <div class="row">   
     <div class=" col-12 col-sm-6">
             
          
     </div>
</div>
</div>
<button type="submit" class="btn btn-success">Guardar</button>
    

        <a href="<?php echo base_url(); ?>/proveedores" class="btn btn-primary">Regresar</a>
        
 

</form>
</div>

<!-- DataTales Example -->

       
   

