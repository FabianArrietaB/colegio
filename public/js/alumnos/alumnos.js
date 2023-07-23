$(document).ready(function(){
    $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
});

//CONSULTAR VALOR GRADO
$('#frmagregaralumno').change(function(){
    //condicion para limpiar campos
    if($('#idgrado').val()==0){
        $('#matric').val("");
        $('#pensio').val("");
        return
    }
    $.ajax({
        type:"POST",
        data:"idgrado=" + $('#idgrado').val(),
        url:"../controlador/grados/detalle.php",
        success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
            $('#matric').val(respuesta['matric']);
            $('#pensio').val(respuesta['pensio']);
        }
    });
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

function agregaralumno(){
    $.ajax({
        type: "POST",
        data: $('#frmagregaralumno').serialize(),
        url: "../controlador/alumnos/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
            if(respuesta == 1){
                $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
                $('#frmagregaralumno')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Alumno Creado Exitosamente',
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

function detallealumno(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/alumnos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nombreu').val(respuesta['nombre']);
            $('#cladocu').val(respuesta['cladoc']);
            $('#documeu').val(respuesta['docume']);
            $('#fecnacu').val(respuesta['fecnac']);
            $('#sexou').val(respuesta['sexo']);
            $('#gposanu').val(respuesta['gposan']);
            $('#factrhu').val(respuesta['factrh']);
            $('#ciudadu').val(respuesta['ciudad']);
            $('#direccu').val(respuesta['direcc']);
            $('#estratu').val(respuesta['estrat']);
            $('#telcelu').val(respuesta['telcel']);
            $('#correou').val(respuesta['correo']);
            $('#idgradou').val(respuesta['idgrado']);
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
                $('#editar').modal('hide');
                $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Alumno Actualizado Exitosamente',
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

function padres(idalumno){
    $('#conte-modal-padres').load('alumnos/listaacudientes.php?idalumno='+idalumno, function(){
        $('#acudientes').modal("show");
    });
}



