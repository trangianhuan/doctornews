$(document).ready(function () {
    $('.delete-service').on('click', function (e) {
        var url = $(this).data('url');
        var urlRedirect = $('#url-redirect').data('url');
        e.preventDefault();
        $('#delete-service-form').attr('action', url).submit();
    });

});



