    
        $('#purchaseForm').on('submit', function(e) {
        e.preventDefault();

        $('#submitBtn').attr('disabled', true);
        $('#spinner').removeClass('d-none');
        $('#submitBtnText').text('Saving...');

        let formData = new FormData(this);

        $.ajax({
            url: purchaseStoreRoute,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE PURCHASE');

                // সম্পূর্ণ form reset
                $('#purchaseForm')[0].reset();
                $('#purchaseForm').find('select').val('').trigger('change'); // select2 বা dropdown রিসেট
                $('#purchaseForm').find('textarea').val(''); // textarea রিসেট
                $('#purchaseForm').find('input[type="file"]').val(''); // file input রিসেট
                $('#productTable tbody').empty(); // dynamic product row clear (যদি থাকে)

                // Toastr Success
                toastr.success('Purchase successfully done!');
            },
            error: function(xhr) {
                // Reset UI
                $('#submitBtn').attr('disabled', false);
                $('#spinner').addClass('d-none');
                $('#submitBtnText').text('SAVE PURCHASE');

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




    // get balance with calculate for for purchase

    let openingBalanceSigned = 0; // signed value (receivable হলে negative)
        let productIndex = 0;

        $(document).ready(function() {
            const supplierSelect = $('select[name="supplier_id"]');
            const productSelect = $('#product_model');
            const totalDiscount = $('#total_discount');
            const transportCost = $('#transport_cost');
            const paidAmount = $('#paid_amount');

            supplierSelect.on('change', function() {
                const supplierId = $(this).val();
                if (!supplierId) return;

                $.ajax({
                    url : `${supplierBalanceUrl}/${supplierId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        openingBalanceSigned = parseFloat(data.previous_balance) || 0;

                        $('#opening_balance_view').val(Math.abs(openingBalanceSigned).toFixed(
                            2));

                        $('#opening_balance_signed').val(openingBalanceSigned);

                        const t = (data.balance_type || 'payable').toLowerCase();
                        const nice = t.charAt(0).toUpperCase() + t.slice(1);
                        const $bt = $('#balance_type');

                        $bt.val(nice);

                        if (t === 'receivable') {
                            $bt.css({
                                backgroundColor: 'red',
                                color: 'white'
                            });
                        } else {
                            $bt.css({
                                backgroundColor: 'green',
                                color: 'white'
                            });
                        }

                        calculateTotals();
                    },
                    error: function(xhr) {
                        console.error("Error loading supplier balance:", xhr.responseText);
                    }
                });
            });


            productSelect.on('change', function() {
                const option = $(this).find('option:selected');
                if (!option.val()) return;

                const productId = option.val();

                if ($(`#purchase_items input[type="hidden"][value="${productId}"]`).length) {
                    $(this).prop('selectedIndex', 0);
                    return;
                }

                const productName = option.data('name');
                const productModel = option.data('model');
                const purchasePrice = parseFloat(option.data('price')) || 0;

                const sl = $('#purchase_items tr').length + 1;
                const idx = productIndex++;

                const row = `<tr data-idx="${idx}">
                            <td class="sl">${sl}</td>
                            <td>
                                ${productName}
                                <input type="hidden" name="products[${idx}][id]" value="${productId}">
                            </td>

                            <td>
                                <input type="number" name="products[${idx}][qty]" class="form-control qty" value="1" min="1">
                            </td>
                            <td>
                                <input type="number" name="products[${idx}][price]" class="form-control price" value="${purchasePrice.toFixed(2)}" step="0.01" min="0">
                            </td>
                            <td>
                                <input type="text" class="form-control row-total" readonly value="${purchasePrice.toFixed(2)}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                            </td>
                        </tr>`;

                $('#purchase_items').append(row);
                productSelect.prop('selectedIndex', 0);
                calculateTotals();
            });


            $('#purchase_items').on('input', '.qty, .price', function() {
                const row = $(this).closest('tr');
                const qty = parseFloat(row.find('.qty').val()) || 0;
                const price = parseFloat(row.find('.price').val()) || 0;
                row.find('.row-total').val((qty * price).toFixed(2));
                calculateTotals();
            });

            $('#purchase_items').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                reindexSL();
                calculateTotals();
            });

            totalDiscount.on('input', calculateTotals);
            transportCost.on('input', calculateTotals);
            paidAmount.on('input', calculateTotals);
        });

        function reindexSL() {
            $('#purchase_items tr').each(function(i) {
                $(this).find('.sl').text(i + 1);
            });
        }



        function calculateTotals() {
            let total = 0;

            $('.row-total').each(function() {
                total += parseFloat($(this).val()) || 0;
            });

            const discount = parseFloat($('#total_discount').val()) || 0;
            const transport = parseFloat($('#transport_cost').val()) || 0;
            const paid = parseFloat($('#paid_amount').val()) || 0;

            const grandTotal = total - discount + transport;
            const currentBalance = grandTotal + openingBalanceSigned - paid;

            $('#total').val(total.toFixed(2));
            $('#grand_total').val(grandTotal.toFixed(2));

            $('#current_balance_signed').val(currentBalance.toFixed(2));

            $('#current_balance_view').val(Math.abs(currentBalance).toFixed(2));

            const balanceTypeField = $('#current_balance_type');
            if (currentBalance < 0) {
                balanceTypeField.val('Receivable')
                    .css('background-color', 'red')
                    .css('color', 'white');
            } else {
                balanceTypeField.val('Payable')
                    .css('background-color', 'green')
                    .css('color', 'white');
            }
        }
    


    // Purchase filter
    
    $(document).ready(function () {
        // Filter form submit
        $('#purchaseFilterForm').on('submit', function (e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: purchaseFilter,
                type: "GET",
                data: formData,
                beforeSend: function() {
                    // Show Loading Spinner before data loads
                    $('#purchaseTableBody').html(`
                        <tr>
                            <td colspan="9" class="loading-spinner">
                                <i class="material-icons">autorenew</i> Loading, please wait...
                            </td>
                        </tr>
                    `);
                },
                success: function (response) {
                    renderPurchaseRows(response.purchases);
                    $('#grandTotalSum').text(response.grand_total_sum);
                    $('#dueSum').text(response.due_sum);
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Delete button click
        $(document).on('click', '.delete-purchase-btn', function (e) {
            e.preventDefault();

            const $btn       = $(this);
            const form       = $btn.closest('.delete-purchase-form');
            const purchaseId = form.data('id');
            const $row       = form.closest('tr');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (!result.isConfirmed) return;

                $.ajax({
                    url: purchaseDeleteUrl.replace(':id', purchaseId),
                    type: "POST",
                    data: {
                        _token: csrfToken,
                        _method: "DELETE"
                    },
                    beforeSend: function () {
                        $btn.prop('disabled', true).html('<i class="material-icons spin">autorenew</i>');
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Purchase has been deleted successfully.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // **REAL TIME COUNT UPDATE**
                        const deletedCountEl = $("#deletedCountNumber");
                        let deletedCount = parseInt(deletedCountEl.text(), 10);
                        if (isNaN(deletedCount)) {
                            deletedCount = 0;
                        }
                        deletedCountEl.text(deletedCount + 1); // counter increment

                        // Remove row from table
                        $row.remove();

                        // If table empty, show 'No data found'
                        const $tbody = $('#purchaseTableBody');
                        if ($tbody.find('tr').length === 0) {
                            $tbody.html(`<tr><td colspan="9" class="text-center">No data found</td></tr>`);
                        } else {
                            // Re-index SL column
                            $tbody.find('tr').each(function (i) {
                                $(this).find('td:first').text(i + 1);
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong while deleting.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    },
                    complete: function () {
                        $btn.prop('disabled', false).html('<i class="material-icons">delete</i>');
                    }
                });
            });
        });

    });

    // Render purchase rows
    function renderPurchaseRows(purchases) {
        let rows = '';

        if (purchases.length > 0) {
            purchases.forEach((purchase, index) => {
                rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${purchase.purchase_date}</td>
                        <td>${purchase.voucher_number}</td>
                        <td>${purchase.supplier.supplier_name}</td>
                        <td>${purchase.supplier.phone}</td>
                        <td>${purchase.grand_total}</td>
                        <td>${purchase.paid_amount}</td>
                        <td>${purchase.current_balance}</td>
                        <td>
                            <a href="/admin/purchase/${purchase.id}" class="btn btn-info btn-sm view-purchase-btn" data-id="${purchase.id}">
                                <i class="material-icons text-white">visibility</i>
                            </a>

                            <a href="/admin/purchase/${purchase.id}/edit" class="btn btn-warning btn-sm">
                                <i class="material-icons text-white">edit</i>
                            </a>

                            <form class="d-inline-block delete-purchase-form" data-id="${purchase.id}">
                                <input type="hidden" name="_token" value="${csrfToken}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger btn-sm delete-purchase-btn">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
            });
        } else {
            rows = `<tr><td colspan="9" class="text-center">No data found</td></tr>`;
        }

        $('#purchaseTableBody').html(rows);
    }



    // Restore Deleted data

        $(document).ready(function () {
        $(".restore-purchase-btn").click(function (e) {
            e.preventDefault();

            const button = $(this);
            const form = button.closest(".restore-purchase-form");
            const purchaseId = form.data("id");
            const csrfToken = form.find('input[name="_token"]').val();
            const restoreUrl = restorePurchaseData.replace(':id', purchaseId);

            $.ajax({
                url: restoreUrl,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success);
                        $("#purchaseRow-" + purchaseId).remove();

                        const countElement = $("#deletedPurchaseCount");
                        let currentCount = parseInt(countElement.text());

                        if (!isNaN(currentCount) && currentCount > 0) {
                            countElement.text(currentCount - 1);
                        }
                    } else {
                        toastr.error("Something went wrong.");
                    }
                },
                error: function () {
                    toastr.error("Failed to restore the purchase.");
                }
            });
        });
    });


    // Permanantly delete data

    $(document).ready(function() {
        $(".permanent-delete-purchase-btn").click(function(e) {
            e.preventDefault();

            const button = $(this);
            const form = button.closest(".permanent-delete-purchase-form");
            const fieldPurchaseId = form.data("id");
            const deleteUrl = deleteTrashedData.replace(':id',
                fieldPurchaseId);
            const csrfToken = form.find('input[name="_token"]').val();

            Swal.fire({
                title: "Are you sure?",
                text: "This will delete the field of purchase permanently.",
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
                                $("#purchaseRow-" + fieldPurchaseId).remove();


                                const countElement = $("#deletedPurchaseCount");
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




    
    // Pagelength override scripts
    $.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });
    $(document).ready(function() {
        $('#purchaseDataTable').DataTable();
    });