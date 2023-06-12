$(document).ready(function(){
    $('#tablalistagrados').load('grados/listagrados.php');
});

//FILTRAR
$(document).ready(function(){
    setInterval(
        function(){
            const filtro = $('#filtro').val()
            $('#Recargar').load('grados/listagrados.php?filtro='+filtro);
        },1000
    );
});


function activargrado(idgrado, estado){
    $.ajax({
        type:"POST",
        data:"idgrado=" + idgrado +"&estado=" + estado,
        url:"../controlador/grados/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistagrados').load('grados/listagrados.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Operacion Exitosa',
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
}

function agregargrado(){
    $.ajax({
        type: "POST",
        data: $('#frmagregargrado').serialize(),
        url: "../controlador/grados/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#tablalistagrados').load('grados/listagrados.php');
                $('#frmagregargrado')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'grado Creado Exitosamente',
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

function detallegrado(idgrado){
    $.ajax({
        type: "POST",
        data: "idgrado=" + idgrado,
        url: "../controlador/grados/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idgrado').val(respuesta['idgrado']);
            $('#nombreu').val(respuesta['nombre']);
            $('#matricu').val(respuesta['matric']);
            $('#pensiou').val(respuesta['pensio']);
            $('#canaluu').val(respuesta['canalu']);
            $('#iddiru').val(respuesta['iddir']);
            $('#nomprou').val(respuesta['nompro']);
        }
    });
}

function editargrado(){
    $.ajax({
        type: "POST",
        data: $('#frmeditargrado').serialize(),
        url: "../controlador/grados/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablalistagrados').load('grados/listagrados.php');
                Swal.fire({
                    icon: 'success',
                    title: 'grado Actualizado Exitosamente',
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

function eliminargrado(idgrado){
    $.ajax({
        type: "POST",
        data:"idgrado=" + idgrado,
        url:"../controlador/grados/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistagrados').load('grados/listagrados.php');
                    swal.fire({
                        icon: 'success',
                        title: 'grado Eliminado Exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
            }else{
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Eliminar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
}