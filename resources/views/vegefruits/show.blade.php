@extends('dishes-layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden; border: none;">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <h2 class="h4 mb-0">{{ $vegefruit->name ?? 'Vegefruit Details' }}</h2>
                    </div>

                    <div class="card-body">
                        @if ($vegefruit)
                            <div class="row g-4">
                                <!-- Image Column -->
                                <div class="col-md-5 col-lg-4">
                                    <div class="text-center p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                                        <img src="{{ asset('storage/' . $vegefruit->image) }}" alt="{{ $vegefruit->name }}"
                                            class="img-fluid rounded shadow" style="max-height: 300px; width: auto; object-fit: contain;">
                                        <div class="mt-3">
                                            <h4 class="text-success m-0">₱{{ number_format($vegefruit->price, 2) }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- Details Column -->
                                <div class="col-md-7 col-lg-8">
                                    <div class="mb-4">
                                        <h4 class="text-muted mb-3">{{ $vegefruit->intro }}</h4>
                                        <p class="lead mb-0" style="line-height: 1.6;">{{ $vegefruit->description }}</p>
                                    </div>

                                    <div class="p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                                        <h5 class="border-bottom pb-2 mb-3" style="color: #28a745;">Ingredients</h5>
                                        <div class="row row-cols-1 row-cols-sm-2 g-2">
                                            @foreach (['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'] as $num)
                                                @if (!empty($vegefruit->{'ingred_' . $num}))
                                                    <div class="col">
                                                        <div class="d-flex align-items-center p-2" style="background-color: white; border-radius: 5px;">
                                                            <i class="fas fa-circle me-2" style="color: #28a745; font-size: 0.5rem;"></i>
                                                            <span>{{ $vegefruit->{'ingred_' . $num} }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-3 mt-4">
                                @if (auth()->check() && auth()->user()->role_id == 0)
                                <a href="#" class="btn btn-success px-4 py-2 flex-grow-1" style="min-width: 120px;">
                                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                </a>
                                @endif
                                @if (auth()->check() && auth()->user()->role_id == 0)
                                <a href="{{ route('shop') }}" class="btn btn-outline-success px-4 py-2 flex-grow-1" style="min-width: 120px;">
                                    <i class="fas fa-arrow-left me-2"></i>Go Back
                                </a>
                                @endif
                                @if (auth()->check() && auth()->user()->role_id == 2 && 1)
                                <a href="{{ route('vegefruits.index') }}" class="btn btn-outline-success px-4 py-2 flex-grow-1" style="min-width: 120px;">
                                    <i class="fas fa-arrow-left me-2"></i>Go Back
                                </a>
                                @endif
                            </div>
                        @else
                            <div class="alert alert-danger mb-0">
                                No vegefruit information found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
