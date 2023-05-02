$(document).ready(function(){
    $('#tablalistaacudientes').load('alumnos/listaacudientes.php');
});

function detalleacudiente(idacudiente){
    $.ajax({
        type: "POST",
        data: "idacudiente=" + idacudiente,
        url: "../controlador/alumnos/detallepadre.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idacudiente').val(respuesta['idacudiente']);
            $('#nombreu').val(respuesta['nombre']);
            $('#cladocu').val(respuesta['cladoc']);
            $('#documeu').val(respuesta['docume']);
            $('#ciudadu').val(respuesta['ciudad']);
            $('#direccu').val(respuesta['direcc']);
            $('#estratu').val(respuesta['estrat']);
            $('#telcelu').val(respuesta['telcel']);
            $('#correou').val(respuesta['correo']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#gradou').val(respuesta['grado']);
        }
    });
}

function editaracudiente(){
    $.ajax({
        type: "POST",
        data: $('#frmeditaracudiente').serialize(),
        url: "../controlador/alumnos/editarpadre.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#padre').modal('hide');
                $('#tablalistaacudientes').load('alumnos/listaacudientes.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Acudiente Actualizado Exitosamente',
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
