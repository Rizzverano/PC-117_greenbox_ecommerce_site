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
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.6/dist/sweetalert2.min.css" rel="stylesheet">
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            function showLoading(target, message = 'Loading...') {
                $(`#${target}`).html(`
                <div class="text-center py-5">
                    <i class="fas fa-spinner fa-spin fa-3x"></i>
                    <p>${message}</p>
                </div>
            `);
            }

            function reloadSection(section) {
                $.ajax({
                    url: "{{ route('manager.load-section') }}",
                    method: 'GET',
                    data: {
                        section
                    },
                    success: function(response) {
                        $('.content-area').removeClass('active');
                        $(`#${section}`).html(response).addClass('active');
                    },
                    error: function() {
                        $(`#${section}`).html(`
                        <div class="alert alert-danger">Failed to reload ${section}.</div>
                    `);
                    }
                });
            }

            function loadSection(target) {
                const isManager = window.location.pathname.includes('manager');
                const routeUrl = isManager ? "{{ route('manager.load-section') }}" :
                    "{{ route('admin.load-section') }}";

                if (!target || $(`#${target}`).hasClass('active')) return;

                $('.content-area').removeClass('active');
                $(`#${target}`).addClass('active');
                $('.sidebar-item').removeClass('active');
                $(`.sidebar-item[data-target="${target}"]`).addClass('active');

                if ($(`#${target}`).is(':empty')) {
                    showLoading(target, `Loading ${target.replace('-content', '')}...`);

                    $.get(routeUrl, {
                            section: target
                        })
                        .done(response => $(`#${target}`).html(response))
                        .fail(() => {
                            $(`#${target}`).html(`
                            <div class="alert alert-danger">
                                Failed to load content.
                                <button class="btn btn-sm btn-warning retry-load" data-target="${target}">
                                    Retry
                                </button>
                            </div>
                        `);
                        });
                }

                if ($(window).width() < 992) {
                    $('#sidebarContainer').removeClass('show');
                }
            }

            // Event Handlers
            $('#sidebarToggle').click(() => $('#sidebarContainer').toggleClass('show'));

            $('.sidebar-item, .go-to-section').on('click', function(e) {
                e.preventDefault();
                const target = $(this).data('target');
                if (target) loadSection(target);
            });

            $(document).on('click', '.retry-load', function() {
                loadSection($(this).data('target'));
            });

            $(document).on('click', function(e) {
                if ($(window).width() < 992 &&
                    !$(e.target).closest('#sidebarContainer').length &&
                    !$(e.target).closest('#sidebarToggle').length) {
                    $('#sidebarContainer').removeClass('show');
                }
            });

            const initialSection = new URLSearchParams(window.location.search).get('section');
            if (initialSection) {
                $(`.sidebar-item[data-target="${initialSection}"], .go-to-section[data-target="${initialSection}"]`)
                    .trigger('click');
            }

            // AJAX Handlers for Procedures
            $(document).on('click', '#showAddProcedureForm', function(e) {
                e.preventDefault();
                showLoading('procedures-content', 'Loading procedures...');

                fetch("{{ route('procedures.create') }}")
                    .then(res => res.text())
                    .then(html => {
                        $('.content-area').removeClass('active');
                        $('#procedures-content').html(`<div class="dynamic-content">${html}</div>`)
                            .addClass('active');
                    })
                    .catch(err => console.error("Failed to load form:", err));
            });

            $(document).on('click', '.go-back-to-procedures', function(e) {
                e.preventDefault();
                showLoading('procedures-content', 'Loading procedures...');
                reloadSection('procedures-content');
            });

            $(document).on('click', '.btn-edit-procedure, .btn-show-procedure', function(e) {
                e.preventDefault();

                const procedureId = $(this).data('id');
                const isShow = $(this).hasClass('btn-show-procedure');
                const action = isShow ? 'Show' : 'Edit';

                showLoading('procedures-content', `Loading ${action} Procedure...`);

                $.get(`manager/sections/procedures/${procedureId}${isShow ? '' : '/edit'}`)
                    .done(response => {
                        $('#procedures-content').html(response).addClass('active');
                    })
                    .fail(() => {
                        $('#procedures-content').html(`
                        <div class="alert alert-danger">
                            Failed to load the ${action} Procedure form.
                        </div>
                    `);
                    });
            });

            $(document).on('click', '.btn-delete-procedure', function(e) {
                e.preventDefault();

                const procedureId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This procedure will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        showLoading('procedures-content', 'Deleting procedure...');

                        $.ajax({
                            url: `manager/sections/procedures/${procedureId}`,
                            method: 'DELETE',
                            data: {
                                _token: csrfToken
                            },
                            success: () => {
                                reloadSection('procedures-content');
                                Swal.fire(
                                    'Deleted!',
                                    'The procedure has been deleted.',
                                    'success'
                                );
                            },
                            error: (xhr) => {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete the procedure.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // AJAX form submission for Add/Edit Procedure
            $(document).on('submit', '#addProcedureForm, #editProcedureForm', function(e) {
                e.preventDefault();

                const isEdit = this.id === 'editProcedureForm';
                const actionText = isEdit ? 'Updating' : 'Saving';
                const formData = new FormData(this);

                showLoading('procedures-content', `${actionText} procedure...`);

                $.ajax({
                    url: $(this).attr('action'),
                    method: isEdit ? 'PATCH' : 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: () => reloadSection('procedures-content'),
                    error: (xhr) => {
                        console.error(xhr.responseText);
                        $('#procedures-content').html(`
                        <div class="alert alert-danger">
                            Failed to ${isEdit ? 'update' : 'save'} procedure. Please check your input or try again later.
                        </div>
                    `);
                    }
                });
            });

        });
    </script>

    @stack('scripts')
</body>

</html>
