$(document).ready(function() {
            $(".delete-field-of-income-btn").click(function(e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest(".delete-field-of-income-form");
                const fieldOfCostId = form.data("id");
                const deleteUrl = fieldOfIncometDestroy.replace(':id',
                    fieldOfCostId);
                const csrfToken = form.find('input[name="_token"]').val();

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the field of income permanently.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "POST",
                            data: {
                                _token: csrfToken,
                                _method: "DELETE"
                            },
                            success: function(response) {
                                console.log(response);

                                if (response.success) {
                                    Swal.fire("Deleted!", response.success, "success");
                                    $("#field_of_incomeRow-" + fieldOfCostId).remove();
                                } else if (response.error) {
                                    Swal.fire("Error!", response.error, "error");
                                } else {
                                    Swal.fire("Error!", "Deletion failed.", "error");
                                }
                            },
                            error: function(xhr) {
                                let errorMsg = "Something went wrong.";
                                if (xhr.responseJSON && xhr.responseJSON.error) {
                                    errorMsg = xhr.responseJSON.error;
                                }
                                Swal.fire("Error!", errorMsg, "error");
                                console.error(xhr.responseText);
                            }

                        });
                    }
                });
            });
        });




$(document).on('click', '.status-toggle-btn', function(e) {
    e.preventDefault();

    let button = $(this);
    let fieldOfCostId = button.data('id');

    $.ajax({
        url: fieldOfIncomeStatusChangeRoute,
        type: 'POST',
        data: {
            _token: csrfToken,
            id: fieldOfCostId
        },
        success: function(response) {
            if (response.status) {
                button.text(response.new_status);
                button.removeClass('btn-success btn-danger').addClass(response.class);

                $('.editFieldOfCost[data-id="' + fieldOfCostId + '"]').data(
                    'status',
                    response.new_status === 'Active' ? 1 : 0
                );

                $('.editFieldOfCost[data-id="' + fieldOfCostId + '"]').data('name', response.new_name);

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
    $(".editFieldOfIncome").click(function() {
        const fieldOfIncomeId = $(this).data("id");
        const fieldName = $(this).data("name");
        const status = $(this).data("status");

        $("#edit_field_of_income_id").val(fieldOfIncomeId);
        $("#edit_field_name").val(fieldName);

        $("#edit_is_active").val(status == 1 ? "1" : "0");

        $('#edit_is_active').trigger('change');

        const updateUrl = fieldOfIncomeUpdateRoute.replace(':id', fieldOfIncomeId);
        $("#editFieldOfIncomeForm").attr('action', updateUrl);

            $("#editFielOfIncomeModal").modal("show");
        });
});


