@extends('dishes-layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden; border: none;">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <h2 class="h4 mb-0">{{ $seafood->name ?? 'Seafood Details' }}</h2>
                    </div>

                    <div class="card-body">
                        @if ($seafood)
                            <div class="row g-4">
                                <!-- Image Column -->
                                <div class="col-md-5 col-lg-4">
                                    <div class="text-center p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                                        <img src="{{ asset('storage/' . $seafood->image) }}" alt="{{ $seafood->name }}"
                                            class="img-fluid rounded shadow"
                                            style="max-height: 300px; width: auto; object-fit: contain;">
                                        <div class="mt-3">
                                            <h4 class="text-success m-0">₱{{ number_format($seafood->price, 2) }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- Details Column -->
                                <div class="col-md-7 col-lg-8">
                                    <div class="mb-4">
                                        <h4 class="text-muted mb-3">{{ $seafood->intro }}</h4>
                                        <p class="lead mb-0" style="line-height: 1.6;">{{ $seafood->description }}</p>
                                    </div>

                                    <div class="p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                                        <h5 class="border-bottom pb-2 mb-3" style="color: #28a745;">Ingredients</h5>
                                        <div class="row row-cols-1 row-cols-sm-2 g-2">
                                            @php
                                                $ingredients = [
                                                    'ingred_one',
                                                    'ingred_two',
                                                    'ingred_three',
                                                    'ingred_four',
                                                    'ingred_five',
                                                    'ingred_six',
                                                    'ingred_seven',
                                                    'ingred_eight',
                                                    'ingred_nine',
                                                    'ingred_ten',
                                                ];
                                            @endphp

                                            @foreach ($ingredients as $ingred)
                                                @if (!empty($seafood->$ingred))
                                                    <div class="col">
                                                        <div class="d-flex align-items-center p-2"
                                                            style="background-color: white; border-radius: 5px;">
                                                            <i class="fas fa-circle me-2"
                                                                style="color: #28a745; font-size: 0.5rem;"></i>
                                                            <span>{{ $seafood->$ingred }}</span>
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
                                    <a href="#" id="addToCartBtn" class="btn btn-success px-4 py-2 flex-grow-1"
                                        data-id="{{ $seafood->id }}" data-name="{{ $seafood->name }}" data-type="seafood"
                                        style="min-width: 120px;">
                                        <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                    </a>
                                @endif
                                @if (auth()->check() && auth()->user()->role_id == 0)
                                    <a href="{{ route('shop') }}" class="btn btn-outline-success px-4 py-2 flex-grow-1"
                                        style="min-width: 120px;">
                                        <i class="fas fa-arrow-left me-2"></i>Go Back
                                    </a>
                                @endif
                                @if (auth()->check() && auth()->user()->role_id == 2 && 1)
                                    <a href="{{ route('seafoods.index') }}"
                                        class="btn btn-outline-success px-4 py-2 flex-grow-1" style="min-width: 120px;">
                                        <i class="fas fa-arrow-left me-2"></i>Go Back
                                    </a>
                                @endif
                            </div>
                        @else
                            <div class="alert alert-danger mb-0">
                                No seafood information found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
