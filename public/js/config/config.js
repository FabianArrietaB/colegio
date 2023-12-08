$(document).ready(function(){
    $('#tablaparafiscales').load("config/parafiscaleslista.php");
    $('#tablamovimientos').load("config/tipmovlista.php");
    $('#tablaprefijos').load("config/prefijoslista.php");

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

    $('#prefijbtn').click(function(){
        ocultarsecciondes();
        $('#prefijos').load('config/prefijos.php');
        $('#prefijos').show();
    });

    $('#tipmovbtn').click(function(){
        ocultarsecciondes();
        $('#tipomovimientos').load('config/tiposmovimientos.php');
        $('#tipomovimientos').show();
    });

});

function ocultarsecciondes(){
    $('#empresa').hide();
    $('#parafiscales').hide();
    $('#prefijos').hide();
    $('#tipomovimientos').hide();
    return false;
}

function agregarparafiscal(){
    $.ajax({
    type: "POST",
    data: $('#frmagregarparafiscal').serialize(),
    url: "../controlador/config/paraficrear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#frmagregarparafiscal')[0].reset();
                $('#tablaparafiscales').load('config/parafiscaleslista.php');
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
        url: "../controlador/config/parafidetalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idparafiscal').val(respuesta['idparafiscal']);
            $('#idtipu').val(respuesta['idtip']);
            $('#codigou').val(respuesta['codigo']);
            $('#nitu').val(respuesta['nit']);
            $('#nombreu').val(respuesta['nombre']);
            $('#regimenu').val(respuesta['regimen']);
        }
    });
}

function editarparafiscal(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarparafiscal').serialize(),
        url: "../controlador/config/parafieditar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablaparafiscales').load('config/parafiscaleslista.php');
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
                detalleempresa();
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

function agregarmovimiento(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarmovimiento').serialize(),
        url: "../controlador/config/tipmovcrear.php",
            success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#frmagregarmovimiento')[0].reset();
                $('#tablamovimientos').load("config/tipmovlista.php");
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

function detallemovimiento(codigo){
    $.ajax({
        type: "POST",
        data: "codigo=" + codigo,
        url: "../controlador/config/tipmovdetalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idmovimiento').val(respuesta['codigo']);
            $('#prenombreu').val(respuesta['nombre']);
            $('#predetallu').val(respuesta['detall']);
            $('#estado').val(respuesta['estado']);
        }
    });
}

function editarmovimiento(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarmovimiento').serialize(),
        url: "../controlador/config/tipmoveditar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tipmoveditar').modal('hide');
                $('#tablamovimientos').load("config/tipmovlista.php");
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

function obtenermovimiento(codigo){
    var codigo = codigo;
    console.log(codigo)
    $('#codigo').val(codigo);
    $.ajax({
        type:"POST",
        data: "codigo=" + codigo,
        url: "../controlador/config/tipmovdetalle.php",
        success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
            $('#idpretipmov').val(respuesta['codigo']);
            $('#pretipmov').val(respuesta['nombre']);
        }
    });
}

function agregarprefijo(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarprefijo').serialize(),
        url: "../controlador/config/prefijocrear.php",
            success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#frmagregarmovimiento')[0].reset();
                $('#tablaprefijos').load("config/prefijoslista.php");
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

function detalleprefijo(codigo){
    $.ajax({
        type: "POST",
        data: "codigo=" + codigo,
        url: "../controlador/config/prefijodetalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idmovimiento').val(respuesta['codigo']);
            $('#prenombreu').val(respuesta['nombre']);
            $('#predetallu').val(respuesta['detall']);
            $('#estado').val(respuesta['estado']);
        }
    });
}

function editarprefijo(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarprefijo').serialize(),
        url: "../controlador/config/prefijoeditar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#prefijoeditar').modal('hide');
                $('#tablaprefijos').load("config/prefijoslista.php");
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