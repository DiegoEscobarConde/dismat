
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php \Config\Services::validation()->listErrors();?>
      
<form method="POST" action="<?php echo base_url(); ?>/categorias/insertar" autocomplete="off">
<?php csrf_field();?>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">NOMBRE CATEGORIA</label>
              <input class ="form-control" id="nombre" name="nombre" type="text"
              autofocus require/>
          </div>  
     </div>
</div>
        <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 

</form>
</div>

<!-- DataTales Example -->

       
   

