
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>
      
<form method="POST" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">
<?php csrf_field();?>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">CODIGO</label>
              <input class ="form-control" id="codigo" name="codigo" type="number"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">DESCRIPCION</label>
              <input class ="form-control" id="descripcion" name="descripcion" type="text" value="<?php echo set_value('descripcion') ?>"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">CANTIDAD</label>
              <input class ="form-control" id="cantidad" name="cantidad" type="number"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">PRECIO VENTA</label>
              <input class ="form-control" id="precio_venta" name="precio_venta" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">PRECIO COMPRA</label>
              <input class ="form-control" id="precio_compra" name="precio_compra" type="text"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">STOCK</label>
              <input class ="form-control" id="stock" name="stock" type="text"
              autofocus require/>
          </div>  
     </div>
   
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
          <label for="exampleInputEmail1">categorias</label>
                    <select class="form-control" id="id_categoria" name="id_categoria">
                        <option value="" ></option>
                        <?php foreach($categorias as $categoria){ ?>
                            <option value="<?php echo $categoria['id_categoria']; ?>">
                            <?php echo $categoria['nombre']; ?></option>
                        <?php }?>

                    </select>
          </div>  
     </div>
</div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
       
 

</form>
</div>

<!-- DataTales Example -->

       
   

