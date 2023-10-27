<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
   <form action="ventasHechas" method="GET">
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio">

    <label for="fecha_fin">Fecha de fin:</label>
    <input type="date" name="fecha_fin" id="fecha_fin">

    <input type="submit" value="Ver Ventas">
<p>
<a href="<?php echo base_url(); ?>ventas/eliminados" class="btn btn-warning">anuladas</a>
</p>
    <div class="table">
            <table class="table table-sm" id="tablaLista" width="100%" cellspacing="0" text="center"> 
                <thead>
                    <tr>
                        <th>fecha y hora</th>
                        <th>razon social</th>
                        <th>n° nota remision</th>
                        <th>usuario</th>
                        <th>total</th>
                       
                        <th>comprobante NR</th>
                       
                    </tr>
                </thead>         
               <tbody>
               
                    <?php foreach($datos as $dato){?>
                       <tr>
                          <td><?php echo $dato['fechaRegistro']?></td>
                          <td><?php echo $dato['id_cliente']?></td>                         
                          <td><?php echo $dato['notaR']?></td>
                          <td><?php echo $dato['usuarios']?></td>
                          <td><?php echo $dato['total']?></td>
                           <td>   <a href="<?php echo base_url(). '/ventas/muestraVentaPdf/'?>" class="btn btn-warning"><i class="fa-sharp fa-light fa-pen-nib"></i></a></td>
                           <?php }?>

<?php
if (isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])) {
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_fin = $_GET['fecha_fin'];

    // Realiza la consulta a la base de datos para obtener las ventas en el rango de fechas
    // Puedes utilizar SQL u otro método para obtener los datos.

    // Muestra las ventas en una tabla o de la manera que desees.
}
?>
</form>

        </main>