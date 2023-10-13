<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
                <a href="<?php echo base_url(); ?>productos/nuevo" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>productos/eliminados" class="btn btn-warning">Eliminados</a>
            </p>
        </div>


   <!-- DataTales Example -->

   <div class="table">
            <table class="table table-sm" id="dataTable" width="100%" cellspacing="0" text="center"> 
                <thead>
                    <tr>
                        <th>id</th>
                        <th>codigo</th>
                        <th>descripcion</th>
                        <th>cantidad</th>
                        <th>precio</th>
                        <th>stock</th>
                        <th>categoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>         
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['id_Producto']?></td>
                          <td><?php echo $dato['codigo']?></td>
                          <td><?php echo $dato['descripcion']?></td>
                          <td><?php echo $dato['cantidad']?></td>
                          <td><?php echo $dato['precio_venta']?></td>
                          <td><?php echo $dato['precio_compra']?></td>
                          <td><?php echo $dato['stock']?></td>
                        

                          <td>   <a href="<?php echo base_url(). '/productos/editar/'.$dato['id_Producto'];?>" class="btn btn-warning"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                          <td><a href="<?php echo base_url(). '/productos/eliminar/'.$dato['id_Producto'];?>"  class="btn btn-danger"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                       
                       
                        </tr>

                    <?php }?>
                    </tbody>
            </table>
        </div>
</div>

   
  

