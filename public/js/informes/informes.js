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

