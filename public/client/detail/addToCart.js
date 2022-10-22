function actionAddToCart(e) {
    e.preventDefault()
    let urlCart = $(this).data('urlcart')
    let valueQuantity = $('.quantity_product').val();
    Swal.fire({
        text: "Bạn có muốn thêm vào giỏ hàng không?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận',
        cancelButtonText: 'Huỷ bỏ'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: urlCart,
                data: {quantity_product: valueQuantity},
                success: function (data) {
                    if (data.code === 200) {
                        Swal.fire(
                            'Thành công!',
                            'Bạn đã thêm sản phầm này vào giỏ hàng',
                            'success'
                        )
                    }
                },
                error: function (error) {
                    console.log(error)
                    let errorLog = error;
                    if (error.responseJSON.code === 500) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Thất bại',
                            text: errorLog.responseJSON.message,
                        })
                    }
                }
            })
        }
    })

}

$(function () {
    $(document).on('click', '.add_to_cart', actionAddToCart)
})
