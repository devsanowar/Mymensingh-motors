$('.show_confirm').click(function(event){
    let form = $(this).closest('form');
    event.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });

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


$(document).ready(function() {
            $(".editcategory").click(function() {
                const categoryId = $(this).data("id");
                const categoryName = $(this).data("name");
                const status = $(this).data("status");

                $("#edit_category_id").val(categoryId);
                $("#edit_category_name").val(categoryName);

                $("#edit_is_active").val(status == 1 ? "1" : "0");

                $('#edit_is_active').trigger('change');

                const updateUrl = categoryUpdateRoute.replace(':id', categoryId);
            $("#editCategoryForm").attr('action', updateUrl);

                $("#editCategoryModal").modal("show");
            });
        });


