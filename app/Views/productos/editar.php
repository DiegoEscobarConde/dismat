
<div class="container-fluid">

 <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo; ?></h1>
      
<form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">
<input type="hidden" value="<?php echo $datos['id_Producto'];?>" name="id_Producto"/>
<div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">codigo</label>
                   <input class ="form-control" id="codigo" name="codigo" value="<?php echo $datos['codigo'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">descripcion</label>
                   <input class ="form-control" id="descripcion" name="descripcion" value="<?php echo $datos['descripcion'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">precio venta</label>
                   <input class ="form-control" id="precio_venta" name="precio_venta" value="<?php echo $datos['precio_venta'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">precio_venta</label>
                   <input class ="form-control" id="precio_compra" name="precio_compra" value="<?php echo $datos['precio_compra'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">stock</label>
                   <input class ="form-control" id="tock" name="stock" value="<?php echo $datos['stock'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">inventario</label>
                   <input class ="form-control" id="inventario" name="inventario" value="<?php echo $datos['inventario'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              <div class=" col-12 col-sm-6">
                   <label for="">categoria</label>
                   <input class ="form-control" id="categoria" name="categoria" value="categoria"
                   autofocus require/>
              </div>
            
        </div>
     </div>


        <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>
</form>

