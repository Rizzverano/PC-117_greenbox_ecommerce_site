<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Welcome To {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<nav class="navbar navbar-expand-lg navbar-light ftco_navbar ftco-navbar-light sticky-top" style="background-color: rgba(0, 0, 0, 0.5);" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}" style="font-weight: bold; color: white;"><img
                src="img/favicon.png" alt="logo" height="30">{{ config('app.name') }}
        </a>
    </div>
</nav>

<body>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
        background-image: url("img/bg-foods.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        }

        .card{
            background-color: rgba(0, 0, 0, 0.5);
        }

    </style>
    @yield('auth')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
</body>

</html>
