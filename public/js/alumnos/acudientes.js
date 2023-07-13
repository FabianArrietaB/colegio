function detalleacudiente(idacudiente){
    $.ajax({
        type: "POST",
        data: "idacudiente=" + idacudiente,
        url: "../controlador/alumnos/detallepadre.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idacudiente').val(respuesta['idacudiente']);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#nombreu').val(respuesta['nombre']);
            $('#cladocu').val(respuesta['cladoc']);
            $('#documeu').val(respuesta['docume']);
            $('#ciudadu').val(respuesta['ciudad']);
            $('#direccu').val(respuesta['direcc']);
            $('#estratu').val(respuesta['estrat']);
            $('#telcelu').val(respuesta['telcel']);
            $('#correou').val(respuesta['correo']);
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
            //console.log(respuesta)
            if(respuesta == 1){
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