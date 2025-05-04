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
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/bg-image.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>

    @include('partials.loader')

    @yield('content')


    @include('partials.footer')



    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function() {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            function fetchProducts(category, search) {
                $.ajax({
                    url: '{{ route('shop.filter') }}',
                    method: 'GET',
                    data: {
                        category,
                        search
                    },
                    beforeSend: function() {
                        $('#loading').show();
                        $('#products-container').html('');
                    },
                    success: function(response) {
                        $('#products-container').html(response.html);
                    },
                    error: function() {
                        $('#products-container').html(
                            '<div class="text-center text-danger">Error loading results.</div>');
                    },
                    complete: function() {
                        $('#loading').hide();
                    }
                });
            }

            // Filter by category
            $('.category-btn').on('click', function() {
                $('.category-btn').removeClass('active');
                $(this).addClass('active');
                const category = $(this).data('category');
                const search = $('input[name="search"]').val();
                fetchProducts(category, search);
            });

            // Search form
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                const search = $('input[name="search"]').val();
                const category = $('.category-btn.active').data('category') || 'all';
                fetchProducts(category, search);
            });

            // Add to cart
            $('#products-container').on('click', '.add-to-cart-btn', function() {
                const button = $(this);
                const productId = button.data('id');
                const productType = button.data('type');
                const productName = button.closest('.product-card').find('.product-title').text();

                $.post({
                    url: '{{ route('cart.add') }}',
                    data: {
                        id: productId,
                        type: productType,
                        _token: csrfToken
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Cart!',
                            text: `"${productName}" has been added to your cart.`,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: xhr.responseJSON.message || 'Error adding to cart.'
                        });
                    }
                });
            });


            // Quantity update (if used in shop view)
            $('.quantity input').on('change', function() {
                const row = $(this).closest('.cart-row');
                updateQuantity(row);
            });

            function updateQuantity(row) {
                const quantity = parseInt(row.find('.quantity input').val());
                const key = row.data('key');

                $.post({
                    url: '/cart/update',
                    data: {
                        key,
                        quantity,
                        _token: csrfToken
                    },
                    success: function() {
                        // Optionally update cart summary
                    },
                    error: function() {
                        alert('Failed to update quantity.');
                    }
                });
            }
        });
    </script>

</body>

</html>
