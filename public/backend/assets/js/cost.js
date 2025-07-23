$(document).ready(function () {
    // Delete confirmation for dynamically loaded content
    $(document).on('click', '.show_confirm', function (event) {
        event.preventDefault();
        let form = $(this).closest("form");

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
            }
        });
    });
});



// Create cost

$('#costForm').on('submit', function(e) {
        e.preventDefault();

        // Show spinner and disable submit button
        $('#submitBtn').attr('disabled', true);
        $('#spinner').removeClass('d-none');
        $('#submitBtnText').text('Saving...');

        let formData = new FormData(this);

        $.ajax({
            url: storeCostData,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE COST');
                $('#costForm')[0].reset();

                // Toastr Success
                toastr.success('Cost successfully added!');
            },
            error: function(xhr) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE COST');

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





    // Pagelength override scripts
    $.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });
    $(document).ready(function() {
        $('#costDataTable').DataTable();
    });


    // Cost data filter script

    $(document).ready(function () {
    $('#filterForm').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: typeof costFilterUrl !== 'undefined' ? costFilterUrl : '/admin/costs/filter',
            type: 'GET',
            data: formData,
            beforeSend: function () {
                $('#costTableBody').html('<tr><td colspan="8" class="text-center">Loading...</td></tr>');
            },
            success: function (response) {
                $('#costTableBody').html(response.html);
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


// Cost data show

$(document).ready(function () {
    // Cost View Modal Button
    $('#costTableBody').on('click', '.view-cost-btn', function (e) {
        e.preventDefault();

        var costId = $(this).data('id');

        $.ajax({
            url: routes.costShow + '/' + costId, // Use passed route
            type: 'GET',
            success: function (data) {
                $('#cost-date').text(data.date);
                $('#cost-category').text(data.category ? data.category.category_name : 'N/A');
                $('#cost-field').text(data.field ? data.field.field_name : 'N/A');
                $('#cost-description').text(data.description);
                $('#cost-amount').text(data.amount);
                $('#cost-spend-by').text(data.spend_by);

                $('#costDetailsModal').modal('show');
            },
            error: function () {
                alert('Could not load cost details.');
            }
        });
    });
});



    

