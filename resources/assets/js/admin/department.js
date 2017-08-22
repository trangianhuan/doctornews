$(document).ready(function () {
    $('.delete-department').on('click', function (e) {
        var url = $(this).data('url');
        var urlRedirect = $('#url-redirect').data('url');
        // $.ajax({
        //     headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
        //     type: 'DELETE',
        //     url: url,
        //     data: {},
        //     success: function (response) {
        //         console.log('thanh cong roi');
        //         console.log('thanhcong', response);
        //         window.location.href = urlRedirect;
        //     },
        //     error: function (e) {
        //         console.log('fail roi');
        //         console.log('that bai', e);
        //         window.location.href = urlRedirect;
        //     }
        // });
        e.preventDefault();
        $('#delete-department-form').attr('action', url).submit();
    });

});



