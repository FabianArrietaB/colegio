$(document).ready(function(){
    $('#tablaestadistica').load('config/estadisticas.php');
});

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