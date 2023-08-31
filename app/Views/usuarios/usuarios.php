<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>usuarios/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>usuarios/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre Completo</th>
                        <th>email</th>
                        <th>celular</th>
                        <th>usuario</th>
                         <th>contraseña</th>
                       
                        <th>editar</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id']?></td>
                          <td><?php echo $dato['nombres']." ".$dato['primerApellido']." ".$dato['segundoApellido']?>
                          </td>
                         
                          <td><?php echo $dato['email']?></td>
                          <td><?php echo $dato['celular']?></td>
                          <td><?php echo $dato['usuario']?></td>
                          <td><?php echo $dato['password']?></td>
                          
                         
                          <td>   <a href="<?php echo base_url(). '/usuarios/editar/'.$dato['id'];?>" class="btn btn-warning"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). '/usuarios/eliminar/'.$dato['id'];?>" title="Eliminar Registro" class="btn btn-danger"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                       
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
  

