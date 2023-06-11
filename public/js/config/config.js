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

function detalleparafiscal(idparafiscal){
    $.ajax({
        type: "POST",
        data: "idparafiscal=" + idparafiscal,
        url: "../controlador/config/detallepara.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idparafiscal').val(respuesta['idparafiscal']);
            $('#nombreu').val(respuesta['nombre']);
            $('#nitu').val(respuesta['nit']);
            $('#idtipu').val(respuesta['idtip']);
        }
    });
}

function editarparafiscal(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarparafiscal').serialize(),
        url: "../controlador/config/editarpara.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablaparafiscales').load('config/listaparafiscales.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Actualizado Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Editar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function detalleempresa(idusuario){
    $.ajax({
        type: "POST",
        data: "idusuario=" + idusuario,
        url: "../controlador/config/detallesede.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idsede').val(respuesta['idsede']);
            $('#idtipu').val(respuesta['idtip']);
            $('#razsocu').val(respuesta['razsoc']);
            $('#nombreu').val(respuesta['nombre']);
            $('#nitu').val(respuesta['nit']);
            $('#correou').val(respuesta['correo']);
            $('#paginau').val(respuesta['pagina']);
            $('#telcelu').val(respuesta['telcel']);
            $('#direccu').val(respuesta['direcc']);
            $('#tipperu').val(respuesta['tipper']);
            $('#regimeu').val(respuesta['regime']);
            $('#paisu').val(respuesta['pais']);
            $('#departu').val(respuesta['depart']);
            $('#muniu').val(respuesta['muni']);
        }
    });
}

function editarempresa(){
    $.ajax({
        type: "POST",
        data: $('#frmempresa').serialize(),
        url: "../controlador/config/editarempresa.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#empresa').load('config/empresa.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Actualizado Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Editar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}
