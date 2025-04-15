<!-- Navbar -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark py-3">
    <div class="container">
        <a href="{{ route('cart') }}" class="navbar-brand" style="font-weight: bold;"><span class="fa-solid fa-user"></span>
            {{ Auth::user()->name }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#shop" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link">Cart</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
