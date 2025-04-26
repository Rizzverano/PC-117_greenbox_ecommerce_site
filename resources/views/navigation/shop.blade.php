@extends('shoplayout.shoplayout')

@section('content')

@include('section.nav-top')

@include('section.navbar')

@include('partials.bg-shop')

<!-- Dishes -->
<div class="container py-5" id="shop">
    <h2 class="text-center mb-4">Greenbox <span class="text-dark">Menus</span></h2>
    <div class="search">
        <input type="text" placeholder="Search.."><span id="search" class="fa-solid fa-magnifying-glass"></span>
    </div>

    <!-- Category Filters -->
    <div class="category-filter text-center">
        <button class="category-btn btn btn-outline-primary active" data-category="all">All Dishes</button>
        <button class="category-btn btn btn-outline-primary" data-category="vegetables">Vegetables &amp;
            Fruits</button>
        <button class="category-btn btn btn-outline-primary" data-category="meats">Meats</button>
        <button class="category-btn btn btn-outline-primary" data-category="seafoods">Seafoods</button>
    </div>

    <!-- Products Grid -->
    <div class="row g-4" id="products-container">
        @foreach ($vegefruits as $vegefruit)
            <!-- Veges & Fruits Dish -->
            <div class="col-md-4 col-sm-6 product-card" data-category="vegetables">
                <a class="myshow" href="{{ route('vegefruits.show', $vegefruit->id) }}">
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $vegefruit->image) }}" alt="{{ $vegefruit->name }}">
                    </div>
                    <div class="product-info">
                        <h5 class="product-title">{{ $vegefruit->name }}</h5>
                </a>
                <p class="product-description">{{ $vegefruit->intro }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="product-price">₱{{ $vegefruit->price }}.00</span>
                    <button class="btn btn-sm btn-outline-primary">Add to Cart</button>
                </div>
            </div>
    </div>
    @endforeach <!-- Foreach needs only one product card to avoid redundancy -->

    <!-- Meats Dish -->
    @foreach ($meats as $meat)
        <div class="col-md-4 col-sm-6 product-card" data-category="meats">
            <a class="myshow" href="{{ route('meats.show', $meat->id) }}">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $meat->image) }}" alt="{{ $meat->name }}">
                </div>
                <div class="product-info">
                    <h5 class="product-title">{{ $meat->name }}</h5>
            </a>
            <p class="product-description">{{ $meat->intro }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="product-price">₱{{ $meat->price }}.00</span>
                <button class="btn btn-sm btn-outline-primary">Add to Cart</button>
            </div>
        </div>
</div>
@endforeach

<!-- Seafoods Dish -->
@foreach ($seafoods as $seafood)
    <div class="col-md-4 col-sm-6 product-card" data-category="seafoods">
        <a class="myshow" href="{{ route('seafoods.show', $seafood->id) }}">
            <div class="product-image">
                <img src="{{ asset('storage/' . $seafood->image) }}" alt="{{ $seafood->name }}">
            </div>
            <div class="product-info">
                <h5 class="product-title">{{ $seafood->name }}</h5>
        </a>
        <p class="product-description">{{ $seafood->intro }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <span class="product-price">₱{{ $seafood->price }}.00</span>
            <button class="btn btn-sm btn-outline-primary">Add to Cart</button>
        </div>
    </div>
    </div>
@endforeach
</div>
</div>

@include('section.services')

@endsection
