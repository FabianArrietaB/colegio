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
