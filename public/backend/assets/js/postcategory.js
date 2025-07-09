$.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });

    $(document).ready(function() {
        $('#postCategoryDataTable').DataTable();
    });


$(document).on('click', '.status-toggle-btn', function(e) {
    e.preventDefault();

    let button = $(this);
    let categoryId = button.data('id');

    $.ajax({
        url: categoryStatusRoute,
        type: 'POST',
        data: {
            _token: csrfToken,
            id: categoryId
        },
        success: function(response) {
            if (response.status) {
                button.text(response.new_status);
                button.removeClass('btn-success btn-danger').addClass(response.class);

                $('.editcategory[data-id="' + categoryId + '"]').data(
                    'status',
                    response.new_status === 'Active' ? 1 : 0
                );

                $('.editcategory[data-id="' + categoryId + '"]').data('name', response.new_name);

                
                toastr.success(response.message, 'Success', {
                    timeOut: 1500,
                    closeButton: true,
                    progressBar: true
                });
            } else {
                toastr.error(response.message, 'Error');
            }
        },
        error: function(xhr) {
            alert('Something went wrong!');
        }
    });
});



