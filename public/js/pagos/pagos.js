$(document).ready(function(){

    $('#pagosbtn').click(function(){
        ocultarsecciondes();
        $('#tablalistapagos').load('pagos/listapagos.php');
        $('#tablalistapagos').show();
    });

    $('#pensionbt').click(function(){
        ocultarsecciondes();
        $('#tablalistapension').load('pagos/listapension.php');
        $('#tablalistapension').show();
    });
});

function ocultarsecciondes(){
    $('#tablalistapagos').hide();
    $('#tablalistapension').hide();
    return false;
}

function detallematricula(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idmatricula').val(respuesta['idmatricula']);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#idgrado').val(respuesta['idgrado']);
            $('#gradou').val(respuesta['grado']);
            $('#matriculau').val(respuesta['matricula']);
            $('#saldou').val(respuesta['saldo']);
        }
    });
}

function detallepension(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detallepension.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#matriculaid').val(respuesta['matriculaid']);
            $('#alumnoid').val(respuesta['alumnoid']);
            $('#alunomu').val(respuesta['alunom']);
            $('#gradoid').val(respuesta['gradoid']);
            $('#nomgrau').val(respuesta['nomgra']);
            $('#pensionu').val(respuesta['pension']);
        }
    });
}

function pagomatricula(){
    $.ajax({
        type: "POST",
        data: $('#frmpagomatricula').serialize(),
        url: "../controlador/pagos/pagos.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
            if(respuesta == 1){
                $('#frmpagomatricula')[0].reset();
                $('#tablalistapagos').load('pagos/listapagos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Pago Realizado Exitosamente',
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

function pagopension(){
    $.ajax({
        type: "POST",
        data: $('#frmpagopension').serialize(),
        url: "../controlador/pagos/pension.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
            if(respuesta == 1){
                $('#frmpagopension')[0].reset();
                $('#tablalistapagos').load('pagos/listapagos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Pago Realizado Exitosamente',
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