<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/squircle.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/703d23d85d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/top-nav.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/cart-hero.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/bg-image.css">
    <link rel="stylesheet" href="css/sponsors.css">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>

    @include('partials.loader')


    @yield('content')


    @include('partials.footer')


    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tab navigation
            $('.category-filter a').on('click', function (e) {
                e.preventDefault();
                const target = $(this).data('target');
                $('.category-filter a, .section-container').removeClass('active');
                $(this).addClass('active');
                $('#' + target).addClass('active');

                if (target === 'cart-section') initializeCart();
            });

            // Initialize immediately if cart-section is active
            if ($('#cart-section').hasClass('active')) {
                initializeCart();
            }

            function initializeCart() {
                // Quantity - / +
                $('.quantity-left-minus').on('click', function () {
                    const input = $(this).siblings('input');
                    let value = Math.max(parseInt(input.val()) - 1, parseInt(input.attr('min') || 1));
                    input.val(value);
                    updateQuantity($(this).closest('tr'));
                });

                $('.quantity-right-plus').on('click', function () {
                    const input = $(this).siblings('input');
                    let value = Math.min(parseInt(input.val()) + 1, parseInt(input.attr('max') || 100));
                    input.val(value);
                    updateQuantity($(this).closest('tr'));
                });

                $('.quantity input').on('change', function () {
                    let val = parseInt($(this).val()) || 1;
                    const min = parseInt($(this).attr('min')) || 1;
                    const max = parseInt($(this).attr('max')) || 100;

                    val = Math.min(Math.max(val, min), max);
                    $(this).val(val);
                    updateQuantity($(this).closest('tr'));
                });

                // Remove item
                $('.product-remove a').on('click', function (e) {
                    e.preventDefault();
                    const row = $(this).closest('tr');
                    const key = row.data('key');

                    $.post({
                        url: '/cart/remove',
                        data: { key, _token: csrfToken },
                        success: function () {
                            row.remove();
                            updateCartTotals();

                            if (!$('#cart-section tbody tr').length) {
                                $('#cart-section tbody').html(`
                                    <tr><td colspan="7" class="text-center">Your cart is empty.</td></tr>
                                `);
                                $('.cart-subtotal, .cart-grand-total').text('₱0.00');
                            }
                        },
                        error: function () {
                            alert('Failed to remove item from cart.');
                        }
                    });
                });

                updateCartTotals();
            }

            function updateQuantity(row) {
                const quantity = parseInt(row.find('.quantity input').val());
                const key = row.data('key');

                $.post({
                    url: '/cart/update',
                    data: { key, quantity, _token: csrfToken },
                    success: function () {
                        const price = parseFloat(row.find('.price').text().replace('₱', '')) || 0;
                        const newTotal = price * quantity;
                        row.find('.total').text(`₱${newTotal.toFixed(2)}`);
                        updateCartTotals();
                    },
                    error: function () {
                        alert('Failed to update quantity.');
                    }
                });
            }

            function updateCartTotals() {
                let subtotal = 0;

                $('#cart-section tbody tr').each(function () {
                    const row = $(this);
                    const price = parseFloat(row.find('.price').text().replace('₱', '')) || 0;
                    const quantity = parseInt(row.find('.quantity input').val()) || 0;
                    const total = price * quantity;

                    row.find('.total').text(`₱${total.toFixed(2)}`);
                    subtotal += total;
                });

                const discount = 15; // static discount
                const grandTotal = subtotal - discount;

                $('.cart-subtotal').text(`₱${subtotal.toFixed(2)}`);
                $('.cart-grand-total').text(`₱${grandTotal.toFixed(2)}`);
            }
        });
    </script>
</body>

</html>
