$(document).ready(function(){
    $('#tablaparafiscales').load("config/listaparafiscales.php");

    $('#empresabtn').click(function(){
        ocultarsecciondes();
        $('#empresa').load('config/empresa.php');
        $('#empresa').show();
    });

    $('#parafiscalesbtn').click(function(){
        ocultarsecciondes();
        $('#parafiscales').load('config/parafiscales.php');
        $('#parafiscales').show();
    });

    $('#paisbtn').click(function(){
        ocultarsecciondes();
        $('#paises').load('config/pais.php');
        $('#paises').show();
    });

    $('#parametrosbtn').click(function(){
        ocultarsecciondes();
        $('#parametros').load('config/parametros.php');
        $('#parametros').show();
    });

    $('#seguridadbtn').click(function(){
        ocultarsecciondes();
        $('#seguridad').load('config/seguridad.php');
        $('#seguridad').show();
    });

     $('#sedesbtn').click(function(){
        ocultarsecciondes();
        $('#sedes').load('config/sedes.php');
        $('#sedes').show();
    });
});

function ocultarsecciondes(){
    $('#empresa').hide();
    $('#parafiscales').hide();
    $('#paises').hide();
    $('#parametros').hide();
    $('#seguridad').hide();
    $('#sedes').hide();
    return false;
}


function agregarparafiscal(){
    $.ajax({
    type: "POST",
    data: $('#frmagregarparafiscal').serialize(),
    url: "../controlador/config/crearparafiscal.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#frmagregarparafiscal')[0].reset();
                $('#tablaparafiscales').load('config/listaparafiscales.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Agregado Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo realizar la operacion!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        }
    });
    return false;
}
