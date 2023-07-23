function detalleacudiente(idacudiente){
    $.ajax({
        type: "POST",
        data: "idacudiente=" + idacudiente,
        url: "../controlador/alumnos/detallepadre.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idacudiente').val(respuesta['idacudiente']);
            $('#alumnoid').val(respuesta['alumnoid']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#padnombreu').val(respuesta['acunombre']);
            $('#padcladocu').val(respuesta['acucladoc']);
            $('#paddocumeu').val(respuesta['acudocume']);
            $('#padtelcelu').val(respuesta['acutelcel']);
            $('#padciudadu').val(respuesta['acuciudad']);
            $('#paddireccu').val(respuesta['acudirecc']);
            $('#padestratu').val(respuesta['acuestrat']);
            $('#padcorreou').val(respuesta['acucorreo']);
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