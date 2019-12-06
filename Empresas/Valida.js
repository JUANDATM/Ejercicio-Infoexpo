$(init);
var table = null;
var controlador = "../Utilerias/Controlador.php";

function init() {

    //Convertir la tabla en DataTable-------------------------------------------------------------
    table = $('#dtTable').DataTable({
        "aLengthMenu": [
            [10, 25, 50, 75, 100],
            [10, 25, 50, 75, 100]
        ],
        "iDisplayLength": 15
    });
    //--------------------------------------------------------------------------------------------

    $('#ventanaModal').modal();
    validateForm();

    $('#add').on("click", function() {
        $('#idcompany').val('');
        $('#namecompany').val('');
        $("#address").val('');
        $("#description").val('');
        $('#ventanaModal').modal('open');
        $('#namecompany').focus();
    });

    $('#guardar').on("click", function() {
        $('#formulario').submit();
    });

    $(document).on("click", '.edit', function() {
        var idcompany = $(this).attr("data-idcompany");
        var namecompany = $(this).attr("data-namecompany");
        var address = $(this).attr("data-address");
        var description = $(this).attr("data-description");
        $('#idcompany').val(idcompany);
        $('#namecompany').val(namecompany);
        $("#address").val(address);
        $("#description").val(description);
        $('#ventanaModal').modal('open');
        $('#name').focus();
    });

    $(document).on("click", '.delete', function() {
        var idcompany = $(this).attr("data-idcompany");
        var parametros = "idcompany=" + idcompany + "&tabla=company&accion=Eliminar";
        $.ajax({
            type: "post",
            url: controlador,
            dataType: 'json',
            data: parametros,
            success: function(respuesta) {
                if (respuesta['status'] == 1) {
                    var data = respuesta['data'];
                    if (idcompany > 0) {
                        table.row('#' + data.idcompany).remove().draw();
                    }

                    M.toast({ html: 'Empresa Eliminada', classes: 'rounded blue lighten-2' });
                }
            }
        });
    });

    $(document).on("click", '.right', function() {
        var idcompany = $(this).attr("data-idcompany");
        var parametros = "idcompany=" + idcompany + "&tabla=company&accion=Visits";
        $.ajax({
            type: "post",
            url: controlador,
            dataType: 'json',
            data: parametros,
            success: function(respuesta) {
                if (respuesta['status'] == 1) {
                    var data = respuesta['data'];
                    table.row('#' + data.idcompany).remove().draw();
                    M.toast({ html: 'Visita Agergada', classes: 'rounded blue lighten-2' });
                }
            }
        });
    });
}

function validateForm() {
    $('#formulario').validate({
        rules: {
            name: { required: true, minlength: 3, maxlength: 100 },
            address: { required: true, minlength: 4, maxlength: 200, },
            description: { required: true, minlength: 4, maxlength: 400, },
        },
        messages: {
            name: { required: "Este campo es requerido", minlength: "3 es el numero minimo de digitos para este campo", maxlength: "100 es el numero maximo de digitos para este campo" },
            address: { required: "Este campo es requerido", minlength: "4 es el numero minimo de digitos para este campo", maxlength: "200 es el numero maximo de digitos para este campo", },
            description: { required: "Este campo es requerido", minlength: "4 es el numero minimo de digitos para este campo", maxlength: "400 es el numero maximo de digitos para este campo", },
        },
        errorElement: "div",
        errorClass: "invalid",
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        submitHandler: function(form) {
            saveData();
        }
    });
}

function saveData() {
    var idcompany = $("#idcompany").val();
    var parametros = $("#formulario").serialize() + "&visit=0&tabla=company"
    if (idcompany > 0) {
        parametros = parametros + "&accion=Actualizar";
    } else {
        parametros = parametros + "&accion=Insertar";
    }
    $.ajax({
        type: "post",
        url: controlador,
        dataType: 'json',
        data: parametros,
        success: function(respuesta) {
            if (respuesta['status'] == 1) {
                $('#idcompany').val('');
                $('#namecompany').val('');
                $("#address").val('');
                $("#description").val('');
                $('#ventanaModal').modal('close');
                var data = respuesta['data'];
                if (idcompany > 0) {
                    table.row('#' + data.idcompany).remove().draw();
                }
                var row = table.row.add([
                    data.idcompany,
                    data.namecompany,
                    data.address,
                    data.description,
                    adata.visit,
                    '<i class="material-icons edit" data-idcompany="' + data.idcompany + '" data-namecompany="' + data.namecompany + '" data-address="' + data.address + '" data-description="' + data.description + '">create</i><i class="material-icons delete" data-idcompany="' + data.idcompany + '">delete_forever</i>'
                ]).draw().node();
                $(row).attr('id', data.idcompany);

                M.toast({ html: 'Menu Guardado', classes: 'rounded' });
            }
        }
    });
}