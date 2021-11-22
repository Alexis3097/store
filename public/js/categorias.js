$('#guardar').on('click', function () {
    $(this).prop("disabled", true);
    let nombre = $('#nombre').val();
    let activa = $("#activa").prop('checked');
    let id = $('#id').val();
    let ruta;
    let type;
    if (id == 0) {
        // crear
        ruta = '/categoria-producto';
        type = 'POST'
    } else {
        // EDITAR
        ruta = `categoria-producto/${id}`;
        type = 'PUT'
    }

    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: type,
        datatype: "json",
        data: {
            id: id,
            nombre: nombre,
            activa: activa,
        },
        success: function (data) {
            $('#guardar').prop("disabled", false);
            $('#nuevaCategoria').hide();
            Swal.fire(
                'Guardado',
                'El registro ha sido guardado',
                'success'
            ).then((result) => {
                $("#categoriaPage").on('click', function () {
                    location.href = this.href;
                });
                $("#categoriaPage").click();
            });
        },
        error: function (data) {
            $('#guardar').prop("disabled", false);
            console.log(data)
            if (data.status == 500 || data.status == 400) {
                $('#nuevaCategoria').modal('hide')
                Swal.fire(
                    'Error',
                    'Ha habido un problema al guardar el registro',
                    'error'
                )
            } else {
                if (data.responseJSON.errors.hasOwnProperty('nombre')) {
                    $('#nombre').addClass("is-invalid");
                    let nombre = data.responseJSON.errors.nombre;
                    $('#errorNombre').append(`
                    <ul class='text-danger'>
                        ${nombre.map(element => `<li>${element}</li>`)}
                    </ul>
                `);
                }

            }

        }
    })
});

$('.delete').on('click', function () {
    let idCategoria = $(this).closest('tr').children('th').text();
    Swal.fire({
        title: 'Eliminar',
        text: "¿Estas seguro de elimnarlo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/categoria-producto/${idCategoria}`,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "delete",
                datatype: "json",
                success: function (data) {
                    Swal.fire(
                        'Eliminado',
                        'El registro ha sido eliminado',
                        'success'
                    ).then((result) => {
                        $("#categoriaPage").on('click', function () {
                            location.href = this.href;
                        });
                        $("#categoriaPage").click();
                    });

                },
                error: function (data) {
                    Swal.fire(
                        'Error',
                        'Ha habido un problema al eliminar al usuario',
                        'error'
                    )
                }
            });
        }
    })
});

$('.editar').on('click', function () {
    $(".modal-title").text('Editar categoria')
    let tr = $(this).closest('tr');
    let datos = tr.children("td").map(function () {
        return $(this).text();
    });
    let activa = datos[2].trim() == 'SI';
    $("#id").val(datos[0]);
    $("#nombre").val(datos[1]);
    $("#activa").prop('checked', activa);
    $("#nuevaCategoria").modal('show')
});

function limpiar() {
    $("#nombre").val('');
    $("#id").val('0');
    $("#activa").prop('checked', false);
    $(".modal-title").text('Nueva categoria')
}

$('.limpiar').on('click', function () {
    limpiar();
});
