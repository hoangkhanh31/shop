$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore() {
    const page = $('#page').val();

    $.ajax({
        type: "POST",
        url: '/services/load-product',
        data: { page },
        dataType: "JSON",
        success: function (result) {
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            } else {
                alert('Đã Load Xong Sản Phẩm');
                $('#button-loadMore').addClass('hidden');
            }
        }
    });
}