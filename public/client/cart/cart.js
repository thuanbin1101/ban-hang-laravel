function actionDeleteCart(e) {
    e.preventDefault()
    let urlCart = $(".contentCart").data('url')
    let id = $(this).data('id');
    Swal.fire({
        text: "Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?",
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
                data: {id: id},
                success: function (data) {
                    if (data.code === 200) {
                        $('.contentCart').html(data.cart_component)
                    }
                },
                error: function (error) {
                    let errorLog = error;
                    if (error.responseJSON.code === 500) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Thất bại',
                        })
                    }
                }
            })
        }
    })

}
function actionRedirectCheckout(){
    location.href = $(this).data('urlcheckout');
}
function actionCheckoutCart(){
    $('#formCheckoutCart').submit();
}

$(function () {
    $(document).on('click', '.delete_cart', actionDeleteCart)
    $(document).on('click', '#btnCheckout', actionRedirectCheckout)
    $(document).on('click', '#btnCheckoutCart', actionCheckoutCart)
})
