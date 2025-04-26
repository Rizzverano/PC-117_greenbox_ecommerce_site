<!-- Navbar -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark py-3 sticky-top">
    <div class="container">
        <a href="{{ route('cart') }}" class="navbar-brand" style="font-weight: bold;"><span class="fa-solid fa-user" style="margin-left: 10px;"></span>
            {{ Auth::user()->name }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" style="{{ request()->routeIs('home') ? 'color: #28a745; font-weight: bold;' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop') }}" class="nav-link" style="{{ request()->routeIs('shop') ? 'color: #28a745; font-weight: bold;' : '' }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link" style="{{ request()->routeIs('cart') ? 'color: #28a745; font-weight: bold;' : '' }}"><i class="fa-solid fa-cart-plus"></i>Cart</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link" style="{{ request()->routeIs('about') ? 'color: #28a745; font-weight: bold;' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link" style="{{ request()->routeIs('contact') ? 'color: #28a745; font-weight: bold;' : '' }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
