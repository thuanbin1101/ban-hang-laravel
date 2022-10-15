$(function () {
    $(document).on('click', '.checkbox-wrapper', function () {
        $(this).parents('.card').find('.checkbox-childrent').prop('checked', $(this).prop('checked'));
    });
    $('.check-all').on('click', function () {
        $(this).parents().find('.checkbox-childrent').prop('checked', $(this).prop('checked'));
    });
});
