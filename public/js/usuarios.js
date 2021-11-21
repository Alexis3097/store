$('.delete').on('click', function () {
    let idUser = $(this).closest('tr').children('th').text();
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
                url: `/usuarios/${idUser}`,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "delete",
                datatype: "json",
                success: function (data) {
                    Swal.fire(
                        'Eliminado',
                        'El registro ha sido eliminado',
                        'success'
                    ).then((result) => {
                        $("#userPage").on('click', function () {
                            location.href = this.href;
                        });
                        $("#userPage").click();
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
