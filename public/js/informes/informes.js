$(document).ready(function(){

    $('#ventasbtn').click(function(){
        ocultar();
        $('#tablaventas').load('informes/tablaventas.php');
        $('#tablaventas').show();
    });

    $('#pensionbtn').click(function(){
        ocultar();
        $('#tablapension').load('informes/tablapension.php');
        $('#tablapension').show();
    });
    
    $('#matriculasbtn').click(function(){
        ocultar();
        $('#tablamatriculas').load('informes/tablamatriculas.php');
        $('#tablamatriculas').show();
    });

    $('#facturasbtn').click(function(){
        ocultar();
        $('#tablafacturas').load('informes/tablafacturas.php');
        $('#tablafacturas').show();
    });
});

function ocultar(){
    $('#tablaventas').hide();
    $('#tablapension').hide();
    $('#tablamatriculas').hide();
    $('#tablafacturas').hide();
    return false;
}

function detalleventa(idalumno){
    $('#conte-modal-venta').load('informes/reporteventas.php?idalumno='+idalumno, function(){
        $('#repventa').modal("show");
        $('.modal-backdrop').remove()
    });
}

function detallematricula(idalumno){
    $('#conte-modal-matricula').load('informes/reportematriculas.php?idalumno='+idalumno, function(){
        $('#repmatricula').modal("show");
        $('.modal-backdrop').remove()
    });
}

function detallepension(idalumno){
    $('#conte-modal-pension').load('informes/reportepesiones.php?idalumno='+idalumno, function(){
        $('#reppensiones').modal("show");
        $('.modal-backdrop').remove()
    });
}

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