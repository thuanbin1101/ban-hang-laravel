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

function confirmOrder(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    let arr = urlRequest.split('/');
    let idOrderCustomer = arr[arr.length - 1]
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.code === 200) {
                        that.parent().parent().parent().find(`.confirm-${idOrderCustomer}`).html(
                            '<span class="badge badge-success">Đã xác nhận</span>'
                        )
                        Swal.fire(
                            'Thành công!',
                            'Xác nhận đơn hàng thành công.',
                            'success'
                        )
                    }
                },
                error: function () {

                }
            })

        }
    })
}

$(function () {
    $(document).on('click', '.menu-delete', actionDelete)
    $(document).on('click', '.action-confirm', confirmOrder)
})
