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
        $('#iduser').val('');
        $('#emailuser').val('');
        $("#passworduser").val('');
        $("#idtypeuserf").val('');
        $('#ventanaModal').modal('open');
        $('#emailuser').focus();
    });

    $('#guardar').on("click", function() {
        $('#formulario').submit();
    });

    $(document).on("click", '.edit', function() {
        var iduser = $(this).attr("data-iduser");
        var emailuser = $(this).attr("data-emailuser");
        var passworduser = $(this).attr("data-passworduser");
        var idtypeuserf = $(this).attr("data-idtypeuserf");
        $('#iduser').val(iduser);
        $('#emailuser').val(emailuser);
        $("#passworduser").val(passworduser);
        $("#idtypeuserf").val(idtypeuserf);
        $('#ventanaModal').modal('open');
        $('#emailuser').focus();
    });

    $(document).on("click", '.delete', function() {
        var iduser = $(this).attr("data-iduser");
        var parametros = "iduser=" + iduser + "&tabla=company&accion=Eliminar";
        $.ajax({
            type: "post",
            url: controlador,
            dataType: 'json',
            data: parametros,
            success: function(respuesta) {
                if (respuesta['status'] == 1) {
                    var data = respuesta['data'];
                    if (iduser > 0) {
                        table.row('#' + data.iduser).remove().draw();
                    }

                    M.toast({ html: 'Empresa Eliminada', classes: 'rounded blue lighten-2' });
                }
            }
        });
    });
}

function validateForm() {
    $('#formulario').validate({
        rules: {
            emailuser: { required: true, minlength: 3, maxlength: 100 },
            passworduser: { required: true, minlength: 4, maxlength: 200, },
            idtypeuserf: { required: true, minlength: 4, maxlength: 400, },
        },
        messages: {
            emailuser: { required: "Este campo es requerido", minlength: "3 es el numero minimo de digitos para este campo", maxlength: "100 es el numero maximo de digitos para este campo" },
            passworduser: { required: "Este campo es requerido", minlength: "4 es el numero minimo de digitos para este campo", maxlength: "200 es el numero maximo de digitos para este campo", },
            idtypeuserf: { required: "Este campo es requerido", minlength: "4 es el numero minimo de digitos para este campo", maxlength: "400 es el numero maximo de digitos para este campo", },
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
    var iduser = $("#iduser").val();
    var parametros = $("#formulario").serialize() + "&tabla=user"
    if (iduser > 0) {
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
                $('#iduser').val('');
                $('#emailuser').val('');
                $("#passworduser").val('');
                $("#idtypeuserf").val('');
                $('#ventanaModal').modal('close');
                var data = respuesta['data'];
                if (iduser > 0) {
                    table.row('#' + data.iduser).remove().draw();
                }
                var row = table.row.add([
                    data.iduser,
                    data.emailuser,
                    data.passworduser,
                    data.idtypeuserf,
                    '<i class="material-icons edit" data-iduser="' + data.iduser + '" data-emailuser="' + data.emailuser + '" data-passworduser="' + data.passworduser + '" data-idtypeuserf="' + data.idtypeuserf + '">create</i><i class="material-icons delete" data-iduser="' + data.iduser + '">delete_forever</i>'
                ]).draw().node();
                $(row).attr('id', data.iduser);

                M.toast({ html: 'Menu Guardado', classes: 'rounded' });
            }
        }
    });
}