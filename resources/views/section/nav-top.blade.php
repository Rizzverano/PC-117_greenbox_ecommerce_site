<!-- Credentials -->
<nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #28a745;">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand" id="logo">
            <img src="img/favicon.png" alt="logo" height="30">
            {{ config('app.name') }}
        </a>

        <div class="ms-auto">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                @method('POST')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
            </form>
        </div>
    </div>
</nav>
