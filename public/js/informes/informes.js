$(document).ready(function(){

    $('#ventasbtn').click(function(){
        ocultarsecciondes();
        $('#tablaventas').load('informes/tablaventas.php');
        $('#tablaventas').show();
    });

    $('#pensionbtn').click(function(){
        ocultarsecciondes();
        $('#tablapension').load('informes/tablapension.php');
        $('#tablapension').show();
    });
    
    $('#matriculasbtn').click(function(){
        ocultarsecciondes();
        $('#tablamatriculas').load('informes/tablamatriculas.php');
        $('#tablamatriculas').show();
    });
});

function ocultarsecciondes(){
    $('#tablaventas').hide();
    $('#tablapension').hide();
    $('#tablamatriculas').hide();
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

