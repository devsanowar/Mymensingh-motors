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