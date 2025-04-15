@extends('crud-layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">Edit Seafoods</div>
        <div class="card-body">

            <form action="{{ route('seafoods.update', $seafood->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $seafood->id }}" />

                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{ $seafood->name }}"
                    class="form-control"></br>

                <label>Image</label></br>
                <input type="file" name="image" id="image" value="{{ $seafood->image }}"
                    class="form-control"></br>

                <label>Intro</label></br>
                <input type="text" name="intro" id="intro" value="{{ $seafood->intro }}"
                    class="form-control"></br>

                <label>Description</label></br>
                <input type="text" name="description" id="description" value="{{ $seafood->description }}"
                    class="form-control"></br>

                <label>Ingred_one</label></br>
                <input type="text" name="ingred_one" id="ingred_one" value="{{ $seafood->ingred_one }}"
                    class="form-control"></br>

                <label>Ingred_two</label></br>
                <input type="text" name="ingred_two" id="ingred_two" value="{{ $seafood->ingred_two }}"
                    class="form-control"></br>

                <label>Ingred_three</label></br>
                <input type="text" name="ingred_three" id="ingred_three" value="{{ $seafood->ingred_three }}"
                    class="form-control"></br>

                <label>Ingred_four</label></br>
                <input type="text" name="ingred_four" id="ingred_four" value="{{ $seafood->ingred_four }}"
                    class="form-control"></br>

                <label>Ingred_five</label></br>
                <input type="text" name="ingred_five" id="ingred_five" value="{{ $seafood->ingred_five }}"
                    class="form-control"></br>

                <label>Ingred_six</label></br>
                <input type="text" name="ingred_six" id="ingred_six" value="{{ $seafood->ingred_six }}"
                    class="form-control"></br>

                <label>Ingred_seven</label></br>
                <input type="text" name="ingred_seven" id="ingred_seven" value="{{ $seafood->ingred_seven }}"
                    class="form-control"></br>

                <label>Ingred_eight</label></br>
                <input type="text" name="ingred_eight" id="ingred_eight" value="{{ $seafood->ingred_eight }}"
                    class="form-control"></br>

                <label>Ingred_nine</label></br>
                <input type="text" name="ingred_nine" id="ingred_nine" value="{{ $seafood->ingred_nine }}"
                    class="form-control"></br>

                <label>Ingred_ten</label></br>
                <input type="text" name="ingred_ten" id="ingred_ten" value="{{ $seafood->ingred_ten }}"
                    class="form-control"></br>

                <label>Price</label></br>
                <input type="number" name="price" id="price" value="{{ $seafood->price }}"
                    class="form-control"></br>

                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <form action="{{ route('roles.manager') }}" method="GET">
                        <button class="btn btn-success btn-block mb-4" type="submit">
                            <i class="fas fa-arrow-left mr-2"></i> Go back to Dashboard
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
