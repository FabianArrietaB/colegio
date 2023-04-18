$(document).ready(function(){
    $('#tablalistaempleados').load('empleados/listaempleados.php');
});

function activarempleado(idempleado, estado){
    $.ajax({
        type:"POST",
        data:"idempleado=" + idempleado +"&estado=" + estado,
        url:"../controlador/empleados/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaempleados').load('empleados/listaempleados.php');
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

function agregarempleado(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarempleado').serialize(),
        url: "../controlador/empleados/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta);
                $('#tablalistaempleados').load('empleados/listaempleados.php');
                $('#frmagregarempleado')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Empleado Creado Exitosamente',
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

function detalleempleado(idempleado){
    $.ajax({
        type: "POST",
        data: "idempleado=" + idempleado,
        url: "../controlador/empleados/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idempleado').val(respuesta['idempleado']);
            $('#nombreu').val(respuesta['nombre']);
            $('#cladocu').val(respuesta['cladoc']);
            $('#documeu').val(respuesta['docume']);
            $('#cargou').val(respuesta['cargo']);
            $('#telcelu').val(respuesta['telcel']);
            $('#ciudadu').val(respuesta['ciudad']);
            $('#direccu').val(respuesta['direcc']);
            $('#estratu').val(respuesta['estrat']);
            $('#correou').val(respuesta['correo']);
            $('#tipconu').val(respuesta['tipcon']);
            $('#salariu').val(respuesta['salari']);
            $('#codcesu').val(respuesta['codces']);
            $('#codepsu').val(respuesta['codeps']);
            $('#conpenu').val(respuesta['conpen']);
            $('#codarlu').val(respuesta['codarl']);
            $('#sexou').val(respuesta['sexo']);
            $('#estcivu').val(respuesta['estciv']);
            $('#escolau').val(respuesta['escola']);
            $('#gposanu').val(respuesta['gposan']);
            $('#factrhu').val(respuesta['factrh']);
            $('#hijosu').val(respuesta['hijos']);
            $('#fecnacu').val(respuesta['fecnac']);
            $('#fechau').val(respuesta['fecha']);
        }
    });
}

function editarempleado(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarempleado').serialize(),
        url: "../controlador/empleados/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablalistaempleados').load('empleados/listaempleados.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Empleado Actualizado Exitosamente',
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

function eliminarempleado(idempleado){
    $.ajax({
        type: "POST",
        data:"idempleado=" + idempleado,
        url:"../controlador/empleados/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaempleados').load('empleados/listaempleados.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Empleado Eliminado Exitosamente',
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