@extends('roles.admgrlayout')

@section('content')

<div class="container mt-5">
    <h1 id="myH1">Manager Tasks</h1>
    <div class="row g-4">
        <div class="col-md-4">
            <form action="{{ route('vegefruits.index') }}" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Create or Modify Dish Veges & Fruits Category</h5>
                    <button class="task-btn" type="submit" name="veges_fruits">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="{{ route('meats.index') }}" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Create or Modify Dish Meat Category</h5>
                    <button class="task-btn" type="submit" name="meats">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="{{ route('seafoods.index') }}" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Create or Modify Dish Seafood Category</h5>
                    <button class="task-btn" type="submit" name="seafoods">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="#" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>View Customer Orders</h5>
                    <button class="task-btn" type="submit" name="orders">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="#" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Create & Print Cooking Procedures</h5>
                    <button class="task-btn" type="submit" name="procedures">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="#" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Returns & Exchange</h5>
                    <button class="task-btn" type="submit" name="returns">Access</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
