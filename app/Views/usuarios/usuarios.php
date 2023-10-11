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

        <div class="table">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
               
                <thead>
                    <tr>
                    
                        <th  style="width:10px">id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>email</th>
                        <th>celular</th>
                        <th>usuario</th>
                        <th>rol</th>
                         <th>enviar</th>
                        <th>editar</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id']?></td>
                          <td><?php echo $dato['nombres']?></td>
                          <td><?php echo $dato['primerApellido']." ".$dato['segundoApellido']?> </td>
                          <td><?php echo $dato['email']?></td>
                          <td><?php echo $dato['celular']?></td>
                          <td><?php echo $dato['usuario']?></td>
                          <td><?php echo $dato['id_Empleado']?></td>
                         
                          
                          <td>   <a href="<?php echo base_url(). '/usuarios/email/'.$dato ['id'];?>"  class="btn btn-success"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
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
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
  

