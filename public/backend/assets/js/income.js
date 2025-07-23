$('#incomeForm').on('submit', function(e) {
        e.preventDefault();

        // Show spinner and disable submit button
        $('#submitBtn').attr('disabled', true);
        $('#spinner').removeClass('d-none');
        $('#submitBtnText').text('Saving...');

        let formData = new FormData(this);

        $.ajax({
            url: incomeStoreRoute,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE INCOME');
                $('#incomeForm')[0].reset();

                // Toastr Success
                toastr.success('Income successfully added!');
            },
            error: function(xhr) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE INCOME');

                // Validation errors
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });
    });


        // Show data

        $(document).ready(function() {
            $(document).on('click', '.view-income-btn', function(e) {
                e.preventDefault();

                var incomeId = $(this).data('id');

                $.ajax({
                    url: showIncomeData + incomeId,
                    type: 'GET',
                    success: function(data) {
                        $('#income-date').text(data.date);
                        $('#income-category').text(data.category ? data.category.category_name : 'N/A');
                        $('#income-field').text(data.field ? data.field.field_name : 'N/A');
                        $('#income-description').text(data.description);
                        $('#income-amount').text(data.amount);
                        $('#income-income-by').text(data.income_by);

                        $('#incomeDetailsModal').modal('show');
                    },
                    error: function() {
                        alert('Could not load income details.');
                    }
                });
            });
        });


        // Delete income data
        $(document).ready(function () {
            $(document).on("click", ".delete-income-btn", function (e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest(".delete-income-form");
                const fieldOfIncomeId = form.data("id");
                const deleteUrl = deleteIncomeData.replace(':id', fieldOfIncomeId);
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
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire("Deleted!", response.success, "success");
                                    $("#incomeRow-" + fieldOfIncomeId).remove();

                                    const deletedCountEl = $("#deletedCountNumber");
                                    let deletedCount = parseInt(deletedCountEl.text());
                                    if (!isNaN(deletedCount)) {
                                        deletedCountEl.text(deletedCount + 1);
                                    }

                                } else if (response.error) {
                                    Swal.fire("Error!", response.error, "error");
                                } else {
                                    Swal.fire("Error!", "Deletion failed.", "error");
                                }
                            },
                            error: function (xhr) {
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



        // Restore Deleted data

        $(document).ready(function () {
        $(".restore-income-btn").click(function (e) {
            e.preventDefault();

            const button = $(this);
            const form = button.closest(".restore-income-form");
            const incomeId = form.data("id");
            const csrfToken = form.find('input[name="_token"]').val();
            const restoreUrl = restoreIncomeData.replace(':id', incomeId);

            $.ajax({
                url: restoreUrl,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success);
                        $("#incomeRow-" + incomeId).remove();

                        const countElement = $("#deletedIncomeCount");
                        let currentCount = parseInt(countElement.text());

                        if (!isNaN(currentCount) && currentCount > 0) {
                            countElement.text(currentCount - 1);
                        }
                    } else {
                        toastr.error("Something went wrong.");
                    }
                },
                error: function () {
                    toastr.error("Failed to restore the income.");
                }
            });
        });
    });


    // Permanantly delete data

    $(document).ready(function() {
        $(".permanent-delete-income-btn").click(function(e) {
            e.preventDefault();

            const button = $(this);
            const form = button.closest(".permanent-delete-income-form");
            const fieldOfIncomeId = form.data("id");
            const deleteUrl = deleteTrashedData.replace(':id',
                fieldOfIncomeId);
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
                                $("#incomeRow-" + fieldOfIncomeId).remove();


                                const countElement = $("#deletedIncomeCount");
                                let currentCount = parseInt(countElement.text());

                                if (!isNaN(currentCount) && currentCount > 0) {
                                    countElement.text(currentCount - 1);
                                }

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



    // Income data filter script

    $(document).ready(function () {
    // Filter Form Submission
    $('#filterForm').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: typeof incomeFilterUrl !== 'undefined' ? incomeFilterUrl : '/admin/incomes/filter',
            type: 'GET',
            data: formData,
            beforeSend: function () {
                $('#incomeTableBody').html('<tr><td colspan="8" class="text-center">Loading...</td></tr>');
            },
            success: function (response) {
                $('#incomeTableBody').html(response.html);
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
    });

    // Reset Button
    $('#resetBtn').on('click', function () {
        $('#filterForm')[0].reset();
        $('#filterForm select').val('').trigger('change');
        $('#filterForm').submit();
    });
});


    // Pagelength override scripts
    $.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });
    $(document).ready(function() {
        $('#incomeDataTable').DataTable();
    });