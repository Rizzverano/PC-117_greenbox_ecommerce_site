<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ingredients Management System')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/squircle.js"></script>
    <link rel="stylesheet" href="{{ asset('css/role.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @include('partials.loader')

    @yield('content')
    @include('roles.sidebar-toggle')


    <!-- JavaScript -->
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sidebar toggle
            $('#sidebarToggle').click(function() {
                $('#sidebarContainer').toggleClass('show');
            });

            // AJAX navigation handler
            function loadSection(target) {
                const isManager = window.location.pathname.includes('manager');
                const routeUrl = isManager ? "{{ route('manager.load-section') }}" :
                    "{{ route('admin.load-section') }}";

                if (!target || $(`#${target}`).hasClass('active')) return;

                // Update UI
                $('.content-area').removeClass('active');
                $(`#${target}`).addClass('active');
                $('.sidebar-item').removeClass('active');
                $(`.sidebar-item[data-target="${target}"]`).addClass('active');

                if ($(`#${target}`).is(':empty')) {
                    $.ajax({
                        url: routeUrl,
                        method: 'GET',
                        data: {
                            section: target
                        },
                        beforeSend: function() {
                            $(`#${target}`).html(`
                            <div class="text-center py-5">
                                <i class="fas fa-spinner fa-spin fa-3x"></i>
                                <p>Loading ${target.replace('-content', '')}...</p>
                            </div>
                        `);
                        },
                        success: function(response) {
                            $(`#${target}`).html(response);
                        },
                        error: function() {
                            $(`#${target}`).html(`
                            <div class="alert alert-danger">
                                Failed to load content.
                                <button class="btn btn-sm btn-warning retry-load" data-target="${target}">
                                    Retry
                                </button>
                            </div>
                        `);
                        }
                    });
                }

                if ($(window).width() < 992) {
                    $('#sidebarContainer').removeClass('show');
                }
            }

            // Navigation events
            $('.sidebar-item, .go-to-section').on('click', function(e) {
                e.preventDefault();
                const target = $(this).data('target');
                if (target) loadSection(target);
            });

            $(document).on('click', '.retry-load', function() {
                const target = $(this).data('target');
                loadSection(target);
            });

            $(document).on('click', function(e) {
                if ($(window).width() < 992 &&
                    !$(e.target).closest('#sidebarContainer').length &&
                    !$(e.target).closest('#sidebarToggle').length) {
                    $('#sidebarContainer').removeClass('show');
                }
            });

            // ✅ Auto-load section from query string
            const urlParams = new URLSearchParams(window.location.search);
            const initialSection = urlParams.get('section');
            if (initialSection) {
                $(`.sidebar-item[data-target="${initialSection}"], .go-to-section[data-target="${initialSection}"]`)
                    .trigger('click');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
