
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
                   <input class ="form-control" id="precio_ventaU" name="precio_ventaU" value="<?php echo $datos['precio_ventaU'];?>"
                   autofocus require/>
              </div>
              <div class=" col-12 col-sm-6">
                   <label for="">Precio Compra</label>
                   <input class ="form-control" id="precio_compraU" name="precio_compraU" value="<?php echo $datos['precio_compraU'];?>"
                   autofocus require/>
              </div>
        </div>
     </div>
     <div class=" form-group">
         <div class="row">
              
        
        </div>
     </div>
     <div class=" form-group">
     <div class=" col-12 col-sm-6">
     <div class="row">
              <label for="exampleInputEmail1">categorias</label>
                    <select class="form-control" id="id_categoria" name="id_categoria">
                        <option value="" ></option>
                        <?php foreach($categorias as $categoria){ ?>
                            <option value="<?php echo $categoria['id_categoria'];?>">
                            <?php echo $categoria['nombre'];?></option>
                        <?php }?>
                     </select>
     </div>
     </div>
     </div>
     

        <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
 
</div>

</form>


