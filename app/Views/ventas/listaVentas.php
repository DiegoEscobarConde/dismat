<main>
<div class="container-fluid">

   <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo ?></h1>
   <form action="ventasHechas" method="GET">
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio">

    <label for="fecha_fin">Fecha de fin:</label>
    <input type="date" name="fecha_fin" id="fecha_fin">

    <input type="submit" value="Ver Ventas">
    <button type="button" id="imprimirVentas" class="btn btn-primary">Imprimir</button>

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
                        <th>total</th> 
                        <th>comprobante NR</th>
                    </tr>
                </thead>         
               <tbody>
                    <?php foreach($ventas as $venta){?>
                       <tr>
                          <td><?php echo $venta['fechaRegistro']?></td>
                          <td><?php echo $venta['id_cliente']?></td>                         
                          <td><?php echo str_pad($venta['id_Venta'], 6, '0', STR_PAD_LEFT); ?></td>
                          <td><?php echo $venta['total']?></td>
                           <td>   <a href="<?php echo base_url(). 'ventas/muestraVentaPdf/'.$venta['id_Venta'];?>" class="btn btn-success"><i class="fas fa-file-alt"></i></a></td>
                           <?php }?>

<?php
if (isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])) {
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_fin = $_GET['fecha_fin'];
}
?>
</form>

        </main>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('imprimirVentas').addEventListener('click', function() {
        window.print();
    });
});

            document.getElementById('imprimirVentas').addEventListener('click', function() {
    // Realiza una solicitud AJAX para generar el informe PDF
    $.ajax({
        url: 'ventas/generarInformePDF',
        type: 'post',
        success: function(response) {
            // El informe PDF se abrirá para su visualización e impresión
        }
    });
});

        </script>