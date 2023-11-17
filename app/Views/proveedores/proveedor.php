<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
   
        <div>
            <p>
                <a href="<?php echo base_url(); ?>proveedores/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>proveedores/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

   <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                <thead>
                    <tr>
                    
                        <th  style="width:10px">id</th>
                        <th>Nombres</th>
                       
                        <th>email</th>
                        <th>celular</th>
                        <th>direccion</th>
                     
                      
                        <th>editar</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id_Proveedor']?></td>
                          <td><?php echo $dato['nombres']?></td>
                      
                          <td><?php echo $dato['email']?></td>
                          <td><?php echo $dato['celular']?></td>
                          <td><?php echo $dato['direccion']?></td>
                       
                          <td>   <a href="<?php echo base_url(). '/proveedores/editar/'.$dato['id_Proveedor'];?>" class="btn btn-warning"><i class="fas fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). '/proveedores/eliminar/'.$dato['id_Proveedor'];?>" title="Eliminar Registro" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>

    
      </div>
    </div>
  </div>
</div>

  

