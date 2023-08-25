
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
        <div>
            <p>
                
                <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">productos</a>
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
                      
                    </tr>
                </thead>
              
                </tbody>
                <?php foreach($datos as $dato){?>
                    <tr>
                        <td><?php echo $dato['id_Producto']?></td>
                        <td><?php echo $dato['codigo']?></td>
                        <td>   <a href="<?php echo base_url(). '/productos/reingresar/'.$dato['id_categoria'];?>" class="btn btn-warning"><i class=" fas-arrow-alt-circle-up "></i></a></td>
                       
                     
                       
                       
                    </tr>

                    <?php }?>
            </table>
        </div>
    </div>
</div>