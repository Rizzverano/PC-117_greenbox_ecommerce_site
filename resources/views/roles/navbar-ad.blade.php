    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg top-nav">
        <div class="container">
            <h2 class="mb-0"><i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name }} (Admin)</h2>
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
            <a class="navbar-brand fw-bold" href="{{ route('roles.admin') }}">
                <img src="img/favicon.png" alt="logo" height="35"> {{ config('app.name') }}
            </a>
        </div>
    </nav>
