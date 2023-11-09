// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      searching: true,  // Habilitar búsqueda
      paging: true,     // Habilitar paginación
      // Otras opciones personalizadas
  });
});
