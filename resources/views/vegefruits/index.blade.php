@extends('crud-layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>My Vegefruit Dish</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('vegefruits.create') }}" class="btn btn-success btn-sm" title="Add New Vegefruit">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br /><br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Intro</th>
                                        <th>Description</th>
                                        <th>Ingred_one</th>
                                        <th>Ingred_two</th>
                                        <th>Ingred_three</th>
                                        <th>Ingred_four</th>
                                        <th>Ingred_five</th>
                                        <th>Ingred_six</th>
                                        <th>Ingred_seven</th>
                                        <th>Ingred_eight</th>
                                        <th>Ingred_nine</th>
                                        <th>Ingred_ten</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vegefruits as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->image }}</td>
                                            <td>{{ $item->intro }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->ingred_one }}</td>
                                            <td>{{ $item->ingred_two }}</td>
                                            <td>{{ $item->ingred_three }}</td>
                                            <td>{{ $item->ingred_four }}</td>
                                            <td>{{ $item->ingred_five }}</td>
                                            <td>{{ $item->ingred_six }}</td>
                                            <td>{{ $item->ingred_seven }}</td>
                                            <td>{{ $item->ingred_eight }}</td>
                                            <td>{{ $item->ingred_nine }}</td>
                                            <td>{{ $item->ingred_ten }}</td>
                                            <td>{{ $item->price }}</td>

                                            <td>
                                                <a href="{{ route('vegefruits.show', $item->id) }}" title="View Vegefruit">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>

                                                <a href="{{ route('vegefruits.edit', $item->id) }}" title="Edit Vegefruit">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>

                                                <form method="POST" action="{{ route('vegefruits.destroy', $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Vegefruit"
                                                        onclick="return confirm('Confirm delete?')">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <form action="{{ route('roles.manager') }}" method="GET">
                                        <button class="btn btn-success btn-block mb-2" type="submit">
                                            <i class="fas fa-arrow-left mr-2"></i> Go back to Dashboard
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
