// resources/js/cart.js
function initializeCart() {
    // Add to cart form submission
    $(document).off('submit', '.add-to-cart-form').on('submit', '.add-to-cart-form', function(e) {
        e.preventDefault();
        e.stopPropagation();

        let form = $(this);
        let formData = form.serialize();
        let button = form.find('.buy-btn');
        let spinner = button.find('.spinner-border');

        button.prop('disabled', true);
        spinner.removeClass('d-none');
        button.find('.btn-text').addClass('d-none');

        $.ajax({
            url: route('addToCart'),
            method: "POST",
            data: formData,
            success: function(response) {
                toastr.success(response.message, '', { 
                    timeOut: 1500,
                    positionClass: 'toast-bottom-right'
                });
                
                $('.cart_count, #cart-count').text(response.itemCount);
                $('#mini-cart-container').html(response.mini_cart_html);
                
                if (response.subtotal) {
                    $('.cart-subtotal-amount').text('৳' + response.subtotal);
                }
            },
            error: function(xhr) {
                toastr.error(
                    xhr.responseJSON?.message || 'Failed to add product.', 
                    '', { 
                        timeOut: 2000,
                        positionClass: 'toast-bottom-right'
                    }
                );
            },
            complete: function() {
                button.prop('disabled', false);
                spinner.addClass('d-none');
                button.find('.btn-text').removeClass('d-none');
            }
        });
    });
}

$(document).ready(function() {
    initializeCart();
});