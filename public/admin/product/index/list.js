function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: urlRequest,
                success: function (data) {
                    if (data.code === 200) {
                        that.parent().parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },
                error: function () {

                }
            })

            // document.getElementById('my_form').submit();
        }
    })
}

function actionSearch(event) {

    let valueSearch = $(this).val();
    let urlRequest = $(this).data('search');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: urlRequest,
        data: {search: valueSearch},
        success: function (data) {
                $('.content-body-table').html(data.data)
        },
        error: function (error) {
            $('.content-body-table').html(error.responseJSON.data)
        }
    })
}

$(function () {
    $(document).on('keyup', '.search', actionSearch)
    $(document).on('click', '.product-delete', actionDelete)
})
