
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
 <?php \Config\Services::validation()->listErrors();?>
      
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
              <input class ="form-control" id="descripcion" name="descripcion" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">cantidad</label>
              <input class ="form-control" id="cantidad" name="cantidad" type="number"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">precio venta</label>
              <input class ="form-control" id="precio_venta" name="precio_venta" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">precio compra</label>
              <input class ="form-control" id="precio_compra" name="precio_compra" type="text"
              autofocus require/>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">stock</label>
              <input class ="form-control" id="stock" name="stock" type="text"
              autofocus require/>
          </div>  
     </div>
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">inventario</label>
              <select class ="form-control" id="inventario" name="inventario">
               <option value="i">si</option>
               <option value="i">no</option>
              </select>
          </div>  
     </div>
</div>
<div class=" form-group">
     <div class="row">
          <div class=" col-12 col-sm-6">
              <label for="">Categoria</label>
              <select class="form-control" id="categoria" name="categoria" required >
               <option value=""> Seleccionar categoria</option>
              <option value="">junta soldable</option>
              <option value="">rosca</option>
              </select>
          </div>  
     </div>
</div>
        <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 

</form>
</div>

<!-- DataTales Example -->

       
   

