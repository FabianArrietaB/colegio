document.addEventListener("DOMContentLoaded", function() {
    let tabla1 = $("#tablaarticulos").DataTable({
        "ajax": {
            url: "datos.php?accion=listar",
            dataSrc: ""
        },
        "columns": [
            { "data": "codigo" },
            { "data": "descripcion" },
            { "data": "precio" },
            { "data": null, "orderable": false },
            { "data": null, "orderable": false }
        ],
        "columnDefs": [
            { targets: 3, "defaultContent": "<button class='btn btn-sm btn-primary botonmodificar'>Modifica?</button>", data: null},
            { targets: 4, "defaultContent": "<button class='btn btn-sm btn-primary botonborrar'>Borra?</button>", data: null}
        ],
        "language": { "url": "DataTables/spanish.json",
        },
    });

    //Eventos de botones de la aplicación
    $('#BotonAgregar').click(function() {
        $('#ConfirmarAgregar').show();
        $('#ConfirmarModificar').hide();
        limpiarFormulario();
        $("#FormularioArticulo").modal('show');
    });

    $('#ConfirmarAgregar').click(function() {
        $("#FormularioArticulo").modal('hide');
        let registro = recuperarDatosFormulario();
        agregarRegistro(registro);
    });

    $('#ConfirmarModificar').click(function() {
        $("#FormularioArticulo").modal('hide');
        let registro = recuperarDatosFormulario();
        modificarRegistro(registro);
    });

    $('#tablaarticulos tbody').on('click', 'button.botonmodificar', function() {
        $('#ConfirmarAgregar').hide();
        $('#ConfirmarModificar').show();
        let registro = tabla1.row($(this).parents('tr')).data();
        recuperarRegistro(registro.codigo);
    });

    $('#tablaarticulos tbody').on('click', 'button.botonborrar', function() {
        if (confirm("¿Realmente quiere borrar el artículo?")) {
        let registro = tabla1.row($(this).parents('tr')).data();
        borrarRegistro(registro.codigo);
        }
    });

    // funciones que interactuan con el formulario de entrada de datos
    function limpiarFormulario() {
        $('#Codigo').val('');
        $('#Descripcion').val('');
        $('#Precio').val('');
    }

    function recuperarDatosFormulario() {
        let registro = {
        codigo: $('#Codigo').val(),
        descripcion: $('#Descripcion').val(),
        precio: $('#Precio').val()
        };
        return registro;
    }


    // funciones para comunicarse con el servidor via ajax
    function agregarRegistro(registro) {
        $.ajax({
            type: 'POST',
            url: 'datos.php?accion=agregar',
            data: registro,
            success: function(msg) {
                tabla1.ajax.reload();
            },
            error: function() {
                alert("Hay un problema");
            }
        });
    }

    function borrarRegistro(codigo) {
        $.ajax({
            type: 'GET',
            url: 'datos.php?accion=borrar&codigo=' + codigo,
            data: '',
            success: function(msg) {
                tabla1.ajax.reload();
            },
            error: function() {
                alert("Hay un problema");
            }
        });
    }

    function recuperarRegistro(codigo) {
        $.ajax({
            type: 'GET',
            url: 'datos.php?accion=consultar&codigo=' + codigo,
            data: '',
            success: function(datos) {
                $('#Codigo').val(datos[0].codigo);
                $('#Descripcion').val(datos[0].descripcion);
                $('#Precio').val(datos[0].precio);
                $("#FormularioArticulo").modal('show');
            },
            error: function() {
                alert("Hay un problema");
            }
        });
    }

    function modificarRegistro(registro) {
        $.ajax({
            type: 'POST',
            url: 'datos.php?accion=modificar&codigo=' + registro.codigo,
            data: registro,
            success: function(msg) {
                tabla1.ajax.reload();
            },
            error: function() {
                alert("Hay un problema");
            }
        });
    }
});