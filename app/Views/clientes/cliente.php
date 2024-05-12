<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
            <a href="<?php echo base_url(); ?>clientes/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>clientes/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

   <div class="table">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0" text="center"> 
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombres</th>
                        <th>apellidos</th>
                        <th>CI-NIT</th>
                        <th>celular</th>
                        <th>email</th>
                        <th>direccion</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>         
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id_cliente']?></td>
                          <td><?php echo $dato['nombre']?></td>
                          <td><?php echo $dato['primerApellido']." ".$dato['segundoApellido']?></td>
                          <td><?php echo $dato['ci_nit']?></td>
                          <td><?php echo $dato['celular']?></td>
                          <td><?php echo $dato['email']?></td>
                          <td><?php echo $dato['direccion']?></td>
                        

                          <td>   <a href="<?php echo base_url(). '/clientes/editar/'.$dato['id_cliente'];?>" class="btn btn-warning"><i class="fas fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). '/clientes/eliminar/'.$dato['id_cliente'];?>"  class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>

   
  

