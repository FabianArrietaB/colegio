
function detallefactura(idfacturas){
    $('#conte-modal-factura').load('facturas/vistapreviafactura.php?idfacturas='+idfacturas, function(){
        $('#factura').modal("show");
        $('.modal-backdrop').remove()
    });
}

function imprimir(){
    var factura = window.open("", "factura", "width=800, heigth=600");
    factura.document.write("<html><head><title>Factura de Venta</title>");
    factura.document.write("<style><link rel='stylesheet' href='../../../public/css/ticket.css'></style></head><body>");
    factura.document.write($("#conte-modal-factura").html());
    factura.document.write("</body></html>");
    factura.document.close();
    factura.print();
}

function filtrar() {
    // Declare variables 
    var input, filter, table, tr, td, i, j, visible;
    input = document.getElementById("filtro");
    filter = input.value.toUpperCase();
    table = document.getElementById("estadisticas");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      visible = false;
      /* Obtenemos todas las celdas de la fila, no sólo la primera */
      td = tr[i].getElementsByTagName("td");
      for (j = 0; j < td.length; j++) {
        if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          visible = true;
        }
      }
      if (visible === true) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }