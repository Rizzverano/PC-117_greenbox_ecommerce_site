<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Welcome To {{ config('app.name') }}</title>
    <link rel="stylesheet" href="css/role.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>
    <nav id="myNav" class="navbar navbar-expand-lg">
        <div class="container">
            <h2 id="myH2"><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}</h2>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a id="roleSec" class="navbar-brand" href="#">
                <img src="img/favicon.png" alt="logo" height="30">{{ config('app.name') }}
            </a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
</body>

</html>
