@extends('shoplayout.shoplayout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-shop')

    <!-- Dishes -->
     <div class="container py-5" id="shop">
        <h2 class="text-center mb-4">Greenbox <span class="text-dark">Menus</span></h2>
        <!-- Search Form -->
        <form id="search-form" class="text-center mb-4">
            <div class="search d-inline-flex">
                <input type="text" name="search" placeholder="Search.." value="{{ request('search') }}">
                <button type="submit" id="search" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        <!-- Category Filters -->
        <div class="category-filter text-center">
            <button class="category-btn btn btn-outline-primary active" data-category="all">All Dishes</button>
            <button class="category-btn btn btn-outline-primary" data-category="vegefruit">Vegetables &amp;
                Fruits</button>
            <button class="category-btn btn btn-outline-primary" data-category="meat">Meats</button>
            <button class="category-btn btn btn-outline-primary" data-category="seafood">Seafoods</button>
        </div>

                <!-- Loading Spinner -->
        <div id="loading" style="display: none;" class="text-center mt-3">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4" id="products-container">
            @include('partials.shop-products', ['products' => $products])
    </div>
</div>

    @include('section.services')

@endsection
