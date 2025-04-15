@extends('crud-layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">Edit Meats</div>
        <div class="card-body">

            <form action="{{ route('meats.update', $meat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $meat->id }}" />

                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{ $meat->name }}"
                    class="form-control"></br>

                <label>Image</label></br>
                <input type="file" name="image" id="image" value="{{ $meat->image }}"
                    class="form-control"></br>

                <label>Intro</label></br>
                <input type="text" name="intro" id="intro" value="{{ $meat->intro }}"
                    class="form-control"></br>

                <label>Description</label></br>
                <input type="text" name="description" id="description" value="{{ $meat->description }}"
                    class="form-control"></br>

                <label>Ingred_one</label></br>
                <input type="text" name="ingred_one" id="ingred_one" value="{{ $meat->ingred_one }}"
                    class="form-control"></br>

                <label>Ingred_two</label></br>
                <input type="text" name="ingred_two" id="ingred_two" value="{{ $meat->ingred_two }}"
                    class="form-control"></br>

                <label>Ingred_three</label></br>
                <input type="text" name="ingred_three" id="ingred_three" value="{{ $meat->ingred_three }}"
                    class="form-control"></br>

                <label>Ingred_four</label></br>
                <input type="text" name="ingred_four" id="ingred_four" value="{{ $meat->ingred_four }}"
                    class="form-control"></br>

                <label>Ingred_five</label></br>
                <input type="text" name="ingred_five" id="ingred_five" value="{{ $meat->ingred_five }}"
                    class="form-control"></br>

                <label>Ingred_six</label></br>
                <input type="text" name="ingred_six" id="ingred_six" value="{{ $meat->ingred_six }}"
                    class="form-control"></br>

                <label>Ingred_seven</label></br>
                <input type="text" name="ingred_seven" id="ingred_seven" value="{{ $meat->ingred_seven }}"
                    class="form-control"></br>

                <label>Ingred_eight</label></br>
                <input type="text" name="ingred_eight" id="ingred_eight" value="{{ $meat->ingred_eight }}"
                    class="form-control"></br>

                <label>Ingred_nine</label></br>
                <input type="text" name="ingred_nine" id="ingred_nine" value="{{ $meat->ingred_nine }}"
                    class="form-control"></br>

                <label>Ingred_ten</label></br>
                <input type="text" name="ingred_ten" id="ingred_ten" value="{{ $meat->ingred_ten }}"
                    class="form-control"></br>

                <label>Price</label></br>
                <input type="number" name="price" id="price" value="{{ $meat->price }}"
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
