@extends('crud-layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card shadow-sm" style="border-radius: 15px; border: none;">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <h4 class="mb-0">Create New Vegefruit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vegefruits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row g-3">
                                <!-- Basic Information -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Intro</label>
                                        <input type="text" name="intro" id="intro" class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <input type="text" name="description" id="description" class="form-control" style="border-radius: 8px;">
                                    </div>
                                </div>

                                <!-- Ingredients -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <input type="number" name="price" id="price" class="form-control" style="border-radius: 8px;">
                                    </div>

                                    <h5 class="mt-2 mb-3" style="color: #28a745;">Ingredients</h5>

                                    @for ($i = 1; $i <= 10; $i++)
                                        @php $ingred = 'ingred_'.($i < 10 ? '0'.$i : $i); @endphp
                                        <div class="mb-2">
                                            <label class="form-label">Ingredient {{ $i }}</label>
                                            <input type="text" name="{{ $ingred }}" id="{{ $ingred }}" class="form-control form-control-sm" style="border-radius: 6px;">
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <button type="submit" class="btn btn-success px-4 py-2 flex-grow-1" style="min-width: 120px; border-radius: 8px;">
                                    <i class="fas fa-save me-2"></i>Save
                                </button>

                                <a href="{{ route('vegefruits.index') }}" class="btn btn-outline-success px-4 py-2 flex-grow-1" style="min-width: 120px; border-radius: 8px;">
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
