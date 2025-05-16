    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg top-nav">
        <div class="container">
            @if (auth()->check() && auth()->user()->role_id == 2)
            <h2 class="mb-0"><i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name }} (Manager)</h2>
            @endif
            @if (auth()->check() && auth()->user()->role_id == 1)
            <a href="#" class="text-decoration-none text-light"><h2 class="mb-0"><i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name }} (Manager)</h2></a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                @method('POST')
            <button class="btn btn-danger">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
            </button>
            </form>
        </div>
    </nav>

    <!-- Brand Navigation -->
    <nav class="navbar navbar-expand-lg brand-nav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('roles.manager') }}">
                <img src="img/favicon.png" alt="logo" height="35"> {{ config('app.name') }}
            </a>
            @if (auth()->check() && auth()->user()->role_id == 2)
            <a href="{{ route('roles.admin') }}"><button class="btn btn-success"><i class="fa-solid fa-arrow-right"></i> Go back</button></a>
            @endif
        </div>
    </nav>
