$(document).ready(function(){
    $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
});

function activaralumno(idalumno, estado){
    $.ajax({
        type:"POST",
        data:"idalumno=" + idalumno +"&estado=" + estado,
        url:"../controlador/alumnos/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
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

// function agregaralumno(){
//     $.ajax({
//         type: "POST",
//         data: $('#frmagregaralumno').serialize(),
//         url: "../controlador/alumnos/agregar.php",
//         success:function(respuesta){
//             respuesta = respuesta.trim();
//             if(respuesta == 1){
//                 $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
//                 $('#frmagregaralumno')[0].reset();
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'alumno Creado Exitosamente',
//                     showConfirmButton: false,
//                     timer: 1500
//                 });
//             }else{
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Oops...',
//                     text: 'Error al crear!',
//                     showConfirmButton: false,
//                     timer: 1500
//                 });
//             }
//         }
//     });
//     return false;
// }

function detallealumno(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/alumnos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nombreu').val(respuesta['nombre']);
            $('#alumnou').val(respuesta['cladoc']);
            $('#fechau').val(respuesta['docume']);
            $('#correou').val(respuesta['sexo']);
            $('#idRolu').val(respuesta['gposan']);
            $('#factrh').val(respuesta['factrh']);
            $('#ciudad').val(respuesta['ciudad']);
            $('#direcc').val(respuesta['direcc']);
            $('#estrat').val(respuesta['estrat']);
            $('#celula').val(respuesta['celula']);
            $('#correo').val(respuesta['correo']);
            $('#estado').val(respuesta['estado']);
            $('#fecha').val(respuesta['fecha']);
            $('#idgrado').val(respuesta['idgrado']);
            $('#grado').val(respuesta['grado']);
            $('#idacudiente').val(respuesta['idacudiente']);
            $('#nombreacu').val(respuesta['nombreacu']);
            $('#cladocacu').val(respuesta['cladocacu']);
            $('#documeacu').val(respuesta['documeacu']);
            $('#ciudadacu').val(respuesta['ciudadacu']);
            $('#direccacu').val(respuesta['direccacu']);
            $('#celulaacu').val(respuesta['celulaacu']);
            $('#correoacu').val(respuesta['correoacu']);
            $('#parentezc').val(respuesta['parentezc']);
        }
    });
}




function editaralumno(){
    $.ajax({
        type: "POST",
        data: $('#frmeditaralumno').serialize(),
        url: "../controlador/alumnos/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
                $('#editar').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'alumno Actualizado Exitosamente',
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
