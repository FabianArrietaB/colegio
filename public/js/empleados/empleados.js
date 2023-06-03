$(document).ready(function(){
    $('#tablaempleados').load('empleados/listaempleados.php');
});

//FILTRAR
$(document).ready(function(){
    setInterval(
        function(){
            const filtro = $('#filtro').val()
            $('#Recargar').load('empleados/listaempleados.php?filtro='+filtro);
        },1000
    );
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

function agregarempleado(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarempleado').serialize(),
        url: "../controlador/empleados/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
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
            $('#fecnacu').val(respuesta['fecnac']);
            $('#sexou').val(respuesta['sexo']);
            $('#gposanu').val(respuesta['gposan']);
            $('#factrhu').val(respuesta['factrh']);
            $('#estcivu').val(respuesta['estciv']);
            $('#escolau').val(respuesta['escola']);
            $('#hijosu').val(respuesta['hijos']);
            $('#telcelu').val(respuesta['telcel']);
            $('#ciudadu').val(respuesta['ciudad']);
            $('#direccu').val(respuesta['direcc']);
            $('#estratu').val(respuesta['estrat']);
            $('#correou').val(respuesta['correo']);
            $('#cargou').val(respuesta['cargo']);
            $('#tipconu').val(respuesta['tipcon']);
            $('#salariu').val(respuesta['salari']);
            $('#codepsu').val(respuesta['codeps']);
            $('#codarlu').val(respuesta['codarl']);
            $('#codpenu').val(respuesta['codpen']);
            $('#codcesu').val(respuesta['codces']);
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