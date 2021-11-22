function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('#foto_ruta').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imagen").change(function () {
    console.log('test')
    readURL(this);
});

$('.delete').on('click', function () {
    let idProducto = $(this).closest('tr').children('td').first().text();
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
                url: `/producto/${idProducto}`,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "delete",
                datatype: "json",
                success: function (data) {
                    Swal.fire(
                        'Eliminado',
                        'El registro ha sido eliminado',
                        'success'
                    ).then((result) => {
                        $("#productosPage").on('click', function () {
                            location.href = this.href;
                        });
                        $("#productosPage").click();
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
