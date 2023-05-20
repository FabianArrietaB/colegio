$(document).ready(function(){
    $('#tablainformes').load('informes/listainformes.php');
});

$(document).ready(function(){
    setInterval(
        function(){
            const filtro = $('#filtro').val()
            $('#Recargar').load('informes/listainformes.php?filtro='+filtro);
        },1000
    );
});

function reporteventas(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/informe/detalleventa.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#idproductou').val(respuesta['idproducto']);
            $('#preciou').val(respuesta['precio']);
        }
    });
}

function reportematriculas(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/informe/detallematricula.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#idgradou').val(respuesta['idgrado']);
            $('#idtippag').val(respuesta['tippag']);
            $('#matriculau').val(respuesta['matricula']);
            $('#abonou').val(respuesta['abono']);
            $('#fechau').val(respuesta['fecha']);
        }
    });
}

