<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
   <form id="form_permisos" name="form_permisos" method="POST" action="<?php echo base_url().'/empleados/guardaPermisos';?>">
 
   <input type="hidden" name="id_Empleado" value="<?php echo  $id_Empleado;?>"/>
  
   <?php
   foreach($permisos as $permiso){
   
    echo '<input  type="checkbox" value="'.$permiso['id_permiso'].'" name="permisos[]"/> 
    <label>'. $permiso['nombre'].'</label >';
    echo '<br  />';
   }
   ?>
   <button type="submit" class="btn btn-primary">guardar</button>
</form>
        </div>
</div>
</main>


  

