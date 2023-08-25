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
                        <th>Nombre usuario</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
             
              
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id']?></td>
                          <td><?php echo $dato['nombreUsuario']?></td>
                          <td><?php echo $dato['nombre']?></td>
                          <td>   <a href="<?php echo base_url(). '/usuarios/editar/'.$dato['id'];?>" class="btn btn-warning"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                          <td><a href="#" data-href="<?php echo base_url(). '/usuarios/eliminar/'.$dato['id'];?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar Registro" class="btn btn-danger"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>

     <div class="modal" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
         <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">eliminar</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
     </div>
      <div class="modal-body">
        <p>desea eliminar registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a  class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>
  

