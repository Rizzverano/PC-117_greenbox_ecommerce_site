@php
$hasResults = $products->isNotEmpty();
@endphp

@if ($hasResults)
@foreach ($products as $product)
    <div class="col-md-4 col-sm-6 product-card" data-category="{{ strtolower(class_basename($product)) }}">
        <a class="myshow" href="{{ route(strtolower(class_basename($product)) . 's.show', $product->id) }}">
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="product-info">
                <h5 class="product-title">{{ $product->name }}</h5>
        </a>
        <p class="product-description">{{ $product->intro }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <span class="product-price">₱{{ $product->price }}.00</span>
            <button class="btn btn-sm btn-outline-primary add-to-cart-btn"
                    data-id="{{ $product->id }}"
                    data-type="{{ strtolower(class_basename($product)) }}"> Add to Cart
            </button>
        </div>
    </div>
</div>
@endforeach
@else
<div class="text-center">
<h5>No products found for "{{ request('search') }}"</h5>
</div>
@endif
