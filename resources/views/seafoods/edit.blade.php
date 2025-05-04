@extends('dishes-layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card shadow-sm" style="border-radius: 15px; border: none;">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <h4 class="mb-0">Edit Seafood</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seafoods.update', $seafood->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" id="id" value="{{ $seafood->id }}" />

                            <div class="row g-3">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $seafood->name }}"
                                            class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Image</label>
                                        <div class="border p-2 text-center"
                                            style="border-radius: 8px; background-color: #f8f9fa;">
                                            <img src="{{ asset('storage/' . $seafood->image) }}" alt="Current Image"
                                                style="max-height: 100px; width: auto; border-radius: 5px;">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Update Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Intro</label>
                                        <input type="text" name="intro" id="intro" value="{{ $seafood->intro }}"
                                            class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <input type="text" name="description" id="description"
                                            value="{{ $seafood->description }}" class="form-control"
                                            style="border-radius: 8px;">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <h5 class="mb-3" style="color: #28a745;">Ingredients</h5>

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

                                    @foreach ($ingredients as $index => $ingred)
                                        <div class="mb-3">
                                            <label class="form-label">Ingredient {{ $index + 1 }}</label>
                                            <input type="text" name="{{ $ingred }}" id="{{ $ingred }}"
                                                value="{{ old($ingred, $seafood->$ingred) }}"
                                                class="form-control form-control-sm" style="border-radius: 8px;">
                                        </div>
                                    @endforeach

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <input type="number" name="price" id="price" value="{{ $seafood->price }}"
                                            class="form-control" style="border-radius: 8px;">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <button type="submit" class="btn btn-success px-4 py-2 flex-grow-1"
                                    style="min-width: 120px; border-radius: 8px;">
                                    <i class="fas fa-save me-2"></i>Update
                                </button>

                                <a href="{{ route('seafoods.index') }}"
                                    class="btn btn-outline-success px-4 py-2 flex-grow-1"
                                    style="min-width: 120px; border-radius: 8px;">
                                    <i class="fas fa-arrow-left me-2"></i>Go Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
