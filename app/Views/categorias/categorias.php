<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>categorias/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>categorias/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre Categoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id_categoria']?></td>
                          <td><?php echo $dato['nombre']?></td>
                          <td>   <a href="<?php echo base_url(). '/categorias/editar/'.$dato['id_categoria'];?>" class="btn btn-warning"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). '/categorias/eliminar/'.$dato['id_categoria'];?>"  class="btn btn-danger"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>


  

