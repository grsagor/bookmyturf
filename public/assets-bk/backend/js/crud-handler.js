function initDatatable(customOptions = {}) {
    const defaultOptions = {
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: $('.yajra-datatable').data('url'),
        order: [[0, 'desc']],
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    };

    const options = { ...defaultOptions, ...customOptions };
    return $('.yajra-datatable').DataTable(options);
}
$(document).ready(function () {
    $('.create_btn').click(function () {
        let url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('#crud_modal').html(response.html);
                $('#crud_modal').modal('show');
            },
            error: function () {
                toastr.error('Error loading form');
            }
        });
    });

    $(document).on('click', '.edit_btn', function () {
        let url = $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('#crud_modal').html(response.html);
                $('#crud_modal').modal('show');
            },
            error: function () {
                toastr.error('Error loading form');
            }
        });
    });

    $(document).on('click', '.delete_btn', function () {
        if (confirm('Are you sure you want to delete this item?')) {
            let url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        table.ajax.reload();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('Error deleting item');
                }
            });
        }
    });

    $(document).on('click', '#crud_form_submit_btn', function (e) {
        e.preventDefault();
        let form = $('#crud_form');
        let url = form.attr('action');
        let method = form.attr('method');

        $.ajax({
            url: url,
            type: method,
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    $('#crud_modal').modal('hide');
                    toastr.success(response.message);
                    table.ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                // $.each(errors, function (key, value) {
                //     toastr.error(value[0]);
                // });
                
                let errorHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                
                if (errors) {
                    errorHtml += '<ul class="list-unstyled mb-0">';
                    $.each(errors, function (key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                    errorHtml += '</ul>';
                } else if (xhr.responseJSON.msg) {
                    errorHtml += xhr.responseJSON.msg;
                }
                
                errorHtml += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                
                $('#crud_modal .server_side_error').html(errorHtml);
            }
        });
    });
});