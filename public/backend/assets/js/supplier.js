
    $('#supplierForm').on('submit', function(e) {
        e.preventDefault();

        $('#submitBtn').attr('disabled', true);
        $('#spinner').removeClass('d-none');
        $('#submitBtnText').text('Saving...');

        let formData = new FormData(this);

        $.ajax({
            url: supplierStoreRoute,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE SUPPLIER');
                $('#supplierForm')[0].reset();

                // Toastr Success
                toastr.success('Supplier successfully added!');
            },
            error: function(xhr) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE SUPPLIER');

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



    // Delete Supplier Data
    $(document).ready(function () {
            $(document).on("click", ".delete-supplier-btn", function (e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest(".delete-supplier-form");
                const supplierID = form.data("id");
                const deleteUrl = deleteSupplierData.replace(':id', supplierID);
                const csrfToken = form.find('input[name="_token"]').val();

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will delete the field of supplier permanently.",
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
                                    $("#supplierRow-" + supplierID).remove();

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


        // Status change 

        $(document).on('click', '.status-toggle-btn', function(e) {
            e.preventDefault();

            let button = $(this);
            let districtId = button.data('id');

            $.ajax({
                url: supplierStatusRoute,
                type: 'POST',
                data: {
                    _token: csrfToken,
                    id: districtId
                },
                success: function(response) {
                    if (response.status) {
                        button.text(response.new_status);
                        button.removeClass('btn-success btn-danger').addClass(response.class);
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
    
    
    
    // Pagelength override scripts
    $.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });
    $(document).ready(function() {
        $('#supplierDataTable').DataTable();
    });