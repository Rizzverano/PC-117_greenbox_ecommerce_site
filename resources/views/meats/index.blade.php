@extends('dishes-layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header py-3" style="background-color: #28a745; color: white;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h4 mb-0">Meats Category</h2>
                            <a href="{{ route('meats.create') }}" class="btn btn-light btn-sm" title="Add New Meat"
                                style="color: #28a745;">
                                <i class="fa fa-plus me-1" aria-hidden="true"></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Name</th>
                                        <th style="width: 120px;">Image</th>
                                        <th>Main Info</th>
                                        <th style="width: 150px;">Price</th>
                                        <th style="width: 180px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meats as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        alt="{{ $item->name }}"
                                                        style="width: 100%; height: auto; max-height: 60px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">
                                                    <strong>Intro:</strong> {{ Str::limit($item->intro, 50) }}<br>
                                                    <strong>Desc:</strong> {{ Str::limit($item->description, 50) }}<br>
                                                    <strong>Ingredients:</strong>
                                                    <div class="d-flex flex-wrap gap-1 mt-1">
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
                                                            @if (!empty($item->$ingred))
                                                                <span class="badge bg-secondary"
                                                                    style="font-size: 0.75rem;">{{ $item->$ingred }}</span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                            <td>₱{{ number_format($item->price, 2) }}</td>
                                            <td>
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="d-flex gap-1">
                                                        <a href="{{ route('meats.show', $item->id) }}" title="View Meat"
                                                            class="btn btn-info btn-sm py-1 flex-grow-1">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('meats.edit', $item->id) }}" title="Edit Meat"
                                                            class="btn btn-primary btn-sm py-1 flex-grow-1">
                                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <form method="POST" action="{{ route('meats.destroy', $item->id) }}"
                                                        accept-charset="UTF-8" class="w-100">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm py-1 w-100"
                                                            title="Delete Meat" onclick="return confirm('Confirm delete?')">
                                                            <i class="fa fa-trash-alt" aria-hidden="true"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <a href="{{ route('roles.manager') }}?section=categories-content" class="btn btn-success w-100">
                                        <i class="fas fa-arrow-left me-2"></i> Go back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
