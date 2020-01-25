$(window).ready(function() {
    $('.btn-group').click(function(e) {
        var id = $(this).attr('data-attr-id');
        var link = BASE_URL + '/permission/delete_group/' + id;

        $('#btn-delete-perm').attr('href', link);
        $('#confirm_action').modal({ show: true });
        e.preventDefault();
    });

    $('.btn-perm').click(function(e) {
        var id = $(this).attr('data-attr-id');
        var link = BASE_URL + '/permission/delete/' + id;

        $('#btn-delete-perm').attr('href', link);
        $('#confirm_action').modal({ show: true });
        e.preventDefault();
    });

});