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
    $('#conte-modal-factura').load('informes/tickeproductos.php?idfacturas='+idfacturas, function(){
        $('#factura').modal("show");
        $('.modal-backdrop').remove()
    });
}
