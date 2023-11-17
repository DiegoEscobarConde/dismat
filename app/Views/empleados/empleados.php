<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>empleados/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>empleados/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

        <div class="table">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
               
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id_Empleado']?></td>
                          <td><?php echo $dato['rol']?></td>
                          <td>   <a href="<?php echo base_url(). 'empleados/detalles/'?>" class="btn btn-warning"><i class="fas fa-pen-nib"></i></a></td>
                       
                          <td>   <a href="<?php echo base_url(). 'empleados/editar/'.$dato['id_Empleado'];?>" class="btn btn-warning"><i class="fas fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). 'empleados/eliminar/'.$dato['id_Empleado'];?>"  class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>


  

