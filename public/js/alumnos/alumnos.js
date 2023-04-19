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


function eliminaralumno(idalumno){
    $.ajax({
        type: "POST",
        data:"idalumno=" + idalumno,
        url:"../controlador/alumnos/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Alumno Eliminado Exitosamente',
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
