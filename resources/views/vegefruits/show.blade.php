@extends('crud-layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $vegefruit->name ?? 'Vegefruit Details' }}</h2>
        </div>
        <div class="card-body">
            @if ($vegefruit)
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $vegefruit->image) }}" alt="{{ $vegefruit->name }}"
                                class="img-fluid rounded shadow-lg" style="max-height: 300px; width: auto;">
                        </div>
                        <div class="mt-3 text-center">
                            <h4 class="text-success">${{ number_format($vegefruit->price, 2) }}</h4>
                        </div>
                    </div>

                    <!-- Details Column -->
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h4 class="text-muted">{{ $vegefruit->intro }}</h4>
                            <p class="lead">{{ $vegefruit->description }}</p>
                        </div>

                        <div class="ingredients-section">
                            <h5 class="border-bottom pb-2">Ingredients</h5>
                            <ul class="list-group list-group-flush">
                                @foreach (['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'] as $num)
                                    @if (!empty($vegefruit->{'ingred_' . $num}))
                                        <li class="list-group-item">
                                            {{ $vegefruit->{'ingred_' . $num} }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    No vegefruit information found.
                </div>
            @endif
        </div>
    </div>

    <style>
        .ingredients-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .list-group-item {
            background-color: transparent;
            border-left: none;
            border-right: none;
        }
    </style>

@endsection
